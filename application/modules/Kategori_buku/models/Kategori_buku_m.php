<?php
class Kategori_buku_m extends CI_Model{
 function __construct(){
 	parent::__construct();
 }
 
public function add_kategori($data) {
  $this->db->insert('kategori_buku', $data);
}

public function show_all() {
  $this->db->order_by('id_kategori_buku','DESC'); 
    $q = $this->db->get('kategori_buku');
    return $q;
}

public function get_relation($id1, $id2, $table) {
	return $this->db->where($id1, $id2)->get($table)->num_rows();
}

public function get_by_id($id)
    {
        $this->db->from('kategori_buku');
        $this->db->where('id_kategori_buku',$id);
        $query = $this->db->get();
        return $query->row();
    }

public function delete($id){
    $this->db->where('id_kategori_buku', $id);
    $this->db->delete('kategori_buku');
}

public function edit_kategori($where, $data)
    {
        $this->db->update('kategori_buku', $data, $where);
        return $this->db->affected_rows();
    }

}