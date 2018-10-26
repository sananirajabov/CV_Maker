<?php include 'backend/session.php';?>
<?php include 'common/header.php';?>
<title>Aditional Information</title>
<?php include 'common/body.php';?>
<?php include 'backend/additional.php';?>
<div class="user-dashboard">
	<form class="" action="" method="GET">
		<h1>Aditional Information</h1>
		<div class="row">
			<div class="col-md-10 col-sm-5 col-xs-12 gutter">
				<div class="form-group">
					<textarea name="additional_info" id="additional_info" rows="10"
						cols="100"><?=getAdditionalInfo();?></textarea>
				</div>
			</div>
		</div>
		<br> <input type="submit" name="submit" class="btn btn-primary"> <input type="reset"
			class="btn btn-danger">
	</form>
</div>
<?php include 'common/footer.php';?>