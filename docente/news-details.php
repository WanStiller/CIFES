<?php 
session_start();
include('includes/config.php');

if (empty($_SESSION['token'])) {
 $_SESSION['token'] = bin2hex(random_bytes(32));
}

if(isset($_POST['submit']))
{

if (!empty($_POST['csrftoken'])) {
    if (hash_equals($_SESSION['token'], $_POST['csrftoken'])) {
$name=$_POST['name'];
$email=$_POST['email'];
$comment=$_POST['comment'];
$postid=intval($_GET['nid']);
$st1='0';
$query=mysqli_query($con,"insert into tblcomments(postId,name,email,comment,status) values('$postid','$name','$email','$comment','$st1')");
if($query):
  echo "<script>alert('Comentario enviado exitosamente; está siendo revisado por nuestro equipo de soporte para aprobar su publicación en el sitio. ');</script>";
  unset($_SESSION['token']);
else :
 echo "<script>alert('Error. Intentar nuevamente.');</script>";  
endif;
}
}
}
?>
<?php require_once 'includes/special.php'; ?>
  <body>

   <?php include('includes/header.php');?>

    <div class="container">
      <div class="row" style="margin-top: 4%">
        <div class="col-md-8">
<?php
$pid=intval($_GET['nid']);
 $query=mysqli_query($con,"select tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.id='$pid'");
while ($row=mysqli_fetch_array($query)) {
?>

          <div class="card mb-4">
      
            <div class="card-body">
              <h2 class="card-title"><?php echo htmlentities($row['posttitle']);?></h2>
              <p><b>Categor&iacute;a : </b> <a href="category.php?catid=<?php echo htmlentities($row['cid'])?>"><?php echo htmlentities($row['category']);?></a> |
                <b>Sub Categor&iacute;a : </b><?php echo htmlentities($row['subcategory']);?> <b> Posteado el </b><?php echo htmlentities($row['postingdate']);?></p>
                <hr />
 <img class="img-fluid rounded" src="admin/postimages/<?php echo htmlentities($row['PostImage']);?>" alt="<?php echo htmlentities($row['posttitle']);?>">
              <p class="card-text"><?php 
$pt=$row['postdetails'];
              echo  (substr($pt,0));?></p>
            </div>
            <div class="card-footer text-muted">
            </div>
          </div>
<?php } ?>
      </div>
        <!-- Sidebar Widgets Column -->
      <?php include('includes/sidebar.php');?>
      </div>
 <div class="row" style="margin-top: -8%">
   <div class="col-md-8">
<div class="card my-4">
            <h6 class="card-header" style="color: #fff; font-weight: normal;">Publicar un comentario:</h6>
            <div class="card-body">
              <form name="Comment" method="post">
      <input type="hidden" name="csrftoken" value="<?php echo htmlentities($_SESSION['token']); ?>" />
 <div class="form-group">
<input type="text" name="name" class="form-control" placeholder="Ingrese su nombre" required>
</div>
 <div class="form-group">
 <input type="email" name="email" class="form-control" placeholder="ingresesu direcci&oacute;n de Email" required>
 </div>
                <div class="form-group">
                  <textarea class="form-control" name="comment" rows="3" placeholder="Comentario" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Postear</button>
              </form>
            </div>
          </div>
 <?php 
 $sts=1;
 $query=mysqli_query($con,"select name,comment,postingDate from  tblcomments where postId='$pid' and status='$sts'");
while ($row=mysqli_fetch_array($query)) {
?>
<div class="media mb-4">
            <img class="d-flex mr-3 rounded-circle" src="images/usericon.png" alt="">
            <div class="media-body">
              <h5 class="mt-0"><?php echo htmlentities($row['name']);?> <br />
                  <span style="font-size:11px;"><b>at</b> <?php echo htmlentities($row['postingDate']);?></span>
            </h5>
             <?php echo htmlentities($row['comment']);?>            </div>
          </div>
<?php } ?>
        </div>
      </div>
    </div>
    <?php include('includes/footer.php');?>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  </body>
  <?php include 'includes/fb.php'; ?>
</html>
