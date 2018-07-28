<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_anggota extends MX_Controller {
	function __construct() {
        parent::__construct();
		$this->load->model('Dashboard_m');
		$this->load->model('Sirkulasi_m');
		//$this->load->helper('my_url');
    }
    
	public function index()
	{
		$anggota = $this->Dashboard_m->count_anggota();
		$buku = $this->Dashboard_m->count_buku();
		$pinjam = $this->Dashboard_m->count_pinjam();
		$id_anggota = $this->session->userdata('id_anggota');
		// var_dump($id_anggota);exit;
		$get = $this->Sirkulasi_m->show_all($id_anggota)->result();
		
		$data = array(
			'anggota' => $anggota,
			'buku' => $buku,
			'get' => $get,
			'pinjam' => $pinjam
		);
		
		$this->load->module('Layout');
        $this->layout->header_anggota();
		$this->load->view('index2', $data);	
		$this->layout->footer();
	}
	
	public function detail($id) {
		    $get_detail = $this->Sirkulasi_m->get_detail_by_id($id)->result();
			$data =array (
				'get_detail' => $get_detail
			);
			$this->load->module('Layout');
        $this->layout->header_anggota();
			$this->load->view('sirkulasi_detail',$data);
        	$this->layout->footer();
	}

}