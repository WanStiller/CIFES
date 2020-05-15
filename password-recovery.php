<?php 
session_start();
include 'includes/config.php' ; ?>
<?php require_once 'includes/special.php'; ?>
<body>
<?php include 'includes/header.php';?>
<div class="container">

	<div class="row">
		<div class="col-sm-2"></div>
		<div class="col-sm-8">
			
			<?php
			include 'cone.php';
			
			$email = $_POST['email'];				
			$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

			// Check connection
			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}
				
			$sql = "SELECT email, password FROM user WHERE email='$email'";				
			$result = mysqli_query($conn, $sql);
				
			if (mysqli_num_rows($result) > 0) {				
				$row = mysqli_fetch_assoc($result);
				
				$subject = "Contraseña de Cifes Virtual";
				$body = "Su contraseña es:" . $row['password'];
				
				$headers = 'From: gerencia@tetengoelregalo.com' . "\r\n" .
				'Reply-To: gerencia@tetengoelregalo.com' . "\r\n" .
				'X-Mailer: PHP/' . phpversion();
				
				mail($email, $subject, $body, $headers);				
				
				echo "<div class='alert alert-success alert-dismissible mt-4' role='alert' style='margin-top:10%'>
				<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
				<span aria-hidden='true'>&times;</span></button>

				<p>Correo electrónico enviado! Por favor chequee su bandeja de entrada, incluyendo la carpeta SPAM.</p></div>";
			} else {
				echo "Lo sentimos, pero su dirección de correo electrónico no se encuentra en nuestra base de datos.";
			}
			?>
		</div>
		<div class="col-sm-2"></div>
	</div>

</div>
<?php include('includes/footer.php');?>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
<?php include 'includes/fb.php'; ?>
</html>