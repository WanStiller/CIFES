<div style="margin-left: 2.5%">
<div class="row" style="color: #B9B9B9;">
<p><?php $query=mysqli_query($con,"select * from user where Is_Active=1");
$countposts=mysqli_num_rows($query);
?>
<?php echo htmlentities($countposts);?> <small></small>Alumnos Inscritos&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
<br>
<p> <?php $query=mysqli_query($con,"select * from tblposts where Is_Active=1");
$countposts=mysqli_num_rows($query);
?>
<?php echo htmlentities($countposts);?> <small></small>Clases Gratuitas&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
<br>
<p> <?php $query=mysqli_query($con,"select * from pvttblposts where Is_Active=1");
$countposts=mysqli_num_rows($query);
?>
<?php echo htmlentities($countposts);?> <small></small>Clases Premium&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
</div>
</div>