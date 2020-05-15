<?php 
    session_start();
    include "includes/config.php";
    if(!isset($_SESSION["user_id"]) || $_SESSION["user_id"]==null){
    header("location: login-required.php");
    }
    //Si el status de la sesión es mayor a 1, el contenido premium se muestra.  
    $my_user_id=$_SESSION['user_id'];
    $query2=mysqli_query($con,"SELECT * from user where id=$my_user_id");
    while ($row=mysqli_fetch_array($query2)) {
    $status = $row['status'];
    if ($status<1) {
    header("location: login-required.php");
    }
    }        
    $my_user_id=$_SESSION['user_id'];
    $query2=mysqli_query($con,"SELECT * from user where id=$my_user_id");
    while ($row=mysqli_fetch_array($query2)) {
    $fullname = $row['fullname'];
    $email = $row['email'];
    $profile_pic = $row['image'];
    $created_at = $row['created_at'];
    $status = $row['status'];
    $puntos = $row['puntos'];
    $ultimaClaseId = $row['ultimaClaseId'];
    $ultimaClaseTi = $row['ultimaClaseTi'];
//
    $num1=$puntos;
    $num2=1;
    $resultado=$num1 + $num2;
    $query2=mysqli_query($con,"Update user set puntos='$resultado' where id=$my_user_id"); 
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
$query=mysqli_query($con,"insert into tblcomments(postId,name,email,comment,status) values('$postid','$name','$email','$comment','$st1')");
$query2=mysqli_query($con,"Update user set puntos='$puntos' where id=$my_user_id"); /*Comentar para sumar un punto*/
if($query):
echo "<script>alert('Aporte enviado exitosamente; será revisado por nuestro equipo docente. Se ha sumando 05 puntos a su perfil.');</script>";
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
$query=mysqli_query($con,"select pvttblposts.PostTitle as posttitle,pvttblposts.ExtraCode as extracode,pvttblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,pvttblposts.PostDetails as postdetails,pvttblposts.PostingDate as postingdate,pvttblposts.PostUrl as url from pvttblposts left join tblcategory on tblcategory.id=pvttblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=pvttblposts.SubCategoryId where pvttblposts.id='$pid'");
while ($row=mysqli_fetch_array($query)) {
?>
<!DOCTYPE html>
<!--Desarrollo y Programación por Joel García. Bogotá Colombia-->
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
   <!--<script> Pertenece al contador regresivo del boton
      $(function(){
        $(".digits").countdown({
          image: "https://jquery-countdown.googlecode.com/svn/trunk/img/digits.png",
          format: "dd:hh:mm:ss",
          endTime: new Date(2013, 12, 2)
        });
      });
    </script><link rel='stylesheet' href='https://github.com/Reflejo/jquery-countdown/blob/master/css/media.css'>-->
</head>
<body>
  <?php 
  //Registrar última clase vista.
  $registrar=$pid;
  $query4=mysqli_query($con,"Update user set ultimaClaseId='$registrar' where id=$my_user_id");
  $registrartitulo=($row['posttitle']);
  $query5=mysqli_query($con,"Update user set ultimaClaseTi='$registrartitulo' where id=$my_user_id");
  ?>
<?php include('includes/header-logged.php');?>
<div class="container">
<div class="row" style="margin-top: 20px;margin-bottom: 2%">
<div class="col-md-9">
    <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <!--<li class="breadcrumb-item active" aria-current="page"><a href="#" onclick="goBack()" style="font-size: 1em;"><span class="icon icon-arrow-left2"></span> Atrás</a></li>-->
    <li class="breadcrumb-item"><a href="category.php?catid=<?php echo htmlentities($row['cid'])?>" style="font-size: 1em;" class="enlace"><?php echo htmlentities($row['category']);?></a></li>
    <!--<li class="breadcrumb-item"><a href="#" onclick="goBack()" style="font-size: 1em;"><?php echo htmlentities($row['subcategory']);?></a></li>-->
        <li class="breadcrumb-item"><span style="font-size: 0.5em!important;font-weight:normal"><?php echo($row['subcategory']);?></span></li>
    <li class="breadcrumb-item" aria-current="page"><?php echo htmlentities($row['posttitle']);?></li>
  </ol>
</nav>
<br>
<nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Clase</a>
    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"><span class="parpadealento">Aportes</span></a>
    <!--<a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Contact</a>-->
  </div>
</nav>
<div class="mb-4 tab-content" style="border-left: 1px solid #dee2e6;border-right: 1px solid #dee2e6;border-bottom: 1px solid #dee2e6;">
<div class="card-body tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
    <h4><b style="color: #00a8b8"><?php echo htmlentities($row['posttitle']);?></b></h4>
<hr />
<!--<p><b>Categor&iacute;a : </b> <a href="subcategory.php?catid=<?php echo htmlentities($row['cid'])?>"><?php echo htmlentities($row['category']);?></a> |
<b>Sub Categor&iacute;a : </b><?php echo htmlentities($row['subcategory']);?> <b> Posteado el </b><?php echo htmlentities($row['postingdate']);?></p>
<hr />-->
<!--<img class="img-fluid rounded" src="admin/postimages/<?php echo htmlentities($row['PostImage']);?>" alt="<?php echo htmlentities($row['posttitle']);?>">-->
<p class="card-text"><?php 
$pt=$row['postdetails'];
echo  (substr($pt,0));?></p>
<div style="opacity: 0.4;text-align: center;font-size: 0.8em;">Al continuar a la siguiente clase, usted sumar&aacute; 01 punto a su perfil.</div>
</div>
<div class="card-body tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
  <br>
    <?php //echo ($row['extracode']); //Code Extra Para COntenido Descargable ?>
            <!--<div class="bg-dark" style="padding: 3%;margin-bottom:15px;color: #fff;">Aportes <span class="icon icon-bell"></span></div>-->
        <?php 
        $sts=1;
        $query=mysqli_query($con,"select name,comment,postingDate from  tblcomments where postId='$pid' and status='$sts' order by tblcomments.id desc");
        while ($row=mysqli_fetch_array($query)) {
        ?>
        <div class="media mb-4">
        <img class="d-flex mr-3 rounded-circle" src="images/usericon.png" alt="icon" style="margin-left: 0em; max-width: 30px;">
        <div class="media-body">
        <h6 class="mt-0"><?php echo htmlentities($row['name']);?> <br />
        <span style="font-size:9px;"><?php echo htmlentities($row['postingDate']);?></span>
        </h6>
        <p style="opacity: 0.8">
            <?php echo htmlentities($row['comment']);?>
            <br>
            <br>
            <span class="icon icon-heart" style="opacity: 0.1; cursor: not-allowed;"> 0</span><span class="icon icon-loop" style="opacity: 0.1; cursor: not-allowed;margin-left: 10px"> 0</span>
        </p>
        <div style="text-align: center;"><span class="icon icon-minus"></span></div>
        </div>
        </div>
        <?php } ?>
</div>
</div>
<?php } ?>
</div>
    <!-- Columna de Aportes -->
      <div class="col-md-3">
<?php //require 'includes/boton.php'; //Boton seleccionado y no seleccionado ?> 
<h6 class="card-header bg-dark" style="color: #fff; font-weight: normal; border-radius: 0!important">
<span class="icon icon-bubble"></span>
Aportes</h6>
<div class="card-body" style="padding: 0px!important">
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
$num2=5;
$resultado=$num1 + $num2;
//echo $resultado;
?>
<input type="hidden" name="puntos" class="form-control" required value="<?php echo $resultado; ?>">
</div>
<div class="form-group">
<textarea class="form-control" name="comment" rows="3" placeholder="Deje su aporte en esta clase y sumar&aacute; 5 puntos." required></textarea>
</div>
<button type="submit" class="btn btn-primary" name="submit" ><span class="parpadealento" style="color: black">Aportar</span></button>
<!--id="este"-->
<!--<p><span id="timer"></span></p>-->
</form>
</div>
      </div>
</div>
</div>
<?php include('includes/footer.php');?>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="vendor/jquery/jquery.min.js"></script>
<!--<script>
    $("#este").hide();
$("#este").delay(60000).show(600);
var count=60;
var counter=setInterval(timer, 1000);
function timer()
{
  count=count-1;
  if (count <= 0)
  {
     clearInterval(counter);
     $("#timer").hide();
  }
document.getElementById("timer").innerHTML=count + " segundos restantes para dejar un aporte.";
}
</script>-->
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!--<script src='https://github.com/Reflejo/jquery-countdown/blob/master/js/jquery.countdown.js'></script>-->
</body>
<?php //include 'includes/fb.php'; ?>
</html>