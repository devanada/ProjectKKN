<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Bootstrap core JavaScript -->
    <script src="<?php echo base_url();?>lib/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url();?>lib/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Simple Sidebar - Start Bootstrap Template</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url();?>lib/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url();?>lib/css/simple-sidebar.css" rel="stylesheet">
    <link href="<?php echo base_url();?>lib/css/style6.css" rel="stylesheet">
    <style type="text/css"></style>
    </head>
    <body>

    <div id="wrapper">

 <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <h1>DAFTARKAN MAHASISWA</h1>
                 <p>Info : Dengan mendaftarkan mahasiswa artinya anda mengijinkan yang bersangkutan terdaftar sebagai peserta KKN </p>  
                <button type="button" class="btn btn-default"><a href="<?php echo base_url()?>index.php/Dosen/kelola_peserta">Kembali</a></button> 

                             
            </div>
            <P></P>

           <form method="POST" action="<?php echo base_url()."index.php/Dosen/insert_daftar_peserta" ?>">
                 <div class="form-group">
                      
                         <input type="hidden" class="form-control" name="id_mahasiswa" value="<?php echo $id_mahasiswa?>" readonly>
                 </div>

               <div class="form-group">
                    
                       <input type="hidden" class="form-control"  name="id_registrasi" value="<?php echo $id_registrasi ?>" readonly>
               </div>
               
               <div class="form-group">
                   
                       <input type="hidden" class="form-control"  name="id_login" value="<?php echo $id_login ?>" readonly>
               </div>

               <div class="form-group">
                    <label for="alamat">Nama :</label>
                       <input type="text" class="form-control"  name="nama" value="<?php echo urldecode($nama_mahasiswa) ?>" readonly>
               </div>
               <div class="form-group">
                    <label for="alamat">Nim :</label>
                       <input type="text" class="form-control"  name="nim" value="<?php echo $nim ?>" readonly>
               </div>
               <div class="form-group">
                    <label for="alamat">Password :</label>
                       <input type="text" class="form-control"  name="password" value="">
               </div>
               
                    <div class="form-group">
                        <label>Didaftarkan Pada Kelompok :</label>
                        <select class="form-control" name="id_kelompok">
                  
            <?php foreach($data_kelompok as $row) { ?>
                <option value="<?php echo $row['id_kel_kkn'];?>"><?php echo $row['nama_kelompok'];?></option>
            <?php } ?>

                        </select>
                    </div>
                    
                <button type="submit" class="btn btn-default">Submit</button>
                </form>


                <div class="form-group">
               
                      
                 </div>



                   </div>
           </div>
     </div>


        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

</div>
<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>
</body>

</html>