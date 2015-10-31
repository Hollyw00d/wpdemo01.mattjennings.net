<?php
/*
Template Name: Job Listings
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

			<?php
			$args = array(
				'post_type'      => 'job',
				'orderby'        => 'title',
				'order'          => 'asc',
				'posts_per_page' => 3
			);

			$lib_query = new WP_Query($args);
			if ($lib_query->have_posts()) {
				while ($lib_query->have_posts()) : $lib_query->the_post();

					$img_src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID));

					?>
					<div class="single-job">

						<p><strong><a href="<?php the_permalink(); ?>">_job_title:</strong> <?php echo get_post_meta($post->ID, '_job_title', true); ?></a></p>

						<p><strong>_job_salary:</strong> <?php echo get_post_meta($post->ID, '_job_salary', true); ?></p>

						<p><strong>Single Image:</strong><br /><?php echo get_the_post_thumbnail(); ?></p>

						<p><strong>Background Image:</strong></p>
						<p style="background: url(<?php echo $img_src[0]; ?>); height: 100px;"></p>

					</div>
				<?php endwhile;
				wp_reset_postdata();
			}
			?>

		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); ?>