<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_Data extends MX_Controller {

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

		error_reporting(0);
	}
	public function login_page()
	{
		$this->load->view('pages/Login/Login_page');
		
	}
	function check_login(){
        if($this->session->userdata('sess_data') == TRUE){
			$curl = curl_init();

			$data = array("login"=>TRUE);
			$d = json_encode($data);

			curl_setopt_array($curl, array(
			CURLOPT_URL => "http://192.168.88.75/rmniportal/index.php/api/Login_api/check_login?=",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS =>$d,///"{\"names\":\"johns\"}"
			CURLOPT_HTTPHEADER => array(
				"Content-Type: application/json"
			),
			));

			$response = curl_exec($curl);

			curl_close($curl);
			echo $response;

        }else{
            return FALSE;
        }
    }
	public function view_account()
	{
		$this->load->view('pages/Home/includes/view_account_page.php');
		
	}
}
