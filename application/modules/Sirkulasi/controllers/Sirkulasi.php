<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Sirkulasi extends MX_Controller {

	function __construct() {
            parent::__construct();
			$this->load->model('Sirkulasi_m');
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
		    $get = $this->Sirkulasi_m->show_all()->result();
		   	$data =array (
				'get' => $get
			);	
			$this->load->module('Layout');
        	$this->layout->header();
			$this->load->view('sirkulasi_v',$data);
        	$this->layout->footer();
		}
		else {
			redirect('login');
		}
	}

	public function tambah_sirkulasi() {
		if($this->session->userdata('logged_admin')) {
		    $session_data = $this->session->userdata('logged_admin');
		    $id_petugas = $session_data['id_petugas'];
		    $nama_petugas = $session_data['nama_petugas'];
				
		    $get_anggota = $this->Sirkulasi_m->get_anggota()->result();
		    $get_petugas = $this->Sirkulasi_m->get_petugas()->result();
		    $data = array(
		    	'id_petugas' => $id_petugas,
		    	'nama_petugas' => $nama_petugas,
		    	'get_anggota' => $get_anggota,
		    	'get_petugas' => $get_petugas
		    );
		    
		   	$this->load->module('Layout');
        	$this->layout->header();
			$this->load->view('sirkulasi_add', $data);
			$this->load->module('layout');
        	$this->layout->footer();
		}
		else {
			redirect('login');
		}
	}

	public function proses_tambah_sirkulasi() {
		if($this->session->userdata('logged_admin')) {
			$session_data = $this->session->userdata('logged_admin');
		    $petugas = $this->input->post('petugas');
		    $anggota = $this->input->post('anggota');
		    $tgl_kembali = $this->input->post('tgl_kembali');

	    	$data = array (
		    	'kode_peminjaman' => random_string('numeric', 10),
		    	'id_petugas' => $petugas,
		    	'id_anggota' => $anggota,
		    	'tgl_pinjam' => date('Y-m-d'),
		    	'tgl_kembali' => $tgl_kembali,
		    	'status_sirkulasi' => 'pinjam'	
		    );
		    $id = $this->Sirkulasi_m->add_sirkulasi($data);
		    $get_buku = $this->Sirkulasi_m->get_buku()->result();
		    $sirkulasi = $this->Sirkulasi_m->get_by_id($id)->result();
		    $data = array(
		    	'id_sirkulasi' => $id,
		    	'get_buku' => $get_buku,
		    	'sirkulasi' => $sirkulasi
		    );
		    $this->load->module('Layout');
        	$this->layout->header();
		    $this->load->view('sirkulasi_detail_add', $data);
		    $this->layout->footer();
		    
		}
		else {
			redirect('login');
		}
	}

	public function edit($id) {
		if($this->session->userdata('logged_admin')) {
		     $session_data = $this->session->userdata('logged_admin');
		     $username = $session_data['username'];
		    $get = $this->Sirkulasi_m->get_by_id($id)->result();
		    $get_detail = $this->Sirkulasi_m->get_detail_by_id($id)->result();
		    $get_anggota = $this->Sirkulasi_m->get_anggota()->result();
			$data =array (
				'get' => $get,
				'get_anggota' => $get_anggota,
				'get_detail' => $get_detail
			);
			$this->load->module('Layout');
        	$this->layout->header();
			$this->load->view('sirkulasi_edit',$data);
			$this->load->module('layout');
        	$this->layout->footer();
		}
		else {
			redirect('login');
		}
	}

	public function detail($id) {
		if($this->session->userdata('logged_admin')) {
		     $session_data = $this->session->userdata('logged_admin');
		     $username = $session_data['username'];
		    $get = $this->Sirkulasi_m->get_by_id($id)->result();
		    $get_detail = $this->Sirkulasi_m->get_detail_by_id($id)->result();
		    $get_anggota = $this->Sirkulasi_m->get_anggota()->result();
			$data =array (
				'get' => $get,
				'get_anggota' => $get_anggota,
				'get_detail' => $get_detail
			);
			$this->load->module('Layout');
        	$this->layout->header();
			$this->load->view('sirkulasi_detail',$data);
			$this->load->module('layout');
        	$this->layout->footer();
		}
		else {
			redirect('login');
		}
	}

	public function proses_update_sirkulasi() {
		if($this->session->userdata('logged_admin')) {
			$session_data = $this->session->userdata('logged_admin');
		    $petugas = $this->input->post('petugas');
		    $tgl_kembali = $this->input->post('tgl_kembali');
			$id_sirkulasi = $this->input->post('id_sirkulasi');

		    $data = array (
		    	'id_petugas' => $petugas,
		    	'tgl_kembali' => $tgl_kembali
		    );

		   	$where = array(
		   		'id_sirkulasi' => $id_sirkulasi
		   	);
		   	
		    $kirim = $this->Sirkulasi_m->edit_sirkulasi($where,$data);
		    redirect('sirkulasi');
		}
		else {
			redirect('login');
		}
	}
	
	public function cekDetail($id_sirkulasi) {
		$cek = $this->db->where('id_sirkulasi', $id_sirkulasi)->get('detail_sirkulasi')->num_rows();
		
		if($cek){
			redirect('sirkulasi');
		}else{
			$this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\"> Harap tambahkan detail sirkulasi minimal 1</div>");
		    $get_buku = $this->Sirkulasi_m->get_buku()->result();
		    $sirkulasi = $this->Sirkulasi_m->get_by_id($id_sirkulasi)->result();
		    $data = array(
		    	'id_sirkulasi' => $id_sirkulasi,
		    	'get_buku' => $get_buku,
		    	'sirkulasi' => $sirkulasi
		    );
		    $this->load->module('Layout');
        	$this->layout->header();
		    $this->load->view('sirkulasi_detail_add', $data);
		    $this->layout->footer();
		}
	}

	public function hapus($id) {
		if($this->session->userdata('logged_admin')) {
			$hasil = $this->Sirkulasi_m->delete($id);
			$this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\"> Data sales berhasil dihapus</div>");
			redirect('sirkulasi');
		}
		else {
			redirect('login');
		}
	}

	public function hapus_detail($id) {
		if($this->session->userdata('logged_admin')) {
			$hasil = $this->Sirkulasi_m->delete_detail($id);
			$this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\"> Data sales berhasil dihapus</div>");
			redirect_back();
		}
		else {
			redirect('login');
		}
	}


	public function ubah_password() {
		if($this->session->userdata('logged_admin')) {
		    $password = md5($this->input->post('password'));
		    $id_sirkulasi = $this->input->post('id_sirkulasi');

		    $data = array (
		    	'password' => $password
		    );
		    $where = array(
		    	'id_sirkulasi' => $id_sirkulasi
		    );
		    $kirim = $this->Sirkulasi_m->edit_sirkulasi($where, $data);
		}
		else {
			redirect('login');
		}
	}

	public function proses_tambah_detail_sirkulasi() {
		if($this->session->userdata('logged_admin')) {
		    $id_sirkulasi = $this->input->post('id_sirkulasi');
		    $buku = $this->input->post('buku');
		    $jumlah = 1;
		    $data_buku = $this->Sirkulasi_m->get_buku_by_id($buku)->result();
		    $lama = 0;
				
				$cek = $this->db->where('id_sirkulasi')->get('detail_sirkulasi')->num_rows();
				
				if($cek == 2){
						echo json_encode("maaf tidak bisa menambahkan buku lagi");
				}else{
					
					foreach($data_buku as $row){
							$lama = $row->jumlah_buku;
						}
						
						$baru =  (int)$lama - (int)$jumlah; 
						$data = array (
							'jumlah_buku' => $baru
						);
						$where = array(
							'id_buku' => $buku
						);
						$kirim = $this->Sirkulasi_m->update_buku($where, $data);

						$data = array (
							'id_sirkulasi' => $id_sirkulasi,
							'id_buku' => $buku,
							'jumlah' => $jumlah,
							'status' => 'pinjam'
						);

						$detail = $this->Sirkulasi_m->add_detail_sirkulasi($data);
						
						
						echo json_encode($detail);
				}
		    
		}
		else {
			redirect('login');
		}
	}

	public function ajax_edit_detail($id)
    {
        $get_detail = $this->Sirkulasi_m->get_detail_by_id2($id)->row();
        $get_buku = $this->Sirkulasi_m->get_buku()->result();
        $data = array(
        	'detail' => $get_detail,
        	'get_buku' => $get_buku
        );
        echo json_encode($data);
    }

    public function edit_detail_sirkulasi() {
		if($this->session->userdata('logged_admin')) {
				$session_data = $this->session->userdata('logged_admin');
		    //$id_user = $session_data['id_user'];
		    $buku = $this->input->post('buku');
		    $jumlah = $this->input->post('jumlah');
				$id_detail = $this->input->post('id_detail');
				$status = $this->input->post('status');
				$id_sirkulasi = $this->input->post('id_sirkulasi');
		    
		    if($status == 'selesai'){
		    	$data_buku = $this->Sirkulasi_m->get_buku_by_id($buku)->result();
			    $lama = 0;
			    foreach($data_buku as $row){
			    	$lama = $row->jumlah_buku;
			    }
		    	$baru =  (int)$lama + (int)$jumlah; 
		    	$data = array (
			    	'jumlah_buku' => $baru
			    );
			    $where = array(
			    	'id_buku' => $buku
			    );
			    $kirim = $this->Sirkulasi_m->update_buku($where, $data);
		    }
		    
				
				$get_denda = $this->Sirkulasi_m->get_denda($id_sirkulasi);
				if(date('Y-m-d') > $get_denda->tgl_kembali){
					
					$tgl_hrs_kembali = date_create($get_denda->tgl_kembali);
					$tgl_kembali = date_create(date('Y-m-d'));
					
					//difference between two dates
					$diff = date_diff($tgl_hrs_kembali,$tgl_kembali);
					$dendafix = $diff->format("%a");
				}else{
					$dendafix = 0;
				}
				
				//count days
				// $lele = $diff->format("%a");
				
		    $data = array (
		    	'id_sirkulasi' => $id_sirkulasi,
		    	'id_buku' => $buku,
		    	'jumlah' => $jumlah,
		    	'status' => $status,
		    	'denda' => $dendafix * 1000, //denda
		    	'tgl_kembali' => date('Y-m-d')
		    );

		   	$where = array(
		   		'id_detail_sirkulasi' => $id_detail
		   	);
		   	
		    $this->Sirkulasi_m->edit_detail_sirkulasi($where,$data);
				
				$cekS = $this->db->where('id_sirkulasi', $id_sirkulasi)->where('status', 'pinjam')->get('detail_sirkulasi')->num_rows();
				
				if($cekS == 0){
					$this->db->where('id_sirkulasi', $id_sirkulasi)->update('sirkulasi', array('status_sirkulasi'=>'selesai'));
				}
		    redirect_back();
		}
		else {
			redirect('login');
		}
	}

	public function get_buku()
    {
        $get_buku = $this->Sirkulasi_m->get_buku()->result();
        echo json_encode($get_buku);
    }
	
}