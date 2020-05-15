<div id="fb-root"></div>
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
'data-href="http://www.facebook.com/CifesOnline/"' +
' data-width="' + container_width + '" data-tabs="timeline" data-small-header="true" data-height="1224" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="http://www.facebook.com/CifesOnline/"><a href="http://www.facebook.com/CifesOnline/"></a></blockquote></div></div>');
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
</style>
<style>
.barrasocial {
width: 100%;
max-width: 110px;
position: fixed;
right: 10px;
z-index: 2000;
}
.barrasocial nav ul li{
list-style:  none;
padding: 5%;
}
.barrasocial nav ul li a > img {
/*border: 5px solid white;*/
width: 100%;
border-radius: 50%;
/*box-shadow: 0px 0px 30px 5px #111111;*/
}
</style>
<!--<div class="barrasocial" style="top: 40%; margin-right:-1%;">
<nav><ul>
<li><a href="" target="_blank">
<img src="images/whatsapp.gif" alt="" class="rotar">
</a></li>
<li><a href="https://www.instagram.com/" target="_blank">
<img src="images/instagram.gif" alt="" class="rotar">
</a></li>
<li><a href="https://www.facebook.com/" target="_blank">
<img src="images/CifesOnline/.gif" alt="" class="rotar">
</a></li>
<li><a href="https://drive.google.com/" target="_blank">
<img src="images/drive.gif" alt="" class="rotar">
</a></li>
</ul></nav>
</div>-->