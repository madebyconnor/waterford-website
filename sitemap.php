<?php include('perch/runtime.php'); ?>
<?php perch_layout('header'); ?>

	<title>Sitemap | Waterford Kamhlaba UWC of Southern Africa</title>
	<meta name="description" itemprop="description" content="A complete sitemap of the Waterford Kamhlaba UWCSA website." />
<?php perch_layout('navigation'); ?>

	<section>
		<div class="cards margin-subnav margin-footer">
			<div class="card-3 full-width">
				<div class="card-content">
					<h1>Sitemap</h1>
					<?php perch_pages_navigation(array(
					'template' => array('sitemap1.html', 'sitemap2.html'),
					'include-hidden' => true
					)); ?>
				</div>
			</div>
		</div>
	</section>

<?php perch_layout('footer'); ?>
