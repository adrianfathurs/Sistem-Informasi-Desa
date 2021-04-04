<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {
    public function __construct(){
        parent :: __construct();
        $this->load->model("MPenerimaan"); 
        $this->load->model("MParameter");        
    }

    function index(){
    // Data Session
	$data['Id_PD'] = $this->session->userdata('Id_PD'); 
    $data['Nama'] = $this->session->userdata('Nama'); 
	$data['is_login'] = $this->session->userdata('is_login'); 
    $data['header']="template/template_header.php";
	$data['css']="laporan/laporan_css";
    $data['js']="laporan/laporan_js";
	$data['content']="laporan/laporan";	
	$data['footer']="template/template_footer.php";	
    $data['dataPenerimaan'] = $this->MPenerimaan->getTahun();
    $data['dataParameter'] = $this->MParameter->getAll();    
    $this->load->view('template/vtemplate',$data);       
    // $t = substr($data['Tanggal_Penerimaan'],1,4);
    }
    
    function get_bulan(){
        $data = $this->input->post('id',true);        
        var_dump($data);
        


        echo json_encode($data);
    }
}