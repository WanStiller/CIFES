<?php 
session_start();
include 'includes/config.php' ; ?>
<?php require_once 'includes/special.php'; ?>
<body>
<?php include 'includes/header.php';?>
<div class="container">
	<!--<br>
	<br>
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="images/slider.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="images/slider.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="images/slider.jpg" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>-->


<div class="row" style="margin-top: 4%">
<div class="col-md-8">
<?php 
if (isset($_GET['pageno'])) {
$pageno = $_GET['pageno'];
} else {
$pageno = 1;
}
$no_of_records_per_page = 10;
$offset = ($pageno-1) * $no_of_records_per_page;
$total_pages_sql = "SELECT COUNT(*) FROM blogtblposts";
$result = mysqli_query($con,$total_pages_sql);
$total_rows = mysqli_fetch_array($result)[0];
$total_pages = ceil($total_rows / $no_of_records_per_page);
$query=mysqli_query($con,"select blogtblposts.id as pid,blogtblposts.PostTitle as posttitle,blogtblposts.PostImage,blogtblcategory.CategoryName as category,blogtblcategory.id as cid,blogtblsubcategory.Subcategory as subcategory,blogtblposts.PostDetails as postdetails,blogtblposts.PostingDate as postingdate,blogtblposts.PostUrl as url from blogtblposts left join blogtblcategory on blogtblcategory.id=blogtblposts.CategoryId left join  blogtblsubcategory on  blogtblsubcategory.SubCategoryId=blogtblposts.SubCategoryId where blogtblposts.Is_Active=1 order by blogtblposts.id desc  LIMIT $offset, $no_of_records_per_page");
while ($row=mysqli_fetch_array($query)) {
?>
<div class="card mb-4" style="text-align: center; border-radius: 0!important">
<img style="border-radius: 0!important" class="card-img-top" src="admin/postimages/<?php echo htmlentities($row['PostImage']);?>" alt="<?php echo htmlentities($row['posttitle']);?>">
<div style="padding: 5%; background-color: #fff; margin-top: -15%; width: 90%; margin-left: auto; margin-right: auto; box-shadow: 0 10px 20px 0 rgba(153,153,153,.9); margin-bottom: 5%; opacity: 0.8">
<h4 class="card-title"><?php echo htmlentities($row['posttitle']);?></h4>
<p><b>Categor&iacute;a : </b> <a href="category.php?catid=<?php echo htmlentities($row['cid'])?>"><?php echo htmlentities($row['category']);?></a> </p>
<a href="news-details.php?nid=<?php echo htmlentities($row['pid'])?>" class="btn btn-primary">Leer M&aacute;s &rarr;</a>
</div>
<div class="card-footer text-muted">
Publicado el <?php echo htmlentities($row['postingdate']);?>
</div>
</div>
<br>
<br>
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
</div>
<?php include('includes/sidebar.php');?>
</div>
</div>
<?php include('includes/footer.php');?>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
<?php include 'includes/fb.php'; ?>
</html>