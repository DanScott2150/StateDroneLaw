<?php

/*
 * Plugin Name: StateDroneLaw Custom Taxonomies
 * Description: Creates custom taxonomy functions: Law info (custom post type), State (custom category), Status (custom tag)
 * Version:     20170516
 * Author:      Dan Scott
 * License:     GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/


/* Initiate functions and re-write permalinks on plugin activation */
  add_action( 'init', 'SDL_custom_posts_init' );
  add_action ( 'init' , 'SDL_custom_taxonomies_init');

  function SDL_rewrite_flush() {
    SDL_custom_posts_init();
    flush_rewrite_rules();
  }

  register_activation_hook( __FILE__, 'SDL_rewrite_flush' );

/* Custom Post Type: Laws
 * This CPT will hold 90% of the site's content
 * Posts will be assigned to custom taxonomies
 *  for State (category), Status (category), and Topics (tags)
 *  which will be created further down
 */

  function SDL_custom_posts_init() {
  	$labels = array(
  		'name'               => 'Laws',
  		'singular_name'      => 'Law',
  		'menu_name'          => 'Laws',
  		'name_admin_bar'     => 'Law',
  		'add_new'            => 'Add New Law',
  		'add_new_item'       => 'Add New Law',
  		'new_item'           => 'New Law',
  		'edit_item'          => 'Edit Law',
  		'view_item'          => 'View Law',
  		'all_items'          => 'All Laws',
  		'search_items'       => 'Search Laws',
  		'parent_item_colon'  => 'Parent Laws:',
  		'not_found'          => 'No Laws found.',
  		'not_found_in_trash' => 'No Laws found in Trash.'
  	);

  	$args = array(
  		'labels'             => $labels,
  		'public'             => true,
  		'publicly_queryable' => true,
  		'show_ui'            => true,
  		'show_in_menu'       => true,
	    'show_in_rest'		   => true,
      'edit_in_rest'       => true,
      'rest_base'          => 'laws',
  		'query_var'          => true,
  		'rewrite'            => array( 'slug' => 'laws' ),
  		'capability_type'    => 'post',
  		'has_archive'        => false,
  		'hierarchical'       => false,
  		//'taxonomies'				 => array('category', 'post_tag'),
  		'menu_position'      => 5,
  		'menu_icon'					 => 'dashicons-clipboard',
  		'supports'           => array( 'title', 'editor', 'excerpt' )
  	);

  	register_post_type( 'laws', $args );

  }

/* Custom Taxonomy: State
 *  acts as category
 * Archive pages for this taxonomy will be the main pages for the site,
 * showing all the Laws for a given state
 */

