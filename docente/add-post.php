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
$posttitle=$_POST['posttitle'];
$catid=$_POST['category'];
$subcatid=$_POST['subcategory'];
$postdetails=$_POST['postdescription'];
$arr = explode(" ",$posttitle);
$url=implode("-",$arr);
$imgfile=$_FILES["postimage"]["name"];
$extension = substr($imgfile,strlen($imgfile)-4,strlen($imgfile));
$allowed_extensions = array(".jpg","jpeg",".png",".gif");
// Validation for allowed extensions .in_array() function searches an array for a specific value.
if(!in_array($extension,$allowed_extensions))
{
echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
else
{
$imgnewfile=md5($imgfile).$extension;
move_uploaded_file($_FILES["postimage"]["tmp_name"],"postimages/".$imgnewfile);
$status=1;
$query=mysqli_query($con,"insert into tblposts(PostTitle,CategoryId,SubCategoryId,PostDetails,PostUrl,Is_Active,PostImage) values('$posttitle','$catid','$subcatid','$postdetails','$url','$status','$imgnewfile')");
if($query)
{
$msg="Clase publicada satisfactoriamente. ";
}
else{
$error="Intente de nuevo.";    
} 
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
<title>Agregar Clase</title>
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
<h4 class="page-title">Agregar Clase </h4>
<ol class="breadcrumb p-0 m-0">
<li>
<a href="#">Clase</a>
</li>
<li>
<a href="#">Agregar Clase </a>
</li>
<li class="active">
Agregar Clase
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
<?php if($error){ ?>
<div class="alert alert-danger" role="alert">
<strong>Alerta!</strong> <?php echo htmlentities($error);?></div>
<?php } ?>
</div>
</div>
<div class="row">
<div class="col-md-10 col-md-offset-1">
<div class="p-6">
<div class="">
<form name="addpost" method="post" enctype="multipart/form-data">
<div class="form-group m-b-20">
<label for="exampleInputEmail1">T&iacute;tulo de la Clase</label>
<input type="text" class="form-control" id="posttitle" name="posttitle" placeholder="Ingresa un T&iacute;tulo" required>
</div>
<div class="form-group m-b-20">
<label for="exampleInputEmail1">Programa</label>
<select class="form-control" name="category" id="category" onChange="getSubCat(this.value);" required>
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
<div class="form-group m-b-20">
<label for="exampleInputEmail1">Curso</label>
<select class="form-control" name="subcategory" id="subcategory" required>
</select> 
</div>
<div class="row">
<div class="col-sm-12">
<div class="card-box">
<h4 class="m-b-30 m-t-0 header-title"><b>Contenido</b></h4>
<textarea class="summernote" name="postdescription" required></textarea>
</div>
</div>
</div>
<div class="row">
<div class="col-sm-12">
<div class="card-box">
<h4 class="m-b-30 m-t-0 header-title"><b>Imagen de Encabezado</b></h4>
<input type="file" class="form-control" id="postimage" name="postimage" required>
</div>
</div>
</div>
<button type="submit" name="submit" class="btn btn-success waves-effect waves-light">Guardar</button>
<button type="button" class="btn btn-danger waves-effect waves-light">Descartar</button>
</form>
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