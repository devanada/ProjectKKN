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

    <title>PESERTA KKN</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url();?>lib/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>lib/css/search.css" rel="stylesheet">

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
                <h1>Daftar Registrasi Peserta</h1>
            </div>
            <P></P>

<a href="#menu-toggle" class="btn btn-secondary" id="menu-toggle">Menu</a>
<br>
<br>
<form class="example" action="<?php echo base_url()."index.php/Dosen/search_keyword"?>" method="POST">
  <input type="text" placeholder="Cari bedasarkan nama..." name="keyword">
  <button type="submit">Cari</button>
</form>

<br>
   

<table class="table table-striped table-hover">
                        <thead>
                            <tr>
                    
                        
                                <th>ID_Registrasi</th>
                                <th>NAMA</th>
                                <th>NIM</th>
                                <th>ID JURUSAN</th>
                                <th>BUKTI KRS</th>
                                <th>BUKTI PEMBAYARAN</th>
                                <th>KELOLA</th>
                                <th>STATUS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($data as $row) {  ?>
                            <tr>
                                <td> <?php echo $row['id_registrasi']; ?> </td>
                                <td> <?php echo $row['nama_mahasiswa']; ?> </td>
                                <td> <?php echo $row['nim']; ?> </td>
                                <td> <?php echo $row['jurusan_id_jurusan']; ?> </td>
                                <?php if ($row['link_bukti_khs']=='') { ?>
                                 <td> BELUM UPLOAD </td>
                                  <?php    # code...
                                    } else {
                                        ?>
                                        <td> <a href="<?php echo base_url(). "uploads/". $row['link_bukti_khs'];?>"> LINK </a> </td>
                               
                                    <?php } ?>

                                <?php if ($row['link_bukti_bayar_kkn']=='') { ?>
                                 <td> BELUM UPLOAD </td>
                                  <?php    # code...
                                    } else {
                                        ?>
                                        <td> <a href="<?php echo base_url(). "uploads/". $row['link_bukti_bayar_kkn'];?>"> LINK </a> </td>
                               
                                    <?php } ?>
                              
                                <td>
                                    

                                  
                                    <a href="<?php echo base_url(). "index.php/Dosen/daftarkan_peserta/". $row['id_registrasi'] ."/". $row['nim'] ."/". $row['nama_mahasiswa'];?>">Daftarkan </a>
                                   
                                </td>
                                 <td><?php echo $row['status']; ?></td>
                              
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>



<div class="panel-footer" style="height:35px;">
        <?php echo $halaman ?> <!--Memanggil variable pagination-->
        </div>




                </div>
            </div>
          
            


<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>
</body>
</html>