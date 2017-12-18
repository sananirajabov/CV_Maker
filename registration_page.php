<?php include 'common/header.php';?>
<?php include 'backend/registration.php';?>
<title>Registration</title>
</head>
<body style="background-color: #607D8B">
	<div class="container">
		<div class="row">
			<div class='col-md-4'></div>
			<div class="col-md-4">
				<div class="registration-box well">
					<form action="" method="post">
						<legend>Registration</legend>
						<div class="form-group">
							<label for="fullname">Fullname</label> <input value='<?=$fullname?>'
								id="fullname" name="fullname" placeholder="Fullname" type="text"
								class="form-control" />
						</div>
						<div class="form-group">
							<label for="email">Email</label> <input value='<?=$email?>'
								id="email" name="email" placeholder="Email" type="email"
								class="form-control" />
						</div>
						<div class="form-group">
							<label for="password">Password</label> <input id="password"
								value='' name="password" placeholder="Password" type="password" class="form-control" />
						</div>
						<div class="form-group">
							<label for="confirm">Confirm Password</label> <input id="confirm"
								value='' name="confirm" placeholder="Confirm Password" type="password"
								class="form-control" /><br>
						</div>
						<div class="form-group">
							<input type="submit" name="submit"
								class="btn btn-info btn-login-submit btn-block m-t-md"
								value="Registration" />
						</div>
						<div class="form-group">
							<a href="login_page.php" class="btn btn-primary btn-block m-t-md">Login</a>
						</div>
					</form>
					<?php showError($error); ?>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
