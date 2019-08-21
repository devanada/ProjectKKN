<!DOCTYPE html>
<html>
<head>
	<title>Pendaftaran KKN</title>
<?php include 'lib_css.php';  ?>
</head>
<body>
<div class="container">

    <h1 class="well" style="text-align: center;">FORMULIR PENDAFTARAN MAHASISWA KKN</h1>
   

	<div class="col-lg-12 well">
	<div class="row">
		<form method="POST" enctype="multipart/form-data" action="<?php echo base_url()."index.php/Pendaftaran/do_add_data_mhs" ?>">
					<div class="col-sm-12">
						<div class="form-group">
							
							<input type="hidden" name="iddaftar" class="form-control" value="<?php echo $iddaftar?>" readonly>
						</div>
						<div class="form-group">
							<label>Masukan Nama</label>
							<input type="text" placeholder="Masukan nama lengkap dengan KAPITAL" class="form-control" name="nama" required>
						</div>
						<div class="row">
    						<div class="col-sm-6 form-group">
    							<label>Masukan NIM</label>
    							<input type="text" placeholder="NIM" class="form-control" name="nim" required>
    						</div>
    						<div class="col-sm-6 form-group">
    							<label>Tempat Tanggal Lahir</label>
    							<input type="text" placeholder="ex : Jember 23 Juli 1994.." class="form-control" name="ttl" required>
    						</div>
	                    </div>
    					<div class="form-group">
    						<label>Alamat</label>
    						<input type="text" placeholder="Tulis Alamat lengkap.." class="form-control" name="alamat" required>
    					</div>


                        <div class="form-group">
                            <label>Scan KHS</label>
                            <input class="form-control" type="file" name="khs" />
                        </div>
    					 	   
                        <div class="form-group">
                            <label>Scan Kwitansi KKN</label>
                            <input class="form-control" type="file" name="kkn" />
                        </div>                 
						
					 
				
					<div>
						<label>Pilih Program Studi / Jurusan</label>
						<select name="id_jurusan" class="form-control" value="id_jurusan" >
                  
           	<?php foreach($data as $row) { ?>
                <option value="<?php echo $row['id_jurusan'];?>"><?php echo $row['nama_jurusan'];?></option>
            <?php } ?>

						</select>
					</div>		
					<br>
					<button type="submit" class="btn btn-lg btn-info" value="simpan" name="simpan">Submit</button>
					<button type="button" class="btn btn-lg btn-info"><a href="<?php echo base_url()?>index.php/Pendaftaran">Kembali</a></button>		
					</div>


		</div>
</form> 
</div>
</div>
</body>
</html>