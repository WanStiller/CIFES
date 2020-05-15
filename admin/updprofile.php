<?php
	include "../config/config.php";
	$id = $_SESSION['user_id'];
	$fullname = $_POST['fullname'];
	$email = $_POST['email'];
	if(isset($_POST['token'])){
		$update=mysqli_query($con,"UPDATE user set fullname=\"$fullname\", email=\"$email\" where id=$id");
		if ($update) {
            print "Datos Actualizados.";
            print "<script>window.location='../profile.php';</script>";
	   	}else{
	   		// echo "error".mysqli_error($con);
	   	}
	   	// CHANGE PASSWORD
		if($_POST['password']!=""){
			$password = sha1(md5($_POST['password']));
			$new_password = sha1(md5($_POST['new_password']));
			$confirm_new_password = sha1(md5($_POST['confirm_new_password']));	
			if($_POST['new_password']==$_POST['confirm_new_password']){
				$sql = mysqli_query($con,"SELECT * from user where id=$id");
				while ($row = mysqli_fetch_array($sql)) {
			    	$p = $row['password'];
				}
				if ($p==$password){ //comprobamos que la contrase«Ða sea igual a la anterior
					$update_passwd=mysqli_query($con,"UPDATE user set password=\"$password\" where id=$id");
					if ($update_passwd) {
						$success_pass=sha1(md5("contrase«Ða actualizada"));
            			header("location: ../profile.php?success_pass=$success_pass");
					}
				}else{
					$invalid=sha1(md5("la contrasena no coincide la contrase«Ða con la anterior"));
            		header("location: ../profile.php?invalid=$invalid");
				}
			}else{
				$error=sha1(md5("las nuevas  contrase«Ðas no coinciden"));
            	header("location: ../profile.php?error=$error");
			}
		}
	}else{
		header("location: registered-users.php");
	}
?>