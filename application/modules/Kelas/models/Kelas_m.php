<?php
class Kelas_m extends CI_Model{
 function __construct(){
 	parent::__construct();
 }
 
public function add_kelas($data) {
  $this->db->insert('kelas', $data);
}

public function show_all() {
  $this->db->order_by('id_kelas','DESC'); 
    $q = $this->db->get('kelas');
    return $q;
}

public function get_relation($id1, $id2, $table) {
	return $this->db->where($id1, $id2)->get($table)->num_rows();
}

public function get_by_id($id)
    {
        $this->db->from('kelas');
        $this->db->where('id_kelas',$id);
        $query = $this->db->get();
        return $query->row();
    }

public function delete($id){
    $this->db->where('id_kelas', $id);
    $this->db->delete('kelas');
}

public function edit_kelas($where, $data)
    {
        $this->db->update('kelas', $data, $where);
        return $this->db->affected_rows();
    }

}