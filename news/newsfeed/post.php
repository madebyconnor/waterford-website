<?php include($_SERVER['DOCUMENT_ROOT'].'/perch/runtime.php'); ?>

<?php perch_layout('header'); ?>

<?php
# get the post
$post = perch_blog_custom(array(
      'filter'        => 'postSlug',
      'match'         => 'eq',
      'value'         => perch_get('s'),
      'skip-template' => 'true',
      'return-html'   => 'true',
  ));

# set up the variables
$title       = $post['0']['postTitle'];
$description = strip_tags($post['0']['postDescHTML']);
$description = substr($description,0,200);
$image = $post[0]['image'];
$keywords = $post[0]['postTags'];
$sidebarid       = $post['0']['sidebar'];

PerchSystem::set_var('sidebarid', 'en');

# use the variables in the array value 
perch_page_attributes_extend(array(
    'description'    => $description,
    'pageNavText'    => $title,
    'image'          => $image,
    'keywords'       => $keywords,
));
?>

<?php perch_layout('meta'); ?>

<?php perch_layout('navigation'); ?>

<span <?php perch_blog_custom(array(
    'filter'=>'postSlug',
    'match'=>'eq',
    'value'=>perch_get('s'),
    'template' => 'sidebarid.html',
)); ?> itemscope itemtype="https://schema.org/BlogPosting">
<header class="b-grey-d">
  <div class="hero" itemprop="image" style="background: url(<?php perch_blog_post_field(perch_get('s'), 'image'); ?>)">
    <div class="hero-overlay" style="background: linear-gradient( rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0.75) )"></div>
    <div class="hero-title-ctnr">
      <div class="hero-group">
        <h1 class="hero-title white text-shadow"><span itemprop="headline"><?php perch_blog_post_field(perch_get('s'), 'postTitle'); ?></span></h1>
      </div>
    </div>
  </div>
</header>

<section>
  <div class="article-background">
    <article id="article" class="m0a">
      <?php perch_blog_post(perch_get('s')); ?>
    </article>
  </div>
</section>
</span>

<section class="cards">
  <div class="cards article-width--3">
    <header class="fp-header-ctnr">
      <h1 class="float-left medium blue">Latest news</h1>
      <p class="small"><a class="float-right link margin-top-05" href="/news/newsfeed/">All latest news &#8250;</a></p>
    </header>

    <?php perch_blog_custom(array(
      'count' => 3,
      'section' => 'newsfeed',
      'template' => 'post_recent.html',
      'sort' => 'postDateTime',
      'sort-order' => 'DESC'
    )); ?>
  </div>
</section>
<div class="article-background"></div>

<?php perch_layout('footer'); ?>