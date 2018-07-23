<?php

add_action( 'admin_print_scripts-edit.php', 'tedx_bul_quick_edit_enqueue_admin_scripts' );
function tedx_bul_quick_edit_enqueue_admin_scripts() {

	// if using code as plugin
	wp_enqueue_script( 'manage-wp-posts-using-bulk-quick-edit', trailingslashit( plugin_dir_url( __FILE__ ) ) . 'js/bulk-quick-edit.js', array( 'jquery', 'inline-edit-post' ), '', true );

}