<?php
 
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
 
class Dosenmodel extends CI_Model
{

function proseslogin($user, $pass){
  $this->db->where('username',$user);
  $this->db->where('password',$pass);
  return $this->db->get('login_dosen')->row();
 }

 function getdatadpl($AND=""){
  $data=$this->db->query('select a.nama_dosen, a.id_pic, b.password,b.username, b.id_login from dosen_dpl a, login_dosen b where a.login_dosen_id_login=b.id_login'.$AND);
  return $data->result_array();
 }


 function getdataregistrasi($num, $offset){
  $data=$this->db->get_where('registrasi', array('status' => "BLM"),$num, $offset);
  // $data=$this->db->query('select * from registrasi where status="BLM"  order by status desc');
  return $data->result_array();

 }

 function getdatamahasiswa($where=""){
  $data=$this->db->query('select * from mahasiswa'.$where);
  return $data->result_array();

 }

 function getkeldpl($where){
  $data=$this->db->query('select a.nama_kelompok, a.desa as lokasi from kel_kkn a'.$where);
  return $data->result_array();
}




function buat_kode()   {    
  $this->db->select('RIGHT(login_dosen.id_login,2) as kode', FALSE);
  $this->db->order_by('id_login','DESC');    
  $this->db->limit(1);     
  $query = $this->db->get('login_dosen');      //cek dulu apakah ada sudah ada kode di tabel.    
  if($query->num_rows() <> 0){       
   //jika kode ternyata sudah ada.      
   $data = $query->row();      
   $kode = intval($data->kode) + 1;     
  }
  else{       
   //jika kode belum ada      
   $kode = 1;     
  }
  $kodemax = str_pad($kode, 2, "0", STR_PAD_LEFT);    
  $kodejadi = "LOG".$kodemax;     
  return $kodejadi;  
 }

 
 function buat_kode_pic()   {    
  $this->db->select('RIGHT(dosen_dpl.id_pic,2) as kode', FALSE);
  $this->db->order_by('id_pic','DESC');    
  $this->db->limit(1);     
  $query = $this->db->get('dosen_dpl');      //cek dulu apakah ada sudah ada kode di tabel.    
  if($query->num_rows() <> 0){       
   //jika kode ternyata sudah ada.      
   $data = $query->row();      
   $kode = intval($data->kode) + 1;     
  }
  else{       
   //jika kode belum ada      
   $kode = 1;     
  }
  $kodemax = str_pad($kode, 2, "0", STR_PAD_LEFT);    
  $kodejadi = "DPL".$kodemax;     
  return $kodejadi;  
 }


 function buat_kode_kelompok()   {    
  $this->db->select('RIGHT(kel_kkn.id_kel_kkn,2) as kode', FALSE);
  $this->db->order_by('id_kel_kkn','DESC');    
  $this->db->limit(1);     
  $query = $this->db->get('kel_kkn');      //cek dulu apakah ada sudah ada kode di tabel.    
  if($query->num_rows() <> 0){       
   //jika kode ternyata sudah ada.      
   $data = $query->row();      
   $kode = intval($data->kode) + 1;     
  }
  else{       
   //jika kode belum ada      
   $kode = 1;     
  }
  $kodemax = str_pad($kode, 2, "0", STR_PAD_LEFT);    
  $kodejadi = "KEL".$kodemax;     
  return $kodejadi;  
 }

 function buat_kode_mhs(){
  $this->db->select('RIGHT(mahasiswa.id_mahasiswa,2) as kode', FALSE);
  $this->db->order_by('id_mahasiswa','DESC');    
  $this->db->limit(1);     
  $query = $this->db->get('mahasiswa');      //cek dulu apakah ada sudah ada kode di tabel.    
  if($query->num_rows() <> 0){       
   //jika kode ternyata sudah ada.      
   $data = $query->row();      
   $kode = intval($data->kode) + 1;     
  }
  else{       
   //jika kode belum ada      
   $kode = 1;     
  }
  $kodemax = str_pad($kode, 2, "0", STR_PAD_LEFT);    
  $kodejadi = "MHS".$kodemax;     
  return $kodejadi;  
 }

