<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Registro</title>
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
        
    <div class="register-box">
<div id="result"></div>        
        <!--<div class="register-logo">
            <a href="#"><b>Clases </b>en L&iacute;nea</a>
        </div>-->
        <div class="register-box-body">
            <div style="text-align: center;"><img src="images/logocode2.png" style="width: 100%; padding: 0%; max-width: 200px; margin-bottom: 2em;"></div>
            <!--<p class="login-box-msg">Nuevo Usuario</p>-->
            <div>Inscr&iacute;base en el siguiente formulario para pertenecer a la comunidad m&aacute;s grande de formaci&oacute;n en Est&eacute;tica Integral en Latinoamerica!<br><br></div>
            <form method="post" id="add" name="add">

                <div class="form-group has-feedback">
                <input type="text" name="fullname" class="form-control" placeholder="Nombre y apellidos" required>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="email" name="email" class="form-control" placeholder="Correo Electr&oacute;nico" required>
                        <small id="emailHelp" class="form-text text-muted">Nunca compartiremos su correo electrónico con nadie más.</small>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="number" name="phone" class="form-control" placeholder="Tel&eacute;fono">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <?php

require_once('geoplugin.class.php');

$geoplugin = new geoPlugin();

$geoplugin->locate();

/*echo "Su IP  {$geoplugin->ip}: <br />\n".
    "Ciudad: {$geoplugin->city} <br />\n".
    "Region: {$geoplugin->region} <br />\n".
    "Region Codigo: {$geoplugin->regionCode} <br />\n".
    "Region Nombre: {$geoplugin->regionName} <br />\n".
    "DMA Codigo: {$geoplugin->dmaCode} <br />\n".
    "Pais: {$geoplugin->countryName} <br />\n".
    "Codigo Pais: {$geoplugin->countryCode} <br />\n".
    "In the EU?: {$geoplugin->inEU} <br />\n".
    "EU VAT Rate: {$geoplugin->euVATrate} <br />\n".
    "Latitud: {$geoplugin->latitude} <br />\n".
    "Longitud: {$geoplugin->longitude} <br />\n".
    "Radio de exactitud (En Millas): {$geoplugin->locationAccuracyRadius} <br />\n".
    "Zona Horaria: {$geoplugin->timezone} <br />\n".
    "Moneda: {$geoplugin->currencyCode} <br />\n".
    "Simbolo de la moneda: {$geoplugin->currencySymbol} <br />\n".
    "Cambio al Dolar: {$geoplugin->currencyConverter} <br />\n";*/

?>
                
                <div class="form-group has-feedback">
                    <input type="password" name="password" class="form-control" placeholder="Contrase&ntilde;a" required>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <!--<span style="color: #A8A8A8; font-size: 0.8em;">Geolocalizaci&oacute;n *</span>-->
                <div class="form-group has-feedback">
                    <!--<span>Geolocalizaci&oacute;n:</span>-->
                    <input type="hidden" name="country" class="form-control" value="<?php echo $geoplugin->countryName ;?>" required>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <!--Fin Geolocalizacion-->
                <p class="text-muted text-right">Campos obligatorios* </p>
                <div class="row">
                    <div class="col-xs-8">
                        <!--<div class="checkbox icheck" style="margin-left: 1em">
                            <label>
                                <input type="checkbox" required  data-toggle="modal" data-target="#exampleModalLong"> <span style="font-size: 0.8em;"> Acepto los </span><a href="#"  data-toggle="modal" data-target="#exampleModalLong">T&eacute;rminos y condiciones</a>
                            </label>
                        </div>-->
                    </div><!-- /.col -->
                        <div class="col-xs-12" style="text-align: center; margin-left: 1em; margin-bottom: 1em; ">
                        <button id="save_data" type="submit" class="btn btn-primary btn-block btn-flat" style="margin-top: 1em;"><span class="icon icon-unlocked"></span> Registrarse</button>
                    </div><!-- /.col -->
                </div>
            </form>




<?php include 'includes/modalterminos.php' ;?>

            <!--<a href="index.php" class="text-center">Iniciar Session</a>-->

        </div><!-- /.form-box -->

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
