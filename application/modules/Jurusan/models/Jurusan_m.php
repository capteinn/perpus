<?php
class Jurusan_m extends CI_Model{
 function __construct(){
 	parent::__construct();
 }
 
public function add_jurusan($data) {
  $this->db->insert('jurusan', $data);
}

public function show_all() {
  $this->db->order_by('id_jurusan','DESC'); 
    $q = $this->db->get('jurusan');
    return $q;
}

public function get_relation($id1, $id2, $table) {
	return $this->db->where($id1, $id2)->get($table)->num_rows();
}

public function get_by_id($id)
    {
        $this->db->from('jurusan');
        $this->db->where('id_jurusan',$id);
        $query = $this->db->get();
        return $query->row();
    }

public function delete($id){
    $this->db->where('id_jurusan', $id);
    $this->db->delete('jurusan');
}

public function edit_jurusan($where, $data)
    {
        $this->db->update('jurusan', $data, $where);
        return $this->db->affected_rows();
    }

}