 function buat_kode_login_mhs(){
  $this->db->select('RIGHT(login_mhs.id_login,2) as kode', FALSE);
  $this->db->order_by('id_login','DESC');    
  $this->db->limit(1);     
  $query = $this->db->get('login_mhs');      //cek dulu apakah ada sudah ada kode di tabel.    
  if($query->num_rows() <> 0){       
   //jika kode ternyata sudah ada.      
   $data = $query->row();      
   $kode = intval($data->kode) + 1;     
  }
  else{       
   //jika kode belum ada      
   $kode = 1;     
  }
  $kodemax = str_pad($kode, 2, "0", STR_PAD_LEFT);    
  $kodejadi = "LMS".$kodemax;     
  return $kodejadi;  
 }


function insert_data_login($nama_table,$data){
    $res= $this->db->insert($nama_table,$data);
    return $res;
}

 function insert_data_dpl($nama_table,$data){
    $res= $this->db->insert($nama_table,$data);
    return $res;
}

function insert_data_mahasiswa($nama_table,$data){
 $res= $this->db->insert($nama_table,$data);
 return $res; 
}


function insert_data_nilai($nama_table,$data){
  $res= $this->db->insert($nama_table,$data);
  return $res; 
}

function insert_data_login_mhs($nama_table,$data){
  $res= $this->db->insert($nama_table,$data);
  return $res; 
}

function update_dpl($nama_table,$data,$where){
    $res= $this->db->update($nama_table,$data,$where);
    return $res;
    
}

function update_data_registrasi($nama_table,$data,$where){
  $res= $this->db->update($nama_table,$data,$where);
    return $res;
}

function update_data_login($nama_table,$data,$where){
    $res= $this->db->update($nama_table,$data,$where);
    return $res;
    
}

function insert_data_kelompok($nama_table,$data){
$res= $this->db->insert($nama_table,$data);
    return $res;
}

function update_data_kelompok($nama_table,$data,$where){
  $res= $this->db->update($nama_table,$data,$where);
    return $res;
}

function getdatakelompok($AND=""){
  $data=$this->db->query('select a.id_kel_kkn, a.nama_kelompok, a.desa, b.nama_dosen from kel_kkn a, dosen_dpl b where dosen_dpl_id_pic=id_pic'.$AND);
  return $data->result_array();
}

function getnamadpl($id_pic){
return $this->db->query('select nama_dosen from dosen_dpl'.$id_pic);

}

 // function getdataregistrasi($num, $offset){
 //  $data=$this->db->get_where('registrasi', array('status' => "BLM"),$num, $offset);
 //  
 //  return $data->result_array();

