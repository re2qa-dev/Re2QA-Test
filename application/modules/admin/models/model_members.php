<?php
/**
* Project:
* Sample Project 
*	
* Class:
* Model Members
*
* Created Date:	 
* 17 Nov, 2014
*    
* Developed By:
* RE2QA Pvt Ltd
* 
*/
class Model_members extends CI_Model
{
	var $tbl_prefix;
	var $tbl;
	var $image_path;
	
	function __construct( ){
		parent::__construct();
		$this->tbl_prefix 		= $this->config->item( 'DB_TABLE_PREFIX' );
		$this->tbl				= $this->tbl_prefix."members";
		$this->image_path		= realpath(APPPATH . '../uploads/members');
	}//__construct
	
	/**
		*	
		* Required Params:
		* None
		*
		* Optional Params:
		* None
		* 
		* Output:
		* Unsets the session
		*
	*/
	function logout(){
		$this->session->unset_userdata( array(
				'ses_user_id' 		=> '',
				'set_login' 		=> '',
				'ses_name' 			=> ''
		));
		$this->session->set_userdata('ses_user_id', '');
		$this->session->set_userdata('set_login', '');
		$this->session->unset_userdata('ses_user_id');
		$this->session->unset_userdata('set_login');
	}//logout
	
	
	/**
		*	
		* Required Params:
		* Email 	{email}
		* Password 	{password}
		*
		* Optional Params:
		* None
		* 
		* Output:
		* returns a record if there exists any, against given "email" and "password"
		*
	*/
	function login( $email, $password ){
		$this->db->select( 'id, email, password,first_name,last_name,url' );
		$this->db->from( $this->tbl );
		$this->db->where( 'email = \'' . mysql_real_escape_string($email) . '\' AND  password = \'' . mysql_real_escape_string($password) . '\' AND status=\'Active\'' );
		$this->db->limit( 1 );
		$results = $this->db->get();
		return $results;
	}//login
	
	/**
		*	
		* Required Params:
		* User ID 	{user_id}
		*
		* Optional Params:
		* None
		* 
		* Output:
		* returns detail of particular user
		*
	*/
	function detail($user_id){
		$this->db->select( "*" );
		$this->db->from( $this->tbl );
		$this->db->where('id', $user_id);
		$this->db->limit( 1 );
		$results = $this->db->get();
		return $results;
	}//detail
}//class
?>