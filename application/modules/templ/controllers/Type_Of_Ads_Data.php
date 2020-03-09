<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Type_Of_Ads_Data extends MX_Controller {

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
	public function regester_transit_ads_page($data)
	{
		$this->load->view('pages/Home/includes/add_transit_ads_page.php', $data);
		
	}
	public function view_account()
	{
		$this->load->view('pages/Home/includes/view_account_page.php');
		
	}
        public function view_requested_transits(){
            $this->load->view('pages/Home/includes/view_requested_transit_page');
        }
}
