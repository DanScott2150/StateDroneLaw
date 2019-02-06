<?php
/**
 * Sidebar
 *
 * Contains:
 *	**Recent Posts (10 most recent, headlines only)
 *  **Ad space (currently Google Adwords)
 *  **Facebook plugin
 *
 * Last Update: 20180424
 * @package StateDroneLaw
 */

?>


  <div class="col-lg-3 px-0 pl-lg-2">
    <div class="sidebar">

			<div class="sb-news">
				<h3>Recent Posts</h3>
				<ul>
					<!-- Fetch 10 most recent 'posts' -->
					<?php
						$the_query = new WP_Query( 'posts_per_page=10' );
						while ($the_query -> have_posts()) : $the_query -> the_post();
					?>

					<!-- Display title of post w/link -->
					<li>
						<a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
					</li>

					<?php
						endwhile;
						wp_reset_postdata();
					?>

					</ul>
			</div> <!-- .sb-news -->

      <div class="sb-ga">
<?php the_ad(1293); ?>
      </div> <!-- .sb-ga -->

      <div class="sb-fb">
				<!-- Facebook plugin -->
				<!-- API linked in header file -->
        <div class="fb-page" data-href="https://www.facebook.com/statedronelaw" data-tabs="timeline" data-height="500" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false">
					<blockquote cite="https://www.facebook.com/statedronelaw" class="fb-xfbml-parse-ignore">
						<a href="https://www.facebook.com/statedronelaw">State Drone Law</a>
					</blockquote>
				</div> <!-- .fb-page -->
      </div> <!-- .sb-fb -->

    </div> <!-- sidebar -->
  </div> <!-- col -->

	</div> <!-- row || opening tag in body file -->
</div> <!-- container || opening tag in body file -->
