<?php 
session_start();
include('includes/config.php');
if (empty($_SESSION['token'])) {
$_SESSION['token'] = bin2hex(random_bytes(32));
}
if(isset($_POST['submit']))
{
if (!empty($_POST['csrftoken'])) {
if (hash_equals($_SESSION['token'], $_POST['csrftoken'])) {
$name=$_POST['name'];
$email=$_POST['email'];
$comment=$_POST['comment'];
$postid=intval($_GET['nid']);
$st1='0';
$query=mysqli_query($con,"insert into blogtblcomments(postId,name,email,comment,status) values('$postid','$name','$email','$comment','$st1')");
if($query):
echo "<script>alert('Comentario enviado exitosamente; está siendo revisado por nuestro equipo de soporte para aprobar su publicación en el sitio. ');</script>";
unset($_SESSION['token']);
else :
echo "<script>alert('Error. Intentar nuevamente.');</script>";  
endif;
}
}
}
?>
<?php
$pid=intval($_GET['nid']);
$query=mysqli_query($con,"select blogtblposts.PostTitle as posttitle,blogtblposts.PostImage,blogtblcategory.CategoryName as category,blogtblcategory.id as cid,blogtblsubcategory.Subcategory as subcategory,blogtblposts.PostDetails as postdetails,blogtblposts.PostingDate as postingdate,blogtblposts.PostUrl as url from blogtblposts left join blogtblcategory on blogtblcategory.id=blogtblposts.CategoryId left join  blogtblsubcategory on  blogtblsubcategory.SubCategoryId=blogtblposts.SubCategoryId where blogtblposts.id='$pid'");
while ($row=mysqli_fetch_array($query)) {
?>
<!DOCTYPE html>
<!--Desarrollo y Programación por Joel García. Bogotá Colombia-->
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta content="" name="description">
<meta content="Joel Garc&iacute;a" name="author">
<title><?php echo htmlentities($row['posttitle']);?></title>
<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="css/modern-business.css" rel="stylesheet">
<link rel="shortcut icon" href="images/favicon.png">
<link rel="stylesheet" type="text/css" href="../fonts/demo-files/demo.css">

<meta property="og:image" content="../images/preview.png" />


</head>
<body>
<?php include('includes/header.php');?>
<div class="container">
<div class="row" style="margin-top: 4%">
<div class="col-md-8">
<div class="card mb-4">
<div class="card-body">
<h2 class="card-title"><?php echo htmlentities($row['posttitle']);?></h2>
<p><b>Categor&iacute;a : </b> <a href="category.php?catid=<?php echo htmlentities($row['cid'])?>"><?php echo htmlentities($row['category']);?></a> |
<b>Sub Categor&iacute;a : </b><?php echo htmlentities($row['subcategory']);?> <b> Posteado el </b><?php echo htmlentities($row['postingdate']);?></p>
<hr />
<!--<img class="img-fluid rounded" src="admin/postimages/<?php echo htmlentities($row['PostImage']);?>" alt="<?php echo htmlentities($row['posttitle']);?>">-->
<p class="card-text"><?php 
$pt=$row['postdetails'];
echo  (substr($pt,0));?></p>
</div>
<div class="">
<div class="" style="">
<div class="">
<div class="card my-4">
<h6 class="card-header" style="color: #fff; font-weight: normal;">Publicar un comentario:</h6>
<div class="card-body">
<form name="Comment" method="post">
<input type="hidden" name="csrftoken" value="<?php echo htmlentities($_SESSION['token']); ?>" />
<div class="form-group">
<input type="text" name="name" class="form-control" placeholder="Ingrese su nombre" required>
</div>
<div class="form-group">
<input type="email" name="email" class="form-control" placeholder="ingrese su direcci&oacute;n de Email" required>
</div>
<div class="form-group">
<textarea class="form-control" name="comment" rows="3" placeholder="Comentario" required></textarea>
</div>
<button type="submit" class="btn btn-primary" name="submit">Postear</button>
</form>
</div>
</div>
<?php 
$sts=1;
$query=mysqli_query($con,"select name,comment,postingDate from  blogtblcomments where postId='$pid' and status='$sts'");
while ($row=mysqli_fetch_array($query)) {
?>
<div class="media mb-4">
<img class="d-flex mr-3 rounded-circle" src="images/usericon.png" alt="icon" style="margin-left: 1em;">
<div class="media-body">
<h5 class="mt-0"><?php echo htmlentities($row['name']);?> <br />
<span style="font-size:11px;"><b>at</b> <?php echo htmlentities($row['postingDate']);?></span>
</h5>
<?php echo htmlentities($row['comment']);?>            </div>
</div>
<?php } ?>
</div>
</div>
</div>
</div>
<?php } ?>
</div>
<!-- Sidebar Widgets Column -->
<?php include('includes/sidebar.php');?>
</div>
</div>
<?php include('includes/footer.php');?>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
<?php include 'includes/fb.php'; ?>
</html>