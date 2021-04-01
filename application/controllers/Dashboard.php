<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
   public function __construct(){
        parent :: __construct();

    }
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
	// Data Session
	$data['Id_PD'] = $this->session->userdata('Id_PD'); 
    $data['Nama'] = $this->session->userdata('Nama'); 
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