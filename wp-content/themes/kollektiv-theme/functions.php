<?php

if ( get_option ('thread_comments') ) {
	wp_enqueue_script( 'comment-reply' );
}

// Create Nav Menu

if (function_exists('register_nav_menus')) {
	register_nav_menus (array('primary' => 'Header Navigation') );
}



// Search Filter
function wpshock_search_filter( $query ) {
    if ( $query->is_search ) {
        $query->set( 'post_type', array('post','page', 'kollektiv_artists', 'kollektiv_workshops', 'kollektiv_products') );
    }
    return $query;
}
add_filter('pre_get_posts','wpshock_search_filter');




// PAGINATION
function get_pagination($the_query) {
    global $paged;
    $total_pages = $the_query->max_num_pages;
    $big = 999999999;

    if ($total_pages > 1) {
        ob_start();

        echo paginate_links( array(
            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            //'format' => '/page/%#%',
            'format' => '/page/%#%',
            'current' => $paged,
            'total' => $total_pages,
            'prev_text' => 'prev',
            'next_text' => 'next'
        ));
        return ob_get_clean();
    }
    return null;
}

// This function fixes pagination for permalinks structure
function omb_init() {
 global $wp_rewrite;

  add_rewrite_rule('\/page\/?([0-9]{1,})\/?$','?paged=$matches[1]','top');
}


// add_filter('redirect_canonical','pif_disable_redirect_canonical');

// function pif_disable_redirect_canonical($redirect_url) {
// if (is_singular('pov_channel')) $redirect_url = false;
// return $redirect_url;
// }






// Switching on support for post thumbnails/lead images

if (function_exists('add_theme_support')) {
	add_theme_support('post-thumbnails');
}

if (function_exists('add_image_size')) {
	add_image_size('featured', 400, 250, true); //name of image, w, h, crop?
	add_image_size('main-artist-image', 350, 350, true);
	add_image_size('post-thumb', 200, 200, true);
	add_image_size('small-square', 250, 250, true);
}

if (function_exists(register_sidebar)) {
	register_sidebar(
		array(
			'name' => 'Footer Widgets',
			'id' => 'footer-widgets',
			'description' => 'Place some footer widgets here',
			'before_title' => '<p style="font-size:1em;">',
			'after_title' => '</p><small>',
			'after_widget' => '</small>'
			)

		);
	register_sidebar(
		array(
			'name' => 'Sidebar Widgets',
			'id' => 'sidebar-widgets',
			'description' => 'Place some sidebar widgets for post pages here.',
			'before_title' => '<p>',
			'after_title' => '</p>'
			)

		);
}
//shorten excerpt length
function custom_excerpt_length( $length ) {
	return 60;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );


function excerpt($limit) {
      $excerpt = explode(' ', get_the_excerpt(), $limit);
      if (count($excerpt)>=$limit) {
        array_pop($excerpt);
        $excerpt = implode(" ",$excerpt.'...');
      } else {
        $excerpt = implode(" ",$excerpt);
      } 
      $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
      $excerpt = $excerpt.'...';
      return $excerpt;
    }

    function content($limit) {
      $content = explode(' ', get_the_content(), $limit);
      if (count($content)>=$limit) {
        array_pop($content);
        $content = implode(" ",$content.'...');
      } else {
        $content = implode(" ",$content.'...');
      } 
      $content = preg_replace('/\[.+\]/','', $content);
      $content = apply_filters('the_content', $content); 
      $content = str_replace(']]>', ']]&gt;', $content);
      return $content;
    }




