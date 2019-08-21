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

    <title>Kelola Keompok</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url();?>lib/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url();?>lib/css/simple-sidebar.css" rel="stylesheet">
    <link href="<?php echo base_url();?>lib/css/style6.css" rel="stylesheet">
    <style type="text/css"></style>
    </head>
    <body>

    <div id="wrapper">

<?php include 'v_sidebar.php';?>
 <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <h1>TAMBAH KELOMPOK</h1>
                <a href="#menu-toggle" class="btn btn-secondary" id="menu-toggle">Menu</a>
                
                <!-- Modal -->


            </div>
            <P></P>

           <form method="POST" action="<?php echo base_url()."index.php/Dosen/add_kelompok" ?>">
                 <div class="form-group">
                      <label for="nama">Nama KELOMPOK:</label>
                         <input type="text" class="form-control" name="kelompok" required>
                 </div>

               <div class="form-group">
                    <label for="alamat">LOKASI KKN</label>
                       <input type="text" class="form-control"  name="lokasi" required>
               </div>
               
                    <div class="form-group" id="kodedpl">
                        <label>Kode DPL (PEMBIMBING)</label>
                        <select class="form-control" name="id_pembimbing" id='kodedpl' onChange=javascript:set_city()>;
                  
            <?php foreach($data as $row) { ?>
                <option value="<?php echo $row['id_pic'];?>"><?php echo $row['nama_dosen'];?></option>
            <?php } ?>

                        </select>
                </div>

                  <p>DPLnya: <span id="div_namadpl"></span></p> 
                   
            
                      
       

                    <div class="form-group">
                     
                         <input type="hidden" class="form-control" name="id_kelompok" value="<?php echo "$idkelompok" ?>" readonly>
                 </div>

                 <button type="submit" class="btn btn-default">Submit</button>
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

<script type='text/javascript' >
function set_city(){
         var kodedpl= $('#kodedpl').val();
  $.ajax({
   type: "POST",
   data: "kodedplnya="+kodedpl,
   url: "http://3.208.97.228/kknumm/index.php/Dosen/loaddpl/",
   success: function(result) {
    $('#div_namadpl').html(result);       }
  });
 }
</script>

</body>

</html>