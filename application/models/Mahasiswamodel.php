<?php
 
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
 
class Mahasiswamodel extends CI_Model
{


function proseslogin($user, $pass){
  $this->db->where('id_login',$user);
  $this->db->where('password',$pass);
  return $this->db->get('login_mhs')->row();
 }


function insert_data_laporan($nama_table,$data){

    $res= $this->db->insert($nama_table,$data);
    return $res;
}

function getdatamahasiswa($where){

$data=$this->db->query('select l.mahasiswa_id_mahasiswa, m.id_mahasiswa, r.nama_mahasiswa,k.nama_kelompok,d.nama_dosen, j.nama_jurusan, n.pembekalan,n.laporan, n.kegiatan from login_mhs l, dosen_dpl d, mahasiswa m,kel_kkn k, nilai_akhir n,jurusan j, registrasi r where l.mahasiswa_id_mahasiswa=m.id_mahasiswa AND n.mahasiswa_id_mahasiswa=m.id_mahasiswa AND r.id_registrasi=m.registrasi_id_registrasi AND j.id_jurusan=r.jurusan_id_jurusan AND k.id_kel_kkn=m.kel_kkn_id_kel_kkn AND d.id_pic=k.dosen_dpl_id_pic AND l.id_login="'.$where.'"');
return $data->result_array();

}


  

}