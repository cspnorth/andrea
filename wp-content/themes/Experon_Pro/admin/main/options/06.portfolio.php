<?php
/**
 * Portfolio functions.
 *
 * @package ThinkUpThemes
 */

/* ----------------------------------------------------------------------------------
	PORTFOLIO LAYOUT
---------------------------------------------------------------------------------- */

function thinkup_input_portfoliolayout() {
global $thinkup_portfolio_layout;

global $post;
global $thinkup_portfolio_pageid;
$_thinkup_meta_portfoliolayout = get_post_meta( $thinkup_portfolio_pageid, '_thinkup_meta_portfoliolayout', true );

	if ( empty( $_thinkup_meta_portfoliolayout ) or $_thinkup_meta_portfoliolayout == 'option1' ) {
		if ( empty( $thinkup_portfolio_layout ) ) {
			echo 'column-2';
		} else if ( $thinkup_portfolio_layout == 'option1' or $thinkup_portfolio_layout == 'option5' or $thinkup_portfolio_layout == 'option6' ) {
			echo 'column-1';
		} else if ( $thinkup_portfolio_layout == 'option2' or $thinkup_portfolio_layout == 'option7' or $thinkup_portfolio_layout == 'option8' ) {
			echo 'column-2';
		} else if ( $thinkup_portfolio_layout == 'option3' ) {
			echo 'column-3';
		} else if ( $thinkup_portfolio_layout == 'option4' ) {
			echo 'column-4';
		}
	} else if ( $_thinkup_meta_portfoliolayout == 'option2' ) {
		echo 'column-1';
	} else if ( $_thinkup_meta_portfoliolayout == 'option3' ) {
		echo 'column-2';
	} else if ( $_thinkup_meta_portfoliolayout == 'option4' ) {
		echo 'column-3';
	} else if ( $_thinkup_meta_portfoliolayout == 'option5' ) {
		echo 'column-4';
	}
}

function thinkup_input_portfoliosize() {
global $thinkup_portfolio_layout;
global $thinkup_portfolio_redirect;

global $post;
global $wp_embed;
global $thinkup_portfolio_pageid;
$_thinkup_meta_portfoliolayout = get_post_meta( $thinkup_portfolio_pageid, '_thinkup_meta_portfoliolayout', true );

$_thinkup_meta_featuredmedia     = get_post_meta( $post->ID, '_thinkup_meta_featuredmedia', true );
$_thinkup_meta_featuredmediatype = get_post_meta( $post->ID, '_thinkup_meta_featuredmediatype', true );
$_thinkup_meta_featuredmediamain = get_post_meta( $post->ID, '_thinkup_meta_featuredmediamain', true );

	$output = NULL;

	if ( ! empty( $_thinkup_meta_featuredmedia ) and $_thinkup_meta_featuredmediamain == 'option1' ) {

		// Remove http:// and https:// from video link
		if ( strpos( $_thinkup_meta_featuredmedia, 'https://' ) !== false ) {
			$_thinkup_meta_featuredmedia = 'https://' . str_replace( 'https://', '', $_thinkup_meta_featuredmedia );
		} else {
			$_thinkup_meta_featuredmedia = 'http://' . str_replace( 'http://', '', $_thinkup_meta_featuredmedia );
		}

		// Determing featured media to input
		if ( $_thinkup_meta_featuredmediatype == 'option1' ) {
			$output = $wp_embed->run_shortcode('[embed]' . $_thinkup_meta_featuredmedia . '[/embed]');
		} else {
			$output = '<iframe src="' . $_thinkup_meta_featuredmedia . '"></iframe>';
		}
	} else {
		if ( empty( $_thinkup_meta_portfoliolayout ) or $_thinkup_meta_portfoliolayout == 'option1' ) {
			if ( empty( $thinkup_portfolio_layout ) ) {
				$output = get_the_post_thumbnail( $post->ID, 'column2-3/5' );
			} else if ( $thinkup_portfolio_layout == 'option1' or $thinkup_portfolio_layout == 'option5' or $thinkup_portfolio_layout == 'option6' ) {
				$output = get_the_post_thumbnail( $post->ID, 'column1-1/4' );
			} else if ( $thinkup_portfolio_layout == 'option2' or $thinkup_portfolio_layout == 'option7' or $thinkup_portfolio_layout == 'option8' ) {
				$output = get_the_post_thumbnail( $post->ID, 'column2-3/5' );
			} else if ( $thinkup_portfolio_layout == 'option3' ) {
				$output = get_the_post_thumbnail( $post->ID, 'column3-2/3' );
			} else if ( $thinkup_portfolio_layout == 'option4' ) {
				$output = get_the_post_thumbnail( $post->ID, 'column4-2/3' );
			}
		} else if ( $_thinkup_meta_portfoliolayout == 'option2' ) {
			$output = get_the_post_thumbnail( $post->ID, 'column1-1/4' );
		} else if ( $_thinkup_meta_portfoliolayout == 'option3' ) {
			$output = get_the_post_thumbnail( $post->ID, 'column2-3/5' );
		} else if ( $_thinkup_meta_portfoliolayout == 'option4' ) {
			$output = get_the_post_thumbnail( $post->ID, 'column3-2/3' );
		} else if ( $_thinkup_meta_portfoliolayout == 'option5' ) {
			$output = get_the_post_thumbnail( $post->ID, 'column4-2/3' );
		}
	}
	
	// Output media if set
	if ( ! empty( $output ) ) {
		if ( $thinkup_portfolio_redirect !== '1' ) {
			echo '<a href="' . get_permalink( $post->ID ) . '">' . $output . '</a>';
		} else {
			echo $output;
		}
	}
}


