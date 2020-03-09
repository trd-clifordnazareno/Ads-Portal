<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Route extends MX_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function func($data)
	{
		$this->load->view('pages/Home/Home_page.php', $data);
		
	}
	public function view_account()
	{
		$this->load->view('pages/Home/includes/view_account_page.php');
		
	}
	public function api(){
		$data = json_decode(file_get_contents("php://input"));
		//echo json_encode(array($data));
		echo $data->login;
	}
}
