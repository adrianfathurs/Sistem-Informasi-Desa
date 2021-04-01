<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dokumen extends CI_Controller {
  public function __construct(){
    parent :: __construct();
    $this->load->model("MDokumen");
    $this->load->helper('download');
        
    }
	public function index()
	{
		$data['header']="template/template_header.php";
    $data['css']="dokumen/dokumen_css";
    $data['content']="dokumen/dokumen.php";
    $data['js']="dokumen/dokumen_js.php";
    $data['footer']="template/template_footer.php";
    $data['dataDokumen']=$this->MDokumen->getAll();
    
    $this->load->view('template/vtemplate',$data); 
	}

  public function deletedFile($query){
    delete_files('./upload/dokumen/'.$query->File_Name);
  }

  public function upload() {
        $config['allowed_types']='pdf|jpg';
        $config['upload_path']='./upload/dokumen/';
        
        $this->load->library('upload',$config);

        if($this->upload->do_upload('image')){
          
          $id=$this->input->post("id_dokumen");

          $input=[
            'Id_Dok'=>$this->input->post("id_dokumen"),
            'Nama_Dokumen'=>$this->input->post("nama_dokumen"),
            'File_Name'=>$this->upload->data('file_name'),
            'fk_PD'=>1,
          ];

          $response=$this->MDokumen->save($id,$input);
         
            if($response){
              $this->deletedFile($response);
              
            }else{
              
            }
          
        }
        else{
          print_r($this->upload->display_errors());
        }
    }

    public function download($fileName){
      var_dump($fileName);
        $file='upload/dokumen/'.$fileName;
        force_download($file,NULL);
    }

}