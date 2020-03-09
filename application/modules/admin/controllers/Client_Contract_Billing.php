<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Client_Contract_Billing extends MX_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('admin/client_account_data/Client_Account_Data_Model');
        $this->load->model('admin/Contarct_And_Locations/Contract_And_Locations_Model');
        $this->load->model('admin/locations/Locations_Model');
        $this->load->model('admin/Type_Of_Ads/Type_Of_Ads_Model');
        $this->load->model('admin/Client_Contract_Billing/Client_Contract_Billing_Model');
        error_reporting(0);
    }

    public function index() {
        //$this->load->view('welcome_message');
    }

    function request() {
        if ($this->uri->rsegment(3) == "view_monthly_billing") {
            self::request_view_monthly_billing();
        } else if ($this->uri->rsegment(3) == "view_monthly_billing_model") {
            self::request_view_monthly_billing_model();
        }else if ($this->uri->rsegment(3) == "create_monthly_billing") {
            self::request_create_monthly_billing();
        } 
    }
    
    public function request_view_monthly_billing(){
        echo modules::run('templ/Client_Contract_Billing_Data/view_monthly_billing');
    }
    public function request_view_monthly_billing_model(){



        
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
        
        $client_contract_id = $this->uri->rsegment(4);
        $client_contract_number = $this->uri->rsegment(5);
        $client_name = $this->uri->rsegment(6);
        $explode_client_name = explode("%20",$client_name);
        $implode_client_name = implode("_",$explode_client_name);
        $get_client_contarct_monthly_billing['get_client_contarct_monthly_billing'] = Client_Contract_Billing_Model::getSearch(array('ccb.client_contract_id ='=>$client_contract_id, 'ccb.client_contract_code ='=>$client_contract_number),"",array(),true);
        $get_client_contarct_monthly_billing['client_name'] = $implode_client_name;


        $get_client_contarct_monthly_billing['usertype'] = $usertype;

        if($get_client_contarct_monthly_billing){
            $client_contarct_monthly_billing = json_encode($get_client_contarct_monthly_billing);
        }
        echo $client_contarct_monthly_billing;
    }
    public function request_create_monthly_billing(){
        echo modules::run('templ/Client_Contract_Billing_Data/create_monthly_billing');
    }
    /////////////////////////////////////
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    public function delete_client_account($client_id) {
        echo "1";
        $data['enabled'] = 0;
        Client_Account_Data_Model::update_table($data, "contract_client_id", "$client_id");
    }

    public function request_view_clients_account_details() {

        echo modules::run('templ/Clients_Account_Contract/view_account_contract');
    }

    

}
