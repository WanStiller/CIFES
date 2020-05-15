<?php //require 'cursos.php'; ?>


<?php
    // Tomamos los datos de la tabla de categorias
    session_start();
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
    } 
    /*$count_files = mysqli_query($con, "select * from file");
    $count_download = mysqli_query($con, "select sum(download) as download from file");
    $count_user=mysqli_query($con, "select * from user");
    $count_comments=mysqli_query($con, "select * from comment")*/
?>




<?php require_once 'includes/special.php'; ?>
<body>
<?php include('includes/header-logged.php');?>
<div class="container">
<br>
<?php 
$pagetype='aboutus';
$query=mysqli_query($con,"select PageTitle,Description from tblpages where PageName='$pagetype'");
while($row=mysqli_fetch_array($query))
{
?>
<h1 class="mt-4 mb-3"><?php echo htmlentities($row['PageTitle'])?>
</h1>
<!--<ol class="breadcrumb">
<li class="breadcrumb-item">
<a href="index.php">Portada</a>
</li>
<li class="breadcrumb-item active">Nosotros</li>
</ol>-->
<div class="row">
<div class="col-lg-12">
<p><?php echo $row['Description'];?></p>
</div>
</div>
<?php } ?>
</div>
<?php include('includes/footer.php');?>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
<?php include 'includes/fb.php'; ?>
</html>