function SDL_custom_taxonomies_init(){
	$labels = array(
			'name'              => 'State',
			'singular_name'     => 'State',
			'search_items'      => 'Search States',
			'all_items'         => 'All States',
			'parent_item'       => null,
			'parent_item_colon' => null,
			'edit_item'         => 'Edit State',
			'update_item'       => 'Update State',
			'add_new_item'      => 'Add New State',
			'new_item_name'     => 'New State Name',
			'menu_name'         => 'States',
		);
		$args = array(
		 	'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'show_in_rest'		  => true,
      'edit_in_rest'      => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'state' ),
		);

	register_taxonomy( 'state', 'laws', $args );

  /* Custom Taxonomy: Status
   *  acts as category
   * Used to group laws into: Current Laws, Pending Laws, Other Notes
   */

		$labels = array(
				'name'              => 'Status',
				'singular_name'     => 'Status',
				'search_items'      => 'Search Status',
				'all_items'         => 'All Status',
				'parent_item'       => null,
				'parent_item_colon' => null,
				'edit_item'         => 'Edit Status',
				'update_item'       => 'Update Status',
				'add_new_item'      => 'Add New Status',
				'new_item_name'     => 'New Status',
				'menu_name'         => 'Statuses',
			);
			$args = array(
				'hierarchical'      => true,
				'labels'            => $labels,
				'show_ui'           => true,
				'show_admin_column' => true,
				'show_in_rest'		  => true,
        'edit_in_rest'      => true,
				'rest_base'	=>	'lawStatus',
				'query_var'         => true,
				'rewrite'           => array( 'slug' => 'status' ),
			);

		register_taxonomy( 'status', 'laws', $args );

  /* Custom Taxonomy: Topics
   *  acts as tags
   * Used to tag individual laws by topic, i.e. "Privacy", "Law Enforcement", etc.
   */

			$labels = array(
					'name'              => 'Topics',
					'singular_name'     => 'Topic',
					'search_items'      => 'Search Topics',
					'popular_items'			=> 'Popular Topics',
					'all_items'         => 'All Topics',
					'parent_item'       => null,
				  'parent_item_colon' => null,
					'edit_item'         => 'Edit Topics',
					'update_item'       => 'Update Topics',
					'add_new_item'      => 'Add New Topics',
					'new_item_name'     => 'New Topic Name',
					'separate_items_with_commas' => 'Separate topics with commas',
					'add_or_remove_items' => 'Add or remove topics',
					'choose_from_most_used' => 'Choose from the most used topics',
					'not-found'			    => 'No topics found',
					'menu_name'         => 'Topics',
				);
				$args = array(
					'hierarchical'      => false,
					'labels'            => $labels,
					'show_ui'           => true,
					'show_admin_column' => true,
					'show_in_rest'		 => true,
					'update_count_callback' => '_update_post_term_count',
					'query_var'         => true,
					'rewrite'           => array( 'slug' => 'topics' ),
				);

			register_taxonomy( 'topics', array('laws','post'), $args );

}


/* Add drop-down filter menu to WP Admin panel so that Law posts can be sorted by custom taxonomies */
/* Developed based on tutorial from Pippins Plugins:
/* https://pippinsplugins.com/post-list-filters-for-custom-taxonomies-in-manage-posts/
*/

function SDL_admin_taxonomy_filters() {
	global $typenow;

	$taxonomies = array('state','status','topics'); //Array of custom taxonomies we want to filter Law Posts by

	if( $typenow == 'laws' ){  //Set type to custom post type, Laws

		foreach ($taxonomies as $tax_slug) {
			$tax_obj = get_taxonomy($tax_slug);
			$tax_name = $tax_obj->labels->name;
			$terms = get_terms($tax_slug);

			if(count($terms) > 0) {
				echo "<select name='strtolower($tax_slug)' id='strtolower($tax_slug)' class='postform'>";
				echo "<option value=''>Show All $tax_name</option>";
        $current_tax_slug = isset ( $_GET[$tax_slug] ) ?
        $_GET[$tax_slug] : false;

				foreach ($terms as $term) {
					echo '<option value='. $term->slug, $_GET[$tax_slug] == $term->slug ? ' selected="selected"' : '','>' . $term->name .' (' . $term->count .')</option>';
				}
				echo "</select>";
			}
		}
	}
}
add_action( 'restrict_manage_posts', 'SDL_admin_taxonomy_filters' );

function total_current_laws(){
  $the_query = new WP_Query(
    array(
      'post_type' => 'laws',
      'tax_query' =>
        array(
          array(
              'taxonomy' => 'status',
              'field' => 'name',
              'terms' => 'current'
          )
        )
    )
  );

  $count = $the_query->found_posts;
  return $count;
}

function total_pending_laws(){
  $the_query = new WP_Query(
    array(
      'post_type' => 'laws',
      'tax_query' =>
        array(
          array(
              'taxonomy' => 'status',
              'field' => 'name',
              'terms' => 'pending'
          )
        )
    )
  );

  $count = $the_query->found_posts;
  return $count;
}

function total_municipal_laws(){
  $the_query = new WP_Query(
    array(
      'post_type' => 'laws',
      'tax_query' =>
        array(
          array(
              'taxonomy' => 'topics',
              'field' => 'name',
              'terms' => 'municipal'
          )
        )
    )
  );

  $count = $the_query->found_posts;
  return $count;
}

add_shortcode('currentlaws_count', 'total_current_laws');
add_shortcode('pendinglaws_count', 'total_pending_laws');
add_shortcode('municipallaws_count', 'total_municipal_laws');
?>
