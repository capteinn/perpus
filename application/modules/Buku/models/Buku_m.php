<?php
class Buku_m extends CI_Model{
 function __construct(){
 	parent::__construct();
 }
 
public function add_buku($data) {
  $this->db->insert('buku', $data);
}

public function show_all() {
  $this->db->order_by('id_buku','DESC'); 
  $this->db->join('jenis_buku','jenis_buku.id_jenis_buku=buku.id_jenis_buku');
  $this->db->join('kategori_buku','kategori_buku.id_kategori_buku=buku.id_kategori_buku');
    $q = $this->db->get('buku');
    return $q;
}

public function get_relation($id1, $id2, $table) {
	return $this->db->where($id1, $id2)->get($table)->num_rows();
}

public function get_jenis(){
    $this->db->order_by('id_jenis_buku', 'DESC');
    $q = $this->db->get('jenis_buku');
    return $q;
}

public function get_kategori(){
    $this->db->order_by('id_kategori_buku', 'DESC');
    $q = $this->db->get('kategori_buku');
    return $q;
}

public function get_by_id($id)
    {
        $this->db->from('buku');
        $this->db->where('id_buku',$id);
        $this->db->join('jenis_buku','jenis_buku.id_jenis_buku=buku.id_jenis_buku');
        $this->db->join('kategori_buku','kategori_buku.id_kategori_buku=buku.id_kategori_buku');
        $query = $this->db->get();
 
        return $query;
    }

public function delete($id){
    $this->db->where('id_buku', $id);
    var_dump($this->db->delete('buku'));exit;
}

public function edit_buku($where, $data)
    {
        $this->db->update('buku', $data, $where);
        return $this->db->affected_rows();
    }

}