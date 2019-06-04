<?php
  /** @package StateDroneLaw */
?>

</div> <!-- .container(?) --> <!-- should move this to main file, match to opening tag ?? -->
</div><!-- #content -->

<footer id="colophon" class="site-footer">
  <div class="container-fluid pt-3">

<!-- Summary Legal Disclaimer - editable via WordPress Widgets -->
  <?php if ( is_active_sidebar( 'footer-legal' ) ) : ?>
    <div class="footer-legal">
      <?php dynamic_sidebar( 'footer-legal' ); ?>
    </div>
  <?php endif; ?>

<!-- Footer Nav Menu -->
  <?php wp_nav_menu( 
          array( 
            'theme_location' => 'footer_nav_menu',
            'container' => false,
            'menu_class' => 'footernav'
          )
        ); 
  ?>

    <div class="site-info pb-3">
      © <?php echo date("Y"); ?> StateDroneLaw. All Rights Reserved.
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