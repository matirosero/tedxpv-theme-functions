<?php

/*
 * PV2015: lib/cpt-export.php
 */

/* Originally published http://wp-pde.jaliansystems.com/adding-export-filters-to-custom-post-types/ */

/*
When we create a custom post type with can_export set to true,
we can export the custom post types from the admin export screen.
When the CPT is selected, the export creates a WXR file with all
of the posts of this type. We can add filters to the custom post
type so that a subset can be exported.
*/

//First add the HTML markup required using the javascript.
function tedxvideo_export_js() {
?>
<script type="text/javascript">
//<![CDATA[
	jQuery( document ).ready( function( $ ) {
		var form = $( '#export-filters' );
				ourradio = form.find( 'input:radio[value=tedxvideo]' );
				ourradio.closest( 'p' ).after( '<ul class="u-export-filters" id="tedxvideo-filters" style="margin-left: 18px; display: none;">\n<li>\n<label>Date range:</label>\n<?php date_filter(); ?> </li>\n</ul>\n' );
			filters = form.find( '.export-filters' );
		form.find( 'input:radio' ).change(function() {
			switch ( $( this ).val() ) {
				case 'tedxvideo': $( '#tedxvideo-filters' ).slideDown(); break;
				default: $( '#tedxvideo-filters' ).slideUp(); break;
			}
		});
	});
//]]>
</script>
<?php
}
add_action( 'admin_head-export.php', 'tedxvideo_export_js' );

/*
We are using admin_head-export.php action hook. This is called
whenever the export screen is loaded. The method review_export_js
adds the necessary markup. We first find the radio button
displaying our custom post type and then append the required
filter markup. In this case we are adding a date filter to the
custom post type. The date_filter method just echos the markup
for the starting and ending dates.
*/

function date_filter() {
	s_date_filter();
	e_date_filter();
}

function s_date_filter() {
	echo '<select name="tedxvideo_start_date">';
	echo '<option value="0">' . __( "Start Date" ) . '</option>';

	tedxvideo_export_date_options();

	echo '</select>';
}

function e_date_filter() {
	echo '<select name="tedxvideo_end_date">';
	echo '<option value="0">' . __( "End Date" ) . '</option>';

	tedxvideo_export_date_options();

	echo '</select>';
}

function tedxvideo_export_date_options() {
	global $wpdb, $wp_locale;

	$months = $wpdb->get_results( "
		SELECT DISTINCT YEAR( post_date ) AS year, MONTH( post_date ) AS month
		FROM $wpdb->posts
		WHERE post_type = 'tedxvideo' AND post_status != 'auto-draft'
		ORDER BY post_date DESC
	" );

	$month_count = count( $months );
	if ( !$month_count || ( 1 == $month_count && 0 == $months[0]->month ) ) {
		return;
        }

	foreach ( $months as $date ) {
		if ( 0 == $date->year ) {
			continue;
                }
		$month = zeroise( $date->month, 2 );
		echo '<option value="' . $date->year . '-' . $month . '">' . $wp_locale->get_month( $month ) . ' ' . $date->year . '</option>';
	}
}

/*
From now on, the export screen has the option of accepting the start
date and end date fields whenever the custom post type is selected.
Finally, we need to filter the records. We use the query filter to
add the additional where clauses. But first, we ensure that we add
the query filter only when export is taking place using the
export_wp action hook.
*/

function tedxvideo_add_query_filter() {
	if( $_REQUEST['content'] == 'tedxvideo' ) {
		add_filter( 'query', 'tedxvideo_query' );
	}
}
add_action( 'export_wp', 'tedxvideo_add_query_filter' );

/*
The tedxvideo_query method updates the query to include the filters for
the start and end dates.
*/

function tedxvideo_query( $query ) {
	$args = array( 'start_date' => false, 'end_date' => false );
	if ( $_REQUEST['tedxvideo_start_date'] || $_REQUEST['tedxvideo_end_date'] ) {
		$args['start_date'] = $_REQUEST['tedxvideo_start_date'] ;
		$args['end_date'] = $_REQUEST['tedxvideo_end_date'] ;
	}

	global $wpdb;

	if ( $args['start_date'] ) {
		$query .= $wpdb->prepare( " AND {$wpdb->posts}.post_date >= %s", date( 'Y-m-d', strtotime( $args['start_date'] ) ) );
	}

	if ( $args['end_date'] ) {
		$query .= $wpdb->prepare( " AND {$wpdb->posts}.post_date < %s", date( 'Y-m-d', strtotime( '+1 month', strtotime( $args['end_date'] ) ) ) );
	}

	var_export( $query );
	return $query;
}

/*
You can adjust the tedxvideo_query and date_filter methods to accept
different filter conditions for export.
*/