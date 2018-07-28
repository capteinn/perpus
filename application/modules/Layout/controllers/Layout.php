<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Layout extends MX_Controller {

	public function header()
	{
		$this->load->view('dashboard_header');
	}

	public function header_anggota()
	{
		$this->load->view('dashboard_header_anggota');
	}


	public function footer()
	{
		$this->load->view('dashboard_footer');
	}

	public function login_header()
	{
		$this->load->view('login_header');
	}
}