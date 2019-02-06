<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://-eloper.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package StateDroneLaw
 */

?>

</div> <!-- .container(?) --> <!-- should move this to main file, match to opening tag ?? -->
</div><!-- #content -->


	<footer id="colophon" class="site-footer">

		<div class="container-fluid pt-3">
			<div class="footer-legal">
				<p>Nothing on this website is considered legal advice. The information above may be inaccurate, outdated, or misrepresented.</p>
				<p class="mt-1">Please review our complete legal disclaimer for further information.</p>
			</div>

			<div class="row">
				<nav class="footernav">
					<ul class="mb-0">
						<li>
							<a href="/blog">Blog</a>
						</li>
						<li>
							<a href="/recent">Recent</a>
						</li>
						<li>
							<a href="/browse">Browse</a>
						</li>
						<li>
							<a href="/subscribe">Subscribe</a>
						</li>
						<li>
							<a href="/legal">Legal Discliamer</a>
						</li>
						<li>
							<a href="/privacy">Privacy Policy</a>
						</li>
						<li>
							<a href="/contact">Contact Us</a>
						</li>
					</ul>
				</nav>
			</div> <!-- row -->

			<div class="site-info pb-3">
				© 2018 StateDroneLaw. All Rights Reserved.
			</div>
		</div> <!-- .container -->
	</footer><!-- #colophon -->

</div><!-- #page -->


<!-- Bootstrap and Popper include for dropdown -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>

<!-- <script type="text/javascript" src="https://statedronelaw.com/wp-content/themes/statedronelaw/assets/stickynav.js"></script> -->
<script type="text/javascript" src="https://statedronelaw.com/wp-content/themes/statedronelaw/js/autocomplete.js"></script>


<!-- CountUp function currently disabled, numbers hard-coded. Works on local dev, but not on live server? -->
<!--
<script type="text/javascript" src="http://statedronelaw.com/wp-content/themes/statedronelaw/js/countTo.js"></script>
-->

	<!-- Invoke countTo() functions for frontpage countup boxes. Quick fix, there's definitely a better way to do this -->
<!--
<script type="text/javascript">
	$("#counter-1").countTo();
	$("#counter-2").countTo();
	$("#counter-3").countTo();
	$("#counter-4").countTo();

</script>
-->
<!-- <script type="text/javascript" src="/wp-content/themes/statedronelaw/assets/bgslider.js"></script> -->

<?php wp_footer(); ?>


</body>
</html>
