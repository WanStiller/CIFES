<?php
session_start();
include('includes/config.php');
error_reporting(0);
if(strlen($_SESSION['login'])==0)
{ 
header('location:index.php');
}
else{
?>
<!DOCTYPE html>
<html lang="es">
<?php require_once 'includes/head.php'; ?>
<body>
	<div class="wrapper">
<?php require_once 'includes/logo.php'; ?>
<?php require_once 'includes/sidebar.php'; ?>
<?php require_once 'includes/home.php' ; ?>
<?php require_once 'includes/custom.php' ;?>
	</div>
<?php require_once 'includes/scripts.php' ;?>
</body>
</html>
<?php } ?>