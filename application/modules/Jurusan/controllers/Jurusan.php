<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Jurusan extends MX_Controller {

	function __construct() {
            parent::__construct();
			$this->load->model('Jurusan_m');
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
		    $get = $this->Jurusan_m->show_all()->result();
		   	$data =array (
				'get' => $get
			);	
			$this->load->module('Layout');
        	$this->layout->header();
			$this->load->view('jurusan_v',$data);
        	$this->layout->footer();
		}
		else {
			redirect('login');
		}
	}

	public function proses_tambah_jurusan() {
		if($this->session->userdata('logged_admin')) {
		    $jurusan = $this->input->post('jurusan');
		    $data = array (
		    	'nama_jurusan' => $jurusan
		    );

		    $kirim = $this->Jurusan_m->add_jurusan($data);
		    $this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\"> Data Jurusan berhasil ditambah</div>");
				
				redirect('jurusan');
		}
		else {
			redirect('login');
		}
	}

	public function ajax_edit($id)
    {
        $data = $this->Jurusan_m->get_by_id($id);
        echo json_encode($data);
    }

	public function edit_jurusan() {
	    $data = array(
            'nama_jurusan' => $this->input->post('jurusan')
        );
        $this->Jurusan_m->edit_jurusan(array('id_jurusan' => $this->input->post('id')), $data);
        $this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\"> Data satuan berhasil diubah</div>");
        echo json_encode(array("status" => TRUE));
	}

	public function hapus($id) {
		if($this->session->userdata('logged_admin')) {
			$cek = $this->Jurusan_m->get_relation('id_jurusan', $id, 'anggota');
			if($cek){
				$this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\">Maaf jurusan gagal dihapus karna terdapat dari pada data lainnya.</div>");
			}else{
				$hasil = $this->Jurusan_m->delete($id);
				$this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\"> Data jurusan berhasil dihapus</div>");
			}
			
			redirect('jurusan');
		}
		else {
			redirect('login');
		}
	}
	
}