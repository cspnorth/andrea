<?php
/**
 * Template Name: Page (With Comments)
 *
 * @package ThinkUpThemes
 */

get_header(); ?>

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>

				<?php /* Add comments - Style 1 */  thinkup_input_allowcomments1(); ?>

			<?php endwhile; wp_reset_query(); ?>

<?php get_footer(); ?>