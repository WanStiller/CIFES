<?php
    // Tomamos los datos de la tabla de categorias
    session_start();
    include "config/config.php";
    if(!isset($_SESSION["user_id"]) || $_SESSION["user_id"]==null){
        header("location: index.php");
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
    /*$count_files = mysqli_query($con, "select * from file");
    $count_download = mysqli_query($con, "select sum(download) as download from file");
    $count_user=mysqli_query($con, "select * from user");
    $count_comments=mysqli_query($con, "select * from comment")*/
?>


<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cifes Chat</title>

<link rel="stylesheet" type="text/css" href="js/jScrollPane/jScrollPane.css" />
<link rel="stylesheet" type="text/css" href="css/page.css" />
<link rel="stylesheet" type="text/css" href="css/chat.css" />

</head>

<body>

<div id="chatContainer">

    <div id="chatTopBar" class="rounded" style="width: 100%"></div>
    <div id="chatLineHolder"></div>
    
    <div id="chatUsers" class="rounded"></div>
    <div id="chatBottomBar" class="rounded">
    	<div class="tip"></div>
        
        <form id="loginForm" method="post" action="">
            <input id="name" name="name" class="rounded" value="<?php echo $fullname ?>" type="hidden"/>
            <input id="email" name="email" class="rounded" value="<?php echo $email ?>" type="hidden"/>
            <input type="submit" class="blueButton" value="Unirse a la Conversación" />
        </form>
        
        <form id="submitForm" method="post" action="">
            <input id="chatText" name="chatText" class="rounded" maxlength="255" style="width: 95%" />
            <input type="submit" class="blueButton" value="Enviar" />
        </form>
        
    </div>
    
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script src="js/jScrollPane/jquery.mousewheel.js"></script>
<script src="js/jScrollPane/jScrollPane.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>
