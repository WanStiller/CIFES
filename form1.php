<?php 
session_start();
include "includes/config.php";
if(!isset($_SESSION["user_id"]) || $_SESSION["user_id"]==null){
header("location: login-required.php");
}
//Si el status de la sesión es mayor a 1, el contenido premium se muestra.  
$my_user_id=$_SESSION['user_id'];
$query=mysqli_query($con,"SELECT * from user where id=$my_user_id");
while ($row=mysqli_fetch_array($query)) {
$status = $row['status'];
if ($status<0) {
header("location: login-required.php");
}
}        
$my_user_id=$_SESSION['user_id'];
$query=mysqli_query($con,"SELECT * from user where id=$my_user_id");
while ($row=mysqli_fetch_array($query)) {
$fullname = $row['fullname'];
$email = $row['email'];
$profile_pic = $row['image'];
$created_at = $row['created_at'];
$status = $row['status'];
}
/**/
?>
<?php require_once 'includes/special.php'; ?>
<body style="background: white">
<div class="container-fluid">
<div class="row">
<div class="col-md-4"></div>
<form class="col-md-4" name="formulario" id="formulario" method="post" action="form1enviado.php" enctype="multipart/form-data">
<div class="form-group">
<!--<label for="exampleInputEmail1">Ingrese su nombre</label>-->
<input type="hidden" class="form-control" name='Nombre' id='Nombre' placeholder="Ingrese su email" value="<?php print $fullname ;?>" required>
</div>
<div class="form-group">
<!--<label for="exampleInputEmail1">Su correo</label>-->
<input type="hidden" class="form-control" name='E-mail' id='E-mail' placeholder="Ingrese su email" value="<?php print $email ;?>" required>
<small id="emailHelp" class="form-text text-muted">Nunca compartiremos su correo electrónico con nadie más.</small>
</div>
<div class="form-group">
<!--<label for="exampleInputEmail1">Asunto</label>-->
<input type="hidden" class="form-control" name="mensaje" id="mensaje" value="Evidencia Práctica No.1 Anatomía y Aplicaciones del Análisis Facial" required>
</div>
<div class="form-group">
<!--<label for="exampleFormControlFile1"></label>-->
<input type="file" class="form-control-file" name='archivo1' id='archivo1' required>
</div>
<br>
<button type="submit" class="btn btn-primary">Enviar archivo **</button>
<small id="emailHelp" class="form-text text-muted">Su archivo sólo será visible por nuestro comité evaluador.</small>
</form>
<div class="col-md-4"></div>
</div>
</div>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>