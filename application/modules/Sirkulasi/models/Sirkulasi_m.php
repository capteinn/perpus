<?php
class Sirkulasi_m extends CI_Model{
 function __construct(){
 	parent::__construct();
 }
 
public function add_sirkulasi($data) {
  $this->db->insert('sirkulasi', $data);
  $id = $this->db->insert_id();
    return $id;
}

public function add_detail_sirkulasi($data) {
  $this->db->insert('detail_sirkulasi', $data);
  $id = $this->db->insert_id();
  $this->db->join('buku','buku.id_buku=detail_sirkulasi.id_buku');
$q = $this->db->get_where('detail_sirkulasi', array('id_detail_sirkulasi' => $id));
return $q->row();
}

public function show_all() {
  $this->db->order_by('id_sirkulasi','DESC'); 
  $this->db->join('petugas','petugas.id_petugas=sirkulasi.id_petugas');
  $this->db->join('anggota','anggota.id_anggota=sirkulasi.id_anggota');
    $q = $this->db->get('sirkulasi');
    return $q;
}

public function get_by_id($id)
    {
        $this->db->from('sirkulasi');
        $this->db->where('id_sirkulasi',$id);
        $this->db->join('anggota','anggota.id_anggota=sirkulasi.id_anggota')->join('petugas','petugas.id_petugas=sirkulasi.id_petugas');
        $query = $this->db->get();
 
        return $query;
    }

public function get_detail_by_id($id)
{
    $this->db->from('detail_sirkulasi');
    $this->db->where('detail_sirkulasi.id_sirkulasi',$id);
    $this->db->join('buku','buku.id_buku=detail_sirkulasi.id_buku');
    $query = $this->db->get();

    return $query;
}

public function get_detail_by_id2($id)
{
    $this->db->from('detail_sirkulasi');
    $this->db->where('id_detail_sirkulasi',$id);
    $this->db->join('buku','buku.id_buku=detail_sirkulasi.id_buku');
    $query = $this->db->get();
    return $query;
}

public function get_denda($id)
{
    $this->db->from('sirkulasi');
    $this->db->where('id_sirkulasi',$id);
    $query = $this->db->get();
    return $query->row();
}

public function delete($id){
    $this->db->where('id_sirkulasi', $id);
    $this->db->delete('sirkulasi');
}

public function delete_detail($id){
    $this->db->where('id_detail_sirkulasi', $id);
    $this->db->delete('detail_sirkulasi');
}

public function edit_sirkulasi($where, $data)
    {
        $this->db->update('sirkulasi', $data, $where);
        return $this->db->affected_rows();
    }

public function edit_detail_sirkulasi($where, $data)
{
    $this->db->update('detail_sirkulasi', $data, $where);
    return $this->db->affected_rows();
}

public function get_anggota(){
    $this->db->order_by('id_anggota', 'DESC');
    $q = $this->db->get('anggota');
    return $q;
}

public function get_petugas(){
    $this->db->order_by('id_petugas', 'DESC');
    $q = $this->db->get('petugas');
    return $q;
}

public function get_buku(){
    $this->db->order_by('id_buku', 'DESC');
    $q = $this->db->get('buku');
    return $q;
}

public function get_buku_by_id($id)
    {
        $this->db->from('buku');
        $this->db->where('id_buku',$id);
        $query = $this->db->get();
        return $query;
    }

public function update_buku($where, $data)
    {
        $this->db->update('buku', $data, $where);
        return $this->db->affected_rows();
    }

}