<?php
	$slug = "books";

	$labels = array(
		'name'=>'Books',
		'singular-name'=>'Book',
	);

	$args = array(
		'labels' => $labels,
		'public'=>true,
		'publicly_queryable'=>true,
		'show_ui'=>true,
		'show_in_menu'=>true,
		'show_in_nav_menus'=>true,
		'menu_position'=>4,
		'query_var' => true,
		'exclude_from_search'=>false,
		'rewrite' => array( 'slug', 'member'),
		'cabability_type'=>'post',
		'has_archive'=>true,
		'hierarchical'=>true,
		'supports'=>array('title', 'editor', 'thumbnail'),
	);
	register_post_type($slug, $args);

	$slug = "svf";

	$labels = array(
		'name'=>'sevts',
		'singular-name'=>'vsdf',
	);

	$args = array(
		'labels' => $labels,
		'public'=>true,
		'publicly_queryable'=>true,
		'show_ui'=>true,
		'show_in_menu'=>true,
		'show_in_nav_menus'=>true,
		'menu_position'=>1,
		'query_var' => true,
		'exclude_from_search'=>false,
		'rewrite' => array( 'slug', 'member'),
		'cabability_type'=>'post',
		'has_archive'=>true,
		'hierarchical'=>true,
		'supports'=>array('title', 'editor', 'thumbnail'),
	);
	register_post_type($slug, $args);
