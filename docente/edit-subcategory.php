<?php
session_start();
include('includes/config.php');
error_reporting(0);
if(strlen($_SESSION['login'])==0)
{ 
header('location:index.php');
}
else{
if(isset($_POST['sucatdescription']))
{
$subcatid=intval($_GET['scid']);    
$categoryid=$_POST['category'];
$subcatname=$_POST['subcategory'];
$subcatdescription=$_POST['sucatdescription'];
$query=mysqli_query($con,"update tblsubcategory set CategoryId='$categoryid',Subcategory='$subcatname',SubCatDescription='$subcatdescription' where SubCategoryId='$subcatid'");
if($query)
{
$msg="Sub Categoría creada ";
}
else{
$error="Intente nuevamente.";    
} 
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<title>Editar Sub Categor&iacute;a</title>
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
<?php include('includes/topheader.php');?>
<?php include('includes/leftsidebar.php');?>
<div class="content-page">
<div class="content">
<div class="container">
<div class="row">
<div class="col-xs-12">
<div class="page-title-box">
<h4 class="page-title">Editar Sub Categor&iacute;a</h4>
<ol class="breadcrumb p-0 m-0">
<li>
<a href="#">Admin</a>
</li>
<li>
<a href="#">Sub Categor&iacute;a </a>
</li>
<li class="active">
Editar Sub Categor&iacute;a
</li>
</ol>
<div class="clearfix"></div>
</div>
</div>
</div>
<div class="row">
<div class="col-sm-12">
<div class="card-box">
<h4 class="m-t-0 header-title"><b>Editar Sub Categor&iacute;a </b></h4>
<hr />
<div class="row">
<div class="col-sm-6">  
<!---Success Message--->  
<?php if($msg){ ?>
<div class="alert alert-success" role="alert">
<strong>Correcto!</strong> <?php echo htmlentities($msg);?>
</div>
<?php } ?>
<!---Error Message--->
<?php if($error){ ?>
<div class="alert alert-danger" role="alert">
<strong>Alerta!</strong> <?php echo htmlentities($error);?></div>
<?php } ?>
</div>
</div>
<?php 
$subcatid=intval($_GET['scid']);
$query=mysqli_query($con,"Select tblcategory.CategoryName as catname,tblcategory.id as catid,tblsubcategory.Subcategory as subcatname,tblsubcategory.SubCatDescription as SubCatDescription,tblsubcategory.PostingDate as subcatpostingdate,tblsubcategory.UpdationDate as subcatupdationdate,tblsubcategory.SubCategoryId as subcatid from tblsubcategory join tblcategory on tblsubcategory.CategoryId=tblcategory.id where tblsubcategory.Is_Active=1 and  SubCategoryId='$subcatid'");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>
<div class="row">
<div class="col-md-6">
<form class="form-horizontal" name="category" method="post">
<div class="form-group">
<label class="col-md-2 control-label">Categor&iacute;a</label>
<div class="col-md-10">
<select class="form-control" name="category" required>
<option value="<?php echo htmlentities($row['catid']);?>"><?php echo htmlentities($row['catname']);?></option>
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
<label class="col-md-2 control-label">Sub Categor&iacute;a</label>
<div class="col-md-10">
<input type="text" class="form-control" value="<?php echo htmlentities($row['subcatname']);?>" name="subcategory" required>
</div>
</div>
<div class="form-group">
<label class="col-md-2 control-label">Descripci&oacute;n de Sub Categor&iacute;a</label>
<div class="col-md-10">
<textarea class="form-control" rows="5" name="sucatdescription" required><?php echo htmlentities($row['SubCatDescription']);?></textarea>
</div>
</div>
<?php } ?>
<div class="form-group">
<label class="col-md-2 control-label">&nbsp;</label>
<div class="col-md-10">
<button type="submit" class="btn btn-custom waves-effect waves-light btn-md" name="submitsubcat">
Actualizar
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