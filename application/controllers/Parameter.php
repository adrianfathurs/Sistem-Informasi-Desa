<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Parameter extends CI_Controller {
   public function __construct(){
        parent :: __construct();
        $this->load->model("MParameter");
    }
	
	public function index()	{
	// Data Session
	$data['Id_PD'] = $this->session->userdata('Id_PD'); 
  $data['Nama'] = $this->session->userdata('Nama'); 
	$data['is_login'] = $this->session->userdata('is_login'); 

	if($data['is_login']== TRUE && ($data['Id_PD'] == '4' || $data['Id_PD'] == '5')){
		$data['header']="template/template_header.php";
		$data['css']="parameter/parameter_css";
		$data['content']="parameter/parameter.php";
		$data['js']="parameter/parameter_js.php";
		$data['footer']="template/template_footer.php";		
    $data["dataParameter"]=$this->MParameter->getAll();
		$this->load->view('template/vtemplate',$data);	
		} else {
			$this->session->set_flashdata('error', 'Akun anda tidak dapat mengakses fitur ini');
            redirect('Dashboard');
		}
	}
  public function deleteData($id_parameter){
    $this->MParameter->deletedData($id_parameter);
    return true;
  }
  public function formParameter(){
    $sub=$this->input->post("submit");
    if($sub=="upload"){

      $id_parameter=$this->input->post("id_parameter");
      $nama_parameter=$this->input->post("nama_parameter");
      $data=[
        "Id_Parameter"=>$id_parameter,
        "Nama_Parameter"=>$nama_parameter,
      ];
      $response=$this->MParameter->save($id_parameter,$data);
      redirect("Parameter");
    }else{
      $id_parameter=$this->input->post("id_parameter");
      $res= $this->deleteData($id_parameter);
      if($res){
        redirect("Parameter");
      }
    }
      
  }
}