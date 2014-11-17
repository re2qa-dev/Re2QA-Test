<?php
/**
* Project:
* Sample Codeigniter Project 
*	
* Class:
* Global Model
*
* Created Date:	 
* 17 Nov, 2014
*    
* Developed By:
* RE2QA Pvt Ltd
* 
*/
class Global_Model extends CI_Model
{
	var $tbl_prefix;
	
	function __construct( )
	{
		parent::__construct();
		$this->tbl_prefix 	= $this->config->item( 'DB_TABLE_PREFIX' );
	}
	
	/**
		*	
		* Required Params:
		* None
		*
		* Optional Params:
		* None
		* 
		* Output:
		* it will check either a user logged in or redirects on login page if not.
		*
	*/
    function client_ses_chk(){
		$ses_set_login = $this->session->userdata('set_login');
		$ses_user_id = $this->session->userdata('ses_user_id');
		if($ses_set_login != 'yes' || $ses_user_id == '' || $ses_user_id < 1) {
			$this->session->set_flashdata('login_errors', 'Not logged in or session expired, please login to continue.');
			redirect($this->config->item('base_url').'signin');
		}
	}//client_ses_chk
	
	/**
		*	
		* Required Params:
		* table name 	{tbl}
		* Data array 	{data_insert}
		*
		* Optional Params:
		* None
		* 
		* Output:
		* it will Insert data to the table
		*
	*/
	function insert($tbl, $data_insert){
		$this->db->insert($tbl, $data_insert);
	}//insert	
	
	/**
		*	
		* Required Params:
		* table name 		 {tbl}
		* Data array 		 {data_update}
		* ID where to update {id}
		*
		* Optional Params:
		* None
		* 
		* Output:
		* it will Update data to the table against id	
		*
	*/
	function update($tbl, $data_update, $id){
		$this->db->where('id', $id);
		$this->db->update($tbl, $data_update);
	}//update
	
	/**
		*	
		* Required Params:
		* table name 			{tbl}
		* ID where to update 	{id}
		*
		* Optional Params:
		* None
		* 
		* Output:
		* it will delete row from table against id
		*
	*/
	function delete($tbl, $id){
		$this->db->where( 'id', $id );
		$this->db->delete( $tbl );		
	}//delete
	
}//Class Global_Model
?>