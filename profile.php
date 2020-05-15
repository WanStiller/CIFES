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
        $contenido = $row['ContenidoAsignado'];
        $aviso = $row['avisoUsuario'];

        $ultimaClaseId = $row['ultimaClaseId'];
        $ultimaClaseTi = $row['ultimaClaseTi'];

    } 
?>
<?php require_once 'includes/special.php'; ?>
<body>
<?php include 'includes/header-logged.php';?>
<!--Fin de video Background -->
<div class="container">
<!--<div class="container-fluid" style="margin-top: 30px; max-width: 1680px;">-->




    <?php echo $aviso;?>

    <a href="pvt-news-details.php?nid=<?php echo $ultimaClaseId;?>" style="margin-left: -15px;font-size: 1em;margin-bottom: 15px">IR A MI &Uacute;LTIMA CLASE VISTA</a>
                    <br>
                    <br>

            <div class="row">
                <div class="col-md-9" style="margin-bottom: 20px">

                    
                    <?php echo $contenido ?>
                </div>
                <div class="col-md-3" style="margin-top: -20px">
                    <br>
                       <div style="background-image: url(images/profiles/<?php echo $profile_pic ?>);width: 100%;height: 120px; background-position: 50% 50%; background-size: cover; margin-bottom: 1em;text-align: right;float: right; position: initial; margin-right: 0px;"><img data-toggle="modal" data-target="#exampleModalCenter" src="images/profiles/lupa.png" style="width: 100%; height: auto; max-width: 100px; margin-bottom: -150px;margin-right: -10px;cursor: pointer;"></div>
                    <div>
                    <div class="image view view-first">
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

                    <br>
                </div>
                <!-- <div id="result"></div> -->
                    <div class="box box-primary"><!-- general form elements -->                
                            <div class="box-body">
                                <div class="form-group">
                                    <br>
                                    <br>
                                    <!--<label for="fullname">Nombre de usuario</label>-->
                                    <?php echo $fullname ?>
                                </div>
                                
                            </div><!-- /.box-body -->
                            <div class="box-footer">
                                    <a href="edit_profile.php">Editar mi perfil</a>
                                    <br>
                                    <a href="action/logout.php">Cerrar Sesi&oacute;n</a>
                                <br>
                                <br>
                                <!--<button><a href="action/logout.php"><button class="btn btn-primary">Cerrar Sesi&oacute;n</button></a>-->

                            </div>
                        
                    </div><!-- /.box -->
                </div>
           
  </div>
</div>



<br>
<br>


<?php include('includes/footer.php');?>

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
</html>