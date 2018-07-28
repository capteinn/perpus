<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Jenis_buku extends MX_Controller {

	function __construct() {
            parent::__construct();
			$this->load->model('Jenis_buku_m');
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
		    $get = $this->Jenis_buku_m->show_all()->result();
		   	$data =array (
				'get' => $get
			);	
			$this->load->module('Layout');
        	$this->layout->header();
			$this->load->view('jenis_v',$data);
        	$this->layout->footer();
		}
		else {
			redirect('login');
		}
	}

	public function proses_tambah_jenis() {
		if($this->session->userdata('logged_admin')) {
		    $jenis = $this->input->post('jenis_buku');

		    $data = array (
		    	'jenis_buku' => $jenis
		    );

		    $kirim = $this->Jenis_buku_m->add_jenis($data);
		    $this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\"> Data Jenis Buku berhasil ditambah</div>");
		}
		else {
			redirect('login');
		}
	}

	public function ajax_edit($id)
    {
        $data = $this->Jenis_buku_m->get_by_id($id);
        echo json_encode($data);
    }

	public function edit_jenis() {
	    $data = array(
            'jenis_buku' => $this->input->post('jenis_buku')
        );
        $this->Jenis_buku_m->edit_jenis(array('id_jenis_buku' => $this->input->post('id')), $data);
        $this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\"> Data satuan berhasil diubah</div>");
        echo json_encode(array("status" => TRUE));
	}

	public function hapus($id) {
		if($this->session->userdata('logged_admin')) {
			$cek = $this->Jenis_buku_m->get_relation('id_jenis_buku', $id, 'buku');
			if($cek){
				$this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\">Maaf buku gagal dihapus karna terdapat dari pada data lainnya.</div>");
			}else{
				$hasil = $this->Jenis_buku_m->delete($id);
				$this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\"> Data sales berhasil dihapus</div>");
			}
		
			redirect('jenis_buku');
		}
		else {
			redirect('login');
		}
	}
	
}