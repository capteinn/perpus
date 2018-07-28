<?php
class Sirkulasi_m extends CI_Model{

public function show_all($id_anggota) {
  $this->db->order_by('id_sirkulasi','DESC'); 
  $this->db->join('petugas','petugas.id_petugas=sirkulasi.id_petugas');
  $this->db->join('anggota','anggota.id_anggota=sirkulasi.id_anggota');
	$this->db->where('anggota.id_anggota', $id_anggota);
    $q = $this->db->get('sirkulasi');
    return $q;
}

public function get_detail_by_id($id)
{
    $this->db->select('*');
    $this->db->select('sirkulasi.tgl_kembali as hrs_kembali, detail_sirkulasi.tgl_kembali as tgl_kembali');
    $this->db->from('detail_sirkulasi');
    $this->db->join('buku','buku.id_buku=detail_sirkulasi.id_buku');
    $this->db->join('sirkulasi','sirkulasi.id_sirkulasi=detail_sirkulasi.id_sirkulasi');
    $this->db->where('sirkulasi.id_sirkulasi',$id);
    $query = $this->db->get();

    return $query;
}

}