<?php

/*
 * Register post types
 */
add_action( 'init', 'tedx_register_post_types' );
function tedx_register_post_types() {

	//FAQ CTP
	register_post_type( 'ngg_pictures',
		array(
			'labels' => array(
				'name' => __( 'NGG', 'tedxpv_custom' ),
				'singular_name' => __( 'NGG', 'tedxpv_custom' ),
				'add_new_item' => __( 'Add New NGG', 'tedxpv_custom' ),
				'edit_item' => __( 'Edit NGG', 'tedxpv_custom' ),
				'new_item' => __( 'New NGG', 'tedxpv_custom' ),
				'view' => __( 'View NGG', 'tedxpv_custom' ),
				'view_item' => __( 'View NGG', 'tedxpv_custom' ),
				'search_items' => __( 'Search NGG', 'tedxpv_custom' ),
				'not_found' => __( 'No NGG found', 'tedxpv_custom' ),
				'not_found_in_trash' => __( 'No NGG found in Trash', 'tedxpv_custom' )
			),
			'public' => true,
			'menu_position' => 24,
			'menu_icon' => 'dashicons-format-chat',
			'supports' => array( 'title', 'editor', 'revisions' ),
			'rewrite' => false,
			'has_archive' => false,
			'exclude_from_search'   => true,
			'publicly_queryable'    => false,

		)
	);



	//FAQ CTP
	register_post_type( 'faq',
		array(
			'labels' => array(
				'name' => __( 'FAQ', 'tedxpv_custom' ),
				'singular_name' => __( 'Question', 'tedxpv_custom' ),
				'add_new_item' => __( 'Add New Question', 'tedxpv_custom' ),
				'edit_item' => __( 'Edit Question', 'tedxpv_custom' ),
				'new_item' => __( 'New Question', 'tedxpv_custom' ),
				'view' => __( 'View Question', 'tedxpv_custom' ),
				'view_item' => __( 'View Question', 'tedxpv_custom' ),
				'search_items' => __( 'Search FAQ', 'tedxpv_custom' ),
				'not_found' => __( 'No FAQ found', 'tedxpv_custom' ),
				'not_found_in_trash' => __( 'No FAQ found in Trash', 'tedxpv_custom' )
			),
			'public' => true,
			'menu_position' => 24,
			'menu_icon' => 'dashicons-format-chat',
			'supports' => array( 'title', 'editor', 'revisions' ),
			'rewrite' => false,
			'has_archive' => false,
			'exclude_from_search'   => true,
			'publicly_queryable'    => false,

		)
	);


	//Speaker CTP
	register_post_type( 'speaker',
		array(
			'labels' => array(
				'name' => __( 'Speakers', 'tedxpv_custom' ),
				'singular_name' => __( 'Speaker', 'tedxpv_custom' ),
				'add_new_item' => __( 'Add New Speaker', 'tedxpv_custom' ),
				'edit_item' => __( 'Edit Speaker', 'tedxpv_custom' ),
				'new_item' => __( 'New Speaker', 'tedxpv_custom' ),
				'view' => __( 'View Speaker', 'tedxpv_custom' ),
				'view_item' => __( 'View Speaker', 'tedxpv_custom' ),
				'search_items' => __( 'Search Speakers', 'tedxpv_custom' ),
				'not_found' => __( 'No Speakers found', 'tedxpv_custom' ),
				'not_found_in_trash' => __( 'No Speakers found in Trash', 'tedxpv_custom' )
			),
			'public' => true,
			'menu_position' => 20,
			'menu_icon' => 'dashicons-admin-users',
			'supports' => array( 'title', 'editor', 'revisions', 'excerpt', 'thumbnail','custom-fields' ),
			'rewrite' => array( 'slug' => 'expositores' ),
			'has_archive' => true,

		)
	);

	//Talks CTP
	register_post_type( 'tedxvideo',
		array(
			'labels' => array(
				'name' => __( 'Talks', 'tedxpv_custom' ),
				'singular_name' => __( 'Talk', 'tedxpv_custom' ),
				'add_new_item' => __( 'Add New Talk', 'tedxpv_custom' ),
				'edit_item' => __( 'Edit Talk', 'tedxpv_custom' ),
				'new_item' => __( 'New Talk', 'tedxpv_custom' ),
				'view' => __( 'View Talk', 'tedxpv_custom' ),
				'view_item' => __( 'View Talk', 'tedxpv_custom' ),
				'search_items' => __( 'Search Talks', 'tedxpv_custom' ),
				'not_found' => __( 'No Talks found', 'tedxpv_custom' ),
				'not_found_in_trash' => __( 'No Talks found in Trash', 'tedxpv_custom' )
			),
			'public' => true,
			'menu_position' => 21,
			'menu_icon' => 'dashicons-format-video',
			'supports' => array( 'title', 'revisions', 'thumbnail','custom-fields' ), //removed 'editor', 'excerpt'
			'taxonomies' => array( 'evento', 'video-type'), // Agregar 'post_tag' a taxonomies para tags
    		'has_archive' => true,
    		'hierarchical' => false,
    		'rewrite' => array( 'slug' => 'charlas' ),

		)
	);


	//Program CPT
	register_post_type( 'program',
		array(
			'labels' => array(
				'name' => __( 'Programs', 'tedxpv_custom' ),
				'singular_name' => __( 'Program', 'tedxpv_custom' ),
				'add_new_item' => __( 'Add New Program', 'tedxpv_custom' ),
				'edit_item' => __( 'Edit Program', 'tedxpv_custom' ),
				'new_item' => __( 'New Program', 'tedxpv_custom' ),
				'view' => __( 'View Program', 'tedxpv_custom' ),
				'view_item' => __( 'View Program', 'tedxpv_custom' ),
				'search_items' => __( 'Search Programs', 'tedxpv_custom' ),
				'not_found' => __( 'No Programs found', 'tedxpv_custom' ),
				'not_found_in_trash' => __( 'No Programs found in Trash', 'tedxpv_custom' )
			),
			'public' => true,
			'menu_position' => 22,
			'menu_icon' => 'dashicons-clock',
			'supports' => array( 'title', 'revisions', 'custom-fields' ),
			'rewrite' => array( 'slug' => 'programs' ),
			'has_archive' => true,

		)
	);


	//Evaluation CTP
	register_post_type( 'evaluation',
		array(
			'labels' => array(
				'name' => __( 'Evaluations', 'tedxpv_custom' ),
				'singular_name' => __( 'Evaluation', 'tedxpv_custom' ),
				'add_new_item' => __( 'Add New Evaluation', 'tedxpv_custom' ),
				'edit_item' => __( 'Edit Evaluation', 'tedxpv_custom' ),
				'new_item' => __( 'New Evaluation', 'tedxpv_custom' ),
				'view' => __( 'View Evaluation', 'tedxpv_custom' ),
				'view_item' => __( 'View Evaluation', 'tedxpv_custom' ),
				'search_items' => __( 'Search Evaluations', 'tedxpv_custom' ),
				'not_found' => __( 'No Evaluations found', 'tedxpv_custom' ),
				'not_found_in_trash' => __( 'No Evaluations found in Trash', 'tedxpv_custom' )
			),
			'public' => true,
			'menu_position' => 23,
			'menu_icon' => 'dashicons-chart-bar',
			'supports' => array( 'title', 'revisions', 'editor', 'custom-fields' ), //removed 'editor', 'excerpt'
			'taxonomies' => array( 'evento'), // Agregar 'post_tag' a taxonomies para tags
    		'has_archive' => true,
    		'hierarchical' => false,
    		'rewrite' => array( 'slug' => 'evaluaciones' ),

		)
	);


	//Sponsor videos CTP
	register_post_type( 'sponsorvideo',
		array(
			'labels' => array(
				'name' => __( 'Videos de patrocinadores', 'tedxpv_custom' ),
				'singular_name' => __( 'Video de patrocinador', 'tedxpv_custom' ),
				'add_new_item' => __( 'Add New Video de patrocinador', 'tedxpv_custom' ),
				'edit_item' => __( 'Edit Video de patrocinador', 'tedxpv_custom' ),
				'new_item' => __( 'New Video de patrocinador', 'tedxpv_custom' ),
				'view' => __( 'View Video de patrocinador', 'tedxpv_custom' ),
				'view_item' => __( 'View Video de patrocinador', 'tedxpv_custom' ),
				'search_items' => __( 'Search Videos de patrocinadores', 'tedxpv_custom' ),
				'not_found' => __( 'No Videos de patrocinadores found', 'tedxpv_custom' ),
				'not_found_in_trash' => __( 'No Videos de patrocinadores found in Trash', 'tedxpv_custom' )
			),
			'public' => true,
			'menu_position' => 24,
			'menu_icon' => 'dashicons-format-video',
			'supports' => array( 'title', 'revisions', 'thumbnail','custom-fields' ), //removed 'editor', 'excerpt'
			'taxonomies' => array( 'evento', 'video-type'), // Agregar 'post_tag' a taxonomies para tags
    		'has_archive' => true,
    		'hierarchical' => false,
    		'rewrite' => array( 'slug' => 'ideas-patrocinadores' ),

		)
	);


	//Event CTP
	// register_post_type( 'tedx_event',
	// 	array(
	// 		'labels' => array(
	// 			'name' => __( 'Events', 'tedxpv_custom' ),
	// 			'singular_name' => __( 'Event', 'tedxpv_custom' ),
	// 			'add_new_item' => __( 'Add New Event', 'tedxpv_custom' ),
	// 			'edit_item' => __( 'Edit Event', 'tedxpv_custom' ),
	// 			'new_item' => __( 'New Event', 'tedxpv_custom' ),
	// 			'view' => __( 'View Event', 'tedxpv_custom' ),
	// 			'view_item' => __( 'View Event', 'tedxpv_custom' ),
	// 			'search_items' => __( 'Search Events', 'tedxpv_custom' ),
	// 			'not_found' => __( 'No Events found', 'tedxpv_custom' ),
	// 			'not_found_in_trash' => __( 'No Events found in Trash', 'tedxpv_custom' )
	// 		),
	// 		'public' => true,
	// 		'menu_position' => 25,
	// 		'menu_icon' => 'dashicons-tickets-alt',

	// 		'supports' => array( 'title', 'revisions', 'custom-fields' ), //removed 'editor', 'excerpt'
	// 		'taxonomies' => array( 'evento'), // Agregar 'post_tag' a taxonomies para tags
 //    		'has_archive' => false,
 //    		'hierarchical' => true,
 //    		'rewrite' => array( 'slug' => 'eventos' ),
	// 	)
	// );
}