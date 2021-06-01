<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MKas extends CI_Model {

	public function getAllByDate($tanggal_awal,$tanggal_akhir){
    $this->db->select('*,Penerimaan.Nominal as NominalPen,Pengeluaran.Nominal as NominalPeng');
      $this->db->from('Penerimaan');
      $this->db->join('parameter','parameter.Id_Parameter = Penerimaan.fk_parameter');     
      $this->db->join('Pengeluaran','parameter.Id_Parameter = Pengeluaran.fk_parameter');   
      $this->db->where('Tanggal_Penerimaan >=',$tanggal_awal);
      $this->db->where('Tanggal_Penerimaan <=',$tanggal_akhir);
      $this->db->group_by('Penerimaan.Tanggal_Penerimaan');
      $query = $this->db->get()->result_array();
      return $query;   
  }
  
 
}
