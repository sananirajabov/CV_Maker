<?php include 'backend/session.php';?>
<?php include 'common/header.php';?>
<title>Contact Information</title>
<?php include 'common/body.php';?>
<?php include 'backend/contact.php';?>
<div class="user-dashboard">
	<form class="" action="" method="get">
		<h1>Contact Information</h1>
		<div class="row">
			<div class="col-md-5 col-sm-5 col-xs-12 gutter">
				<div class="form-group">
					<label for="address">Address</label>
					<textarea id="address" name="address"
						placeholder="Address" rows="1" class="form-control"><?=getAddress(); ?></textarea>
					<br>
				</div>
				<div class="form-group">
					<label for="mobile_number">Mobile Number</label> <input
						id="mobile_number" name="mobile_number" value="<?=getMobileNumber(); ?>"
						placeholder="Mobile Number" type="number" class="form-control" /><br>
				</div>
				<div class="form-group">
					<label for="home_number">Home Number</label> <input
						id="home_number" name="home_number" value="<?=getHomeNumber(); ?>"
						placeholder="Home Number" type="number" class="form-control" /><br>
				</div>
				<div class="form-group">
					<label for="linkedin_address">Linkedin Address</label> <input
						id="linkedin_address" name="linkedin_address" value='<?=getLinkedinAddress(); ?>'
						placeholder="Linkedin Address" type="url" class="form-control" /><br>
				</div>
			</div>

			<div class="col-md-5 col-sm-5 col-xs-12 gutter">
				<div class="form-group">
					<label for="email_primary">Email (Primary)</label> <input
						id="email_primary" value='<?=getEmail(); ?>' type="text" class="form-control"
						disabled /><br>
				</div>
				<div class="form-group">
					<label for="email_secondary">Email (Secondary)</label> <input
						id="email_secondary" name="email_secondary" value="<?=getEmailSecondary(); ?>"
						placeholder="Email Secondary" type="email" class="form-control" /><br>
				</div>
				<div class="form-group">
					<label for="facebook_address">Facebook Address</label> <input
						id="facebook_address" name="facebook_address" value="<?=getFacebookAddress(); ?>"
						placeholder="Facebook Address" type=""url"" class="form-control" /><br>
				</div>
				<div class="form-group">
					<label for="twitter_address">Twitter Address</label> <input
						id="twitter_address" name="twitter_address" value="<?=getTwitterAddress(); ?>"
						placeholder="Twitter Address" type=""url"" class="form-control" /><br>
				</div>
			</div>
		</div>
		<br> <input type="submit" name="submit" class="btn btn-primary"> <input type="reset"
			class="btn btn-danger">
	</form><br>
	<?php showError($error)?>
</div>
<?php include 'common/footer.php';?>