 // }

function getmhskkn($num, $offset){
  $data=$this->db->query('select a.nama_mahasiswa, c.nama_kelompok, d.password, d.id_login as username, e.nama_dosen from registrasi a, mahasiswa b, kel_kkn c, login_mhs d, dosen_dpl e where (a.id_registrasi=b.registrasi_id_registrasi)AND(b.kel_kkn_id_kel_kkn=c.id_kel_kkn)AND(b.id_mahasiswa=d.mahasiswa_id_mahasiswa)AND(c.dosen_dpl_id_pic=e.id_pic) LIMIT '.$num.' OFFSET '.$offset.'');
  return $data->result_array();
}

function searchmhsfix($keyword)
    {
        // $this->db->like('nama_mahasiswa',$keyword);
         // $data=$this->db->get_where('registrasi', array('status' => "BLM"),$num, $offset);
        $data  =   $this->db->query('select a.nama_mahasiswa, c.nama_kelompok, d.password, d.id_login as username, e.nama_dosen from registrasi a, mahasiswa b, kel_kkn c, login_mhs d, dosen_dpl e where (a.id_registrasi=b.registrasi_id_registrasi)AND(b.kel_kkn_id_kel_kkn=c.id_kel_kkn)AND(b.id_mahasiswa=d.mahasiswa_id_mahasiswa)AND(c.dosen_dpl_id_pic=e.id_pic) AND a.nama_mahasiswa LIKE "%'.$keyword.'%"');
        return $data->result_array();
    }


function getnilaimhs($where){
  $data=$this->db->query('select * from nilai_akhir'.$where);
   return $data->result_array();
}

function getnilaimhsfordpl($where){
  $data=$this->db->query('select  n.mahasiswa_id_mahasiswa, d.id_pic,r.nama_mahasiswa, k.nama_kelompok, n.pembekalan, n.kegiatan, n.laporan from nilai_akhir n, mahasiswa m, login_dosen l, kel_kkn k, dosen_dpl d, registrasi r where (n.mahasiswa_id_mahasiswa=m.id_mahasiswa) AND (m.kel_kkn_id_kel_kkn=k.id_kel_kkn) AND (d.id_pic=k.dosen_dpl_id_pic) AND (l.id_login=d.login_dosen_id_login) AND (r.id_registrasi=m.registrasi_id_registrasi) AND (l.username="'.$where.'")');
   return $data->result_array();
}

function getdatanilai(){

$data=$this->db->query('select  n.mahasiswa_id_mahasiswa, d.id_pic,r.nama_mahasiswa, k.nama_kelompok, n.pembekalan, n.kegiatan, n.laporan from nilai_akhir n, mahasiswa m, login_dosen l, kel_kkn k, dosen_dpl d, registrasi r where (n.mahasiswa_id_mahasiswa=m.id_mahasiswa) AND (m.kel_kkn_id_kel_kkn=k.id_kel_kkn) AND (d.id_pic=k.dosen_dpl_id_pic) AND (l.id_login=d.login_dosen_id_login) AND (r.id_registrasi=m.registrasi_id_registrasi)');
return $data->result_array();

}

function searchnilai($keyword)
    {
        // $this->db->like('nama_mahasiswa',$keyword);
         // $data=$this->db->get_where('registrasi', array('status' => "BLM"),$num, $offset);
        $data  =   $this->db->query('select  n.mahasiswa_id_mahasiswa, d.id_pic,r.nama_mahasiswa, k.nama_kelompok, n.pembekalan, n.kegiatan, n.laporan from nilai_akhir n, mahasiswa m, login_dosen l, kel_kkn k, dosen_dpl d, registrasi r where (n.mahasiswa_id_mahasiswa=m.id_mahasiswa) AND (m.kel_kkn_id_kel_kkn=k.id_kel_kkn) AND (d.id_pic=k.dosen_dpl_id_pic) AND (l.id_login=d.login_dosen_id_login) AND (r.id_registrasi=m.registrasi_id_registrasi) AND r.nama_mahasiswa LIKE "%'.$keyword.'%"');
        return $data->result_array();
    }


function update_data_nilai($nama_table,$data,$where){
  $res= $this->db->update($nama_table,$data,$where);
    return $res;
}

function getdatalaporan($where){

$data=$this->db->query('select * from laporanya l, mahasiswa m, dosen_dpl d, kel_kkn k, login_dosen lo where l.mahasiswa_id_mahasiswa=m.id_mahasiswa AND k.id_kel_kkn=m.kel_kkn_id_kel_kkn AND d.id_pic=k.dosen_dpl_id_pic AND lo.id_login=d.login_dosen_id_login AND (lo.id_login="'.$where.'")');
return $data->result_array();
}

function update_validasi($nama_table,$data,$where){
  $res= $this->db->update($nama_table,$data,$where);
    return $res;

}

 function search($keyword)
    {
        $this->db->like('nama_mahasiswa',$keyword);
         // $data=$this->db->get_where('registrasi', array('status' => "BLM"),$num, $offset);
        $data  =   $this->db->get_where('registrasi', array('status' => "BLM"));
        return $data->result_array();
    }




}