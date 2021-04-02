<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MParameter extends CI_Model {
    public function getAll(){
        $query = $this->db->get('Parameter')->result_array();
        // print_r($query);die;
        return $query;
      }
    function getIdParameter($id_parameter){
        $this->db->from('Parameter');
        $this->db->where('Nama_Parameter',$id_parameter);
        $query = $this->db->get()->row();
        return $query->Id_Paramater;
    }
}