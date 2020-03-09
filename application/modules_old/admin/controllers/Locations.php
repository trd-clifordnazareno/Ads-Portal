<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Locations extends MX_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('admin/locations/Locations_Model');
        $this->load->model('admin/Contarct_And_Locations/Contract_And_Locations_Model');
        $this->load->model('admin/client_account/Client_Account_Model');
        error_reporting(0);
    }

    public function index() {
        echo modules::run('templ/Locations_Data/Locations_page');
    }

    function request() {
        if ($this->uri->rsegment(3) == "regester_locations") {
            self::request_regester_locations();
        }else if ($this->uri->rsegment(3) == "regester_location_model") {
            self::request_regester_location_model();
        }else if ($this->uri->rsegment(3) == "message_notification") {
            self::request_message_notification();
        }else if ($this->uri->rsegment(3) == "get_all_locations_list") {
            self::request_get_all_locations_list();
        }else if ($this->uri->rsegment(3) == "get_all_locations_model") {
            self::request_get_all_locations_model();
        }else if ($this->uri->rsegment(3) == "view_locations") {
            self::request_view_locations();
        }else if ($this->uri->rsegment(3) == "view_locations_model") {
            self::request_view_locations_model();
        }else if ($this->uri->rsegment(3) == "delete_location_model") {
            self::request_delete_location_model();
        }else if ($this->uri->rsegment(3) == "add_new_location") {
            self::request_add_new_location();
        }else if ($this->uri->rsegment(3) == "add_new_location_model") {
            self::request_add_new_location_model();
        } 
    }

    public function request_regester_locations(){
        
        echo modules::run('templ/Locations_Data/regester_locations_page');
    }
    public function request_regester_location_model(){
        $location_name = $this->uri->rsegment(4);
        $data['location_name'] = $location_name;
        $data['enabled'] = 1;
        $insert_success = Locations_Model::insert_table($data);
        if($insert_success == True){
           $status = 1;
           $data['insert_success'] = $status;
           echo json_encode($data); 
        }
        
    }
    public function request_message_notification(){
        $status_message['data'] = $this->uri->rsegment(4);
        echo modules::run('templ/Locations_Data/message_notification', $status_message);
    }
    public function request_get_all_locations_list(){
        $check_all_ocations = Contract_And_Locations_Model::getSearch(array(),"",array(),true);
        if($check_all_ocations > 0){
            $data['check_all_ocations'] = $check_all_ocations;
            $get_data = json_encode($data);
            echo $get_data;
        }
    }
    public function request_get_all_locations_model(){
        $get_all_locations = Locations_Model::getSearch(array(),"",array(),true);
        if($get_all_locations > 0){
            $client_contract_id = $this->uri->rsegment(4);
            $get_contract_client_id = Client_Account_Model::getFields($client_contract_id);
            if($get_contract_client_id){
                $returned_client_contract_id = $get_contract_client_id->client_name;

            }else{
                $returned_client_contract_id = "No Name";
            }
            $data['all_locations_list'] = $get_all_locations;
            $data['client_name'] = $returned_client_contract_id;
            $get_data = json_encode($data);
            echo $get_data;

        }
    }
    public function request_view_locations(){
        echo modules::run('templ/Locations_Data/view_locations_page');
    }
    public function request_view_locations_model(){
         $get_all_locations = Locations_Model::getSearch(array(),"",array(),true);
         if($get_all_locations > 0){
             $data_returned = $get_all_locations;
         }
         $data['view_locations'] = $data_returned;
         $get_data = json_encode($data);
         echo $get_data;
    }
    public function request_delete_location_model(){
        $location_id = $this->uri->rsegment(4);
        $data['enabled'] = 0;
        $success = Locations_Model::update_table($data, "location_id", $location_id);
        if($success){
            $reload = 1;
        }else{
            $reload = 0;
        }
    }
    public function request_add_new_location(){
        echo modules::run('templ/Locations_Data/add_new_location_page');
    }
    public function request_add_new_location_model(){
        $location_name = urldecode($this->uri->rsegment(4));
        $data['location_name'] = $location_name;
        $data['enabled'] = 1;
        Locations_Model::insert_table($data);
    }
    
    
     

    

    

    

}
