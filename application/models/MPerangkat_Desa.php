<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MPerangkat_Desa extends CI_Model {
    function cek_login($akun){
        $this->db->from('Perangkat_Desa');
        $this->db->where($akun);    
        return  $this->db->get()->result();

    }
	
}