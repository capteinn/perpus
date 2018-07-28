<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MX_Controller {

	function __construct() {
            parent::__construct();
			$this->load->model('Home_m');
			//$this->load->helper('my_url');
         }

	public function index(){
		$this->load->view('index');
	}

	public function buku(){
		$get = $this->Home_m->show_all()->result();
	   	$data =array (
			'get' => $get
		);	
		$this->load->view('home_buku',$data);
	}
}