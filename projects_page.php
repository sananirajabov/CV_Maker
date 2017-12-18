<?php include 'backend/session.php';?>
<?php include 'common/header.php';?>
<title>Projects</title>
<?php include 'common/body.php';?>
<?php include 'backend/projects.php';?>
<div class="user-dashboard">
	<form class="" action="" method="get">
		<h1>Projects</h1>
		<div class="row">
			<div class="col-md-4 col-sm-5 col-xs-12 gutter">
				<div class="form-group">
					<label for="project_name">Project Name</label> <input
						id="project_name" name="project_name" value=''
						placeholder="Project Name" type="text" class="form-control" /><br>
				</div>
			</div>

			<div class="col-md-4 col-sm-5 col-xs-12 gutter">
				<div class="form-group">
					<label for="project_detail">Project Detail</label>
					<textarea id="project_detail" name="project_detail" maxlength="50"
						value='' rows="1" placeholder="Project Detail" type="text"
						class="form-control"></textarea>
					<br>
				</div>
			</div>

			<div class="col-md-2 col-sm-5 col-xs-12 gutter">
				<div class="form-group">
					<label for="project_start_date">Start Date</label> <input
						id="project_start_date" name="project_start_date" value=''
						placeholder="Start Date" type="date" class="form-control" /> <br>
				</div>
			</div>

			<div class="col-md-2 col-sm-5 col-xs-12 gutter">
				<div class="form-group">
					<label for="project_stop_date">Stop Date</label> <input
						id="project_stop_date" name="project_stop_date" value=''
						placeholder="Stop Date" type="date" class="form-control" /> <br>
				</div>
			</div>

			<div class="col-md-12 col-sm-5 col-xs-12 gutter">
				<table class="table" style="background: #fff;" id="languages">
					<thead>
						<tr>
							<td>Project Name</td>
							<td>Project Detail</td>
							<td>Project Start Date</td>
							<td>Project Stop Date</td>
						</tr>
					</thead>
					<tbody>
						<?php listProjectValues(); ?>
					</tbody>
				</table>
				<br>
			</div>
		</div>
		<br> <input type="submit" name="submit" class="btn btn-primary"> <input
			type="reset" class="btn btn-danger">
	</form>
	<br>
	<?=showError($error); ?>
</div>
<?php include 'common/footer.php';?>
