<?php
/**
 *
 * @package StateDroneLaw
 */

get_header(); ?>

<div class="container">

<!-- Breadcrumbs -->
<div class="row breadcrumbs mt-2">
  <div class="col p-0">
    <ul>
      <li><a href="/">Home</a></li>
      <li><a href="#">Subscribe</a></li>
    </ul>
  </div>
</div>
<!-- END Breadcrumbs -->




<!-- Promobox -->
<div class="row">
  <div class="promobox col mt-2 p-2">
    <?php the_ad(2320); ?>

    <p>
      New to drones? Looking to bolster your aerial photography skills, or start a drone mapping business? Be sure to check out <a href="https://click.linksynergy.com/fs-bin/click?id=07P/PKddxEs&offerid=323058.1629&subid=0&type=4">Udemy.com</a> today!<br/>
      Udemy features a premium collection of online video courses and tutorials covering a wide range of topics – including drones!
    </p>
  </div>
</div>
<!-- END Promobox -->

<!-- Start Page Content -->

<div class="row justify-content-between mt-2 mb-5">
  <div class="col-lg-9 pl-0 pr-0 pr-lg-2">
    <div class="state-info rounded-top">

        <h1 class="py-1">Subscribe to Email Alerts</h1>

        <div id="subscribe_cta">
    <div id="cta_text">
      <p class="mb-2">The legal landscape for drones is constantly changing. As a drone operator, YOU are responsible for making sure you comply with
        all relevant laws and regulations. Stay up to date – and on the right side of the law!</p>
      <p>Sign up for <strong>FREE</strong> email alerts to receive a notification anytime the laws for your state get updated!</p>
    </div>
    <div id="cta_form">
  <?php echo do_shortcode('[mc4wp_form id="622"]'); ?>
    </div>
  </div>



    </div> <!-- state-info rounded top -->
  </div><!-- col -->

<?php
get_sidebar();
get_footer();
