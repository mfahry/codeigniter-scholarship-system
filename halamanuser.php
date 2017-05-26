<?php
session_start();

if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=index.php><b>LOGIN</b></a></center>";
}
else{
?>

<html>
	<head> <title></title>
	<script type="text/javascript" src="../nicEdit.js"></script>
	<script type="text/javascript">
	bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
	</script>
	</script>
	<link href="style.css" rel="stylesheet" type="text/css" />
	</head>
		<body>
			<div id="header">
				
			</div>
				<div id="menu">
					<ul id="nav">
						<li><a href=?module=home>Home</a></li>
						<li><a href=?module=stop> Daftar Siswa</a></li>
						<li><a href=?module=runkmeans> Seleksi Beasiswa</a></li>
						<li><a href="logout.php">Logout</a></li>
					</ul>
				</div>
				<div id="content">
					
					
					
				</div>
			<div id="footer" >
				<p align="center">Contact Us : SMA 1 Dayueh Kolot Jalan Sukapura No.99, Kabupaten Bandung, 022 8752138 </p>
			</div>
			
		</body>
</html>
<?php
}
?>