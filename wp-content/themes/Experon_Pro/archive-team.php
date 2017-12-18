<?php
/**
 * The main Team page template file.
 *
 * @package ThinkUpThemes
 */

get_header(); ?>
  
			<?php
				$teamtags  = strip_tags( get_the_tag_list( '', ',', '' ) );
				$tag_count = count( get_the_tags() );

				$args = array( 
					'post_type'      => 'team',
					'posts_per_page' => -1,
					'team_tag'        => $teamtags,
				);
				$loop  = new WP_Query( $args );
				$count = 0;

				// Determine which style and layout should be used
				$team_start    = NULL;
				$team_end      = NULL;
				$class_style   = NULL;
				$class_layout1 = NULL;
				$class_layout2 = NULL;

				// Determine which layout to output
				$_thinkup_meta_teamstyleswitch = get_post_meta( $post->ID, '_thinkup_meta_teamstyleswitch', true );

				if( empty ( $_thinkup_meta_teamstyleswitch ) or $_thinkup_meta_teamstyleswitch == 'option1' ) {
					if ( $thinkup_team_styleswitch == 'option1' ) {
						$class_style   = ' style2';
						$class_layout1 = ' two_fifth';
						$class_layout2 = ' three_fifth last';
					} else if ( $thinkup_team_styleswitch == 'option2' ) {
						$team_start    = '<div id="container">';
						$team_end      = '</div>';
					}
				} if( $_thinkup_meta_teamstyleswitch == 'option2' ) {
					$class_style   = ' style2';
					$class_layout1 = ' two_fifth';
					$class_layout2 = ' three_fifth last';
				} if( $_thinkup_meta_teamstyleswitch == 'option3' ) {
					$team_start    = '<div id="container">';
					$team_end      = '</div>';
				}
			?>

				<?php echo $team_start; ?>

				<?php if ( $loop ) : 
					while ( $loop->have_posts() ) : $loop->the_post(); ?>

					<?php if ( has_post_thumbnail() ) :	?>
		
						<div class="element team_grid<?php echo $class_style; ?><?php echo thinkup_input_teamlayout(); ?>">
							<div class="sc-postitem sc-carousel carousel-team team-thumb<?php echo $class_layout1; ?>">
							<div class="entry-header">
								<a href="<?php echo get_permalink(); ?>"><img src="<?php thinkup_input_teamimage(); ?>" /></a>
								<div class="image-overlay style2<?php thinkup_input_teamoverlay(); ?>"><div class="image-overlay-inner"><div class="wrap-team">
								<a class="hover-link themebutton" href="<?php echo get_permalink(); ?>"><?php _e( 'View Profile', 'experon' ); ?></a>
								</div></div></div>
							</div>
							</div>

							<div class="entry-content<?php echo $class_layout2; ?>">
								<?php /* Output team page content */ thinkup_input_teamcontent(); ?>
							</div><div class="clearboth"></div>

						</div>
					<?php endif; ?>

					<?php endwhile; ?>
					<?php echo $team_end; ?>
					<?php else: ?>

				<div class="team-error"><?php _e( 'No clients have been found.', 'experon' ); ?></div>

				<?php endif; wp_reset_query(); ?>

			<div class="clearboth"></div>

<?php get_footer(); ?>