/* ----------------------------------------------------------------------------------
	PORTFOLIO FILTER
---------------------------------------------------------------------------------- */

function thinkup_input_portfoliofilter() {
global $thinkup_portfolio_filter;

global $thinkup_portfolio_pageid;
$_thinkup_meta_portfoliofilter = get_post_meta( $thinkup_portfolio_pageid, '_thinkup_meta_portfoliofilter', true );

	if ( empty( $_thinkup_meta_portfoliofilter ) or $_thinkup_meta_portfoliofilter == 'option1' ) {
		if ( empty( $thinkup_portfolio_filter ) or $thinkup_portfolio_filter == 'option1' ) {
			$output .= '<div id="portfolio-options">';
			$output .= '<a class="portfolio-nav port-navbar collapsed more-link style2 themebutton" data-toggle="collapse" data-target=".port-collapse">';
			$output .= '<span class="more-text">Filter Portfolio</span>';
			$output .= '<span class="more-icon"><i class="fa fa-angle-down fa-lg"></i></span>';
			$output .= '</a>';
			$output .= '<section class="port-collapse collapse">';
			$output .= '<ul id="filter" class="portfolio-filter"></ul>';
			$output .= '</section>';
			$output .= '</div><div class="clearboth"></div>';
		} else if ( $thinkup_portfolio_filter == 'option2' ) {
			$output .= '<section id="portfolio-options" class="style2">';
			$output .= '<ul id="filter" class="portfolio-filter"></ul>';
			$output .= '</section><div class="clearboth"></div>';
		}
	} else if ( $_thinkup_meta_portfoliofilter == 'option2' ) {
		$output .= '<div id="portfolio-options">';
		$output .= '<a class="portfolio-nav port-navbar collapsed more-link style2 themebutton" data-toggle="collapse" data-target=".port-collapse">';
		$output .= '<span class="more-text">Filter Portfolio</span>';
		$output .= '<span class="more-icon"><i class="fa fa-angle-down fa-lg"></i></span>';
		$output .= '</a>';
		$output .= '<section class="port-collapse collapse">';
		$output .= '<ul id="filter" class="portfolio-filter"></ul>';
		$output .= '</section>';
		$output .= '</div><div class="clearboth"></div>';
	} else if ( $_thinkup_meta_portfoliofilter == 'option3' ) {
		$output .= '<section id="portfolio-options" class="style2">';
		$output .= '<ul id="filter" class="portfolio-filter"></ul>';
		$output .= '</section><div class="clearboth"></div>';
	}

	// Output filter style
	if ( ! empty ( $output ) ) echo $output;
}


/* ----------------------------------------------------------------------------------
	PORTFOLIO CONTENT 1
---------------------------------------------------------------------------------- */

