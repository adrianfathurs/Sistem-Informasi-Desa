<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MParameter extends CI_Model {
    public function getAll(){
        $query = $this->db->get('Parameter')->result_array();
        // print_r($query);die;
        return $query;
    }
    function getIdParameter($nama_parameter){
        $this->db->from('Parameter');
        $this->db->where('Nama_Parameter',$nama_parameter);
        $query = $this->db->get()->row();
        return $query->Id_Parameter;
    }
    public function save($id_parameter,$input){
        $this->db->where('Id_Parameter', $id_parameter);
        $query=$this->db->from('parameter');
        $data = $query->get()->row();
        if($data){
        $this->db->where('Id_Parameter', $id_parameter);
        $this->db->update('parameter', $input);
        return $data;
        }else{
        $this->db->insert('parameter', $input);
        
        }
    }
    public function deletedData($id_parameter){
        $this->db->where('Id_Parameter',$id_parameter);
        $query=$this->db->delete('parameter');
        return $query;
    }
}