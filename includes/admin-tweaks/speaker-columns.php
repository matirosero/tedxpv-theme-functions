<?php

/*
 * Add columns to Speakers
 * Ref: http://codex.wordpress.org/Plugin_API/Filter_Reference/manage_$post_type_posts_columns
 * 		http://www.tcbarrett.com/2011/10/add-featured-image-thumbnail-to-wordpress-admin-columns/
 */

// Add the posts and pages columns filter. They can both use the same function.
add_filter('manage_speaker_posts_columns', 'tedx_add_speaker_columns', 5);

// Add the column
function tedx_add_speaker_columns($columns){
	$columns['thumbnail'] = __('Thumbnail');
	$columns['event'] = __('Event');
	return $columns;
}


/*
 * Populate new speaker columns
 */

// Hook into the posts an pages column managing. Sharing function callback again.
add_action('manage_speaker_posts_custom_column', 'tedx_display_speaker_columns', 5, 2);

function tedx_display_speaker_columns($col, $id){
	global $wpdb;
  	switch($col){

		case 'thumbnail':
			if( function_exists('the_post_thumbnail') )
				echo the_post_thumbnail(  array(70,70)  );
			else
				echo 'Not supported in theme';
			break;

		case 'event':
			echo get_the_term_list( $id, 'evento', '', ', ', '' );
		    break;

		default:
		  break;
  	}
}