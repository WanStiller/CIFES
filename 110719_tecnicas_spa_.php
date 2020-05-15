<?php 
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
        $puntos = $row['puntos'];
    } 
    $count_files = mysqli_query($con, "select * from file");
    $count_download = mysqli_query($con, "select sum(download) as download from file");
    $count_user=mysqli_query($con, "select * from user");
    $count_comments=mysqli_query($con, "select * from comment")
?>
<?php require_once 'includes/special.php'; ?>
<body>
<?php include('includes/header-logged.php');?>
<div class="container">
<br>


<div class="row">
<div class="col-lg-12 ">



	    <br>

    <nav class="col-md-12">
  <div class="nav nav-pills mb-3" id="nav-tab" role="tablist">

  	<a class="nav-item nav-link active" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Informaci&oacute;n del Programa</a>


    <a class="nav-item nav-link" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Temario</a>
    
    <!--<a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Contact</a>-->
  </div>
</nav>



<div class="container tab-content" id="nav-tabContent">



<div class="tab-pane fade show active" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
	<br>

<!--<br>
<div class="col-md-12 embed-responsive embed-responsive-16by9">
<iframe class="embed-responsive-item hs-responsive-embed" src="https://player.vimeo.com/video/365071238" allowfullscreen="" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"></iframe>
</div>-->

	
		<img src="images/bannernuevospa-min.jpg" style="width: 100%;height: auto;">
		<br>
		<br>
		<div class="row">
			<div class="col-md-2 d-none d-sm-none d-md-block" style="padding: 2%"><img src="images/numerito.png" style="width: 100%;height: auto;"></div>
		<div class="col-md-10">
			<br>
			Las T&eacute;cnicas de Spa son una serie de m&eacute;todos combinados de masajes, instrumentos y elementos naturales que tienen como finalidad sanar y relajar el cuerpo, empleando el agua como elemento central de estos tratamientos.
			<br>
			<br>
			En Cifes Online hemos planeado este programa con un claro enfoque hacia la salida r&aacute;pida al mercado laboral, pero entendiendo que la est&eacute;tica posee un compromiso con la belleza, bienestar y satisfacci&oacute;n del paciente. Entender esto te permitir&aacute; sumarte cuanto antes al auge del emprendimiento en el mercado de la est&eacute;tica.
			<br>
		</div>
		</div>
		<br>
		<div style="color: #0078AF">
			<h5><b>Sabes por qu&eacute; son 5+1 cursos?</b> Este programa incluye 5 cursos te&oacute;rico-pr&aacute;cticos sobre las T&eacute;cnicas de Spa m&aacute;s un curso de emprendimiento en T&eacute;cnicas de Spa. </h5>
		</div>
		<br>
	<div class="row">
		<div class="col-md-9">
			<h5>T&eacute;cnicas modernas, sabidur&iacute;a ancestral</h5>
			Liliana Sonza, docente de la Escuela Cifes con amplia trayectoria como Esteticista y Cosmet&oacute;loga, te explicar&aacute; mediante clases te&oacute;ricas y pr&aacute;cticas, las diferentes maniobras, procedimientos e instrumentos que forman parte de las T&eacute;cnicas de Spa. Aprender&aacute;s f&aacute;cilmente los protocolos y tratamientos que garantizan excelentes resultados en masajes terap&eacute;uticos y relajantes, mascarillas corporales y t&eacute;cnicas orientales, entre muchos otros contenidos especializados como los tipos de fango, la lodoterapia, vinoterapia, cromoterapia y chocolaterapia.
			Tambi&eacute;n aprender&aacute;s a ambientar tu cabina est&eacute;tica, los insumos que requiere toda esteticista y el modo profesional de tratar e interactuar con los pacientes.
		</div>


		<div class="col-md-3"><img src="images/otra_imagen.jpg" style="width: 100%"></div>


	</div>

	<br>
	<div>
		<h5>Por qu&eacute; aprender T&eacute;cnicas de Spa?</h5>
		<br>
		Verse bien es tan importante como sentirse pleno de energ&iacute;a y vitalidad. Las T&eacute;cnicas de Spa conjugan terapias y tratamientos que cumplen fines est&eacute;ticos y de salud. Las responsabilidades laborales y los compromisos familiares, suelen generar estr&eacute;s y afecciones del &aacute;nimo que repercuten en la apariencia personal. Las T&eacute;cnicas de Spa desfatigan y revitalizan, dotando al cuerpo y la mente de un estado favorable que tiene implicaciones en la salud facial y corporal.
		<br>
		<br>
