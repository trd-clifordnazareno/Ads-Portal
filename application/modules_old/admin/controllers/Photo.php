<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Photop extends MX_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('admin/client_account_data/Client_Account_Data_Model');
        $this->load->model('admin/Contarct_And_Locations/Contract_And_Locations_Model');
        $this->load->model('admin/locations/Locations_Model');
        $this->load->model('admin/Type_Of_Ads/Type_Of_Ads_Model');
        $this->load->model('admin/Type_Of_Ads_Requested/Type_Of_Ads_Requested_Model');
        error_reporting(0);
    }

    public function index() {
        //$this->load->view('welcome_message');
    }

    function request() {
        if ($this->uri->rsegment(3) == "add_new_transit") {
            self::request_add_new_transit();
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

}
