<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Edit Nilai</title>

   <!-- Bootstrap core JavaScript -->
    <script src="<?php echo base_url();?>lib/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url();?>lib/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url();?>lib/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url();?>lib/css/simple-sidebar.css" rel="stylesheet">
    <link href="<?php echo base_url();?>lib/css/style6.css" rel="stylesheet">
    
</head>

<body>

    <div id="wrapper">

       
        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <h1>EDIT NILAI MAHASISWA</h1>
            <button type="button" class="btn btn-default"><a href="<?php echo base_url()?>index.php/Dosen/dpl_set_nilai">Kembali</a></button>
                                
            </div>
            <P></P>

            <form method="POST" action="<?php echo base_url()."index.php/Dosen/edit_nilai_aksi"?>">
              
               <div class="form-group">
                    <label for="alamat">ID Mahasiswa</label>
                       <input type="text" class="form-control" name="id_mahasiswa" value="<?php echo $mahasiswa_id_mahasiswa ?>" readonly>
               </div>
               <div class="form-group">
                    <label for="alamat">Nilai Pembekalan</label>
                       <input type="text" class="form-control" name="pembekalan" value="<?php echo $pembekalan ?>">
               </div>
               <div class="form-group">
                    <label for="alamat">Nilai Kegiatan</label>
                       <input type="text" class="form-control" name="kegiatan" value="<?php echo $kegiatan ?>">
               </div>
                <div class="form-group">
                    <label for="alamat">Nilai Laporan</label>
                       <input type="text" class="form-control" name="laporan" value="<?php echo $laporan ?>">
               </div>
                 <button type="submit" class="btn btn-default" name="simpan">Submit</button>
                </form>
                   </div>
           </div>
     </div>


        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

   
    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

</body>

</html>
