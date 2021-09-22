<?php
/*
Plugin Name: USAFL Plugin
Plugin URI: http://www.jordanraddick.com
Description: Plugin to set up a list of players for a USAFL team
Version: 1.4
Author: Jordan Raddick
Author URI:http://www.jordanraddick.com
Textdomain: usafl
License: GPLv2
*/

function usafl_register_post_type() {
	$labels = array(
		 'name' => __( 'Players', 'usafl' ),
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
		'show_in_rest' => true,
		'menu_icon' => 'dashicons-beer'
	);

	register_post_type( 'usafl_player', $args );
}
add_action( 'init', 'usafl_register_post_type' );



function add_usafl_player_fields_meta_box() {
    	add_meta_box(
    		'usafl_player_information_meta_box', // $id
    		'Player Information', // $title
    		'show_usafl_player_fields_meta_box', // $callback
    		'usafl_player', // $screen (was your_post)
    		'normal', // $context
    		'high' // $priority
    	);
    }
add_action( 'add_meta_boxes', 'add_usafl_player_fields_meta_box' );

function show_usafl_player_fields_meta_box() {
    	global $post;
    		$meta = get_post_meta( $post->ID, 'player_information', true ); ?>

    	<input type="hidden" name="your_meta_box_nonce" value="<?php echo wp_create_nonce( basename(__FILE__) ); ?>">

        <!-- All fields will go here -->
        <div class='player_information_form_field'>
	    	<div class='player_information_form_field_label'>
	    		<label for="player_information[name_first]">First Name</label>
	    	</div>
	    	<div class="player_information_form_field_control">
	    		<input type="text" name="player_information[name_first]" id="player_information[name_first]" class="regular-text" value="<?php echo $meta['name_first']; ?>">
	    	</div>
		</div>
        <div class='player_information_form_field'>
	    	<div class='player_information_form_field_label'>
	    		<label for="player_information[name_nickname]">Nickname</label>
	    	</div>
	    	<div class="player_information_form_field_control">
	    		<input type="text" name="player_information[name_nickname]" id="player_information[name_nickname]" class="regular-text" value="<?php echo $meta['name_nickname']; ?>">
	    	</div>
		</div>
        <div class='player_information_form_field'>
	    	<div class='player_information_form_field_label'>
	    		<label for="player_information[name_first]">Last Name</label>
	    	</div>
	    	<div class="player_information_form_field_control">
	    		<input type="text" name="player_information[name_last]" id="player_information[name_last]" class="regular-text" value="<?php echo $meta['name_last']; ?>">
	    	</div>
		</div>
        <div class='player_information_form_field'>
	    	<div class='player_information_form_field_label'>
	    		<label for="player_information[number]">Number</label>
	    	</div>
	    	<div class="player_information_form_field_control">
	    		<input type="text" name="player_information[number]" id="player_information[number]" class="regular-text" value="<?php echo htmlspecialchars($meta['number']); ?>">
	    	</div>
		</div>
        <div class='player_information_form_field'>
	    	<div class='player_information_form_field_label'>
	    		<label for="player_information[birthdate]">Birthdate</label>
	    	</div>
	    	<div class="player_information_form_field_control">
	    		<input type="date" name="player_information[birthdate]" id="player_information[birthdate]" class="regular-text" value="<?php echo htmlspecialchars($meta['birthdate']); ?>">
	    	</div>
		</div>
        <div class='player_information_form_field'>
	    	<div class='player_information_form_field_label'>
	    		<label for="player_information[height]">Height</label>
	    	</div>
	    	<div class="player_information_form_field_control">
	    		<input type="text" name="player_information[height]" id="player_information[height]" class="regular-text" value="<?php echo htmlspecialchars($meta['height']); ?>">
	    	</div>
		</div>
        <div class='player_information_form_field'>
	    	<div class='player_information_form_field_label'>
	    		<label for="player_information[nationality]">Nationality</label>
	    	</div>
	    	<div class="player_information_form_field_control">
	    		<input type="text" name="player_information[nationality]" id="player_information[nationality]" class="regular-text" value="<?php echo htmlspecialchars($meta['nationality']); ?>">
	    	</div>
		</div>
        <div class='player_information_form_field'>
	    	<div class='player_information_form_field_label'>
	    		<label for="player_information[position]">Position</label>
	    	</div>
	    	<div class="player_information_form_field_control">
	    		<input type="text" name="player_information[position]" id="player_information[position]" class="regular-text" value="<?php echo htmlspecialchars($meta['position']); ?>">
	    	</div>
		</div>
        <div class='player_information_form_field'>
	    	<div class='player_information_form_field_label'>
	    		<label for="player_information[seasons]">Seasons</label>
	    	</div>
	    	<div class="player_information_form_field_control">
	    		<input type="text" name="player_information[seasons]" id="player_information[seasons]" class="regular-text" value="<?php echo htmlspecialchars($meta['seasons']); ?>">
	    	</div>
		</div>
	<?php }

function save_usafl_player_fields_meta( $post_id ) {
    	// verify nonce
    	if ( !wp_verify_nonce( $_POST['your_meta_box_nonce'], basename(__FILE__) ) ) {
    		return $post_id;
    	}
    	// check autosave
    	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
    		return $post_id;
    	}
    	// check permissions
    	if ( 'page' === $_POST['post_type'] ) {
    		if ( !current_user_can( 'edit_page', $post_id ) ) {
    			return $post_id;
    		} elseif ( !current_user_can( 'edit_post', $post_id ) ) {
    			return $post_id;
    		}
    	}

    	$old = get_post_meta( $post_id, 'player_information', true );
    	$new = $_POST['player_information'];

    	if ( $new && $new !== $old ) {
    		update_post_meta( $post_id, 'player_information', $new );
    	} elseif ( '' === $new && $old ) {
    		delete_post_meta( $post_id, 'player_information', $old );
    	}
    }
    add_action( 'save_post', 'save_usafl_player_fields_meta' );

?>
