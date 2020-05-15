<div class="card-body">
<!-- Premium -->
	<!--<ul class="mb-0">
<?php
$query=mysqli_query($con,"select blogtblposts.id as pid,blogtblposts.PostTitle as posttitle from blogtblposts left join tblcategory on tblcategory.id=blogtblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=blogtblposts.SubCategoryId limit 1");
while ($row=mysqli_fetch_array($query)) {
?>
<li>
<a href="news-details.php?nid=<?php
echo htmlentities($row['pid'])?>"><?php echo htmlentities($row['posttitle']);?></a>
</li>
<?php } ?>
</ul>-->
<?php 
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
$query=mysqli_query($con,"select blogtblposts.id as pid,blogtblposts.PostTitle as posttitle,blogtblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,blogtblposts.PostDetails as postdetails,blogtblposts.PostingDate as postingdate,blogtblposts.PostUrl as url from blogtblposts left join tblcategory on tblcategory.id=blogtblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=blogtblposts.SubCategoryId where blogtblposts.Is_Active=1 order by blogtblposts.id desc  LIMIT $offset, $no_of_records_per_page");
while ($row=mysqli_fetch_array($query)) {
?>
<div style="border-radius: 0!important">
<div>
<a href="blog-news-details.php?nid=<?php echo htmlentities($row['pid'])?>">
	<p><?php echo htmlentities($row['posttitle']);?></p>
</a>
</div>
</div>
<?php } ?>
<!--<ul class="pagination justify-content-center mb-4">
<li class="page-item"><a href="?pageno=1"  class="page-link">Primero</a></li>
<li class="<?php if($pageno <= 1){ echo 'disabled'; } ?> page-item">
<a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>" class="page-link">Ant.</a>
</li>
<li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?> page-item">
<a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?> " class="page-link">Sig.</a>
</li>
<li class="page-item"><a href="?pageno=<?php echo $total_pages; ?>" class="page-link">&Uacute;ltimo</a></li>
</ul>-->
<!-- End Premium -->
</div>