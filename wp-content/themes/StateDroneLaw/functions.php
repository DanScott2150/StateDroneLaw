<?php
/**
 * StateDroneLaw functions and definitions
 *
 * @package StateDroneLaw
 */

if ( ! function_exists( 'statedronelaw_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function statedronelaw_setup() {
		/*
		 * Make theme available for translation.
		 */
		// load_theme_textdomain( 'StateDroneLawtheme', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		// add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		// register_nav_menus( array(
		// 	'menu-1' => esc_html__( 'Primary', 'StateDroneLawtheme' ),
		// ) );

		register_nav_menus(
			array(
				'header_nav_menu' => ('Header Nav'),
				'footer_nav_menu' => ('Footer Nav'),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			// 'comment-form',
			// 'comment-list',
			// 'gallery',
			// 'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'statedronelaw_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'statedronelaw_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function statedronelaw_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'statedronelaw_content_width', 640 );
}
add_action( 'after_setup_theme', 'statedronelaw_content_width', 0 );

/* Tabby plugin - stops from auto-loading default plugin styles */
/* Plugin CSS instead found in child theme style.css */
remove_action('wp_print_styles', 'cc_tabby_css', 30);



/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function statedronelaw_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'StateDroneLawtheme' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'StateDroneLawtheme' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	// Summary Legal Disclaimer shown in Footer
	register_sidebar( array(
		'name'	=> 'Legal Disclaimer (Footer)',
		'id'	=> 'footer-legal',
		'description' => 'Legal Disclaimer Summary',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	));
}

add_action( 'widgets_init', 'statedronelaw_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function statedronelaw_scripts() {
	wp_enqueue_style( 'StateDroneLawtheme-style', get_stylesheet_uri() );

	wp_enqueue_script( 'StateDroneLawtheme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'StateDroneLawtheme-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	// Sticky Nav: Javascript triggers resize based on scroll & mouse hover
	wp_enqueue_script( 'navscroll', get_template_directory_uri() . '/js/navscroll.js', array(), 20190603, true);
	wp_enqueue_script( 'counterupper', get_template_directory_uri() . '/js/countup.js', array(), 20190603, true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'statedronelaw_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

//
// @ini_set( 'upload_max_size' , '64M');
// @ini_set( 'post_max_size' , '64M');
// @ini_set( 'max_execution_time' , '300');


/* Include javascript files for AirMap Integration & API connection */

function StateDroneLaw_airmap_includes(){
  wp_enqueue_script( 'StateDroneLaw_airmap_init', 'https://cdn.airmap.io/map-sdk/1.2.1/dist/airmap.map.min.js', false, 555, false );
  //wp_enqueue_script( 'StateDroneLaw_airmap_config', get_template_directory_uri() . '/js/airmap-config.json', false, 555, false );
	// wp_enqueue_script( 'StateDroneLaw_searchbox_jquery1' , 'https://code.jquery.com/jquery-1.12.4.js', false, 123, false  );
	// wp_enqueue_script( 'StateDroneLaw_searchbox_jquery2' , 'https://code.jquery.com/ui/1.12.1/jquery-ui.js', false, 123, false  );
	wp_enqueue_script( 'StateDroneLaw_autocomplete_config', get_template_directory_uri() . '/js/autocomplete.js', 'jquery', 1, false );


}

	add_action ('wp_enqueue_scripts' , 'StateDroneLaw_airmap_includes');
	/* End of AirMap Integration */


	//Custom filter add to support searching ACF fields via WordPress REST API
	//https://github.com/airesvsg/acf-to-rest-api/issues/123
	add_filter( 'rest_laws_query', function( $args ) {
		$args['meta_query'] = array(
			array(
				'key'   => 'osid',
				'value' => esc_sql( $_GET['osid'] ),
			)
		);
	
		return $args;
	} );

?>
