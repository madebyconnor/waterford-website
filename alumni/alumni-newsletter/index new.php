<?php if (!defined('PERCH_RUNWAY')) include($_SERVER['DOCUMENT_ROOT'].'/perch/runtime.php'); ?>
<?php perch_layout('header'); ?>
<?php perch_layout('meta'); ?>
<?php perch_layout('navigation'); ?>

<section class="cards margin-subnav">
	<div class="card-ctnr">
		<div class="card-3 full-width">
			<div class="card-content">
			<p>Join over 3000 other alumni and receive our bimonthly alumni newsletter!</p>
			<?php perch_mailchimp_form('subscribe.html'); ?>
			</div>
		</div>
	</div>

  	<?php perch_content('Excerpts'); ?>
</section>
<?php perch_layout('footer'); ?>