Y para la esteticista, estos tratamientos representan un &aacute;rea de conocimiento que implica el desarrollo de muchas habilidades humanas; se trata de ayudar a otros a verse y sentirse espl&eacute;ndido, contribuyendo a mejorar su apariencia, autoestima y tambi&eacute;n su calidad de vida.
Todas estas son razones de mucho peso para estudiar y emprender en el estudio de las T&eacute;cnicas de Spa. 
<br></div>
	<br>
	<br>
	<img src="images/tecnicas_spa_banner.jpg" style="width: 100%;height: auto;">
	<br>
	<br>
	<br>
	<h5>En <strong>Cifes Online</strong> no estudias, Creces!</h5>
	Nuestra filosof&iacute;a de formaci&oacute;n tiene como objetivo capacitarte para que te incorpores r&aacute;pidamente al mercado laboral. <br>Cada programa, incluye un curso final de emprendimiento, en el cual aprender&aacute;s las nociones fundamentales para manejarte como una profesional independiente, descubriendo cu&aacute;nto cobrar por cada tratamiento y c&oacute;mo equilibrar tus ingresos y egresos para que puedas consolidar un negocio y estilo de vida sustentable.
	<br>
	<br>
	<br>
	<br>
	<div class="row">
		<div class="col-md-4"><img src="images/diagrama.png" style="width: 100%"></div>

		<div class="col-md-8">
			Colombia ocupa el 7mo lugar en % de procedimientos est&eacute;ticos no quir&uacute;rgicos; Est&aacute; a la cabeza en la regi&oacute;n detr&aacute;s de Brasil y M&eacute;xico. 
			<br>
			<cite>Fuente: https://www.isaps.org/es/</cite>
			<br>
			<br>
			El mercado de la est&eacute;tica genera en latinoam&eacute;rica cerca de 77.000 millones USD anualmente.
			<br>
			<cite>Fuente: https://www.euromonitor.com/</cite>    
		</div>


	</div>
	<br>
	<br>
	<h5 style="color: #0078AF">Ninguna otra plataforma es tan especializada ni te ofrece tanto como Cifes Online:</h5>
	<br>
	<br>
	En la plataforma de Cifes Online podr&aacute;s estudiar con facilidad, desde cualquier dispositivo (computador, tablet o celular) y administrando tu tiempo.
</div>











<div class="tab-pane fade" style="margin-top: 40px" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab"><!--Temario-->
	
<div style="text-align: center;color: #00aaba;">
		<h3>Aprende T&eacute;cnicas de Spa y emprende r&aacute;pidamente sin distracciones. En cada clase encontrar&aacute;s contenidos din&aacute;micos y muy actuales para una f&aacute;cil comprensi&oacute;n.</h3>
		<hr>
		<br>
</div>


	      <!--<h1> <br><br></h1> TEMARIO -->

<div class="row" style="border: 1px solid #ddd;">
<div style="transition:all .4s ease-in-out;" class="iluminar col-md-5">
<img src="images/tecnicas1.jpg" style="width: 100%;height: auto;padding-top: 15px;padding-bottom: 15px;cursor:pointer" data-toggle="modal" data-target="#exampleModalLong1"></div>
<div class="col-md-7">
<div style="margin-top: 15px;">
<span style="font-weight: bold;color:#00aaba;font-size:2em;">
Fundamentos del Masaje y T&eacute;cnicas de Spa</span>
</div>
<p>
Recibir&aacute;s entrenamiento en nociones que tienen que ver con el sistema muscular, la bioseguridad y t&eacute;cnicas de maniobras b&aacute;sicas de los masajes. 
</p>
<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong1" style="margin-bottom: 15px;">Ver Contenido de este curso</a>
</div>
</div>


<br>
<br>

