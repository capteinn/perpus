<?php
class Jenis_buku_m extends CI_Model{
 function __construct(){
 	parent::__construct();
 }
 
public function add_jenis($data) {
  $this->db->insert('jenis_buku', $data);
}

public function show_all() {
  $this->db->order_by('id_jenis_buku','DESC'); 
    $q = $this->db->get('jenis_buku');
    return $q;
}

public function get_relation($id1, $id2, $table) {
	return $this->db->where($id1, $id2)->get($table)->num_rows();
}

public function get_by_id($id)
    {
        $this->db->from('jenis_buku');
        $this->db->where('id_jenis_buku',$id);
        $query = $this->db->get();
        return $query->row();
    }

public function delete($id){
    $this->db->where('id_jenis_buku', $id);
    $this->db->delete('jenis_buku');
}

public function edit_jenis($where, $data)
    {
        $this->db->update('jenis_buku', $data, $where);
        return $this->db->affected_rows();
    }

}