function create_post_type(){
	register_post_type('kollektiv_kin', // slug - Called kollektiv_artists to avoid it interference
		array('labels' => 
			array(
				'name' => __('Kin'),
				'singular_name' => __('Kin') // "__" Allows wordpress to translate this word to localised setting
			),
			'public' => true, 
			'menu_postiion' => 4, // This is where it shows up in admin menu (5=below posts, 10=below media, 15=below links, etc...)
			'rewrite' => array('slug' => 'kin'),
			'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments'),
			'taxonomies' => array('post_tag')
		)
	);
	register_post_type('kollektiv_artists', // slug - Called kollektiv_artists to avoid it interference
		array('labels' => 
			array(
				'name' => __('Artists'),
				'singular_name' => __('Artist') // "__" Allows wordpress to translate this word to localised setting
			),
			'public' => true, 
			'menu_postiion' => 5, // This is where it shows up in admin menu (5=below posts, 10=below media, 15=below links, etc...)
			'rewrite' => array('slug' => 'artists'), //changing name from 'kollektiv_artists' to 'artists'
			'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments'),
			'taxonomies' => array('post_tag')
		)
	);

	register_post_type('kollektiv_workshops', // slug - Called kollektiv_artists to avoid it interference
		array('labels' => 
			array(
				'name' => __('Workshops'),
				'singular_name' => __('Workshop') // "__" Allows wordpress to translate this word to localised setting
			),
			'public' => true, 
			'menu_postiion' => 6, // This is where it shows up in admin menu (5=below posts, 10=below media, 15=below links, etc...)
			'rewrite' => array('slug' => 'workshops'), //changing name from 'kollektiv_artists' to 'artists'
			'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments'),
			'taxonomies' => array('post_tag')
		)
	);
	register_post_type('kollektiv_products', // slug - Called kollektiv_artists to avoid it interference
		array('labels' => 
			array(
				'name' => __('Products'),
				'singular_name' => __('Product') // "__" Allows wordpress to translate this word to localised setting
			),
			'public' => true, 
			'menu_postiion' => 7, // This is where it shows up in admin menu (5=below posts, 10=below media, 15=below links, etc...)
			'rewrite' => array('slug' => 'products'), //changing name from 'kollektiv_artists' to 'artists'
			'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments'),
			'taxonomies' => array('post_tag')
		)
	);  
}

add_action ('init', 'create_post_type');


/* functions for counting page views */
function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0";
    }
    return $count;
}
function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}


//ADD JQUERY
function jquery_method() {
	wp_deregister_script( 'jquery' );
	wp_register_script(   'jquery'
	    , '//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js', false, false);

	wp_enqueue_script('jquery');
}    

if( !is_admin() ) {
	add_action('init', 'jquery_method');
}





// Change file size maximum
// @ini_set( 'upload_max_size' , '32M' );
// @ini_set( 'post_max_size', '32M');
// @ini_set( 'max_execution_time', '300' );

// define( 'WP_MEMORY_LIMIT', '64M' );

/**
 * Sets up theme defaults and registers the various WordPress features that
 * the Migration theme supports.
 *
 * @uses add_editor_style() To add a Visual Editor stylesheet.
 * @uses add_theme_support() To add support for post thumbnails
 * @uses register_nav_menu() To add support for navigation menus.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 */
function migration_setup() {

	// This theme styles the visual editor with editor-style.css to give it some niceties.
	add_editor_style();

	// This theme uses wp_nav_menu() in one location.
	register_nav_menu( 'primary', __( 'Primary Menu', 'migration' ) );

	// This theme uses a custom image size for featured images, displayed on "standard" posts.
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 500, 9999 ); // Unlimited height, soft crop
}
add_action( 'after_setup_theme', 'migration_setup' );


/**
 * Enqueues scripts and styles for front-end.
 */
function migration_scripts_styles() {
	global $wp_styles;

	/*
	 * Loads our main stylesheet.
	 */
	wp_enqueue_style( 'migration-style', get_stylesheet_uri() );

	/*
	 * Optional: Loads the Internet Explorer specific stylesheet.
	 */
	//wp_enqueue_style( 'migration-ie', get_template_directory_uri() . '/css/ie.css', array( 'migration-style' ), '20121010' );
	//$wp_styles->add_data( 'migration-ie', 'conditional', 'lt IE 9' );
}
// add_action( 'wp_enqueue_scripts', 'migration_scripts_styles' );
