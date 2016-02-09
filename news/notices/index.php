<?php include('../../perch/runtime.php'); ?>
<?php perch_layout('header'); ?>
  <title>School notices | Waterford Kamhlaba UWCSA</title>
  <meta name="description" itemprop="description" content="Stay up to date with notices to parents and students." />
<?php perch_layout('navigation'); ?>

<section class="margin-subnav" style="padding-top:1em;">
  <div class="b-gradient-vp notice shadow-3">
    <?php perch_blog_custom(array(
       'template' => 'alert_banner.html',
       'count' => 1,
       'section' => 'alert',
       'sort'=>'postDateTime',
       'sort-order'=>'DESC'
      )); ?>
  </div>
</section>

<section class="cards">
  <?php perch_blog_custom(array(
    'count' => 3,
    'section' => 'school-notices',
    'template' => 'post_in_notices.html',
    'sort' => 'postDateTime',
    'sort-order' => 'DESC'
  )); ?>
</section>
<?php perch_layout('footer'); ?>
