<?php 
    // Desarrollo por Joel Gs
    session_start();
    error_reporting(0);
    include "config/config.php";
    if(!isset($_SESSION["user_id"]) || $_SESSION["user_id"]==null){
        header("location: index.php");
    }
    $my_user_id=$_SESSION['user_id'];
    $query=mysqli_query($con,"SELECT * from user where id=$my_user_id");
    while ($row=mysqli_fetch_array($query)) {
        $fullname = $row['fullname'];
        $email = $row['email'];
        $profile_pic = $row['image'];
        $created_at = $row['created_at'];
        $status = $row['status'];
        $puntos = $row['puntos'];
        $ultimaClaseId = $row['ultimaClaseId'];
        $ultimaClaseTi = $row['ultimaClaseTi'];
    }
    $count_files = mysqli_query($con, "select * from file");
    $count_download = mysqli_query($con, "select sum(download) as download from file");
    $count_user=mysqli_query($con, "select * from user");
    $count_comments=mysqli_query($con, "select * from comment")
?>
<?php 
//Si el status de la sesión es mayor a 1, el contenido premium se muestra.  
    $my_user_id=$_SESSION['user_id'];
    $query=mysqli_query($con,"SELECT * from user where id=$my_user_id");
    while ($row=mysqli_fetch_array($query)) {
    $status = $row['status'];
    if ($status<0) {
    header("location: login-required.php");
    }
    }
?>
<?php require_once 'includes/special.php'; ?>
<body>
<?php include('includes/header-logged.php');?>


