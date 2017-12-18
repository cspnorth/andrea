<?php
/**
 * The main Portfolio page template file.
 *
 * @package ThinkUpThemes
 */

get_header(); ?>
  
			<?php
				if ( !empty( $thinkup_testimonial_category ) ) $thinkup_testimonial_category = explode(",",$thinkup_testimonial_category);
				$loop = new WP_Query( array('post_type' => 'testimonial', 'posts_per_page' => -1, 'paged' => $paged, 'category__in' => $thinkup_testimonial_category ) );
				$count = 0;
			?>

			<div id="container" class="portfolio-wrapper">
			<div id="container-inner">

				<?php if ( $loop ) : 
					while ( $loop->have_posts() ) : $loop->the_post(); ?>

					<?php if ( has_post_thumbnail() ) : ?>
		
						<div class="element column-3 testimonial-grid<?php echo thinkup_input_testimoniallayout(); ?>">
								<?php /* Input testimonial content */ echo thinkup_input_testimonialcontent(); ?>
						</div>

					<?php endif; ?>

					<?php endwhile; else: ?>

				<div class="portfolio-error"><?php _e( 'No clients have been found.', 'experon' ); ?></div>

				<?php endif; wp_reset_query(); ?>

			<div class="clearboth"></div>
			</div>
			</div>

<?php get_footer(); ?>