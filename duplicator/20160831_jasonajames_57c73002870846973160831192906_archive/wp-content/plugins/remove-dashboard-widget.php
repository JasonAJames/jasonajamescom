<?php
/**
* Plugin Name: remove dashboard widget
* Plugin URI: http://JasonAJames.com/custom-wp-plugins/
* Description: This Plugin removes a admin dashboard widget
* Author: Jason James
*/

function jppm_remove_dashboard_widget() {
	remove_meta_box('dashboard_primary','dashboard','post_container_1');
	remove_meta_box('dashboard_activity','dashboard','post_container_1');
}
add_action('wp_dashboard_setup','jppm_remove_dashboard_widget');