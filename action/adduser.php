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
					if (empty($_POST['email'])) {
           echo  "<script>alert(\"Correo electrónico invalido\"); window.location=\"../home.php\"</script>";
        } else if (empty($_POST['password'])){
			echo  "<script>alert(\"Contraseña invalida\"); window.location=\"../home.php\"</script>";
		} else if (
			!empty($_POST['email'])  &&
			!empty($_POST['password'])
		){


		$email=mysqli_real_escape_string($con,(strip_tags($_POST["email"],ENT_QUOTES)));
		$password=sha1(md5(mysqli_real_escape_string($con,(strip_tags($_POST["password"],ENT_QUOTES)))));

		$sql = "SELECT * FROM user WHERE email = '" . $email . "' AND password = '" . $password . "';";

            $query = mysqli_query($con,$sql);
			$numrows = mysqli_num_rows($query);

		
		if ($row = mysqli_fetch_array($query)) 
		{
			if ($row['is_active']>0) {

					$_SESSION['user_id'] = $row['id'];

					print "Cargando ... $email";
					print "<script>window.location='index-loggedfb.php';</script>";
				
			}else{
				$error=sha1(md5("cuenta inactiva"));
				header("location: ../home.php?error=$error");
			}
		}else{
			$invalid=sha1(md5("contrasena y email invalido"));
			header("location: home.php?invalid=$invalid");
		}

	} else{
					$errors []= "Lo siento algo ha salido mal intenta nuevamente.".mysqli_error($con);
				}
			}	
			
		}else{
			$errors []= "Error desconocido.";
		}
		
		if (isset($errors)){
			
			?>
			<div class="alert alert-danger" role="alert">
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







