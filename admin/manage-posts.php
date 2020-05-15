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
$postid=intval($_GET['pid']);
$query=mysqli_query($con,"update tblposts set Is_Active=0 where id='$postid'");
if($query)
{
$msg="Post deleted ";
}
else{
$error="Something went wrong . Please try again.";    
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
<title>Administrar Clases</title>
<link rel="stylesheet" href="../plugins/morris/morris.css">
<link href="../plugins/jvectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
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
<h4 class="page-title">Administrar Clases </h4>
<ol class="breadcrumb p-0 m-0">
<li>
<a href="#">Admin</a>
</li>
<li>
<a href="#">Clases</a>
</li>
<li class="active">
Administrar Clases 
</li>
</ol>
<div class="clearfix"></div>
</div>
</div>
</div>
<div class="row">
<div class="col-sm-12">
<div class="card-box">
<div class="table-responsive">
<table class="table table-colored table-centered table-inverse m-0">
<thead>
<tr>                                    
<th>T&iacute;tulo</th>
<th>Programa</th>
<th>Curso</th>
<th>Acciones</th>
</tr>
</thead>
<tbody>
<?php
$query=mysqli_query($con,"select tblposts.id as postid,tblposts.PostTitle as title,tblcategory.CategoryName as category,tblsubcategory.Subcategory as subcategory from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join tblsubcategory on tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.Is_Active=1 ");
$rowcount=mysqli_num_rows($query);
if($rowcount==0)
{
?>
<tr>
<td colspan="4" align="center"><h3 style="color:red">Sin Elementos.</h3></td>
<tr>
<?php 
} else {
while($row=mysqli_fetch_array($query))
{
?>
<tr>
<td><b><?php echo htmlentities($row['title']);?></b></td>
<td><?php echo htmlentities($row['category'])?></td>
<td><?php echo htmlentities($row['subcategory'])?></td>
<td><a href="edit-post.php?pid=<?php echo htmlentities($row['postid']);?>"><i class="fa fa-pencil" style="color: #29b6f6;"></i></a> 
&nbsp;<a href="manage-posts.php?pid=<?php echo htmlentities($row['postid']);?>&&action=del" onclick="return confirm('Está seguro que desea suprimir este elemento?')"> <i class="fa fa-trash-o" style="color: #f05050"></i></a>
<a href="#" style="cursor: not-allowed;"><img src="../images/arreglar.png" style="margin-left: 10px;width: 13px;"></a></td>
</tr>
<?php } }?>
</tbody>
</table>
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
<script src="../plugins/waypoints/jquery.waypoints.min.js"></script>
<script src="../plugins/counterup/jquery.counterup.min.js"></script>
<script src="../plugins/morris/morris.min.js"></script>
<script src="../plugins/raphael/raphael-min.js"></script>
<script src="../plugins/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
<script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="../plugins/jvectormap/gdp-data.js"></script>
<script src="../plugins/jvectormap/jquery-jvectormap-us-aea-en.js"></script>
<script src="assets/pages/jquery.blog-dashboard.js"></script>
<script src="assets/js/jquery.core.js"></script>
<script src="assets/js/jquery.app.js"></script>
</body>
</html>
<?php } ?>