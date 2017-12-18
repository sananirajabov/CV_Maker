<?php include 'backend/session.php';?>
<?php include 'common/header.php';?>
<title>Work Experience</title>
<?php include 'common/body.php';?>
<?php include 'backend/experience.php';?>
<div class="user-dashboard">
	<form class="" action="" method="get">
		<h1>Work Experience</h1>
		<div class="row">
			<div class="col-md-5 col-sm-5 col-xs-12 gutter">
				<div class="form-group">
					<label for="start_date_one">Start Date</label> <input
						id="start_date" name="start_date" value=''
						placeholder="Start Date" type="date" class="form-control" /><br>
				</div>
				<div class="form-group">
					<label for="end_date">End Date</label> <input id="end_date_one"
						name="end_date" value='' placeholder="End Date" type="date"
						class="form-control" /><br>
				</div>
				<br>
			</div>

			<div class="col-md-7 col-sm-5 col-xs-12 gutter">
				<div class="form-group">
					<label for="place">Place</label> <input id="place_one"
						name="place" value='' placeholder="Place" type="text"
						class="form-control" /><br>
				</div>
				<div class="form-group">
					<label for="position">Position</label> <input id="position_one"
						name="position" value='' placeholder="Position" type="text"
						class="form-control" /><br>
				</div>
				<br>
			</div>
			<div class="col-md-12 col-sm-5 col-xs-12 gutter">
				<table class="table" style="background: #fff;" id="languages">
					<thead>
						<tr>
							<td>Start Date</td>
							<td>End Date</td>
							<td>Place</td>
							<td>Position</td>
						</tr>
					</thead>
					<tbody>
						<?php listExperienceValues();?>
					</tbody>
				</table>
				<br>
			</div>
		</div>
		<br> <input type="submit" name="submit" class="btn btn-primary"> <input type="reset"
			class="btn btn-danger">
	</form><br>
	<?=showError($error); ?>
</div>
<?php include 'common/footer.php';?>
