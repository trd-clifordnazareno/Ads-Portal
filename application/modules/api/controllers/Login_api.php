<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_api extends MX_Controller {

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
	
	public function check_login(){
		$data = json_decode(file_get_contents("php://input"));
		//echo json_encode(array($data));
		echo $data->login;
	}
	public function request_login_user_api($data){
		$data_info = json_decode($data);
		$username = $data_info->username;
		$password = $data_info->password;
		$curl = curl_init();

		/*curl_setopt_array($curl, array(
		CURLOPT_URL => "http://192.168.88.75/rmniportal/index.php/api/login_api/login_api_request",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_POSTFIELDS =>"{\"username\":\"$username\", \"password\":\"$password\"}",
		CURLOPT_HTTPHEADER => array(
			"Content-Type: application/x-www-form-urlencoded"
		),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		echo $response;*/




		/*curl_setopt_array($curl, array(
			CURLOPT_URL => "http://192.168.88.75/rmniportal/index.php/api/login_api/login_api_request",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_POSTFIELDS =>"{\"username\":\"$username\", \"password\":\"$password\"}",
			CURLOPT_HTTPHEADER => array(
			  "Content-Type: application/x-www-form-urlencoded"
			),
		  ));
		  
		  $response = curl_exec($curl);
		  
		  curl_close($curl);
		  echo $response;*/


		  //initaite api link

		  $curl = curl_init();

			curl_setopt_array($curl, array(
			CURLOPT_URL => "http://192.168.88.75/rmniportal/index.php/api/login_api/login_api_request?username=$username&password=$password&",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => array(
				"Content-Type: application/x-www-form-urlencoded"
			),
			));

			$response = curl_exec($curl);

			curl_close($curl);
			echo $response;
			//end initiate api link
		//Users_Model::getuserFields($username, $password);
	}
	public function transact_login_api($data){
		$data_info = json_decode($data);
		$username = $data_info->username;
		$password = $data_info->password;
		$curl = curl_init();
		$curl = curl_init();

			curl_setopt_array($curl, array(
			CURLOPT_URL => "http://192.168.88.75/rmniportal/index.php/api/login_api/transact_login_api_request?username=$username&password=$password&",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => array(
				"Content-Type: application/x-www-form-urlencoded"
			),
			));

			$response = curl_exec($curl);

			curl_close($curl);
			$dump_data = json_decode($response);
			$fetch_data['username'] = $dump_data->username;
			$fetch_data['password'] = $dump_data->password;
			$fetch_data['users_id'] = $dump_data->user_id;
			$fetch_data['usertype'] = $dump_data->usertype;
			$fetch_data['client_contract_id'] = $dump_data->client_contract_id;
			$fetch_data['enabled'] = $dump_data->enabled;
			return json_encode($fetch_data);

	}




	public function get_client_contract_id_api($data){
		$data_info = json_decode($data);
		$contract_client_id = $data_info->client_contract_id;
		$curl = curl_init();
		$curl = curl_init();

			curl_setopt_array($curl, array(
			CURLOPT_URL => "http://192.168.88.75/rmniportal/index.php/api/login_api/contract_client_id_api_request?contract_client_id=$contract_client_id&",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => array(
				"Content-Type: application/x-www-form-urlencoded"
			),
			));

			$response = curl_exec($curl);

			curl_close($curl);
			echo $response;

	}















	public function login_api_request(){
		//official api link GET
		$data = json_decode(file_get_contents("php://input"));
		if(isset($_GET['username']) && isset($_GET['password'])){
			$username = $_GET['username'];
			$password = $_GET['password'];
			echo "{\"username\":\"$username\", \"password\":\"$password\"}";
		}else{
			echo "ops you have no creditials {\"username\":\"empty\", \"password\":\"empty\"}";
		}
		//end official api link GET
		/*$check_data = json_encode($data);
		if($check_data == "null"){
			echo "ops you have no creditials {\"username\":\"empty\", \"password\":\"empty\"}";
		}else{
			echo $check_data;
		}*/
	}
	public function transact_login_api_request(){
		
		$data = json_decode(file_get_contents("php://input"));
		
		if(isset($_GET['username']) && isset($_GET['password'])){
			$username = $_GET['username'];
			$password = $_GET['password'];
			$get_data = Users_Model::getuserFields($username, $password);
			if($get_data){
				echo json_encode($get_data);
			}else{
				echo "ops you have wrong creditials {\"username\":\"empty\", \"password\":\"empty\"}";
			}
		}else{
			echo "ops you have no creditials {\"username\":\"empty\", \"password\":\"empty\"}";
		}
	}
	public function contract_client_id_api_request(){
		$data = json_decode(file_get_contents("php://input"));
		
		if(isset($_GET['contract_client_id'])){
			$contract_client_id = $_GET['contract_client_id'];
			$get_data = Client_Account_Data_Model::getSearch(array('cad.contract_client_id ='=>$contract_client_id),"",array(),true);
			if($get_data){
				echo json_encode($get_data);
			}else{
				echo "ops you have wrong creditials {\"username\":\"empty\", \"password\":\"empty\"}";
			}
		}else{
			echo "ops you have no creditials {\"username\":\"empty\", \"password\":\"empty\"}";
		}
	}
}
