<?php

  function custome_theme_init (){

  	add_theme_support('post-thumbnails');

		add_theme_support('menus');

		$labels = array(
		    'name' => __('Portfolio','W4Project'),
		    'singular_name' => __('portfolio','W4Project'),
		    'add_new' => __('Add New','W4Project'),
		    'add_new_item' => __('Add New Portfolio','W4Project'),
		    'edit_item' => __('Edit Portfolio','W4Project'),
		    'new_item' => __('New Portfolio','W4Project'),
		    'view_item' => __('View Portfolio','W4Project'),
		    'search_items' => __('Search Portfolio','W4Project'),
		    'not_found' =>  __('No Portfolio found','W4Project'),
		    'not_found_in_trash' => __('No Portfolio found in Trash','W4Project'),
		    'parent_item_colon' => '',
		    'menu_name' => __('Portfolio','W4Project')
		);

		$args = array(
		    'labels' => $labels,
		    'public' => true,
		    'publicly_queryable' => true,
		    'show_ui' => true,
		    'show_in_menu' => true,
		    'query_var' => true,
		    'rewrite' => true,
		    'capability_type' => 'post',
		    'has_archive' => true,
		    'hierarchical' => false,
		    'menu_position' => 20,
		    'menu_icon' => get_bloginfo('template_url') . '/_include/img/filter-icon.png', // 16x16
		    'supports' => array('title','editor','thumbnail','excerpt','category','custom-fields')
		);

		register_post_type ('Portfolio',$args);

		//register_taxonomy_for_object_type('category', 'portfolio');

		register_taxonomy (
			'types',
			'portfolio',
			array(
				'labels' => array(
					'name' => __('Types'),
					'singular_name' => __('Types'),
					'menu_name' => __('Type'),
					'all_items' => __('All Types'),
					'edit_item' => __('Edit Type'),
					'view_item' => __('View Type'),
					'update_item' => __('Update Type'),
					'add_new_item' => __('Add New Type','W4Project'),
					'new_item_name' => __('New Type Name'),
					'parent_item' => __('Parent Type'),
					'search_items' => __('Search Types'),
					'popular_items' => __('Popular Types'),
					'parent_item_colon' => __('Popular Types :'),
					'separate_items_with_commas' => __('Separate Types with commas'),
					'add_or_remove_items' => __('Add or remove Type'),
					'choose_from_most_used' => __('Choose from the most used Types'),
					'not_found' => __( 'No Type found.' )
				),
				'public' => true,
				'show_ui' => true,
				'show_in_nav_menus' => true,
				'show_tagcloud' => true,
				'hierarchical' => true,
				'query_var' => 'type',
				'rewrite' => array( 'slug' => 'type' )
			)
		);

	}

	add_action('init', 'custome_theme_init');
	
	add_action('after_setup_theme', 'my_theme_setup');

	function my_theme_setup(){
	    load_theme_textdomain('W4Project', get_template_directory() . '/languages');
	}


	add_action('add_meta_boxes', 'add_custom_box');
	function add_custom_box() {
	  add_meta_box('priceid', 'Price', 'price_box', 'portfolio','side');
	  
	  // add_meta_box($id, $title, $callback, $post_type, $context);
	  // ali.md/wpref/add_meta_box
	}

	function price_box() {
	  $price = 0;
	  $sellprice = 0;
	  if ( isset($_REQUEST['post']) ) {
	    $postID = (int)$_REQUEST['post'];
	    $price = get_post_meta($postID,'product_price',true);
	    // ali.md/wpref/get_post_meta
	    $price = (float) $price;
	    $postID = (int)$_REQUEST['post'];
	    $sellprice = get_post_meta($postID,'sellproduct_price',true);
	    // ali.md/wpref/get_post_meta
	    $sellprice = (float) $sellprice;
	  }

	  

	  echo "<label for='product_price'>Product Price</label>";
	  echo "<input id='product_price' class='widefat' name='product_price' size='20' type='text' value='$price'>";

	  echo "<label for='sellproduct_price'>Sell Product Price</label>";
	  echo "<input id='sellproduct_price' class='widefat' name='sellproduct_price' size='20' type='text' value='$sellprice'>";
	}

	add_action('save_post','save_meta');
	function save_meta($postID) {
	  if ( is_admin() ) {
	    if ( isset($_POST['product_price']) ) {
	      $price = (float) $_POST['product_price'];
	      update_post_meta($postID,'product_price', $price);
	      // ali.md/wpref/update_post_meta
	    }
	    if ( isset($_POST['sellproduct_price']) ) {
	      $sellprice = (float) $_POST['sellproduct_price'];
	      update_post_meta($postID,'sellproduct_price', $sellprice);
	      // ali.md/wpref/update_post_meta
	    }
	  }
	}

	// =======================================================================

