<?php
 
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
 
class Register extends CI_Model
{
    // get data dropdown
    function dd_jurusan()
    {
        // ambil data dari db
        $data=$this->db->query('select * from jurusan');
        return $data->result_array();
    }

function buat_kode()   {    
  $this->db->select('RIGHT(registrasi.id_registrasi,2) as kode', FALSE);
  $this->db->order_by('id_registrasi','DESC');    
  $this->db->limit(1);     
  $query = $this->db->get('registrasi');      //cek dulu apakah ada sudah ada kode di tabel.    
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
  $kodejadi = "REG".$kodemax;     
  return $kodejadi;  
 }


function insert_data($nama_table,$data){
    $res= $this->db->insert($nama_table,$data);
    return $res;
}


}