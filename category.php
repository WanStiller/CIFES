<?php 
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
    $count_files = mysqli_query($con, "select * from file");
    $count_download = mysqli_query($con, "select sum(download) as download from file");
    $count_user=mysqli_query($con, "select * from user");
    $count_comments=mysqli_query($con, "select * from comment")
?>
<?php require_once 'includes/special.php'; ?>
<body>
<?php include('includes/header-logged.php');?>


<!--
<a href="subcategory.php?catid=1">
<img src="images/fundamentosesteticafacial.jpg" 
    onmouseover="this.src='images/fundamentos-de-estica-facial-par.jpg'"
onmouseout="this.src='images/fundamentosesteticafacial.jpg'" style="width: 100%;height: auto;"></a>
-->

<div class="container">
    <div class="row" style="padding-left:15px;padding-right: 15px">
        <div class="col-md-12" style="background: rgba(6,129,151,1);
background: -moz-linear-gradient(left, rgba(6,129,151,1) 0%, rgba(242,250,255,1) 100%);
background: -webkit-gradient(left top, right top, color-stop(0%, rgba(6,129,151,1)), color-stop(100%, rgba(242,250,255,1)));
background: -webkit-linear-gradient(left, rgba(6,129,151,1) 0%, rgba(242,250,255,1) 100%);
background: -o-linear-gradient(left, rgba(6,129,151,1) 0%, rgba(242,250,255,1) 100%);
background: -ms-linear-gradient(left, rgba(6,129,151,1) 0%, rgba(242,250,255,1) 100%);
background: linear-gradient(to right, rgba(6,129,151,1) 0%, rgba(242,250,255,1) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#068197', endColorstr='#f2faff', GradientType=1 );margin-bottom: 15px;padding-left: 0px;padding-right: 0px;">
    <div style="background:#e1f7f8;text-align: left;padding: 5px;color: #007e94;border-top: 10px solid #00a8b8;"><img src="images/mbricursorclick_99567.png" style="width: 30px;height: auto;margin-right: 15px;margin-top: -20px;"><span style="font-size: 2em;">
        Programa de <?php
    if($_GET['subCategoria']!=''){
    $_SESSION['subCategoria']=intval($_GET['subCategoria']);
    }
    $query=mysqli_query($con,"SELECT * from tblcategory WHERE id='".$_SESSION['subCategoria']."'");
    while ($row=mysqli_fetch_array($query)) {
    $CategoryName = $row['CategoryName'];
    $Presentacion = $row['Presentacion'];
    echo $CategoryName."</br>";
    }
    ?>
    </span></div>
    <div style="color: white;padding: 5px;">
        <!--<h3>Lorem Ipsum Dolor Sit</h3>-->
    <!--<h5>Variable curso <?php echo $_SESSION['subCategoria'] ;?></h5>-->
    </div>
    </div>
    
    <div class="alert alert-warning col-md-12" role="alert" style="padding-left:45px;padding-right: 45px;margin-top:15px"><span style="font-size:1.3em"></span>
    Para una comprensi&oacute;n exitosa de los contenidos, es importante seguir el orden establecido. Con la culminaci&oacute;n de cada curso, se desbloquea el siguiente. A continuaci&oacute;n seleccione un curso de nuestro programa de <b>
        <?php
    if($_GET['subCategoria']!=''){
    $_SESSION['subCategoria']=intval($_GET['subCategoria']);
    }
    $query=mysqli_query($con,"SELECT * from tblcategory WHERE id='".$_SESSION['subCategoria']."'");
    while ($row=mysqli_fetch_array($query)) {
    $CategoryName = $row['CategoryName'];
    echo $CategoryName."</br>";
    }
    ?>
    </b>
    </div>

    </div>

    <br>

    <nav>
  <div class="nav nav-pills mb-3" id="nav-tab" role="tablist">

    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Presentaci&oacute;n</a>

    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Temario</a>
    
    <!--<a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Contact</a>-->
  </div>
</nav>

	

</div>



<div class="container tab-content" id="nav-tabContent">


<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab"><?php echo ($Presentacion);?></div>

<div class="tab-pane fade show active" style="margin-top: 40px" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">




	      <?php
    //Datos get traidos de cursos.php | Variable de tipo GET
    if($_GET['subCategoria']!=''){
     $_SESSION['subCategoria']=intval($_GET['subCategoria']);
     //echo $_SESSION['subCategoria'];
    }
    $query=mysqli_query($con,"SELECT * from tblsubcategory WHERE CategoryId='".$_SESSION['subCategoria']."'");
    while ($row=mysqli_fetch_array($query)) {
        $name = $row['CategoryId'];
        $cid = $row['CategoryId'];
        $img = $row['Image'];
        ?>
<!--<h1><?php //echo htmlentities($row['category']);?> <br><br></h1>-->
<div class="row" style="border: 1px solid #ddd;padding: 15px;margin-bottom: 30px;margin-left: 0px;margin-right: 0px;">
    <div style="transition:all .4s ease-in-out;margin-bottom: 15px;margin-top: 15px;" class="iluminar col-md-5"><?php echo ($img);?></div>
<div class="col-md-7" style="position: initial;">
            
            <!--<div style="background: red"><img src="images/maxresdefault1.jpg" style="width: 100%;height: auto;"></div>-->
  <!--<div class="card mb-4" style="text-align: center; border-radius: 0!important;padding:5%;background-image: url(images/soft-white-backgrounds-wallpapers.jpg); background-position: 50% 50%; background-size: cover;">-->
<div>
<div>

    <!--<div style="background:#e1f7f8;text-align: left;padding: 5px;color: #007e94;border-top: 10px solid #00a8b8;"><img src="images/mbricursorclick_99567.png" style="width: 20px;height: auto;margin-right: 10px;margin-top: -5px;">Curso</div>-->
    <div>
        <span><?php print ($row['Subcategory']);?></span>
    </div>
</div>
    <div>
    <p>
    <?php echo ($row['SubCatDescription']);?></p>
    </div>
<!--<a href="subcategory.php?catid=<?php echo htmlentities($row['SubCategoryId'])?>" class="btn btn-primary" style="width: 100%;"><?php //echo htmlentities($name);?>Ingresar al Curso</a>--></div>
</div>

</div>
<?php
    }
?>
	

    
    

<?php //include('includes/sidebar.php');?>
</div>



  <!--<div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">...</div>-->
</div>
<?php include('includes/footer.php');?>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
<?php include 'includes/fb.php'; ?>
</html>