<?php
/**
* Project:
* Sample Codeigniter Project 
*	
* Controller Class:
* Register
*
* Created Date:	 
* 17 Nov, 2014
*    
* Developed By:
* RE2QA Pvt Ltd
* 
*/
class Register extends CI_Controller{
	var $prefix;
	var $tbl;
	var $users_array;
	
	function __construct( ){
		parent::__construct();
		$this->output->set_header( 'Last-Modified: ' . gmdate( "D, d M Y H:i:s" ) . ' GMT' );
		$this->output->set_header( 'Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0' );
		$this->output->set_header( 'Pragma: no-cache' );
		$this->output->set_header( 'Expires: Mon, 26 Jul 1997 05:00:00 GMT' );
		$this->load->model( 'admin/model_members' );
		$this->prefix       = $this->config->item( 'DB_TABLE_PREFIX' );
		$this->tbl          = $this->prefix . 'members';
		$this->users_array	= array(
							'first_name' => '',
							'last_name'	 => '',
							'email'		 => '',
							'address1'	 => '',
							'password'	 => '',
							'cpassword'	 => ''
		); //users_array
	}//__construct
	
	function index( ){
	
	}//index
	
	/**
		*	
		* Required Params:
		* None
		*
		* Optional Params:
		* None
		* 
		* Output:
		* it will do logout for particular user
		*
	*/
	function logout( ){
		$this->model_members->logout();
		redirect( $this->config->item( 'base_url' ) . 'register/signin' );
	}//logout
	
	/**
		*	
		* Required Params:
		* User name {username}
		* password 	{password}
		*
		* Optional Params:
		* None
		* 
		* Output:
		* It will set session and do login for a user if "username" and "password" are valid
		*
	*/
	function signin(){
		// --- Logout previuos logged in member --- //
		$this->model_members->logout();
		// --- validation --- //
		$this->form_validation->set_rules( 'username', 'Username', 'trim|required' );
		$this->form_validation->set_rules( 'password', 'Password', 'trim|required' );
		if ( $this->form_validation->run() == FALSE ) {
			$data[ 'login_error' ] = validation_errors();
			$this->load->view( 'login', $data );
		}else{
			$results = $this->model_members->login( $this->input->post( 'username' ), $this->input->post( 'password' ) );
			// --- Save in session variable --- //
			if ( $results->num_rows() > 0 ) {
				foreach ( $results->result() as $row ) {
				   $full_name = ucfirst($row->first_name)." ".ucfirst($row->last_name);
					$this->session->set_userdata( array(
							'set_login' 	=> 'yes',
							'ses_user_id' 	=> $row->id,
							'ses_email' 	=> $row->email,
							'ses_url' 		=> $row->url,
							'ses_name' 		=> $full_name
					) );
					$signin_session = $this->session->set_userdata( 'login', 'yes' );
			    }//foreach
			}else {
				// --- User Name Or Password wrong Entered by User --- //
				$data[ 'login_error' ] = 'Incorrect Username or Password..';
				$this->load->view( 'login', $data );
			}
		}
	}// signin
	
	/**
		*	
		* Required Params:
		* First Name 		{first_name}
		* User Name 		{username}
		* Email 			{email}
		* Password 			{password}
		* Confirm Password 	{c_password}
		*
		* Optional Params:
		* None
		* 
		* Output:
		* it will do Sign up if required fields are given
		*
	*/
	function signup(){
		$data 	= array();
		// --- Validation --- //
		$this->form_validation->set_rules( 'first_name'	, 'First Name'	, 'trim|required' );
		$this->form_validation->set_rules( 'username'	, 'User Name'	, 'trim|required|unique['.$this->tbl.'.username]' );
		$this->form_validation->set_rules( 'email'		, 'Email'		, 'trim|required|valid_email|unique['.$this->tbl.'.email]' );
		$this->form_validation->set_rules( 'password'	, 'Password'	, 'trim|required|matches[c_password]|min_length[4]' );
		$this->form_validation->set_rules( 'c_password'	, 'Confirm Password', 'trim|required' );
		if ($this->form_validation->run()==FALSE){
			if (empty($_POST)){
				foreach ($this->users_array as $value)
					$data[$value]	= '';
			} else {
				foreach ($this->users_array as $value)
					$data[$value]	= $this->input->post($value);
			}
			$this->load->view('signup',$data);
		}else{
			foreach ($this->users_array as $value)
				$data_insert[$value]	= $this->input->post($value);
			$this->global_model->insert($this->tbl, $data_insert);
			$user_id = $this->db->insert_id() ;
			$data[ 'login_success' ] = 'Account information added successfully.';
			redirect($this->config->item('base_url').'register/login');
		}// Validation else 
	}//signup
	
}//End of class
