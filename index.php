<html>
<head>
	<?php include "index/header.php";?>
	<title>Home</title>
	<script type="text/javascript" src="js/validasi.js"></script>
</head>
<body>
<div style= "width:1100px; margin:0 auto; padding: 10px auto;">
	<?php include "index/body_header.php" ?>
	<?php include "index/topmenu.php";?>
	<form method="POST" action="login_cek.php">
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="span12">
				<div class="well">
					<div class="row-fluid">
						<div class="span6">
							<h5> <font color="#">Selamat Datang di Aplikasi Penerimaan Beasiswa</font><br> <br>
								Aplikasi ini menggunakan metode Simple Addictive Weighting 
							</h5>
						</div>
						<div class="span6">
							<form class="form-horizontal" method="post" action="login_cek.php">
								<legend>User Login</legend>
								<fieldset>
									<div class="control-group">
										<label class="control-label">Username</label>
										<div class="controls">									
											<div class="input-prepend">
												<span class="add-on"><i class="icon-user"></i></span>
												<input type="text" name="username" placeholder="Username">
											</div>																	
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Password</label>
										<div class="controls">
											<div class="input-prepend">
												<span class="add-on"><i class="icon-lock"></i></span>
												<input type="password" name="password" placeholder="Password">
											</div>
										</div>
									</div>
									<div class="control-group">
										<div class="controls">
											<button type="submit" class="btn btn-primary"><i class="icon-ok icon-white"></i>Submit</button>
											<button type="reset" class="btn btn-danger"><i class="icon-remove icon-white"></i>Cancel</button>
										</div>
									</div>
								</fieldset>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
<footer>
	<?php include "index/footer.php";?>
</footer>
</html>
