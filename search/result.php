<?php include('../perch/runtime.php'); ?>
<?php perch_layout('header'); ?>
	<title>Search results | Waterford Kamhlaba UWC of Southern Africa</title>
	<meta name="description" itemprop="description" content="Search the Waterford Kamhlaba UWCSA website." />
<?php perch_layout('navigation'); ?>

	<section class="search" itemscope itemtype="https://schema.org/SearchResultsPage">
	  <?php perch_search_form(); ?>
	  <?php $query = perch_get('q');  perch_content_search($query, array(
	  		'count'=>7,
	        'excerpt-chars'=>230
	      )); ?>
	</section>
<?php perch_layout('footer'); ?>