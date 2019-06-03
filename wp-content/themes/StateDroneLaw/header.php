<?php
/**
	* StateDroneLaw Header Template
	* StateDroneLaw Custom Theme
	* Developed off of Underscores starter theme
	*
	* @author Dan Scott <danscott2150@gmail.com>
	* @copyright 2018 Dan Scott | StateDroneLaw
	* @version 20190603
 	*
 	* @package StateDroneLaw
 	*/
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<!-- Using version 4 of FontAwesome because I like the icons better -->
	<link rel="stylesheet" href="/wp-content/themes/StateDroneLaw/assets/font-awesome-4.7.0/css/font-awesome.min.css">

	<!-- Google fonts, currently Lato & Roboto -->
	<link href="https://fonts.googleapis.com/css?family=Lato:400,900|Roboto:400,400i,700,700i" rel="stylesheet">

  <!-- jQuery includes -->
  <!-- ToDo: Can I transition away from jQuery? Some plugins might depend on it though, need to look into -->
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<!-- Facebook Plugin include -->
  <div id="fb-root"></div>
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.9&appId=208725186250533";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>
<!-- End of Facebook Plugin -->

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'statedronelaw	' ); ?></a>


<!-- Header -->
<!-- Future project: Add WordPress Customizer support,
				i.e. ability to change logo, menu, etc. via WP CMS rather than hardcode -->

	<header id="masthead" class="site-header">

		<nav class="navbar navbar-expand-md navbar-dark fixed-top" id="navScrollWrapper">
			<div class="container">
		  	<h1 class="site-title"><a href="/">StateDroneLaw</a></h1>

				<div class="nav-toggle-wrapper">
		  		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		    		<span class="navbar-toggler-icon"></span>
		  		</button>

		  	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		    	<ul class="navbar-nav ml-auto">
		      	<li class="nav-item">
		        	<a class="nav-link" href="/blog">Blog</a>
		      	</li>
						<li class="nav-item">
							<a class="nav-link" href="/recent">Recent</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="/browse">Browse</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="/subscribe">Subscribe</a>
						</li>
		    	</ul>

		</div> <!-- navbar-collapse -->
	</div> <!-- nav-toggle-wrapper -->
</div> <!-- container -->
		</nav>



	</header><!-- #masthead -->

<div id="spacer"></div> <!-- spacer to solve issue of gray background briefly appearing upon window scroll, due to navbar opacity. This essentially pushes the rest of the page down to give space to initial navbar. There's definitely a better way to do this. -->

	<div id="content" class="site-content">
