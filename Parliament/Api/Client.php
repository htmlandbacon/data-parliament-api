<?php
/**
 * PHP wrapper for the Parliament API.
 * 
 * @author   Colin Oakley <hello@htmlandbacon.com>
 * @license  MIT License
 * @version  0.1
 */

namespace Parliament\Api;


/**
 * The core Paraiment API PHP wrapper class.
 */
class Client
{
    /**
     * Default options for cURL requests.
     *
     * @var array
     */
    public static $CURL_OPTS = array(
        CURLOPT_CONNECTTIMEOUT => 10,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT        => 60,
        CURLOPT_USERAGENT      => 'parliament-api-php-wrapper'
    );
    
    /**
     * The API endpoints.
     *
     * @var string
     */
    protected $link_data_endpoint = 'http://lda.data.parliament.uk/';
    
    protected $api_data_endpoint = 'http://api.data.parliament.uk';
    

    /**
     * Makes a HTTP request.
     * This method can be overriden by extending classes if required.
     *
     * @param  string $url
     * @param  string $api - linked or api
     * @param  string $method defaults to GET
     * @param  array  $params
     * @param  string defaults to json
     * @return object
     * @throws Exception
     */
    public function makeRequest($url, $params = array(), $api_type = "link", $method = 'GET', $format = "json")
    {
        $endpoint = ($api_type=="link") ? $this->link_data_endpoint : $this->api_data_endpoint;

        $ch = curl_init();
        $options = self::$CURL_OPTS;
        $options[CURLOPT_URL] = $endpoint . $url . ".".$format;
        if (!empty($params)) {
            $options[CURLOPT_URL].= '?' . http_build_query($params, null, '&');
        }

        echo $options[CURLOPT_URL];

        curl_setopt_array($ch, $options);
        $result = curl_exec($ch);
        $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        if ($result === false) {
            throw new Exception(curl_error($ch), curl_errno($ch));
        }
        $result = json_decode($result);
        if (isset($result->message)) {
            throw new Exception($result->message, $status);
        }
        return $result;
    }
}