function thinkup_input_portfoliohover() {
global $thinkup_portfolio_lightbox;
global $thinkup_portfolio_link;
global $thinkup_portfolio_hoverstyleswitch;

global $post;
global $wp_embed;
$_thinkup_meta_featuredmedia     = get_post_meta( $post->ID, '_thinkup_meta_featuredmedia', true );
$_thinkup_meta_featuredmediatype = get_post_meta( $post->ID, '_thinkup_meta_featuredmediatype', true );
$_thinkup_meta_featuredmediamain = get_post_meta( $post->ID, '_thinkup_meta_featuredmediamain', true );

global $thinkup_portfolio_pageid;

// Set meta data for this specific page
$_thinkup_meta_portfoliolinks       = get_post_meta( $thinkup_portfolio_pageid, '_thinkup_meta_portfoliolinks', true );
$_thinkup_meta_portfoliolinksswitch = get_post_meta( $thinkup_portfolio_pageid, '_thinkup_meta_portfoliolinksswitch', true );

// Convert meta data to array for migration of CMB to v1.2.0
if ( !is_array( $_thinkup_meta_portfoliolinks ) )  {
	$_thinkup_meta_portfoliolinks = explode( ',', $_thinkup_meta_portfoliolinks );
}

	$portfolio_lightbox         = NULL;
	$portfolio_link             = NULL;
	$portfolio_class            = NULL;
	$portfolio_hoverstyleswitch = NULL;

	// Determine which hover style should be used
	if ( empty( $_thinkup_meta_portfoliolinksswitch ) or $_thinkup_meta_portfoliolinksswitch == 'option1' ) {
		if ( $thinkup_portfolio_hoverstyleswitch == 'option2' ) {
			$portfolio_hoverstyleswitch = ' overlay2';
		}
	} else if ( $_thinkup_meta_portfoliolinksswitch == 'option3' ) {
		$portfolio_hoverstyleswitch = ' overlay2';	
	}

	if ( ! empty( $_thinkup_meta_featuredmedia ) ) {

		// Remove http:// and https:// from media link
		if ( strpos( $_thinkup_meta_featuredmedia, 'https://' ) !== false ) {
			$_thinkup_meta_featuredmedia = 'https://' . str_replace( 'https://', '', $_thinkup_meta_featuredmedia );
		} else {
			$_thinkup_meta_featuredmedia = 'http://' . str_replace( 'http://', '', $_thinkup_meta_featuredmedia );
		}

		// Determine featured media to input
		if ( $_thinkup_meta_featuredmediatype == 'option2' ) {
		
			// Add source embed code if not present
			if (strpos( $_thinkup_meta_featuredmedia, '&source=embed' ) !== false) {
			} else { 
				$_thinkup_meta_featuredmedia = $_thinkup_meta_featuredmedia . '&source=embed';
			}

			// Add iframe embed code if not present
			if (strpos( $_thinkup_meta_featuredmedia, 'output=svembed?iframe=true' ) !== false) {
			} else if (strpos( $_thinkup_meta_featuredmedia, 'output=svembed' ) !== false) {
				$_thinkup_meta_featuredmedia = str_replace( 'output=svembed', 'output=svembed?iframe=true', $_thinkup_meta_featuredmedia );
			} else {
				$_thinkup_meta_featuredmedia = $_thinkup_meta_featuredmedia . '&output=svembed?iframe=true';
			}

			$media = $_thinkup_meta_featuredmedia . '&width=75%&height=75%';
		} else {
			$media = $_thinkup_meta_featuredmedia;
		}
	} else {
		$media = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
		$media = $media[0];
	}

	// Determine whether to show lightbox
	if ( empty( $_thinkup_meta_portfoliolinks[0] ) or in_array( 'option1', $_thinkup_meta_portfoliolinks ) ) {
		if ( $thinkup_portfolio_lightbox =='1' ) {
			$portfolio_lightbox = '<a class="hover-zoom prettyPhoto" href="' . $media . '"></a>';
		}
	} else if ( in_array( 'option2', $_thinkup_meta_portfoliolinks ) ) {
		$portfolio_lightbox = '<a class="hover-zoom prettyPhoto" href="' . $media . '"></a>';		
	}

	// Determine whether to show link to project
	if ( empty( $_thinkup_meta_portfoliolinks[0] ) or in_array( 'option1', $_thinkup_meta_portfoliolinks ) ) {
		if ( $thinkup_portfolio_link =='1' ) {
			$portfolio_link = '<a class="hover-link" href="' . get_permalink() . '"></a>';
		}
	} else if ( in_array( 'option3', $_thinkup_meta_portfoliolinks ) ) {
		$portfolio_link = '<a class="hover-link" href="' . get_permalink() . '"></a>';		
	}

	// Determine which if single link animation should be shown
	if ( ( empty( $portfolio_lightbox ) and ! empty( $portfolio_link ) ) 
		or ( ! empty( $portfolio_lightbox ) and empty( $portfolio_link ) ) ) {
		$portfolio_class = ' style2';
	}

	if ( ! empty( $portfolio_lightbox ) or ! empty( $portfolio_link ) ) {
		echo '<div class="image-overlay' . $portfolio_class . $portfolio_hoverstyleswitch . '"><div class="image-overlay-inner"><div class="prettyphoto-wrap">',
			 $portfolio_lightbox,
			 $portfolio_link,
			 '</div></div></div>';
	}
}


