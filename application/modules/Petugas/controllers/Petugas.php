<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Petugas extends MX_Controller {

	function __construct() {
            parent::__construct();
			$this->load->model('Petugas_m');
			//$this->load->helper('my_url');
         }

	public function index(){
		if($this->session->userdata('logged_admin')) {
		    $session_data = $this->session->userdata('logged_admin');
		    $username = $session_data['username'];
		    /*
		   	$this->load->module('layout');
     		$this->layout->index($username);
     		*/
		    $get = $this->Petugas_m->show_all()->result();
		   	$data =array (
				'get' => $get
			);	
			$this->load->module('Layout');
        	$this->layout->header();
			$this->load->view('petugas_v',$data);
        	$this->layout->footer();
		}
		else {
			redirect('login');
		}
	}

	public function tambah_petugas() {
		if($this->session->userdata('logged_admin')) {
		    $session_data = $this->session->userdata('logged_admin');
		    $username = $session_data['username'];

		   	$this->load->module('Layout');
        	$this->layout->header();
			$this->load->view('petugas_add');
			$this->load->module('layout');
        	$this->layout->footer();
		}
		else {
			redirect('login');
		}
	}

	public function proses_tambah_petugas() {
		if($this->session->userdata('logged_admin')) {
			$session_data = $this->session->userdata('logged_admin');
		    //$id_user = $session_data['id_user'];
		    $nama = $this->input->post('nama');
		    $username = $this->input->post('username');
		    $password = md5($this->input->post('password'));
		    $password2 = md5($this->input->post('password2'));

		    if($password == $password2){
		    	$data = array (
			    	'nama_petugas' => $nama,
			    	'username' => $username,
			    	'password' => $password
			    );
			    $kirim = $this->Petugas_m->add_petugas($data);
			    $this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\"> Data sales berhasil ditambah</div>");
			    redirect('petugas');	
		    }else{
		    	redirect_back();
		    }
		    
		}
		else {
			redirect('login');
		}
	}

	public function edit($id) {
		if($this->session->userdata('logged_admin')) {
		     $session_data = $this->session->userdata('logged_admin');
		     $username = $session_data['username'];
		    $get = $this->Petugas_m->get_by_id($id)->result();

			$data =array (
				'get' => $get,
			);
			$this->load->module('Layout');
        	$this->layout->header();
			$this->load->view('petugas_edit',$data);
			$this->load->module('layout');
        	$this->layout->footer();
		}
		else {
			redirect('login');
		}
	}

	public function proses_update_petugas() {
		if($this->session->userdata('logged_admin')) {
			$session_data = $this->session->userdata('logged_admin');
		    //$id_user = $session_data['id_user'];
		    $nama = $this->input->post('nama');
		    $username = $this->input->post('username');
			$id_petugas = $this->input->post('id_petugas');

		    $data = array (
		    	'nama_petugas' => $nama,
		    	'username' => $username
		    );

		   	$where = array(
		   		'id_petugas' => $id_petugas
		   	);
		   	
		    $kirim = $this->Petugas_m->edit_petugas($where,$data);
		    $this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\"> Data sales berhasil diubah</div>");
		    redirect('petugas');
		}
		else {
			redirect('login');
		}
	}

	public function hapus($id) {
		if($this->session->userdata('logged_admin')) {
			$hasil = $this->Petugas_m->delete($id);
			$this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\"> Data sales berhasil dihapus</div>");
			redirect('petugas');
		}
		else {
			redirect('login');
		}
	}

	public function ubah_password() {
		if($this->session->userdata('logged_admin')) {
		    $password = md5($this->input->post('password'));
		    $id_petugas = $this->input->post('id_petugas');

		    $data = array (
		    	'password' => $password
		    );
		    $where = array(
		    	'id_petugas' => $id_petugas
		    );
		    $kirim = $this->Petugas_m->edit_petugas($where, $data);
		}
		else {
			redirect('login');
		}
	}
	
}