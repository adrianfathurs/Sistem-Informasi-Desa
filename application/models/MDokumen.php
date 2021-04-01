<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MDokumen extends CI_Model {

	public function save($id,$input){
    $this->db->where('Id_Dok', $id);
    $query=$this->db->from('dokumen');
    $data = $query->get()->row();
    if($data){
      $this->db->where('Id_Dok', $id);
      $this->db->update('dokumen', $input);
      return $data;
    }else{
      $this->db->insert('dokumen', $input);
      return false;
    }
  }
}
