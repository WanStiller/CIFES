<div class="col-md-3" style="filter: grayscale(50%);">
<!--<h5 class="card-header">Buscar</h5>-->
<form name="search" action="search.php" method="post" style="width: 100%;">
<div class="input-group">           
<input type="text" name="searchtitle" class="form-control" placeholder="Buscar..." required>
<span class="input-group-btn">
<button class="btn btn-primary" type="submit"><img src="images/lupa.png" style="width: 16px; height: auto;"></button>
</span>
</form>
</div>
<!--<div class="card my-4">
<h6 class="card-header" style="color: #fff; font-weight: normal;">Categor&iacute;as</h6>


<div class="card-body">
<div class="row">
<div class="col-lg-6">
<ul class="list-unstyled mb-0">
<?php $query=mysqli_query($con,"select id,CategoryName from tblcategory");
while($row=mysqli_fetch_array($query))
{
?>
<li>
<a href="category.php?catid=<?php echo htmlentities($row['id'])?>"><?php echo htmlentities($row['CategoryName']);?></a>
</li>
<?php } ?>
</ul>
</div>
</div>
</div>
</div>-->


<div class="card my-4">
<h6 class="card-header" style="color: #fff; font-weight: normal;">Contenido Reciente</h6>

<?php require_once 'includes/recents.php' ; //Columna de contenido reciente ?>

</div>



<!-- Facebook -->
<!--<div id="container" style="width:100%;" class="fb-page" data-href="https://www.facebook.com/facebook/" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/facebook/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/facebook/">facebook</a></blockquote></div>-->
<!-- End facebook -->
<br>
<br>
</div>