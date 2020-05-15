<?php
include('includes/config.php'); ?>
<?php require_once 'includes/special.php'; ?>
<body>
<?php include('includes/header.php');?>
<div class="container-fluid" style="margin-top: 30px; max-width: 1440px;">
<?php 
$pagetype='contactus';
$query=mysqli_query($con,"select PageTitle,Description from tblpages where PageName='$pagetype'");
while($row=mysqli_fetch_array($query))
{
?>
<h1 class="mt-4 mb-3"><?php echo htmlentities($row['PageTitle'])?>
</h1>
<ol class="breadcrumb">
<li class="breadcrumb-item">
<a href="index.php">Portada</a>
</li>
<li class="breadcrumb-item active">Contacto</li>
</ol>
<div class="row">
<div class="col-lg-12">
<p><?php echo $row['Description'];?></p>
</div>
</div>
<?php } ?>
</div>
<?php include('includes/footer.php');?>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
<?php include 'includes/fb.php'; ?>
</html>