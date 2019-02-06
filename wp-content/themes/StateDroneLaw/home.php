<?php
/**
 * Blog page
 *
 * Currently 3 options for blog types: Original Content, Quoted Excerpt, Guest Post
 * Types managed via ACF plugin on WP Posts page
 *
 * Version: 20180425
 *
 * Currently looping through ALL posts? Need to look into pagination
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
      <li><a href="#">Blog</a></li>
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

        <h1 class="py-1">Drone Law News Blog</h1>

        <div class="container text-center state-introtext my-3">
          <p>
            A curated selection of articles and blogs from around the web, covering the broader legal landscape for drones.
            Interested in writing a guest post for us? <a href="/contact">Get in touch!</a>
          </p>
        </div>

  <?php

    while (have_posts()){
      the_post(); //Sets current post, moves to next post in the queue

      //Establish what type of post it is
      //Current options: Quoted Excerpt, Regular Post, Guest Post
      $blog_type = get_field('blog_type');

      //Get post date
      $blog_date = get_the_time('F jS, Y');

      //Custom variables from ACF custom inputs
      //Used for quoted excerpts
      $ext_source_name = get_field('ext_source_name');
      $ext_parent_url = get_field('ext_parent_url');
      $ext_source_url = get_field('ext_source_url');
      $ext_quoted_excerpt = get_field('ext_quoted_excerpt');

  ?>


<!-- Begin Blog Post Div -->

      <div class="blog_post">

        <div class="blog_meta">
          <p class="blog_title"><?php the_title(); ?></p>
          <p class="blog_date"><?php echo $blog_date; ?></p>

          <!-- Display credit if post is a quoted excerpt from another site -->
            <p class="blog_credit">
              <?php if($blog_type == 'Quoted Excerpt'){ ?>
                Originally Posted on: <?php echo '<a href="' . $ext_parent_url . '">' . $ext_source_name . '</a>'; ?>
              <?php } else { ?>
                Posted by: StateDroneLaw
              <?php } ?>
            </p>

        </div> <!-- blog_meta -->

        <div class="blog_content">

          <?php if($blog_type == 'Quoted Excerpt'){ ?>
            <p class="read_more">
              <a href="<?php echo $ext_source_url ?>">
              This is an excerpt from an article originally written on <strong><?php echo $ext_source_name; ?></strong>.
                To read the entire story, <strong>click here</strong>.
              </a>
            </p>
          <?php } ?> <!-- if quoted excerpt -->

          <?php the_content(); ?>
          <p class="quoted_content">


            <?php if($blog_type == 'Quoted Excerpt'){ ?>
            <?php echo $ext_quoted_excerpt; ?>
              <a href="<?php echo $ext_source_url ?>">(Read More)</a>
            <?php } else {
              echo $blog_type;
            }?>

          </p>

        </div> <!-- blog_content -->

      </div> <!-- blog_post -->
<!-- End of Blog Post Div -->

<?php } ?> <!-- while have_posts() -->
<!-- End of WordPress Posts Loop -->

    </div> <!-- state-info rounded top -->
  </div><!-- #primary -->

<?php
get_sidebar();
get_footer();
