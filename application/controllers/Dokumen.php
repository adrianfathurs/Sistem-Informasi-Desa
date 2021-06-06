<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dokumen extends CI_Controller {
  /* construct merupakan fungsi yang pertama kali dieksekusi disaat program atau file yang bersankutan dijalankan */
  public function __construct(){
    parent :: __construct();
    $this->load->model("MDokumen");
    $this->load->helper('download');
    $this->load->helper('file');
        
    }
  /* function index merupakan fungsi default yang dijalankan disaat Class Dokumen Dijalankan */
	public function index()
	{
    // Data Session
    $data['Id_PD'] = $this->session->userdata('Id_PD'); 
    $data['Nama'] = $this->session->userdata('Nama'); 
    $data['Jabatan'] = $this->session->userdata('Jabatan'); 
    $data['is_login'] = $this->session->userdata('is_login');
    if($data['is_login']== TRUE && ($data['Jabatan'] == 'Kaur Perencanaan' || $data['Jabatan'] == 'Sekretaris Desa' || $data['Jabatan'] == 'Admin' )){
      $data['header']="template/template_header.php";
      $data['css']="dokumen/dokumen_css";
      $data['content']="dokumen/dokumen.php";
      $data['js']="dokumen/dokumen_js.php";
      $data['footer']="template/template_footer.php";
      $data['dataDokumen']=$this->MDokumen->getAll();
      $this->load->view('template/vtemplate',$data); 
      } else {
        $this->session->set_flashdata('error', 'Akun anda tidak dapat mengakses fitur ini');
        redirect('Dashboard');
		}
  }
  /* function deletedFile merupakan fungsi yang digunakan untuk menghapus file lokal yang telah diupload 
    letak file yang dihapus ada dipath yang tertera didalam fungsi
  */
  public function deletedFile($query){
    // print_r($query->File_Name);die;
    var_dump(delete_files('./upload/dokumen/'.$query->File_Name)); 
    unlink("./upload/dokumen/" .$query->File_Name);
    // var_dump('./upload/dokumen/'.$query->File_Name);
  }
  /* 
    function upload merupakan fungsi yang digunakan untuk mengupload file yang telah diinputkan oleh user
    didalam fungsti ini juga mengarahkan agar data formdokumen agar dapat terseimpan kedalam database
  */
  public function upload(){
        $config['allowed_types']='pdf|docx|doc';
        $config['upload_path']='./upload/dokumen/';
        $config['max_size']=0;
        
        $this->load->library('upload',$config);
        $response=$this->MDokumen->selectedById($this->input->post("id_dokumen"));

        if($this->upload->do_upload('image') || $response){
          
        $id=$this->input->post("id_dokumen");   
        if($this->upload->data('file_name')){          
          $input=[
            'Id_Dok'=>$this->input->post("id_dokumen"),
            'Nama_Dokumen'=>$this->input->post("nama_dokumen"),
            'File_Name'=>$this->upload->data('file_name'),
            'fk_PD'=>$this->session->userdata('Id_PD'),
          ];
        }else{                    
          $input=[
            'Id_Dok'=>$this->input->post("id_dokumen"),
            'Nama_Dokumen'=>$this->input->post("nama_dokumen"),            
            'fk_PD'=>$this->session->userdata('Id_PD'),
          ];
        }
          /* 
            mengarahkan kemodel MDokumen dan diarahkan ke fungsi save
          */
          $response=$this->MDokumen->save($id,$input);
            if($response){
              // print_r($response->File_Name);die;
              $this->deletedFile($response);
              redirect("Dokumen");
            }else{
              redirect("Dokumen");
            }
          
        }
        else{
          print_r($this->upload->display_errors());
        } 
  }
  public function uploadUpdate($response){
        
        var_dump($response);

       
          
          $id=$this->input->post("id_dokumen");

          $input=[
            'Id_Dok'=>$this->input->post("id_dokumen"),
            'Nama_Dokumen'=>$this->input->post("nama_dokumen"),
            'File_Name'=>$response->File_Name,
            'fk_PD'=>$this->session->userdata('Id_PD'),
          ];
          /* 
            mengarahkan kemodel MDokumen dan diarahkan ke fungsi save
          */
          $response=$this->MDokumen->save($id,$input);
          redirect("Dokumen");
            
          
        
        
  }
  /* 
    fungsi deleteData digunakan untuk menghapus data yang ada didatabase
  */
  public function deleteData($id_Dok){
      $response=$this->MDokumen->selectedById($id_Dok);
      $this->deletedFile($response);
      $hasil2=$this->MDokumen->deletedData($id_Dok);
      redirect("Dokumen");
  }
  /* 
    fungsi formDokumen merupakan fungsi yang mengatur aksi yang dilakukan oleh user, apakah user ingin menghapus
    data dokumen atau ingin menambahkan file dokumen
  */
  public function formDokumen() {
        if($this->input->post("submit")=="upload")
        {
          $id_Dok=$this->input->post('id_dokumen');
          $response=$this->MDokumen->selectedById($id_Dok);
          if($response){
            $this->uploadUpdate($response);
          }else{
             $this->upload(); 

          }
        }else{
          $id_Dok=$this->input->post("id_dokumen");          
          $this->deleteData($id_Dok);
        }
    }
    /* 
      fungsi download merupakan fungsi yang mengatur agar file dapat didownload melalui browser
    */
    public function download($fileName){      
        $file='./upload/dokumen/'.$fileName;
        force_download($file,NULL);
    }

}