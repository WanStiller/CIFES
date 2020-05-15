<?php

session_start();

	if (empty($_POST['email'])) {
           echo  "<script>alert(\"Correo electrónico invalido\"); window.location=\"../home.php\"</script>";
        } else if (empty($_POST['password'])){
			echo  "<script>alert(\"Contraseña invalida\"); window.location=\"../home.php\"</script>";
		} else if (
			!empty($_POST['email'])  &&
			!empty($_POST['password'])
		){
			

		include_once "../config/config.php";


		$email=mysqli_real_escape_string($con,(strip_tags($_POST["email"],ENT_QUOTES)));
		$password=sha1(md5(mysqli_real_escape_string($con,(strip_tags($_POST["password"],ENT_QUOTES)))));

		$sql = "SELECT * FROM user WHERE email = '" . $email . "' AND password = '" . $password . "';";
		//$sql = "SELECT * FROM user_starter WHERE starter_email = '" . $email . "' AND starter_password = '" . $password . "';";

            $query = mysqli_query($con,$sql);
			$numrows = mysqli_num_rows($query);

		
		if ($row = mysqli_fetch_array($query)) 
		{
			if ($row['is_active']>0) {

					$_SESSION['user_id'] = $row['id'];

					print "Cargando ... $email";
					print "<script>window.location='../index-logged.php';</script>";
				
			}else{
				$error=sha1(md5("cuenta inactiva"));
				header("location: ../home.php?error=$error");
			}
		}else{
			$invalid=sha1(md5("contrasena y email invalido"));
			header("location: ../home.php?invalid=$invalid");
		}

	}
?>