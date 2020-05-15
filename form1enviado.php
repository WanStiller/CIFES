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
<body style="background:white;">
<div class="container-fluid">
    <div style="text-align: center;"><h4>Su archivo fue enviado exitosamente. Usted ser&aacute; evaluada/o por nuestro comit&eacute; docente.</h4></div>
<?php 
    function form_mail($sPara, $sAsunto, $sTexto, $sDe) 
    { 
        $bHayFicheros = 0; 
        $sCabeceraTexto = ""; 
        $sAdjuntos = ""; 
        $sCuerpo = $sTexto; 
        $sSeparador = uniqid("_Separador-de-datos_");         
        $sCabeceras = "MIME-version: 1.0\n";         
        // Recogemos los campos del formulario 
        foreach ($_POST as $sNombre => $sValor) 
        $sCuerpo = $sCuerpo."\n".$sNombre." = ".$sValor;             
        // Recorremos los Ficheros 
        foreach ($_FILES as $vAdjunto) 
        {              
            if ($bHayFicheros == 0) 
            { 
                // Hay ficheros                 
                $bHayFicheros = 1;                 
                // Cabeceras generales del mail 
                $sCabeceras .= "Content-type: multipart/mixed;"; 
                $sCabeceras .= "boundary=\"".$sSeparador."\"\n";                 
                // Cabeceras del texto 
                $sCabeceraTexto = "--".$sSeparador."\n"; 
                $sCabeceraTexto .= "Content-type: text/plain;charset=iso-8859-1\n"; 
                $sCabeceraTexto .= "Content-transfer-encoding: 7BIT\n\n";                 
                $sCuerpo = $sCabeceraTexto.$sCuerpo;                 
            } 
             
            // Se añade el fichero 
            if ($vAdjunto["size"] > 0) 
            { 
                $sAdjuntos .= "\n\n--".$sSeparador."\n"; 
                $sAdjuntos .= "Content-type: ".$vAdjunto["type"].";name=\"".$vAdjunto["name"]."\"\n"; 
                $sAdjuntos .= "Content-Transfer-Encoding: BASE64\n"; 
                $sAdjuntos .= "Content-disposition: attachment;filename=\"".$vAdjunto["name"]."\"\n\n";  
                $oFichero = fopen($vAdjunto["tmp_name"], 'rb'); 
                $sContenido = fread($oFichero, filesize($vAdjunto["tmp_name"])); 
                $sAdjuntos .= chunk_split(base64_encode($sContenido));
                fclose($oFichero); 
            } 
        } 
        // Si hay ficheros se añaden al cuerpo 
        if ($bHayFicheros) 
        $sCuerpo .= $sAdjuntos."\n\n--".$sSeparador."--\n"; 
        // Se añade la cabecera de destinatario 
        if ($sDe)$sCabeceras .= "From:".$sDe."\n"; 
        // Por último se envia el mail 
        return(mail($sPara, $sAsunto, $sCuerpo, $sCabeceras)); 
    } 
         
        //Ejemplo de como usar: 
        if (form_mail("perseveropublicidad@tetengoelregalo.com", 
        "Hola", 
        "Los datos introducidos en el formulario son:\n", 
        "wmp@tetengoelregalo.com")) 
        echo ""; 
         
        // Ejemplo de como usar, poniendo como remitente el campo pasado de E-mail 
        /* 
        if (form_mail("usuario_destino@dominio.com", 
                                    "Activación de formulario", 
                                    "Los datos introducidos en el formulario son:\n", 
                                    $_POST["E-mail"])) 
        echo "Su formulario ha sido enviado con exito"; 
        */ 

        //Joel Garcia.*/      
?>
</div>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>