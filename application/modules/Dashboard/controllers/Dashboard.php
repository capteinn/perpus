<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MX_Controller {
	function __construct() {
        parent::__construct();
		$this->load->model('Dashboard_m');
		//$this->load->helper('my_url');
    }

	public function index()
	{
		$anggota = $this->Dashboard_m->count_anggota();
		$buku = $this->Dashboard_m->count_buku();
		$pinjam = $this->Dashboard_m->count_pinjam();
		$get = $this->Dashboard_m->show_all()->result();
		$getA = $this->Dashboard_m->show_all_anggota()->result();
		$data = array(
			'anggota' => $anggota,
			'buku' => $buku,
			'pinjam' => $pinjam,
			'get'=>$get,
			'getA'=>$getA
		);
		$this->load->module('Layout');
        $this->layout->header();
		$this->load->view('index2', $data);	
		$this->layout->footer();
	}

}