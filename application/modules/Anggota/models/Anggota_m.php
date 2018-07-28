<?php
class Anggota_m extends CI_Model{
 function __construct(){
 	parent::__construct();
 }
 
public function add_anggota($data) {
  $this->db->insert('anggota', $data);
}

public function show_all() {
  $this->db->order_by('id_anggota','DESC'); 
  $this->db->join('kelas','kelas.id_kelas=anggota.id_kelas');
  $this->db->join('jurusan','jurusan.id_jurusan=anggota.id_jurusan');
    $q = $this->db->get('anggota');
    return $q;
}

public function get_relation($id1, $id2, $table) {
	return $this->db->where($id1, $id2)->get($table)->num_rows();
}

public function get_by_id($id)
    {
        $this->db->from('anggota');
        $this->db->where('id_anggota',$id);
        $query = $this->db->get();
 
        return $query;
    }

public function delete($id){
    $this->db->where('id_anggota', $id);
    $this->db->delete('anggota');
}

public function edit_anggota($where, $data)
    {
        $this->db->update('anggota', $data, $where);
        return $this->db->affected_rows();
    }

public function get_kelas(){
    $this->db->order_by('id_kelas', 'DESC');
    $q = $this->db->get('kelas');
    return $q;
}

public function get_jurusan(){
    $this->db->order_by('id_jurusan', 'DESC');
    $q = $this->db->get('jurusan');
    return $q;
}


}
