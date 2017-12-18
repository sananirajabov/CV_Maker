<?php include 'backend/session.php';?>
<?php include 'common/header.php';?>
<title>Languages</title>
<?php include 'common/body.php';?>
<?php include 'backend/languages.php';?>
<div class="user-dashboard">
	<form class="" action="" method="get">
		<h1>Languages</h1>
		<div class="row">
			<div class="col-md-6 col-sm-12 col-xs-12 gutter">
				<div class="form-group">
					<label for="language">Language</label> <input id="language"
						name="language" value='' placeholder="Language" type="text"
						class="form-control" /><br>
				</div>
			</div>

			<div class="col-md-6 col-sm-12 col-xs-12 gutter">
				<div class="form-group">
					<label for="level">Level</label> <select id="level"
						class="form-control" name="level">
						<option>Beginner</option>
						<option>Profession</option>
						<option>Intermediate</option>
						<option>Advanced</option>
					</select> <br>
				</div>
			</div>

			<div class="col-md-12 col-sm-12 col-xs-12 gutter">
				<div class="form-group">
					<label for="level">Languages</label>
					<table class="table" style="background: #fff;" id="languages">
						<thead>
							<tr>
								<td>Languages</td>
								<td>Level</td>
							</tr>
						</thead>
						<tbody>
							<?php listLanguages(); ?>
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