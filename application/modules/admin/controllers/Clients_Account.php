<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Clients_Account extends MX_Controller {

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

    function request() {
        if ($this->uri->rsegment(3) == "view_clients_account_details") {
            self::request_view_clients_account_details();
        } else if ($this->uri->rsegment(3) == "display_client_account_details_model") {
            self::request_display_client_account_details_model();
        } else if ($this->uri->rsegment(3) == "update_client_account") {
            self::request_update_client_account();
        } else if ($this->uri->rsegment(3) == "message_notification") {
            self::request_message_notification();
        }else if ($this->uri->rsegment(3) == "regester_clients_account") {
            self::request_regester_clients_account();
        }else if ($this->uri->rsegment(3) == "regester_clients_account_model") {
            self::request_regester_clients_account_model();
        }else if ($this->uri->rsegment(3) == "insert_client_account_location_model") {
            self::request_insert_client_account_location_model();
        }else if ($this->uri->rsegment(3) == "message_notification_with_data") {
            self::request_message_notification_with_data();
        }else if ($this->uri->rsegment(3) == "view_client_contract_locations") {
            self::request_view_client_contract_locations();
        }else if ($this->uri->rsegment(3) == "view_client_contract_locations_list") {
            self::request_view_client_contract_locations_list();
        }else if ($this->uri->rsegment(3) == "delete_clients_contract_location") {
            self::request_delete_clients_contract_location();
        }
        else if ($this->uri->rsegment(3) == "insert_new_client_account_location_model") {
            self::request_insert_new_client_account_location_model();
        }




        else if ($this->uri->rsegment(3) == "view_all_transactions") {
            self::request_view_all_transactions();
        }else if ($this->uri->rsegment(3) == "get_all_locations") {
            self::request_get_all_locations();
        }
    }

    public function delete_client_account($client_id) {
        echo "1";
        $data['enabled'] = 0;
        Client_Account_Data_Model::update_table($data, "contract_client_id", "$client_id");
    }

    public function request_view_clients_account_details() {

        echo modules::run('templ/Clients_Account_Contract/view_account_contract');
    }

    public function request_display_client_account_details_model() {
        $client_id = $this->uri->rsegment(3);

        $check_client_account_id = Client_Account_Data_Model::getFields($client_id);
        if ($check_client_account_id) {
            $contract_client_id = $check_client_account_id->contract_client_id;
            $client_name = $check_client_account_id->client_name;
            $no_unit = $check_client_account_id->no_unit;
            $locations_id = $check_client_account_id->locations_id;
            $date_from_billing_period = $check_client_account_id->date_from_billing_period;
            $date_to_billing_period = $check_client_account_id->date_to_billing_period;
            $soa = $check_client_account_id->soa;
            $ref_no = $check_client_account_id->ref_no;
            $contract_number = $check_client_account_id->contract_number;
            $enabled = $check_client_account_id->enabled;

            $data['contract_client_id'] = $contract_client_id;
            $data['client_name'] = $client_name;
            $data['no_unit'] = $no_unit;
            $data['locations_id'] = $locations_id;
            $data['date_from_billing_period'] = $date_from_billing_period;
            $data['date_to_billing_period'] = $date_to_billing_period;
            $data['soa'] = $soa;
            $data['ref_no'] = $ref_no;
            $data['contract_number'] = $contract_number;
            $data['enabled'] = $enabled;

            $data_json_encoded = json_encode($data);
            echo modules::run('templ/Clients_Account_Contract/display_client_account_details_model', $data_json_encoded);
        }
    }

    public function request_update_client_account() {

        $client_id = $this->uri->rsegment(4);
        $client_name = $this->uri->rsegment(5);
        $contract_number = $this->uri->rsegment(6);
        $data['client_name'] = $client_name;
        $data['contract_number'] = $contract_number;
        Client_Account_Data_Model::update_table($data, "contract_client_id", $client_id);

        $check_client_account_id = Client_Account_Data_Model::getFields($client_id);
        if ($check_client_account_id) {
            $client_name = $check_client_account_id->client_name;
            $contract_number = $check_client_account_id->contract_number;
            $data_array_for_client_contract = array(
                'client_name' => $client_name,
                'contract_number' => $contract_number
            );
        }
        $data = $data_array_for_client_contract;


        $data_to_json = json_encode($data);

        echo modules::run('templ/Clients_Account_Contract/request_update_client_account_model', $data_to_json);
    }

    public function request_message_notification() {
        echo modules::run('templ/Clients_Account_Contract/message_notification');
    }
    public function request_regester_clients_account(){
        echo modules::run('templ/Clients_Account_Contract/regester_clients_account');
    }
    public function request_get_all_locations(){
        $data['all_locations_list'] = Locations_Model::getSearch(array(),"",array(),true);;
        $data_to_json = json_encode($data);
        echo $data_to_json;
    }
    public function request_regester_clients_account_model(){
        $client_name = urldecode($this->uri->rsegment(4));
        $contact_number = urldecode($this->uri->rsegment(5));
        $date_from_billing_period = $this->uri->rsegment(6);
        $date_to_billing_period = $this->uri->rsegment(7);
        $soa = $this->uri->rsegment(8);
        $no_units = $this->uri->rsegment(9);
        $data['client_name'] = $client_name;
        $data['contract_number'] = $contact_number;
        $data['date_from_billing_period'] = $date_from_billing_period;
        $data['date_to_billing_period'] = $date_to_billing_period;
        $data['soa'] = $soa;
        $data['no_unit'] = $no_units;
        $data['enabled'] = 1;
        Client_Account_Data_Model::insert_table($data);
    }
    public function request_insert_client_account_location_model(){
        $location_id = $this->uri->rsegment(4);
        $client_contract_id = $this->uri->rsegment(5);
        $check_client_contract_id_and_location_id = Contract_And_Locations_Model::check_client_contract_id_and_location_id($location_id, $client_contract_id);
        if($check_client_contract_id_and_location_id){
            /// print something here
        }else{
            $data['location_id'] = $location_id;
            $data['client_contract_id'] = $client_contract_id;
            $data['enabled'] = 1;
            Contract_And_Locations_Model::insert_table($data);
            $data['insert_success'] = 1;
            $data_to_json = json_encode($data);
            echo $data_to_json;
        }
        
    }
    public function request_insert_new_client_account_location_model(){
        $location_id = $this->uri->rsegment(4);
        $client_contract_id = $this->uri->rsegment(5);


        $check_contract_number = Client_Account_Data_Model::getcontractnumber($client_contract_id);
        if($check_contract_number){
            $contract_client_id = $check_contract_number->contract_client_id;echo $contract_client_id;
        }
        $check_client_contract_id_and_location_id = Contract_And_Locations_Model::check_client_contract_id_and_location_id($location_id, $contract_client_id);
        if($check_client_contract_id_and_location_id){
            /// print something here
        }else{
            $data['location_id'] = $location_id;
            $data['client_contract_id'] = $contract_client_id;
            $data['enabled'] = 1;
            Contract_And_Locations_Model::insert_table($data);
            $data['insert_success'] = 1;
            $data_to_json = json_encode($data);
            echo $data_to_json;
        }
        
    }
    public function request_message_notification_with_data(){
        $status_message['data'] = $this->uri->rsegment(4);
        $status_message['notification_message'] = $this->uri->rsegment(5);
        echo modules::run('templ/Clients_Account_Contract/request_message_notification', $status_message);
    }
    public function request_view_client_contract_locations(){
        echo modules::run('templ/Clients_Account_Contract/view_client_contract_locations');
    }
    public function request_view_client_contract_locations_list(){
        $client_contract_id = $this->uri->rsegment(4);
        $get_client_contract_name = Client_Account_Data_Model::getFields($client_contract_id);
        $client_name = $get_client_contract_name->client_name;
        $data = Contract_And_Locations_Model::getSearch(array('cal.client_contract_id ='=>$client_contract_id),"",array('cal.locations_of_contract_id'=>"ASC"),true);
        $data_type_of_add_list = Type_Of_Ads_Model::getSearch(array(),"",array(),true);
        $get_all_locations_list = Locations_Model::getSearch(array(),"",array(),true);
        $get_returned_data['client_contract_locations'] = $data;
        $get_returned_data['all_locations_list'] = $get_all_locations_list;
        $get_returned_data['client_name'] = $client_name;
        $get_returned_data['type_of_add_list'] = $data_type_of_add_list;
        $data_to_json = json_encode($get_returned_data);
        echo $data_to_json;
    }
    public function request_delete_clients_contract_location(){
        $client_contract_id = $this->uri->rsegment(4);
        $location_id = $this->uri->rsegment(5);
        $data['enabled'] = 0;
        $delete_client_contract_locations = Contract_And_Locations_Model::delete_client_contract_locations($data, "client_contract_id", "location_id", $client_contract_id, $location_id);
        $deleted_succes = $delete_client_contract_locations;
        if($deleted_succes == 1){
            $status['deleted_success'] = $deleted_succes;
            $data_to_json = json_encode($status);
        }else{
            $status['deleted_success'] = 0;
            $data_to_json = json_encode($status);
        }
        echo $data_to_json;
    }




    public function request_view_all_transactions(){
        echo modules::run('templ/Clients_Account_Contract/view_all_transactions');
    }

}
