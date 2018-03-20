(function($) {

	// we create a copy of the WP inline edit post function
	var $wp_inline_edit = inlineEditPost.edit;

	// and then we overwrite the function with our own code
	inlineEditPost.edit = function( id ) {

		// "call" the original WP edit function
		// we don't want to leave WordPress hanging
		$wp_inline_edit.apply( this, arguments );

		// now we take care of our business

		// get the post ID
		var $post_id = 0;
		if ( typeof( id ) == 'object' )
			$post_id = parseInt( this.getId( id ) );

		if ( $post_id > 0 ) {

			// define the edit row
			var $edit_row = $( '#edit-' + $post_id );

			// get the old date
			// var $talk_date = $( '#talk_date-' + $post_id ).text();

			// // set the old date
			// $edit_row.find( 'input[name="talk_date"]' ).val( $talk_date );


			// get the new date
			var $talk_date2 = $( '#talk_date2-' + $post_id ).text();

			// set the new date
			$edit_row.find( 'input[name="talk_date2"]' ).val( $talk_date2 );


			// get the rating
			var $talk_rating = $( '#talk_rating-' + $post_id ).text();

			// set the rating
			$edit_row.find( 'input[name="talk_rating"]' ).val( $talk_rating );

		}

	};

	$( '#bulk_edit' ).live( 'click', function() {

		// define the bulk edit row
		var $bulk_row = $( '#bulk-edit' );

		// get the selected post ids that are being edited
		var $post_ids = new Array();
		$bulk_row.find( '#bulk-titles' ).children().each( function() {
			$post_ids.push( $( this ).attr( 'id' ).replace( /^(ttle)/i, '' ) );
		});

		// get the custom fields
		// var $talk_date = $bulk_row.find( 'input[name="talk_date"]' ).val();
		var $talk_date2 = $bulk_row.find( 'input[name="talk_date2"]' ).val();
		var $talk_rating = $bulk_row.find( 'input[name="talk_rating"]' ).val();

		// save the data
		$.ajax({
			url: ajaxurl, // this is a variable that WordPress has already defined for us
			type: 'POST',
			async: false,
			cache: false,
			data: {
				action: 'manage_wp_posts_using_bulk_quick_save_bulk_edit', // this is the name of our WP AJAX function that we'll set up next
				post_ids: $post_ids, // and these are the 2 parameters we're passing to our function
				// talk_date: $talk_date,
				talk_date2: $talk_date2,
				talk_rating: $talk_rating
			}
		});

	});

})(jQuery);