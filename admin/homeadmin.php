<?php
error_reporting(E_ALL ^ E_NOTICE);
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
	<?php include "../index/header.php";?>
	<script type="text/javascript" src="js/validasi.js"></script>
	</head>
		<body bgcolor="#E6E6FA">
			<?php include "../index/body_header.php" ?>	
			<div style= "width:1100px; margin:0 auto; padding: 10px auto;">
				<?php include "slices/topmenu.php";?>
				<div>
				<?php
				include "menu.php";
				?>
				</div>
				<div id="footer" >
				<?php include "../index/footer.php";?>
					<p align="center" </p>
				</div>
			</div>	
		</body>
</html>
<?php
}
?>
