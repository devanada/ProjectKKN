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

    <title>DPL Login</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url();?>lib/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url();?>lib/css/simple-sidebar.css" rel="stylesheet">
    <link href="<?php echo base_url();?>lib/css/style6.css" rel="stylesheet">
</head>
<body>
    <div id="wrapper">

<?php include 'v_sidebar_dpl.php' ?>

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
        <h1>DPL Login</h1>      
        <p>Selamat datang Bpk/Ibu <strong><?php echo $this->session->userdata('username') ?></strong> di SISKKN (Sisitem Informasi KKN Terpadu), sistem ini masih dalam tahap pengembangan dan prarilis, silahkan pilih menu untuk mulai menggunkan</p>
        <p>Petunjuk penggunaan manual aplikasi SISKKN ini dapat didownload <a href="#"> disini </a> </p>

             
        </div>
        


        <p><strong>Berikut terkait informasi kelompok dibawah tanggung jawab anda :</strong></p> 
	<table class="table">
    <thead>
    	
    		
      <tr>
        <th>Nama Kelompok</th>
        <th>Lokasi</th>
        
      </tr>
    </thead>
    <tbody>
    	<?php foreach($datane as $row) {  ?>
      <tr>
        <td><?php echo $row['nama_kelompok']; ?></td>
        <td><?php echo $row['lokasi']; ?></td>
       
      </tr>
      <?php } ?>
    </tbody>
  </table>






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