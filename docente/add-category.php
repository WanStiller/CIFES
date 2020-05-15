<?php
session_start();
include('includes/config.php');
error_reporting(0);
if(strlen($_SESSION['login'])==0)
{ 
header('location:index.php');
}
else{

if(isset($_POST['submit']))
{
$category=$_POST['category'];
$description=$_POST['description'];
$status=1;
$query=mysqli_query($con,"insert into tblcategory(CategoryName,Description,Is_Active) values('$category','$description','$status')");
if($query)
{
$msg="Categoría creada. ";
}
else{
$error="Error. Intente de nuevo";    
} 
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<link rel="shortcut icon" href="../images/favicon.png">  
<title>Agregar Programa</title>
<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="assets/css/core.css" rel="stylesheet" type="text/css" />
<link href="assets/css/components.css" rel="stylesheet" type="text/css" />
<link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
<link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
<link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
<link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="../plugins/switchery/switchery.min.css">
<script src="assets/js/modernizr.min.js"></script>
</head>
<body class="fixed-left">
<div id="wrapper">
<?php include 'includes/topheader.php' ;?>
<?php include 'includes/leftsidebar.php' ;?>
<div class="content-page">
<div class="content">
<div class="container">
<div class="row">
<div class="col-xs-12">
<div class="page-title-box">
<h4 class="page-title">Agregar Programa</h4>
<ol class="breadcrumb p-0 m-0">
<li>
<a href="#">Admin</a>
</li>
<li>
<a href="#">Programa </a>
</li>
<li class="active">
Agregar Programa
</li>
</ol>
<div class="clearfix"></div>
</div>
</div>
</div>
<div class="row">
<div class="col-sm-12">
<div class="card-box">
<h4 class="m-t-0 header-title"><b>Agregar Programa </b></h4>
<hr />
<div class="row">
<div class="col-sm-6">  
<?php if($msg){ ?>
<div class="alert alert-success" role="alert">
<strong>Correcto!</strong> <?php echo htmlentities($msg);?>
</div>
<?php } ?>
<!---Error Message--->
<?php if($error){ ?>
<div class="alert alert-danger" role="alert">
<strong>(!)</strong> <?php echo htmlentities($error);?></div>
<?php } ?>
</div>
</div>
<div class="row">
<div class="col-md-6">
<form class="form-horizontal" name="category" method="post">
<div class="form-group">
<label class="col-md-2 control-label">Programa</label>
<div class="col-md-10">
<input type="text" class="form-control" value="" name="category" required>
</div>
</div>
<div class="form-group">
<label class="col-md-2 control-label">Descripci&oacute;n del programa</label>
<div class="col-md-10">
<textarea class="form-control" rows="5" name="description" required></textarea>
</div>
</div>
<div class="form-group">
<label class="col-md-2 control-label">&nbsp;</label>
<div class="col-md-10">
<button type="submit" class="btn btn-custom waves-effect waves-light btn-md" name="submit">
Guardar
</button>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
<!-- end row -->
</div> <!-- container -->
</div> <!-- content -->
<?php include('includes/footer.php');?>
</div>
</div>
<script>
var resizefunc = [];
</script>
<!-- jQuery  -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/detect.js"></script>
<script src="assets/js/fastclick.js"></script>
<script src="assets/js/jquery.blockUI.js"></script>
<script src="assets/js/waves.js"></script>
<script src="assets/js/jquery.slimscroll.js"></script>
<script src="assets/js/jquery.scrollTo.min.js"></script>
<script src="../plugins/switchery/switchery.min.js"></script>
<script src="assets/js/jquery.core.js"></script>
<script src="assets/js/jquery.app.js"></script>
</body>
</html>
<?php } ?>