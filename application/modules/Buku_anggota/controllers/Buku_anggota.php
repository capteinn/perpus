<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Buku_anggota extends MX_Controller {

	function __construct() {
            parent::__construct();
			$this->load->model('Buku_m');
			//$this->load->helper('my_url');
         }

	public function index(){
		if($this->session->userdata('logged_admin')) {
		    $session_data = $this->session->userdata('logged_admin');
		    /*
		   	$this->load->module('layout');
     		$this->layout->index($username);
     		*/
		    $get = $this->Buku_m->show_all()->result();
		   	$data =array (
				'get' => $get
			);	
			$this->load->module('Layout');
        	$this->layout->header_anggota();
			$this->load->view('buku_v',$data);
        	$this->layout->footer();
		}
		else {
			redirect('login_anggota');
		}
	}
	
}