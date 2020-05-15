<?php 
    session_start();
    include "includes/config.php";
    if(!isset($_SESSION["user_id"]) || $_SESSION["user_id"]==null){
    header("location: login-required.php");
    }
    //Si el status de la sesión es mayor a 1, el contenido premium se muestra.  
    $my_user_id=$_SESSION['user_id'];
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
    $puntos = $row['puntos'];


    $ultimaClaseId = $row['ultimaClaseId'];
    $ultimaClaseTi = $row['ultimaClaseTi'];

    
    }
/**/
?>
<?php 
/*session_start();
include('includes/config.php');*/
if (empty($_SESSION['token'])) {
$_SESSION['token'] = bin2hex(random_bytes(32));
}
if(isset($_POST['submit']))
{
if (!empty($_POST['csrftoken'])) {
if (hash_equals($_SESSION['token'], $_POST['csrftoken'])) {
$puntos=$_POST['puntos'];
$name=$_POST['name'];
$email=$_POST['email'];
$comment=$_POST['comment'];
$postid=intval($_GET['nid']);
$st1='1';
$query=mysqli_query($con,"insert into publictblcomments(postId,name,email,comment,status) values('$postid','$name','$email','$comment','$st1')");
$query2=mysqli_query($con,"Update user set puntos='$puntos' where id=$my_user_id"); /*Comentar para sumar un punto*/
if($query):
echo "<script>alert('Consulta enviada exitosamente; será revisada por nuestro equipo docente. Se ha sumado 0.5 puntos a su perfil');</script>";
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
$query=mysqli_query($con,"select tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.id='$pid'");
while ($row=mysqli_fetch_array($query)) {
?>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta content="" name="description">
<meta content="Joel Garcia" name="author">
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
<?php include('includes/header-logged.php');?>
<div class="container">
<div class="row" style="margin-top: 20px;margin-bottom: 2%">
<div class="col-md-9">
    <!--<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page"><a href="#" onclick="goBack()" style="font-size: 1em;">Atr&aacute;s</a></li>
    <li class="breadcrumb-item"><?php echo ($row['category']);?></li>
        <li class="breadcrumb-item"><?php echo ($row['subcategory']);?></li>
    <li class="breadcrumb-item"><a href="subcategory.php?catid=<?php echo htmlentities($row['cid'])?>" style="font-size: 1em;"><?php echo htmlentities($row['subcategory']);?></a></li>
    <li class="breadcrumb-item" aria-current="page"><?php echo htmlentities($row['posttitle']);?></li>
  </ol>
</nav>-->
<!--<div style="margin-bottom: 15px; text-align: right;">
        <a href="http://www.facebook.com/sharer.php?u=http://app.cifes.com.co/" style="text-decoration: none;"><span class="icon icon-share2" style="font-size: 2em"></span></a>
</div>-->
<div class="card mb-4">
<div class="card-body">
    <h4><b style="color: #00a8b8"><?php echo htmlentities($row['posttitle']);?></b></h4>
<hr />
<!--<p><b>Categor&iacute;a : </b> <a href="subcategory.php?catid=<?php echo htmlentities($row['cid'])?>"><?php echo htmlentities($row['category']);?></a> |
<b>Sub Categor&iacute;a : </b><?php echo htmlentities($row['subcategory']);?> <b> Posteado el </b><?php echo htmlentities($row['postingdate']);?></p>
<hr />-->
<!--<img class="img-fluid rounded" src="admin/postimages/<?php echo htmlentities($row['PostImage']);?>" alt="<?php echo htmlentities($row['posttitle']);?>">-->
<p class="card-text"><?php 
$pt=$row['postdetails'];
echo  (substr($pt,0));?></p>
</div>
<div>
<div class="" style="margin: 2%">
<div class="">
    
    <?php //require 'includes/boton.php'; //Boton seleccionado y no seleccionado ?>


<div class="my-4">
<h6 class="card-header bg-dark" style="color: #fff; font-weight: normal; border-radius: 0!important">
<span class="icon icon-bubble" style="margin-right: 10px;"></span>
Deseas dejarnos tu aporte?</h6>
<div class="card-body">
<form name="Comment" method="post">
<input type="hidden" name="csrftoken" value="<?php echo htmlentities($_SESSION['token']); ?>" />
<div class="form-group">
<input type="hidden" name="name" class="form-control" placeholder="Ingrese su nombre" required value="<?php echo $fullname; ?>">
</div>
<div class="form-group">
<input type="hidden" name="email" class="form-control" placeholder="ingrese su direcci&oacute;n de Email" required value="<?php echo $email; ?>">
</div>

<div class="form-group">
  <?php
$num1=$puntos;
$num2=0.5;
$resultado=$num1 + $num2;
//echo $resultado;
?>
<input type="hidden" name="puntos" class="form-control" required value="<?php echo $resultado; ?>">
</div>


<div class="form-group">
<textarea class="form-control" name="comment" rows="3" placeholder="Deje su aporte en esta clase y sumar&aacute;s 0.5 puntos." required></textarea>
</div>
<button type="submit" class="btn btn-primary" name="submit">Enviar</button>
</form>
</div>
</div>




</div>
</div>
</div>
</div>
<?php } ?>
</div>

    <!-- Columna de Aportes -->


      <div class="col-md-3">
        <div class="bg-dark" style="padding: 3%;margin-bottom:15px;color: #fff;">Aportes <span class="icon icon-bell"></span></div>
        <?php 
        $sts=1;
        $query=mysqli_query($con,"select name,comment,postingDate from  publictblcomments where postId='$pid' and status='$sts' order by publictblcomments.id desc");
        while ($row=mysqli_fetch_array($query)) {
        ?>
        <div class="media mb-4">
        <img class="d-flex mr-3 rounded-circle" src="images/usericon.png" alt="icon" style="margin-left: 0em; max-width: 30px;">
        <div class="media-body">
        <h6 class="mt-0"><?php echo htmlentities($row['name']);?> <br />
        <span style="font-size:9px;"><?php echo htmlentities($row['postingDate']);?></span>
        </h6>
        <p>
            <?php echo htmlentities($row['comment']);?>
        </p>
        <div style="text-align: center;"><span class="icon icon-minus"></span></div>
        </div>
        </div>
        <?php } ?>
      </div>

</div>
</div>
<?php include('includes/footer.php');?>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
<?php include 'includes/fb.php'; ?>
</html>