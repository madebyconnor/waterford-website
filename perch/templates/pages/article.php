<?php if (!defined('PERCH_RUNWAY')) include($_SERVER['DOCUMENT_ROOT'].'/perch/runtime.php'); ?>
<?php perch_content_create('Content', array(
  'template' => 'Article/Article_content.html',
  )); 
?>
<?php perch_layout('header'); ?>
<?php perch_layout('meta'); ?>
<?php perch_layout('navigation'); ?>
<span itemscope itemtype="https://schema.org/Article">
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
    <?php perch_content('Content'); ?>
  </div>
</section>
</span>
<?php perch_layout('footer'); ?>