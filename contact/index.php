<?php include('../perch/runtime.php'); ?>
<?php perch_layout('header'); ?>
  <title>Contact us | Waterford Kamhlaba UWCSA</title>
  <meta name="description" itemprop="description" content="Send us a message and find our contact information." />
<?php perch_layout('navigation'); ?>

<section class="cards">
  <div class="card-ctnr">
    <div class="card-3 full-width">
      <div class="card-content">
      <h1 class="text-no-cap">We're happy to assist you!</h1>
      <div class="contact">
	      <?php perch_form('contact.html'); ?>
	      <div class="contact-content">
	        <div class="contact-text">
	          <?php perch_content('Contact details'); ?>
	        </div>
	      </div>
     	</div>
    </div>
  </div>
</section>
<?php perch_layout('footer'); ?>
