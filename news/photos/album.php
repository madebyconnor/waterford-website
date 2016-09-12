<?php include($_SERVER['DOCUMENT_ROOT'].'/perch/runtime.php'); ?>
<?php perch_layout('header'); ?>
	<title><?php perch_gallery_album_field(perch_get('s'), 'albumTitle'); ?> | Waterford Kamhlaba UWC of Southern Africa</title>
	<meta name="description" itemprop="description" content="Gain a glimpse into life at Waterford Kamhlaba." />
<?php perch_layout('navigation'); ?>
<div class="article-background">
	<div class="cards">
		<header class="margin-subnav">
			<div class="card-ctnr">
		    	<h1><?php perch_gallery_album_field(perch_get('s'), 'albumTitle'); ?></h1>
		    </div>
		</header>

		<section>
		    <ul id="js-gallery">
				<?php if(perch_get('s')) {
					perch_gallery_album_images(perch_get('s'), array(
		   				'template'=>'image_album.html'));
				} ?>
		    </ul>
		</section>

		<!-- Social -->
		<div class="card-ctnr clear">
		    <div class="article-footer text-center">
        		<ul id="social">
          			<li class="social-item"><a class="social-icon facebook no-link" href="javascript:window.open('https://www.facebook.com/sharer/sharer.php?u=https://waterford.sz/news/photos/album.php?s=<?php perch_gallery_album_field(perch_get('s'), 'albumSlug'); ?>)', 'Facebook', 'width=600, height=400' )"><i class="icon-facebook"></i></a></li>
          			<li class="social-item"><a class="social-icon twitter no-link" href="javascript:window.open('http://twitter.com/share?text=<?php perch_gallery_album_field(perch_get('s'), 'albumTitle'); ?>&url=https://waterford.sz/news/photos/album.php?s=<?php perch_gallery_album_field(perch_get('s'), 'albumSlug'); ?>', 'Twitter', 'width=600, height=400' )"><i class="icon-twitter"></i></a></li>
          			<li class="social-item"><a class="social-icon email no-link" href="mailto:?subject=<?php perch_gallery_album_field(perch_get('s'), 'albumTitle'); ?>&amp;body=https://waterford.sz/news/photos/album.php?s=<?php perch_gallery_album_field(perch_get('s'), 'albumSlug'); ?>"><i class="icon-email"></i></a></li>
        		</ul>
    		</div>
  		</div>   
	</div>
</div>

<section>
  <div class="cards">
    <header class="fp-header-ctnr">
      <h1 class="float-left medium blue">Latest photos</h1>
      <p class="small"><a class="float-right link margin-top-05" href="/news/photos/">All latest photos &#8250;</a></p>
    </header>

    <?php perch_gallery_albums(array(
      'count' => 4,
      'template' => 'album_recent.html',
      'sort' => 'albumOrder',
      'sort-order' => 'DESC',
      'image' => true
    )); ?>
  </div>
</section>
<div class="article-background"></div>

<?php perch_layout('footer'); ?>

