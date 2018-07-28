<?php

class User_model extends CI_Model {

    public $table = "user";

    public function get($limit = 10)
    {
        return $this->db->get($this->table, $limit)->result();;
    }

    public function getById($id)
    {
        $this->db->where('id', $id);
        return $this->db->get($this->table)->row();
    }

    public function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    public function update($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->update($this->table, $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->table);
    }

}