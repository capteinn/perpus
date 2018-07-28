<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Login_anggota extends MX_Controller {

	function __construct() {
            parent::__construct();
            $this->load->library('session','form_validation');
            $this->load->helper('my_url');
            $this->load->model('M_login');
            $this->form_validation->CI =& $this;
         }

	public function index(){
		if($this->session->userdata('logged_admin')) {
			echo "<script>alert('Anda sudah login. Jika ingin login kembali, silahkan logout terlebih dahulu');window.location.href='dashboard';</script>";
		} else {
      $this->load->module('Layout');
      $this->layout->login_header();
			$this->load->view('login');
		}
	}

	public function proses_login()
 { 
    $this->form_validation->set_rules('nim_anggota', 'NIM Anggota', 'trim|required');
    $this->form_validation->set_rules('password', 'Password', 'trim|required|md5|callback_check_database');
   if($this->form_validation->run($this) == FALSE){
     //Field validation failed.  User redirected to login page
     $this->load->module('Login');
     $this->login->index();
   }
   else
   {
     //Go to private area

    if($this->session->userdata('logged_admin')) {
      $session_data = $this->session->userdata('logged_admin');
			$id_anggota = $this->db->where('nim_anggota', $this->input->post('nim_anggota'))->get('anggota')->row();
			$this->session->set_userdata('id_anggota', $id_anggota->id_anggota); //menyimpan session id_anggota
			$this->session->set_userdata('nama_anggota', $id_anggota->nama_anggota); //menyimpan session nama_anggota
      redirect('Dashboard_anggota');
    }

    // $session_data = $this->session->set_userdata('logged_admin', true);
    // redirect('dashboard');
   }
 
 }
 
 function check_database($password)
 {
   //Field validation succeeded.  Validate against database
   $nim_anggota = $this->input->post('nim_anggota');
   //query the database
   $result = $this->M_login->getAnggota($nim_anggota, $password);
   if($result)
   {
     $sess_array = array();
     foreach($result as $row)
     {
       $sess_array = array(
        'id_anggota' => $row->id_anggota,
        'nim_anggota' => $row->nim_anggota,
        'nama_anggota' => $row->nama_anggota
       );
       $this->session->set_userdata('logged_admin', $sess_array);
     }
     return TRUE;
   }
   else
   {
     $this->form_validation->set_message('check_database', 'Invalid username or password');
     return false;
   }
 }

public function logout() {
    $session_data = $this->session->userdata('logged_admin');
    $this->session->sess_destroy();
    redirect('home');
  }

}