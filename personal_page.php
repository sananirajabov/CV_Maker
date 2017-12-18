<?php include 'backend/session.php';?>
<?php include 'common/header.php';?>
<?php include 'backend/personal.php';?>
<title>Personal Information</title>
<?php include 'common/body.php';?>
<div class="user-dashboard">
	<form class="" action="" method='get'>
		<h1>Personal Information</h1>
		<div class="row">
			<div class="col-md-5 col-sm-5 col-xs-12 gutter">
				<div class="form-group">
					<label for="fullname">Fullname</label> <input id="fullname"
						value='<?=getFullname(); ?>' name="fullname" type="text" class="form-control" /><br>
				</div>
				<div class="form-group">
					<label for="date_of_birth">Date of Birth</label> <input
						id="date_of_birth" name="date_of_birth" value='<?=getDateOfBirth(); ?>' placeholder="Date of Birth"
						type="date" class="form-control" /><br>
				</div>
				<div class="form-group">
					<label for="martial_status">Martial Status</label> <input
						id="martial_status" name="martial_status" value='<?=getMartialStatus(); ?>' placeholder="Martial Status"
						type="text" class="form-control" />
				</div>
			</div>

			<div class="col-md-5 col-sm-5 col-xs-12 gutter">
				<div class="form-group">
					<label for="job_title">Job Title (ex. Software Engineer)</label> <input
						id="job_title" name="job_title" maxlength="30" value='<?=getJobTitle(); ?>' placeholder="Job Title" type="text"
						class="form-control" /><br>
				</div>
				<div class="form-group">
					<label for="place_of_birth">Place of Birth</label> <input
						id="place_of_birth" name="place_of_birth" value='<?=getPlaceOfBirth(); ?>' placeholder="Place of Birth"
						type="text" class="form-control" /><br>
				</div>
				<div class="form-group">
					<label for="gender">Gender</label><input
						id="gender" name="gender" value='<?=getGender(); ?>' placeholder="Gender"
						type="text" class="form-control" />
				</div>
			</div>
		</div>
		<br> <input type="submit" name="submit" class="btn btn-primary"> <input type="reset"
			class="btn btn-danger">
	</form><br>
	<?php showError($error);?>
</div>
<?php include 'common/footer.php';?>
