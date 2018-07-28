<?php
class Dashboard_m extends CI_Model{
 function __construct(){
 	parent::__construct();
 }
 
public function count_anggota() {
  $q = $this->db->count_all('anggota');
    return $q;
}

public function count_buku() {
  $q = $this->db->count_all('buku');
    return $q;
}

public function count_pinjam() {
	$this->db->where('status_sirkulasi', 'pinjam');
	$this->db->from('sirkulasi');
  $q = $this->db->count_all_results();
    return $q;
}

}