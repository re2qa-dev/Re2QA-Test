<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *

/**
 * Application Form Validation Class
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Validation
 * @author		Nexgen Development Team
 * @copyright	Copyright (c) 2001 - 2012, Nexgen Development Team.
 * @link		http://www.nexgeninc.com/
 */
class MY_Form_validation extends CI_Form_validation {
	
	/**
	 * Constructor
	 *
	 */	
	public function __construct()
    {
        parent::__construct();
    }	
	// --------------------------------------------------------------------
	
	/**
	 * Check the uniqueness of an field in a specific table
	 *
	 * @access	public
	 * @param	string
	 * @param	field
	 * @return	bool
	 */

	function unique($str, $field)
	{
		$this->CI;
		$CI =& get_instance();
		list($table, $column) = explode('.', $field, 2);
		$this->CI->form_validation->set_message('unique', 'The %s "'.$str.'" already exists.');
		$query = $this->CI->db->query("SELECT COUNT(*) dupe FROM $table WHERE $column = '".$str."'");
		$row = $query->row();
		if ($row->dupe > 0)
		{
			return FALSE; // a match was found, validation fails
		}
		else
		{
			return TRUE; // value is unique, validation passed
		}
	}

	/**
	 * Check the uniqueness of an field in a specific table in edit mode
	 *
	 * @access	public
	 * @param	string
	 * @param	field
	 * @return	bool
	 */

	function unique_edit($str, $field)
	{
		$this->CI;
		$CI =& get_instance();
		@list($table, $column) = split('\.', $field, 2);

		$arr_data = explode('##', $column);

		$this->CI->form_validation->set_message('unique_edit', 'Sorry! The %s '.$str.' already exists.');
		$query = $this->CI->db->query("SELECT COUNT(*) dupe FROM $table WHERE $arr_data[0] = '".addslashes($str)."' AND id <>".$arr_data[1]);
		$row = $query->row();

		if ($row->dupe > 0)
		{
			return FALSE; // a match was found, validation fails
		}
		else
		{
			return TRUE; // value is unique, validation passed
		}
	}
	
	/**
	 * Check the uniqueness of an field in a specific table
	 *
	 * @access	public
	 * @param	string
	 * @param	field
	 * @return	bool
	 */
	
	function unique_gallery($str, $field)
	{
	$this->CI;
		$CI =& get_instance();
		@list($table, $column) = split('\.', $field, 2);

		$arr_data = explode('##', $column);

		$this->CI->form_validation->set_message('unique_gallery', 'Sorry! The %s "'.ucwords($str).'" already exists in this category.');
		$query = $this->CI->db->query("SELECT COUNT(*) dupe FROM $table WHERE $arr_data[0] = '".addslashes($str)."' AND category_id ='".$arr_data[1]."'");
		$row = $query->row();

		if ($row->dupe > 0)
		{
			return FALSE; // a match was found, validation fails
		}
		else
		{
			return TRUE; // value is unique, validation passed
		}
	}
	
// 	function unique_salon_name($name){
// 		$this->CI;
// 		$CI =& get_instance();
// 		$name = strtolower($name);
// 		$match = 'salon';
// 		$result = substr($name, 0, 5);
// 		$this->CI->form_validation->set_message('unique_salon_name', 'Sorry! you cannot use "salon" in the start this is a reserve keyword.');
// 		if($match === $result){
// 			return FALSE;
// 		}else{
// 			return TRUE;
// 		}
// 	}

 		function unique_lssalon_url($str, $parm){
			$this->CI;
			$CI =& get_instance();
			$name = strtolower($str);
			$array = explode('###',$parm);
			$this->CI->form_validation->set_message('unique_lssalon_url', 'Sorry that address has already been taken, please choose another.');
			$query = $this->CI->db->query("SELECT COUNT( * ) dupe FROM  $array[0] WHERE url = '$name' AND id <> $array[1]");
			$row = $query->row();
	 		if ($row->dupe > 0)
			{
				return FALSE; // a match was found, validation fails
			}
			else
			{
				return TRUE; // value is unique, validation passed
			}
	
		}
	
	function unique_gallery_edit($str, $field)
	{
		$this->CI;
		$CI =& get_instance();
		@list($table, $column) = split('\.', $field, 2);
	
		$arr_data = explode('##', $column);
	
		$this->CI->form_validation->set_message('unique_gallery_edit', 'Sorry! The %s "'.ucwords($str).'" already exists in this category.');
		$query = $this->CI->db->query("SELECT COUNT(*) dupe FROM $table WHERE $arr_data[0] = '".addslashes($str)."' AND category_id ='".$arr_data[1]."' AND id <>".$arr_data[2]);
		$row = $query->row();
	
		if ($row->dupe > 0)
		{
			return FALSE; // a match was found, validation fails
		}
		else
		{
			return TRUE; // value is unique, validation passed
		}
	}
	
