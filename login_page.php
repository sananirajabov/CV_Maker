<?php include 'common/header.php';?>
<?php include 'backend/login.php';?>
<title>Login</title>
</head>
<body style="background-color: #607D8B">
	<div class="container">
		<div class="row">
			<div class='col-md-4'></div>
			<div class="col-md-4">
				<div class="login-box well">
					<form action="" method="post">
						<legend>Login</legend>
						<div class="form-group">
							<label for="email">Email</label> <input value='<?=$email; ?>'
								id="email" name="email" placeholder="Email" type="email"
								class="form-control" />
						</div>
						<div class="form-group">
							<label for="password">Password</label> <input id="password"
								value='' name="password" placeholder="Password" 
								type="password" autocomplete="new-password" class="form-control" /><br>
						</div>

						<div class="form-group">
							<input type="submit" name="submit"
								class="btn btn-primary btn-login-submit btn-block m-t-md"
								value="Login" />
						</div>
						<div class="form-group">
							<a href="registration_page.php" class="btn btn-info btn-block m-t-md">Create
								an account</a>
						</div>
					</form>
					<?php showError($error);?>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
