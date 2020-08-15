<?php
/**
 * Template Name: Home
 * Description: Home Page Template - see pages and partials
 */
// $start = TimberHelper::start_timer();
$context = Timber::context();

$timber_post = new Timber\Post();
$context['post'] = $timber_post;

	// post type team
		// $carouselArgs = array(
		//     // Get post type project
		//     'post_type' => 'post',
		//     // Get all posts
		//     'posts_per_page' => 12,
		// );

		// $context['postsCarousel'] = Timber::get_posts( $carouselArgs );
	// // end post type

	// // post type portfolio
	// 	$args2 = array(
	// 	    // Get post type project
	// 	    'post_type' => 'portfolio_items',
	// 	    // Get all posts
	// 	    'posts_per_page' => 30,
	// 	);

	// 	$context['portfolioPieces'] = Timber::get_posts( $args2 );
	// // end post type
	// $context['timber_categories'] = Timber::get_terms('category', array('exclude'=>'1'));

Timber::render('pages/front-page.twig', $context);

// echo TimberHelper::stop_timer( $start);
