<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Clients extends MX_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('admin/clients/Clients_Model');
        error_reporting(0);
    }

    public function index() {
        echo modules::run('templ/Clients_data/view_all_clients');
    }

    function request() {
        if ($this->uri->rsegment(3) == "view_all_clients_empty_page") {
            self::request_view_all_clients_empty_page();
        }else if ($this->uri->rsegment(3) == "view_client_model") {
            self::request_view_client_model();
        }else if ($this->uri->rsegment(3) == "view_client_data") {
            self::request_view_client_data();
        }else if ($this->uri->rsegment(3) == "view_clients_detail_empty_page") {
            self::request_view_clients_detail_empty_page();
        }else if ($this->uri->rsegment(3) == "update_clients_data") {
            self::request_update_clients_data();
        }else if ($this->uri->rsegment(3) == "regester_clients") {
            self::request_regester_clients();
        }else if ($this->uri->rsegment(3) == "regester_clients_data_model") {
            self::request_regester_clients_data_model();
        } 
    }

    public function request_view_all_clients_empty_page(){
        
        echo modules::run('templ/Clients_data/display_all_clients');
    }
    public function request_view_client_model(){
        $check_all_clients = Clients_Model::getSearch(array(),"",array(),true);
        $data_returned['data'] = $check_all_clients;
        $data = json_encode($data_returned);
        echo modules::run('templ/Clients_data/display_all_clients_model', $data);
    }
    public function delete_client_data(){
        $clients_id = $this->uri->rsegment(3);
        $data['enabled'] = 0;
        $delete_client = Clients_Model::update_table($data, "clients_id", "$clients_id");
    
    }
    public function request_view_clients_detail_empty_page(){
      echo modules::run('templ/Clients_data/view_clients_detail_empty_page');
        
    }
    public function request_update_clients_data(){
        $client_id = $this->uri->rsegment(4);
        $client_name = $this->uri->rsegment(5);
        $client_number = $this->uri->rsegment(6);
        $data['client_name'] = $client_name;
        $data['contact_number'] = $client_number;
        Clients_Model::update_table($data, "clients_id", $client_id);
    }
    public function request_regester_clients(){
        echo modules::run('templ/Clients_data/regester_clients_page');
    }
    public function request_regester_clients_data_model(){
        $client_name = $this->uri->rsegment(4);
        $contact_number = $this->uri->rsegment(5);
        $data['client_name'] = $client_name;
        $data['contact_number'] = $contact_number;
        $data['enabled'] = 1;
        Clients_Model::insert_table($data);
    } 

    

    

    

}
