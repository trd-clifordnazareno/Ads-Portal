<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Type_Of_Ads extends MX_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('admin/client_account_data/Client_Account_Data_Model');
        $this->load->model('admin/Contarct_And_Locations/Contract_And_Locations_Model');
        $this->load->model('admin/locations/Locations_Model');
        $this->load->model('admin/Type_Of_Ads/Type_Of_Ads_Model');
        $this->load->model('admin/Type_Of_Ads_Requested/Type_Of_Ads_Requested_Model');
        $this->load->model('admin/Saved_Photo/Saved_Photo_Model');
        error_reporting(0);
    }

    public function index() {
        //$this->load->view('welcome_message');
    }

    function request() {
        if ($this->uri->rsegment(3) == "add_new_transit") {
            self::request_add_new_transit();
        }else if ($this->uri->rsegment(3) == "insert_new_transit") {
            self::request_insert_new_transit();
        }else if ($this->uri->rsegment(3) == "view_requested_transits") {
            self::request_view_requested_transits();
        }else if ($this->uri->rsegment(3) == "view_all_transits_requested") {
            self::request_view_all_transits_requested();
        } 
    }

    public function request_add_new_transit(){
        echo modules::run('templ/Type_Of_Ads_Data/regester_transit_ads_page');
    }
    public function request_insert_new_transit(){
        $plate_number = $this->uri->rsegment(4);
        $transit_type = $this->uri->rsegment(5);
        $client_contract_id = $this->uri->rsegment(6);
        $location_id = $this->uri->rsegment(7);
        $type_of_ads = $this->uri->rsegment(8);
        $data['plate_number'] = $plate_number;
        $data['type_of_transit'] = $transit_type;
        $data['client_contract_id'] = $client_contract_id;
        $data['location_id'] = $location_id;
        $data['type_of_ads'] = $type_of_ads;
        $data['enabled'] = 1;
        
        
        
        $get_client_contract_name = Client_Account_Data_Model::getFields($client_contract_id);
        if($get_client_contract_name){$client_contract_given_output_name = $get_client_contract_name->client_name;}
        $get_location_name = Locations_Model::getFields($location_id);
        if($get_location_name){$location_output_given_name = $get_location_name->location_name;}
        $get_type_of_ads_name = Type_Of_Ads_Model::getFields($type_of_ads);
        if($get_type_of_ads_name){$type_of_ads_output_given_name = $get_type_of_ads_name->type_of_ads_serveces;}
        
        $current_dir = getcwd();
        $check_date = date("Y");
        mkdir("$current_dir . /Uploads/$check_date/$client_contract_given_output_name/$location_output_given_name/$type_of_ads_output_given_name/$plate_number", 7777);
        
        Type_Of_Ads_Requested_Model::insert_table($data);
    }
    public function request_view_requested_transits(){
        echo modules::run('templ/Type_Of_Ads_Data/view_requested_transits');
    }
    public function request_view_all_transits_requested(){
        $client_contract_id = $this->uri->rsegment(4);
        $location_id = $this->uri->rsegment(5);
        $type_of_ads_id = $this->uri->rsegment(6);
        
        $get_client_contract_name = Client_Account_Data_Model::getFields($client_contract_id);
        $get_all_requested_transits = Type_Of_Ads_Requested_Model::getSearch(array('toar.client_contract_id ='=>$client_contract_id, 'toar.location_id'=>$location_id, 'toar.type_of_ads'=>$type_of_ads_id),"",array('toar.type_of_transit'=>"ASC"),true);
        if($get_all_requested_transits){
            $data['get_all_requested_transits'] = $get_all_requested_transits;
            $data['client_name'] = $get_client_contract_name->client_name;
            $data['has_list'] = 1;
            $data_to_json = json_encode($data);
        }else{
            $data['has_list'] = 0;
            $data_to_json = json_encode($data);
        }
        echo $data_to_json;
    }
    
    
    
    
    
    
    public function multiple_files_no_ajax() {
        $this->load->library('upload');
        $image = array();
        $ImageCount = count($_FILES['image_name']['name']);
        for ($i = 0; $i < $ImageCount; $i++) {
            $_FILES['file']['name'] = $_FILES['image_name']['name'][$i];
            $_FILES['file']['type'] = $_FILES['image_name']['type'][$i];
            $_FILES['file']['tmp_name'] = $_FILES['image_name']['tmp_name'][$i];
            $_FILES['file']['error'] = $_FILES['image_name']['error'][$i];
            $_FILES['file']['size'] = $_FILES['image_name']['size'][$i];

            // File upload configuration
            $uploadPath = './Uploads/';
            $config['upload_path'] = $uploadPath;
            $config['allowed_types'] = 'jpg|jpeg|png|gif';

            // Load and initialize upload library
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            // Upload file to server
            if ($this->upload->do_upload('file')) {
                // Uploaded file data
                $imageData = $this->upload->data();
                $uploadImgData[$i]['image_name'] = $imageData['file_name'];
            }
        }
        if (!empty($uploadImgData)) {
            // Insert files data into the database
            //$this->pages_model->multiple_images($uploadImgData);              
        }
    }
    
    
    
    
    public function multiple_files(){ 
        $client_name = $this->uri->rsegment(3);
        $type_of_transit = $this->uri->rsegment(4);
        $item_number = $this->uri->rsegment(5);
        $location_id = $this->uri->rsegment(6);
        $type_of_ads_id = $this->uri->rsegment(7);
        $client_contract_id = $this->uri->rsegment(8);
        $get_location_name = Locations_Model::getFields($location_id);
        $get_type_of_ads_name = Type_Of_Ads_Model::getFields($type_of_ads_id);
        $location_name_fields = $get_location_name->location_name;
        $type_of_ads_name = $get_type_of_ads_name->type_of_ads_serveces;
        $year = date("Y");
            $config['upload_path'] = "./Uploads/$year/$client_name/$location_name_fields/$type_of_ads_name/$item_number";
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|mp3|mp4';
            $config['max_filename'] = '255';
            $config['encrypt_name'] = FALSE;
            $config['max_size'] = '25000000';
            $F = array();

            $count_uploaded_files = count($_FILES['images']);
            $result = array();
            for ($i = 0; $i < $count_uploaded_files; $i++) {
                $_FILES["file"]["name"] = $_FILES["images"]["name"][$i];
                $_FILES["file"]["type"] = $_FILES["images"]["type"][$i];
                $_FILES["file"]["tmp_name"] = $_FILES["images"]["tmp_name"][$i];
                $_FILES["file"]["error"] = $_FILES["images"]["error"][$i];
                $_FILES["file"]["size"] = $_FILES["images"]["size"][$i];
                
                $get_client_contract_id = Client_Account_Data_Model::getfields($client_contract_id);
                $get_client_contract_id_returned_data = $get_client_contract_id->contract_client_id;
                $file_name = $_FILES["file"]["name"];
                $insert_data['photo_name'] = $file_name;
                $insert_data['client_contract_id'] = $get_client_contract_id_returned_data;
                        $insert_data['location_id'] = $location_id;
                        $insert_data['type_of_ads_id'] = $type_of_ads_id;
                        $insert_data['item_number'] = $item_number;
                        $insert_data['enabled'] = 1;
                Saved_Photo_Model::insert_table($insert_data);
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('file')) {
                    $result['errors'][] = $this->upload->display_errors();
                } else {
                    $result['success'][] = $this->upload->data();
                }
            }
            //echo json_encode($result);
        
    }

   

    

    
    
    
    
    

}
