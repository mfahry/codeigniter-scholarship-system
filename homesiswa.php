<?php

session_start();

if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses halaman ini, Anda harus login <br>";
  echo "<a href=index.php><b>LOGIN</b></a></center>";
}
else{
?>

<html>
	<head> 
	<?php include "slices/header.php";?>
	<script type="text/javascript" src="js/validasi.js"></script>
	</head>
		<body>
		<img src="images/title.jpg" width="1366">
			<?php include "slices/topmenu.php";?>
			
			<div id="footer" >
			<?php include "slices/footer.php";?>
				<p align="center" </p>
			</div>
			<?php
			include "menu.php";
			?>

			
		</body>
</html>
<?php
}
?>
