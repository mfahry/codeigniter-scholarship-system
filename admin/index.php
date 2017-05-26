<html>
<head>
	<?php include "slices/header.php";?>
	<title>Home</title>
	<script type="text/javascript" src="js/validasi.js"></script>
</head>
<body>
<img src="images/title.jpg" width="1366">
	<?php include "slices/topmenu.php";?>
	<form method="POST" action="cek_login.php">
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="span12">
				<div class="well">
					<div class="row-fluid">
						<div class="span6">
							<h5>Selamat Datang di Aplikasi Penerimaan Beasiswa</h5>
						</div>
						<div class="span6">
							<form class="form-horizontal" method="post">
								<legend>User Login</legend>
								<fieldset>
									<div class="control-group">
										<label class="control-label">Username</label>
										<div class="controls">									
											<div class="input-prepend">
												<span class="add-on"><i class="icon-user"></i></span>
												<input type="text" name="username">
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
											<a href="daftar.php" class="btn btn-link">Daftar Beasiswa</a>
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
	<div id="footer">
		<?php include "slices/footer.php";?>
		Contact Us : SMA 1 Dayueh Kolot Jalan Sukapura No.99, Kabupaten Bandung, 022 8752138
	</div>
</body>
</html>
