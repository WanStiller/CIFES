<nav class="navbar navbar-expand-lg navbar-dark bg-dark navbar-static-top" style="position: initial; box-sizing: border-box; font-size: 1.2em;">
<div class="container-fluid">
<a class="navbar-brand" href="cursos.php"><img src="images/logocode.png" alt="Cifes logo" style="width: 150px;"></a>
<!--<div style="text-align:center;color:white;font-size:1.3em;" class="d-none d-sm-none d-md-block"><span class="icon icon-youtube" style></span><span class="icon icon-facebook" style></span><span class="icon icon-instagram" style></span></div>-->
<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarResponsive">
<ul class="navbar-nav ml-auto">

<li class="nav-item"><a class="nav-link" href="cursos.php">Programas</a></li>
<li class="nav-item"><a class="nav-link" href="/blog">Blog</a></li>
<li class="nav-item"><a class="nav-link" href="http://tienda.cifesonline.com/" target="_blank"><span class="icon icon-cart" style="margin-right:10px;"></span>Tienda</a></li>

<!--<li class="nav-item"><a class="nav-link" href="estetica-corporal-programa.php">Est&eacute;tica Corporal</a></li>-->
<!--<li class="nav-item"><a class="nav-link" href="blog.php">Blog</a></li>-->
<li class="nav-item"><a class="nav-link" href="about-us.php">Eventos</a></li>
<!--<li class="nav-item"><a class="nav-link" href="holamundo.html"><span class="icon icon-bubble"></span></a></li>-->
            <li class="nav-item"><a class="nav-link parpadealento" href="profile.php?mis_cursos_">Mis Cursos</a></li>

            <li class="nav-item"><a class="nav-link" href="pvt-news-details.php?nid=<?php echo $ultimaClaseId;?>">&Uacute;ltima clase vista</a></li>


      <li class="nav-item"><a class="nav-link">Mis Puntos : <span style="color: yellow;font-weight: bold;"><?php echo htmlentities($puntos); ?></span></a></li>
<li class="nav-item"><a class="nav-link"><span>Plan: <b><?php
                                                                                            if ($status == 0) {
                                                                                            echo "Gratis";
                                                                                            }
                                                                                            if ($status == 1) {
                                                                                            echo "Starter";
                                                                                            }
                                                                                            if ($status == 2) {
                                                                                            echo "Pass";
                                                                                            }
                                                                                            if ($status == 3) {
                                                                                            echo "Premium";
                                                                                            }
                                                                                            if ($status == 4) {
                                                                                            echo "Docente";
                                                                                            }
                                                                                            if ($status == 5) {
                                                                                            echo "Administrador";
                                                                                            }
                                                                                            ?>
</b></span></a></li>
<li><a class="nav-link" href="profile.php"><div style="background-image: url(images/profiles/<?php echo $profile_pic ?>);width: 40px;height: 40px;border-radius: 50%; background-position: 50% 50%; background-size: cover;margin-top: -10px;text-align: center;float: right; position: initial; margin-right: 0px;margin-left: 10px;"></div></a></li>
</ul>
</div>
</div>
</nav>
<script>
function goBack() {
  window.history.back();
}
</script>

<div style="background: #0077AA; color: white;text-align: right;padding-top: 10px;padding-bottom: 0.07%;padding-right: 1%;"><h6 style=" margin-left: 45px;"><a class="nav-link" style="color:white;margin-right:10px;" href="https://api.whatsapp.com/send?phone=573503387057&text=Hola%20Liliana,%20tengo%20una%20inquietud..." target="_blank">Whatsapp a mi Tutora <span class="icon icon-whatsapp"></span></span></span></a></h6></div>
<!--<p><a href="pvt-news-details.php?nid=<?php echo $ultimaClaseId;?>">Ultima Clase</a></p>-->


<style type="text/css">
    input[id^="spoiler"]{
 display: none;
}

input[id^="spoiler"]:checked + label {
  color: #333;
}
input[id^="spoiler"] ~ .spoiler {
  width: 400px;
  height: 0;
  overflow: hidden;
  opacity: 0;
  margin: 10px auto 0; 
  padding: 10px; 
  background: #eee;
  border: 1px solid #ccc;
  border-radius: 8px;
  transition: all .6s;
  position: fixed;
  right:0px;
  bottom: 0px;
  z-index: 1000000;

}
input[id^="spoiler"]:checked + label + .spoiler{
  height: auto;
  opacity: 1;
  padding: 10px;
}
</style>
  <br>
    <!--<input type="checkbox"  id="spoiler2" /> 
  <label for="spoiler2" style="position: absolute;color: #00a8b8;right:10px;font-size: 2em;margin: 0.5em;bottom: 0.5em;cursor: pointer;z-index: 1000;" class="d-none d-sm-none d-md-block parpadealento"><span class="icon icon-bubble"></span></label>
<div class="spoiler d-none d-sm-none d-md-block" style="opacity: 0.95;bottom: -30px">
    <input type="checkbox"  id="spoiler2" /> 
  <label for="spoiler2" style="color: #00a8b8;left:10px;font-size: 2em;margin: 0.5em;cursor: pointer"><span class="icon icon-circle-down"></span></label>
  <iframe src="holamundo.php" width="100%" height="550" frameborder="0" scrolling="no"></iframe>-->
  <!--<div id="chatContainer">

    <div id="chatTopBar" class="rounded"></div>
    <div id="chatLineHolder"></div>
    
    <div id="chatUsers" class="rounded"></div>
    <div id="chatBottomBar" class="rounded">
        <div class="tip"></div>
        
        <form id="loginForm" method="post" action="">
            <input id="name" name="name" class="rounded" />
            <input id="email" name="email" class="rounded" />
            <input type="submit" class="blueButton" value="Conversar" />
        </form>
        
        <form id="submitForm" method="post" action="">
            <input id="chatText" name="chatText" class="rounded" maxlength="255" />
            <input type="submit" class="blueButton" value="Enviar" />
        </form>
        
    </div>
    
</div>-->
</div>