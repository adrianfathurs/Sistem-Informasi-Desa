<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    public function __construct(){
        parent :: __construct();
        $this->load->model("MPerangkat_Desa");
        
    }

    function index(){
        $this->load->view('Login/login.php');
    }

    function auth(){
        $input = $this->input->post(NULL,TRUE);
        extract($input);        
        $akun = array(
            'Id_PD' => $id,
            'password' => $pass
        );
        $cek_akun = $this->MPerangkat_Desa->cek_login($akun);
        if ($cek_akun){
            // Data Session
            $data_session = array (
                'Id_PD'     => $cek_akun->Id_PD,
                'Nama' 	    => $user->Nama,                        
                'is_login' 	=> true
            );       
            // Set Session degan data diatas  
            $this->session->set_userdata($data_session);
            redirect('Dashboard');
        } else {
            redirect('Login');
        }
    }

    function LogOut(){
        $data_session = array (
            'Id_PD','Nama','is_login'
        );  
        $this->session->unset_userdata($data_session);
        redirect('Login');
    }

}