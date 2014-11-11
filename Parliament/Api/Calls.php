<?php
/**
 * Example Calls for the Parliament API.
 * 
 * @author   Colin Oakley <hello@htmlandbacon.com>
 * @license  MIT License
 * @version  0.1
 */

namespace Parliament\Api;
include ('Client.php');

/**
 * example set of calls based on current API - 09 November 2014
 */
class Calls extends Client
{
	/**
	 * Find out more about briefing papers - http://www.parliament.uk/briefing-papers/
	 */

    /**
     * Returns details for a briefing paper by specified by ID.
     *
     * @param  integer page_numer - specifeid page number i.e 10
     * @param  integer page_size 
     * @return object
     */
	public function getBriefingPapers($page_number=null, $page_size=10)
	{
		$args = array('_pageSize' => $page_size);
		if($page_number!=null){ $args[] = array('_page' => $page_number);	}
  		return $this->makeRequest('briefingpapers',$args);
	}

    /**
     * Returns details for a briefing paper by specified by ID.
     *
     * @param  integer $id
     * @return object
     */
	public function getBriefingById($id)
	{
  		return $this->makeRequest('briefingpapers/id/'.$id);
	}

    /**
     * Returns details for a briefing paper by topic.
     * @param  string topic - topic name i.e Poverty
     * @param  integer page_numer - specifeid page number i.e 
     * @param  integer page_size 
     * @return object
     */
	public function getBreifingByTopic($topic,$page_number=null, $page_size=10)
	{
		$args = array('_pageSize' => $page_size);
		if($page_number!=null){ $args[] = array('_page' => $page_number);	}
  		return $this->makeRequest('briefingpapers/topic/'.$topic,$args);
	}

    /**
     * Returns details for a briefing paper topics
     *
     * @return object
     */
	public function getBriefingTopics()
	{
  		return $this->makeRequest('briefingpapertopics');
	}

    /**
     * Returns details for a briefing paper types
     *
     * @return object
     */
	public function getBriefingTypes()
	{
  		return $this->makeRequest('briefingpapertypes');
	}	

	/**
	 * @todo /briefingpapers?auth=Rhodes to return Briefing Papers based on its author's surname (for example 'Rhodes')
	 * @todo /briefingpapersubtopics/Defence to return all Briefing Papers subtopics for the specified topic (for example 'Defence')
	 * @todo /briefingpapers?ref=SN05809 to return one Briefing Paper based on its reference number (for example 'SN05809')
	 */

	/**
	 * @todo Papers Laid
	 */

	/**
	 * @todo Early Day Motions
	 */

	/**
	 * @todo Lords Divisions
	 */

	/**
	 * @todo Commons Divisions
	 */

    /**
     * Returns details for a Commons Divisions
     * @param  integer page_numer - specifeid page number i.e 
     * @param  integer page_size 
     * @param  array other_args - takes other search types
     * @param  string view_type - controls how much data is returned
     * @return object
     */
	public function getCommonsDivisions($page_number=null, $page_size=10,$other_args=null,$view_type = "description")
	{
		$args = array('_pageSize' => $page_size);
		$args['_view'] = $view_type;
		if($page_number!=null){ $args['_page'] = $page_number;	}
		if($other_args!=null){	$args = array_merge($args,$other_args);	}
  		return $this->makeRequest('commonsdivisions',$args);
	}

    /**
     * Returns details for a Commons Divisions by specified by ID.
     *
     * @param  integer $id
     * @param  string view_type - sets the detail level - default to all
     * @return object
     */
	public function getCommonsDivisionById($id,$view_type="all")
	{
		$args = array('view' => $view);
  		return $this->makeRequest('commonsdivisions/id/'.$id);
	}



	/**
	 * @todo Commons Written Questions
	 */

	/**
	 * @todo Lords Written Questions
	 */

	/**
	 * @todo Commons Oral Questions
	 */

	/**
	 * @todo Commons Oral Question Times
	 */

	/**
	 * @todo Lords Oral Questions
	 */

	/**
	 * @todo Answered Questions
	 */

	/**
	 * @todo Commons Members - add search paramters
	 */
    
    /**
     * Returns details for a commons members.
     * @param  integer page_numer - specifeid page number i.e 
     * @param  integer page_size 
     * @param  string view_type - sets the detail level - default to basic
     * @return object
     */
	public function getCommonsMembers($page_number=null, $page_size=10, $view_type = "basic")
	{
		$args = array('_pageSize' => $page_size);
		$args['_view'] = $view_type;
		if($page_number!=null){ $args[] = array('_page' => $page_number);	}
  		return $this->makeRequest('commonsmembers',$args);
	}

	/**
	 * @todo Lords Members - add search paramters
	 */
    
    /**
     * Returns details for a Lords members.
     * @param  integer page_numer - specifeid page number i.e 
     * @param  integer page_size 
     * @param  string view_type - sets the detail level - default to basic
     * @return object
     */
	public function getLordsMembers($page_number=null, $page_size=10, $view_type = "basic")
	{
		$args = array('_pageSize' => $page_size);
		$args['_view'] = $view_type;
		if($page_number!=null){ $args[] = array('_page' => $page_number);	}
  		return $this->makeRequest('lordsmembers',$args);
	}

	/**
	 * @todo Lords' Registered Interest
	 */

	/**
	 * @todo General
	 */


	/**
	 * @todo Future end points: 
	 *		 Lords Attendance, Lords Items Of Business, Commons Votes and Proceedings, Thesaurus
	 */





}