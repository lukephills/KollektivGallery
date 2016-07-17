<?php

add_theme_support( 'menus' );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'html5' );



if (function_exists('add_image_size')) {
//	add_image_size('featured', 400, 250, true); //name of image, w, h, crop?
	add_image_size('main-artist-image', 350, 350, true);
	add_image_size('large-blog-post', 600, 300, true);
	add_image_size('small-blog-post', 300, 200, true);
//	add_image_size('small-square', 250, 250, true);
}


function femur_excerpt_length( $length ) {
	return 16;
}
add_filter( 'excerpt_length', 'femur_excerpt_length', 999); // Wordpress, when you're setting the excerpt length, override with my length function. And do it last!



function register_theme_menus() {

	register_nav_menus(
		array(
			'primary-menu'  =>  __( 'Primary Menu' , 'kollektiv-legacy-theme' ) // I can add more menus in the array here (example - footer menu)
		)
	);
}
add_action( 'init', 'register_theme_menus' );



function femur_create_widget( $name, $id, $description ) {

	register_sidebar(array(
		'name' => __( $name ),
		'id' => $id,
		'description' => __( $description ),
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h5 class="module-heading uppercase">',
		'after_title' => '</h5>'
	));

}
femur_create_widget( 'Page Sidebar', 'page', 'Displays on the side of pages with a sidebar' );
femur_create_widget( 'Blog Sidebar', 'blog', 'Displays on the side of pages in the blog section' );



function femur_theme_styles() {
	wp_enqueue_style('main_css', get_template_directory_uri() . '/style.css');
}
//Wordpress, when it is time to enqueue scripts add the stylesheets
add_action( 'wp_enqueue_scripts', 'femur_theme_styles' );

/**
 * If FEMUR_DEBUG is true we load seperate unminified js files
 * Else load one concatenated minified script file for production
 */
define( 'FEMUR_JS_DEBUG', true );

function femur_theme_js() {

	wp_enqueue_script('modernizer_js', get_template_directory_uri() . '/assets/js/modernizr.js',
		'', '', false); // False = Place in header

	if (FEMUR_JS_DEBUG) {

		wp_enqueue_script('waypoints', get_template_directory_uri() . '/assets/js/vendor/jquery.waypoints.min.js',
			array('jquery'), '', true); // Dependant on jquery. True = Place in footer

		wp_enqueue_script('scroll', get_template_directory_uri() . '/assets/js/vendor/jquery.scrollTo.min.js',
			array('jquery'), '', true); // Dependant on jquery. True = Place in footer

//		TODO: add gsap in here

		wp_enqueue_script('main_js', get_template_directory_uri() . '/assets/js/app.js',
			array('jquery'), '', true); // Dependant on jquery

	} else {

		wp_enqueue_script('main_js', get_template_directory_uri() . '/assets/js/app.min.js',
			array('jquery'), '', true); // Dependant on jquery

	}

}
//Wordpress, when it is time to enqueue scripts add the javascript files
add_action( 'wp_enqueue_scripts', 'femur_theme_js' );


/**
 * Stops admin bar from pushing html down 28px
 *
//function my_filter_head() {
//	remove_action('wp_head', '_admin_bar_bump_cb');
//}
//add_action('get_header', 'my_filter_head');


/**
 * THIS HIDES THE ADMIN BAR COMPLETELY
 *
//add_filter('show_admin_bar', '__return_false');



/**
* Add a widget to the dashboard.
*
* This function is hooked into the 'wp_dashboard_setup' action below.
*/
function femur_add_dashboard_widgets() {

wp_add_dashboard_widget(
'femur_dashboard_widget',         // Widget slug.
'WELCOME TO YOUR SITE',         // Title.
'femur_dashboard_widget_function' // Display function.
);
}
add_action( 'wp_dashboard_setup', 'femur_add_dashboard_widgets' );
/**
* Create the function to output the contents of our Dashboard Widget.
*/
function femur_dashboard_widget_function() {

// Display whatever it is you want to show.
echo "Hello Kollektiv, You're looking very beautiful today";
}




/**
 * Returns an array of related posts
 * @param the post type to querye
 */
function kollektiv_get_related_posts($post_type) {
	global $post;
	$bpost = $post;
	$tags = wp_get_post_tags($post->ID);
	if ($tags) {
		$tag_ids = array();
		foreach($tags as $tag) {
			$tag_ids[] = $tag->term_id;
		}

		$args = array(
			'tag__in' => $tag_ids,
			'post_type' => $post_type,
			'post__not_in' => array($post->ID),
			'showposts' => 10,
			'ignore_sticky_posts' => 1
		);

		$related_query = new WP_Query($args);

		if( $related_query->have_posts() ) {

			$related_posts = array();
			while ($related_query->have_posts()) {
				$related_query->the_post();

				$related = array();
				$related['title'] = get_the_title();
				$related['permalink'] = get_permalink();
				$related['date'] = get_the_date();
				$related['tags'] = get_the_tag_list( '<div class="labels"><p>Tags:</p>', ' ', '</div>');

//				var_dump($related['title']);
				if ( has_post_thumbnail() ) {
					$related['thumb'] = get_the_post_thumbnail(null ,'main-artist-image', array(
						'class'	=> '',
						'title'	=> '',
					));
					$related['thumb'] = preg_replace('/(width|height)="[0-9]*"/i', '', $related['thumb']);
				} else {
					$related['thumb'] = '';
				}
				$related['relevance'] = 0;
				$rel_tags = wp_get_post_tags($post->ID);
				if ($rel_tags) {
					foreach($rel_tags as $tag) {
						if (in_array($tag->term_id, $tag_ids)) {
							$related['relevance']++;
						}
					}
				}
				$related_posts[] = $related;
			}
			$post = $bpost;
			wp_reset_query();
			usort($related_posts, function($a, $b) {
				if ($a['relevance'] == $b['relevance']) return 0;
				return ($a['relevance'] > $b['relevance'])? -1 : 1;
			});
			return $related_posts;
		}
	}

	return false;
}

/**
 * Gets the current pages URL
 * @return string
 */
function get_current_URL() {
	global $wp;
	return home_url(add_query_arg(array(),$wp->request));
}


/**
 * Adds custom post types to Archive query
 * @param $query
 * @return mixed
 */
function namespace_add_custom_types( $query ) {
  if( is_category() || is_tag() && empty( $query->query_vars['suppress_filters'] ) ) {
	  $query->set( 'post_type', array(
		  'post', 'nav_menu_item', 'kollektiv_artists'
	  ));
	  return $query;
  }
}
add_filter( 'pre_get_posts', 'namespace_add_custom_types' );



/**
 * Require the plugin for the extra WYSIWIG buttons
 */
require( 'wysiwig-editor-buttons/extra-wysiwig.php' );



/**
 * 	TODO: Style it properly
 *  Shortcode for displaying subscribe field
 */
function femur_subscribe_shortcode() {

	$html = '<form id="signup" action="http://kollektivgallery.us7.list-manage.com/subscribe/post?u=20e49663c93adc0174c86ea9e&amp;id=746455a945" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate subscribe-form shortcode" target="_blank" novalidate>

                <input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="Email address" required>
                    <input class="subscribe-btn kollektiv-go-button" type="submit" value="" name="subscribe" id="mc-embedded-subscribe">

            </form>';
	return $html;
}
add_shortcode( 'subscribe', 'femur_subscribe_shortcode' );

