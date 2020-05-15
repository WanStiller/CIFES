<?php 
session_start();
include('includes/config.php');
error_reporting(0);
if(strlen($_SESSION['login'])==0)
{ 
header('location:index.php');
}
else{
if(isset($_POST['update']))
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<link rel="shortcut icon" href="../images/favicon.png">
<title>Usuarios Registrados</title>
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
<?php include('includes/topheader.php');?>
<?php include('includes/leftsidebar.php');?>
<div class="content-page">
<div class="content">
<div class="container">
<div class="row">
<?php
$link = new PDO('mysql:host=localhost;dbname=cifesvirtual', 'root', '');
?>
<table class="table table-striped">
		<thead>
		<tr>
			<th>MEMBRES&Iacute;A</th>
			<th>NOMBRE</th>
			<th>Correo</th>
			<th>Tel&eacute;fono</th>
			<th>Pa&iacute;s</th><!--Editar-->
			<th>Fecha de registro</th>
			
		</tr>
		</thead>
<?php foreach ($link->query('SELECT * from user') as $row){ // aca se puede hacer la consulta e iterarla con each. ?> 
<tr>
	<td><?php echo $row['status'] ?></td>
    <td><?php echo $row['fullname'] ?></td>
    <td><?php echo $row['email'] ?></td>
    <td><?php echo $row['phone'] ?></td>
    <td><?php echo $row['country'] ?></td> <!--Editar-->
    <td><?php echo $row['created_at'] ?></td>
 </tr>
<?php
	}
?>
</table>
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