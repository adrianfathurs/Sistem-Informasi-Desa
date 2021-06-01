<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MPenerimaan extends CI_Model {
    public function getAll(){
      $this->db->select('*');
      $this->db->from('Penerimaan');
      $this->db->join('parameter','parameter.Id_Parameter = Penerimaan.fk_parameter');      
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
      function getDataPenerimaan($tgl_awal,$tgl_akhir){
        $this->db->select('*');
        $this->db->from('Penerimaan');
        $this->db->join('parameter','parameter.Id_Parameter = Penerimaan.fk_parameter'); 
        $this->db->where('Tanggal_Penerimaan >=',$tgl_awal);
        $this->db->where('Tanggal_Penerimaan <=',$tgl_akhir);
        $this->db->order_by("Tanggal_Penerimaan","ASC");
        $query = $this->db->get()->result_array();
        return $query;
      }

      function total_Penerimaan($tgl_awal,$tgl_akhir){       
        $this->db->select('SUM(Nominal) as total');
        $this->db->from('Penerimaan');
        $this->db->where('Tanggal_Penerimaan >=',$tgl_awal);
        $this->db->where('Tanggal_Penerimaan <=',$tgl_akhir);
        $query = $this->db->get()->row();
        return $query;
      }

      public function MonthTotalNominal($Month){
      $this->db->select('SUM(Nominal) as totPenerimaan');
      $this->db->from('Penerimaan');
      $this->db->where('month(Tanggal_Penerimaan)',$Month);
      $query = $this->db->get()->row();
        return $query; 
    }
}