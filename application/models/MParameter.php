<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MParameter extends CI_Model {
    public function getAll(){
        $query = $this->db->get('Parameter')->result_array();
        // print_r($query);die;
        return $query;
      }
}