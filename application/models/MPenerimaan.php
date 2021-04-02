<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MPenerimaan extends CI_Model {
    public function getAll(){
        $query = $this->db->get('Penerimaan')->result_array();
        // print_r($query);die;
        return $query;
      }

      function Simpan_Penerimaan($data_penerimaan,$id_penerimaan){
        $this->db->where('Id_Penerimaan ', $id_penerimaan);
        $query=$this->db->from('Penerimaan');
        $data = $query->get()->row();        
        if($data){
          $this->db->where('Id_Penerimaan', $id_penerimaan);
          $this->db->update('Penerimaan', $data_penerimaan);
          return $data;
        }else{
          $this->db->insert('Penerimaan', $data_penerimaan);
          return true;
        }
      }
}