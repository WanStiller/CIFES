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

	
		<img src="images/image-angelica.jpg" style="width: 100%;height: auto;">
		<br>
		<br>
		<div class="row">
			<div class="col-md-2 d-none d-sm-none d-md-block" style="padding: 2%"><img src="images/numerito.png" style="width: 100%;height: auto;"></div>
		<div class="col-md-10">
			<br>
			La Est&eacute;tica Facial concentra las maniobras, t&eacute;cnicas y manejo de aparatolog&iacute;a orientada al embellecimiento y cuidado de la piel del rostro. Es una de las 2 grandes ramas de la est&eacute;tica, junto a los tratamientos corporales.
			<br>
			<br>
			En Cifes Online hemos planeado este programa con un claro enfoque hacia la salida r&aacute;pida al mercado laboral, pero entendiendo que la est&eacute;tica posee un compromiso con la belleza, bienestar y satisfacci&oacute;n del paciente. Entender esto te permitir&aacute; sumarte cuanto antes al auge del emprendimiento en el mercado de la est&eacute;tica.
		</div>
		</div>
		<br>
		<div style="color: #0078AF">
			<h5><b>Sabes por qu&eacute; son 5+1 cursos?</b> Este programa incluye 5 cursos te&oacute;rico-pr&aacute;cticos sobre la est&eacute;tica facial m&aacute;s un curso de emprendimiento en est&eacute;tica facial. </h5>
		</div>
		<br>
	<div class="row">
		<div class="col-md-9">
			<h5>Del ABC al XYZ de la Est&eacute;tica Facial</h5>
			De la mano de Ang&eacute;lica de la Hoz, reconocida Cosmiatra y Cosmet&oacute;loga, aprender&aacute;s lo m&aacute;s avanzado en procedimientos, como lo es el manejo de la aparatolog&iacute;a combinada en protocolos de microdermoabrasi&oacute;n, peeling, lifting, drenaje linf&aacute;tico, vapor ozono, alta frecuencia, radiofrecuencia y electroporaci&oacute;n, entre otros. <br>
			Pero para llegar a este nivel, antes deber&aacute;s recorrer los primeros cursos fundamentales, donde conocer&aacute;s la estructura de la piel y las patolog&iacute;as cut&aacute;neas, la manera de ambientar tu cabina est&eacute;tica, los insumos que requiere toda esteticista, las maniobras generales de masaje y el modo profesional de tratar e interactuar con los pacientes.
		</div>


		<div class="col-md-3"><img src="images/lateral.jpg" style="width: 100%"></div>


	</div>

	<br>
	<div>
		<h5>Por qu&eacute; aprender Est&eacute;tica Facial?</h5>
		<br>
		La belleza, hoy en d&iacute;a, se ha convertido en una obsesi&oacute;n. Los datos son irrefutables: El n&uacute;mero de tratamientos est&eacute;ticos se incrementa anualmente, tanto los invasivos como los no quir&uacute;rgicos, y los faciales lideran indiscutiblemente estos r&aacute;nkings. Algo l&oacute;gico, la atracci&oacute;n empieza por el rostro, el &aacute;rea del cuerpo que est&aacute; m&aacute;s visible en las interacciones sociales.  <br><br>
En el top 7 de los pa&iacute;ses con m&aacute;s intervenciones aparecen 3 de hispanoam&eacute;rica (Brasil, M&eacute;xico y Colombia) y entre los primeros 30 se destacan 7 de nuestra regi&oacute;n. <br><br>
Pero, a parte de las razones econ&oacute;micas, la est&eacute;tica facial representa un &aacute;rea de conocimiento que implica mucho compromiso humano; se trata de ayudar a otros a verse y sentirse espl&eacute;ndido, contribuyendo a mejorar su apariencia, autoestima y tambi&eacute;n su calidad de vida.
<br><br>
Todas estas son razones de mucho peso para estudiar y emprender en Est&eacute;tica Facial. 
	</div>
	<br>
	<br>
	<img src="images/angelica_nuevo.jpg" style="width: 100%;height: auto;">
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
		<h3>Aprende Est&eacute;tica Facial y emprende r&aacute;pidamente sin distracciones. En cada clase encontrar&aacute;s contenidos din&aacute;micos y muy actuales para una f&aacute;cil comprensi&oacute;n.</h3>
		<hr>
		<br>
</div>


	      <!--<h1> <br><br></h1> TEMARIO -->

