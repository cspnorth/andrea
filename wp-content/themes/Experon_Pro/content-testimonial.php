<?php
/**
 * The Testimonial item content template file.
 *
 * @package ThinkUpThemes
 */
?>

		<article class="testimonial-content">

			<?php the_content(); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'experon' ), 'after' => '</div>' ) ); ?>

		</article>