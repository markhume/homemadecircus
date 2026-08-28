<?php
/**
 * @package Starter_Theme
 * @since Starter Theme 1.0
 */

//include 'functions-custom.php';

if ( ! function_exists( 'startertheme_setup' ) ) :

function startertheme_setup() {

	/**
   * Make theme available for translation.
   * Translations can be placed in the /languages/ directory.
   */
  load_theme_textdomain( 'startertheme', get_template_directory() . '/languages' );

	/**
   * Add default posts and comments RSS feed links to <head>.
   */
  //add_theme_support( 'automatic-feed-links' );

  /**
   * Enable support for post thumbnails and featured images.
   */
  add_theme_support( 'post-thumbnails' );

	/**
   * Add support for two custom navigation menus.
   */
  register_nav_menus( array(
    'primary'   => __( 'Primary Menu', 'startertheme' ),
	'home'   => __( 'Home Menu', 'startertheme' ),
	'help-info'   => __( 'Help and Info Menu', 'startertheme' ),
	'planning-workshop'   => __( 'Planning Your Workshop', 'startertheme' ),
	'footer'   => __( 'Footer Menu', 'startertheme' )
  ) );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/**
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support(
 		'html5',
 		array(
 			'search-form',
 			'comment-form',
 			'comment-list',
 			'gallery',
 			'caption',
 			'script',
 			'style',
 		)
	);

  /**
	 * Enqueue scripts and styles for the front end.
	 */
   function startertheme_scripts() {
    // Load our main stylesheet.
    wp_enqueue_style('startertheme-style', get_template_directory_uri() . '/style.css', false, filemtime(get_stylesheet_directory() . '/style.css'));

    // Load js plugins.
    wp_enqueue_script( 'plugins-js', get_template_directory_uri() . '/assets/js/min/plugins.min.js', array( 'jquery' ), filemtime(get_stylesheet_directory() . '/assets/js/min/plugins.min.js'), true );
    wp_enqueue_script( 'main-js', get_template_directory_uri() . '/assets/js/min/main.min.js', array( 'jquery' ), filemtime(get_stylesheet_directory() . '/assets/js/min/main.min.js'), true );

	}
	add_action( 'wp_enqueue_scripts', 'startertheme_scripts' );

	// IMAGE SIZES
	//add_image_size( 'custom-img-crop', 700, 450, true );
	//add_image_size( 'custom-img', 1200, 9999, false );

	// APPLY PAGE SLUGS TO BODY CLASS
	function add_slug_body_class( $classes ) {
		global $post;
		if ( isset( $post->post_name ) ) {
			$classes[] = '' . $post->post_name;
		}
		$parent = (isset($post->post_parent)) ? $post->post_parent : NULL;
		while ($parent > 0)  {
			$parent_post = get_post($parent);
			$classes[]= ''.$parent_post->post_name;
			$parent = $parent_post->post_parent;
		}

		return $classes;
		}
	add_filter( 'body_class', 'add_slug_body_class' );
	// APPLY PAGE SLUGS TO BODY CLASS

	// REMOVE FROM HEAD
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wlwmanifest_link');
	remove_action('wp_head', 'wp_generator');

	function remove_gutenberg_styles() {
		wp_dequeue_style( 'wp-block-library' );
	}
	add_action( 'wp_enqueue_scripts', 'remove_gutenberg_styles', 100 );

	// REMOVE UNUSED WRITE PANELS
	add_action( 'admin_menu', 'my_remove_menus', 999 );

	function my_remove_menus() {
		//remove_menu_page( 'edit.php' );
		remove_menu_page( 'edit-comments.php' );
	}

	// ADD PAGE SLUG TO MENU ITEM CLASS
	add_filter( 'wp_nav_menu_objects', 'cam_add_menu_slug_class' );
	function cam_add_menu_slug_class( $items ) {

		// Add parent class
		$parents = array();
		foreach ( $items as $item ) {
			if ( $item->menu_item_parent && $item->menu_item_parent > 0 ) {
				$parents[] = $item->menu_item_parent;
			}
		}

		foreach ( $items as $item ) {
			if ( in_array( $item->ID, $parents ) ) {
				$item->classes[] = 'menu-item-parent';
			}
		}

		// Add slug class
		foreach ($items as $key => $item) {
			$items[$key]->classes[] = 'menu-' . sanitize_title($item->title);
		}

		return $items;
	}

	// ADD ACF OPTIONS PANEL
	if( function_exists('acf_add_options_page') ) {
		acf_add_options_page();
	}

	// MOVE YOAST TO BOTTOM
	function yoasttobottom() {
		return 'low';
	}
	add_filter( 'wpseo_metabox_prio', 'yoasttobottom');

	// REMOVE UNWANTED SCRIPTS
	function my_deregister_scripts(){
	  wp_deregister_script( 'wp-embed' );
	}
	add_action( 'wp_footer', 'my_deregister_scripts' );

	// REMOVE CSS FROM HEAD
	function remove_recent_comments_style() {
	    global $wp_widget_factory;
	    remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));
	}
	add_action('widgets_init', 'remove_recent_comments_style');

}
endif; // startertheme_setup
add_action( 'after_setup_theme', 'startertheme_setup' );

