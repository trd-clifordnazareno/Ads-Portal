<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MX_Controller {

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
		$this->load->model('admin/Users/Users_Model');
		error_reporting(0);
	}
	public function index()
	{
		//$this->load->library('session');
		
		$check_log = modules::run("templ/Login_Data/check_login");;
        if($check_log == TRUE){
			echo modules::run("templ/Route/func");
		}else{
			echo modules::run("templ/Login_Data/login_page");
		}



		//modules::run("templ/Login_Data/check_login");
		//$check_log = modules::run("templ/Login_Data/check_login");
		
		//$this->load->library('session');
		/*$newdata = array(
			'username'  => 'johndoe',
			'email'     => 'johndoe@some-site.com',
			'logged_in' => TRUE
	);
	
	
	$data = $this->session->set_userdata($newdata);
	
	echo $this->session->userdata('username');*/
	
	//echo modules::run("templ/Login_Data/login_page");
		
	}




	function request(){
		if($this->uri->rsegment(3) == "login_user"){
			self::request_login_user();
		}else if ($this->uri->rsegment(3) == "regester_contract_locations") {
            self::request_regester_contract_locations();
        }
	}


	public function request_login_user(){
		
		
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$saved_data['username'] = $username;
		$saved_data['password'] = $password;
		$pass_data = json_encode($saved_data);




		
		
		$this->load->library("form_validation");

		$this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        
        
        if($this->form_validation->run() == false){
               echo "<div class='alert alert-danger alert-dismissible'>
               <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
               <h4><i class='icon fa fa-ban'></i> Incomplete Fields!</h4>
                                                    
                </div>";
           }else{
			   //calling api
				$credentials_data = modules::run('api/Login_api/request_login_user_api', $pass_data);
				$convert_data = json_decode($credentials_data);
				$username_conv_data = $convert_data->username;
				$password_conv_data = $convert_data->password;

				$details_login['username'] = $username_conv_data;
				$details_login['password'] = $password_conv_data;



				$con = json_encode($details_login);

				$data_credintials = modules::run('api/Login_api/transact_login_api', $con);
				$credintials = json_decode($data_credintials);
				
				
				$user_id_credintials = $credintials->user_id;
				$username_credintials = $credintials->username;
				$password_credintials = $credintials->password;
				$usertype_credintials = $credintials->usertype;
				$client_contract_id_credintials = $credintials->client_contract_id;
				$enabled_credintials = $credintials->enabled;
				//end calling api
				//$login_user = $enabled_credintials;
			   $login_user = $enabled_credintials;
			   if($login_user == 1){
				   $get_client_contract_id = $client_contract_id_credintials;
				   //calling api
				   $client_contract_id_json['client_contract_id'] = $get_client_contract_id;


///////////
					$client_contract_id_json_data = json_encode($client_contract_id_json);
				   $make_session_inf = modules::run('api/Login_api/get_client_contract_id_api', $client_contract_id_json_data);
				   $decode_make_session_inf_data = json_decode($make_session_inf);
				   foreach($decode_make_session_inf_data as $decode_make_session_inf_data_data => $key){
					   $check_user = $key->enabled;
					   $usertype = $key->usertype;
					   $user_id = $key->contract_client_id;
					   $client_contract_number = $key->contract_number;
				   break;
				   }
				   /*$a = json_encode($decode_make_session_inf_data);
				   $b = json_decode($a);
				   echo $b->contract_client_id;exit;*/





				   //end calling api
			//$check_user = Client_Account_Data_Model::getSearch(array('cad.contract_client_id ='=>$get_client_contract_id),"",array(),true);
							if($check_user == 1){
								foreach($check_user as $check_user_data){
									$usertype = $check_user_data->usertype;
									$user_id = $check_user_data->contract_client_id;
									$client_contract_number = $check_user_data->contract_number;
									break;
								}
								$sess_data_user = array(
									'sess_username'  => $username,
									'sess_usertype'     => $usertype,
									'sess_user_id' => $user_id,
									'sess_logged_in' => TRUE
								);
							$data = $this->session->set_userdata('sess_data', $sess_data_user);
							echo site_url() . "/admin/home";
							}else{echo site_url() . "/admin/Login";}
						}
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
