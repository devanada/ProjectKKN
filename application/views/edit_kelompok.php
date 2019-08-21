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
                <h1>EDIT KELOMPOK</h1>
                <button type="button" class="btn btn-default"><a href="<?php echo base_url()?>index.php/Dosen/lihat_kelompok">Kembali</a></button>
                
                <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->


  </div>
</div>
                
            </div>
            <P></P>

           <form method="POST" action="<?php echo base_url()."index.php/Dosen/update_kelompok" ?>">
                 <div class="form-group">
                      <label for="nama">Nama KELOMPOK:</label>
                         <input type="text" class="form-control" name="kelompok" value="<?php echo $nama_kelompok ?>">
                 </div>

               <div class="form-group">
                    <label for="alamat">LOKASI KKN</label>
                       <input type="text" class="form-control"  name="lokasi" value="<?php echo $desa ?>">
               </div>
               
                   
                    <div class="form-group">
                      
                         <input type="hidden" class="form-control" name="id_kelompok" value="<?php echo $id_kel_kkn ?>" readonly>
                    </div>

                     

                 <button type="submit" class="btn btn-default">Submit</button>
                </form>


                <div class="form-group">
                    <br>
                      
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