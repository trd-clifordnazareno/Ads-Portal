<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Photo extends MX_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('admin/client_account_data/Client_Account_Data_Model');
        $this->load->model('admin/Contarct_And_Locations/Contract_And_Locations_Model');
        $this->load->model('admin/locations/Locations_Model');
        $this->load->model('admin/Type_Of_Ads/Type_Of_Ads_Model');
        $this->load->model('admin/Type_Of_Ads_Requested/Type_Of_Ads_Requested_Model');
        $this->load->model('admin/Saved_Photo/Saved_Photo_Model');
        $this->load->model('admin/Users/Users_Model');
        error_reporting(0);
    }

    public function index() {
        //$this->load->view('welcome_message');
        $check_log = modules::run("templ/Login_Data/check_login");;
        if($check_log == TRUE){
			echo modules::run('templ/Photo_Data/view_photos_all_page');
		}else{
			echo modules::run("templ/Login_Data/login_page");
		}
        
    }

    function request() {
        if ($this->uri->rsegment(3) == "add_new_transit") {
            self::request_add_new_transit();
        }else if ($this->uri->rsegment(3) == "show_photos") {
            self::request_show_photos();
        }else if ($this->uri->rsegment(3) == "view_photo_model") {
            self::request_view_photo_model();
        }else if ($this->uri->rsegment(3) == "update_checked_selected_photo_model") {
            self::request_update_checked_selected_photo_model();
        }else if ($this->uri->rsegment(3) == "show_photos_returned") {
            self::request_show_photos_returned();
        }
        else if ($this->uri->rsegment(3) == "view_photo_returned_model") {
            self::request_view_photo_returned_model();
        }
        else if($this->uri->rsegment(3) == "approve_photo_model"){
            self::request_approve_photo_model();
        }
        else if($this->uri->rsegment(3) == "view_photo_approve_model"){
            self::request_view_photo_approve_model();
        }else if($this->uri->rsegment(3) == "view_photos"){
            self::request_view_photos();
        }else if($this->uri->rsegment(3) == "blurry_function_model"){
            self::request_blurry_function_model();
        }else if($this->uri->rsegment(3) == "no_news_paper_function_model"){
            self::request_no_news_paper_function_model();
        }else if($this->uri->rsegment(3) == "blurry_photo_model"){
            self::request_blurry_photo_model();
        }else if($this->uri->rsegment(3) == "no_news_paper_model"){
            self::request_no_news_paper_model();
        }else if($this->uri->rsegment(3) == "others_function_model"){
            self::request_others_function_model();
        }else if($this->uri->rsegment(3) == "others_function"){
            self::request_others_function();
        }


        else if($this->uri->rsegment(3) == "transfer_photo_to_view_photo_model"){
            self::request_transfer_photo_to_view_photo_model();
        }else if($this->uri->rsegment(3) == "view_returned_photos_model"){
            self::request_view_returned_photos_model();
        }
        else if($this->uri->rsegment(3) == "view_returned_photos_data_model"){
            self::request_view_returned_photos_data_model();
        }else if($this->uri->rsegment(3) == "delete_photo_returned_model"){
            self::request_delete_photo_returned_model();
        }
    }

    public function request_add_new_transit() {
        echo modules::run('templ/Type_Of_Ads_Data/regester_transit_ads_page');
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
    {
    $config['upload_path'] = './Uploads/';
    $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|mp3|mp4';
    $config['max_filename'] = '255';
    $config['encrypt_name'] = FALSE;
    $config['max_size'] = '25000000';
    $F = array();

    $count_uploaded_files = count( $_FILES['images']);
    $result = array();
    for( $i = 0; $i < $count_uploaded_files; $i++ )
    {
        $_FILES["file"]["name"] = $_FILES["images"]["name"][$i];
        $_FILES["file"]["type"] = $_FILES["images"]["type"][$i];
        $_FILES["file"]["tmp_name"] = $_FILES["images"]["tmp_name"][$i];
        $_FILES["file"]["error"] = $_FILES["images"]["error"][$i];
        $_FILES["file"]["size"] = $_FILES["images"]["size"][$i];
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('file')) {
            $result['errors'][] = $this->upload->display_errors();
        }else{ 
            $result['success'][] = $this->upload->data(); 
        }
    }
    echo json_encode($result);
}
    }
    public function request_show_photos(){
        echo modules::run('templ/Photo_data/show_photos');
    }
    public function request_view_photo_model(){
        $client_contract_id = $this->uri->rsegment(4);
        $location_id = $this->uri->rsegment(5);
        $type_of_ads_id = $this->uri->rsegment(6);
        $plate_number_with_date = $this->uri->rsegment(7);
        $explode_data =  explode("_",$plate_number_with_date);
        $plate_number = $explode_data[0];
        $start_billing = $explode_data[1];
        $end_billing = $explode_data[2];


        
        $client_contract_name = Client_Account_Data_Model::getFields($client_contract_id);
        $location_name = Locations_Model::getFields($location_id);
        $type_of_ads_name_given = Type_Of_Ads_Model::getFields($type_of_ads_id);
        
        $get_all_photo = Saved_Photo_Model::getSearch(array('sp.client_contract_id ='=>$client_contract_id, 'sp.location_id ='=>$location_id, 'sp.type_of_ads_id ='=>$type_of_ads_id, 'sp.item_number ='=>$plate_number, 'sp.returned='=>0, 'sp.start_billing='=>$start_billing, 'sp.end_billing='=>$end_billing),"",array('sp.item_number'=>"ASC"),true);
        $view_all_photo['view_all_photo'] = $get_all_photo;
        $view_all_photo['client_contract_name'] = $client_contract_name->client_name;
        $view_all_photo['location_name'] = $location_name->location_name;
        $view_all_photo['type_of_ads_given_name'] = $type_of_ads_name_given->type_of_ads_serveces;
        $view_all_photo_json_encode = json_encode($view_all_photo);
        echo $view_all_photo_json_encode;
    }
    public function request_update_checked_selected_photo_model(){
        $saved_photo_id = $this->uri->rsegment(9);
        $photo_name = $this->uri->rsegment(4);
        $client_contract_id = $this->uri->rsegment(5);
        $location_id = $this->uri->rsegment(6);
        $type_of_ads_id = $this->uri->rsegment(7);
        $item_number = $this->uri->rsegment(8);

        $check_photos = Saved_Photo_Model::check_save_photos($photo_name, $client_contract_id, $location_id, $type_of_ads_id, $item_number, $saved_photo_id);
        
        if($check_photos){
            $data['returned'] = 1;

            Saved_Photo_Model::update_saved_check_photo_table($data, 'saved_photo_id', 'photo_name', 'client_contract_id', 'location_id', 'type_of_ads_id', 'item_number', $saved_photo_id, $photo_name, $client_contract_id, $location_id, $type_of_ads_id, $item_number);
        }

    }




    public function request_show_photos_returned(){
        echo modules::run('templ/Photo_data/show_photos');
    }
    public function request_view_photo_returned_model(){
        $client_contract_id = $this->uri->rsegment(4);
        $location_id = $this->uri->rsegment(5);
        $type_of_ads_id = $this->uri->rsegment(6);
        $plate_number_with_date = $this->uri->rsegment(7);


        $explode_data =  explode("_",$plate_number_with_date);
        $plate_number = $explode_data[0];
        $start_billing = $explode_data[1];
        $end_billing = $explode_data[2];
        
        $client_contract_name = Client_Account_Data_Model::getFields($client_contract_id);
        $location_name = Locations_Model::getFields($location_id);
        $type_of_ads_name_given = Type_Of_Ads_Model::getFields($type_of_ads_id);
        
        $get_all_photo = Saved_Photo_Model::getSearch(array('sp.client_contract_id ='=>$client_contract_id, 'sp.location_id ='=>$location_id, 'sp.type_of_ads_id ='=>$type_of_ads_id, 'sp.item_number ='=>$plate_number, 'sp.returned='=>1, 'sp.start_billing ='=>$start_billing, 'sp.end_billing ='=>$end_billing),"",array('sp.item_number'=>"ASC"),true);
        $view_all_photo['view_all_photo'] = $get_all_photo;
        $view_all_photo['client_contract_name'] = $client_contract_name->client_name;
        $view_all_photo['location_name'] = $location_name->location_name;
        $view_all_photo['type_of_ads_given_name'] = $type_of_ads_name_given->type_of_ads_serveces;
        $view_all_photo_json_encode = json_encode($view_all_photo);
        echo $view_all_photo_json_encode;
    }




    public function show_modal(){
        echo modules::run('templ/Photo_data/modal');
    }
    public function request_approve_photo_model(){
        $saved_photo_id = $this->uri->rsegment(9);
        $photo_name = $this->uri->rsegment(4);
        $client_contract_id = $this->uri->rsegment(5);
        $location_id = $this->uri->rsegment(6);
        $type_of_ads_id = $this->uri->rsegment(7);
        $item_number = $this->uri->rsegment(8);

        $check_photos = Saved_Photo_Model::check_save_photos($photo_name, $client_contract_id, $location_id, $type_of_ads_id, $item_number, $saved_photo_id);
        
        if($check_photos){
            $data['returned'] = 2;

            Saved_Photo_Model::update_saved_check_photo_table($data, 'saved_photo_id', 'photo_name', 'client_contract_id', 'location_id', 'type_of_ads_id', 'item_number', $saved_photo_id, $photo_name, $client_contract_id, $location_id, $type_of_ads_id, $item_number);
        }
    }




    public function request_view_photo_approve_model(){
        $client_contract_id = $this->uri->rsegment(4);
        $location_id = $this->uri->rsegment(5);
        $type_of_ads_id = $this->uri->rsegment(6);
        $plate_number_with_date = $this->uri->rsegment(7);


        $explode_data =  explode("_",$plate_number_with_date);
        $plate_number = $explode_data[0];
        $start_billing = $explode_data[1];
        $end_billing = $explode_data[2];
        
        $client_contract_name = Client_Account_Data_Model::getFields($client_contract_id);
        $location_name = Locations_Model::getFields($location_id);
        $type_of_ads_name_given = Type_Of_Ads_Model::getFields($type_of_ads_id);
        
        $get_all_photo = Saved_Photo_Model::getSearch(array('sp.client_contract_id ='=>$client_contract_id, 'sp.location_id ='=>$location_id, 'sp.type_of_ads_id ='=>$type_of_ads_id, 'sp.item_number ='=>$plate_number, 'sp.returned='=>2, 'sp.start_billing ='=>$start_billing, 'sp.end_billing ='=>$end_billing),"",array('sp.item_number'=>"ASC"),true);
        $view_all_photo['view_all_photo'] = $get_all_photo;
        $view_all_photo['client_contract_name'] = $client_contract_name->client_name;
        $view_all_photo['location_name'] = $location_name->location_name;
        $view_all_photo['type_of_ads_given_name'] = $type_of_ads_name_given->type_of_ads_serveces;
        $view_all_photo_json_encode = json_encode($view_all_photo);
        echo $view_all_photo_json_encode;
    }




    public function request_view_photos(){
        echo modules::run('templ/Photo_Data/view_photos');
    }




    public function request_blurry_function_model(){
        $saved_photo_id = $this->uri->rsegment(9);
        $photo_name = $this->uri->rsegment(4);
        $client_contract_id = $this->uri->rsegment(5);
        $location_id = $this->uri->rsegment(6);
        $type_of_ads_id = $this->uri->rsegment(7);
        $item_number = $this->uri->rsegment(8);

        $check_photos = Saved_Photo_Model::check_save_photos($photo_name, $client_contract_id, $location_id, $type_of_ads_id, $item_number, $saved_photo_id);
        
        if($check_photos){
            $data['returned'] = 3;

            Saved_Photo_Model::update_saved_check_photo_table($data, 'saved_photo_id', 'photo_name', 'client_contract_id', 'location_id', 'type_of_ads_id', 'item_number', $saved_photo_id, $photo_name, $client_contract_id, $location_id, $type_of_ads_id, $item_number);
        }
    }




    public function request_no_news_paper_function_model(){
        $saved_photo_id = $this->uri->rsegment(9);
        $photo_name = $this->uri->rsegment(4);
        $client_contract_id = $this->uri->rsegment(5);
        $location_id = $this->uri->rsegment(6);
        $type_of_ads_id = $this->uri->rsegment(7);
        $item_number = $this->uri->rsegment(8);

        $check_photos = Saved_Photo_Model::check_save_photos($photo_name, $client_contract_id, $location_id, $type_of_ads_id, $item_number, $saved_photo_id);
        
        if($check_photos){
            $data['returned'] = 4;

            Saved_Photo_Model::update_saved_check_photo_table($data, 'saved_photo_id', 'photo_name', 'client_contract_id', 'location_id', 'type_of_ads_id', 'item_number', $saved_photo_id, $photo_name, $client_contract_id, $location_id, $type_of_ads_id, $item_number);
        }
    }




    public function request_blurry_photo_model(){
        $client_contract_id = $this->uri->rsegment(4);
        $location_id = $this->uri->rsegment(5);
        $type_of_ads_id = $this->uri->rsegment(6);
        $plate_number_with_date = $this->uri->rsegment(7);


        $explode_data =  explode("_",$plate_number_with_date);
        $plate_number = $explode_data[0];
        $start_billing = $explode_data[1];
        $end_billing = $explode_data[2];
        
        $client_contract_name = Client_Account_Data_Model::getFields($client_contract_id);
        $location_name = Locations_Model::getFields($location_id);
        $type_of_ads_name_given = Type_Of_Ads_Model::getFields($type_of_ads_id);
        
        $get_all_photo = Saved_Photo_Model::getSearch(array('sp.client_contract_id ='=>$client_contract_id, 'sp.location_id ='=>$location_id, 'sp.type_of_ads_id ='=>$type_of_ads_id, 'sp.item_number ='=>$plate_number, 'sp.returned='=>3, 'sp.start_billing ='=>$start_billing, 'sp.end_billing ='=>$end_billing),"",array('sp.item_number'=>"ASC"),true);
        $view_all_photo['view_all_photo'] = $get_all_photo;
        $view_all_photo['client_contract_name'] = $client_contract_name->client_name;
        $view_all_photo['location_name'] = $location_name->location_name;
        $view_all_photo['type_of_ads_given_name'] = $type_of_ads_name_given->type_of_ads_serveces;
        $view_all_photo_json_encode = json_encode($view_all_photo);
        echo $view_all_photo_json_encode;
    }




    public function request_no_news_paper_model(){
        $client_contract_id = $this->uri->rsegment(4);
        $location_id = $this->uri->rsegment(5);
        $type_of_ads_id = $this->uri->rsegment(6);
        $plate_number_with_date = $this->uri->rsegment(7);


        $explode_data =  explode("_",$plate_number_with_date);
        $plate_number = $explode_data[0];
        $start_billing = $explode_data[1];
        $end_billing = $explode_data[2];
        
        $client_contract_name = Client_Account_Data_Model::getFields($client_contract_id);
        $location_name = Locations_Model::getFields($location_id);
        $type_of_ads_name_given = Type_Of_Ads_Model::getFields($type_of_ads_id);
        
        $get_all_photo = Saved_Photo_Model::getSearch(array('sp.client_contract_id ='=>$client_contract_id, 'sp.location_id ='=>$location_id, 'sp.type_of_ads_id ='=>$type_of_ads_id, 'sp.item_number ='=>$plate_number, 'sp.returned='=>4, 'sp.start_billing ='=>$start_billing, 'sp.end_billing ='=>$end_billing),"",array('sp.item_number'=>"ASC"),true);
        $view_all_photo['view_all_photo'] = $get_all_photo;
        $view_all_photo['client_contract_name'] = $client_contract_name->client_name;
        $view_all_photo['location_name'] = $location_name->location_name;
        $view_all_photo['type_of_ads_given_name'] = $type_of_ads_name_given->type_of_ads_serveces;
        $view_all_photo_json_encode = json_encode($view_all_photo);
        echo $view_all_photo_json_encode;
    }




    public function request_others_function(){
        $client_contract_id = $this->uri->rsegment(4);
        $location_id = $this->uri->rsegment(5);
        $type_of_ads_id = $this->uri->rsegment(6);
        $plate_number_with_date = $this->uri->rsegment(7);


        $explode_data =  explode("_",$plate_number_with_date);
        $plate_number = $explode_data[0];
        $start_billing = $explode_data[1];
        $end_billing = $explode_data[2];
        
        $client_contract_name = Client_Account_Data_Model::getFields($client_contract_id);
        $location_name = Locations_Model::getFields($location_id);
        $type_of_ads_name_given = Type_Of_Ads_Model::getFields($type_of_ads_id);
        
        $get_all_photo = Saved_Photo_Model::getSearch(array('sp.client_contract_id ='=>$client_contract_id, 'sp.location_id ='=>$location_id, 'sp.type_of_ads_id ='=>$type_of_ads_id, 'sp.item_number ='=>$plate_number, 'sp.returned='=>5, 'sp.start_billing ='=>$start_billing, 'sp.end_billing ='=>$end_billing),"",array('sp.item_number'=>"ASC"),true);
        $view_all_photo['view_all_photo'] = $get_all_photo;
        $view_all_photo['client_contract_name'] = $client_contract_name->client_name;
        $view_all_photo['location_name'] = $location_name->location_name;
        $view_all_photo['type_of_ads_given_name'] = $type_of_ads_name_given->type_of_ads_serveces;
        $view_all_photo_json_encode = json_encode($view_all_photo);
        echo $view_all_photo_json_encode;
    }




    public function request_others_function_model(){
        $saved_photo_id = $this->uri->rsegment(9);
        $photo_name = $this->uri->rsegment(4);
        $client_contract_id = $this->uri->rsegment(5);
        $location_id = $this->uri->rsegment(6);
        $type_of_ads_id = $this->uri->rsegment(7);
        $item_number = $this->uri->rsegment(8);
        $txt_message = $this->uri->rsegment(10);

        $check_photos = Saved_Photo_Model::check_save_photos($photo_name, $client_contract_id, $location_id, $type_of_ads_id, $item_number, $saved_photo_id);
        
        if($check_photos){
            $data['returned'] = 5;
            $data['message'] = $txt_message;

            Saved_Photo_Model::update_saved_check_photo_table($data, 'saved_photo_id', 'photo_name', 'client_contract_id', 'location_id', 'type_of_ads_id', 'item_number', $saved_photo_id, $photo_name, $client_contract_id, $location_id, $type_of_ads_id, $item_number);
        }
    }


    public function request_transfer_photo_to_view_photo_model(){
        $photo_name = $this->uri->rsegment(4);
        $saved_photo_id = $this->uri->rsegment(5);
        $data['returned'] = 0;
        Saved_Photo_Model::update_table_transfer_to_view_photo($data, "saved_photo_id", "photo_name", $saved_photo_id, $photo_name);
        echo $saved_photo_id . "ok";
    }




    public function view_all_transactions_model(){
        $client_contract_id = $this->uri->rsegment(3);
        $start_billing = $this->uri->rsegment(4);
        $end_billing = $this->uri->rsegment(5);




        $get_all_photo = Saved_Photo_Model::getSearch(array(),"",array('sp.saved_photo_id'=>"ASC"),true);
        foreach($get_all_photo as $get_all_photo_data){
            $get_photo_id_data = $get_all_photo_data->client_contract_id;
            $get_photo_message = $get_all_photo_data->message;
            if($get_photo_id_data == $client_contract_id){
                if($get_photo_message != NULL){
                    $returned = $get_all_photo_data->returned;
                    $data['returned'] = 1;
                    Saved_Photo_Model::update_message_table($data, "client_contract_id", $client_contract_id);
                }
            }
        }




        $check_log = modules::run("templ/Login_Data/check_login");;
        if($check_log == TRUE){
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
        }
        $get_user_name = Users_Model::getFields($user_id);
        $users_username = $get_user_name->username;
        
        $check['view_all_transactions'] = Saved_Photo_Model::getSearch(array('sp.client_contract_id ='=>$client_contract_id, 'sp.type_of_ads_id ='=>1, 'sp.start_billing ='=>$start_billing, 'sp.end_billing ='=>$end_billing),"",array('sp.location_id'=>"ASC"),true);

        $check['check_loc'] = Locations_Model::getSearch(array(),"",array('loc.location_id'=>"ASC"),true);

        $check_client_name = Client_Account_Data_Model::getFields($client_contract_id);
        $check['client_name'] = $check_client_name->client_name;

        $check['client_no_of_units'] = $check_client_name->no_unit;

        $check_count = Saved_Photo_Model::count_no_of_success($client_contract_id, '2', $start_billing, $end_billing);
        $check['check_count'] = $check_count;

        $check['usersname'] = $users_username;


        $view_all_photo_json_encode = json_encode($check);
        echo $view_all_photo_json_encode;
        
    }

    public function disapproved_photo_model(){
        $saved_photo_id = $this->uri->rsegment(3);
        $client_contract_id = $this->uri->rsegment(4);
        $location_id = $this->uri->rsegment(5);
        $item_number = $this->uri->rsegment(6);
        $photo_name = $this->uri->rsegment(7);
        
        $data['returned'] = 1;
        Saved_Photo_Model::update_table_disapproved_photo_model($data, "saved_photo_id", "client_contract_id", "location_id", "item_number", "photo_name", $saved_photo_id,$client_contract_id,$location_id,$item_number,$photo_name);


    }




    public function approved_photo_model(){
        $saved_photo_id = $this->uri->rsegment(3);
        $client_contract_id = $this->uri->rsegment(4);
        $location_id = $this->uri->rsegment(5);
        $item_number = $this->uri->rsegment(6);
        $photo_name = $this->uri->rsegment(7);
        
        $data['returned'] = 2;
        Saved_Photo_Model::update_table_disapproved_photo_model($data, "saved_photo_id", "client_contract_id", "location_id", "item_number", "photo_name", $saved_photo_id,$client_contract_id,$location_id,$item_number,$photo_name);


    }


    public function others_function_model_model(){
        $saved_photo_id = $this->uri->rsegment(3);
        $client_contract_id = $this->uri->rsegment(4);
        $location_id = $this->uri->rsegment(5);
        $item_number = $this->uri->rsegment(6);
        $photo_name = $this->uri->rsegment(7);
        $photo_text = $this->uri->rsegment(8);
        
        $data['returned'] = 5;
        $data['message'] = urldecode($photo_text);
        Saved_Photo_Model::update_table_disapproved_photo_model($data, "saved_photo_id", "client_contract_id", "location_id", "item_number", "photo_name", $saved_photo_id,$client_contract_id,$location_id,$item_number,$photo_name);


    }


    public function request_view_returned_photos_model(){
        echo modules::run('templ/Photo_Data/view_returned_photos_page');
    }


    public function request_view_returned_photos_data_model(){
        $check_ret_photo = Saved_Photo_Model::check_ret_photo();
        $check_all_client = Client_Account_Data_Model::getSearch(array(),"",array('cad.contract_client_id'=>"ASC"),true);
        $check_all_loc = Locations_Model::getSearch(array(),"",array('loc.location_id'=>"ASC"),true);
        
        $data['check_ret_photo'] = $check_ret_photo;
        $data['check_all_client'] = $check_all_client;
        $data['check_all_loc'] = $check_all_loc;


        $view_all_photo_json_encode = json_encode($data);
        echo $view_all_photo_json_encode;
    }


    public function request_delete_photo_returned_model(){
        $photo_name = $this->uri->rsegment(4);
        $photo_id = $this->uri->rsegment(5);
        $client_name = $this->uri->rsegment(6);
        $location_name = $this->uri->rsegment(7);
        $item_number = $this->uri->rsegment(8);
        
        $data['enabled'] = 0;
        $data['returned'] = "9";
        Saved_Photo_Model::update_table_delete_photo_model($data, "saved_photo_id", "photo_name", $photo_id,$photo_name);
        $file = "Uploads/2020/$client_name/$location_name/transits/$item_number/$photo_name";
        
        $dir_file = dirname($file);
        unlink(urldecode($dir_file . "/$photo_name"));

    }
    

}