<div class="container">
<div class="row" style="margin-top: 20px">
<div class="col-md-12">
<?php 
if($_GET['catid']!=''){
$_SESSION['catid']=intval($_GET['catid']);
}
if (isset($_GET['pageno'])) {
$pageno = $_GET['pageno'];
} else {
$pageno = 1;
}
// Este es el Query de Posts Publicos
$no_of_records_per_page = 200; // Establezca el número de post por página
$offset = ($pageno-1) * $no_of_records_per_page;
$total_pages_sql = "SELECT COUNT(*) FROM tblposts";
$result = mysqli_query($con,$total_pages_sql);
$total_rows = mysqli_fetch_array($result)[0];
$total_pages = ceil($total_rows / $no_of_records_per_page);
$query=mysqli_query($con,"select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.AditionalInf as AditionalInf,tblposts.PostImage,tblcategory.CategoryName as category,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.SubCategoryId='".$_SESSION['catid']."' and tblposts.Is_Active=1 order by tblposts.id asc LIMIT $offset, $no_of_records_per_page");
$rowcount=mysqli_num_rows($query);
if($rowcount==0)
{
//echo "Sin resultados";
}
else {
while ($row=mysqli_fetch_array($query)) {
?>
<!--<h1><?php //echo htmlentities($row['category']);?> <br><br></h1>-->
<!--<div class="row">
    <div class="col-md-12">
        <div class="card mb-4" style="background-image: url(images/6768830-abstract-background-images.jpg); background-position: 50% 50%; background-size: cover;">
            <div style="padding: 3%">
                <a href="news-details.php?nid=<?php echo htmlentities($row['pid'])?>">
                <div style="background-image: url(admin/postimages/<?php echo htmlentities($row['PostImage']);?>);width: 200px;height: 200px;border-radius: 50%; background-position: 50% 50%; background-size: cover;margin: auto;border: 5px solid #00a8b8;transition:all .5s ease-in-out;margin-top:3%" class="ampliar"></div>
            </a>
            </div>
<img class="card-img-top" src="admin/postimages/<?php echo htmlentities($row['PostImage']);?>" alt="<b><?php echo htmlentities($row['posttitle']);?></b>">
<div style="padding:3%;text-align: center;">
<h4 class="card-title"><b><?php echo htmlentities($row['posttitle']);?></b></h4>
<hr>
<?php echo htmlentities($row['AditionalInf']);?>
<br>
<br>
<a href="news-details.php?nid=<?php echo htmlentities($row['pid'])?>" class="btn btn-primary">Ir a la clase</a>
</div>
<div class="card-footer text-muted">
Publicado el <?php echo htmlentities($row['postingdate']);?>
</div>
</div>
    </div>
</div>-->

<div class="row">
    <span style="margin-left:17px;color:#00a8b8;"><?php echo ($row['AditionalInf']);?></span>
    <div class="col-md-12">
        <div class="card">
        <!--<div class="card mb-4" style="background-image: url(images/6768830-abstract-background-images.jpg); background-position: 50% 50%; background-size: cover;">-->
            <div style="text-align: center;">
                <a href="details.php?nid=<?php echo htmlentities($row['pid'])?>">
                <!--<div style="background-image: url(admin/postimages/<?php echo htmlentities($row['PostImage']);?>);width: 200px;height: 200px;border-radius: 50%; background-position: 50% 50%; background-size: cover;margin: auto;border: 3px solid #00a8b8;transition:all .5s ease-in-out;margin-top:3%" class="ampliar"></div>-->
            </a>
            </div>
<!--<img class="card-img-top" src="admin/postimages/<?php echo htmlentities($row['PostImage']);?>" alt="<b><?php echo htmlentities($row['posttitle']);?></b>">-->
<div class="esteticacorp list-group" data-toggle="tooltip" data-placement="right" title="<?php echo htmlentities($row['AditionalInf']);?>">
<a href="news-details.php?nid=<?php echo htmlentities($row['pid'])?>" style="font-weight:normal;font-size:1em;" class="list-group-item list-group-item-action">
<img src="images/play-icon3.png" style="width: 15px; height: auto;margin-right:10px;margin-top:-3px;"><?php echo htmlentities($row['posttitle']);?><span class="icon icon-checkmark esteticacorp" style="color:white;margin-left:10px"></span>
</a>
<!--<br><br><a href="news-details.php?nid=<?php echo htmlentities($row['pid'])?>" class="btn btn-primary"><span class="icon icon-play3"></span></a>-->
</div>
<!--<div class="card-footer text-muted"> Publicado el <?php echo htmlentities($row['postingdate']);?></div>-->
</div>
    </div>
</div>

<?php } ?>
<?php } ?>
<?php 
if($_GET['catid']!=''){
$_SESSION['catid']=intval($_GET['catid']);
}
if (isset($_GET['pageno'])) {
$pageno = $_GET['pageno'];
} else {
$pageno = 1;
}
// Este es el Query de Posts Privados
$no_of_records_per_page = 200; // Establezca el número de post pos página
$offset = ($pageno-1) * $no_of_records_per_page;
$total_pages_sql = "SELECT COUNT(*) FROM pvttblposts";
$result = mysqli_query($con,$total_pages_sql);
$total_rows = mysqli_fetch_array($result)[0];
$total_pages = ceil($total_rows / $no_of_records_per_page);
$query=mysqli_query($con,"select pvttblposts.id as pid,pvttblposts.AditionalInf as AditionalInf,pvttblposts.PostTitle as posttitle,pvttblposts.PostImage,tblcategory.CategoryName as category,tblsubcategory.Subcategory as subcategory,pvttblposts.PostDetails as postdetails,pvttblposts.PostingDate as postingdate,pvttblposts.PostUrl as url from pvttblposts left join tblcategory on tblcategory.id=pvttblposts.CategoryId left join tblsubcategory on  tblsubcategory.SubCategoryId=pvttblposts.SubCategoryId where pvttblposts.SubCategoryId='".$_SESSION['catid']."' and pvttblposts.Is_Active=1 order by pvttblposts.id asc LIMIT $offset, $no_of_records_per_page");
$rowcount=mysqli_num_rows($query);
if($rowcount==0)
{
//echo "Usted no ha finalizado el curso anterior.";
}
else {
while ($row=mysqli_fetch_array($query)) {
?>
<!--<h1><?php //echo htmlentities($row['category']);?> <br><br></h1>-->
<div class="row">
    <span style="margin-left:17px;color:#00a8b8;"><?php echo ($row['AditionalInf']);?></span>
    <div class="col-md-12">
        <div class="card">
        <!--<div class="card mb-4" style="background-image: url(images/6768830-abstract-background-images.jpg); background-position: 50% 50%; background-size: cover;">-->
            <div style="text-align: center;">
                <a href="pvt-news-details.php?nid=<?php echo htmlentities($row['pid'])?>">
                <!--<div style="background-image: url(admin/postimages/<?php echo htmlentities($row['PostImage']);?>);width: 200px;height: 200px;border-radius: 50%; background-position: 50% 50%; background-size: cover;margin: auto;border: 3px solid #00a8b8;transition:all .5s ease-in-out;margin-top:3%" class="ampliar"></div>-->
            </a>
            </div>
<!--<img class="card-img-top" src="admin/postimages/<?php echo htmlentities($row['PostImage']);?>" alt="<b><?php echo htmlentities($row['posttitle']);?></b>">-->
<div class="esteticacorp list-group" data-toggle="tooltip" data-placement="right" title="<?php echo htmlentities($row['AditionalInf']);?>">
<a href="pvt-news-details.php?nid=<?php echo htmlentities($row['pid'])?>" style="font-weight:normal;font-size:1em;" class="list-group-item list-group-item-action">
<img src="images/play-icon3.png" style="width: 15px; height: auto;margin-right:10px;margin-top:-3px;"><?php echo htmlentities($row['posttitle']);?><span class="icon icon-checkmark esteticacorp" style="color:white;margin-left:10px"></span>
</a>
<!--<br><br><a href="pvt-news-details.php?nid=<?php echo htmlentities($row['pid'])?>" class="btn btn-primary"><span class="icon icon-play3"></span></a>-->
</div>
<!--<div class="card-footer text-muted"> Publicado el <?php echo htmlentities($row['postingdate']);?></div>-->
</div>
    </div>
</div>
<?php } ?>
<br>
<br>
<!--<ul class="pagination justify-content-center mb-4">
<li class="page-item"><a href="?pageno=1"  class="page-link">First</a></li>
<li class="<?php if($pageno <= 1){ echo 'disabled'; } ?> page-item">
<a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>" class="page-link">Prev</a>
</li>
<li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?> page-item">
<a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?> " class="page-link">Next</a>
</li>
<li class="page-item"><a href="?pageno=<?php echo $total_pages; ?>" class="page-link">Last</a></li>
</ul>-->
<?php } ?>
</div>
<?php //include('includes/sidebar.php');?>
</div>
</div>
<?php include('includes/footer.php');?>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</head>
</body>
<?php //include 'includes/fb.php'; ?>
</html>