<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {



	function  __construct() {
        parent::__construct();
        $this->load->model('Mahasiswamodel');
        $this->load->helper('form_helper');
        $this->load->helper(array('form'));
    }
    

	public function index()
	{

		$this->load->view('form_login_mahasiswa');

	}




function ceklogin(){
  if(isset($_POST['login'])){
   $user = $this->input->post('user',true);
   $pass = $this->input->post('pass',true);
   $cek = $this->Mahasiswamodel->proseslogin($user, $pass);
   $hasil = count($cek);

if($hasil > 0)
{
    $yglogin = $this->db->get_where('login_mhs', array('id_login'=>$user, 'password' =>$pass))->row();
    $data = array(
    'udhmasuk' => true,
    'id_login' => $yglogin->id_login,
    'mahasiswa_id_mahasiswa' => $yglogin->mahasiswa_id_mahasiswa );
  $this->session->set_userdata($data);
  redirect('Mahasiswa/beranda_mahasiswa');

}
 
 else {
    redirect('Mahasiswa/index');
	  }
} 
else {
	redirect('Mahasiswa/index');
	 }
}


public function beranda_mahasiswa()
	{
		$session = $this->session->userdata('udhmasuk');
		$id_login = $this->session->userdata('id_login');


		$data=$this->Mahasiswamodel->getdatamahasiswa($id_login);
		$datanya=array('data' =>$data,
						'id_login'=>$id_login);
		$this->load->view('beranda_mahasiswa',$datanya);

	}

  public function upload(){
    $id_mahasiswa = $this->session->userdata('mahasiswa_id_mahasiswa');
    $datanya=array('mahasiswa_id_mahasiswa'=>$id_mahasiswa);

    $this->load->view('upload_mahasiswa',$datanya);

  }

  function uploadkan(){
    $id_mahasiswa= $_POST['id_mahasiswa'];
    $date=date("Y/m/d");
    $config['upload_path'] = 'uploads/';
                $config['allowed_types'] = 'doc|docx';
                $config['file_name'] = $_FILES['laporan']['name'];
                
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('laporan')){
                    $uploadData = $this->upload->data();
                    $picture = $uploadData['file_name'];
                } else{
                    $picture = '';
                }
         


        
    $data_insert = array(
      'link_laporan'=>$picture,
      'mahasiswa_id_mahasiswa'=>$id_mahasiswa,
      'tgl_laporan'=>$date);


    $res=$this->Mahasiswamodel->insert_data_laporan('laporanya',$data_insert);
    if ($res>=1) {
      redirect('Mahasiswa/upload');
    }else{
      echo "NO";
    }
  }





function keluar()
 {
  $this->session->sess_destroy();
  redirect('Pendaftaran');
 } 





	
}