<div class="row" style="border: 1px solid #ddd;">
<div style="transition:all .4s ease-in-out;" class="iluminar col-md-5">
<img src="images/fundamentosesteticafacial.jpg" style="width: 100%;height: auto;padding-top: 15px;padding-bottom: 15px;cursor:pointer" data-toggle="modal" data-target="#exampleModalLong1"></div>
<div class="col-md-7">
<div style="margin-top: 15px;">
<span style="font-weight: bold;color:#00aaba;font-size:2em;">
Curso de Fundamentos de Est&eacute;tica Facial</span>
</div>
<p>
La <b>Est&eacute;tica Facial</b> se encarga de reconocer y diagnosticar el biotipo de piel de cada paciente para desarrollar prototipos de limpieza y embellecimiento acordes a las neceidades particulares. 
<br>
Este programa incluye tem&aacute;ticas de masaje facial, protocolos de nutrici&oacute;n e hidrataci&oacute;n, drenaje linf&aacute;tico facial, exfoliaci&oacute;n, rejuvenecimiento y edades de la piel, entre otros.
</p>
<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong1" style="margin-bottom: 15px;">Ver Contenido de este curso</a>


</div>
</div>


<br>
<br>

<div class="row" style="border: 1px solid #ddd;">
<div style="transition:all .4s ease-in-out;" class="iluminar col-md-5">
<img src="images/tecnicas_de_aplicacion_de_protocolos_faciales.jpg" style="width: 100%;height: auto;padding-top: 15px;padding-bottom: 15px;cursor:pointer" data-toggle="modal" data-target="#exampleModalLong2"></div>
<div class="col-md-7">
<div style="margin-top: 15px;">
<span style="font-weight: bold;color:#00aaba;font-size:2em;">
Curso de T&eacute;cnicas de Aplicaciones de Protocolos Faciales</span>
</div>
<p>
En este contenido ya entramos en materia acerca de los procedimientos faciales, conociendo cu&aacute;l es la aparatolog&iacute;a m&aacute;s utilizada en est&eacute;tica facial y c&oacute;mo manipularla para obtener los mejores resultados.
</p>
<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong2" style="margin-bottom: 15px;">Ver Contenido de este curso</a>

</div>
</div>

<br>
<br>

<div class="row" style="border: 1px solid #ddd;">
<div style="transition:all .4s ease-in-out;" class="iluminar col-md-5">
<img src="images/patologia.jpg" style="width: 100%;height: auto;padding-top: 15px;padding-bottom: 15px;cursor:pointer" data-toggle="modal" data-target="#exampleModalLong3"></div>
<div class="col-md-7">
<div style="margin-top: 15px;">
<span style="font-weight: bold;color:#00aaba;font-size:2em;">
Curso de Patolog&iacute;as Cut&aacute;neas</span>
</div>
<p>
La piel suele ser indicadora de patolog&iacute;as cut&aacute;neas. El tipo de lesi&oacute;n se relaciona siempre con una enfermedad espec&iacute;fica o un tipo de enfermedad.
<br>
En este curso la alumna aprender&aacute; cuales son esas lesiones que se manifiestan en la piel, Cualquier cosa que la irrite, obstruya o la inflame puede causar s&iacute;ntomas como enrojecimiento, hinchaz&oacute;n, ardor y picaz&oacute;n.
</p>
<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong3" style="margin-bottom: 15px;">Ver Contenido de este curso</a>

</div>
</div>

<br>
<br>

<div class="row" style="border: 1px solid #ddd;">
<div style="transition:all .4s ease-in-out;" class="iluminar col-md-5">
<img src="images/aparatologiacurso.jpg" style="width: 100%;height: auto;padding-top: 15px;padding-bottom: 15px;cursor:pointer" data-toggle="modal" data-target="#exampleModalLong4"></div>
<div class="col-md-7">
<div style="margin-top: 15px;">
<span style="font-weight: bold;color:#00aaba;font-size:2em;">
Curso de Procedimientos Complementarios con Aparatolog&iacute;a Facial</span>
</div>
<p>
	Aprende t&eacute;cnicas novedosas como el peeling, la radiofrecuencia, la electroporaci&oacute;n y la microdermoabrasi&oacute;n. 
</p>
<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong4" style="margin-bottom: 15px;">Ver Contenido de este curso</a>
</div>
</div>

