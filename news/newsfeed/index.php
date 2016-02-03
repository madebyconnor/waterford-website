<?php include('../../perch/runtime.php'); ?>
<?php perch_layout('header'); ?>
<title>Newsfeed | Waterford Kamhlaba UWCSA</title>
<meta name="description" itemprop="description" content="Catch up on the latest news and read captivating stories from Waterford Kamhlaba." />
<?php perch_layout('navigation'); ?>


	<section class="cards margin-subnav">
	  <?php perch_blog_custom(array(
	    'count' => 7,
	    'section' => 'newsfeed',
	    'template' => 'post_in_news.html',
	    'sort' => 'postDateTime',
	    'sort-order' => 'DESC'
	  )); ?>
	</section>
<?php perch_layout('footer'); ?>
