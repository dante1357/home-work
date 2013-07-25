<?php

  function custome_theme_init (){

    add_theme_support('post-thumbnails');

    add_theme_support('menus');

    $labels = array(
      'name' => _x('نمونه کار ها', 'post type general name'),
      'singular_name' => _x('portfolio', 'post type singular name'),
      'add_new' => _x('اضافه مردن', 'portfolio'),
      'add_new_item' => __('اضافه مردن نمونه کار ها'),
      'edit_item' => __('Edit نمونه کار ها'),
      'new_item' => __('New نمونه کار ها'),
      'view_item' => __('View نمونه کار ها'),
      'search_items' => __('Search نمونه کار ها'),
      'not_found' =>  __('No نمونه کار ها found'),
      'not_found_in_trash' => __('No نمونه کار ها found in Trash'),
      'parent_item_colon' => '',
      'menu_name' => _x('نمونه کار ها', 'post type general name')
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
      'menu_icon' => get_bloginfo('template_url') . '/images/portfolio_icon.png', // 16x16
      'supports' => array('title','editor','thumbnail','excerpt','category')
    );

    register_post_type ('portfolio',$args);

    register_taxonomy(

      'type',
      'portfolio',
      array(
        'label' => _x( 'دسته',"نمونه کار ها taxonomy"),
        'rewrite' => array( 'slug' => 'type' )
      )
    );

  }

  add_action('init', 'custome_theme_init');