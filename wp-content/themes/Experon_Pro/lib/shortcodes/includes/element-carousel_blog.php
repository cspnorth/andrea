<?php
$heading       = NULL;
$items         = NULL;
$title         = NULL;
$date          = NULL;
$comments      = NULL;
$show          = NULL;
$scroll        = NULL;
$speed         = NULL;
$effect        = NULL;
$category      = NULL;
$link_icon     = NULL;
$lightbox_icon = NULL;

$link_input     = NULL;
$lightbox_input = NULL;
$overlay_class  = NULL;

$heading       = $atts['heading'];
$items         = $atts['items'];
$title         = $atts['title'];
$date          = $atts['date'];
$comments      = $atts['comments'];
$show          = $atts['items'];
$scroll        = $atts['scroll'];
$speed         = $atts['speed'];
$effect        = $atts['effect'];
$category      = $atts['category'];
$link_icon     = $atts['link_icon'];
$lightbox_icon = $atts['lightbox_icon'];

if ( $items == '1' ) {
	$items  = 'column1-2/3';
} else if ( $items == '2' ) {
	$items  = 'column2-2/3';
} else if ( $items == '3' ) {
	$items  = 'column3-2/3';
} else if ( $items >= '4' ) {
	$items  = 'column4-2/3';
} else {
	$items  = 'column2-1/2';
}

$args = array(
	'post_type'   => 'post',
	'numberposts' => 10,
	'post_status' => 'publish',
	'category'    => $category,
	);
$recent_posts = wp_get_recent_posts( $args );

echo '<div class="sc-carousel carousel-blog" data-show="' . $show . '" data-scroll="' . $scroll . '" data-speed="' . $speed . '" data-effect="' . $effect . '">';

if ( !empty( $heading ) ) {
	echo '<div class="sc-carousel-title"><h3>' . $heading . '</h3></div>';
}

echo '<ul id="' . $instanceID . '">';
	 foreach( $recent_posts as $recent ){
	 $post_id = get_post_thumbnail_id( $recent["ID"] );
	 $post_img = wp_get_attachment_image_src($post_id, $items, true);
	 $post_img_full = wp_get_attachment_image_src($post_id, 'full', true);

	 // Do not show post if default WordPress image is being used (e.g. no feautured image set)
	 if ( strpos( $post_img[0], 'wp-includes/images/media/default.png' ) !== false ) {
		$post_id = NULL;
	 }
	 
	// Set link icon variable if user wants it to show
	if ( $link_icon !== 'off' ) {
		$link_input = '<a class="hover-link" href="'. get_permalink( $recent["ID"] ) . '"></a>';
	}

	// Set lightbox icon variable if user wants it to show
	if ( $lightbox_icon !== 'off' ) {
		$lightbox_input = '<a class="hover-zoom prettyPhoto" href="'. $post_img_full[0] . '"></a>';
	}

	// Determine which if single link animation should be shown
	if ( $link_icon == 'off' or $lightbox_icon == 'off' ) {
		$overlay_class = ' style2';
	}

	if ( $link_icon !== 'off' or $lightbox_icon !== 'off' ) {
		$overlay_input  = NULL;
		$overlay_input .= '<div class="image-overlay' . $overlay_class . '">';
		$overlay_input .= '<div class="image-overlay-inner">';
		$overlay_input .= '<div class="hover-icons">';
		$overlay_input .= $lightbox_input;
		$overlay_input .= $link_input;
		$overlay_input .= '</div>';
		$overlay_input .= '</div>';
		$overlay_input .= '</div>';
	}

	if ( ! empty( $post_id ) ) {
		echo '<li>',
			 '<div class="entry-header">',
			 '<a href="' . get_permalink( $recent["ID"] ) . '" ><img src="' . $post_img[0] . '" /></a>',
			 $overlay_input,
			 '</div>';

		if ( $title == 'on' or $date == 'on' or $comments == 'on' ) {

			echo '<div class="entry-content">';

			// Input post title
			if ( $title == 'on' ) {
				echo '<h4><a href="' . get_permalink( $recent["ID"] ) . '" >' . $recent["post_title"] . '</a></h4>';
			}

			// Input post date
			if ( $date == 'on' ) {
				echo '<div class="date">';

				printf( __( '<span class="date"><a href="%1$s" title="%2$s"><time datetime="%3$s">%4$s</time></a></span>', 'experon' ),
					esc_url( get_permalink() ),
					esc_attr( get_the_title() ),
					esc_attr( get_the_date( 'c', $recent["ID"] ) ),
					esc_html( get_the_date( 'M j, Y', $recent["ID"] ) )
				);
	

				echo '</div>';
			}

			// Input post comments
			if ( $comments == 'on' ) {
				 $comment_count = (int) get_comments_number( $recent["ID"] );
				 echo	'<div class="comment">',
						'<a href="' . get_comments_link( $recent["ID"] ) . '">' . $comment_count .' comments</a>',
						'</div>';
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