<?php 
session_start();
include 'includes/config.php' ;
error_reporting(0);
if(strlen($_SESSION['login'])==0)
{ 
header('location:index.php');
}
else{
if(isset($_POST['update']))
{
$pagetype='contactus';
$pagetitle=$_POST['pagetitle'];
$pagedetails=$_POST['pagedescription'];
$query=mysqli_query($con,"update tblpages set PageTitle='$pagetitle',Description='$pagedetails' where PageName='$pagetype' ");
if($query)
{
$msg="Se han guardado los datos satisfactoriamente. ";
}
else{
$error="Ocurri&oacute; un error. Intente de nuevo.";    
} 
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<link rel="shortcut icon" href="../images/favicon.png">
<title>Contacto</title>
<link href="../plugins/summernote/summernote.css" rel="stylesheet" />
<link href="../plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
<link href="../plugins/jquery.filer/css/jquery.filer.css" rel="stylesheet" />
<link href="../plugins/jquery.filer/css/themes/jquery.filer-dragdropbox-theme.css" rel="stylesheet" />
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
<?php include 'includes/topheader.php'; ?>
<?php include 'includes/leftsidebar.php' ;?>
<div class="content-page">
<div class="content">
<div class="container">
<div class="row">
<div class="col-xs-12">
<div class="page-title-box">
<h4 class="page-title">Contacto  </h4>
<ol class="breadcrumb p-0 m-0">
<li>
<a href="#">P&aacute;ginas</a>
</li>
<li class="active">
Contacto
</li>
</ol>
<div class="clearfix"></div>
</div>
</div>
</div>
<div class="row">
<div class="col-sm-6">
<?php if($msg){ ?>
<div class="alert alert-success" role="alert">
<strong>Correcto!</strong> <?php echo htmlentities($msg);?>
</div>
<?php } ?>
<!-- Error Mensaje -->
<?php if($error){ ?>
<div class="alert alert-danger" role="alert">
<strong>Alerta!</strong> <?php echo htmlentities($error);?></div>
<?php } ?>
</div>
</div>
<?php 
$pagetype='contactus';
$query=mysqli_query($con,"select PageTitle,Description from tblpages where PageName='$pagetype'");
while($row=mysqli_fetch_array($query))
{
?>
<div class="row">
<div class="col-md-10 col-md-offset-1">
<div class="p-6">
<div class="">
<form name="aboutus" method="post">
<div class="form-group m-b-20">
<label for="exampleInputEmail1">T&iacute;tulo</label>
<input type="text" class="form-control" id="pagetitle" name="pagetitle" value="<?php echo htmlentities($row['PageTitle'])?>"  required>
</div>
<div class="row">
<div class="col-sm-12">
<div class="card-box">
<h4 class="m-b-30 m-t-0 header-title"><b>Contenido</b></h4>
<textarea class="summernote" name="pagedescription"  required><?php echo htmlentities($row['Description'])?></textarea>
</div>
</div>
</div>
<?php } ?>
<button type="submit" name="update" class="btn btn-success waves-effect waves-light">Actualizar</button>
</form>
</div>
</div> <!-- end p-20 -->
</div> <!-- end col -->
</div>
</div> <!-- container -->
</div> <!-- content -->
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
<script src="../plugins/summernote/summernote.min.js"></script>
<script src="../plugins/select2/js/select2.min.js"></script>
<script src="../plugins/jquery.filer/js/jquery.filer.min.js"></script>
<script src="assets/pages/jquery.blog-add.init.js"></script>
<script src="assets/js/jquery.core.js"></script>
<script src="assets/js/jquery.app.js"></script>
<script>
jQuery(document).ready(function(){
$('.summernote').summernote({
height: 240,                 // set editor height
minHeight: null,             // set minimum height of editor
maxHeight: null,             // set maximum height of editor
focus: false                 // set focus to editable area after initializing summernote
});
// Select2
$(".select2").select2();
$(".select2-limiting").select2({
maximumSelectionLength: 2
});
});
</script>
<script src="../plugins/switchery/switchery.min.js"></script>
<script src="../plugins/summernote/summernote.min.js"></script>
</body>
</html>
<?php } ?>