<div class="row" style="border: 1px solid #ddd;">
<div style="transition:all .4s ease-in-out;" class="iluminar col-md-5">
<img src="images/tecnicas2.jpg" style="width: 100%;height: auto;padding-top: 15px;padding-bottom: 15px;cursor:pointer" data-toggle="modal" data-target="#exampleModalLong2"></div>
<div class="col-md-7">
<div style="margin-top: 15px;">
<span style="font-weight: bold;color:#00aaba;font-size:2em;">
Masajes Relajantes</span>
</div>
<p>
Aprender&aacute;s a realizar 5 tipos de masajes: Masaje a la carta, lomi lomi, masaje sueco, preparto y el masaje shantal, que ayudan a mejorar el sistema locomotor, digestivo y sensorial.
</p>
<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong2" style="margin-bottom: 15px;">Ver Contenido de este curso</a>

</div>
</div>

<br>
<br>

<div class="row" style="border: 1px solid #ddd;">
<div style="transition:all .4s ease-in-out;" class="iluminar col-md-5">
<img src="images/tecnicas3.jpg" style="width: 100%;height: auto;padding-top: 15px;padding-bottom: 15px;cursor:pointer" data-toggle="modal" data-target="#exampleModalLong3"></div>
<div class="col-md-7">
<div style="margin-top: 15px;">
<span style="font-weight: bold;color:#00aaba;font-size:2em;">
Masajes Terap&eacute;uticos</span>
</div>
<p>
Conocer&aacute;s 4 masajes orientados a eliminar dolores en los m&uacute;sculos de la espalda, brazos, piernas y abdomen, con t&eacute;cnicas como masajes desfatigantes, deportivos, masajes circulatorios y  californiano.
</p>
<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong3" style="margin-bottom: 15px;">Ver Contenido de este curso</a>

</div>
</div>

<br>
<br>

<div class="row" style="border: 1px solid #ddd;">
<div style="transition:all .4s ease-in-out;" class="iluminar col-md-5">
<img src="images/tecnicas4.jpg" style="width: 100%;height: auto;padding-top: 15px;padding-bottom: 15px;cursor:pointer" data-toggle="modal" data-target="#exampleModalLong4"></div>
<div class="col-md-7">
<div style="margin-top: 15px;">
<span style="font-weight: bold;color:#00aaba;font-size:2em;">
Masajes con T&eacute;cnicas Orientales</span>
</div>
<p>
Conocer&aacute;s los masajes con piedras calientes (terapia geotermal), bambuterapia, relajaci&oacute;n con maderoterapia y cocoterapia, t&eacute;cnicas activadoras de los centros energ&eacute;ticos del cuerpo.
</p>
<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong4" style="margin-bottom: 15px;">Ver Contenido de este curso</a>
</div>
</div>

<br>
<br>
<div class="row" style="border: 1px solid #ddd;">
<div style="transition:all .4s ease-in-out;" class="iluminar col-md-5">
<img src="images/tecnicas5.jpg" style="width: 100%;height: auto;padding-top: 15px;padding-bottom: 15px;cursor:pointer"></div>
<div class="col-md-7">
<div style="margin-top: 15px;">
<span style="font-weight: bold;color:#00aaba;font-size:2em;">
Masajes con Mascarillas Corporales</span>
</div>
<p>
Descubrir&aacute;s c&oacute;mo preparar y aplicar mascarillas corporales, as&iacute; como tratamientos novedosos como la lodoterapia, chocolaterapia, vinoterapia y cromoterapia.
</p>
<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong5" style="margin-bottom: 15px;">Ver Contenido de este curso</a>
</div>
</div>























</div>







<!--Modales -->


<!-- Modal -->
<div class="modal fade" id="exampleModalLong1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle" style="color: #0078AF">Fundamentos del masaje y T&eacute;cnicas de Spa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<!--<img src="images/moldeoabdominal.jpg" style="width: 100%;margin-bottom: 15px">-->

       
<ul>
<li>BIenvenida al curso Est&eacute;tica y SPA</li>
<li>Historia del masaje</li>
<li>Sistema muscular</li>
<li>T&eacute;cnicas de Spa</li>
<li>Bioseguridad - Posiciones del paciente y posicion del terapeuta</li>
<li>Maniobras b&aacute;sicas</li>
</ul>
 		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <!--<button type="button" class="btn btn-primary">Save changes</button>-->
      </div>
    </div>
  </div>
