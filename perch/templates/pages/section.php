<?php include($_SERVER['DOCUMENT_ROOT'].'/perch/runtime.php'); ?>
<?php perch_layout('header'); ?>
<?php perch_layout('meta'); ?>
<?php perch_layout('navigation'); ?>
  <section class="cards margin-subnav">
    <?php perch_pages_navigation(array(
    'levels' => 1,
    'from-path' => '*',
    'template' => 'section.html',
  )); ?>
  </section>
<?php perch_layout('footer'); ?>