<?php	
	session_start();
	/*Inicia validacion del lado del servidor*/
	if (empty($_POST['fullname'])) {
           $errors[] = "Nombre vacío";
        }else if (empty($_POST['email'])){
			$errors[] = "Correo Vacio vacío";
		} else if (empty($_POST['password'])){
			$errors[] = "Contraseña vacío";
		} else if (
			!empty($_POST['fullname']) &&
			!empty($_POST['password'])
		){

		include "../config/config.php";//Contiene funcion que conecta a la base de datos


		$fullname=$_POST["fullname"];
		$password=sha1(md5($_POST["password"]));
		$phone=$_POST["phone"];
		$country=$_POST["country"];
		$email=$_POST["email"];
		$created_at = "NOW()";
		$is_admin=0;
		$default_profile="default.png";
		$sqls = "select * from user where (email= \"$email\")";
		$users = mysqli_query($con,$sqls);
		$count = mysqli_num_rows($users);
		$is_admin=0;
		if(isset($_POST["is_admin"])){$is_admin=1;}


		if ($count>0){
				$errors []= "El correo electrónico ya existe en nuestra base de datos";
			}else{

			$sql = "insert into user (fullname,email,is_admin,password,phone,country,image,created_at) ";
			$sql .= "value (\"$fullname\",\"$email\",\"$is_admin\",\"$password\",\"$phone\",\"$country\",\"$default_profile\",$created_at)";

			$query_new_insert = mysqli_query($con,$sql);
				if ($query_new_insert){
					//$messages[] = "El registro ha sido ingresado satisfactoriamente.";
					echo '<br>

					

<div class="container col-md-9 esteticacorp">

	<div style="padding:2em;text-align:center;">
  Usted se ha registrado satisfactoriamente. Para continuar acceda a nuestra plataforma <a href="login.php">haciendo clic aquí <span class="icon icon-key"></span></a> 
</div>
<br>


	<div class="row">





	<div class="col-md-4 ampliar" style="transition:all .5s ease-in-out; color: #666;">
<div style="border: 1px solid #c6c6c6; margin-bottom: 15%; background: #fff;">
	<a href="esteticacorporal.php">
		<img src="images/estetica_corporal-05.jpg" class="card-img-top" alt="cifes">
	</a>
  <div class="card-body">
    <h6 class="card-title"><b>1. Curso de Est&eacute;tica corporal</b></h6>
    <hr>
    <p>
   <a href="esteticacorporal.php">Entrar a clases <span class="icon icon-play3"></span></a>
  <a data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" style="float: right; color: #666;">
    Info del curso <span class="icon icon-ctrl"></span>
  </a>
</p>
<div class="collapse" id="collapseExample">
  <div class="card card-body">
    Aprenderás a realizar protocolos de tratamientos estéticos corporales en reducción y moldeamiento empleando técnicas de masajes, drenaje linfático, maderoterapia y aparatología Estética; practica técnicas anticelulíticas, reafirmantes, de tonificación y relajación en diversas partes del cuerpo con bioseguridad.
  </div>
</div>
  </div></div>  
</div>













	<div class="col-md-4 ampliar" style="transition:all .5s ease-in-out; color: #666;">
<div style="border: 1px solid #c6c6c6; margin-bottom: 15%; background: #fff;">
	<a href="#">
		<img src="images/estetica_corporal-07.jpg" class="card-img-top" alt="cifes">
	</a>
  <div class="card-body">
    <h6 class="card-title"><b>2. Curso de Est&eacute;tica facial</b></h6>
    <hr>
    <p>
   <a href="#">Entrar a clases <span class="icon icon-play3"></span></a>
  <a data-toggle="collapse" href="#collapseExample2" role="button" aria-expanded="false" aria-controls="collapseExample" style="float: right; color: #666;">
    Info del curso <span class="icon icon-ctrl"></span>
  </a>
</p>
<div class="collapse" id="collapseExample2">
  <div class="card card-body">
 
  </div>
</div>
  </div></div>  
</div>














	<div class="col-md-4 ampliar" style="transition:all .5s ease-in-out; color: #666;">
<div style="border: 1px solid #c6c6c6; margin-bottom: 15%; background: #fff;">
	<a href="#">
		<img src="images/estetica_corporal-08.jpg" class="card-img-top" alt="cifes">
	</a>
  <div class="card-body">
    <h6 class="card-title"><b>3. Curso técnicas de spa</b></h6>
    <hr>
    <p>
   <a href="#">Entrar a clases <span class="icon icon-play3"></span></a>
  <a data-toggle="collapse" href="#collapseExample3" role="button" aria-expanded="false" aria-controls="collapseExample" style="float: right; color: #666;">
    Info del curso <span class="icon icon-ctrl"></span>
  </a>
</p>
<div class="collapse" id="collapseExample3">
  <div class="card card-body">
 
  </div>
</div>
  </div></div>  
</div>
















	<div class="col-md-4 ampliar" style="transition:all .5s ease-in-out; color: #666;">
<div style="border: 1px solid #c6c6c6; margin-bottom: 15%; background: #fff;">
	<a href="#">
		<img src="images/ventas_y_negocios-10.jpg" class="card-img-top" alt="cifes">
	</a>
  <div class="card-body">
    <h6 class="card-title"><b>4. Curso de Ventas y Aceleración de Centros de Estética y Spa</b></h6>
    <hr>
    <p>
   <a href="#">Entrar a clases <span class="icon icon-play3"></span></a>
  <a data-toggle="collapse" href="#collapseExample4" role="button" aria-expanded="false" aria-controls="collapseExample" style="float: right; color: #666;">
    Info del curso <span class="icon icon-ctrl"></span>
  </a>
</p>
<div class="collapse" id="collapseExample4">
  <div class="card card-body">
 
  </div>
</div>
  </div></div>  
</div>









<br>
</div></div>';
				} else{
					$errors []= "Lo siento algo ha salido mal intenta nuevamente.".mysqli_error($con);
				}
			}	
			
		}else{
			$errors []= "Error desconocido.";
		}
		
		if (isset($errors)){
			
			?>
			<br>
			<div class="alert alert-danger container col-md-3" role="alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Error!</strong> 
					<?php
						foreach ($errors as $error) {
								echo $error;
							}
						?>
			</div>
			<?php
			}
			if (isset($messages)){
				
				?>
				<div class="alert alert-success" role="alert">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>¡Bien hecho!</strong>
						<?php
							foreach ($messages as $message) {
									echo $message;
								}
							?>
				</div>
				<?php
			}

?>