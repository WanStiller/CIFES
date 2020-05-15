<?php 
session_start();
include 'includes/config.php' ; ?>
<?php require_once 'includes/special.php'; ?>
<body>
<?php include 'includes/header.php';?>





<!--Fin de video Background -->
<!--<div class="container" style="margin-top: 30px;">-->
<div class="container" style="margin-top: 5%;">
<!--Video Background-->
<header style="background: #fff; -webkit-box-shadow: 0px 7px 32px -10px rgba(0,0,0,0.75);
-moz-box-shadow: 0px 7px 32px -10px rgba(0,0,0,0.75);
box-shadow: 0px 7px 32px -10px rgba(0,0,0,0.75);"> <!--Header background-->
<!--<div class="overlay"></div>
<video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
<source src="images/video.mp4" type="video/mp4">
</video>-->
<div><div><div>
<!--<div class="container h-100">
<div class="d-flex h-100 text-center align-items-center">
<div class="w-100 text-white">-->
<div class="row" style="color: #333;">

	<div class="col-md-6 d-none d-sm-none d-md-block" style="background: url(images/recurso.jpg) no-repeat ;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;">
	<!--<img src="images/doctora.png" style="width: 100%; height: auto;">-->
		<!--<img src="images/recurso.jpg" style="width: 100%;">-->
	</div>


<div class="col-md-6" style="text-align: left;">
<!--<h2><b style="color:#fff; ">CIFES ESCUELA</b></h2><br>-->


<div class="login-box" style="margin: 0%">
<!--<div class="login-logo">
<a href="#"><b>Clases </b>en L&iacute;nea</a>
</div>-->
<!-- /.login-logo -->
<div class="login-box-body" style="margin: 5%;padding-right: 5%">

	<p style="font-size: 1.5em; color: #0076aa;"><strong>La primera comunidad de est&eacute;tica y belleza</strong></p>


<hr>	Inscr&iacute;base en el siguiente formulario para pertenecer a la comunidad m&aacute;s grande de formaci&oacute;n en Est&eacute;tica Integral en Latinoamerica! <br>	<br>	
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

    <div class="register-box">
<div id="result"></div>        
        <!--<div class="register-logo">
            <a href="#"><b>Clases </b>en L&iacute;nea</a>
        </div>-->
        <div class="register-box-body">
            <form method="post" id="add" name="add">

                <div class="form-group has-feedback">
                <input type="text" name="fullname" class="form-control" placeholder="*Nombre y apellidos" required>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="email" name="email" class="form-control" placeholder="*Correo Electr&oacute;nico" required>
                        <small id="emailHelp" class="form-text text-muted">Nunca compartiremos su correo electrónico con nadie más.</small>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="number" name="phone" class="form-control" placeholder="*Tel&eacute;fono">
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
                    <input type="password" name="password" class="form-control" placeholder="*Contrase&ntilde;a" required id="password">
                    <label style="cursor: pointer;opacity: 0.6;margin-top:10px" onclick="mostrarContrasena()">Mostrar</label>
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
                        <button id="save_data" type="submit" class="btn btn-success btn-block btn-flat"><span class="icon icon-unlocked"></span> Registrarse</button>
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

// Mostrar Pass
  function mostrarContrasena(){
      var tipo = document.getElementById("password");
      if(tipo.type == "password"){
          tipo.type = "text";
      }else{
          tipo.type = "password";
      }
  }

// Mostrar Pass



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
<!--<p class="login-box-msg">Iniciar Sesion</p>-->
<!--<form action="action/login.php" method="post">
<div class="form-group has-feedback">
<input type="email" name="email" class="form-control" placeholder="Correo electrónico" required="true">
<span class="glyphicon glyphicon-envelope form-control-feedback"></span>

</div>
<div class="form-group has-feedback">
<input type="password" name="password" class="form-control" placeholder="Contraseña" required="true">
<span class="glyphicon glyphicon-lock form-control-feedback"></span>
</div>
<div class="row">
<div class="col-xs-8">
<div class="checkbox icheck">
<label>
<input type="checkbox"> Recordar mi contraseña
</label>
</div>
</div>
<div style="text-align: center; margin-left: 2%;margin-bottom: 0.5em;">
<button type="submit" class="btn btn-primary">Iniciar Sesi&oacute;n</button>
</div>
<br>
</div>
</form>-->
<!--<a href="#">Se te olvido la contraseña?</a><br>-->
<br>
Ya tienes cuenta?
<a href="#" class="text-center" style="font-size: 1.1em; color: #00a8b8" data-toggle="modal" data-target="#exampleModalCenter">Clic aqu&iacute; para ACCEDER</a>
<?php //require 'includes/estadisticas.php';?>


<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-bottom: 10px;">
          <span aria-hidden="true">&times;</span>
        </button>
        <img src="images/screenshot01.jpg" style="width: 100%; height: auto;margin-bottom: 15px;">
        <!--<h5>Acceder</h5>-->
        <form action="action/login.php" method="post">
<div class="form-group has-feedback">
<input type="email" name="email" class="form-control" placeholder="Correo electrónico" required="true">
<span class="glyphicon glyphicon-envelope form-control-feedback"></span>

</div>
<div class="form-group has-feedback">
<input type="password" name="password" class="form-control" placeholder="Contraseña" required="true">

<span class="glyphicon glyphicon-lock form-control-feedback"></span>
</div>
<div class="row">
<div style="margin-left:3%;margin-bottom: 0.5em;">
<button type="submit" class="btn btn-primary">Iniciar Sesi&oacute;n</button>
</div>
<br>
</div>
</form>
      </div>
    </div>
  </div>
</div>


<!---->
<!--<p><a href="#showForm" data-toggle="collapse" aria-expanded="false" aria-controls="collapse">Olvid&oacute; su contrase&ntilde;a?</a></p>	
<div class="collapse" id="showForm">
	<div class='well'>
		<form action="password-recovery.php" method="post">
			<div class="form-group">										
				<input type="email" class="form-control" name="email" placeholder="Ingrese su direcci&oacute;n de correo electr&oacute;nico." required>
			</div>
			<button type="submit" class="btn btn-success">Recuperar Contrase&ntilde;a</button>
		</form>								
	</div>
</div>-->
<!---->
</div><!-- /.login-box-body -->
</div><!-- /.login-box -->
<!--<p style="color: #333; font-size: 1.5em;">Estamos formando la plataforma online con mayor <br>número de cursos, eventos, recursos y alianzas <br>comerciales en estética y belleza. </p>-->
<br>
</div>

</div>
<!--<h1 class="display-3">Video Header</h1>
<p class="lead mb-0"></p>-->
</div>
</div>
</div>
</header>
<!--<img src="images/iphone.png" style="z-index: 10000;position: relative;width: 100%; max-width: 300px;margin-top: -137px; margin-right: 10%; float: right;">-->

</div>
<?php include('includes/footer.php');?>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
</body>
</html>