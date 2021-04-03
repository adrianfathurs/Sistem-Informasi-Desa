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
    $data['dataPenerimaan'] = $this->MPenerimaan->getTahun();
    $data['dataParameter'] = $this->MParameter->getAll();    
    $this->load->view('template/vtemplate',$data);       
 
    }
    
    function get_bulan(){
        $data = $this->input->post('id',true);                
        $bulan_berdasarkan_tahun = $this->MPenerimaan->getBulan($data);
        foreach ($bulan_berdasarkan_tahun as $key => $val){
            $bulan_berdasarkan_tahun[$key]->Tanggal_Penerimaan	= $this->convert_date($val->Tanggal_Penerimaan);        
        };
        // print_r($bulan_berdasarkan_tahun);die;

        echo json_encode($bulan_berdasarkan_tahun);
    }

    private function convert_date($date) {
		$split_date			= explode("-", $date);
		$year				= $split_date[0];
		$month				= (int) $split_date[1];
		$day				= $split_date[2];

		if		($month == 1)	{ $month = "Januari"; }
		else if ($month == 2)	{ $month = "Februari"; }
		else if ($month == 3)	{ $month = "Maret"; }
		else if ($month == 4)	{ $month = "April"; }
		else if ($month == 5)	{ $month = "Mei"; }
		else if ($month == 6)	{ $month = "Juni"; }
		else if ($month == 7)	{ $month = "Juli"; }
		else if ($month == 8)	{ $month = "Agustus"; }
		else if ($month == 9)	{ $month = "September"; }
		else if ($month == 10)	{ $month = "Oktober"; }
		else if ($month == 11)	{ $month = "November"; }
		else if ($month == 12)	{ $month = "Desember"; }

		$final_convert =  $month;
		return $final_convert;
	}

    function form(){
        $input = $this->input->post(NULL,TRUE);
        extract($input);  
        // print_r($input);die;
        if($this->input->post("submit")=="penerimaan"){ 
            $data['dataPenerimaan'] = $this->MPenerimaan->getDataPenerimaan($bulan,$tahun);
            if($data['dataPenerimaan']){
            $this->load->library('pdf');
            $this->pdf->setPaper('A4', 'landscape');
            $this->pdf->filename = "Laporan Penerimaan.pdf";
            $this->pdf->load_view('laporan/pdf_penerimaan', $data);
            }else{                
                
                $this->session->set_flashdata('error',"Data Penerimaan pada bulan $bulan tahun $tahun tidak ada ");
                redirect('laporan');
            }
        }else if($this->input->post("submit")=="pengeluaran"){ 
            $data['dataPengeluaran'] = $this->MPengeluaran->getDataPengeluaran($bulan,$tahun);
            if($data['dataPengeluaran']){
            $this->load->library('pdf');
            $this->pdf->setPaper('A4', 'landscape');
            $this->pdf->filename = "Laporan Pengeluaran.pdf";
            $this->pdf->load_view('laporan/pdf_pengeluaran', $data);
            }else{
                $this->session->set_flashdata('error',"Data Pengeluaran pada bulan $bulan tahun $tahun tidak ada ");
                redirect('laporan');
            }
        }else{
            $data['dataPengeluaran'] = $this->MPengeluaran->getDataPengeluaran($bulan,$tahun);
            $data['dataPenerimaan'] = $this->MPenerimaan->getDataPenerimaan($bulan,$tahun);
            if($data['dataPengeluaran'] && $data['dataPenerimaan']){
            $this->load->library('pdf');
            $this->pdf->setPaper('A4', 'landscape');
            $this->pdf->filename = "Laporan Kas Umum.pdf";
            $this->pdf->load_view('laporan/pdf_kasUmum', $data);
            }else{
                $this->session->set_flashdata('error',"Data Kas Umum pada bulan $bulan tahun $tahun tidak ada ");
                redirect('laporan');
            }
        }
    }
}