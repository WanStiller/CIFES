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
        $phone = $row['phone'];
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
<?php include 'includes/header-logged.php';?>
<!--Fin de video Background -->
<div class="container-fluid" style="margin-top: 30px; max-width: 1440px;">
<!--<div class="container-fluid" style="margin-top: 30px; max-width: 1680px;">-->

<div>

<section class="container-fluid"><!-- Main content -->

            <div class="row"><!-- .row -->
                <!--<div class="col-md-4">
                    <div class="image view view-first">
                        <img class="thumb-image" style="width: 100%; display: block;" src="images/profiles/<?php echo $profile_pic ?>" alt="image">
                    </div>
                        <span class="btn btn-my-button btn-file" style="width: 500px; margin-top: 5px;">
                            <form method="post" id="formulario" enctype="multipart/form-data">
                            Cambiar Imagen de perfil: <input type="file" name="file">
                            </form>
                        </span>
                        <div id="respuesta"></div>
                    <br>
                </div> -->
                <!--<div class="col-md-2"></div>-->
                <!--<div class="col-md-6"></div>-->
                <div class="col-md-3"></div>
                <div class="col-md-6">
                       <div style="background-image: url(images/profiles/<?php echo $profile_pic ?>);width: 100%;height: 300px; background-position: 50% 50%; background-size: cover; margin-bottom: 1em;text-align: right;float: right; position: initial; margin-right: 0px;"><img data-toggle="modal" data-target="#exampleModalCenter" src="images/profiles/lupa.png" style="width: 100%; height: auto; max-width: 200px; margin-bottom: -450px;margin-right: -5%;cursor: pointer;"></div>
                    <div>
                    <div class="image view view-first">
                        <!--<div style="background-image: url(images/profiles/<?php echo $profile_pic ?>);width: 200px;height: 200px;border-radius: 50%; background-position: 50% 50%; background-size: cover; margin-bottom: 3em; cursor: pointer;text-align: center;" data-toggle="modal" data-target="#exampleModalCenter">
                            <img src="images/profiles/lupa.png" style="width: 100%;height: auto;">
                        </div>-->
                        <!--<img class="thumb-image" style="width: 100px; height: auto; display: block; cursor: pointer;" src="images/profiles/<?php echo $profile_pic ?>" alt="image" data-toggle="modal" data-target="#exampleModalCenter">-->
                        <!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"><?php echo $fullname ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <img style="width: 100%; height: auto; display: block;" src="images/profiles/<?php echo $profile_pic ?>" alt="image">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
                    </div>
                        <span class="btn btn-my-button btn-file" style="text-align: left;font-size: 0.9em">
                            <form method="post" id="formulario" enctype="multipart/form-data">
                            Cambiar Imagen de perfil:
                            <hr>
                            <input type="file" name="file" class="file">

                            </form>
                        </span>
                        <div id="respuesta"></div>
                    <br>
                </div>
                <!-- <div id="result"></div> -->
                    <div class="box box-primary"><!-- general form elements -->
                        <div class="box-header with-border">
                            <h3 class="box-title">Datos Personales: </h3>
                        </div> <!-- /.box-header -->
                        <form role="form" method="post" action="action/updprofile2.php"><!-- form start -->
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="fullname">Nombre Completo</label>
                                    <input name="fullname" type="text" class="form-control" id="fullname" value="<?php echo $fullname ?>">
                                </div>
                                <div class="form-group">
                                    <label for="email">Correo Electr&oacute;nico</label>
                                    <input name="email" type="email" class="form-control" id="email" value="<?php echo $email ?>">
                                </div>
                                <div class="form-group">
                                    <label for="phone">Tel&eacute;fono</label>
                                    <input name="phone" type="number" class="form-control" id="phone" value="<?php echo $phone ?>">
                                </div>
                                <div class="form-group">
                                    <label for="password">Cambiar Contrase&ntilde;a</label>
                                    <input name="password" type="password" class="form-control" id="password" placeholder="*******" required>

                                    <span onclick="mostrarContrasena()" style="cursor: pointer;margin-top: 10px;opacity: 0.7">Mostrar Contraseña</span>
                                </div>
                                <!--<div class="form-group">
                                    <label for="new_password">Nueva Contrase&ntilde;a</label>
                                    <input name="new_password" type="password" class="form-control" placeholder="*******" id="new_password">
                                </div>
                                <div class="form-group">
                                    <label for="confirm_new_password">Confirmar Nueva Contrase&ntilde;a</label>
                                    <input name="confirm_new_password" type="password" class="form-control" placeholder="*******" id="confirm_new_password">
                                </div>-->
                            </div><!-- /.box-body -->
                            <div class="box-footer">
                                <button name="token" type="submit" class="btn btn-success">Actualizar Datos</button>
                                <a href="action/logout.php"><span class="btn btn-primary">Cerrar Sesi&oacute;n</span></a>

                            </div>
                        </form>
                    </div><!-- /.box -->
                </div>
                <div class="col-md-3"></div>
            </div><!-- /.row -->
        </section>

    <?php //include('includes/sidebar-3.php');?>
  </div>
</div>



<br>
<br>


<?php include('includes/footer.php');?>

<script>
  function mostrarContrasena(){
      var tipo = document.getElementById("password");
      if(tipo.type == "password"){
          tipo.type = "text";
      }else{
          tipo.type = "password";
      }
  }
</script>



<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script>
    $(function(){
    $("input[name='file']").on("change", function(){
        var formData = new FormData($("#formulario")[0]);
        var ruta = "action/uploadprofile.php";
        $.ajax({
            url: ruta,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(datos)
            {
                $("#respuesta").html(datos);
            }
        });
    });
    });
</script>
</body>
<?php //include 'includes/fb.php'; ?>
</html>