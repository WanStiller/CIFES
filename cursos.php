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
    $ultimaClaseId = $row['ultimaClaseId'];
    $ultimaClaseTi = $row['ultimaClaseTi'];
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
    <div class="row" style="padding-left:15px;padding-right: 15px">
        <!--<div class="col-md-12" style="background: rgba(6,129,151,1);
background: -moz-linear-gradient(left, rgba(6,129,151,1) 0%, rgba(242,250,255,1) 100%);
background: -webkit-gradient(left top, right top, color-stop(0%, rgba(6,129,151,1)), color-stop(100%, rgba(242,250,255,1)));
background: -webkit-linear-gradient(left, rgba(6,129,151,1) 0%, rgba(242,250,255,1) 100%);
background: -o-linear-gradient(left, rgba(6,129,151,1) 0%, rgba(242,250,255,1) 100%);
background: -ms-linear-gradient(left, rgba(6,129,151,1) 0%, rgba(242,250,255,1) 100%);
background: linear-gradient(to right, rgba(6,129,151,1) 0%, rgba(242,250,255,1) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#068197', endColorstr='#f2faff', GradientType=1 );margin-bottom: 15px;padding-left: 0px;padding-right: 0px;">
    <div style="background:#e1f7f8;text-align: left;padding: 5px;color: #007e94;border-top: 10px solid #00a8b8;"><img src="images/mbricursorclick_99567.png" style="width: 30px;height: auto;margin-right: 15px;margin-top: -20px;"><span style="font-size: 2em;">Programas</span></div>
    <div style="color: white;padding: 10px;">
<h5>Bienvenida/o a <b>Cifes virtual, </b> <span><b><?php echo $fullname; ?></b></span>.</h5>
<a href="profile.php">
<div class="d-none d-sm-none d-md-block" style="background-image: url(images/profiles/<?php echo $profile_pic ?>);width: 100px;height: 100px;border-radius: 50%; background-position: 50% 50%; background-size: cover;margin-top:-98px;float: right; position: relative;border:5px solid #ffb21c;">
</div>
</a>
    </div>
    </div>-->
    </div>
</div>



<div class="container">
    

    
    


    


    <?php
    $query=mysqli_query($con,"SELECT * from tblcategory");
    while ($row=mysqli_fetch_array($query)) {
        $name = $row['CategoryName'];
        $cid = $row['id'];
        $img = $row['Image'];
        ?>
<!--<h1><?php //echo htmlentities($row['category']);?> <br><br></h1>-->
<div class="row" style="border: 1px solid #ddd;padding-top: 15px;margin-bottom: 30px;margin-left: 0px;margin-right: 0px;padding-bottom: 15px;">
<div class="col-md-5" style="transition:all .5s ease-in-out;">
    <!--<div class="card" style="text-align: center; border-radius: 0!important;background-image: url(images/6768830-abstract-background-images.jpg); background-position: 50% 50%; background-size: cover;">-->
        <?php echo ($img);?>
        </div>
<div class="col-md-7">


    <!--<div style="background:#e1f7f8;text-align: left;padding: 5px;color: #007e94;border-top: 10px solid #00a8b8;"><img src="images/mbricursorclick_99567.png" style="width: 20px;height: auto;margin-right: 10px;margin-top: -5px;">Programa</div>-->
    <div style="text-transform: uppercase; color: #00AABA;font-size: 1.5em;">
        <strong>Programa de <?php echo htmlentities($row['CategoryName']);?></strong>
    </div>


    <div>
    <p>
    <?php echo ($row['Description']);?>
    </p>
    </div>
<!--<br>
<a href="category.php?subCategoria=<?php echo htmlentities($row['id'])?>" class="btn btn-primary" style="width: 100%"><?php //echo htmlentities($name);?>Ver Cursos</a>-->
</div>
    
<br>

</div>
<?php
    }
?>
<?php //include('includes/sidebar.php');?>

</div>
<?php include('includes/footer.php');?>
<script src="vendor/jquery/jquery.min.js"></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script>
    $('#overlay').modal('show');

setTimeout(function() {
    $('#overlay').modal('hide');
}, 50000);
</script>
</body>
<?php include 'includes/fb.php'; ?>
</html>