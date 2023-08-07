<?php 
/*
* Plugin Name: WP-API Rest API Admin
 * Version:     1.0
 * Plugin URI:  https://rajanwebdev.com
 * Description: WP-API Rest API
 * Author:      Rajan Gupta
 * Author URI:  https://rajanwebdev.com
 * Text Domain: wp-api 
 * License:     GPL v3
 * Requires at least: 6.1
 * Requires PHP: 7.2.5
 * 
 * **/

/**
 * Create an admin to show the form submissions
 */
add_action( 'admin_menu', 'wp_learn_rest_submenu', 11 );
function wp_learn_rest_submenu() {
  add_menu_page(
   esc_html__('WP API Admin Page', 'wp_api'),
   esc_html__('WP Learns Admin Page', 'wp_api'),
   'manage_options',
   'wp_learn_admin',
   'wp_learn_rest_render_admin_page',
   'dashicons-admin-tools'
  );
}


/**
 * Render the form submission admin page
 */

function wp_learn_rest_render_admin_page(){
	?>
<div class="wrap" id="wp_learn_admin">
  <h1>Admin</h1>
  <button id="wp-learn-rest-api-button">Load Post via REST</button>
  <button id="wp-learn-clear-posts">Clear Post</button>
  <h2>Posts</h2>
  <textarea id="wp-learn-posts" cols="125" rows="15"></textarea>

</div>
<?php 
}
 


/**
 * Enqueue the main plugin Javascript file
 */

 
add_action('admin_enqueue_scripts', 'wp_learn_rest_script');

function wp_learn_rest_script() {
	wp_register_script(
	'wp-learn-rest-api',
    plugin_dir_url(__FILE__). 'wp-api.js',
    array('wp-api'),
    time(),
    true
	);
	wp_enqueue_script('wp-learn-rest-api');
}