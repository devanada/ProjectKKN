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

    <title>Edit Nilai</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url();?>lib/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url();?>lib/css/simple-sidebar.css" rel="stylesheet">
    <link href="<?php echo base_url();?>lib/css/style6.css" rel="stylesheet">
</head>
<body>
    <div id="wrapper">

<?php include 'v_sidebar_dpl.php';?>

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <h3>DAFTAR LAPORAN KELOMPOK DPL Bpk/Ibu <?php echo $this->session->userdata('username'); ?></h3>
                <a href="#menu-toggle" class="btn btn-secondary" id="menu-toggle">Menu</a>
                
            </div>
            <P></P>

 
<table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Kelompok</th>
                                <th>TGL Upload</th>
                                <th>LINK</th>
                                <th>VALIDASI</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php foreach($data as $row){  ?>
                            <tr>
                               
                                <td> <?php echo $row['nama_kelompok']; ?> </td>
                                <td> <?php echo $row['tgl_laporan']; ?> </td>
                                <?php if ($row['link_laporan']=='') {
                                ?>

                                <td> KOSONG </td>
                                <?php
                                } else { ?>
                                <td><a href="<?php echo base_url(). "uploads/". $row['link_laporan']; ?>"> Link </a></td>
                                <?php } ?>
                                <td> <?php echo $row['validasi']; ?> </td>
                                <td> <?php echo $row['id_laporan']; ?> </td>
                                 <td><a href="<?php echo base_url(). "index.php/Dosen/edit_validasi/"; echo $row['id_laporan'];?>"> Ubah </a></td>
                            </tr>
                        <?php   }?>
                        </tbody>
                    </table>

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