<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Client_Contract_Billing_Data extends MX_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('admin/client_account_data/Client_Account_Data_Model');
        $this->load->model('admin/Contarct_And_Locations/Contract_And_Locations_Model');
        $this->load->model('admin/locations/Locations_Model');
        $this->load->model('admin/Type_Of_Ads/Type_Of_Ads_Model');
        error_reporting(0);
    }

    public function index() {
        //$this->load->view('welcome_message');
    }

    
    
    
    
    
    public function view_monthly_billing(){
        $this->load->view("pages/Home/includes/view_monthly_billing_page");
    }
    
    public function request_view_monthly_billing(){
        echo modules::run('templ/Client_Contract_Billing_Data/view_monthly_billing');
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