/* ----------------------------------------------------------------------------------
	PORTFOLIO CONTENT 2
---------------------------------------------------------------------------------- */

function thinkup_input_portfoliocontent() {
global $thinkup_portfolio_contentstyleswitch;
global $thinkup_portfolio_title;
global $thinkup_portfolio_excerpt;
global $thinkup_portfolio_redirect;
global $infos;

global $post;
global $thinkup_portfolio_pageid;

// Assign meta data variable
$_thinkup_meta_portfoliocontent       = get_post_meta( $thinkup_portfolio_pageid, '_thinkup_meta_portfoliocontent', true );
$_thinkup_meta_portfoliocontentswitch = get_post_meta( $thinkup_portfolio_pageid, '_thinkup_meta_portfoliocontentswitch', true );

// Convert meta data to array for migration of CMB to v1.2.0
if ( !is_array( $_thinkup_meta_portfoliocontent ) )  {
	$_thinkup_meta_portfoliocontent = explode( ',', $_thinkup_meta_portfoliocontent );
}

$output = NULL;

	// Determine which portfolio style is selected
	if( empty( $_thinkup_meta_portfoliocontentswitch ) or $_thinkup_meta_portfoliocontentswitch == 'option1' ) {
		if ( $thinkup_portfolio_contentstyleswitch !== 'option2' ) {
			$portfolio_styleclass = ' style1';
		} else {
			$portfolio_styleclass = ' style2';
		}
	} else if( $_thinkup_meta_portfoliocontentswitch == 'option2' ) {
		$portfolio_styleclass = ' style1';
	} else if( $_thinkup_meta_portfoliocontentswitch == 'option3' ) {
		$portfolio_styleclass = ' style2';
	}

	// Determine whether title and / or excerpt should be output
	if ( empty( $_thinkup_meta_portfoliocontent[0] ) or in_array( 'option1', $_thinkup_meta_portfoliocontent ) ) {

		if ( $thinkup_portfolio_title == '1' or $thinkup_portfolio_excerpt == '1' ) {

			if ( $thinkup_portfolio_title == '1' ) {
				if ( $thinkup_portfolio_redirect !== '1' ) {
					$output .= '<h4 class="port-title"><a href="' . get_permalink() . '">' . get_the_title() . '</a></h4>';
				} else {
					$output .= '<h4 class="port-title">' . get_the_title() . '</h4>';
				}
			}
			if ( $thinkup_portfolio_excerpt == '1' and get_the_excerpt() !== '' ) {
				$output .= '<p class="port-tags">' . get_the_excerpt() . '</p>';
			}

		}

	} else if ( in_array( 'option2', $_thinkup_meta_portfoliocontent ) or in_array( 'option3', $_thinkup_meta_portfoliocontent ) ) {
		
		if ( in_array( 'option2', $_thinkup_meta_portfoliocontent ) ) {
			if ( $thinkup_portfolio_redirect !== '1' ) {
				$output .= '<h4 class="port-title"><a href="' . get_permalink() . '">' . get_the_title() . '</a></h4>';
			} else {
				$output .= '<h4 class="port-title">' . get_the_title() . '</h4>';
			}
		}
		if ( in_array( 'option3', $_thinkup_meta_portfoliocontent ) and get_the_excerpt() !== '' ) {
			$output .= '<p class="port-tags">' . get_the_excerpt() . '</p>';
		}
	}
	
	// Determine which portfolio style is selected
	if ( empty( $_thinkup_meta_portfoliocontentswitch ) or $_thinkup_meta_portfoliocontentswitch == 'option1' ) {
		if ( $thinkup_portfolio_contentstyleswitch == 'option2' and $thinkup_portfolio_redirect !== '1' ) {
			$output .= '<p class="more-link style2">';
			$output .= '<a href="' . get_permalink() . '" class="themebutton">';
			$output .= '<span class="more-text">' . __( 'DETAILS', 'experon' ) . '</span>';
			$output .= '<span class="more-icon"><i class="fa fa-angle-right fa-lg"></i></span>';
			$output .= '</a>';
			$output .= '</p>';
		}
	} else if ( $_thinkup_meta_portfoliocontentswitch == 'option3' and $thinkup_portfolio_redirect !== '1' ) {
		$output .= '<p class="more-link style2">';
		$output .= '<a href="' . get_permalink() . '" class="themebutton">';
		$output .= '<span class="more-text">' . __( 'DETAILS', 'experon' ) . '</span>';
		$output .= '<span class="more-icon"><i class="fa fa-angle-right fa-lg"></i></span>';
		$output .= '</a>';
		$output .= '</p>';
	}

	// Output contents is required
	if ( ! empty( $output ) ) {
		echo '<div class="port-details' . $portfolio_styleclass . '">';
		echo $output;
		echo '</div>';	
	}
}


