<?php include($_SERVER['DOCUMENT_ROOT'].'/perch/runtime.php'); ?>
<?php perch_layout('header'); ?>
	<title>Photos | Waterford Kamhlaba UWC of Southern Africa</title>
	<meta name="description" itemprop="description" content="Gain a glimpse into life at Waterford Kamhlaba through photos taken by our students." />
<?php perch_layout('navigation'); ?>
 
	<section class="cards margin-subnav">
	    <?php 
	        perch_gallery_albums(array(
	            'template' => 'section_gallery.html',
	            'image' => true,
	            'sort' => 'albumOrder',
	            'sort-order' => 'DESC'
	        ));
	    ?>
	</section>

<?php perch_layout('footer'); ?>