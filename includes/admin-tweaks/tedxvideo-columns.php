<?php

/*
 * Add columns to Talks
 */
add_filter('manage_edit-tedxvideo_columns', 'tedx_add_talks_columns');
function tedx_add_talks_columns($columns) {
	// $columns['id'] = __('ID');
	$columns['event'] = __('Event');
	// $columns['date_old'] = __('Old date');
	$columns['date_new'] = __('New date');
	// $columns['expositor_name'] = __('YouTube URL');
	$columns['rating'] = __('Rating');
	$columns['thumbnail'] = __('Thumbnail');
	return $columns;
}

/*
 * Populate new talks columns
 */
add_action('manage_tedxvideo_posts_custom_column', 'tedx_display_talks_columns', 10, 2);

function tedx_display_talks_columns($column_name, $id) {
	global $wpdb;
	switch ($column_name) {
		// case 'id':
		// 	echo $id;
		//     break;

		case 'event':
			echo get_the_term_list( $id, 'evento', '', ', ', '' );
		    break;

		case 'date_new':
			$date_new = get_post_meta($id, 'talk_date2', true);
			// $tedx_date = date("Y-m-d", $tedx_date);
	        echo '<div id="talk_date2-' . $id . '">' . $date_new . '</div>';
			break;

		case 'rating':
			$rating = get_post_meta($id, 'talk_rating', true);
			// $tedx_date = date("Y-m-d", $tedx_date);
	        echo '<div id="talk_rating-' . $id . '">' . $rating . '</div>';
			break;

		case 'thumbnail':
			if( function_exists('the_post_thumbnail') )
				echo the_post_thumbnail(  array(70,70)  );
			else
				echo 'Not supported in theme';
			break;

		default:
			break;
	} // end switch
}