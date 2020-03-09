<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Photo_Data extends MX_Controller {

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

    
    
    
    
    
    public function show_photos(){
        $this->load->view("pages/Home/includes/show_photo");
    }
    public function modal(){
        $this->load->view("pages/modal");
    }
    public function view_photos(){
        $this->load->view("pages/Home/includes/view_photos_page");
    }
    public function view_photos_all_page(){
        $this->load->view("pages/Photos/Photos_page");
    }
    public function view_returned_photos_page(){
        $this->load->view("pages/Photos/includes/returned_photos_page");
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
