<?php


//session_start();

// 
session_start([
    'cookie_lifetime' => 86400,
    'gc_maxlifetime' => 86400,
]);
//


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
//Si no se encuentra el usuario
else{
echo "<script>alert('Usuario no registrado');</script>";
}
}
?>
<!DOCTYPE html>
<html lang="es">
<head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="Panel de Administración">
<link rel="shortcut icon" href="../images/favicon.png">  
<meta name="author" content="Joel">
<title>Panel de Administraci&oacute;n</title>
<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="assets/css/core.css" rel="stylesheet" type="text/css" />
<link href="assets/css/components.css" rel="stylesheet" type="text/css" />
<link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
<link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
<link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
<link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
<script src="assets/js/modernizr.min.js"></script>
</head>
<body class="bg-transparent" style="padding-top: 10%">
<section>
<div class="container-alt">
<div class="row">
<div class="col-sm-12">
<div class="wrapper-page">
<div class="m-t-40 account-pages" style="-webkit-box-shadow: 0px 10px 13px -7px #000000, 5px 5px 15px 5px rgba(0,0,0,0); 
box-shadow: 0px 10px 13px -7px #000000, 5px 5px 15px 5px rgba(0,0,0,0);">
<div class="text-center account-logo-box" style="background: #00a8b8;">
<h2 class="text-uppercase">
<span><img src="../images/logocode.png" alt="" height="50"></span>
</h2>
</div>
<div class="account-content">
<form class="form-horizontal" method="post">
<div class="form-group ">
<div class="col-xs-12">
<input class="form-control" type="text" required="" name="username" placeholder="Usuario" autocomplete="off">
</div>
</div>
<div class="form-group">
<div class="col-xs-12">
<input class="form-control" type="password" name="password" required="" placeholder="Contrase&ntilde;a" autocomplete="off">
</div>
</div>
<div class="form-group account-btn text-center m-t-10">
<div class="col-xs-12">
<button class="btn w-md btn-bordered btn-danger waves-effect waves-light" type="submit" name="login">Ingresar</button>
</div>
</div>
</form>
<div class="clearfix"></div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
<script>
var resizefunc = [];
</script>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/detect.js"></script>
<script src="assets/js/fastclick.js"></script>
<script src="assets/js/jquery.blockUI.js"></script>
<script src="assets/js/waves.js"></script>
<script src="assets/js/jquery.slimscroll.js"></script>
<script src="assets/js/jquery.scrollTo.min.js"></script>
<script src="assets/js/jquery.core.js"></script>
<script src="assets/js/jquery.app.js"></script>
</body>
</html>