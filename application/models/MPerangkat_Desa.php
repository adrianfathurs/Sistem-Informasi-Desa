<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MPerangkat_Desa extends CI_Model {

    //ambil semuaa data yang ada didatabase MPerangkat_desa
    function getAll(){
        $query = $this->db->get('perangkat_desa')->result_array();
        return $query;
    }
    // cek di database apakah data akun tersedia atau tidak
    function cek_login($akun){
        $this->db->from('perangkat_desa');
        $this->db->where($akun);    

        return  $this->db->get()->row();
    }
    //insert data ke database
    function save($input){
        $this->db->where('Id_PD', $input["Id_PD"]);
        $query=$this->db->from('perangkat_desa');
        $data = $query->get()->row();
        var_dump($data);
         if($data){
        $this->db->where('Id_PD', $input["Id_PD"]);
        $this->db->update('perangkat_desa', $input);
        
        }else{
        $this->db->insert('perangkat_desa', $input);
        
        } 
    }
    //delete data didatabase berdasarkan id_PD
    function deletedin($id_PD){
        $this->db->where("Id_PD",$id_PD);
        $this->db->delete("perangkat_desa");
        return true;
    }
	
}
