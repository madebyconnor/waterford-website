<?php include('../perch/runtime.php'); ?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Waterford Kamhlaba</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, height=device-height">
  <link rel="author" href="humans.txt" />
  <meta name="description" content="Waterford Kamhlaba UWC of Southern Africa is a remarkable and pioneering school based in Mbabane, Swaziland.">
  <link rel="stylesheet" href="/dist/style.css">
  <link rel="shortcut icon" href="/favicon.ico?v=2" type="image/x-icon" />
</head>
<body>
  <nav class="nav">
    <a href="/"><img class="nav-logo" src="/img/logo.png"></a>
    <div class="nav-mobile">
      <div class="nav-toggle js-nav-toggle">Menu</div>
      <div class="nav-mobileSearch"><a href="/search"><img src="/img/search.svg"></a></div>
    </div>
    <div class="nav-links js-nav-links">
      <a href="/about">About</a>
      <a href="/news">News</a>
      <a href="/academics">Academics</a>
      <a href="/admissions">Admissions</a>
      <a href="/alumni">Alumni</a>
      <a href="/contribute">Contribute</a>
      <a href="/search" class="nav-search"><img src="/img/search.svg"></a>
    </div>
  </nav>
  <div class="min-height">

		<div class="primary-content">
		   <?php perch_mailchimp_campaigns(); ?>
		</div>
</div>
<footer class="footer clear">
  <section class="footer-section">
    <a href="/about"><h3 class="footer-header">About</h3></a>
    <?php perch_pages_navigation(array(
      'from-path' => '/about',
      'levels'    => 1,
      'include-parent' => false));
      ?>
    <a href="/news"><h3 class="footer-header">News</h3></a>
      <ul>
        <li>
          <a href="/news">Newsfeed</a>
        </li>
        <li>
          <a href="/news/photos/">Photos</a>
        </li>
        <li>
          <a href="/news/videos/">Videos</a>
        </li>
      </ul>
  </section>
  <section class="footer-section">
    <a href="/academics"><h3 class="footer-header">Academics</h3></a>
    <?php perch_pages_navigation(array(
      'from-path' => '/academics',
      'levels'    => 1));
      ?>
  </section>
  <section class="footer-section footer-wtf">
    <a href="/admissions"><h3 class="footer-header">Admissions</h3></a>
    <?php perch_pages_navigation(array(
      'from-path' => '/admissions',
      'levels'    => 1));
      ?>
    <a href="/alumni"><h3 class="footer-header">Alumni</h3></a>
    <ul>
      <li><a href="/alumni">Alumni Profiles</a></li>
      <li><a href="/alumni/update">Contact Update</a></li>
    </ul>
  </section>
  <section class="footer-section">
    <a href="/contribute"><h3 class="footer-header">Contribute</h3></a>
    <?php perch_pages_navigation(array(
      'from-path' => '/contribute',
      'levels'    => 1));
      ?>
      <a href="/connect"><h3 class="footer-header">Connect with us</h3></a>
      <div class="footer-socialContainer">
        <a class="footer-socialIcon" href="https://www.facebook.com/UwcWaterfordKamhlaba"><img src="/img/facebook.svg" alt="Facebook" /></a>
        <a class="footer-socialIcon" href="https://plus.google.com/112515100039018454818"><img src="/img/google.svg" alt="Google Plus" /></a>
        <a class="footer-socialIcon" href="https://twitter.com/WaterfordUWCSA"><img src="/img/twitter.svg" alt="Twitter" /></a>
        <a class="footer-socialIcon" href="https://www.youtube.com/user/wkalumni"><img src="/img/play.svg" alt="Youtube" /></a>
      </div>
  </section>

    <section class="footer-bottom">
      <p class="white">
        &#9400; <?php echo date('Y'); ?> Waterford Kamhlaba United World College Of Southern Africa &#9679; <a href="/disclaimer" class="no-link">Disclaimer</a><br>
        <a href="/creators" class="no-link">Designed by Connor Bär. Developed by Nicolai Davies.</a>
      </p>
    </section>

  </footer>
  <script src="/dist/all.js"></script>
  <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-58857612-1', 'auto');
  ga('send', 'pageview');

  </script>
</body>
</html>
