<?php
/*
Template Name: Seattle Teams Page
*/

/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<p><?php the_field('name'); ?></p>

			<p><?php the_field('background_image'); ?></p>

		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); ?>
