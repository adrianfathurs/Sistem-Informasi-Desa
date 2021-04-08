<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {
    public function __construct(){
        parent :: __construct();
        $this->load->model("MPenerimaan"); 
        $this->load->model("MParameter");        
        $this->load->model("MPengeluaran"); 
        $this->load->model("MKas"); 
        $this->load->model("MPerangkat_Desa"); 
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
            //tanggal sekarang dan tanggal esok
                $data['tanggalAwal']=$tanggal_awal;
                $data['tanggalAkhir']=$tanggal_akhir;
            //Perangkat Desa
                $kepalaDesa=$this->MPerangkat_Desa->cariKepalaDesa();
                if($kepalaDesa){
                    $data['kepalaDesa']=$kepalaDesa->Nama;
                }else{
                    $data['kepalaDesa']="";
                }
                
                $bendahara=$this->MPerangkat_Desa->cariBendahara();
                if($kepalaDesa){
                    $data['bendahara']=$bendahara->Nama;
                }else{
                    $data['bendahara']="";
                }
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
            //tanggal sekarang dan tanggal esok
                $data['tanggalAwal']=$tanggal_awal;
                $data['tanggalAkhir']=$tanggal_akhir;
            //Perangkat Desa
                $kepalaDesa=$this->MPerangkat_Desa->cariKepalaDesa();
                if($kepalaDesa){
                    $data['kepalaDesa']=$kepalaDesa->Nama;
                }else{
                    $data['kepalaDesa']="";
                }
                
                $bendahara=$this->MPerangkat_Desa->cariBendahara();
                if($kepalaDesa){
                    $data['bendahara']=$bendahara->Nama;
                }else{
                    $data['bendahara']="";
                }
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
            //pengurangan 1 bulan sebelumnya
                $date = new DateTime($tanggal_awal);
                $month=$date->format('n')-1;
                $beforeMonths=$this->month($month);
                $data['beforeMonth']=$beforeMonths;
                $data['totNomBulSebelum']=$this->hitungTotNomSebelum($month); 
                
            //Perhitungan bulan ini
                $date = date('n');
                $thisMonth=$this->month($date);
                $data['thisMonth']=$thisMonth;
                $data['totNomBulSekarang']=$this->hitungTotNomSekarang($date);
                
            //Perhitungan dari tanggal ini sampai tanggal itu
                $totPeng=$this->MPengeluaran->total_Pengeluaran($tanggal_awal,$tanggal_akhir);
                $totPen=$this->MPenerimaan->total_Penerimaan($tanggal_awal,$tanggal_akhir);
                $data['totSesuaiTanggal']=$totPen->total-$totPeng->total;
                $data['tanggalAwal']=$tanggal_awal;
                $data['tanggalAkhir']=$tanggal_akhir;
            //Perangkat Desa
                $kepalaDesa=$this->MPerangkat_Desa->cariKepalaDesa();
                if($kepalaDesa){
                    $data['kepalaDesa']=$kepalaDesa->Nama;
                }else{
                    $data['kepalaDesa']="";
                }
                
                $bendahara=$this->MPerangkat_Desa->cariBendahara();
                if($kepalaDesa){
                    $data['bendahara']=$bendahara->Nama;
                }else{
                    $data['bendahara']="";
                }
                

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
    function hitungTotNomSebelum($month){
            $responseTotalNominalPenerimaan=$this->MPenerimaan->MonthTotalNominal($month);
            $responseTotalNominalPengeluaran=$this->MPengeluaran->MonthTotalNominal($month);
            $totalBulanLalu= (int)$responseTotalNominalPenerimaan->totPenerimaan-(int)$responseTotalNominalPengeluaran->totPengeluaran;
            return $totalBulanLalu;            
    }
    function hitungTotNomSekarang($month){
            $responseTotalNominalPenerimaan=$this->MPenerimaan->MonthTotalNominal($month);
            $responseTotalNominalPengeluaran=$this->MPengeluaran->MonthTotalNominal($month);
            $totalBulanSekarang= (int)$responseTotalNominalPenerimaan->totPenerimaan-(int)$responseTotalNominalPengeluaran->totPengeluaran;
            return $totalBulanSekarang;            
    }
    function month($month){
        switch ($month) {
            case 1:
                $bulan="January";
                return $bulan;
                break;
            
            case 2:
                $bulan="Febuari";
                return $bulan;
                break;
            
            case 3:
                $bulan="Maret";
                return $bulan;
                break;
            
            case 4:
                $bulan="April";
                return $bulan;
                break;
            
            case 5:
                $bulan="Mei";
                return $bulan;
                break;
            
            default:
                # code...
                break;
        }
    }
}