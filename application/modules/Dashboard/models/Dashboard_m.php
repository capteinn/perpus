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

public function show_all() {
	$this->db->select('*, COUNT(detail_sirkulasi.id_buku) as sering');
  $this->db->join('jenis_buku','jenis_buku.id_jenis_buku=buku.id_jenis_buku');
  $this->db->join('kategori_buku','kategori_buku.id_kategori_buku=buku.id_kategori_buku');
  $this->db->join('detail_sirkulasi','detail_sirkulasi.id_buku=buku.id_buku');
  $this->db->group_by('detail_sirkulasi.id_buku'); 
  $this->db->order_by('sering','DESC'); 
  $this->db->limit(5); 
    $q = $this->db->get('buku');
    return $q;
}

public function show_all_anggota() {
	$this->db->select('*, COUNT(detail_sirkulasi.id_sirkulasi) as sering');
  $this->db->join('detail_sirkulasi','detail_sirkulasi.id_sirkulasi=sirkulasi.id_sirkulasi');
  $this->db->join('anggota','anggota.id_anggota=sirkulasi.id_anggota');
  $this->db->group_by('sirkulasi.id_anggota');
  $this->db->order_by('sering','DESC'); 
  $this->db->limit(5); 
    $q = $this->db->get('sirkulasi');
    return $q;
}

}