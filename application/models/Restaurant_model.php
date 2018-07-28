<?php

class Restaurant_model extends CI_Model {

    public $table = "restaurants";

    public function get($limit = 1000)
    {
        $this->db->select("id");
        $this->db->select("name");
        $this->db->select("photo_cover");
        $this->db->select("address");
        $this->db->select("lat");
        $this->db->select("lng");

        $this->db->where("lat !=", "");
        $this->db->where("lng !=", "");

        $restaurants = $this->db->get($this->table, $limit)->result();
        
        

        $data = "";
        foreach($restaurants as $r){
            $name = stripslashes($r->name);
            $data .=  "[ locationData('#' , \"{$name}\", 'Disponivel', 'https://www.primeiramesa.com.br/storage/{$r->photo_cover}', \"{$name}\", \"{$r->address}\"), {$r->lat}, {$r->lng}, {$r->id}, markerIcon],";
                        
        }
        imprimir(($data),1);

        $string = str_replace('"', '',json_encode($string));
        
        return $string;
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