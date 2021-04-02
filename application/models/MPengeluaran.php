<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MPengeluaran extends CI_Model {
    public function getAll(){
      $this->db->select('*');
      $this->db->from('Pengeluaran');
      $this->db->join('parameter','parameter.Id_Paramater = Pengeluaran.fk_parameter');      
      $query = $this->db->get()->result_array();
      return $query;
      }

      function Simpan_pengeluaran($data_pengeluaran,$id_pengeluaran){
        $this->db->where('Id_Pengeluaran', $id_pengeluaran);
        $query=$this->db->from('Pengeluaran');
        $data = $query->get()->row();        
        if($data){
          $this->db->where('Id_Pengeluaran', $id_pengeluaran);
          $this->db->update('Pengeluaran', $data_pengeluaran);
          return $data;
        }else{
          $this->db->insert('Pengeluaran', $data_pengeluaran);
          return true;
        }
      }

      function hapus_pengeluaran($id_pengeluaran){
        $this->db->delete('Pengeluaran', array('Id_Pengeluaran' => $id_pengeluaran));
      }
}