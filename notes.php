<?php

/*
Plugin Name: In-Context Admin Notes
Plugin Description: Leave notes for other members of the team inside the training with [adminNote]Secret[/adminNote]
Plugin Author: John Dennis Pedrie
Version: 1.0
Plugin URI: http://www.johnpedrie.com
Author URI: http://www.johnpedrie.com
*/

include ABSPATH . WPINC .'/pluggable.php';

add_shortcode('adminNote', 'admin_note_shortcode');
add_shortcode('adminnote', 'admin_note_shortcode');
function admin_note_shortcode( $atts, $content = null ) {
	if ( current_user_can('manage_options') ) {
		return '<span class="admin-note">' . $content . '</span>';
	}
}

if ( current_user_can('manage_options') ) {
	add_action('wp_head', 'admin_note_style');
}
function admin_note_style() {
?>
<style type="text/css">
.admin-note {
	color:red;
}
</style>
<?php
}