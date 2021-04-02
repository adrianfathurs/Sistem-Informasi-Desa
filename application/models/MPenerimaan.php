<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MPenerimaan extends CI_Model {
    public function getAll(){
        $query = $this->db->get('Penerimaan')->result_array();
        // print_r($query);die;
        return $query;
      }
}