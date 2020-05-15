<?php 
    /*session_start();
    include "includes/config.php";
    if(!isset($_SESSION["user_id"]) || $_SESSION["user_id"]==null){
    header("location: login-required.php");
    }*/
    //Si el status de la sesión es mayor a 1, el contenido premium se muestra.  
    /*$my_user_id=$_SESSION['user_id'];
    $query=mysqli_query($con,"SELECT * from user where id=$my_user_id");
    while ($row=mysqli_fetch_array($query)) {
    $status = $row['status'];
    if ($status<0) {
    header("location: login-required.php");
    }
    }        
    $my_user_id=$_SESSION['user_id'];
    $query=mysqli_query($con,"SELECT * from user where id=$my_user_id");
    while ($row=mysqli_fetch_array($query)) {
    $fullname = $row['fullname'];
    $email = $row['email'];
    $profile_pic = $row['image'];
    $created_at = $row['created_at'];
    $status = $row['status'];
    }*/
/**/
?>
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
$st1='1';
$query=mysqli_query($con,"insert into tblcomments(postId,name,email,comment,status) values('$postid','$name','$email','$comment','$st1')");
if($query):
echo "<script>alert('Consulta enviada exitosamente; será revisada por nuestro equipo docente.');</script>";
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
$query=mysqli_query($con,"select blogtblposts.PostTitle as posttitle,blogtblposts.Autor as autor,blogtblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,blogtblposts.PostDetails as postdetails,blogtblposts.PostingDate as postingdate,blogtblposts.PostUrl as url from blogtblposts left join tblcategory on tblcategory.id=blogtblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=blogtblposts.SubCategoryId where blogtblposts.id='$pid'");
while ($row=mysqli_fetch_array($query)) {
?>
<!DOCTYPE html>
<!--Desarrollo y Programación por Joel García. Bogotá Colombia-->
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta content="" name="description">
<meta content="Joel Garciaa" name="author">
<title><?php echo htmlentities($row['posttitle']);?></title>
<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="css/modern-business.css" rel="stylesheet">
<link rel="shortcut icon" href="images/favicon.png">
<link rel="stylesheet" href="fonts/demo-files/demo.css">
<meta property="og:image" content="images/preview.png" />
<link rel="stylesheet" type="text/css" href="js/jScrollPane/jScrollPane.css" />
<link rel="stylesheet" type="text/css" href="css/page.css" />
<link rel="stylesheet" type="text/css" href="css/chat.css" />
</head>
<body>
<?php include('includes/header.php');?>
<div class="container">
<div class="row" style="margin-top: 4%">
<div class="col-md-9">
<!--<div style="margin-bottom: 15px; text-align: right;">
        <a href="http://www.facebook.com/sharer.php?u=http://app.cifes.com.co/" style="text-decoration: none;"><span class="icon icon-share2" style="font-size: 2em"></span></a>
</div>-->
<div class="card mb-4">
<div class="card-body">
<h3 class="card-title" style="margin-top: 0px; color: #2caab0; font-weight: bold;"><?php echo htmlentities($row['posttitle']);?></h3>
<p><b> Posteado el </b><?php echo htmlentities($row['postingdate']);?> -- Por <?php echo htmlentities($row['autor']);?></p>
<hr />
<img class="img-fluid rounded" src="admin/postimages/<?php echo htmlentities($row['PostImage']);?>" alt="<?php echo htmlentities($row['posttitle']);?>" style="width:100%;height:auto;">
<p class="card-text"><?php 
$pt=$row['postdetails'];
echo  (substr($pt,0));?></p>
</div>
<div>
<div class="" style="margin: 2%">
<div class="">

    <div id="disqus_thread"></div>
<script>
/**
*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
var disqus_config = function () {
this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
};
(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');
s.src = 'https://cifes-online.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>


<!--<div class="my-4">
<h6 class="card-header bg-dark" style="color: #fff; font-weight: normal; border-radius: 0!important">
<span class="icon icon-bubble" style="margin-right: 10px;"></span>
Comentar o consultar al Docente</h6>
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
<textarea class="form-control" name="comment" rows="3" placeholder="Escribe aquí tu consulta" required></textarea>
</div>
<button type="submit" class="btn btn-primary" name="submit">Enviar</button>
</form>
</div>
</div>-->
<?php 
$sts=1;
$query=mysqli_query($con,"select name,comment,postingDate from  tblcomments where postId='$pid' and status='$sts'");
while ($row=mysqli_fetch_array($query)) {
?>
<div class="media mb-4">
<img class="d-flex mr-3 rounded-circle" src="images/usericon.png" alt="icon" style="margin-left: 1em; max-width: 50px;">
<div class="media-body">
<h5 class="mt-0"><?php echo htmlentities($row['name']);?> <br />
<span style="font-size:11px;"><?php echo htmlentities($row['postingDate']);?></span>
</h5>
<?php echo htmlentities($row['comment']);?><hr></div>
</div>
<?php } ?>
</div>
</div>
</div>
</div>
<?php } ?>
</div>
<!-- Sidebar Widgets Column -->
<?php include('includes/sidebar-blog.php');?>
</div>
</div>
<?php include('includes/footer.php');?>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
<?php include 'includes/fb.php'; ?>
</html>