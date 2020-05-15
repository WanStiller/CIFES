<?php
session_start();
include 'includes/config.php';
error_reporting(0);
if(strlen($_SESSION['login'])==0)
{ 
header('location:index.php');
}
else{
if(isset($_POST['submitsubcat']))
{
$categoryid=$_POST['category'];
$subcatname=$_POST['subcategory'];
$subcatdescription=$_POST['sucatdescription'];
$status=1;
$query=mysqli_query($con,"insert into tblsubcategory(CategoryId,Subcategory,SubCatDescription,Is_Active) values('$categoryid','$subcatname','$subcatdescription','$status')");
if($query)
{
$msg="Sub categoría creada ";
}
else{
$error="ocurrió un error. Intente de nuevo";    
} 
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<title>Agregar Curso</title>
<link rel="shortcut icon" href="../images/favicon.png">
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
<h4 class="page-title">Agregar Curso</h4>
<ol class="breadcrumb p-0 m-0">
<li>
<a href="#">Admin</a>
</li>
<li>
<a href="#">Curso </a>
</li>
<li class="active">
Agregar Curso
</li>
</ol>
<div class="clearfix"></div>
</div>
</div>
</div>
<div class="row">
<div class="col-sm-12">
<div class="card-box">
<h4 class="m-t-0 header-title"><b>Agregar Curso </b></h4>
<hr />
<div class="row">
<div class="col-sm-6">   
<?php if($msg){ ?>
<div class="alert alert-success" role="alert">
<strong>Correcto!</strong> <?php echo htmlentities($msg);?>
</div>
<?php } ?>
<?php if($error){ ?>
<div class="alert alert-danger" role="alert">
<strong>Alerta!</strong> <?php echo htmlentities($error);?></div>
<?php } ?>
</div>
</div>
<div class="row">
<div class="col-md-6">
<form class="form-horizontal" name="category" method="post">
<div class="form-group">
<label class="col-md-2 control-label">Programa</label>
<div class="col-md-10">
<select class="form-control" name="category" required>
<option value="">Seleccionar Programa </option>
<?php
$ret=mysqli_query($con,"select id,CategoryName from  tblcategory where Is_Active=1");
while($result=mysqli_fetch_array($ret))
{    
?>
<option value="<?php echo htmlentities($result['id']);?>"><?php echo htmlentities($result['CategoryName']);?></option>
<?php } ?>
</select> 
</div>
</div>
<div class="form-group">
<label class="col-md-2 control-label">Curso </label>
<div class="col-md-10">
<input type="text" class="form-control" value="" name="subcategory" required>
</div>
</div>
<div class="form-group">
<label class="col-md-2 control-label">Descripci&oacute;n de Curso</label>
<div class="col-md-10">
<textarea class="form-control" rows="5" name="sucatdescription" required></textarea>
</div>
</div>
<div class="form-group">
<label class="col-md-2 control-label">&nbsp;</label>
<div class="col-md-10">
<button type="submit" class="btn btn-custom waves-effect waves-light btn-md" name="submitsubcat">
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
</div>
</div>
<?php include('includes/footer.php');?>
</div>
</div>
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
<script src="../plugins/switchery/switchery.min.js"></script>
<script src="assets/js/jquery.core.js"></script>
<script src="assets/js/jquery.app.js"></script>
</body>
</html>
<?php } ?>