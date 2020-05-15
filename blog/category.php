<?php 
session_start();
error_reporting(0);
include('includes/config.php');
?>
<?php require_once 'includes/special.php'; ?>
<body>
<?php include('includes/header.php');?>
<div class="container">
<div class="row" style="margin-top: 4%">
<div class="col-md-8">
<?php 
if($_GET['catid']!=''){
$_SESSION['catid']=intval($_GET['catid']);
}
if (isset($_GET['pageno'])) {
$pageno = $_GET['pageno'];
} else {
$pageno = 1;
}
$no_of_records_per_page = 20;
$offset = ($pageno-1) * $no_of_records_per_page;
$total_pages_sql = "SELECT COUNT(*) FROM blogtblposts";
$result = mysqli_query($con,$total_pages_sql);
$total_rows = mysqli_fetch_array($result)[0];
$total_pages = ceil($total_rows / $no_of_records_per_page);
$query=mysqli_query($con,"select blogtblposts.id as pid,blogtblposts.PostTitle as posttitle,blogtblposts.PostImage,blogtblcategory.CategoryName as category,blogtblsubcategory.Subcategory as subcategory,blogtblposts.PostDetails as postdetails,blogtblposts.PostingDate as postingdate,blogtblposts.PostUrl as url from blogtblposts left join blogtblcategory on blogtblcategory.id=blogtblposts.CategoryId left join  blogtblsubcategory on  blogtblsubcategory.SubCategoryId=blogtblposts.SubCategoryId where blogtblposts.CategoryId='".$_SESSION['catid']."' and blogtblposts.Is_Active=1 order by blogtblposts.id desc LIMIT $offset, $no_of_records_per_page");
$rowcount=mysqli_num_rows($query);
if($rowcount==0)
{
echo "Sin resultados";
}
else {
while ($row=mysqli_fetch_array($query)) {
?>
<!--<h1><?php //echo htmlentities($row['category']);?> <br><br></h1>-->
<div class="card mb-4" style="text-align: center; border-radius: 0!important">
<img style="text-align: center; border-radius: 0!important" class="card-img-top" src="admin/postimages/<?php echo htmlentities($row['PostImage']);?>" alt="<?php echo htmlentities($row['posttitle']);?>">
<div style="padding: 5%; background-color: #fff; margin-top: -5%; width: 90%; margin-left: auto; margin-right: auto; box-shadow: 0 10px 20px 0 rgba(153,153,153,.1); margin-bottom: 5%;">
<h2 class="card-title"><?php echo htmlentities($row['posttitle']);?></h2>
<a href="news-details.php?nid=<?php echo htmlentities($row['pid'])?>" class="btn btn-primary">Leer M&aacute;s</a>
</div>
<div class="card-footer text-muted">
Publicado el <?php echo htmlentities($row['postingdate']);?>
</div>
</div>
<br>
<br>
<?php } ?>
<ul class="pagination justify-content-center mb-4">
<li class="page-item"><a href="?pageno=1"  class="page-link">First</a></li>
<li class="<?php if($pageno <= 1){ echo 'disabled'; } ?> page-item">
<a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>" class="page-link">Prev</a>
</li>
<li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?> page-item">
<a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?> " class="page-link">Next</a>
</li>
<li class="page-item"><a href="?pageno=<?php echo $total_pages; ?>" class="page-link">Last</a></li>
</ul>
<?php } ?>
</div>
<?php include('includes/sidebar.php');?>
</div>
</div>
<?php include('includes/footer.php');?>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</head>
</body>
<?php include 'includes/fb.php'; ?>
</html>
