<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penerimaan extends CI_Controller {
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
	$data['css']="penerimaan/penerimaan_css";
    $data['js']="penerimaan/penerimaan_js";
	$data['content']="penerimaan/penerimaan";	
	$data['footer']="template/template_footer.php";	
    $data['dataPenerimaan'] = $this->MPenerimaan->getAll();
    $data['dataParameter'] = $this->MParameter->getAll();    
    $this->load->view('template/vtemplate',$data);   
    }

    function form(){      
        $input = $this->input->post(NULL,TRUE);
        extract($input);   

        if($this->input->post("submit")=="Simpan"){            
            $data_penerimaan = [
                'Id_Penerimaan ' => $id_penerimaan,
                'Tanggal_Penerimaan' => $tanggal_penerimaan,
                'Nominal' => $nominal,
                'fk_Parameter' => $this->MParameter->getIdParameter($id_parameter),
                'fk_PD' => $this->session->userdata('Id_PD')
            ];
            $this->MPenerimaan->Simpan_Penerimaan($data_penerimaan,$id_penerimaan);
            redirect('Penerimaan');
        }else if($this->input->post("submit")=="Hapus") {
        //   $id_Dok=$this->input->post("id_dokumen");        
        //   $this->Hapus_Penerimaan($id_Dok);
        echo "hapus";
        }
        echo "gagal";
    }
}