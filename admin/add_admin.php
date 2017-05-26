<html>
	<head>
	<?php
	session_start();
	include "koneksi.php";
	
	?>
	</head>
 <body>
 

<div class="container">
	<div class="row">
		<div class="span4"></div>
		<div class="span4">
		<form name="user_reg" method="post" action="daftar_proses.php" id="in_reg" class="form-horizontal">
			<fieldset>
			<div align="center"><legend>Pendaftaran Admin</legend></div>
			<div class="control-group">
				<label class="control-label">Username</label>
				<div class="controls">
					<input type="text" id="username" name="username" size="60" required=""/>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Password</label>
				<div class="controls">
					<input type="password" id="pass" name="pass" size="60" required=""/>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Nama Lengkap</label>
				<div class="controls">
					<input type="text" id="nama" name="nama" size="60" required=""/>
				</div>
			</div>
			<div class="control-group">
				<div class="controls">
					<button type="submit" class="btn btn-primary"><i class="icon-ok icon-white"></i> Save</button>
				</div>
			</div>
			</fieldset>
		</form> 
		</div>
		<div class="span4"></div>
	</div>
</div>
</body>
</html>
<?php
$Post
?>
