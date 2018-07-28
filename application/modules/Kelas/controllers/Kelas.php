<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Kelas extends MX_Controller {

	function __construct() {
            parent::__construct();
			$this->load->model('Kelas_m');
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
		    $get = $this->Kelas_m->show_all()->result();
		   	$data =array (
				'get' => $get
			);	
			$this->load->module('Layout');
        	$this->layout->header();
			$this->load->view('kelas_v',$data);
        	$this->layout->footer();
		}
		else {
			redirect('login');
		}
	}

	public function proses_tambah_kelas() {
		if($this->session->userdata('logged_admin')) {
		    $kelas = $this->input->post('kelas');

		    $data = array (
		    	'nama_kelas' => $kelas
		    );

		    $kirim = $this->Kelas_m->add_kelas($data);
		    $this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\"> Data Jenis Buku berhasil ditambah</div>");
		}
		else {
			redirect('login');
		}
	}

	public function ajax_edit($id)
    {
        $data = $this->Kelas_m->get_by_id($id);
        echo json_encode($data);
    }

	public function edit_kelas() {
	    $data = array(
            'nama_kelas' => $this->input->post('kelas')
        );
        $this->Kelas_m->edit_kelas(array('id_kelas' => $this->input->post('id')), $data);
        $this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\"> Data satuan berhasil diubah</div>");
        echo json_encode(array("status" => TRUE));
	}

	public function hapus($id) {
		if($this->session->userdata('logged_admin')) {
			$cek = $this->Kelas_m->get_relation('id_kelas', $id, 'anggota');
			if($cek){
				$this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\">Maaf kelas gagal dihapus karna terdapat dari pada data lainnya.</div>");
			}else{
				$hasil = $this->Kelas_m->delete($id);
				$this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\"> Data sales berhasil dihapus</div>");
			}
		
			redirect('kelas');
		}
		else {
			redirect('login');
		}
	}
	
}