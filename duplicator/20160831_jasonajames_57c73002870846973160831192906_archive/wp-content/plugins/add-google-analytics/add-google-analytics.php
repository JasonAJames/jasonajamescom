<?php
/**
* Plugin Name: Add Google Analytics
* Plugin URI: http://JasonAJames.com/custom-wp-plugins/
* Description: This Plugin adds a admin dashboard widget
* Author: Jason James
*/

function jppm_google_analytics_link(){
	global $wp_admin_bar;
	
	$wp_admin_bar -> add_menu( array( 'id'=>'google_analytics',
									  'title'=>' Google Analytics',
									  'href'=>'http://google.com/analytics' ) );	
}

add_action('wp_before_admin_bar_render','jppm_google_analytics_link');