<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
   public function __construct(){
        parent :: __construct();

    }
	
	public function index()
	{
	// Data Session
	$data['Id_PD'] = $this->session->userdata('Id_PD'); 
    $data['Nama'] = $this->session->userdata('Nama'); 
	$data['Jabatan'] = $this->session->userdata('Jabatan'); 
	$data['is_login'] = $this->session->userdata('is_login'); 

	if($data['is_login']== TRUE){
		$data['header']="template/template_header.php";
		$data['css']="dashboard/dashboard_css";
		$data['content']="dashboard/dashboard.php";
		$data['js']="dashboard/dashboard_js.php";
		$data['footer']="template/template_footer.php";		
		$this->load->view('template/vtemplate',$data);	
		} else {
			redirect('Login');
		}
	}
}