/* ----------------------------------------------------------------------------------
	PORTFOLIO REDIRECT
---------------------------------------------------------------------------------- */

function thinkup_portfolio_redirect() {
global $thinkup_portfolio_redirect;

	$pageURL = 'http';
	if( isset($_SERVER["HTTPS"]) ) {
		if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
	}
	$pageURL .= "://";
	if ($_SERVER["SERVER_PORT"] != "80") {
		$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	} else {
		$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	}
	$pageURL = rtrim($pageURL, '/') . '/';

	$pageURL = str_replace( "www.", "", $pageURL );
	$siteURL = str_replace( "www.", "", site_url( '/' ) );
		
	if ( $thinkup_portfolio_redirect == '1' and strpos( $pageURL, $siteURL . 'portfolio/' ) !== false and $pageURL !== $siteURL . 'portfolio/' ) {
			wp_redirect(get_option('siteurl').'/portfolio/');
	}
}
add_action( 'wp_head', 'thinkup_portfolio_redirect', 1 );


/* ----------------------------------------------------------------------------------
	ENABLE PORTFOLIO SLIDER
---------------------------------------------------------------------------------- */

function thinkup_input_portfolioslider() {
global $thinkup_portfolio_sliderswitch;
global $thinkup_portfolio_slidercategory;
global $thinkup_portfolio_sliderheight;

global $post;
global $thinkup_portfolio_pageid;
$_thinkup_meta_portfoliosliderswitch   = get_post_meta( $thinkup_portfolio_pageid, '_thinkup_meta_portfoliosliderswitch', true );
$_thinkup_meta_portfolioslidercategory = get_post_meta( $thinkup_portfolio_pageid, '_thinkup_meta_portfolioslidercategory', true );
$_thinkup_meta_portfoliosliderheight   = get_post_meta( $thinkup_portfolio_pageid, '_thinkup_meta_portfoliosliderheight', true );

	if( $_thinkup_meta_portfoliosliderswitch == 'on' ) {

		// Set default slider height
		if ( empty( $_thinkup_meta_portfoliosliderheight ) ) { $sliderheight = '300'; } else { $sliderheight = $_thinkup_meta_portfoliosliderheight; }

		// Output slider shortcode
		echo '<div id="port-slider">';
		echo do_shortcode( '[slider_portfolio cat="' . $_thinkup_meta_portfolioslidercategory . '" height="' . $sliderheight .'"]' ); 
		echo '</div>';

	} else if( $thinkup_portfolio_sliderswitch == '1' ) {

		// Set default slider height
		if ( empty( $thinkup_portfolio_sliderheight ) ) { $sliderheight = '300'; } else { $sliderheight = $thinkup_portfolio_sliderheight; }

		// Output slider shortcode
		echo '<div id="port-slider">';
		echo do_shortcode( '[slider_portfolio cat="' . $thinkup_portfolio_slidercategory . '" height="' . $sliderheight .'"]' ); 
		echo '</div>';

	}
}


