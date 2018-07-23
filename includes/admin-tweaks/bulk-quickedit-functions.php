<?php


/*
 * QUICK EDIT STUFF
 * https://github.com/bamadesigner/manage-wordpress-posts-using-bulk-edit-and-quick-edit/blob/master/manage_wordpress_posts_using_bulk_edit_and_quick_edit.php
 */

add_action( 'bulk_edit_custom_box', 'tedx_bulk_quick_edit_custom_box', 10, 2 );
add_action( 'quick_edit_custom_box', 'tedx_bulk_quick_edit_custom_box', 10, 2 );
function tedx_bulk_quick_edit_custom_box( $column_name, $post_type ) {

	switch ( $post_type ) {

		case 'tedxvideo':

			switch( $column_name ) {

				case 'date_new':

					?><fieldset class="inline-edit-col-left">
						<div class="inline-edit-col">
							<label>
								<span class="title">Event date</span>
								<span class="input-text-wrap">
									<input type="text" value="" name="talk_date2">
								</span>
							</label>
						</div>
					</fieldset><?php
					break;

				case 'rating':

					?><fieldset class="inline-edit-col-left">
						<div class="inline-edit-col">
							<label>
								<span class="title">Rating</span>
								<span class="input-text-wrap">
									<input type="text" value="" name="talk_rating">
								</span>
							</label>
						</div>
					</fieldset><?php
					break;
			}
			break;
	}
}



add_action( 'save_post', 'tedx_bulk_quick_edit_save_post', 10, 2 );
function tedx_bulk_quick_edit_save_post( $post_id, $post ) {
	// pointless if $_POST is empty (this happens on bulk edit)
	if ( empty( $_POST ) )
		return $post_id;

	// verify quick edit nonce
	if ( isset( $_POST[ '_inline_edit' ] ) && ! wp_verify_nonce( $_POST[ '_inline_edit' ], 'inlineeditnonce' ) )
		return $post_id;

	// don't save for autosave
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
		return $post_id;

	// dont save for revisions
	if ( isset( $post->post_type ) && $post->post_type == 'revision' )
		return $post_id;

	switch( $post->post_type ) {

		case 'tedxvideo':

			/**
			 * Because this action is run in several places, checking for the array key
			 * keeps WordPress from editing data that wasn't in the form, i.e. if you had
			 * this post meta on your "Quick Edit" but didn't have it on the "Edit Post" screen.
			 */
			$custom_fields = array( 'talk_date2', 'talk_rating' );

			foreach( $custom_fields as $field ) {

				if ( array_key_exists( $field, $_POST ) )
					update_post_meta( $post_id, $field, $_POST[ $field ] );

			}

			break;

	}

}


add_action( 'wp_ajax_manage_wp_posts_using_bulk_quick_save_bulk_edit', 'tedx_bulk_quick_edit_save_bulk_edit' );
function tedx_bulk_quick_edit_save_bulk_edit() {
	// we need the post IDs
	$post_ids = ( isset( $_POST[ 'post_ids' ] ) && !empty( $_POST[ 'post_ids' ] ) ) ? $_POST[ 'post_ids' ] : NULL;

	// if we have post IDs
	if ( ! empty( $post_ids ) && is_array( $post_ids ) ) {

		// get the custom fields
		$custom_fields = array( 'talk_date2', 'talk_rating' );

		foreach( $custom_fields as $field ) {

			// if it has a value, doesn't update if empty on bulk
			if ( isset( $_POST[ $field ] ) && !empty( $_POST[ $field ] ) ) {

				// update for each post ID
				foreach( $post_ids as $post_id ) {
					update_post_meta( $post_id, $field, $_POST[ $field ] );
				}

			}

		}

	}

}