</div>

<!-- Modal 2 -->
<div class="modal fade" id="exampleModalLong2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle" style="color: #0078AF">Curso de Masajes Relajantes</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<h6>Masaje a la Carta</h6>

 <ul>
<li>Bienvenida - Materiales - Descripci&oacute;n miembros inferiores (pies y piernas) parte anterior</li>
<li>Miembros superiores - Abdomen y brazos</li>
<li>Descripci&oacute;n - Miembros inferiores (Pies y piernas) parte posterior</li>
<li>Parte superior - Espalda</li>
 </ul>

<h6>Masaje Lomi Lomi </h6>
<ul>
	<li>Ritmoterapia - Generalidades</li>
	<li>Ritmoterapia - C&uacute;bito prono</li> 
	<li>Ritmoterapia - C&uacute;bito supino</li>
</ul>
<h6>masaje Sueco</h6>
<ul>
<li>Definici&oacute;n y generalidades</li>
<li>Parte posterior superior</li>
<li>Parte posterior inferior </li>
<li>Parte anterior inferior</li>
<li>Parte anterior superior</li>
<li>Masaje Sueco Facial</li>
</ul>
<h6>Masaje Preparto</h6>
<ul>
<li>Masaje preparto laternal</li>
<li>Masaje preparto facial</li>
<li>Masaje preparto anterior inferior extremidades y abdomen</li>
</ul>
<h6>Masaje Shantal</h6>
<ul>
<li>Masaje Shantal  Bienvenida- Descripci&oacute;n</li>
<li>Masaje Shantal  Cubito Prono</li>
<li>Masaje Shantal  Cubito Supino</li>
</ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <!--<button type="button" class="btn btn-primary">Save changes</button>-->
      </div>
    </div>
  </div>
</div>



<!-- Modal 3 -->
<div class="modal fade" id="exampleModalLong3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle" style="color: #0078AF">Curso de Masajes Terap&eacute;uticos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<h6>Masaje Desfatigante</h6>
<ul>
<li>Masaje desfatigante de espalda I: Marco te&oacute;rico y Maniobras Preparatorias</li>
<li>Masaje desfatigante de espalda 2: Maniobras Descontracturantes y zona Paravertebral</li>
</ul>

<h6>Masaje Deportivo</h6>
<ul>
<li>Bienvenida, Definiciones, objetivos</li>
<li>Precompetencia - Miembros inferiores</li>
<li>Precompetencia - Miembros superiores</li>
<li>Mantenimiento - Miembros inferiores</li>
<li>Postcompetencia - Miembros inferiores</li>
<li>Postcompetencia- Miembros superiores</li>
</ul>
<h6>Masaje Californiano</h6>
<ul>
<li>Teoria Masaje Californiano (Bienvenida, Definiciones, objetivos)</li>
<li>Reflexolog&iacute;a</li>
<li>Colonterapia</li>
<li>T&eacute;cnica descontracturante - Parte anterior - superior</li>
<li>T&eacute;cnica descontracturante - Parte anterior - inferior</li>
<li>T&eacute;cnica descontracturante - Parte posterior - superior</li>
<li>T&eacute;cnica descontracturante - Parte posterior - inferior</li>
</ul>
<h6>Masaje Circulatorio</h6>
<ul>
<li>Teor&iacute;a</li>
<li>Masaje Circulatorio parte superior - Anterior</li>
<li>Masaje Circulatorio parte Inferior - Anterior</li>
<li>Masaje Circulatorio parte superior - Posterior</li>
<li>Masaje Circulatorio parte Inferior - Posterior</li>
</ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <!--<button type="button" class="btn btn-primary">Save changes</button>-->
      </div>
    </div>
  </div>
</div>




