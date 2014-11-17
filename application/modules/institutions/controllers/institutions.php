<?php
/**
* Project:
* Sample Codeigniter Project 
*	
* Controller Class:
* Institutions
*
* Created Date:	 
* 17 Nov, 2014
*    
* Developed By:
* RE2QA Pvt Ltd
* 
*/

class Institutions extends CI_Controller{
	var $prefix;
	var $tbl;
	var $ses_user_id;
	
	function __construct( ){
		parent::__construct();
		$this->output->set_header( 'Last-Modified: ' . gmdate( "D, d M Y H:i:s" ) . ' GMT' );
		$this->output->set_header( 'Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0' );
		$this->output->set_header( 'Pragma: no-cache' );
		$this->output->set_header( 'Expires: Mon, 26 Jul 1997 05:00:00 GMT' );
		// --- Check if not logged in --- //
		$this->global_model->client_ses_chk();
		
		$this->ses_user_id 		= $this->session->userdata('ses_user_id');
		$this->prefix	 		= $this->config->item( 'DB_TABLE_PREFIX' );
		$this->tbl 				= $this->prefix.'institutes';
		$this->load->model('admin/model_institutions');
		$this->data_array		= array(
								'id'					=>'',
								'institution_name'		=>'',
								'contact_person'		=>'',
								'contact_Person_title'	=>'',
								'address1'				=>'',
								'address2'				=>'',
								'city'					=>'',
								'state_id'				=>'',
								'zip_code'				=>'',
								'recipient_fax'			=>'',
								'recipient_phone'		=>''
		); //data_array
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
		* Listing of Institions
		*
	*/
	function index(){
		$data 			 = array();
 		$data['title'] 	 = "Recipient Institutions";
		// --- pagination --- //
		if($this->uri->segment(3)!='')
			$offset 	 = $this->uri->segment(3);
		else
			$offset 	 = 0;
		$per_page        = $this->config->item( 'REC_PER_PAGE_ADMIN' );
		$total			 = $this->model_institutions->count_institutions($this->ses_user_id, $this->input->post('keyword'))->row();
		$total			 = $total->count;
 		$data['results'] = $this->model_institutions->get_institutions($this->ses_user_id, $per_page, $offset, $this->input->post('keyword'));
 		
		$config[ 'base_url' ] 		= $this->config->item('base_url').'institutions/index';
		$config[ 'uri_segment' ]    = '3';
		$config[ 'total_rows' ]     = $total;
		$config[ 'per_page' ]       = $per_page;
		$config[ 'first_link' ]     = 'First';
		$config[ 'last_link' ]      = 'Last';
		$config[ 'next_link' ]      = 'Next';
		$config[ 'prev_link' ]      = 'Previous';
		$config[ 'cur_tag_open' ]   = '<b> &nbsp;';
		$config[ 'cur_tag_close' ]  = '</b>';
		$config[ 'full_tag_open' ]  = '<ul class="pagination">';
		$config[ 'full_tag_close' ] = '</ul>';
		$config[ 'first_tag_open' ] = '<li>';
		$config[ 'first_tag_close' ]= '</li>';
		$config[ 'last_tag_open' ] 	= '<li>';
		$config[ 'last_tag_close' ] = '</li>';
		$config[ 'cur_tag_open' ] 	= '<li class="active"><a href="#">';
		$config[ 'cur_tag_close' ] 	= '</a></li>';
		$config[ 'next_tag_open' ] 	= '<li>';
		$config[ 'next_tag_close' ] = '</li>';
		$config[ 'prev_tag_open' ] 	= '<li>';
		$config[ 'prev_tag_close' ] = '</li>';
		$config[ 'num_tag_open' ] 	= '<li>';
		$config[ 'num_tag_close' ] 	= '</li>';
		$this->pagination->initialize( $config );
		
		$this->load->view('institutions' ,$data );
	}//index
	
	/**
		*	
		* Required Params:
		* None
		*
		* Optional Params:
		* Institute ID {id}
		* 
		* Output:
		* If "id" is given it will Update institute otherwise it will Add institute
		*
	*/
	function manage_institutions($id=''){
		$data						= array();
		$data['page_title'] 		= "Add Recipient Institution";
		$data['states']				= $this->global_model->getOptionStatesArray();
		foreach($this->data_array as $k=>$v)
				$data[$k] 			= '';
		if($id!=''){
			$data['page_title'] 	= "Edit Recipient Institution";
			$result					= $this->model_institutions->get_detail_by_id($this->ses_user_id, $id);
			if($result->num_rows()>0){
				if(!$this->input->post()){
					$record			= $result->row();
					foreach($this->data_array as $k=>$v)
						$data[$k] 	= $record->$k;
				}
			}
		}
		if($this->input->post()){
			foreach($this->data_array as $k=>$v)
				$data[$k] = $this->input->post($k);
		}
		$this->form_validation->set_rules( 'institution_name'	  , 'Name of institution'	, 'trim|required');
		$this->form_validation->set_rules( 'contact_person'		  , 'Contact Person'		, 'trim|required');
		$this->form_validation->set_rules( 'contact_Person_title' , 'Contact Person’s Title', 'trim|required');
		$this->form_validation->set_rules( 'address1'			  , 'Address Line 1'	 	, 'trim|required' );
		$this->form_validation->set_rules( 'city'				  , 'City'			 		, 'trim|required' );
		$this->form_validation->set_rules( 'state_id'			  , 'State'			 		, 'trim|required' );
		$this->form_validation->set_rules( 'zip_code'			  , 'Zip Code'		 		, 'trim|required' );
		if($this->form_validation->run() == FALSE){
			$this->load->view( 'manage_institutions', $data );
		}else{
			foreach($this->data_array as $k=>$v)
				$data_insert[$k] 	= $this->input->post($k);
			$id	= $this->input->post('id');
			unset($data_insert['id']);
			if($id!='' && is_numeric($id) && $id>0){
				$this->global_model->update($this->tbl, $data_insert, $id);
				$this->session->set_flashdata( 'msg_success', 'Record Updated successfully' );
			}else{
				$data_insert['user_id']		= $this->ses_user_id;
				$this->global_model->insert($this->tbl, $data_insert);
				$this->session->set_flashdata( 'msg_success', 'Record added successfully' );
			}
			redirect( $this->config->item( 'base_url' ) . 'institutions' );
		}// Validation else
	}//manage_institutions
	
	/**
		*	
		* Required Params:
		* Institute Id
		*
		* Optional Params:
		* None
		* 
		* Output:
		* it will show detail of particular Institiue
		*
	*/
	function detail($id){
		$data			= array();
		$data['title']	= 'Institution Detail';
		$data['result']	= $this->model_institutions->get_detail_by_id($this->ses_user_id, $id);
		$this->load->view('detail', $data);
	}//detail
	
	/**
		*	
		* Required Params:
		* None
		*
		* Optional Params:
		* None
		* 
		* Output:
		* it will delete all Institiues of particular user
		*
	*/
	function delete(){
		$ses_user_id = $this->session->userdata('ses_user_id');
		$this->model_institutions->delete_all($ses_user_id);
		$this->session->set_flashdata( 'msg_success', 'Institutes deleted successfully' );
		redirect(base_url().'institutions');
	}//delete_all
	 
}//End of class
?>
