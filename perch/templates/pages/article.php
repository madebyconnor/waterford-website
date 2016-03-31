<?php if (!defined('PERCH_RUNWAY')) include($_SERVER['DOCUMENT_ROOT'].'/perch/runtime.php'); ?>
<?php perch_content_create('Content', array(
  'template' => 'Article/Article_content.html',
  )); 
?>
<?php perch_content_create('Sidebar', array(
  'template' => 'Article/Article_sidebar.html',
  )); 
?>
<?php perch_layout('header'); ?>
<?php perch_layout('meta'); ?>
<?php perch_layout('navigation'); ?>
<span <?php perch_content_custom('Sidebar', array(
    'filter'=>'sidebar','match'=>'eq','value'=>'hasSidebar','template'=>'#/sidebarid.html')); ?> itemscope itemtype="https://schema.org/Article">
<header id="margin-subnav" class="b-grey-d <?php
      perch_page_attribute('headerclass', array(
        'template' => 'margin_subnav.html'
      ));
    ?>">
  <div class="hero" itemprop="image" style="background: url(<?php perch_page_attribute('image'); ?>)">
    <div class="hero-overlay" style="background: linear-gradient( rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0.75) )"></div>
    <div class="hero-title-ctnr">
      <div class="hero-group">
        <span itemprop="headline"><h1 class="hero-title large white text-shadow"><?php perch_page_attribute('pageTitle'); ?></h1></span>
      </div>
    </div>
  </div>
</header>

<section>
  <div class="article-background">
    <div class="m0a" id="article">
      <div class="article-wrapper">
        <span itemprop"articleBody">
          <?php perch_content('Content'); ?>
        </span>
        <!-- Social -->
        <div class="article-footer text-center">
          <ul id="social">
            <li class="social-item"><a class="social-icon facebook no-link" href="javascript:window.open('https://www.facebook.com/sharer/sharer.php?u=<?php perch_page_url(); ?>)', 'Facebook', 'width=600, height=400' )"><i class="icon-facebook"></i></a></li>
            <li class="social-item"><a class="social-icon twitter no-link" href="javascript:window.open('http://twitter.com/share?text=Take%20a%20look%20at%20this%20page%20on%20Waterford.sz&url=<?php perch_page_url(); ?>', 'Twitter', 'width=600, height=400' )"><i class="icon-twitter"></i></a></li>
            <li class="social-item"><a class="social-icon email no-link" href="mailto:?subject=Take%20a%20look%20at%20this%20page%20on%20Waterford.sz&amp;body=<?php perch_page_url(); ?>"><i class="icon-email"></i></a></li>
          </ul>
        </div>
      </div>
      <?php perch_content('Sidebar'); ?>
    </div>
  </div>
</section>
</span>
<?php perch_layout('footer'); ?>