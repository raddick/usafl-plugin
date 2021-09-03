<?php
	/*
	Plugin Name: USAFL Plugin
	Plugin URI: http://www.jordanraddick.com
	Description: Plugin to register the book post type
	Version: 0.1
	Author: Jordan Raddick
	Author URI:http://www.jordanraddick.com
	Textdomain: usafl
	License: GPLv2
	*/

	function usafl_register_post_type() {
		$labels = array(
			 'name' => __( 'Player', 'usafl' ),
			 'singular_name' => __( 'Player', 'usafl' ),
			 'add_new' => __( 'New Player', 'usafl' ),
			 'add_new_item' => __( 'Add New Player', 'usafl' ),
			 'edit_item' => __( 'Edit Player', 'usafl' ),
			 'new_item' => __( 'New Player', 'usafl' ),
			 'view_item' => __( 'View Player', 'usafl' ),
			 'search_items' => __( 'Search Player', 'usafl' ),
			 'not_found' =>  __( 'No Players Found', 'usafl' ),
			 'not_found_in_trash' => __( 'No Players found in Trash', 'usafl' ),
			);

		$args = array(
			'labels' => $labels,
			'has_archive' => true,
			'public' => true,
			'hierarchical' => false,
			'supports' => array(
					'title',
					'editor',
					'excerpt',
					'custom-fields',
					'thumbnail',
					'page-attributes'
				),
			'taxonomies' => 'category',
			'rewrite'   => array( 'slug' => 'player' ),
			'show_in_rest' => true
		);

		register_post_type( 'usafl_player', $args );
	}
	add_action( 'init', 'usafl_register_post_type' );



?>