<br>
<br>
<div class="row" style="border: 1px solid #ddd;">
<div style="transition:all .4s ease-in-out;" class="iluminar col-md-5">
<img src="images/caracuello.jpg" style="width: 100%;height: auto;padding-top: 15px;padding-bottom: 15px;cursor:pointer"></div>
<div class="col-md-7">
<div style="margin-top: 15px;">
<span style="font-weight: bold;color:#00aaba;font-size:2em;">
Curso de Tratamientos Est&eacute;ticos Manuales en Cara y Cuello</span>
</div>
<p>
La Est&eacute;tica tambi&eacute;n aporta salud y bienestar, como queda patente en tratamientos antiestr&eacute;s y drenaje linf&aacute;tico aplicados en la zona del rostro
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
        <h5 class="modal-title" id="exampleModalLongTitle" style="color: #0078AF">Curso de Fundamentos de Est&eacute;tica Facial</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<img src="images/banner_fundamentos_facial.jpg" style="width: 100%;margin-bottom: 15px">

       <h6>Anatom&iacute;a, Fisiolog&iacute;a e Histolog&iacute;a de la Piel</h6> 
<ul>
<li> Descripci&oacute;n y Objetivos del curso </li>
<li> Dermatolog&iacute;a Facial- Epidermis </li>
<li> Dermatolog&iacute;a Facial - Dermis  </li>
<li> Dermatolog&iacute;a Facial - Hipodermis  </li>
<li> Fundamentos de Morfofisiolog&iacute;a Facial Huesos  </li>
<li> Fundamentos de Morfofisiolog&iacute;a Facial M&uacute;sculos  </li>
</ul>
 		<h6>Fundamentos y Aplicaciones del An&aacute;lisis Facial </h6>
<ul>
<li> An&aacute;lisis Est&eacute;tico y Anal&iacute;tico del Paciente </li>
<li> Biotipos Cut&aacute;neos </li>
<li> Lesiones Cut&aacute;neas </li>
<li> Bioseguridad y Ambientaci&oacute;n </li>
<li> Evidencia Pr&aacute;ctica No.1 Anatom&iacute;a y Aplicaciones del An&aacute;lisis Facial  </li>
</ul>
<h6>T&eacute;nicas Necesarias para Procedimientos Faciales</h6>
<ul>
<li> Maniobras Generales </li>
<li> Teor&iacute;a de Exfoliaci&oacute;n  </li>
<li> Practica de Exfoliaci&oacute;n </li>
<li> Teor&iacute;a Protocolo de Limpieza B&aacute;sica </li>
<li> Pr&aacute;ctica de Protocolo de Limpieza B&aacute;sica </li>
<li> Bioseguridad  </li>
<li> Evidencia Pr&aacute;ctica No 2 Maniobras Generales Y Protocolo de Exfoliaci&oacute;n y limpieza facial  </li>
<li> Evaluaci&oacute;n Final Te&oacute;rica  </li>
<li> Cierre de M&oacute;dulo </li>
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
        <h5 class="modal-title" id="exampleModalLongTitle" style="color: #0078AF">T&eacute;cnicas de Aplicaciones de Protocolos Faciales</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<h6>Aplicaciones de Procedimientos faciales con aparatolog&iacute;a Inicial </h6>

 <ul>Introducci&oacute;n
<li> Manejo de Vapor Ozono </li>
<li> Manejo de Alta Frecuencia </li>
<li> Materiales Requeridos </li>
<li> Teor&iacute;a de Protocolo de Limpieza Facial Profunda </li>
<li> Protocolo de Limpieza Facial Profunda 2  </li>
<li> Evidencia Pr&aacute;ctica No. 3 Protocolos de Limpieza Facial </li>
 </ul>

<h6>Regeneraci&oacute;n Cut&aacute;nea con Protocolos de Hidrataci&oacute;n </h6>
<ul>
<li> Introducci&oacute;n </li>
<li> Nutrici&oacute;n e Hidrataci&oacute;n de la Piel 1  </li>
<li> Nutrici&oacute;n e Hidrataci&oacute;n de la Piel 2 </li>
<li> Nutrici&oacute;n e Hidrataci&oacute;n de la Piel 3 </li>
<li> Evidencia Pr&aacute;ctica No. 4 Nutrici&oacute;n e Hidrataci&oacute;n de la Piel  </li>
</ul>
<h6>Restauraci&oacute;n e Higiene Facial </h6>
<ul>
<li> Higiene Profunda e Hidrataci&oacute;n  </li>
<li> Protocolo de Higiene Facial Profunda 1  </li>
<li> Protocolo de Higiene Facial Profunda 2  </li>
<li> Protocolo de Higiene Facial Profunda 3 </li>
<li> Evidencia Te&oacute;rica </li>
<li> Evidencia Pr&aacute;ctica No. 5 Restauraci&oacute;n e Higiene Facial  </li>
<li> Cierre de M&oacute;dulo y Despedida  </li>
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
        <h5 class="modal-title" id="exampleModalLongTitle" style="color: #0078AF">Patolog&iacute;as Cut&aacute;neas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<h6>Acn&eacute; </h6>