	function unique_in_category($str, $field)
	{
		$this->CI;
		$CI =& get_instance();
		@list($table, $column) = split('\.', $field, 2);
	
		$arr_data = explode('##', $column);
	
		$this->CI->form_validation->set_message('unique_in_category', 'Sorry! The %s "'.ucwords($str).'" already exists in this category.');
		$query = $this->CI->db->query("SELECT COUNT(*) dupe FROM $table WHERE $arr_data[0] = '".addslashes($str)."' AND category_id ='".$arr_data[1]."'");
		$row = $query->row();
	
		if ($row->dupe > 0)
		{
			return FALSE; // a match was found, validation fails
		}
		else
		{
			return TRUE; // value is unique, validation passed
		}
	}
	
	function unique_in_category_edit($str, $field)
	{
		$this->CI;
		$CI =& get_instance();
		@list($table, $column) = split('\.', $field, 2);
	
		$arr_data = explode('##', $column);
	
		$this->CI->form_validation->set_message('unique_in_category_edit', 'Sorry! The %s "'.ucwords($str).'" already exists in this category.');
		$query = $this->CI->db->query("SELECT COUNT(*) dupe FROM $table WHERE $arr_data[0] = '".addslashes($str)."' AND category_id ='".$arr_data[1]."' AND id <>".$arr_data[2]);
		$row = $query->row();
	
		if ($row->dupe > 0)
		{
			return FALSE; // a match was found, validation fails
		}
		else
		{
			return TRUE; // value is unique, validation passed
		}
	}
	
	
	function name_check($str, $field)
	{
		$this->CI;
		$CI =& get_instance();
	
		$this->CI->form_validation->set_message('name_check', 'The name field is required.');
		if ($str == 'Name')
		{
			return FALSE; // a match was found, validation fails
		}
		else
		{
			return TRUE; // value is unique, validation passed
		}
	}
	
	function title_check($str, $field)
	{
		$this->CI;
		$CI =& get_instance();
	
		$this->CI->form_validation->set_message('title_check', 'The title field is required.');
		if ($str == 'Title')
		{
			return FALSE; // a match was found, validation fails
		}
		else
		{
			return TRUE; // value is unique, validation passed
		}
	}
	
	function message_check($str, $field)
	{
		$this->CI;
		$CI =& get_instance();
	
		$this->CI->form_validation->set_message('message_check', 'The message field is required.');
		if ($str == 'Message')
		{
			return FALSE; // a match was found, validation fails
		}
		else
		{
			return TRUE; // value is unique, validation passed
		}
	}
	
	/**
	 * Check the Offer Code (Coupon Code) from the Coupons table
	 *
	 * @access	public
	 * @param	string
	 * @param	field
	 * @return	bool
	 */
	
	function valid_coupon($str, $field)
	{
		$this->CI;
		$CI =& get_instance();
		list($table, $column) = explode('.', $field, 2);
		$this->CI->form_validation->set_message('valid_coupon', 'The "'.$str.'" is not a valid %s.');
		$query = $this->CI->db->query("SELECT COUNT(*) dupe FROM $table WHERE $column = '".addslashes($str)."'");
		$row = $query->row();
		if ($row->dupe > 0)
		{
			return TRUE; // a match was found, validation passed
		}
		else
		{
			return FALSE; // value is unique, validation fail
		}
	}
	
	function active_coupon($str, $field)
	{
		$this->CI;
		$CI =& get_instance();
		list($table, $column) = explode('.', $field, 2);
		$this->CI->form_validation->set_message('active_coupon', 'The  %s "'.$str.'" is now In-active.');
		$query = $this->CI->db->query("SELECT COUNT(*) dupe FROM $table WHERE $column = '".$str."'  AND status = 'Active'");
		$row = $query->row();
		if ($row->dupe > 0)
		{
			return TRUE; // a match was found, validation passed
		}
		else
		{
			return FALSE; // value is unique, validation fail
		}
	}
	
	function exp_coupon($str, $field)
	{
		$this->CI;
		$CI =& get_instance();
		list($table, $column) = explode('.', $field, 2);
		$this->CI->form_validation->set_message('exp_coupon', 'The %s "'.$str.'" is expired now.');
		$query = $this->CI->db->query("SELECT exp_date FROM $table WHERE $column = '".$str."'");
		$row = $query->row();
		if (strtotime($row->exp_date) <= strtotime(date('Y-m-d')))
		{
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	
	
	// --------------------------------------------------------------------
	
	/**
	 * Check the Validation of Captcha Field
	 *
	 * @access	public
	 * @param	string
	 */

	function captcha_check($captcha){
		$this->CI;
		$CI =& get_instance();
		require_once dirname(__FILE__) . '/securimage.php';
            $securimage = new Securimage();
            if ($securimage->check($captcha) == false) {
				$this->CI->form_validation->set_message('captcha_check', 'Incorrect security code entered');
            	return false;
			}else{
				return true;
			}
	}
	
	
}
// END Form Validation Class

/* End of file Form_validation.php */
/* Location: ./system/libraries/Form_validation.php */