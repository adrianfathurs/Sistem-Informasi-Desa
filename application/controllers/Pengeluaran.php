<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengeluaran extends CI_Controller {
    public function __construct(){
        parent :: __construct();
        $this->load->model("MPengeluaran"); 
        $this->load->model("MParameter");        
    }

    function index(){
    // Data Session
	$data['Id_PD'] = $this->session->userdata('Id_PD'); 
    $data['Nama'] = $this->session->userdata('Nama'); 
    $data['Jabatan'] = $this->session->userdata('Jabatan');
	$data['is_login'] = $this->session->userdata('is_login'); 
    if($data['is_login']== TRUE && ($data['Jabatan'] == 'Kaur Keuangan' || $data['Jabatan'] == 'Admin')){
        $data['header']="template/template_header.php";
        $data['css']="pengeluaran/pengeluaran_css";
        $data['js']="pengeluaran/pengeluaran_js";
        $data['content']="pengeluaran/pengeluaran";	
        $data['footer']="template/template_footer.php";	
        $data['dataPengeluaran'] = $this->MPengeluaran->getAll();
        $data['dataParameter'] = $this->MParameter->getAll();    
        $this->load->view('template/vtemplate',$data);  
    } else {
        $this->session->set_flashdata('error', 'Akun anda tidak dapat mengakses fitur ini');
            redirect('Dashboard');
    } 
    }

    function form(){      
        $input = $this->input->post(NULL,TRUE);
        extract($input);   
        
        $nominal = $this->convert_to_number($nominal);
		$nominal = (int)$nominal/100;

        if($this->input->post("submit")=="Simpan"){            
            $data_pengeluaran = [
                'Id_Pengeluaran ' => $id_pengeluaran,
                'Tanggal_Pengeluaran' => $tanggal_pengeluaran,
                'Nominal' => $nominal,
                'fk_Parameter' => $this->MParameter->getIdParameter($nama_parameter),
                'fk_PD' => $this->session->userdata('Id_PD')
            ];
            // print_r($data_penerimaan);die;
            $this->MPengeluaran->Simpan_Pengeluaran($data_pengeluaran,$id_pengeluaran);
            redirect('pengeluaran');
        }else if($this->input->post("submit")=="Hapus") {
            $this->MPengeluaran->hapus_pengeluaran($id_pengeluaran);
            redirect('pengeluaran');
        } else{
            redirect('dashboard');
        }
    }

    public function convert_to_number($rupiah)
	{
		return preg_replace("/[^0-9]/","", $rupiah);
	}
}