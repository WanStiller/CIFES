<?php 
session_start();
include 'includes/config.php' ; ?>
<?php require_once 'includes/special.php'; ?>
<body>
<?php include 'includes/header.php';?>
<div class="container">   
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
$query=mysqli_query($con,"select blogtblposts.id as pid,blogtblposts.PostTitle as posttitle,blogtblposts.Autor as autor,blogtblposts.Resumen as resumen,blogtblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,blogtblposts.PostDetails as postdetails,blogtblposts.PostingDate as postingdate,blogtblposts.PostUrl as url from blogtblposts left join tblcategory on tblcategory.id=blogtblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=blogtblposts.SubCategoryId where blogtblposts.Is_Active=1 order by blogtblposts.id desc  LIMIT $offset, $no_of_records_per_page");
while ($row=mysqli_fetch_array($query)) {
?>
<div class="card mb-4" style="text-align: center; border-radius: 0!important">
<img style="border-radius: 0!important" class="card-img-top" src="admin/postimages/<?php echo htmlentities($row['PostImage']);?>" alt="<?php echo htmlentities($row['posttitle']);?>">
<div style="box-shadow: 0 10px 20px 0 rgba(153,153,153,.9);padding: 5%">
<h4 class="card-title"><?php echo htmlentities($row['posttitle']);?></h4>
<cite><?php echo htmlentities($row['autor']);?></cite>
<hr>
<!--<p><b>Categor&iacute;a : </b> <a href="category.php?catid=<?php echo htmlentities($row['cid'])?>"><?php echo htmlentities($row['category']);?></a> </p>-->
<p><?php echo htmlentities($row['resumen']);?></p>
<a href="blog-news-details.php?nid=<?php echo htmlentities($row['pid'])?>" class="btn btn-primary">Leer M&aacute;s &rarr;</a>
<p>Publicado el <?php echo htmlentities($row['postingdate']);?></p>
</div>
<!--<div class="card-footer text-muted"></div>-->
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
<?php include('includes/sidebar-blog.php');?>
</div>
</div>
<?php include('includes/footer.php');?>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
<?php include 'includes/fb.php'; ?>
</html>