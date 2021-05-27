<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    public function __construct(){
        parent :: __construct();
        $this->load->model("MPerangkat_Desa");
        
    }

    function index(){
    $data['header']="template/template_header.php";
	$data['css']="dashboard/dashboard_css";
	$data['content']="login/login";	
	$data['footer']="template/template_footer.php";	
    $this->load->view('template/vtemplate',$data);  
        
    }

    // fungsi untuk cek login
    function auth(){
        // mengekstrak hasil inputan dari form login
        $input = $this->input->post(NULL,TRUE);
        extract($input);        

        // mengirim data inputan ke model 'Mperangkat_Desa' dengan bentuk array
        $akun = array(
            'Id_PD' => $id,
            'password' => $pass
        );
        $cek_akun = $this->MPerangkat_Desa->cek_login($akun);

        // apabaila data akun ditemukan maka $cek_akun akan bernilai true
        if ($cek_akun){
            // Data Session
            $data_session = array (
                'Id_PD'     => $cek_akun->Id_PD,
                'Nama' 	    => $cek_akun->Nama,                        
                'is_login' 	=> true
            );                   
            // Set Session degan data diatas  
            $this->session->set_userdata($data_session);
            redirect('Dashboard');
        } else {
            redirect('Login');
        }
    }

    // fungsi logout
    function LogOut(){
        $data_session = array (
            'Id_PD','Nama','is_login'
        );  
        
        // menghancurkan isi dari session login
        $this->session->unset_userdata($data_session);
        redirect('Login');
    }

}