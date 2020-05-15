<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
    $usuario= $_SESSION['user_id'];

    header("Location: home.php");
}else
{
    header("Location: index-logged.php");
  exit;
}
?>