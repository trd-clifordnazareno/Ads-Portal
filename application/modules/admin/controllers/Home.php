<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MX_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct() {
		parent::__construct();
		$this->load->model('admin/client_account_data/Client_Account_Data_Model');
        $this->load->model('admin/Contarct_And_Locations/Contract_And_Locations_Model');
        $this->load->model('admin/locations/Locations_Model');
        $this->load->model('admin/Type_Of_Ads/Type_Of_Ads_Model');
        $this->load->model('admin/Client_Contract_Billing/Client_Contract_Billing_Model');
		$this->load->model('admin/client_account/Client_Account_Model');
		$this->load->model('admin/Saved_Photo/Saved_Photo_Model');
		error_reporting(0);
	}
	public function index()
	{
		$check_log = modules::run("templ/Login_Data/check_login");;
        if($check_log == TRUE){
			if($this->session->userdata('sess_data')){
				$datas = $this->session->userdata('sess_data');
					foreach($datas as $key => $value){
						if($key == 'sess_username'){
							$username = $value;
						}
						if($key == 'sess_usertype'){
							$usertype = $value;
						}
						if($key == 'sess_user_id'){
							$user_id = $value;
						}
					}
			}
				$data['page_name'] = "Clients Contract Page";
				$data['title_page'] = "Clients Contract Page";
				$data['navigation_page'] = "Clients Account Page";
				$data['sub_navigation_page'] = "";
				$data['usertype'] = $usertype;
				$data['print_condition'] = 1;
				if($usertype == "user"){
					$count_success = Saved_Photo_Model::count_photos($user_id);
					$no_unit = Client_Account_Data_Model::getFields($user_id);
					foreach($count_success as $count_success_data){
						$count_success_photo = $count_success_data->success_photo;
					}
					if($count_success_photo == $no_unit->no_unit){
						$print_condition = 1;
						$data['print_condition'] = $print_condition;
					}else{
						$print_condition = 0;
						$data['print_condition'] = $print_condition;
					}
				}
			echo modules::run('templ/Route/func', $data);
		}else{
			echo modules::run("templ/Login_Data/login_page");
		}
		
		
	}




	function request(){
		if($this->uri->rsegment(3) == "view_account"){
			self::request_view_account();
		}else if ($this->uri->rsegment(3) == "regester_contract_locations") {
            self::request_regester_contract_locations();
        }
	}

	public function request_view_account()
	{
		/*$check_emp_code = Client_Account_Model::getFields(1);
		$data['num'] =  $check_emp_code->contract_client_id;
		$data = Client_Account_Model::getSearch(array(),"",array(),true);
		 $data['client_contract_data'] = json_encode($data);*/
		
		
		echo modules::run('templ/Route/view_account');

	}
	public function client_contract_model(){
		/*$check_emp_code = Client_Account_Model::getFields(1);
		$data['num'] =  $check_emp_code->contract_client_id;*/
		if($this->session->userdata('sess_data')){
			$datas = $this->session->userdata('sess_data');
				foreach($datas as $key => $value){
					if($key == 'sess_username'){
						$username = $value;
					}
					if($key == 'sess_usertype'){
						$usertype = $value;
					}
					if($key == 'sess_user_id'){
						$user_id = $value;
					}
				}
		}
		if($usertype == "user"){
			$data = Client_Account_Data_Model::getSearch(array('cad.contract_client_id ='=>$user_id),"",array(),true);
		 
			$datas = array(
				'datas' => $data,
				'name' => 'john',
			   'age' =>30,
			   'number' =>1234567890
			);
			$datax = json_encode($datas);
			echo $datax;
		}else{
			$data = Client_Account_Model::getSearch(array(),"",array(),true);
		 
			$datas = array(
				'datas' => $data,
				'name' => 'john',
			   'age' =>30,
			   'number' =>1234567890,
			   'usertype' => 'admin'
			);
			$datax = json_encode($datas);
			echo $datax;
		}
		
	}
	public function pages(){
		$data['enabled'] = 0;
        Client_Account_Model::update_table($data, "client_name", "sample");
	}
	public function request_regester_contract_locations(){
        
        echo modules::run('templ/Clients_Account_Contract/regester_contract_locations_page');
    }
}
