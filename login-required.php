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

<body class="hold-transition register-page">
    <?php include 'includes/header-logged.php';?>
<div class="container">
  <div class="alert alert-warning" role="alert" style="margin-top: 3%">
  Usted posee nuestro plan <strong><?php if ($status == 0) { echo "Gratuito"; }  if ($status == 1) { echo "Starter"; } if ($status == 2) { echo "Pass"; } if ($status == 3) { echo "Premium"; } if ($status == 4) { echo "Docente"; }  if ($status == 5) { echo "Administrador";  } ?>,</strong> Por lo tanto usted no tiene acceso a este contenido. Para continuar, le recomendamos que adquiera o haga cambio de plan. Ante cualquier duda usted puede comunicarse <a href=" https://api.whatsapp.com/send?phone=573503387057&text=Hola%20Liliana,%20tengo%20una%20inquietud..."> en este enlace</a>
</div>
</div>
<?php include 'includes/planes.php' ; //require_once 'includes/disqus.php';?>

    <!-- jQuery 2.2.3 -->
    <script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="plugins/iCheck/icheck.min.js"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
<script>
$(document).ready(function(){
    load(1);
});

$( "#add" ).submit(function( event ) {
  $('#save_data').attr("disabled", true);
  
 var parametros = $(this).serialize();
     $.ajax({
            type: "POST",
            url: "action/adduser.php",
            data: parametros,
             beforeSend: function(objeto){
                $("#result").html("Mensaje: Cargando...");
              },
            success: function(datos){
            $("#result").html(datos);
            $('#save_data').attr("disabled", false);
            load(1);
          }
    });
  event.preventDefault();
})
</script>
<?php include('includes/footer.php');?>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
