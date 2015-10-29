<?php
/*
Template Name: Job Listings Custom Post Type Template
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

        <h1>Custom Post Type Output Below</h1>

        <?php
        $args = array(
            'post_type'      => 'job',
            'orderby'        => 'title',
            'order'          => 'asc',
        );

  $lib_query = new WP_Query($args);
  if ($lib_query->have_posts()) {
      while ($lib_query->have_posts()) : $lib_query->the_post();

          $img_src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID));

          ?>
          <div class="single-job">

              <p><?php echo get_post_meta($post->ID, '_job_title', true); ?></p>

              <p><?php echo get_the_post_thumbnail(); ?></p>

              <p style="background: url(<?php echo $img_src[0]; ?>); height: 100px;"></p>

          </div>
      <?php endwhile;
      wp_reset_postdata();
  }
  ?>
</div>

<?php get_footer(); ?>