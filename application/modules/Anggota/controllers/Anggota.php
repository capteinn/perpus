<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Anggota extends MX_Controller {

	function __construct() {
            parent::__construct();
			$this->load->model('Anggota_m');
			//$this->load->helper('my_url');
         }

	public function index(){
		if($this->session->userdata('logged_admin')) {
		    $session_data = $this->session->userdata('logged_admin');
		    $username = $session_data['username'];
		    
		    $get = $this->Anggota_m->show_all()->result();
		   	$data =array (
				'get' => $get
			);	
			$this->load->module('Layout');
        	$this->layout->header();
			$this->load->view('anggota_v',$data);
        	$this->layout->footer();
		}
		else {
			redirect('login');
		}
	}

	public function tambah_anggota() {
		if($this->session->userdata('logged_admin')) {
		    $session_data = $this->session->userdata('logged_admin');
		    $username = $session_data['username'];

		    $get_kelas = $this->Anggota_m->get_kelas()->result();
		    $get_jurusan = $this->Anggota_m->get_jurusan()->result();
		    
		    $data =array (
				'get_kelas' => $get_kelas,
				'get_jurusan' => $get_jurusan
			);

		   	$this->load->module('Layout');
        	$this->layout->header();
			$this->load->view('anggota_add', $data);
			$this->load->module('layout');
        	$this->layout->footer();
		}
		else {
			redirect('login');
		}
	}

	public function proses_tambah_anggota() {
		if($this->session->userdata('logged_admin')) {
			$session_data = $this->session->userdata('logged_admin');
				
				//$id_user = $session_data['id_user'];
		    $nama = $this->input->post('nama');
		    $alamat = $this->input->post('alamat');
		    $jk = $this->input->post('jk');
		    $kelas = $this->input->post('kelas');
		    $no_tlp = $this->input->post('no_tlp');
		    $jurusan = $this->input->post('jurusan');
		    $angkatan = $this->input->post('angkatan');
		    $nim = $this->input->post('nim');
		    $password = md5($this->input->post('password'));
		    
				if($this->input->post('password') != $this->input->post('password2')){
					$this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\"> Konfirmasi password salah</div>");
					redirect('anggota/tambah_anggota');
				}
				
				$cek = $this->db->where('nim_anggota', $nim)->get('anggota')->num_rows();
				
				if($cek){
					$this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\"> Maaf NIM Anggota sudah ada yang menggunakan</div>");
					redirect('anggota/tambah_anggota'); 
				}
				
		    $data = array (
		    	'nama_anggota' => $nama,
		    	'alamat_anggota' => $alamat,
		    	'jk' => $jk,
		    	'id_kelas' => $kelas,
		    	'no_tlp' => $no_tlp,
		    	'id_jurusan' => $jurusan,
		    	'angkatan' => $angkatan,
		    	'nim_anggota' => $nim,
		    	'password_anggota' => $password
		    );
		    $kirim = $this->Anggota_m->add_anggota($data);
		    $this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\"> Data sales berhasil ditambah</div>");
		    redirect('anggota');
		}
		else {
			redirect('login');
		}
	}

	public function edit($id) {
		if($this->session->userdata('logged_admin')) {
		     $session_data = $this->session->userdata('logged_admin');
		     $username = $session_data['username'];
		    $get = $this->Anggota_m->get_by_id($id)->result();
		    $get_kelas = $this->Anggota_m->get_kelas()->result();
		    $get_jurusan = $this->Anggota_m->get_jurusan()->result();
				
				
			$data =array (
				'get' => $get,
				'get_kelas' => $get_kelas,
				'get_jurusan' => $get_jurusan,

			);
			$this->load->module('Layout');
        	$this->layout->header();
			$this->load->view('anggota_edit',$data);
			$this->load->module('layout');
        	$this->layout->footer();
		}
		else {
			redirect('login');
		}
	}

	public function proses_update_anggota() {
		if($this->session->userdata('logged_admin')) {
			$session_data = $this->session->userdata('logged_admin');
		    //$id_user = $session_data['id_user'];
		    $nama = $this->input->post('nama');
		    $alamat = $this->input->post('alamat');
		    $jk = $this->input->post('jk');
		    $kelas = $this->input->post('kelas');
		    $no_tlp = $this->input->post('no_tlp');
		    $jurusan = $this->input->post('jurusan');
		    $angkatan = $this->input->post('angkatan');
		    $nim = $this->input->post('nim');
			$id_anggota = $this->input->post('id_anggota');
				
				$nimbaru = $this->db->where('id_anggota', $id_anggota)->get('anggota')->row()->nim_anggota;
				$cek = $this->db->where('nim_anggota', $nim)->where('nim_anggota !=', $nimbaru)->get('anggota')->num_rows();
				
				if($cek){
					$this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\"> Maaf NIM Anggota sudah ada yang menggunakan</div>");
					redirect('anggota/edit/'.$id_anggota); 
				}
				
		    $data = array (
		    	'nama_anggota' => $nama,
		    	'alamat_anggota' => $alamat,
		    	'jk' => $jk,
		    	'id_kelas' => $kelas,
		    	'no_tlp' => $no_tlp,
		    	'id_jurusan' => $jurusan,
		    	'angkatan' => $angkatan,
		    	'nim_anggota' => $nim
		    );

		   	$where = array(
		   		'id_anggota' => $id_anggota
		   	);

		    $kirim = $this->Anggota_m->edit_anggota($where,$data);
		    $this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\"> Data sales berhasil diubah</div>");
		    redirect('anggota');
		}
		else {
			redirect('login');
		}
	}

	public function hapus($id) {
		if($this->session->userdata('logged_admin')) {
			$cek = $this->Anggota_m->get_relation('id_anggota', $id, 'sirkulasi');
			if($cek){
				$this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\">Maaf anggota gagal dihapus karna terdapat dari pada data lainnya.</div>");
			}else{
				$hasil = $this->Anggota_m->delete($id);
				$this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\"> Data sales berhasil dihapus</div>");
			}
			
			redirect('anggota');
		}
		else {
			redirect('login');
		}
	}

	public function ubah_password() {
		if($this->session->userdata('logged_admin')) {
		    $password = md5($this->input->post('password'));
		    $id_anggota = $this->input->post('id_anggota');

		    $data = array (
		    	'password_anggota' => $password
		    );
		    $where = array(
		    	'id_anggota' => $id_anggota
		    );
		    $kirim = $this->Anggota_m->edit_anggota($where, $data);
		}
		else {
			redirect('login');
		}
	}
	
}