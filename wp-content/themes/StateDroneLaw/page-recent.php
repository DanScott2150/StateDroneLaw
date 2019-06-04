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
      <li><a href="#">Recent Updates</a></li>
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

        <h1 class="py-1">Recent Updates</h1>

        <div class="container text-center state-introtext my-3">
          <p>
            Drone-related laws and ordinances recently added or updated.
            Be sure to subscribe to free email alerts to be notified of changes to your state!
          </p>
        </div>

<?php

    $args = [
      'post_type' => 'laws',
      'posts_per_page' => 10
    ];

    $loop = new WP_Query($args);
    while ($loop->have_posts()){
      $loop->the_post();
      $recent_date = get_the_time('F jS, Y');

      $status_name = get_terms(
        array(
          'taxonomy' => 'status'
        )
      );

      $statuses = get_the_terms($post->ID, 'status');
      foreach ($statuses as $status){  //even though just 1 state, need foreach loop to transfer from array to variable
        $recent_status = get_term_link($status->slug, 'status');
      }

      $states = get_the_terms($post->ID, 'state'); //stored as an array

      foreach ($states as $state){  //even though just 1 state, need foreach loop to transfer from array to variable
        $statename = get_term_link($state->slug, 'state');
      }

      ?>


      <div class="blog_post">
        <div class="blog_meta">
          <p class="blog_title"><?php the_title(); ?></p>
          <p class="blog_date"><?php echo  $recent_date; ?></p>
          <p>State: <?php echo '<a href="'. $statename .'">' . $state->name . '</a>'; ?></p>
        </div>

        <div class="blog_content">
          <p class="recent_status">New <?php echo $status->name; ?> Law:</p>
          <?php the_content(); ?>

      </div>
    </div>

      <?php } ?>

<!-- End of WordPress Posts Loop -->

    </div> <!-- state-info rounded top -->
  </div><!-- col -->

<?php
get_sidebar();
get_footer();
