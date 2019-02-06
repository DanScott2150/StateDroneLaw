<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package StateDroneLaw
 */

get_header(); ?>


<div class="container">
	<div class="row justify-content-between mt-2 mb-5">
    <div class="col-lg-9 pl-0 pr-0 pr-lg-2">
      <div class="state-info rounded-top">


			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

			    </div> <!-- state-info -->
			    </div><!-- col -->


<?php
get_sidebar();
get_footer();