<ul>
 <li> Introducci&oacute;n y Objetivos  </li>
 <li> Tratamiento para Acn&eacute; 1  </li>
 <li> Tratamiento para Acn&eacute; 2 </li>
 <li> Tratamiento para Acn&eacute; Protocolo 1  </li>
 <li> Tratamiento para Acn&eacute; Protocolo 2 </li>
 <li> Evidencia Pr&aacute;ctica No. 6 Acn&eacute; </li>
</ul>
<h6>Envejecimiento Facial  </h6>
<ul>
<li>  Envejecimiento y Edades de la Piel  </li>
 <li> Envejecimiento  </li>
 <li> Protocolo de Rejuvenecimiento Parte 1 </li>
<li>  Protocolo de Rejuvenecimiento Parte 2 </li>
<li>  Evidencia Pr&aacute;ctica No. 7 Envejecimiento Facial  </li>
</ul>
<h6>Procedimientos Est&eacute;ticos Especializados a Nivel Facial </h6>
<ul>
<li>  Introducci&oacute;n a los Procedimientos Est&eacute;ticos Especializados a Nivel Facial </li>
<li>  Hidrataci&oacute;n Facial con Velos de Col&aacute;geno </li>
<li>  Protocolo de Hidrataci&oacute;n Facial con Velos de Col&aacute;geno </li>
<li>  Mascarillas seg&uacute;n Tipo de Piel </li>
 <li> Lifting Facial con Crioyeso Teor&iacute;a </li>
 <li> Lifting Facial con Crioyeso Pr&aacute;ctica 1 </li>
 <li> Lifting Facial con Crioyeso Pr&aacute;ctica 2 </li>
 <li> Evidencia Pr&aacute;ctica  </li>
<li>  Evidencia Te&oacute;rica  </li>
<li>  Cierre de M&oacute;dulo </li>
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
        <h5 class="modal-title" id="exampleModalLongTitle" style="color: #0078AF">Procedimientos Complementarios con Aparatolog&iacute;a Facial</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<h6>Aparatolog&iacute;a Especializada Peeling Ultras&oacute;nico </h6>
<ul>
<li> Peeling Ultras&oacute;nico</li> 
<li> Peeling Ultras&oacute;nico Pr&aacute;ctica 1</li>
<li> Peeling Ultras&oacute;nico Pr&aacute;ctica 2</li>
</ul>
<h6>Especialidades de la RadioFrecuencia y Electroporador</h6>
<ul>
<li> Radiofrecuencia Teor&iacute;a</li>
<li> Radiofrecuencia Pr&aacute;ctica </li>
<li> Eletroporaci&oacute;n </li>
<li> Electroporaci&oacute;n Practica</li>
</ul>
<h6>Peeling mec&aacute;nico con microdermoabrasi&oacute;n </h6>
<ul>
<li>Microdermoabrasi&oacute;n</li>
<li> Manejo de la Microdermoabrasi&oacute;n Pr&aacute;ctica 1 </li>
<li> Manejo de la Microdermoabrasi&oacute;n Pr&aacute;ctica 2</li>
<li> Evidencia Pr&aacute;ctica </li>
<li> Evidencia Te&oacute;rica </li>
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
<div class="modal fade" id="exampleModalLong5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle" style="color: #0078AF">Tratamientos Est&eacute;ticos Manuales en Cara y Cuello</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<h6>Drenaje Linf&aacute;tico</h6>
<ul>
<li> Sistema Linf&aacute;tico  </li>
<li> Protocolo de Drenaje Linf&aacute;tico Parte 1 </li>
<li> Protocolo de Drenaje Linf&aacute;tico Parte 2 </li>
<li> Protocolo de Drenaje Linf&aacute;tico Parte 3 </li>
</ul>
<h6>Tratamiento Anti Estr&eacute;s </h6>
<ul>
<li> Masaje Anti-Estr&eacute;s Teor&iacute;a </li>
<li> Protocolo Masaje Anti-Estr&eacute;s Parte 1 </li>
<li> Protocolo Masaje Anti-Estr&eacute;s Parte 2 </li>
<li> Cierre de M&oacute;dulo </li>
<li> Evidencia Pr&aacute;ctica  </li>
<li> Evidencia Pr&aacute;ctica  </li>
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

