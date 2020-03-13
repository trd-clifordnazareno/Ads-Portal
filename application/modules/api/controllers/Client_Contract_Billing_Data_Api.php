<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Client_Contract_Billing_Data_Api extends MX_Controller {

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
    public function create_monthly_billing_api($data){
        $data = json_decode($data);
        $client_contract_id_api = $data->client_contract_id_api;
        $client_contract_number_api = $data->client_contract_number_api;
        $client_name_api = $data->client_name_api;
        $explode_client_name_api = $data->explode_client_name_api;
        $implode_client_name_api = $data->implode_client_name_api;

        $curl = curl_init();
        $curl = curl_init();
        
        $base_url = base_url();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "$base_url/index.php/api/Client_Contract_Billing_Data_Api/create_monthly_billing_api_request?client_contract_id_api=$client_contract_id_api&client_contract_number_api=$client_contract_number_api&client_name_api=$client_name_api&explode_client_name_api=$explode_client_name_api&implode_client_name_api=$implode_client_name_api&",
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




    public function create_monthly_billing_api_request(){
        $client_contract_id = $_GET['client_contract_id_api'];
        $client_contract_number = $_GET['client_contract_number_api'];
        $get_client_contarct_monthly_billing = Client_Contract_Billing_Model::getSearch(array('ccb.client_contract_id ='=>$client_contract_id, 'ccb.client_contract_code ='=>$client_contract_number),"",array(),true);
        echo json_encode($get_client_contarct_monthly_billing);
    }



    

}
