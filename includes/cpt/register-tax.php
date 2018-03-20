<?php

/*
 * Register taxonomies
 */
add_action( 'init', 'tedx_register_taxonomies', 0 );
function tedx_register_taxonomies() {

	register_taxonomy(
		'evento',
		array( 'speaker','post','page','tedxvideo','program' ),
		array(
			'public' => true,
			'hierarchical' => true,
			'labels' => array(
				'name' => __( 'Eventos', 'tedxpv_custom' ),
				'singular_name' => __( 'Evento', 'tedxpv_custom' ),
				'search_items' => __( 'Search Eventos', 'tedxpv_custom' ),
				'popular_items' => __( 'Popular Eventos', 'tedxpv_custom' ),
				'all_items' => __( 'All Eventos', 'tedxpv_custom' ),
				'edit_item' => __( 'Edit Evento', 'tedxpv_custom' ),
				'update_item' => __( 'Update Evento', 'tedxpv_custom' ),
				'add_new_item' => __( 'Add New Evento', 'tedxpv_custom' ),
				'new_item_name' => __( 'New Evento', 'tedxpv_custom' ),
			),
			'rewrite' => array('with_front' => false ),
		)
	);

	register_taxonomy(
		'video-type',
		array( 'video-type','post','page','tedxvideo' ),
		array(
			'public' => true,
			'hierarchical' => false,
			'labels' => array(
				'name' => __( 'Video Types', 'tedxpv_custom' ),
				'singular_name' => __( 'Video Type', 'tedxpv_custom' ),
				'search_items' => __( 'Search Video Types', 'tedxpv_custom' ),
				'popular_items' => __( 'Popular Video Types', 'tedxpv_custom' ),
				'all_items' => __( 'All Video Types', 'tedxpv_custom' ),
				'edit_item' => __( 'Edit Video Type', 'tedxpv_custom' ),
				'update_item' => __( 'Update Video Type', 'tedxpv_custom' ),
				'add_new_item' => __( 'Add New Video Type', 'tedxpv_custom' ),
				'new_item_name' => __( 'New Video Type', 'tedxpv_custom' ),
			),
			'rewrite' => array('with_front' => false ),
		)
	);

	// register_taxonomy(
	// 	'event-venue',
	// 	array( 'tedx_event' ),
	// 	array(
	// 		'public' => true,
	// 		'hierarchical' => false,
	// 		'labels' => array(
	// 			'name' => __( 'Venues', 'tedxpv_custom' ),
	// 			'singular_name' => __( 'Venue', 'tedxpv_custom' ),
	// 			'search_items' => __( 'Search Venues', 'tedxpv_custom' ),
	// 			'popular_items' => __( 'Popular Venues', 'tedxpv_custom' ),
	// 			'all_items' => __( 'All Venues', 'tedxpv_custom' ),
	// 			'edit_item' => __( 'Edit Venue', 'tedxpv_custom' ),
	// 			'update_item' => __( 'Update Venue', 'tedxpv_custom' ),
	// 			'add_new_item' => __( 'Add New Venue', 'tedxpv_custom' ),
	// 			'new_item_name' => __( 'New Venue', 'tedxpv_custom' ),
	// 		),
	// 		'rewrite' => array('with_front' => false ),
	// 	)
	// );

}