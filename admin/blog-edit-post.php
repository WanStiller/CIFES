<?php 
//session_start();

// 
session_start([
    'cookie_lifetime' => 86400,
    'gc_maxlifetime' => 86400,
]);
//


include('includes/config.php');
error_reporting(0);
if(strlen($_SESSION['login'])==0)
{ 
header('location:index.php');
}
else{
if(isset($_POST['update']))
{
$posttitle=$_POST['posttitle'];
$autor=$_POST['autor'];
$resumen=$_POST['resumen'];
$catid=$_POST['category'];
$subcatid=$_POST['subcategory'];
$postdetails=$_POST['postdescription'];
$arr = explode(" ",$posttitle);
$url=implode("-",$arr);
$status=1;
$postid=intval($_GET['pid']);
$query=mysqli_query($con,"update blogtblposts set PostTitle='$posttitle',Autor='$autor',Resumen='$resumen',CategoryId='$catid',SubCategoryId='$subcatid',PostDetails='$postdetails',PostUrl='$url',Is_Active='$status' where id='$postid'");
if($query)
{
$msg="Artículo Actualizado ";
}
else{
$error="Intente nuevamente.";    
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
<title>Editar Art&iacute;culo</title>
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
<script>
function getSubCat(val) {
$.ajax({
type: "POST",
url: "get_subcategory.php",
data:'catid='+val,
success: function(data){
$("#subcategory").html(data);
}
});
}
</script>
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
<h4 class="page-title">Editar Art&iacute;culo </h4>
<!--<ol class="breadcrumb p-0 m-0">
<li>
<a href="#">Admin</a>
</li>
<li>
<a href="#"> Art&iacute;culos </a>
</li>
<li class="active">
Editar Art&iacute;culo
</li>
</ol>-->
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
<?php if($error){ ?>
<div class="alert alert-danger" role="alert">
<strong>Alerta!</strong> <?php echo htmlentities($error);?></div>
<?php } ?>
</div>
</div>
<?php
$postid=intval($_GET['pid']);
$query=mysqli_query($con,"select blogtblposts.id as postid,blogtblposts.Autor as autor,blogtblposts.Resumen as resumen,blogtblposts.PostImage,blogtblposts.PostTitle as title,blogtblposts.PostDetails,tblcategory.CategoryName as category,tblcategory.id as catid,tblsubcategory.SubCategoryId as subcatid,tblsubcategory.Subcategory as subcategory from blogtblposts left join tblcategory on tblcategory.id=blogtblposts.CategoryId left join tblsubcategory on tblsubcategory.SubCategoryId=blogtblposts.SubCategoryId where blogtblposts.id='$postid' and blogtblposts.Is_Active=1 ");
while($row=mysqli_fetch_array($query))
{
?>
<div class="row">
<div class="col-md-10 col-md-offset-1">
<div class="p-6">
<div class="">
<form name="addpost" method="post">
<div class="form-group m-b-20">
<label for="exampleInputEmail1">T&iacute;tulo</label>
<input type="text" class="form-control" id="posttitle" value="<?php echo htmlentities($row['title']);?>" name="posttitle" placeholder="Enter title" required>
</div>
<div class="form-group m-b-20">
<label for="exampleInputEmail1">Autor</label>
<input type="text" class="form-control" id="autor" value="<?php echo htmlentities($row['autor']);?>" name="autor" placeholder="Autor" required>
</div>
<div class="form-group m-b-20">
<label for="exampleInputEmail1">Resumen</label>
<input type="text" class="form-control" id="resumen" value="<?php echo htmlentities($row['resumen']);?>" name="resumen" placeholder="Resumen" required>
</div>
<div class="form-group m-b-20">
<label for="exampleInputEmail1">Categor&iacute;a</label>
<select class="form-control" name="category" id="category" onChange="getSubCat(this.value);" required>
<option value="<?php echo htmlentities($row['catid']);?>"><?php echo htmlentities($row['category']);?></option>
<?php
// Feching active categories
$ret=mysqli_query($con,"select id,CategoryName from  tblcategory where Is_Active=1");
while($result=mysqli_fetch_array($ret))
{    
?>
<option value="<?php echo htmlentities($result['id']);?>"><?php echo htmlentities($result['CategoryName']);?></option>
<?php } ?>
</select> 
</div>
<div class="form-group m-b-20">
<label for="exampleInputEmail1">Sub Categor&iacute;a</label>
<select class="form-control" name="subcategory" id="subcategory" required>
<option value="<?php echo htmlentities($row['subcatid']);?>"><?php echo htmlentities($row['subcategory']);?></option>
</select> 
</div>
<div class="row">
<div class="col-sm-12">
<div class="card-box">
<h4 class="m-b-30 m-t-0 header-title"><b>Contenido</b></h4>
<textarea class="summernote" name="postdescription" required><?php echo htmlentities($row['PostDetails']);?></textarea>
</div>
</div>
</div>
<div class="row">
<div class="col-sm-12">
<div class="card-box">
<h4 class="m-b-30 m-t-0 header-title"><b>Imagen de encabezado</b></h4>
<img src="postimages/<?php echo htmlentities($row['PostImage']);?>" width="300"/>
<br />
<a href="change-image.php?pid=<?php echo htmlentities($row['postid']);?>">Actualizar Imagen</a>
</div>
</div>
</div>
<?php } ?>
<button type="submit" name="update" class="btn btn-success waves-effect waves-light">Actualizar </button>
</div>
</div>
</div>
</div>
</div>
</div>
<?php include('includes/footer.php');?>
</div> </div>
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