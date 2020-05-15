<?php
session_start();
//Database Configuration File
include('includes/config.php');
//error_reporting(0);
if(isset($_POST['login']))
{
// Getting username/ email and password
$uname=$_POST['username'];
$password=$_POST['password'];
// Fetch data from database on the basis of username/email and password
$sql =mysqli_query($con,"SELECT AdminUserName,AdminEmailId,AdminPassword FROM tbladmin WHERE (AdminUserName='$uname' || AdminEmailId='$uname')");
$num=mysqli_fetch_array($sql);
if($num>0)
{
$hashpassword=$num['AdminPassword']; // Hashed password fething from database
//verifying Password
if (password_verify($password, $hashpassword)) {
$_SESSION['login']=$_POST['username'];
echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
} else {
echo "<script>alert('Pass Incorrecto');</script>";

}
}
//if username or email not found in database
else{
echo "<script>alert('Usuario no registrado');</script>";
}
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<title>Panel de Administraci&oacute;n</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="login/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/css/util.css">
	<link rel="stylesheet" type="text/css" href="login/css/main.css">
<!--===============================================================================================-->
</head>
<body>



<div class="limiter">
<div class="container-login100">
<div class="wrap-login100 p-l-50 p-r-50 p-t-77 p-b-30">
<form class="login100-form validate-form" method="post">
<span class="login100-form-title p-b-55">
CIFES
</span>

<div class="wrap-input100 validate-input m-b-16" data-validate = "Ingrese su usuario">
<input class="input100" type="text" name="username" placeholder="Usuario" required="true">
<span class="focus-input100"></span>
<span class="symbol-input100">
<span class="lnr lnr-envelope"></span>
</span>
</div>

<div class="wrap-input100 validate-input m-b-16" data-validate = "Contrase&ntilde;a requerida">
<input class="input100" type="password" name="password" placeholder="Password" required="true">
<span class="focus-input100"></span>
<span class="symbol-input100">
<span class="lnr lnr-lock"></span>
</span>
</div>

<!--<div class="contact100-form-checkbox m-l-4">
<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
<label class="label-checkbox100" for="ckb1">
Remember me
</label>
</div>-->

<div class="container-login100-form-btn p-t-25">
<button class="login100-form-btn" type="submit" name="login">
Login
</button>
</div>
</form>


					<!--<div class="text-center w-full p-t-115">
						<span class="txt1">
							Not a member?
						</span>-->

						<!--<a class="txt1 bo1 hov1" href="#">
							Sign up now							
						</a>-->
					</div>
			</div>
		</div>
	</div>

	
<!--===============================================================================================-->	
	<script src="login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/bootstrap/js/popper.js"></script>
	<script src="login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="login/js/main.js"></script>

</body>
</html>
















