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

		$this->load->model('admin/client_account/Client_Account_Model');
		error_reporting(0);
	}
	public function index()
	{
            $data['page_name'] = "Clients Contract Page";
            $data['title_page'] = "Clients Contract Page";
            $data['navigation_page'] = "Clients Account Page";
            $data['sub_navigation_page'] = "";
		echo modules::run('templ/Route/func', $data);
		
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
		$data = Client_Account_Model::getSearch(array(),"",array(),true);
		 
		 $datas = array(
			 'datas' => $data,
			 'name' => 'john',
			'age' =>30,
			'number' =>1234567890
		 );
		 $datax = json_encode($datas);
		 echo $datax;
	}
	public function pages(){
		$data['enabled'] = 0;
        Client_Account_Model::update_table($data, "client_name", "sample");
	}
	public function request_regester_contract_locations(){
        
        echo modules::run('templ/Clients_Account_Contract/regester_contract_locations_page');
    }
}
