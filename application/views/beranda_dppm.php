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

    <title>Home DPPM</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url();?>lib/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url();?>lib/css/simple-sidebar.css" rel="stylesheet">
    <link href="<?php echo base_url();?>lib/css/style6.css" rel="stylesheet">
</head>
<body>
    <div id="wrapper">

<?php include 'v_sidebar.php';?>

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                
                <a href="#menu-toggle" class="btn btn-secondary" id="menu-toggle">Menu</a>
                <a href="#menu-toggle" class="btn btn-secondary" id="menu-toggle">BERANDA</a>
            </div>
            <P></P>
           </div>
           </div>


           <div class="container">
           <div class="jumbotron">
        <h1>DPPM Login</h1>      
        <p>Selamat datang di SISKKN (Sisitem Informasi KKN Terpadu), sistem ini masih dalam tahap pengembangan dan prarilis, silahkan pilih menu untuk mulai menggunkan</p>
          </div>
        <p>Petunjuk penggunaan manual aplikasi SISKKN ini dapat didownload <a href="#"> disini </a> </p>      
        <p>apabila ada pertanyaan , kritik dan saran terkait aplikasi, dapat menghubungi admin@siskkn.umm.ac.id</p>      
        </div>
        <div class="container">
        <p>Ketentuan DPPM : </p>
        <p>1. Ketika bpk/ibu mendaftarkan calon peserta KKN, maka yang bersangkutan akan resmi terdaftar pada sisttem dan tidak dapat dilakukan perubahan data secara sepihak baik itu penghapusan atau pengubahan data. apabila diharuskan melakukan perubahan harus melalui prosedur INFOKOM UMM dan peserta yang bersangkutan harus memenuhi syarat syarat yang ditentukan </p>
        <p>2. Akun Dosen DPL yang sudah dibuat, akan segera diterbitkan SK untuk melakukan tugasnya, maka dari itu bpk/ibu DPPM selaku admin tidak dbenarkan melakukan penghapusan DPL, perubahan yang diijinkan hanya dapat dilakukan merubah nama dan password DPL </p>
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