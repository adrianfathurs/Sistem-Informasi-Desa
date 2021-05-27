<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PerangkatDesa extends CI_Controller {
   public function __construct(){
        parent :: __construct();
        $this->load->model("MPerangkat_Desa");
    }
	
	public function index()	{
	// Data Session
	$data['Id_PD'] = $this->session->userdata('Id_PD'); 
    $data['Nama'] = $this->session->userdata('Nama'); 
	$data['is_login'] = $this->session->userdata('is_login'); 

	if($data['is_login']== TRUE && ($data['Id_PD'] == '4' || $data['Id_PD'] == '5')){
		$data['header']="template/template_header.php";
		$data['css']="perangkat/perangkatDesa_css";
		$data['content']="perangkat/perangkatDesa.php";
		$data['js']="perangkat/perangkatDesa_js.php";
		$data['footer']="template/template_footer.php";		
    $data["dataPerangkat"]=$this->MPerangkat_Desa->getAll();
		$this->load->view('template/vtemplate',$data);	
		} else {
			$this->session->set_flashdata('error', 'Akun anda tidak dapat mengakses fitur ini');
            redirect('Dashboard');
		}
	}
  /* untuk mendelete data didatabase */
  public function deletedData($id_PD){
    $res=$this->MPerangkat_Desa->deletedin($id_PD);
    redirect("PerangkatDesa");
  }
  public function formPerangkat(){
    var_dump($this->input->post("submit"));
    if($this->input->post("submit")=="upload"){
      $input=[
        "Id_PD"=>$this->input->post("id_PD"),
        "Nama"=>$this->input->post("nama"),
        "Tanggal_Lahir"=>$this->input->post("tgl_lahir"),
        "Jabatan"=>$this->input->post("jabatan"),
        "Pendidikan"=>$this->input->post("pendidikan"),
        "Password"=>$this->input->post("password"),
      ];
      $response=$this->MPerangkat_Desa->save($input);
      redirect("PerangkatDesa");
      }
      else{
        $id_PD=$this->input->post("id_PD");
        $this->deletedData($id_PD);
        
      } 


    }
}