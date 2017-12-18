<?php include 'backend/session.php';?>
<?php include 'backend/resume.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
	<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/2.7.0/build/reset-fonts-grids/reset-fonts-grids.css" media="all" />
	<link rel="stylesheet" type="text/css" href="css/resume.css" media="all" />
	<title>Personal CV</title>
</head>
<body>

<div id="doc2" class="yui-t7">
	<div id="inner">
		<div id="hd">
			<div class="yui-gc">
 				<div class="yui-u first">
				<?php getFullnameAndJobTitle();?>
				</div>
			</div>
		</div><!--// hd -->

		<div id="bd">
			<div id="yui-main">
				<div class="yui-b">
					<div class="yui-gf">
						<div class="yui-u first">
							<h2>Personal Information</h2>
						</div>
						<div class="yui-u">
							<p class="enlarge">
								<?php getPersonalInformation(); ?>
							</p>
						</div>
					</div><!--// .yui-gf -->
					
					<div class="yui-gf">
						<div class="yui-u first">
							<h2>Contact Information</h2>
						</div>
						<div class="yui-u">
							<p class="enlarge">
								<?php getContactInformation(); ?>
							</p>
						</div>
					</div><!--// .yui-gf -->
					
					<div class="yui-gf">
						<div class="yui-u first">
							<h2>Education</h2>
						</div>
						<div class="yui-u">
							<?php getEducation(); ?>
						</div>
					</div><!--// .yui-gf -->

					<div class="yui-gf">
						<div class="yui-u first">
							<h2>Skills</h2>
						</div>
						<div class="yui-u">
							<?php getSkills(); ?>
						</div>
					</div><!--// .yui-gf -->

					<div class="yui-gf">
						<div class="yui-u first">
							<h2>Work Experience</h2>
						</div><!--// .yui-u -->
						<div class="yui-u">
							<?php getWorkExperience(); ?>
						</div><!--// .yui-u -->
					</div><!--// .yui-gf -->

					<div class="yui-gf">
						<div class="yui-u first">
							<h2>Project</h2>
						</div><!--// .yui-u -->
						<div class="yui-u">
							<?php getProjects(); ?>
						</div><!--// .yui-u -->
					</div><!--// .yui-gf -->
					
					<div class="yui-gf">
						<div class="yui-u first">
							<h2>Language</h2>
						</div>
						<div class="yui-u">
							<?php getLanguages(); ?>
						</div>
					</div><!--// .yui-gf -->

					<div class="yui-gf">
						<div class="yui-u first">
							<h2>Additional Information</h2>
						</div>
						<div class="yui-u">
							<p class="enlarge">
								<?=getAdditionalInformation(); ?>
							</p>
						</div>
					</div><!--// .yui-gf -->


				</div><!--// .yui-b -->
			</div><!--// yui-main -->
		</div><!--// bd -->
	</div><!-- // inner -->


</div><!--// doc -->


</body>
</html>
