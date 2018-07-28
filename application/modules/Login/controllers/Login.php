<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Login extends MX_Controller {

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
    $this->form_validation->set_rules('username', 'Username', 'trim|required');
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
      redirect('dashboard');
    }

    // $session_data = $this->session->set_userdata('logged_admin', true);
    // redirect('dashboard');
   }
 
 }
 
 function check_database($password)
 {
   //Field validation succeeded.  Validate against database
   $username = $this->input->post('username');
   //query the database
   $result = $this->M_login->getPetugas($username, $password);
   if($result)
   {
     $sess_array = array();
     foreach($result as $row)
     {
       $sess_array = array(
        'id_petugas' => $row->id_petugas,
        'username' => $row->username,
        'nama_petugas' => $row->nama_petugas
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