<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MPenerimaan extends CI_Model {
    public function getAll(){
      $this->db->select('*');
      $this->db->from('Penerimaan');
      $this->db->join('parameter','parameter.Id_Paramater = Penerimaan.fk_parameter');      
      $query = $this->db->get()->result_array();
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

      function hapus_penerimaan($id_penerimaan){
        $this->db->delete('Penerimaan', array('Id_Penerimaan' => $id_penerimaan));
      }

      function getTahun(){
        $this->db->select('*');
        $this->db->from('Penerimaan');
        $this->db->distinct('Tanggal_Penerimaan');
        $query = $this->db->get(); 
        return $query->result_array();
      }
}