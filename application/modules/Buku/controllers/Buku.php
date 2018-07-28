<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Buku extends MX_Controller {

	function __construct() {
            parent::__construct();
			$this->load->model('Buku_m');
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
		    $get = $this->Buku_m->show_all()->result();
		   	$data =array (
				'get' => $get
			);
			$this->load->module('Layout');
        	$this->layout->header();
			$this->load->view('buku_v',$data);
        	$this->layout->footer();
		}
		else {
			redirect('login');
		}
	}

	public function tambah_buku() {
		if($this->session->userdata('logged_admin')) {
		    $session_data = $this->session->userdata('logged_admin');
		    $username = $session_data['username'];
		    $get_jenis = $this->Buku_m->get_jenis()->result();
		    $get_kategori = $this->Buku_m->get_kategori()->result();
		    
		    $data =array (
				'get_jenis' => $get_jenis,
				'get_kategori' => $get_kategori,
			);
		   	$this->load->module('Layout');
        	$this->layout->header();
			$this->load->view('buku_add', $data);
			$this->load->module('layout');
        	$this->layout->footer();
		}
		else {
			redirect('login');
		}
	}

	public function proses_tambah_buku() {
		if($this->session->userdata('logged_admin')) {
			$session_data = $this->session->userdata('logged_admin');
		    //$id_user = $session_data['id_user'];
		    $judul = $this->input->post('judul');
		    $penerbit = $this->input->post('penerbit');
		    $jenis = $this->input->post('jenis');
		    $kategori = $this->input->post('kategori');
		    $jumlah = $this->input->post('jumlah');

		    if($_FILES['filefoto']['name']) {
				$nmfile = "file_".time();
		        $config['upload_path'] = './assets/images/buku/original'; //path folder
		        $config['allowed_types'] = 'jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
		        $config['max_size'] = '3072'; //maksimum besar file 3M
		        $config['max_width']  = '5000'; //lebar maksimum 5000 px
		        $config['max_height']  = '5000'; //tinggi maksimu 5000 px
		        $config['file_name'] = $nmfile; //nama yang terupload nantinya

		        $this->upload->initialize($config);
	        
	        
	            if ($this->upload->do_upload('filefoto'))
	            {
	                $gbr = $this->upload->data();
	                $data = array (
				    	'kode_buku' => random_string('alnum', 6),
				    	'gambar_buku' => $gbr['file_name'],
				    	'judul_buku' => $judul,
				    	'penerbit_buku' => $penerbit,
				    	'id_jenis_buku' => $jenis,
				    	'id_kategori_buku' => $kategori,
				    	'jumlah_buku' => $jumlah
				    );

	                $this->Buku_m->add_buku($data);

	                $config2['image_library'] = 'gd2'; 
	                $config2['source_image'] = $this->upload->upload_path.$this->upload->file_name;
	                $config2['new_image'] = './assets/images/buku/resized'; // folder tempat menyimpan hasil resize
	                $config2['maintain_ratio'] = FALSE;
	                $config2['width'] = 150; //lebar setelah resize menjadi 100 px
	                $config2['height'] = 150; //lebar setelah resize menjadi 100 px
	                $this->load->library('image_lib',$config2);
	                $this->image_lib->resize();
	            }else{
	            	echo $this->upload->display_errors(); die();
	                redirect_back(); //jika gagal maka akan ditampilkan form upload
	            }
	        }else{
	        	$data = array (
			    	'kode_buku' => $kode,
			    	'gambar_buku' => '',
			    	'judul_buku' => $judul,
			    	'penerbit_buku' => $penerbit,
			    	'id_jenis_buku' => $jenis,
			    	'id_kategori_buku' => $kategori,
			    	'jumlah_buku' => $jumlah
			    );
			    $kirim = $this->Buku_m->add_buku($data);
	        }
		    
		    $this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\"> Data sales berhasil ditambah</div>");
		    redirect('buku');
		}
		else {
			redirect('login');
		}
	}

	public function edit($id) {
		if($this->session->userdata('logged_admin')) {
		     $session_data = $this->session->userdata('logged_admin');
		     $username = $session_data['username'];
		    $get = $this->Buku_m->get_by_id($id)->result();
		    $get_jenis = $this->Buku_m->get_jenis()->result();
		    $get_kategori = $this->Buku_m->get_kategori()->result();

			$data =array (
				'get' => $get,
				'get_jenis' => $get_jenis,
				'get_kategori' => $get_kategori
			);
			$this->load->module('Layout');
        	$this->layout->header();
			$this->load->view('buku_edit',$data);
			$this->load->module('layout');
        	$this->layout->footer();
		}
		else {
			redirect('login');
		}
	}

	public function proses_update_buku() {
		if($this->session->userdata('logged_admin')) {
			$session_data = $this->session->userdata('logged_admin');
		    $judul = $this->input->post('judul');
		    $penerbit = $this->input->post('penerbit');
		    $jenis = $this->input->post('jenis');
		    $kategori = $this->input->post('kategori');
		    $id_buku= $this->input->post('id_buku');
		    $jumlah = $this->input->post('jumlah');
		    
		    $data = array (
		    	'judul_buku' => $judul,
		    	'penerbit_buku' => $penerbit,
		    	'id_jenis_buku' => $jenis,
		    	'id_kategori_buku' => $kategori,
		    	'jumlah_buku' => $jumlah
		    );

		   	$where = array(
		   		'id_buku' => $id_buku
		   	);
		   	
		    $kirim = $this->Buku_m->edit_buku($where,$data);
		    $this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\"> Data sales berhasil diubah</div>");
		    redirect('buku');
		}
		else {
			redirect('login');
		}
	}

	public function hapus($id) {
		if($this->session->userdata('logged_admin')) {
			$cek = $this->Buku_m->get_relation('id_buku', $id, 'detail_sirkulasi');
			if($cek){
				$this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\">Maaf buku gagal dihapus karna terdapat dari pada data lainnya.</div>");
			}else{
				$hasil = $this->Buku_m->delete($id);
				$this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\"> Data buku berhasil dihapus</div>");
			}
			redirect('buku');
		}
		else {
			redirect('login');
		}
	}

	public function ajax_ubah_gambar($id)
    {
        $data = $this->Buku_m->get_by_id($id)->row();
        echo json_encode($data);
    }

    public function ubah_gambar() {
        	$session_data = $this->session->userdata('logged_admin');
		     $gambar_lama= $this->input->post('gambar');
		     $nmfile = "file_".time();
	        $config['upload_path'] = './assets/images/buku/original'; //path folder
	        $config['allowed_types'] = 'jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
	        $config['max_size'] = '3072'; //maksimum besar file 3M
	        $config['max_width']  = '5000'; //lebar maksimum 5000 px
	        $config['max_height']  = '5000'; //tinggi maksimu 5000 px
	        $config['file_name'] = $nmfile;

	        $this->upload->initialize($config);
        
        if($_FILES['filefoto']['name'])
        {
            if ($this->upload->do_upload('filefoto'))
            {
                $gbr = $this->upload->data();
                $data = array(
                  	'gambar_buku' =>$gbr['file_name'],
                );

                $this->Buku_m->edit_buku(array('id_buku' => $this->input->post('id')), $data);
       			 echo json_encode(array("status" => TRUE));

                $config2['image_library'] = 'gd2'; 
                $config2['source_image'] = $this->upload->upload_path.$this->upload->file_name;
                $config2['new_image'] = './assets/images/buku/resized/'; // folder tempat menyimpan hasil resize
                $config2['maintain_ratio'] = FALSE;
                $config2['width'] = 452; //lebar setelah resize menjadi 100 px
                $config2['height'] = 302; //lebar setelah resize menjadi 100 px
                $this->load->library('image_lib',$config2); 

                //pesan yang muncul jika resize error dimasukkan pada session flashdata
                if ( !$this->image_lib->resize()){
                $this->session->set_flashdata('errors', $this->image_lib->display_errors('', ''));   
              	}

              	$path_uploads = './assets/images/buku/original/'.$gambar_lama;
				$path_hasil_resize = './assets/images/buku/resized/'.$gambar_lama;
				chown($path_uploads, 465);
				chown($path_hasil_resize, 465);
				unlink($path_uploads);
				unlink($path_hasil_resize);

                //redirect_back(); //jika berhasil maka akan ditampilkan view upload
            }
        }
	}
	
}