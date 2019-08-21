<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendaftaran extends CI_Controller {


	function  __construct() {
        parent::__construct();
        $this->load->model('Register');
        $this->load->helper('form_helper');
        $this->load->helper(array('form'));
    }
    

	public function index()
	{

		redirect('Pendaftaran/tampilawal');

	}

	public function tampilawal(){
		$this->load->view('awal');
	}


		public function registrasi()
	{

		
 
 		$iddaftar = $this->Register->buat_kode();
   		
        $data = $this->Register->dd_jurusan(); 
        $datanya= array('data' => $data,
        				'iddaftar' => $iddaftar);

   		$this->load->view('form_daftar', $datanya);
	}


	public function do_add_data_mhs(){
		$id_registrasi= $_POST['iddaftar'];
		$nama= $_POST['nama'];
		$nim= $_POST['nim'];
		$ttl=$_POST['ttl'];
		$alamat=$_POST['alamat'];
		$id_jurusan=$_POST['id_jurusan'];
		$status="BLM";


				$config['upload_path'] = 'uploads/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name'] = $_FILES['khs']['name'];
                
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('khs')){
                    $uploadData = $this->upload->data();
                    $picture = $uploadData['file_name'];
                } else{
                    $picture = '';
                }
         


         		$config1['upload_path'] = 'uploads/';
                $config1['allowed_types'] = 'jpg|jpeg|png|gif';
                $config1['file_name'] = $_FILES['kkn']['name'];
                
                //Load upload library and initialize configuration
                $this->load->library('upload',$config1);
                $this->upload->initialize($config1);
                
                if($this->upload->do_upload('kkn')){
                    $uploadData1 = $this->upload->data();
                    $picture1 = $uploadData1['file_name'];
                } else{
                    $picture1 = '';
                }




		$data_insert = array(
			'id_registrasi'=>$id_registrasi,
			'nim'=>$nim,
			'nama_mahasiswa'=>$nama,
			'alamat'=>$alamat,
			'ttl'=>$ttl,
			'jurusan_id_jurusan'=>$id_jurusan,
			'status'=>$status,
			'link_bukti_khs'=>$picture,
			'link_bukti_bayar_kkn'=>$picture1);


		$res=$this->Register->insert_data('registrasi',$data_insert);
		if ($res>=1) {
			redirect('Pendaftaran');
		}else{
			echo "NO";
		}
	}


	public function panelogin(){

	$this->load->view('form_login_mahasiswa');

	}

}
