<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {
    public function __construct(){
        parent :: __construct();
        $this->load->model("MPenerimaan"); 
        $this->load->model("MParameter");        
        $this->load->model("MPengeluaran"); 
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
    $data['dataParameter'] = $this->MParameter->getAll();    
    $this->load->view('template/vtemplate',$data);       
     }
    
    function form(){
        $input = $this->input->post(NULL,TRUE);
        extract($input);  
        // print_r($input);die;
        if($this->input->post("submit")=="penerimaan"){ 
            $data['dataPenerimaan'] = $this->MPenerimaan->getDataPenerimaan($tanggal_awal,$tanggal_akhir);
            $data['total_Penerimaan'] = $this->MPenerimaan->total_Penerimaan($tanggal_awal,$tanggal_akhir);
            if($data['dataPenerimaan']){
            $this->load->library('pdf');
            $this->pdf->setPaper('A4', 'landscape');
            $this->pdf->filename = "Laporan Penerimaan.pdf";
            $this->pdf->load_view('laporan/pdf_penerimaan', $data);
            }else{                
                
                $this->session->set_flashdata('error',"Data Penerimaan pada tanggal $tanggal_awal sampai tanggal $tanggal_akhir tidak ada ");
                redirect('laporan');
            }
        }else if($this->input->post("submit")=="pengeluaran"){ 
            $data['dataPengeluaran'] = $this->MPengeluaran->getDataPengeluaran($tanggal_awal,$tanggal_akhir);
            $data['total_Pengeluaran'] = $this->MPengeluaran->total_Pengeluaran($tanggal_awal,$tanggal_akhir);            
            if($data['dataPengeluaran']){
            $this->load->library('pdf');
            $this->pdf->setPaper('A4', 'landscape');
            $this->pdf->filename = "Laporan Pengeluaran.pdf";
            $this->pdf->load_view('laporan/pdf_pengeluaran', $data);
            }else{
                $this->session->set_flashdata('error',"Data Pengeluaran pada tanggal $tanggal_awal sampai tanggal $tanggal_akhir tidak ada ");
                redirect('laporan');
            }
        }else{
            $data['dataPengeluaran'] = $this->MPengeluaran->getDataPengeluaran($tanggal_awal,$tanggal_akhir);
            $data['dataPenerimaan'] = $this->MPenerimaan->getDataPenerimaan($tanggal_awal,$tanggal_akhir);
            if($data['dataPengeluaran'] && $data['dataPenerimaan']){
            $this->load->library('pdf');
            $this->pdf->setPaper('A4', 'landscape');
            $this->pdf->filename = "Laporan Kas Umum.pdf";
            $this->pdf->load_view('laporan/pdf_kasUmum', $data);
            }else{
                $this->session->set_flashdata('error',"Data Kas Umum pada tanggal $tanggal_awal sampai tanggal $tahun tidak ada ");
                redirect('laporan');
            }
        }
    }
}