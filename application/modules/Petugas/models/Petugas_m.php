<?php
class Petugas_m extends CI_Model{
 function __construct(){
 	parent::__construct();
 }
 
public function add_petugas($data) {
  $this->db->insert('petugas', $data);
}

public function show_all() {
  $this->db->order_by('id_petugas','DESC'); 
    $q = $this->db->get('petugas');
    return $q;
}

public function get_by_id($id)
    {
        $this->db->from('petugas');
        $this->db->where('id_petugas',$id);
        $query = $this->db->get();
 
        return $query;
    }

public function delete($id){
    $this->db->where('id_petugas', $id);
    $this->db->delete('petugas');
}

public function edit_petugas($where, $data)
    {
        $this->db->update('petugas', $data, $where);
        return $this->db->affected_rows();
    }

}