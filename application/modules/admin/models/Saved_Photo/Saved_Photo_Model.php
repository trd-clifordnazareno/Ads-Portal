<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Saved_Photo_Model extends MY_Model{
	
	function __construct(){
		parent:: __construct();
	}
	
	function getFields($id){
		self::_select();	
		self::_from();
		self::_join();
		self::_fix_arg();
		parent::where(array('l.LocationID'=>$id));
		$query = $this->db->get();
		
		if($query->num_rows()>0){
			return $query->row();
		}
		
		return false;
	}



	function getField($id, $x, $i){
		self::_select();	
		self::_from();
		self::_join();
		self::_fix_arg();
		parent::where(array('l.holiday_type'=>$id, 'l.for_holiday_days_id'=>$x, 'l.daily_type_rate'=>$i));
		$query = $this->db->get();
		
		if($query->num_rows()>0){
			return $query->row();
		}
		
		return false;
	}



	function getaccount($fname, $lname, $packavailed){
		self::_select();	
		self::_from();
		self::_join();
		self::_fix_arg();
		parent::where(array('l.holiday_type'=>$fname, 'l.for_holiday_days_id'=>$lname, 'l.daily_type_rate'=>$packavailed));
		$query = $this->db->get();
		
		if($query->num_rows()>0){
			return $query->row();
		}
		
		return false;
	}
	
	function getValue($id,$select,$return=''){
		$this->db->select($select);
		self::_from();
		self::_join();
		self::_fix_arg();
		parent::where(array('l.holiday_type'=>$id));
		$query = $this->db->get();
		if($query->num_rows()>0){
			$row=$query->row();
			if($return){
				return (!empty($row->{$return}))?$row->{$return}:false;
			}
			return (!empty($row->{$select}))?$row->{$select}:false;
		}
		return false;
	}
	
	function getSearch($where = array(), $group_by = array(), $order_by = array(), $result = FALSE, $count = FALSE , $row = FALSE){
		self::_select();
		self::_from();
		self::_join();
		self::_fix_arg();
		parent::where($where);
		parent::group_by($group_by);
		parent::orderby($order_by);
		$query = $this->db->get();
		
		if($result){
			return $query->result();
		}
		
		if($count){
			return $query->num_rows();
		}
		
		if($row){
			if($query->num_rows()>0)
				return $query->row();
			return false;	
		}
		
		return $query;
	}
	
	function getList($where,$where_string,$order_by){
		self::_select();
		self::_from();
		self::_join();
		self::_fix_arg();
		parent::where($where);
		parent::where_string($where_string);
		// parent::group_by("u.id_user");
		parent::orderby($order_by);
		return $query = $this->db->get();
	}
	
	function getListLimit($where,$where_string,$order_by,$page,$number){
		self::_select();
		self::_from();
		self::_join();
		self::_fix_arg();
		parent::where($where);
		parent::where_string($where_string);
		// parent::group_by("u.id_user");
		parent::orderby($order_by);
		parent::pagelimit($page, $number);
		return $query = $this->db->get();
	}
	
	/*
	 * From
	 * @return void
	 */
	private function _from()
	{
		$this->db->from("saved_photo sp");
	}
	
	/*
	 * SELECT
	 * @return void
	 */
	private function _select()
	{
		$this->db->select("
			sp.*
			
		");
		// au.user_fname as add_user_fname, au.user_mname as add_user_mname, au.user_lname as add_user_lname, au.user_code as add_user_code,au.user_email as add_user_email, au.user_picture as add_user_picture,
		// uu.user_fname as update_user_fname, uu.user_mname as update_user_mname, uu.user_lname as update_user_lname, uu.user_code as update_user_code,uu.user_email as update_user_email, uu.user_picture as update_user_picture
	}
	
	/*
	 * JOIN
	 * @return void
	 */
	private function _join()
	{
        //$this->db->join('user_types ut', 'ut.id_user_type = u.user_type_id', 'left');
	}
	
	/*
	 * Fix Argument
	 * @return void
	 */
	private function _fix_arg()
	{
		$this->db->where(array('sp.enabled' => 1));
	}
	
	/*
	 * Insert Query
	 * @return id
	 */
	function insert_table($data){
		$this->db->insert("saved_photo",$data);
		return $this->db->insert_id();
	}
	
	/*
	 * Batch Insert Query
	 * @return void
	 */
	function insert_batch_table($data){
		$this->db->insert_batch("for_holiday_days", $data); 
	}
	
	/*
	 * Update Query
	 * @return id
	 */
	function update_table($data,$table_col,$key){
		$this->db->where($table_col,$key);
		$this->db->update("saved_photo",$data);
        return $key;
	}
	
	/*
	 * Update Where Query
	 * @return void
	 */
	function update_table2($data,$where){
		self::where($where);
		$this->db->update("for_holiday_days",$data);
	}
	
	/*
	 * Batch Update Query
	 * @return void
	 */
	function update_batch_table($data,$table_col){
		$this->db->update_batch("for_holiday_days", $data, $table_col); 
	}
	
	/*
	 * Delete Query
	 * @return void
	 */
	function delete_table($table_col,$key){
		$this->db->delete("for_holiday_days",array($table_col=>$key));
	}
	
		/*
	* Custom
	*/
	function getFields_arr($where,$select,$return='',$return_value=''){
		$this->db->select($select);
		self::_from();
		self::_join();
		self::_fix_arg();
		parent::where($where);
		$query = $this->db->get();
		$layer='';
		foreach($query->result() as $q){
			if($return){
				if($return_value){
					$layer[$q->{$return}]=$q->{$return_value};
				}else{
					$layer[$q->{$return}]=$q->{$return};
				}
			}else{
				$layer[$q->{$select}]=$q->{$select};
			}	
		}
		
		return $layer;
	}
        function insert_pdf($data){
		$this->db->insert("client_contract_billing",$data);
		return $this->db->insert_id();
	}




	function check_save_photos($photo_name, $client_contract_id, $location_id, $type_of_ads_id, $item_number, $saved_photo_id){
		self::_select();	
		self::_from();
		self::_join();
		self::_fix_arg();
		parent::where(array('sp.saved_photo_id'=>$saved_photo_id, 'sp.photo_name'=>$photo_name, 'sp.client_contract_id'=>$client_contract_id, 'sp.location_id'=>$location_id, 'sp.type_of_ads_id'=>$type_of_ads_id, 'sp.item_number'=>$item_number));
		$query = $this->db->get();
		
		if($query->num_rows()>0){
			return $query->row();
		}
		
		return false;
	}
	
	
	
	
	function update_saved_check_photo_table($data, $saved_photo_id_data, $photo_name_data, $client_contract_id_data, $location_id_data, $type_of_ads_id_data, $item_number_data, $saved_photo_id, $photo_name, $client_contract_id, $location_id, $type_of_ads_id, $item_number){
		$this->db->where($saved_photo_id_data,$saved_photo_id);
		$this->db->where($photo_name_data,$photo_name);
		$this->db->where($client_contract_id_data,$client_contract_id);
		$this->db->where($location_id_data,$location_id);
		$this->db->where($type_of_ads_id_data,$type_of_ads_id);
		$this->db->where($item_number_data,$item_number);
		$this->db->update("saved_photo",$data);
        return $key;
	}



	function update_table_transfer_to_view_photo($data, $saved_photo_id, $photo_name, $key_saved_photo_id, $key_photo_name){
		$this->db->where($saved_photo_id,$key_saved_photo_id);
		$this->db->where($photo_name,$key_photo_name);
		$this->db->update("saved_photo",$data);
        return $key;
	}
	public function update_table_disapproved_photo_model($data, $saved_photo_id_,$client_contract_id_,$location_id_,$item_number_,$photo_name_,    $saved_photo_id,$client_contract_id,$location_id,$item_number,$photo_name){
		$this->db->where($saved_photo_id_,$saved_photo_id);
		$this->db->where($photo_name_,$photo_name);
		$this->db->update("saved_photo",$data);
        return $key;
	}


	public function check_ret_photo(){
		$data = $this->db->query("select * from saved_photo where returned = '1' or returned = '3' or returned = '4' or returned = '5' and enabled = '1'");
		return $data->result();
	}


	public function update_table_delete_photo_model($data, $saved_photo_id, $photo_name, $photo_id_key,$photo_name_key){
		$this->db->where($saved_photo_id, $photo_id_key);
		$this->db->where($photo_name, $photo_name_key);
		$this->db->update("saved_photo",$data);
        return $key;
	}
	public function count_no_of_success($client_is, $status, $start, $end){
	$data = $this->db->query("select * from saved_photo where client_contract_id = '$client_is' and returned = '$status' and start_billing = '$start' and end_billing = '$end'");
	return $data->num_rows();
	}
	public function count_photos($client_contract_id){
		$data = $this->db->query("select count(item_number) as success_photo from saved_photo where client_contract_id = '$client_contract_id' and returned = 2");
		return $data->result();
	}
	public function update_message_table($data, $client_contract_id, $client_contract_id_data){
		$this->db->query("update saved_photo set returned = 1 where client_contract_id = '$client_contract_id_data' and returned = 2 and message != ''");
	}
	
}