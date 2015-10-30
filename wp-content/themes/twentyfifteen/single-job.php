<?php
/*
Template Name: Single Job Listings Post Template
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

<div class="list-container">

        <h1>Single Job Listings Post Template</h1>

    <?php
    // Start the loop.
    while ( have_posts() ) : the_post();

        /*
         * Include the post format-specific template for the content. If you want to
         * use this in a child theme, then include a file called called content-___.php
         * (where ___ is the post format) and that will be used instead.
         */
        get_template_part( 'content', get_post_format() );


        // End the loop.
    endwhile;
    wp_reset_postdata();
    ?>


</div>

<?php get_footer(); ?>