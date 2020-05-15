<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Iniciar Sesi&oacute;n</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <!--<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">-->
    <!-- Font Awesome -->
    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">-->
    <!-- Ionicons -->
    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">-->
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="css/modern-business.css" rel="stylesheet">
<link rel="shortcut icon" href="images/favicon.png">
<link rel="stylesheet" type="text/css" href="fonts/demo-files/demo.css">
<meta property="og:image" content="images/preview.png" />


</head>
<body class="hold-transition register-page">
    <?php include 'includes/header.php';?>


<div class="login-box">

<!-- /.login-logo -->
<div class="login-box-body">
            <div style="text-align: center;"><img src="images/logocode2.png" style="width: 100%; padding: 0%; max-width: 200px; margin-bottom: 2em;"></div>
    <div class="login-logo">
</div>

    <?php 
$invalid=sha1(md5("contrasena y email invalido"));
if (isset($_GET['invalid']) && $_GET['invalid']==$invalid) {
echo "<div class='alert alert-danger alert-dismissible' role='alert'>
<strong>Error!</strong> Contraseña o correo Electrónico invalido
</div>";
}
$error=sha1(md5("cuenta inactiva"));
if (isset($_GET['error']) && $_GET['error']==$error) {
echo "<div class='alert alert-warning alert-dismissible' role='alert'>
<strong>Error!</strong> Cuenta inactiva!
</div>";
}
?>
<!--<p class="login-box-msg">Iniciar Sesion</p>-->
<form action="action/login.php" method="post">
<div class="form-group has-feedback">
<input type="text" name="email" class="form-control" placeholder="Correo electrónico" required="true">
<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
</div>
<div class="form-group has-feedback">
<input type="password" name="password" class="form-control" placeholder="Contraseña" required="true">
<span class="glyphicon glyphicon-lock form-control-feedback"></span>
</div>
<div class="row">
<div class="col-xs-8">
<!--<div class="checkbox icheck">
<label>
<input type="checkbox"> Recordar mi contraseña
</label>
</div>-->
</div><!-- /.col -->
<div style="text-align: center; margin-left: 4%;margin-bottom: 0.5em;">
<button type="submit" class="btn btn-primary">Iniciar Sesion</button>
</div><!-- /.col -->
<br>
</div>
</form>
<!--<a href="#">Se te olvido la contraseña?</a><br>-->
<a href="register.php" class="text-center"><br>Usted a&uacute;n no tiene cuenta? Clic aqu&iacute; para inscribirse.</a>
</div><!-- /.login-box-body -->
</div><!-- /.login-box -->


    </div><!-- /.register-box -->



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
<div style="opacity:0"><?php include('includes/footer.php');?></div>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
