<!DOCTYPE html>
<html>
<head>
  <title>Pendaftaran KKN</title>
<?php include 'lib_css.php';  ?>
</head>
<body>

<div class="container">
    <h1 class="well" style="text-align: center;">UPLOAD LAPORAN KKN</h1>
    <p> Laporan berupa file doc/docx dengan format sesuai ketentuan | laporan yang akan diupload akan mewakili laporan kelompok anda | maka diskusikan terlebih dahulu dengan anggota kelompok sebelum melakukan proses upload </p> 
  <div class="col-lg-12 well">
  <div class="row">
    <form method="POST" enctype="multipart/form-data" action="<?php echo base_url()."index.php/Mahasiswa/uploadkan" ?>">
      
          <div class="col-sm-12">
            <div class="form-group">
              
              
                        <div class="form-group">
              
                        <input type="hidden" name="id_mahasiswa" class="form-control" value="<?php echo $mahasiswa_id_mahasiswa?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Pilih Laporan</label>
                            <input class="form-control" type="file" name="laporan" />
                        </div>
                   
                      
          <br>
          <button type="submit" class="btn btn-lg btn-info" value="simpan" name="simpan">Submit</button>          
          </div>
          <button type="button" class="btn btn-default"><a href="<?php echo base_url()?>index.php/Mahasiswa/beranda_mahasiswa">Kembali</a></button>
    </div>
</form> 
</div>
</div>
</body>
</html>