<?php

/**
* Project:
* Sample Project 
*	
* Class:
* Model Institutions
*
* Created Date:	 
* 17 Nov, 2014
*    
* Developed By:
* RE2QA Pvt Ltd
* 
*/

class Model_institutions extends CI_Model{
	var $prefix;
	var $tbl;
	var $tbl_menu;
	var $tbl_banner;
	var $tbl_contact;
	
	function __construct( ){
		parent::__construct();
		$this->prefix	 		= $this->config->item( 'DB_TABLE_PREFIX' );
		$this->tbl 				= $this->prefix.'institutes';
		$this->tbl_mem			= $this->prefix.'members';
	}//__construct
	
	/**
		*	
		* Required Params:
		* User ID 	{user_id}
		*
		* Optional Params:
		* keyword 	{keyword}
		* 
		* Output:
		* returns count of institutes against particular user,
		* if keywords are given it will return records against user id and having names like keywords
		*
	*/
	function count_institutions($user_id, $keyword=''){
		$this->db->select('COUNT(*) as count');
		$this->db->from($this->tbl);
		$this->db->like('institution_name', $keyword); 
		$this->db->where('user_id', $user_id);
		return $this->db->get();
	}//count_institutions
	
	/**
		*	
		* Required Params:
		* User ID 	{user_id}
		* Limit		{limit}
		* Offset	{offset}
		*
		* Optional Params:
		* keyword 	{keyword}
		* 
		* Output:
		* returns resulting institutes's HTML against particular user,
		* if keywords are given it will return records against user id and having names like keywords
		*
	*/
	function get_institutions($user_id, $limit, $offset, $keyword=''){
		$this->db->select('*');
		$this->db->from($this->tbl);
		$this->db->where('user_id', $user_id);
		!$this->db->like('institution_name', $keyword);
		$this->db->order_by('id', 'DESC');
		if(!empty($limit))
			$this->db->limit( $limit, $offset );
		$results 	= $this->db->get();
		
		$res_html	= "";
        if($results->num_rows()>0){
			foreach($results->result() as $record){
				$res_html	.= '<tr>';
				$res_html	.= '<td>'.$record->institution_name		.'</td>';
				$res_html	.= '<td>'.$record->contact_person		.'</td>';
				$res_html	.= '<td>'.$record->contact_Person_title	.'</td>';
				$res_html	.= 	'<td>
									<div class="span3">
									  <a title="Detail" href="'.base_url().'institutions/detail/'.$record->id.'">
										<img src="'.base_url().'images/view.png" />
									  </a>
									</div>';
				$res_html	.= '<div class="span3">
								  <a title="Edit" href="'.base_url().'institutions/manage_institutions/'.$record->id.'">
									<img src="'.base_url().'images/edit.png" />
								  </a>
								</div>';
				$res_html	.= '</td>';
				$res_html	.= '</tr>';
		  	}//foreach
		}else{
            $res_html	.= '<tr><td colspan="10"><strong>Sorry</strong> no records found.</td></tr>';
        }
		return $res_html;
	}//get_institutions
	
	/**
		*	
		* Required Params:
		* User ID 		{user_id}
		* Institute ID	{id}
		*
		* Optional Params:
		* None
		* 
		* Output:
		* returns Detail of particular institute against particular user
		*
	*/
	function get_detail_by_id($user_id, $id){
		$this->db->select('*');
		$this->db->from($this->tbl);
		$this->db->where('user_id', $user_id);
		$this->db->where('id', $id);
		return $this->db->get();
	}//get_detail_by_id

	/**
		*	
		* Required Params:
		* Institute ID/IDs 	{ids : array}
		*
		* Optional Params:
		* None
		* 
		* Output:
		* It will delete all institutes whose IDs are given in ids array
		*
	*/
	function delete($ids){
		foreach($ids as $id){
			$del_ins 	= "DELETE FROM $this->tbl WHERE id = $id";
			$this->db->query($del_ins);
		}
		return 1;
	}//delete
	
}// End of class
?>
