<?php
define('DB_SERVER','localhost');
define('DB_USER','appjoellimpia');
define('DB_PASS' ,')T,AXa)#Vs+S');
define('DB_NAME','applimpia');
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
// Check connection
if (mysqli_connect_errno())
{
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>