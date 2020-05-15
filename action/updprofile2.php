<?php
	session_start();
	if (!isset($_SESSION['user_id']) && $_SESSION['user_id']==null) {
		header("location: ../");
	}
	include "../config/config.php";
	$id = $_SESSION['user_id'];
	$fullname = $_POST['fullname'];
	$email = $_POST['email'];
	$password = sha1(md5($_POST['password']));
	if(isset($_POST['token'])){
		$update=mysqli_query($con,"UPDATE user set fullname=\"$fullname\", email=\"$email\" , password=\"$password\" where id=$id");
		if ($update) {
            print "Datos Actualizados.";
            print "<script>window.location='../edit_profile_success.php';</script>";
	   	}else{
	   		// echo "error".mysqli_error($con);
	   	}
	   	// CHANGE PASSWORD
	}else{
		header("location: ../");
	}
?>