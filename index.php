<?php include('perch/runtime.php'); ?>
<?php perch_layout('header'); ?>
<?php perch_layout('meta'); ?>
<?php perch_layout('navigation'); ?>

<div class="sliders">
  <div class="sliders-main" id="slider-main">
    <?php
      perch_content('Slides');
    ?>
  </div>
  <div class="sliders-side">
    <div class="sliders-top">
      <?php perch_content('Top Slide'); ?>
    </div>
    <div class="sliders-bottom">
      <?php perch_content('Bottom Slide'); ?>
    </div>
  </div>
</div>

<section class="notice shadow-3">
  <div class="fp-content-ctnr">
  <?php
        perch_blog_custom(array(
         'template' => 'alert_banner.html',
         'count' => 1,
         'section' => 'alert',
         'sort'=>'postDateTime',
         'sort-order'=>'DESC'
        ));
        ?>
  </div>
</section>

<section class="cards">
  <header class="fp-header-ctnr">
      <h1 class="float-left"><a class="blue no-link" href="/news/newsfeed/">Latest News</a></h1>
      <a class="fp-section-link block float-right link" href="/news/newsfeed/">All latest news &#8250;</a>
  </header>
  <div class="fp-content-ctnr">
  <?php
        perch_blog_custom(array(
         'template' => 'news_cards.html',
         'count' => 4,
         'section' => 'newsfeed',
         'sort'=>'postDateTime',
         'sort-order'=>'DESC'
        ));
        ?>
  </div>
</section>

<section class="cards">
  <h1 class="fp-header-ctnr">Downloads</h1>
  <?php perch_content("Files"); ?>
</section>

<section class="cards margin-footer">
  <h1 class="fp-header-ctnr">Our Partners</h1>
  <div class="card-ctnr layout-331">
    <div class="card-3 card-3-hover">
      <a class="no-link" href="/about/united-world-colleges.php">
        <img class="card-content small partner" src="/img/logo_uwc.png">
      </a>
    </div>
  </div>
  <div class="card-ctnr layout-331">
    <div class="card-3 card-3-hover">
      <a class="no-link" href="http://ibo.org/" target="_blank">
        <img class="card-content small partner" src="/img/logo_ibo.png">
      </a>
    </div>
  </div>
  <div class="card-ctnr layout-331">
    <div class="card-3 card-3-hover">
      <a class="no-link" href="http://www.cie.org.uk/programmes-and-qualifications/cambridge-secondary-2/cambridge-igcse/" target="_blank">
        <img class="card-content small partner" src="/img/logo_igcse.png">
      </a>
    </div>
  </div>
</section>

<?php perch_layout('footer'); ?>