<?php include 'backend/session.php';?>
<?php include 'common/header.php';?>
<title>Education</title>
<?php include 'common/body.php';?>
<?php include 'backend/education.php';?>
<div class="user-dashboard">
	<form class="" action="" method="get">
		<h1>Education</h1>
		<div class="row">
			<div class="col-md-2 col-sm-5 col-xs-12 gutter">
				<div class="form-group">
					<label for="education_start_date">Start Date</label> <input
						id="education_start_date" name="education_start_date" value=''
						placeholder="Start Date" type="date" class="form-control" /><br>
				</div>
			</div>
			<div class="col-md-2 col-sm-5 col-xs-12 gutter">
				<div class="form-group">
					<label for="education_stop_date">Stop Date</label> <input
						id="education_stop_date" name="education_stop_date" value=''
						placeholder="Stop Date" type="date" class="form-control" /><br>
				</div>
			</div>
			<div class="col-md-2 col-sm-5 col-xs-12 gutter">
				<div class="form-group">
					<label for="education_degree">Degree</label> <input
						id="education_degree" name="education_degree" value=''
						placeholder="Degree" type="text" class="form-control" /><br>
				</div>
			</div>
			<div class="col-md-3 col-sm-5 col-xs-12 gutter">
				<div class="form-group">
					<label for="education_place">School/University</label> <input
						id="education_place" name="education_place" value=''
						placeholder="School/University" type="text" class="form-control" /><br>
				</div>
			</div>
			<div class="col-md-3 col-sm-5 col-xs-12 gutter">
				<div class="form-group">
					<label for="education_department">Department</label> <input
						id="education_department" name="education_department" value=''
						placeholder="Department" type="text" class="form-control" /><br>
				</div>
			</div>
			<div class="col-md-12 col-sm-5 col-xs-12 gutter">
				<div class="form-group">
					<table class="table" style="background: #fff;" id="languages">
						<thead>
							<tr>
								<td>Start Date</td>
								<td>Stop Date</td>
								<td>Degree</td>
								<td>School/University</td>
								<td>Department</td>
							</tr>
						</thead>
						<tbody>
							<?php listEducationValues(); ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<br> <input type="submit" name="submit" class="btn btn-primary"> <input type="reset"
			class="btn btn-danger">
	</form><br>
	<?=showError($error);?>
</div>
<?php include 'common/footer.php';?>
