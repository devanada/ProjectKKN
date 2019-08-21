<!DOCTYPE html>
<html>
<head>
	<title>Silahkan Login</title>
	<?php include 'lib_css_login.php'  ?>
</head>
<body>

<div class="container">
	<div class="login-container">
            <div id="output"></div>
            <!-- <div class="avatar"></div> -->
            <div class="form-box">
                <form  method="POST" action="<?php echo base_url()."index.php/Mahasiswa/ceklogin" ?>">
                    <input name="user" type="text" placeholder="NIM">
                    <input type="password" placeholder="password" name="pass">
                    <button class="btn btn-info btn-block login" type="submit" name="login">Login</button>
                </form>
                <a href="<?php echo base_url()."index.php/Pendaftaran" ?>"> <button class="btn btn-danger btn-block login"> Cancel </button>
                </a>
<div style="color: black">
<h5 style="text-align: center;"> LOGIN KHUSUS PESERTA KKN </h5>
<h5 style="text-align: center;"> &copy; Copyright | 2017 | SIKKN UMM | </h5>

</div>

            </div>
        </div>
</div>



</body>
</html>