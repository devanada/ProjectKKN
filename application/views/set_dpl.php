<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Simple Sidebar - Start Bootstrap Template</title>

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

        <!-- Sidebar -->
        <?php include 'v_sidebar.php'; ?>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <h1>TAMBAH DPL</h1>
                <a href="#menu-toggle" class="btn btn-secondary" id="menu-toggle">Menu</a>
                
            </div>
            <P></P>

            <form method="POST" action="<?php echo base_url()?>index.php/Dosen/add_data_dpl">
                 <div class="form-group">
                      
                         <input type="hidden" class="form-control" name="id_login" value="<?php echo $iddaftar ?>" readonly>
                 </div>

               <div class="form-group">
                    
                       <input type="hidden" class="form-control" name="id_dosen" value="<?php echo $idpic ?>" readonly>
               </div>
               <div class="form-group">
                    <label for="alamat">NAMA</label>
                       <input type="text" class="form-control" name="nama" required>
               </div>
               <div class="form-group">
                    <label for="alamat">USER</label>
                       <input type="text" class="form-control" name="username" required>
               </div>
               <div class="form-group">
                    <label for="alamat">PASSWORD</label>
                       <input type="text" class="form-control" name="password" required>
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