/**
 * Create a nicely formatted and more specific title element text for output
 * in head of document, based on current view.
 *
 * @since Starter Theme 1.0
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string The filtered title.
 */
function startertheme_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() ) {
		return $title;
	}

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title = "$title $sep $site_description";
	}

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 ) {
		$title = "$title $sep " . sprintf( __( 'Page %s', 'startertheme' ), max( $paged, $page ) );
	}

	return $title;
}
add_filter( 'wp_title', 'startertheme_wp_title', 10, 2 );

// Custom template tags for this theme.
require get_template_directory() . '/inc/template-tags.php';

// Add Customizer functionality.
//require get_template_directory() . '/inc/customizer.php';

/* Remove WP logo from login page */

function custom_login_logo() {
    echo '<style type ="text/css">.login h1 a { display:none!important; }</style>';
}

add_action('login_head', 'custom_login_logo');

add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);
function special_nav_class ($classes, $item) {
  if (in_array('current-menu-item', $classes) ){
    $classes[] = 'active ';
  }
  return $classes;
}

/**
 * This function modifies the main WordPress archive query for categories
 * and tags to include an array of post types instead of the default 'post' post type.
 *
 * @param object $query The main WordPress query.
 */
function tg_include_custom_post_types_in_archive_pages( $query ) {
    if ( $query->is_main_query() && ! is_admin() && ( is_category() || is_tag() && empty( $query->query_vars['suppress_filters'] ) ) ) {
        $query->set( 'post_type', array( 'post', 'activity' ) );
    }
}
add_action( 'pre_get_posts', 'tg_include_custom_post_types_in_archive_pages' );

/**
 * Register ACF field groups.
 */
function homemade_circus_register_acf_field_groups() {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

	acf_add_local_field_group(
		array(
			'key'                   => 'group_homemade_circus_page_sidebar',
			'title'                 => 'Page Sidebar',
			'fields'                => array(
				array(
					'key'           => 'field_show_planning_sidebar',
					'label'         => 'Show Planning Help sidebar',
					'name'          => 'show_planning_sidebar',
					'type'          => 'true_false',
					'instructions'  => 'Show the Planning Help sidebar on this page. It also appears automatically on Planning Your Workshop subpages (not the parent page itself).',
					'default_value' => 0,
					'ui'            => 1,
				),
			),
			'location'              => array(
				array(
					array(
						'param'    => 'post_type',
						'operator' => '==',
						'value'    => 'page',
					),
				),
			),
			'menu_order'            => 0,
			'position'              => 'side',
			'style'                 => 'default',
			'label_placement'       => 'top',
			'instruction_placement' => 'label',
			'active'                => true,
		)
	);
}
add_action( 'acf/init', 'homemade_circus_register_acf_field_groups' );