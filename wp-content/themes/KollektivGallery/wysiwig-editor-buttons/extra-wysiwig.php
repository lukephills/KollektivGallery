<?php
/**
 * Add and register extra WYSIWIG button
 *
 * Extra Buttons:
     * pullquote - wraps a <span class="pullquote"></span>
     * blogPostContainer - wraps a <span class="blog-post-container"></span>
     * showRecent - displays a list of recent posts
     * Lorum Ipsum - generates a lorum ipsum
 *
 * note: They must be registered below to work
 */

/**
 * Uncomment this for the extra buttons
 */
add_action( 'admin_head', 'femur_buttons' );


/**
 * Set up TinyMCE buttons if the user has the sufficient admin permissions
 */
function femur_buttons() {
    // check user permissions
    if ( !current_user_can('edit_posts') && !current_user_can('edit_pages') ) {
        return;
    }
    // check if WYSIWYG is enabled
    if ( get_user_option('rich_editing') == 'true') {
        add_filter( "mce_external_plugins", "femur_add_buttons" );
        add_filter( 'mce_buttons', 'femur_register_buttons' );
    }
}


function femur_add_buttons( $plugin_array ) {
    $plugin_array['femur'] = get_template_directory_uri() . '/wysiwig-editor-buttons/extra-wysiwig-plugin.js';
    return $plugin_array;
}
function femur_register_buttons( $buttons ) {
    array_push( $buttons,'lorumIpsum','subscribe');
    return $buttons;
}


function femur_activate_styleselect($buttons) {
    array_unshift( $buttons, 'styleselect' );
    return $buttons;
}
add_filter('mce_buttons_2', 'femur_activate_styleselect');


function femur_own_styles($config) {
    $temp_array = array(
        array(
            'title' => 'Blockquote',
            'block' => 'blockquote'
        ),
        array(
            'title' => 'Pullquote',
            'inline' => 'span',
            'classes' => 'pullquote'
        ),
        array(
            'title' => 'Blog Post Container',
            'block' => 'p',
            'classes' => 'blog-post-container'
        )
    );
    $config['style_formats'] = json_encode( $temp_array );
    unset($config['preview_styles']);
    return $config;
}
add_filter('tiny_mce_before_init', 'femur_own_styles');



/**
 * REMOVE WYSIWIG BUTTONS
 *
 * Row 1: mce_buttons
 * Row 2: mce_buttons_2
 *
 * Uncomment the below function and filter if you wish to use
 * Unset the chosen button in the $buttons array()
 */
//function femur_remove_buttons($buttons) {
//    unset($buttons[0]);
//    return $buttons;
//}
//add_filter('mce_buttons', 'femur_remove_buttons');



?>