/* ----------------------------------------------------------------------------------
	ENABLE PORTFOLIO SLIDER
---------------------------------------------------------------------------------- */

function thinkup_input_portfoliofeatured() {
global $thinkup_portfolio_featuredswitch;
global $thinkup_portfolio_featuredcategory;
global $thinkup_portfolio_featuredcategoryitems;
global $thinkup_portfolio_featuredcategoryscroll;
global $thinkup_portfolio_excerpt;

global $post;
global $thinkup_portfolio_pageid;
$_thinkup_meta_portfoliofeaturedswitch   = get_post_meta( $thinkup_portfolio_pageid, '_thinkup_meta_portfoliofeaturedswitch', true );
$_thinkup_meta_portfoliofeaturedcategory = get_post_meta( $thinkup_portfolio_pageid, '_thinkup_meta_portfoliofeaturedcategory', true );
$_thinkup_meta_portfoliofeatureditems    = get_post_meta( $thinkup_portfolio_pageid, '_thinkup_meta_portfoliofeatureditems', true );
$_thinkup_meta_portfoliofeaturedscroll   = get_post_meta( $thinkup_portfolio_pageid, '_thinkup_meta_portfoliofeaturedscroll', true );

	if( $_thinkup_meta_portfoliofeaturedswitch == 'on' ) {

		echo '<div id="port-featured">';

		// Add margin if tags projects tags are not displayed
		if ( $thinkup_portfolio_excerpt !== '1' ) {
			echo '<div class="margin30"></div>';
		}

		echo '<h4 class="port-title">Featured Projects</h4>';

		echo do_shortcode( '[carousel_portfolio items="' . $_thinkup_meta_portfoliofeatureditems . '" scroll="' . $_thinkup_meta_portfoliofeaturedscroll . '" speed="500" effect="scroll" title="off" tags="off" style="default" category="' . $_thinkup_meta_portfoliofeaturedcategory . '"]' ); 

		echo '</div>';

	} else if( $thinkup_portfolio_featuredswitch == '1' ) {

		echo '<div id="port-featured">';

		// Add margin if tags projects tags are not displayed
		if ( $thinkup_portfolio_excerpt !== '1' ) {
			echo '<div class="margin30"></div>';
		}

		echo '<h4 class="port-title">Featured Projects</h4>';

		echo do_shortcode( '[carousel_portfolio items="' . $thinkup_portfolio_featuredcategoryitems . '" scroll="' . $thinkup_portfolio_featuredcategoryscroll . '" speed="500" effect="scroll" title="off" tags="off" style="default" category="' . $thinkup_portfolio_featuredcategory . '"]' ); 

		echo '</div>';
	}
}


/* ----------------------------------------------------------------------------------
	PROJECT NAVIGATION
---------------------------------------------------------------------------------- */

function thinkup_input_projectnavigation() {
global $thinkup_project_navigationswitch;

	if ( $thinkup_project_navigationswitch == '1' ) {
		thinkup_input_nav( 'nav-below' );
	}
}


/* ----------------------------------------------------------------------------------
	RECENT PROJECTS
---------------------------------------------------------------------------------- */

function thinkup_input_projectrelated() {
global $thinkup_project_recent;
global $thinkup_project_recentitems;
global $thinkup_project_recentscroll;

$items  = NULL;
$scroll = NULL;

	// Set default items to equal 2
	if ( empty( $thinkup_project_recentitems ) ) {
		$items = 2;
	} else {
		$items = $thinkup_project_recentitems;
	}

	// Set default scroll to equal 1
	if ( empty( $thinkup_project_recentscroll ) ) {
		$scroll = 1;
	} else {
		$scroll = $thinkup_project_recentscroll;
	}

	if ( $thinkup_project_recent == '1' ) {
		echo do_shortcode( '[carousel_portfolio items="' . $items . '" scroll="' . $scroll . '" speed="500" effect="scroll" title="off" details="off" category="0"]' );
	}

}
?>