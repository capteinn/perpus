<?php
class M_login extends CI_Model{
 function __construct(){
 	parent::__construct();
 }
 
 // Berfungsi untuk mengambil data pada tabel user yang ada di database kita
public function getAnggota($nim_anggota,$password) {
		$this->db->select('id_anggota, nama_anggota, nim_anggota');
		$this->db->from('anggota');
		$this->db->where('nim_anggota',$nim_anggota);
		$this->db->where('password_anggota',$password);
    $this->db->limit(1);
    $query = $this->db->get();
 
   if($query->num_rows() == 1)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
		
    }

	public function check_logged(){
		return ($this->session->userdata('logged_admin'))?TRUE:FALSE;
	}



}