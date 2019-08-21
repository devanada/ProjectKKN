<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Bootstrap core JavaScript -->
    <script src="<?php echo base_url();?>lib/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url();?>lib/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
     <script src="<?php echo base_url();?>lib/beranda.js"></script>
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
     <link href="<?php echo base_url();?>lib/style7.css" rel="stylesheet">
</head>
<body>
    <div id="wrapper">

<?php include 'v_sidebar_mahasiswa.php';?>

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                
                <a href="#menu-toggle" class="btn btn-secondary" id="menu-toggle">Menu</a>
                
            </div>
            <P></P>
           </div>
           </div>
           


           <div class="container">
           <div class="jumbotron">
        <h1>Mahasiswa Login</h1>      
        <p>Selamat datang di SISKKN (Sisitem Informasi KKN Terpadu), sistem ini masih dalam tahap pengembangan dan prarilis, silahkan pilih menu untuk mulai menggunkan</p>
                 
        </div>

     </div>
     </div>
 </div>



<div class="container">
      <div class="row">
      
        <div class="col-xs-14 col-sm-14 col-md-9 col-lg-9 col-xs-offset-0 col-sm-offset-0 col-md-offset-5 col-lg-offset-5 toppad" >
   
   
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">Informasi Akunku</h3>
            </div>
            <div class="panel-body">
              <div class="row">
               
                
                
                <div class=" col-md-10 col-lg-10 "> 
                  <table class="table table-user-information">
                    <tbody>
                        <?php foreach($data as $row){  ?>
                      <tr>
                        <td>Nama Lengkap:</td>
                        <td> <?php echo $row['nama_mahasiswa']; ?></td>
                      </tr>
                      <tr>
                        <td>Jurusan:</td>
                        <td> <?php echo $row['nama_jurusan']; ?></td>
                      </tr>
                      <tr>
                        <td>Kelompok</td>
                        <td> <?php echo $row['nama_kelompok']; ?></td>
                      </tr>
                   
                         <tr>
                             <tr>
                        <td>Dosen Pembimbing</td>
                        <td> <?php echo $row['nama_dosen']; ?></td>
                      </tr>
                      <?php $pembekalan=$row['pembekalan'];
                            $laporan=$row['laporan'];
                            $kegiatan=$row['kegiatan'];
                            $total=($pembekalan+$laporan+$kegiatan)/3; ?>

                        <tr>
                        <td>Nilai Anda</td>
                        <td><?php 
                        if ($total>=6 && $total<=7) {
                            echo "<strong>B</strong>";
                        } elseif ($total>=8) {
                            echo "<strong>A</strong>";
                        } else {
                            echo "<strong>C</strong>";
                        }

                         ?></td>
                      </tr>
                     
                     <?php } ?>
                    </tbody>
                  </table>
                  
                  
                </div>
              </div>
            </div>
                 
            
          </div>
        </div>
      </div>
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