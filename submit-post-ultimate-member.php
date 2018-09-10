<?php
/**
* Plugin Name: Submit Post - Ultimate-member
* Plugin URI: 
* Description: This plugin allows you to add a form to send the post, using the ultimate member plugin and the user frontend plugin.
* Version: 1.0.0
* Author: Ronalses Aguilar
* Author URI: 
* License: GPL2
*/

function plugin_scripts() {
    wp_register_style( 'submit-post-styles',  plugin_dir_url( __FILE__ ) . 'assets/styles.css' );
    wp_enqueue_style( 'submit-post-styles' );
}
add_action( 'wp_enqueue_scripts', 'plugin_scripts' );

/* First we need to extend main profile tabs */
add_filter('um_profile_tabs', 'submit_post_tab', 1000 );
function submit_post_tab( $tabs ) {

	$tabs['submit_post'] = array(
		'name' => 'Enviar Post',
		'icon' => 'um-faicon-comments',
	);
    
    $tabs['edit_post'] = array(
        'name' => 'Editar post',
        'icon' => '',
	);
	
	return $tabs;
		
}

add_action('um_profile_content_submit_post_default', 'um_profile_content_submit_post_default');
function um_profile_content_submit_post_default( $args ) { ?>
	<?php echo do_shortcode("[wpuf_form id='35']"); ?>
<?php } 

/* Then we just have to add content to that tab using this action */
add_action('um_profile_content_edit_post_default', 'um_profile_content_edit_post_default');
function um_profile_content_edit_post_default( $args ) { ?>
	<?php echo do_shortcode("[wpuf_edit]"); ?>
<?php }
