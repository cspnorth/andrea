<?php
/**
 * The Portfolio item page template file.
 *
 * @package ThinkUpThemes
 */

get_header(); ?>

			<?php while ( have_posts() ) : the_post(); ?>  

				<?php get_template_part( 'content', 'portfolio' ); ?>

				<div class="clearboth"></div>

				<?php thinkup_input_projectnavigation(); ?>

				<?php thinkup_input_projectrelated(); ?>

				<?php /* Add comments - Style 1 */  thinkup_input_allowcomments1(); ?>

			<?php endwhile; wp_reset_query(); ?>

<?php get_footer(); ?>