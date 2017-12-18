<?php
$heading       = NULL;
$items         = NULL;
$scroll        = NULL;
$speed         = NULL;
$effect        = NULL;
$show_link     = NULL;
$link_style    = NULL;
$show_name     = NULL;
$show_position = NULL;
$show_excerpt  = NULL;
$show_social   = NULL;
$tag           = NULL;

$heading       = $atts['heading'];
$items         = $atts['items'];
$scroll        = $atts['scroll'];
$speed         = $atts['speed'];
$effect        = $atts['effect'];
$show_link     = $atts['show_link'];
$link_style    = $atts['link_style'];
$show_name     = $atts['show_name'];
$show_position = $atts['show_position'];
$show_excerpt  = $atts['show_excerpt'];
$show_social   = $atts['show_social'];
$tag           = $atts['tag'];

$args = array(
	'post_type'   => 'team',
	'numberposts' => 10,
	'post_status' => 'publish',
);
$recent_posts = wp_get_recent_posts( $args );

// Determine which overlay style should be used
if ( $link_style == 'style2' ) {
	$link_style = ' overlay2';
} else {
	$link_style = NULL;
}

echo '<div class="sc-carousel carousel-team" data-show="' . $items . '" data-scroll="' . $scroll . '" data-speed="' . $speed . '" data-effect="' . $effect . '">';

if ( !empty( $heading ) ) {
	echo '<div class="sc-carousel-title"><h3>' . $heading . '</h3></div>';
}

echo '<ul id="' . $instanceID . '">';
	foreach( $recent_posts as $recent ){
	$post_id = get_post_thumbnail_id( $recent["ID"] );
	$post_img = wp_get_attachment_image_src($post_id, 'column2-2/3', true);

	// Do not show post if default WordPress image is being used (e.g. no feautured image set)
	if ( strpos( $post_img[0], 'wp-includes/images/media/default.png' ) !== false ) {
		$post_id = NULL;
	}

	// Do not show if tag ID is set and post does not have specified tag
	if( !empty( $tag ) ) {
		$teamtags = wp_get_post_terms( $recent["ID"], 'team_tag', array('fields' => 'ids') );

		$indicator_tag = NULL;

		foreach( $teamtags as $teamtag ) {
			if ( $tag == $teamtag ) {
				$indicator_tag = 1;
			}
		}

		if ( $indicator_tag == NULL ) {
			$post_id = NULL;
		}
	}

	$_thinkup_meta_teamposition  = get_post_meta( $recent["ID"], '_thinkup_meta_teamposition', true );

	if ( ! empty( $post_id ) ) {
		echo '<li>';
		echo '<div class="entry-header">',
			 '<a href="'. get_permalink( $recent["ID"] ) . '"><img src="' . $post_img[0] . '" /></a>';

		// Output overlay link to team page if set
		if ( $show_link !== 'off' ) {
			echo '<div class="image-overlay style2' . $link_style . '">',
				 '<div class="image-overlay-inner">',
				 '<div class="hover-icons">',
				 '<a href="'. get_permalink( $recent["ID"] ) . '" class="hover-link themebutton">',
			     __( 'View Profile', 'experon' ),
			     '</a>',
				 '</div>',
		 		 '</div>',
				 '</div>';
		}

		echo '</div>';


		if ( $show_name == 'on' or $show_position == 'on' or $show_excerpt == 'on' or $show_social == 'on' ) {

			echo '<div class="entry-content">';
	
			// Output team member name if set
			if( $show_name == 'on' ) {
				echo '<h4><a href="'. get_permalink( $recent["ID"] ) . '">' . get_the_title( $recent["ID"] ) . '</a></h4>';
			}
			
			// Output team member position if set
			if( $show_position == 'on' and ! empty( $_thinkup_meta_teamposition ) ) {
				echo '<h5>' . $_thinkup_meta_teamposition . '</h5>';
			}
	
			// Output excerpt if set
			if ( thinkup_input_excerptbyid( $recent["ID"] ) !== '' and $show_excerpt == 'on' ) {
				echo thinkup_input_excerptbyid( $recent["ID"] );
			}
	
	
			// Output excerpt if set
			if( $show_social == 'on' ) {
				$_thinkup_meta_teamfacebook  = get_post_meta( $recent["ID"], '_thinkup_meta_teamfacebook', true );
				$_thinkup_meta_teamtwitter   = get_post_meta( $recent["ID"], '_thinkup_meta_teamtwitter', true );
				$_thinkup_meta_teamgoogle    = get_post_meta( $recent["ID"], '_thinkup_meta_teamgoogle', true );
				$_thinkup_meta_teamlinkedin  = get_post_meta( $recent["ID"], '_thinkup_meta_teamlinkedin', true );
				$_thinkup_meta_teaminstagram = get_post_meta( $recent["ID"], '_thinkup_meta_teaminstagram', true );
				$_thinkup_meta_teamdribbble  = get_post_meta( $recent["ID"], '_thinkup_meta_teamdribbble', true );
				$_thinkup_meta_teamflickr    = get_post_meta( $recent["ID"], '_thinkup_meta_teamflickr', true );
	
				// Reset count values used in foreach loop
				$i = 0;
				$j = 0;
	
				// Assign social media link to an array
				$social_links = array( 
					array( 'social' => 'Facebook',    'link' => $_thinkup_meta_teamfacebook ),
					array( 'social' => 'Twitter',     'link' => $_thinkup_meta_teamtwitter ),
					array( 'social' => 'Google-plus', 'link' => $_thinkup_meta_teamgoogle ),
					array( 'social' => 'LinkedIn',    'link' => $_thinkup_meta_teamlinkedin ),
					array( 'social' => 'Instagram',   'link' => $_thinkup_meta_teaminstagram ),
					array( 'social' => 'Dribbble',    'link' => $_thinkup_meta_teamdribbble ),
					array( 'social' => 'Flickr',      'link' => $_thinkup_meta_teamflickr ),
				);
	
				// Output social media links if any link is set
				foreach( $social_links as $social ) {	
					if ( ! empty( $social['link'] ) and $j == 0 ) { echo '<div class="team-social"><ul>'; $j = 1; }
	
					if ( ! empty( $social['link'] ) ) {
					echo '<li class="social ' . strtolower( $social['social'] ) .'">',
						 '<a href="' . $social['link'] . '">',
						 '<i class="fa fa-' . strtolower( $social['social'] ) . '"></i>',
						 '</a>',
						 '</li>';
					}
				}
	
				// Close list output of social media links if any link is set
				if ( $j == 1 ) { echo '</ul></div>'; }
			}
	
			echo '</div>';

		}

		echo '</li>';
	}
}

echo '</ul>',
	 '<div class="caroufredsel_nav">',
	 '<a class="prev" id="' . $instanceID . '_prev" href="#"><i class="fa fa-caret-left"></i></a>',
	 '<a class="next" id="' . $instanceID . '_next" href="#"><i class="fa fa-caret-right"></i></a>',
//	 '<div class="pagination" id="' . $instanceID . '_pag"></div>',
	 '</div>',
	 '<div class="clearboth"></div>',
	 '</div>';

?>