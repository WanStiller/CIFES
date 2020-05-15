<?php 
session_start();
error_reporting(0);
include 'includes/config.php';
?>
<?php require_once 'includes/special.php'; ?>
<body>
<?php include 'includes/header.php' ;?>
<div class="container">
<div class="row" style="margin-top: 4%">
<div class="col-md-8">
<?php 
if($_POST['searchtitle']!=''){
$st=$_SESSION['searchtitle']=$_POST['searchtitle'];
}
$st;
if (isset($_GET['pageno'])) {
$pageno = $_GET['pageno'];
} else {
$pageno = 1;
}
$no_of_records_per_page = 8;
$offset = ($pageno-1) * $no_of_records_per_page;
$total_pages_sql = "SELECT COUNT(*) FROM tblposts";
$result = mysqli_query($con,$total_pages_sql);
$total_rows = mysqli_fetch_array($result)[0];
$total_pages = ceil($total_rows / $no_of_records_per_page);
$query=mysqli_query($con,"select tblposts.id as pid,tblposts.PostTitle as posttitle,tblcategory.CategoryName as category,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.PostTitle like '%$st%' and tblposts.Is_Active=1 LIMIT $offset, $no_of_records_per_page");
$rowcount=mysqli_num_rows($query);
if($rowcount==0)
{
echo "Sin resultados...";
}
else {
while ($row=mysqli_fetch_array($query)) {
?>
<div class="card mb-4">
<div class="card-body">
<h2 class="card-title"><?php echo htmlentities($row['posttitle']);?></h2>
<a href="news-details.php?nid=<?php echo htmlentities($row['pid'])?>" class="btn btn-primary">Ampliar Contenido &rarr;</a>
</div>
<div class="card-footer text-muted">
Publicado el <?php echo htmlentities($row['postingdate']);?>
</div>
</div>
<?php } ?>
<ul class="pagination justify-content-center mb-4">
<li class="page-item"><a href="?pageno=1"  class="page-link">Primero</a></li>
<li class="<?php if($pageno <= 1){ echo 'disabled'; } ?> page-item">
<a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>" class="page-link">Ant.</a>
</li>
<li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?> page-item">
<a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?> " class="page-link">Sig.</a>
</li>
<li class="page-item"><a href="?pageno=<?php echo $total_pages; ?>" class="page-link">&Uacute;ltimo</a></li>
</ul>
<?php } ?>
</div>
<?php include 'includes/sidebar-blog.php' ;?>
</div>
</div>
<?php include 'includes/footer.php' ;?>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</head>
</body>
<?php include 'includes/fb.php'; ?>
</html>