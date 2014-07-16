<?php
add_action( 'admin_bar_menu', 'add_extension', 999 );

function add_extension($wp_admin_bar) {
    if( !is_main_site() ) {
	$id = get_current_blog_id();
	$expire = ProSites::get_expire($id);
	$diff = $expire - time();
	$years = floor($diff / (365*60*60*24));
	$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
	$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
	
	$args = array(
		'id'    => 'pro_level',
		'title' => sprintf("Your Pro Level expires at %d years, %d months, %d days\n", $years, $months, $days),
		'parent' => 'top-secondary'
	);
	$wp_admin_bar->add_node( $args );
    }
}
