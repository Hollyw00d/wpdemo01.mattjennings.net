<?php
/*
NO COMMENT TO MAKE THIS NOT A TEMPLATE
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
</div>

<?php get_footer(); ?>