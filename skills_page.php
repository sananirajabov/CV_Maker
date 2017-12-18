<?php include 'backend/session.php';?>
<?php include 'common/header.php';?>
<title>Skills</title>
<?php include 'common/body.php';?>
<?php include 'backend/skills.php';?>
<div class="user-dashboard">
	<form class="" action="" method="get">
		<h1>Skills</h1>
		<div class="row">
			<div class="col-md-6 col-sm-5 col-xs-12 gutter">
				<div class="form-group">
					<label for="skill">Skills</label> <input id="skill" name="skill"
						value="" placeholder="Skill" type="text" class="form-control" /><br>
				</div>
			</div>

			<div class="col-md-6 col-sm-5 col-xs-12 gutter">
				<div class="form-group">
					<label for="level">Level</label> <select id="level"
						class="form-control" name="level">
						<option>Beginner</option>
						<option>Experienced</option>
						<option>Professional</option>
						<option>Expert</option>
					</select> <br>
				</div>
			</div>
			<div class="col-md-12 col-sm-5 col-xs-12 gutter">
				<div class="form-group">
					<table class="table" style="background: #fff;" id="languages">
						<thead>
							<tr>
								<td>Skills</td>
								<td>Level</td>
							</tr>
						</thead>
						<tbody>
					<?php listSkills(); ?>
				</tbody>
					</table>
					<br>
				</div>
			</div>
		</div>


		<br> <input type="submit" name="submit" class="btn btn-primary"> <input
			type="reset" class="btn btn-danger">
	</form>
	<br>
<?=showError($error)?>
</div>
<?php include 'common/footer.php';?>