<!-- Modal 4 -->
<div class="modal fade" id="exampleModalLong4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle" style="color: #0078AF">Masaje con T&eacute;cnicas Orientales</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<h6>Piedras Calientes</h6>
<ul>
<li>Origen y beneficios</li>
<li>C&uacute;bito prono (posterior) y puntos de imposicion inferior</li>
<li>C&uacute;bito prono puntos de imposicion  superior</li>
<li>C&uacute;bito supino puntos de imposicion  inferior</li>
<li>C&uacute;bito supino puntos de imposicion  superior</li>
</ul>
<h6>Bambuterapia</h6>
<ul>
<li>Generalidades</li>
<li>Aplicaci&oacute;n en extremedidades inferiores Cubito prono (posterior)</li>
<li>Espalda (posterior)</li>
<li>Abdomen (anterior)</li>
<li>Rostro (anterior)</li>
</ul>
<h6>Maderoterapia</h6>
<ul>
<li>Madero Terapia Generalidades</li>
<li>Madero Terapia Aplicaci&oacute;n en extremedidades inferiores Cubito prono (posterior inferior) </li>
<li>Madero Terapia Aplicaci&oacute;n en extremedidades inferiores Cubito prono (posterior superior) </li>
<li>Madero Terapia Aplicaci&oacute;n en extremedidades inferiores Cubito Supino (Anterior) piernas y abdomen </li> 
<li>Madero Terapia C&uacute;bito subipo facial </li>
</ul>
<h6>Coco Terapia</h6>
<ul>
<li>Masaje Cocoterapia 1 Generalidades </li>
<li>Masaje Cocoterapia 2 Parte anterior (piernas y abdomen) </li>
<li>Masaje Cocoterapia posterior inferior </li>
<li>Masaje Cocoterapia posterior superior </li>
</ul>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <!--<button type="button" class="btn btn-primary">Save changes</button>-->
      </div>
    </div>
  </div>
</div>



<!-- Modal 5 -->
<div class="modal fade" id="exampleModalLong5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle" style="color: #0078AF">Mascarillas Corporales</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<h6>Masaje Exfoliante</h6>
<ul>
<li>Generalidades Teor&iacute;a</li> 
<li>Presentaci&oacute;n </li>
<li>Parte inferior anterior</li> 
<li>Parte anterior superior</li>
<li>Parte posterior inferior </li>
<li>Parte posterior superior</li>
</ul>
<h6>Lodo Terapia</h6>
<ul>
<li>Generalidades</li> 
<li>Presentaci&oacute;n</li>
<li>Masaje posterior inferior</li> 
<li>Masaje posterior superior</li>
<li>Masaje anterior inferior</li>
<li>Masaje anterior superior</li>
<li>Finalizaci&oacute;n 
</ul>
<h6>Tratamientos Anticelulitis</h6>
<ul>
<li>Indicaciones y Protocolo Anticelul&iacute;tico </li>
<li>Protocolo de T&eacute;cnicas Anticelul&iacute;ticas en el Abdomen</li>
<li>Protocolo de T&eacute;cnicas Anticelul&iacute;ticas en los Miembros Inferiores</li>
<li>Evidencia Pr&aacute;ctica No. 17 Protocolo de T&eacute;cnicas Anticelul&iacute;ticas en los Miembros Inferiores</li>
</ul>
<h6>Chocolaterapia</h6>
<ul>
<li>Generalidades</li> 
<li>Presentaci&oacute;n </li>
<li>Masaje chocolaterapia posterior inferior</li> 
<li>Masaje chocolaterapia posterior superior</li>
<li>Masaje chocolaterapia anterior superior</li>
<li>Finalizaci&oacute;n</li>
</ul>
<h6>Vinoterapia</h6>
<ul>
<li>Generalidades</li>
<li>Presentaci&oacute;n</li>
<li>Masaje vinoterapia posterior inferior</li>
<li>Masaje vinoterapia posterior superior</li>
<li>Masaje vinoterapia anterior inferior</li>
<li>Masaje vinoterapia anterior superior</li>
<li>Masaje vinoterapia finalizaci&oacute;n</li>
</ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <!--<button type="button" class="btn btn-primary">Save changes</button>-->
      </div>
    </div>
  </div>
</div>











</div>







</div>
</div>

</div>
<?php include('includes/footer.php');?>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
