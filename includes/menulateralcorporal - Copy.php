<div>
	<style type="text/css">
  @import url(//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css);
}
@import url(https://fonts.googleapis.com/css?family=Titillium+Web:300);

.logo{
  
}

.settings {
  
  height:0px; 
  float:left;
  background:#f8f9fa;
  background-repeat:no-repeat;
  width:250px;
  margin:0px;
 text-align: center;
font-size:20px;
font-family: 'Strait', sans-serif;

}

/* ScrolBar  */
.scrollbar
{

height: 90%;
width: 100%;
overflow-y: hidden;
overflow-x: hidden;
}

.scrollbar:hover
{

height: 100%;
width: 100%;
overflow-y: scroll;
overflow-x: hidden;
}

/* Scrollbar Style */ 

#style-1::-webkit-scrollbar-track
{
border-radius: 2px;
}

#style-1::-webkit-scrollbar
{
width: 5px;
background-color: #F7F7F7;
}

#style-1::-webkit-scrollbar-thumb
{
border-radius: 10px;
-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
background-color: #BFBFBF;
}
/* Scrollbar End */ 




.fa-lg {
font-size: 1em;
  
}
.fa {
position: relative;
display: table-cell;
width: 55px;
height: 36px;
text-align: center;
top:12px; 
font-size:20px;

}



.main-menu:hover, nav.main-menu.expanded {
width:260px;
overflow:hidden;
opacity:1;

}

.main-menu {
background:#f8f9fa;
position:absolute;
top:0;
bottom:0;
height:100%;
left:0;
width:55px;
overflow:hidden;
-webkit-transition:width .2s linear;
transition:width .2s linear;
-webkit-transform:translateZ(0) scale(1,1);
box-shadow: 1px 0 15px rgba(0, 0, 0, 0.07);
  opacity:1;
}

.main-menu>ul {
margin:7px 0;

}

.main-menu li {
position:relative;
display:block;
width:250px;
  


}

.main-menu li>a {
position:relative;
width:255px;
display:table;
border-collapse:collapse;
border-spacing:0;
color:#8a8a8a;
font-size: 15px;
text-decoration:none;
-webkit-transform:translateZ(0) scale(1,1);
-webkit-transition:all .14s linear;
transition:all .14s linear;
font-family: 'Strait', sans-serif;
}



.main-menu .nav-icon {
  
position:relative;
display:table-cell;
width:55px;
height:36px;
text-align:center;
vertical-align:middle;
font-size:18px;

}

.main-menu .nav-text  {
   
position:relative;
display:table-cell;
vertical-align:middle;
width:190px;
font-family: 'Titillium Web', sans-serif;
}

.main-menu .share {
}



.main-menu .fb-like {

left: 180px;
position:absolute;
top: 15px;
}

.main-menu>ul.logout {
position:absolute;
left:0;
bottom:0;
  
}

.no-touch .scrollable.hover {
overflow-y:hidden;

}

.no-touch .scrollable.hover:hover {
overflow-y:auto;
overflow:visible;
  
}


/* Logo Hover Property */


.settings:hover, settings:focus {   
 /* background:url( https://s17.postimg.org/74cl7s05b/logo_hover.jpg);*/
  -webkit-transition: all 0.2s ease-in-out, width 0, height 0, top 0, left 0;
-moz-transition: all 0.2s ease-in-out, width 0, height 0, top 0, left 0;
-o-transition: all 0.2s ease-in-out, width 0, height 0, top 0, left 0;
transition: all 0.2s ease-in-out, width 0, height 0, top 0, left 0; 
}

.settings:active, settings:focus {   
  background:#f8f9fa;
  -webkit-transition: all 0.1s ease-in-out, width 0, height 0, top 0, left 0;
-moz-transition: all 0.1s ease-in-out, width 0, height 0, top 0, left 0;
-o-transition: all 0.1s ease-in-out, width 0, height 0, top 0, left 0;
transition: all 0.1s ease-in-out, width 0, height 0, top 0, left 0; 
}


a:hover,a:focus {
text-decoration:none;
border-left:0px solid #F7F7F7;



}

nav {
-webkit-user-select:none;
-moz-user-select:none;
-ms-user-select:none;
-o-user-select:none;
user-select:none;
  
}

nav ul,nav li {
outline:0;
margin:0;
padding:0;
}

/* Darker element side menu Start*/


.darkerli
{
background-color:#f8f9fa;
text-transform:capitalize;  
}

.darkerlishadow
{
background-color:#ededed;
text-transform:capitalize;  
-webkit-box-shadow: inset 0px 5px 5px -4px rgba(50, 50, 50, 0.55);
-moz-box-shadow:    inset 0px 5px 5px -4px rgba(50, 50, 50, 0.55);
box-shadow:         inset 0px 5px 5px -4px rgba(50, 50, 50, 0.55);
}


.darkerlishadowdown
{
background-color:#ededed;
text-transform:capitalize;  
-webkit-box-shadow: inset 0px -4px 5px -4px rgba(50, 50, 50, 0.55);
-moz-box-shadow:    inset 0px -4px 5px -4px rgba(50, 50, 50, 0.55);
box-shadow:         inset 0px -4px 5px -4px rgba(50, 50, 50, 0.55);
}

/* Darker element side menu End*/




.main-menu li:hover>a,nav.main-menu li.active>a,.dropdown-menu>li>a:hover,.dropdown-menu>li>a:focus,.dropdown-menu>.active>a,.dropdown-menu>.active>a:hover,.dropdown-menu>.active>a:focus,.no-touch .dashboard-page nav.dashboard-menu ul li:hover a,.dashboard-page nav.dashboard-menu ul li.active a {
color:#fff;
background-color:#00bbbb;
text-shadow: 0px 0px 0px; 
}
.area {
float: left;
background: #e2e2e2;
width: 100%;
height: 100%;
}
@font-face {
  font-family: 'Titillium Web';
  font-style: normal;
  font-weight: 300;
  src: local('Titillium WebLight'), local('TitilliumWeb-Light'), url(http://themes.googleusercontent.com/static/fonts/titilliumweb/v2/anMUvcNT0H1YN4FII8wpr24bNCNEoFTpS2BTjF6FB5E.woff) format('woff');
}



</style>


<nav class="main-menu" style="position: fixed; z-index: 100000;">


  

<div class="settings"></div>
<div class="scrollbar" id="style-1">
      
<ul>
  

  



                            

<li class="darkerli" style="color: #00a8b8">
  <br>
<i class="fa icon icon-attachment fa-lg"></i>
<span class="nav-text">Curso de Introducción al moldeo abdominal</span>
</li>
<hr>


<li class="darkerli">
<a href="docs.modulodemoldeoabdominal.php">
<i class="fa icon icon-play2 fa-lg"></i>
<span class="nav-text">1 Anexo</span>
</a>
</li>

  
<li class="darkerli">
<a href="news-details.php?nid=37">
<i class="fa icon icon-play2 fa-lg"></i>
<span class="nav-text">2 Introducción y Beneficios.</span>
</a>
</li>



  
<li class="darkerli">
<a href="news-details.php?nid=38">
<i class="fa icon icon-play2 fa-lg"></i>
<span class="nav-text">3 Posición del Paciente.</span>
</a>
</li>
  

  
<!--<li class="darkerli">
<a href="news-details.php?nid=39">
<i class="fa icon icon-play2 fa-lg"></i>
<span class="nav-text">3 Posición del Masajista.</span>
</a>
</li>-->


  
<li class="darkerli">
<a href="news-details.php?nid=40">
<i class="fa icon icon-play2 fa-lg"></i>
<span class="nav-text">4 Toma de Medidas.</span>
</a>
</li>


<li class="darkerli">
<a href="news-details.php?nid=41">
<i class="fa icon icon-play2 fa-lg"></i>
<span class="nav-text">5 Renovación Celular.</span>
</a>
</li>

<li class="darkerli">
<a href="news-details.php?nid=42">
<i class="fa icon icon-play2 fa-lg"></i>
<span class="nav-text">6 Reducción Corporal - Abdomen y cintura</span>
</a>
</li>

<li class="darkerli">
<a href="news-details.php?nid=43">
<i class="fa icon icon-play2 fa-lg"></i>
<span class="nav-text">7 Evaluación Teórica</span>
</a>
</li>

<li class="darkerli">
<a href="news-details.php?nid=44">
<i class="fa icon icon-play2 fa-lg"></i>
<span class="nav-text">8 Evaluación Práctica</span>
</a>
</li>

<hr>
<li class="darkerli" style="color: #00a8b8">
<i class="fa icon icon-attachment fa-lg"></i>
<span class="nav-text">Curso de Maniobras generales del masaje</span>
</li>
<hr>
 

<li class="darkerli">
<a href="docs.AnexoMoldeoyReducciondemiembrossuperioreseinferiores.php">
<i class="fa icon icon-play2 fa-lg"></i>
<span class="nav-text">1 Anexo.</span>
</a>
</li>


<li class="darkerli">
<a href="pvt-news-details.php?nid=41">
<i class="fa icon icon-play2 fa-lg"></i>
<span class="nav-text">2 Introducción beneficios del masaje.</span>
</a>
</li>

<li class="darkerli">
<a href="pvt-news-details.php?nid=89">
<i class="fa icon icon-play2 fa-lg"></i>
<span class="nav-text">3 Posición del Masajista.</span>
</a>
</li>

<li class="darkerli">
<a href="pvt-news-details.php?nid=42">
<i class="fa icon icon-play2 fa-lg"></i>
<span class="nav-text">4 Especificaciones de las maniobras.</span>
</a>
</li>


<li class="darkerli">
<a href="pvt-news-details.php?nid=43">
<i class="fa icon icon-play2 fa-lg"></i>
<span class="nav-text">5 Bioseguridad</span>
</a>
</li>


<li class="darkerli">
<a href="pvt-news-details.php?nid=44">
<i class="fa icon icon-play2 fa-lg"></i>
<span class="nav-text">6 Estructura de la piel.</span>
</a>
</li>


<li class="darkerli">
<a href="pvt-news-details.php?nid=45">
<i class="fa icon icon-play2 fa-lg"></i>
<span class="nav-text">7 Estudio de la estructura corporal.</span>
</a>
</li>


<li class="darkerli">
<a href="pvt-news-details.php?nid=46">
<i class="fa icon icon-play2 fa-lg"></i>
<span class="nav-text">8 Clasificación de la obesidad - Valoración del paciente.</span>
</a>
</li>


<li class="darkerli">
<a href="pvt-news-details.php?nid=47">
<i class="fa icon icon-play2 fa-lg"></i>
<span class="nav-text">9 Índice de masa corporal - Peso ideal.</span>
</a>
</li>


<!--<li class="darkerli">
<a href="pvt-news-details.php?nid=48">
<i class="fa icon icon-play2 fa-lg"></i>
<span class="nav-text">8 Reducción corporal - Abdomen y cintura.</span>
</a>
</li>-->




<li class="darkerli">
<a href="pvt-news-details.php?nid=49">
<i class="fa icon icon-play2 fa-lg"></i>
<span class="nav-text">10 Reducción corporal - Miembros superiores.</span>
</a>
</li>



<li class="darkerli">
<a href="pvt-news-details.php?nid=50">
<i class="fa icon icon-play2 fa-lg"></i>
<span class="nav-text">11 Reducción corporal - Miembros inferiores.</span>
</a>
</li>


<li class="darkerli">
<a href="pvt-news-details.php?nid=51">
<i class="fa icon icon-play2 fa-lg"></i>
<span class="nav-text">12 Maniobras preparatorias y específicas.</span>
</a>
</li>


<li class="darkerli">
<a href="pvt-news-details.php?nid=52">
<i class="fa icon icon-play2 fa-lg"></i>
<span class="nav-text">13 Protocolo general del tratamiento.</span>
</a>
</li>


<li class="darkerli">
<a href="pvt-news-details.php?nid=53">
<i class="fa icon icon-play2 fa-lg"></i>
<span class="nav-text">14 Insumos requeridos.</span>
</a>
</li>


<li class="darkerli">
<a href="pvt-news-details.php?nid=54">
<i class="fa icon icon-play2 fa-lg"></i>
<span class="nav-text">15 Cierre de módulo.</span>
</a>
</li>

<li class="darkerli">
<a href="pvt-news-details.php?nid=86">
<i class="fa icon icon-play2 fa-lg"></i>
<span class="nav-text">16 Evidencia práctica I. Maniobras generales.</span>
</a>
</li>

<li class="darkerli">
<a href="pvt-news-details.php?nid=87">
<i class="fa icon icon-play2 fa-lg"></i>
<span class="nav-text">17 Evidencia práctica II. Reducción corporal.</span>
</a>
</li>

<li class="darkerli">
<a href="pvt-news-details.php?nid=88">
<i class="fa icon icon-play2 fa-lg"></i>
<span class="nav-text">18 Test Moldeo y reducción.</span>
</a>
</li>


<hr>
<li class="darkerli" style="color: #00a8b8">
<i class="fa icon icon-attachment fa-lg"></i>
<span class="nav-text">Curso de Drenaje linfático y maderoterapia</span>
</li>
<hr>





<li class="darkerli">
<a href="pvt-news-details.php?nid=55">
<i class="fa icon icon-play2 fa-lg"></i>
<span class="nav-text">1 Introducción y beneficios.</span>
</a>
</li>

<li class="darkerli">
<a href="pvt-news-details.php?nid=56">
<i class="fa icon icon-play2 fa-lg"></i>
<span class="nav-text">2 Sistema linfático.</span>
</a>
</li>

<li class="darkerli">
<a href="pvt-news-details.php?nid=57">
<i class="fa icon icon-play2 fa-lg"></i>
<span class="nav-text">3 Especificaciones de las maniobras de drenaje linfático.</span>
</a>
</li>


<li class="darkerli">
<a href="pvt-news-details.php?nid=58">
<i class="fa icon icon-play2 fa-lg"></i>
<span class="nav-text">4 Drenaje linfático - Miembros superiores (Decúbito supino)</span>
</a>
</li>

<li class="darkerli">
<a href="pvt-news-details.php?nid=59">
<i class="fa icon icon-play2 fa-lg"></i>
<span class="nav-text">5 Drenaje linfático - Miembros inferiores (Decúbito supino)</span>
</a>
</li>

<li class="darkerli">
<a href="pvt-news-details.php?nid=60">
<i class="fa icon icon-play2 fa-lg"></i>
<span class="nav-text">6 Drenaje linfático - Miembros superiores (Decúbito prono)</span>
</a>
</li>


<li class="darkerli">
<a href="pvt-news-details.php?nid=61">
<i class="fa icon icon-play2 fa-lg"></i>
<span class="nav-text">7 Drenaje linfático - Miembros inferiores (Decúbito prono)</span>
</a>
</li>


<li class="darkerli">
<a href="pvt-news-details.php?nid=62">
<i class="fa icon icon-play2 fa-lg"></i>
<span class="nav-text">8 Maderoterapia - Reducción</span>
</a>
</li>


<li class="darkerli">
<a href="pvt-news-details.php?nid=63">
<i class="fa icon icon-play2 fa-lg"></i>
<span class="nav-text">9 Maderoterapia - Celulitis</span>
</a>
</li>

<li class="darkerli">
<a href="pvt-news-details.php?nid=64">
<i class="fa icon icon-play2 fa-lg"></i>
<span class="nav-text">10 Maderoterapia - Tonificación</span>
</a>
</li>

<li class="darkerli">
<a href="pvt-news-details.php?nid=65">
<i class="fa icon icon-play2 fa-lg"></i>
<span class="nav-text">11 Maderoterapia - Relajación</span>
</a>
</li>


<li class="darkerli">
<a href="pvt-news-details.php?nid=66">
<i class="fa icon icon-play2 fa-lg"></i>
<span class="nav-text">12 Cierre de módulo</span>
</a>
</li>




<hr>
<li class="darkerli" style="color: #00a8b8">
<i class="fa icon icon-attachment fa-lg"></i>
<span class="nav-text">Curso de Manejo de aparatología estética</span>
</li>
<hr>



<li class="darkerli">
<a href="pvt-news-details.php?nid=67">
<i class="fa icon icon-play2 fa-lg"></i>
<span class="nav-text">1 Introducción y beneficios.</span>
</a>
</li>


<li class="darkerli">
<a href="pvt-news-details.php?nid=68">
<i class="fa icon icon-play2 fa-lg"></i>
<span class="nav-text">2 Vacumterapia.</span>
</a>
</li>



<li class="darkerli">
<a href="pvt-news-details.php?nid=69">
<i class="fa icon icon-play2 fa-lg"></i>
<span class="nav-text">3 Corrientes exitomotrices</span>
</a>
</li>


<li class="darkerli">
<a href="pvt-news-details.php?nid=70">
<i class="fa icon icon-play2 fa-lg"></i>
<span class="nav-text">4 Ultrasonido</span>
</a>
</li>


<li class="darkerli">
<a href="pvt-news-details.php?nid=71">
<i class="fa icon icon-play2 fa-lg"></i>
<span class="nav-text">5 Ultracavitación</span>
</a>
</li>

<li class="darkerli">
<a href="pvt-news-details.php?nid=72">
<i class="fa icon icon-play2 fa-lg"></i>
<span class="nav-text">6 Lipólisis</span>
</a>
</li>


<li class="darkerli">
<a href="pvt-news-details.php?nid=73">
<i class="fa icon icon-play2 fa-lg"></i>
<span class="nav-text">7 Radiofrecuencia</span>
</a>
</li>


<li class="darkerli">
<a href="pvt-news-details.php?nid=74">
<i class="fa icon icon-play2 fa-lg"></i>
<span class="nav-text">8 Cierre de módulo</span>
</a>
</li>





<hr>
<li class="darkerli" style="color: #00a8b8">
<i class="fa icon icon-attachment fa-lg"></i>
<span class="nav-text">Curso de Protocolos de levantamiento</span>
</li>
<hr>




<li class="darkerli">
<a href="pvt-news-details.php?nid=75">
<i class="fa icon icon-play2 fa-lg"></i>
<span class="nav-text">1 Introducción y beneficios.</span>
</a>
</li>

<li class="darkerli">
<a href="pvt-news-details.php?nid=76">
<i class="fa icon icon-play2 fa-lg"></i>
<span class="nav-text">2 Protocolo de levantamiento de glúteos.</span>
</a>
</li>

<li class="darkerli">
<a href="pvt-news-details.php?nid=77">
<i class="fa icon icon-play2 fa-lg"></i>
<span class="nav-text">3 Técnicas reafirmantes.</span>
</a>
</li>

<li class="darkerli">
<a href="pvt-news-details.php?nid=78">
<i class="fa icon icon-play2 fa-lg"></i>
<span class="nav-text">4 Técnicas reafirmantes - Abdomen.</span>
</a>
</li>

<li class="darkerli">
<a href="pvt-news-details.php?nid=79">
<i class="fa icon icon-play2 fa-lg"></i>
<span class="nav-text">5 Técnicas reafirmantes - Miembros inferiores.</span>
</a>
</li>


<li class="darkerli">
<a href="pvt-news-details.php?nid=80">
<i class="fa icon icon-play2 fa-lg"></i>
<span class="nav-text">6 Técnicas anticelulíticas.</span>
</a>
</li>


<li class="darkerli">
<a href="pvt-news-details.php?nid=81">
<i class="fa icon icon-play2 fa-lg"></i>
<span class="nav-text">7 Técnicas anticelulíticas - Abdomen.</span>
</a>
</li>

<li class="darkerli">
<a href="pvt-news-details.php?nid=82">
<i class="fa icon icon-play2 fa-lg"></i>
<span class="nav-text">8 Técnicas anticelulíticas - Miembros inferiores.</span>
</a>
</li>


<li class="darkerli">
<a href="pvt-news-details.php?nid=83">
<i class="fa icon icon-play2 fa-lg"></i>
<span class="nav-text">9 Técnicas reductoras.</span>
</a>
</li>


<li class="darkerli">
<a href="pvt-news-details.php?nid=84">
<i class="fa icon icon-play2 fa-lg"></i>
<span class="nav-text">10 Técnicas reductoras - Abdomen.</span>
</a>
</li>

</ul>
</ul>
        </nav>
</div>

<!--<div id="fb-root"></div>
<script>(function(d, s, id) {
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id)) return;
js = d.createElement(s); js.id = id;
js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5&appId=443271375714375";
fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
jQuery(document).ready(function($) {
$(window).bind("load resize", function(){  
setTimeout(function() {
var container_width = $('#container').width();    
$('#container').html('<div class="fb-page" ' + 
'data-href="http://www.facebook.com/facebook"' +
' data-width="' + container_width + '" data-tabs="timeline" data-small-header="true" data-height="450" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="http://www.facebook.com/facebook"><a href="http://www.facebook.com/facebook"></a></blockquote></div></div>');
FB.XFBML.parse( );    
}, 100);  
}); 
});
</script>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v3.2"></script>
<style>
.rotar:hover {-webkit-transform: rotate(360deg);transform: rotate(360deg);
transition:all .5s ease-in-out; 
}
</style>-->