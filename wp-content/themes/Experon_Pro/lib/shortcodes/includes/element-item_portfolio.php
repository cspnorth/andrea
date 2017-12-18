<?php
$id             = NULL;
$title          = NULL;
$details        = NULL;
$size           = NULL;
$link_icon      = NULL;
$lightbox_icon  = NULL;
$links_style    = NULL;
$content_style  = NULL;

$link_input           = NULL;
$lightbox_input       = NULL;
$overlay_class        = NULL;
$overlay_input        = NULL;
$portfolio_hoverclass = NULL;
$portfolio_styleclass = NULL;

$id            = $atts['id'];
$title         = $atts['title'];
$details       = $atts['details'];
$size          = $atts['size'];
$link_icon     = $atts['link_icon'];
$lightbox_icon = $atts['lightbox_icon'];
$links_style   = $atts['links_style'];
$content_style = $atts['content_style'];

if ( empty( $size ) ) $size = 'full';

$post_id = get_post_thumbnail_id( $id );
$post_img = wp_get_attachment_image_src($post_id, $size, true);
$post_img_full = wp_get_attachment_image_src($post_id, 'full', true);

$_thinkup_meta_featuredmedia     = get_post_meta( $id, '_thinkup_meta_featuredmedia', true );
$_thinkup_meta_featuredmediatype = get_post_meta( $id, '_thinkup_meta_featuredmediatype', true );
$_thinkup_meta_featuredmediamain = get_post_meta( $id, '_thinkup_meta_featuredmediamain', true );

global $wp_embed;

		// Input featured media as the main featured item if specified
		if ( ! empty( $_thinkup_meta_featuredmedia ) and $_thinkup_meta_featuredmediamain == 'option1' ) {

			// Remove http:// and https:// from video link
			if ( strpos( $_thinkup_meta_featuredmedia, 'https://' ) !== false ) {
				$thinkup_input_featured = 'https://' . str_replace( 'https://', '', $_thinkup_meta_featuredmedia );
			} else {
				$thinkup_input_featured = 'http://' . str_replace( 'http://', '', $_thinkup_meta_featuredmedia );
			}

			// Determing featured media to input
			if ( $_thinkup_meta_featuredmediatype == 'option1' ) {
				$thinkup_input_featured = $wp_embed->run_shortcode('[embed]' . $thinkup_input_featured . '[/embed]');
			} else {
				$thinkup_input_featured = '<iframe src="' . $thinkup_input_featured . '"></iframe>';
			}
		} else {
			$thinkup_input_featured = '<img src="' . $post_img[0] . '" />';
		}

		// Input featured media as the lightbox item if specified
		if ( ! empty( $_thinkup_meta_featuredmedia ) ) {
	
			// Remove http:// and https:// from media link
			if ( strpos( $_thinkup_meta_featuredmedia, 'https://' ) !== false ) {
				$thinkup_input_link = 'https://' . str_replace( 'https://', '', $_thinkup_meta_featuredmedia );
			} else {
				$thinkup_input_link = 'http://' . str_replace( 'http://', '', $_thinkup_meta_featuredmedia );
			}
	
			// Determine featured media to input
			if ( $_thinkup_meta_featuredmediatype == 'option2' ) {
			
				// Add source embed code if not present
				if (strpos( $thinkup_input_link, '&source=embed' ) !== false) {
				} else { 
					$thinkup_input_link = $thinkup_input_link . '&source=embed';
				}
	
				// Add iframe embed code if not present
				if (strpos( $thinkup_input_link, 'output=svembed?iframe=true' ) !== false) {
				} else if (strpos( $thinkup_input_link, 'output=svembed' ) !== false) {
					$thinkup_input_link = str_replace( 'output=svembed', 'output=svembed?iframe=true', $thinkup_input_link );
				} else {
					$thinkup_input_link = $thinkup_input_link . '&output=svembed?iframe=true';
				}
	
				$thinkup_input_link = $thinkup_input_link . '&width=75%&height=75%';
			} else {
				$thinkup_input_link = $thinkup_input_link;
			}
		} else {
			$thinkup_input_link = $post_img_full[0];
		}

		// Set link icon variable if user wants it to show
		if ( $link_icon !== 'off' ) {
			$link_input = '<a class="hover-link" href="'. get_permalink( $id ) . '"></a>';
		}

		// Set lightbox icon variable if user wants it to show
		if ( $lightbox_icon !== 'off' ) {
			$lightbox_input = '<a class="hover-zoom prettyPhoto" href="'. $thinkup_input_link . '"></a>';
		}

		// Determine which if single link animation should be shown
		if ( $link_icon == 'off' or $lightbox_icon == 'off' ) {
			$overlay_class = ' style2';
		}

		// Determine which portfolio link style is selected
		if ( $links_style == 'style2' ) {
			$portfolio_hoverclass = ' overlay2';
		}

		// Determine which portfolio content style is selected
		if ( $content_style !== 'style2' ) {
			$portfolio_styleclass = ' style1';
		} else {
			$portfolio_styleclass = ' style2';
		}

		if ( $link_icon !== 'off' or $lightbox_icon !== 'off' ) {
			$overlay_input .= '<div class="image-overlay' . $overlay_class . $portfolio_hoverclass . '">';
			$overlay_input .= '<div class="image-overlay-inner">';
			$overlay_input .= '<div class="hover-icons">';
			$overlay_input .= $lightbox_input;
			$overlay_input .= $link_input;
			$overlay_input .= '</div>';
			$overlay_input .= '</div>';
			$overlay_input .= '</div>';
		}

		echo '<div class="sc-carousel carousel-portfolio sc-postitem">';

		echo '<div class="entry-header">',
			 '<a href="' . get_permalink( $id ) . '" >' . $thinkup_input_featured . '</a>',
			 $overlay_input,
			 '</div>';

		if ( $title == 'on' or $details == 'on' or $content_style == 'style2' ) {

		echo '<div class="port-details' . $portfolio_styleclass . '">';

			if ( $title == 'on' ) {
				echo	'<h4 class="port-title"><a href="' . get_permalink( $id ) . '">' . get_the_title( $id ) . '</a></h4>'; 
			}
			if ( $details == 'on' and thinkup_input_excerptbyid( $id ) !== '' ) {
				echo thinkup_input_excerptbyid( $id );
			}

			// Determine which portfolio style is selected
			if ( $content_style == 'style2' ) {
				echo '<p class="more-link style2">',
					 '<a href="' . get_permalink( $id ) . '" class="themebutton">',
					 '<span class="more-text">' . __( 'DETAILS', 'experon' ) . '</span>',
					 '<span class="more-icon"><i class="fa fa-angle-right fa-lg"></i></span>',
					 '</a>',
					 '</p>';
			}
		echo '</div>';

		}

		echo '</div>';

?>