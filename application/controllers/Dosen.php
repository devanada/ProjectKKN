<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen extends CI_Controller {
	
function  __construct() 
{
        parent::__construct();
        $this->load->model('Dosenmodel');
        $this->load->helper('form_helper');
        $this->load->helper(array('form'));
}
    

public function index()
	{

		redirect('Dosen/panelogin');
  	}

public function panelogin()

{

	$this->load->view('form_login_dosen');
}

function ceklogin(){
  if(isset($_POST['login'])){
   $user = $this->input->post('user',true);
   $pass = $this->input->post('pass',true);
   $cek = $this->Dosenmodel->proseslogin($user, $pass);
   $hasil = count($cek);

if($hasil > 0)
{
    $yglogin = $this->db->get_where('login_dosen', array('username'=>$user, 'password' => $pass))->row();
    $data = array(
    'udhmasuk' => true,
    'username' => $yglogin->username,
    'level' => $yglogin->level,
    'id_login' => $yglogin->id_login);

    $this->session->set_userdata($data);
    
    if($yglogin->level == 'dppm')
    {
     redirect('Dosen/beranda_dppm');
    }
    elseif($yglogin->level == 'dpl')
    {
     redirect('Dosen/beranda_dppl');
    } 
    else
    {
     redirect('Dosen/panelogin');
    }
  }
  else {
    redirect('Dosen/panelogin');
  }
}
				}


function beranda_dppm()

{
$session = $this->session->userdata('udhmasuk');
$levelnya = $this->session->userdata('level');
$username = $this->session->userdata('username');
if(($session == TRUE) and ($levelnya=="dppm"))
{
 $data["level"] = $levelnya;
 $this->load->view('beranda_dppm', $data);
}
else
{
redirect('Dosen/panelogin'); 
}

}

 function beranda_dppl()

{
$id_login = $this->session->userdata('id_login');
$levelnya = $this->session->userdata('level');
$session = $this->session->userdata('udhmasuk');
$username = $this->session->userdata('username');
if(($session == TRUE) and ($levelnya=="dpl"))
{
   

$where=" where a.dosen_dpl_id_pic=(select a.id_pic from dosen_dpl a, login_dosen b where (b.id_login=a.login_dosen_id_login) AND b.username='$username')";
$datane=$this->Dosenmodel->getkeldpl($where);
$data["title"] = "Halaman DPL";
$datanya=array('data' =>$data,
                'datane'=>$datane);


$this->load->view('beranda_dppl', $datanya);
}
else
{
	redirect('Dosen/panelogin');
}

}

function lihat_dpl(){

$data=$this->Dosenmodel->getdatadpl();
$datanya=array('data' =>$data);
$this->load->view('lihat_dpl',$datanya);
}

function set_dpl(){

$levelnya = $this->session->userdata('level');
$session = $this->session->userdata('udhmasuk');
if(($session == TRUE) and ($levelnya=="dppm"))
{
  $iddaftar = $this->Dosenmodel->buat_kode();
  $idpic = $this->Dosenmodel->buat_kode_pic();
  $datanya= array('iddaftar' => $iddaftar,
                  'idpic' => $idpic);
  $this->load->view('set_dpl', $datanya);
}
else
{
	redirect('Dosen/panelogin');
}
}


function add_data_dpl(){

    $id_login= $_POST['id_login'];
    $id_pic= $_POST['id_dosen'];
    $nama= $_POST['nama'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $level="dpl";

    $data_insert_login = array(
      'id_login'=>$id_login,
      'username'=>$username,
      'password'=>$password,
      'level'=>$level);

    $data_insert_dpl=array('id_pic'=>$id_pic,
                            'nama_dosen'=>$nama,
                            'login_dosen_id_login'=>$id_login);

    $res=$this->Dosenmodel->insert_data_login('login_dosen',$data_insert_login);
    $res2=$this->Dosenmodel->insert_data_dpl('dosen_dpl',$data_insert_dpl);

    if ($res>=1&&$res2>=1) {
      redirect('Dosen/lihat_dpl');
    }else{
      echo "NO";
    }

}

function edit_dpl($id_pic){


$datadpl=$this->Dosenmodel->getdatadpl(" AND a.id_pic = '$id_pic'");
$data=array('nama_dosen' => $datadpl[0]['nama_dosen'],
              'id_pic'=>$datadpl[0]['id_pic'],
              'password'=>$datadpl[0]['password'],
              'username'=>$datadpl[0]['username'],
              'id_login'=>$datadpl[0]['id_login']);
$this->load->view('edit_dpl',$data);
}

function update_dpl(){

    $id_login= $_POST['id_login'];
    $id_dosen= $_POST['id_dosen'];
    $nama= $_POST['nama'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $level="dpl";

    $data_update_login = array(
      'username'=>$username,
      'password'=>$password
       );

    $data_update_dpl=array( 'nama_dosen'=>$nama,
                            'login_dosen_id_login'=>$id_login);

    $where_dpl= array('id_pic' => $id_dosen );
    $where_login= array('id_login' => $id_login );

    $res=$this->Dosenmodel->update_data_login('login_dosen',$data_update_login,$where_login);
    $res2=$this->Dosenmodel->update_dpl('dosen_dpl',$data_update_dpl,$where_dpl);

    if ($res>=1&&$res2>=1) {
      redirect('Dosen/lihat_dpl');
    }else{
      echo "NO";
    }
    //echo "<prev>";
    //print_r($_POST);
    //echo "</prev>";
}



function set_kelompok(){
$idkelompok = $this->Dosenmodel->buat_kode_kelompok();
$data=$this->Dosenmodel->getdatadpl();
$datanya=array('data' =>$data,
                'idkelompok'=>$idkelompok);
$this->load->view('set_kelompok',$datanya);
}

function add_kelompok(){

$nama_kelompok= $_POST['kelompok'];
    $lokasi= $_POST['lokasi'];
    $id_pembimbing= $_POST['id_pembimbing'];
    $id_kelompok=$_POST['id_kelompok'];
   

    $data_insert_login = array(
      'id_kel_kkn'=>$id_kelompok,
      'nama_kelompok'=>$nama_kelompok,
      'dosen_dpl_id_pic'=>$id_pembimbing,
      'desa'=>$lokasi);

    
    $res=$this->Dosenmodel->insert_data_kelompok('kel_kkn',$data_insert_login);
   
    if ($res>=1) {
      redirect('Dosen/lihat_kelompok');
    }else{
      echo "NO";
    }


}

function update_kelompok(){
    $kelompok= $_POST['kelompok'];
    $lokasi= $_POST['lokasi'];
    //$id_pembimbing= $_POST['id_pembimbing'];
    $id_kelompok=$_POST['id_kelompok'];
    
    
    $data_update_kelompok=array( 'nama_kelompok'=>$kelompok,
                            'desa'=>$lokasi,
                             //'dosen_dpl_id_pic'=>$id_pembimbing,
                              'id_kel_kkn'=>$id_kelompok);

    $where_kel_kkn= array('id_kel_kkn' => $id_kelompok );
    

    $res=$this->Dosenmodel->update_data_kelompok('kel_kkn',$data_update_kelompok,$where_kel_kkn);
    
    if ($res>=1) {
      redirect('Dosen/lihat_kelompok');
    }else{
      redirect('Dosen/keluar');
    }
 
}


function lihat_kelompok(){
$data=$this->Dosenmodel->getdatakelompok();
$datanya=array('data' =>$data);
$this->load->view('lihat_kelompok',$datanya);

}

function edit_kelompok($id_kel_kkn){

  $datadpl=$this->Dosenmodel->getdatadpl();
  $dataid= $this->Dosenmodel->getdatakelompok(" AND a.id_kel_kkn = '$id_kel_kkn'");
  $data=array('nama_kelompok' => $dataid[0]['nama_kelompok'],
              'desa'=>$dataid[0]['desa'],
              'id_kel_kkn'=>$dataid[0]['id_kel_kkn'],
              'datadpl'=>$datadpl);

$this->load->view("edit_kelompok",$data);

}



function kelola_peserta($offset=0){
  $jml = $this->db->get('registrasi');


   $config['base_url'] = base_url().'index.php/Dosen/kelola_peserta';
   $config['total_rows'] = $jml->num_rows();
   $config['per_page'] = 6; /*Jumlah data yang dipanggil perhalaman*/ 
   $config['url_segment'] = 6; /*data selanjutnya di parse diurisegmen 3*/
   
   
$config['full_tag_open']   = '<div class="pagging text-center"><nav><ul class="pagination">';
$config['full_tag_close']   = '</ul></nav></div>';
$config['num_tag_open']   = '<li class="page-item"><span class="page-link">';
$config['num_tag_close']  = '</span></li>';
$config['cur_tag_open']   = '<li class="page-item active"><span class="page-link">';
$config['cur_tag_close']  = '<span class="sr-only">(current)</span></span></li>';
$config['next_tag_open']  = '<li class="page-item"><span class="page-link">';
$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
$config['prev_tag_open']  = '<li class="page-item"><span class="page-link">';
$config['prev_tagl_close']  = '</span></li>';
$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
$config['first_tagl_close'] = '</span></li>';
$config['last_tag_open']  = '<li class="page-item"><span class="page-link">';
$config['last_tagl_close']  = '</span></li>';
  
   $this->pagination->initialize($config);
   
   $data['halaman'] = $this->pagination->create_links();
   /*membuat variable halaman untuk dipanggil di view nantinya*/
   $data['offset'] = $offset;

   $data['data'] = $this->Dosenmodel->getdataregistrasi($config['per_page'], $offset);
   
  // $data=$this->Dosenmodel->getdataregistrasi();
  // $datanya=array('data' =>$data);
  $this->load->view('kelola_peserta',$data);
}

function search_keyword()
    {

        $data['halaman'] = "";
        $keyword    =   $this->input->post('keyword');
        $data['data']    =   $this->Dosenmodel->search($keyword);
        $this->load->view('kelola_peserta',$data);
    }


function daftarkan_peserta($id_registrasi,$nim,$nama_mahasiswa){
  $data_kelompok=$this->Dosenmodel->getdatakelompok();
  $id_login_mhs = $this->Dosenmodel->buat_kode_login_mhs();
  $id_mahasiswa = $this->Dosenmodel->buat_kode_mhs();
  $datanya= array('id_login' => $id_login_mhs,
                  'id_mahasiswa' => $id_mahasiswa,
                  'id_registrasi'=> $id_registrasi,
                  'nim'=> $nim,
                  'nama_mahasiswa'=>$nama_mahasiswa,
                  'data_kelompok'=>$data_kelompok);
  $this->load->view('daftarkan_peserta',$datanya);
}

function insert_daftar_peserta(){

    $id_mahasiswa= $_POST['id_mahasiswa'];
    $id_registrasi= $_POST['id_registrasi'];
    $id_login= $_POST['id_login'];
    $nama=$_POST['nama'];
    $nim=$_POST['nim'];
    $password=$_POST['password'];
    $id_kelompok=$_POST['id_kelompok'];
    $status="SDH";
    $nilai="0";

    $data_insert_mahasiswa = array(
      'id_mahasiswa'=>$id_mahasiswa,
      'registrasi_id_registrasi'=>$id_registrasi,
      'kel_kkn_id_kel_kkn' => $id_kelompok);

    $data_insert_nilai=array('pembekalan'=>$nilai,
                            'kegiatan'=>$nilai,
                            'laporan'=>$nilai,
                            'mahasiswa_id_mahasiswa'=>$id_mahasiswa);

    $data_insert_login_mhs=array('id_login'=>$id_login,
                            'password'=>$password,
                            'mahasiswa_id_mahasiswa'=>$id_mahasiswa);
    $where=" where registrasi_id_registrasi='$id_registrasi'";
    $data_mhs=$this->Dosenmodel->getdatamahasiswa($where);
    $datanya=array('registrasi_id_registrasi' => $data_mhs[0]['registrasi_id_registrasi']);

    if ($datanya==$id_registrasi) {
      echo "MAHASISWA SUDAH DIDAFTRAKAN SEBEUMNYA";
      }
      else {

    $res=$this->Dosenmodel->insert_data_mahasiswa('mahasiswa',$data_insert_mahasiswa);
    $res2=$this->Dosenmodel->insert_data_login_mhs('login_mhs',$data_insert_login_mhs);
    $res4=$this->Dosenmodel->insert_data_nilai('nilai_akhir',$data_insert_nilai);
    if ($res>=1&&$res2>=1&&$res4>=1) {
      $data_update_status=array('status'=>$status);
      $where_registrasi= array('id_registrasi' => $id_registrasi);
    $res3=$this->Dosenmodel->update_data_registrasi('registrasi',$data_update_status,$where_registrasi);
    if ($res3>=1) {
      redirect('Dosen/kelola_peserta');
    }
      }
      else{
      echo "NO";
    }

      }
    
// echo "<prev>";
  //print_r($_POST);
  //echo "</prev>";
}


function setmhsfix($offset=0){


 $jml = $this->db->get_where('registrasi', array('status' => "SDH"));


   $config['base_url'] = base_url().'index.php/Dosen/setmhsfix';
   $config['total_rows'] = $jml->num_rows();
   $config['per_page'] = 5; /*Jumlah data yang dipanggil perhalaman*/ 
   $config['url_segment'] = 5; /*data selanjutnya di parse diurisegmen 3*/
   
   
$config['full_tag_open']   = '<div class="pagging text-center"><nav><ul class="pagination">';
$config['full_tag_close']   = '</ul></nav></div>';
$config['num_tag_open']   = '<li class="page-item"><span class="page-link">';
$config['num_tag_close']  = '</span></li>';
$config['cur_tag_open']   = '<li class="page-item active"><span class="page-link">';
$config['cur_tag_close']  = '<span class="sr-only">(current)</span></span></li>';
$config['next_tag_open']  = '<li class="page-item"><span class="page-link">';
$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
$config['prev_tag_open']  = '<li class="page-item"><span class="page-link">';
$config['prev_tagl_close']  = '</span></li>';
$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
$config['first_tagl_close'] = '</span></li>';
$config['last_tag_open']  = '<li class="page-item"><span class="page-link">';
$config['last_tagl_close']  = '</span></li>';
  
   $this->pagination->initialize($config);
   
   $data['halaman'] = $this->pagination->create_links();
   /*membuat variable halaman untuk dipanggil di view nantinya*/
   $data['offset'] = $offset;

   $data['data'] = $this->Dosenmodel->getmhskkn($config['per_page'], $offset);
   
  // $data=$this->Dosenmodel->getdataregistrasi();
 // $datanya=array('data' =>$data);


// $data=$this->Dosenmodel->getmhskkn();
// $datanya=array('data' =>$data);
$this->load->view('set_peserta',$data);

}

function search_keyword3()
    {

        $datanya['halaman'] = "";
        $keyword =  $this->input->post('keyword');
        $datanya['data']    =   $this->Dosenmodel->searchmhsfix($keyword);
        $this->load->view('set_peserta',$datanya);
    }




function loaddpl(){
  $idnya=$_POST['kodedplnya'];
  $nama_dosen = $this->Dosenmodel->getnamadpl(" where id_pic=".$idnya."")->result();
  foreach($nama_dosen as $row){
    echo $row->nama_dosen;
  }
  
  }


function dpl_set_nilai(){
$where=$this->session->userdata('username');
$data=$this->Dosenmodel->getnilaimhsfordpl($where);
$datanya=array('data' =>$data);
  $this->load->view('dpl_set_nilai',$datanya);
}    


function edit_nilai($id_mahasiswa){

  
 $dataid=$this->Dosenmodel->getnilaimhs(" where mahasiswa_id_mahasiswa='$id_mahasiswa'");

 $data=array('pembekalan' => $dataid[0]['pembekalan'],
              'laporan'=>$dataid[0]['laporan'],
              'kegiatan'=>$dataid[0]['kegiatan'],
              'mahasiswa_id_mahasiswa'=>$dataid[0]['mahasiswa_id_mahasiswa']);


 $this->load->view('edit_nilai',$data);

  
}


function kelola_nilai_dppm(){


$data=$this->Dosenmodel->getdatanilai();
$datanya=array('data' =>$data);
$this->load->view('kelola_nilai_dppm',$datanya);

}

function search_keyword2()
    {

        // $data['halaman'] = "";
        $keyword    =   $this->input->post('keyword');
        $datanya['data']    =   $this->Dosenmodel->searchnilai($keyword);
        $this->load->view('kelola_nilai_dppm',$datanya);
    }


function edit_nilai_aksi(){


$id_mahasiswa= $_POST['id_mahasiswa'];
$pembekalan= $_POST['pembekalan'];
$kegiatan= $_POST['kegiatan'];
$laporan=$_POST['laporan'];
    
    
    $data_update_nilai=array( 'mahasiswa_id_mahasiswa'=>$id_mahasiswa,
                            'pembekalan'=>$pembekalan,
                             'kegiatan'=>$kegiatan,
                              'laporan'=>$laporan);

    $where_nilai= array('mahasiswa_id_mahasiswa' => $id_mahasiswa );
    

    $res=$this->Dosenmodel->update_data_nilai('nilai_akhir',$data_update_nilai,$where_nilai);
    
    if ($res>=1) {
      redirect('Dosen/dpl_set_nilai');
    }else{
      redirect('Dosen/keluar');
    }

//echo "<prev>";
//print_r($_POST);
//echo "</prev>";

}

function validasi(){
  $id_login = $this->session->userdata('id_login');
  $data=$this->Dosenmodel->getdatalaporan($id_login);
  $datanya=array('data' =>$data);
  $this->load->view('validasi_nilai_dpl',$datanya);
}

function edit_validasi($where){

  $wherenya= array('id_laporan' => $where );

  $validasi="SDH";
  $data_update_nilai=array( 'validasi'=>$validasi);
$res=$this->Dosenmodel->update_validasi('laporanya',$data_update_nilai,$wherenya);
    
    if ($res>=1) {
      redirect('Dosen/validasi');
    }else{
      redirect('Dosen/keluar');
    }


}


function keluar()
 {
  $this->session->sess_destroy();
  redirect('Pendaftaran');
 }

}
