<?php include('../perch/runtime.php'); ?>
<?php perch_layout('header'); ?>
<section class="max article">
  <div class="blog-content">
    <?php
    perch_blog_custom(array(
      'template'   => $template,
      'count'      => $posts_per_page,
      'sort'       => $sort_by,
      'sort-order' => $sort_order,
    ));
    ?>
  </div>
</section>
<?php perch_layout('footer'); ?>
