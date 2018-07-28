<?php
class Home_m extends CI_Model{
 function __construct(){
 	parent::__construct();
 }
 
public function show_all() {
  $this->db->order_by('id_buku','DESC'); 
  $this->db->join('jenis_buku','jenis_buku.id_jenis_buku=buku.id_jenis_buku');
  $this->db->join('kategori_buku','kategori_buku.id_kategori_buku=buku.id_kategori_buku');
    $q = $this->db->get('buku');
    return $q;
}

}