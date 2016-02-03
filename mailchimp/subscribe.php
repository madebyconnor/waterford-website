<?php include('../perch/runtime.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Subscribe - MailChimp Example</title>
	<meta name="viewport" content="width=device-width, target-densitydpi=160dpi, initial-scale=1.0" />
	<?php perch_get_css(); ?>
</head>
<body>
	<header class="layout-header">
		<div class="wrapper">
			<div class="company-name">MailChimp - Company Name</div>
			<img src="<?php perch_path('feathers/quill/img/logo.gif'); ?>" alt="Your Logo Here" class="logo"/>
		</div>
		<nav class="main-nav">
			<?php perch_pages_navigation(array(
					'levels'=>1
				));
			?>
		</nav>
	</header>
	
	<!--  change cols2-nav-right to cols2-nav-left if you want the sidebar on the left -->
	<div class="wrapper cols2-nav-right">
	
		<div class="primary-content">
		   <?php perch_mailchimp_form('subscribe.html'); ?>
		</div>
		
		<nav class="sidebar">
		    
    	</nav>
	</div>
	<footer class="layout-footer">
		<div class="wrapper">
			<small>Copyright &copy; 2013</small>
		</div>
	</footer>
	<?php perch_get_javascript(); ?>
</body>
</html>