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
if($_GET['action']='del')
{
//$postid=intval($_GET['pid']);
$query=mysqli_query($con,"select user where id='$pid'");
if($query)
{
$msg="Alumno Editado ";
}
else{
$error="Error, Intentar de nuevo.";    
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
$link = new PDO('mysql:host=localhost;dbname=applimpia', 'appjoellimpia', ')T,AXa)#Vs+S');
?>
<br>
<a href="#" id="test" onClick="javascript:fnExcelReport();">Descargar archivo en formato  Excel</a>
<br><br>
<table class="table table-striped table-hover" id="myTable">
		<thead>
		<tr>
			<th>Acciones</th>
			<th>Plan</th>
			<!--<th>MEMBRES&Iacute;A</th>-->
			<th>Nombre</th>
			<th>Correo</th>
			<th>Tel&eacute;fono</th>
			<th>Pa&iacute;s</th><!--Editar-->
			<th>Fecha de registro</th>
			<th>Vendedor</th>
			<th>Observaciones</th>
			
		</tr>
		</thead>
<?php 

//$query=mysqli_query($con,"select user.id as postid");

foreach ($link->query('SELECT * from user') as $row){ // Hacer la consulta e iterarla con each. ?> 
<tr>
	<!--<td>
    <select class="form-control" id="exampleFormControlSelect1">
      <option>Gratis</option>
      <option>Starter</option>
      <option>Pass</option>
      <option>Premium</option>
    </select></td>-->

    <td style="text-align: center;"><a href="editar-alumno.php?pid=<?php echo $pid; ?>"><i class="fa fa-pencil" style="color: #29b6f6;"></i></a></td>
    
	<td>

		<?php
        if ($row['status'] == 0) {
        echo "<span style='color:red'>Gratis</span>";
        }
        if ($row['status'] == 1) {
        echo "Starter";
        }
        if ($row['status'] == 2) {
        echo "Pass";
        }
        if ($row['status'] == 3) {
        echo "Premium";
        }
        if ($row['status'] == 4) {
        echo "Docente";
        }
        if ($row['status'] == 5) {
        echo "Administrador";
        }
        ?>

		<?php //echo $row['status'] ?></td>
    <td><?php echo $row['fullname'] ?></td>
    <td><?php echo $row['email'] ?></td>
    <td><?php echo $row['phone'] ?></td>
    <td><?php echo $row['country'] ?></td> <!--Editar-->
    <td><?php echo $row['created_at'] ?></td>
    <td><?php echo $row['vendedor'] ?></td>
    <td><?php echo $row['Observaciones'] ?></td>
    
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


	function fnExcelReport() {
    var tab_text = '<html xmlns:x="urn:schemas-microsoft-com:office:excel">';
    tab_text = tab_text + '<head><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet>';

    tab_text = tab_text + '<x:Name>Test Sheet</x:Name>';

    tab_text = tab_text + '<x:WorksheetOptions><x:Panes></x:Panes></x:WorksheetOptions></x:ExcelWorksheet>';
    tab_text = tab_text + '</x:ExcelWorksheets></x:ExcelWorkbook></xml></head><body>';

    tab_text = tab_text + "<table border='1px'>";
    tab_text = tab_text + $('#myTable').html();
    tab_text = tab_text + '</table></body></html>';

    var data_type = 'data:application/vnd.ms-excel';
    
    var ua = window.navigator.userAgent;
    var msie = ua.indexOf("MSIE ");
    
    if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./)) {
        if (window.navigator.msSaveBlob) {
            var blob = new Blob([tab_text], {
                type: "application/csv;charset=utf-8;"
            });
            navigator.msSaveBlob(blob, 'alumnado_cifesonline.xls');
        }
    } else {
        $('#test').attr('href', data_type + ', ' + encodeURIComponent(tab_text));
        $('#test').attr('download', 'alumnado_cifesonline.xls');
    }

}


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