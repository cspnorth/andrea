<?php
/**
 * Special pages functions.
 *
 * @package ThinkUpThemes
 */

/* ----------------------------------------------------------------------------------
	CLIENT - CLIENT REDIRECT
---------------------------------------------------------------------------------- */

function thinkup_client_redirect() {
global $thinkup_client_redirect;

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
		
	if ( $thinkup_client_redirect == '1' and strpos( $pageURL, $siteURL . 'clients/' ) !== false and $pageURL !== $siteURL . 'clients/' ) {
			wp_redirect(get_option('siteurl').'/clients/');
	}
}
add_action( 'wp_head', 'thinkup_client_redirect', 1 );


/* ----------------------------------------------------------------------------------
	TEAM - TEAM LAYOUT
---------------------------------------------------------------------------------- */

// Determine which style and layout should be used
function thinkup_input_teamlayout() {
global $thinkup_team_styleswitch;
global $thinkup_team_layout;

global $thinkup_team_pageid;
$_thinkup_meta_teamlayout = get_post_meta( $thinkup_team_pageid, '_thinkup_meta_teamlayout', true );

	// Output layout class
	if ( empty( $_thinkup_meta_teamlayout ) or $_thinkup_meta_teamlayout == 'option1' ) {
		if ( $thinkup_team_styleswitch == 'option2' ) {

			if ( empty( $thinkup_team_layout ) or $thinkup_team_layout == 'option1' ) {
				echo ' column-1';
			} else if ( $thinkup_team_layout == 'option2' ) {
				echo ' column-2';
			} else if ( $thinkup_team_layout == 'option3' ) {
				echo ' column-3';
			} else if ( $thinkup_team_layout == 'option4' ) {
				echo ' column-4';
			}
		}
	} else if ( $_thinkup_meta_teamlayout == 'option2' ) {
		echo ' column-1';
	} else if ( $_thinkup_meta_teamlayout == 'option3' ) {
		echo ' column-2';
	} else if ( $_thinkup_meta_teamlayout == 'option4' ) {
		echo ' column-3';
	} else if ( $_thinkup_meta_teamlayout == 'option5' ) {
		echo ' column-4';
	}
}

// Determine which image size to use
function thinkup_input_teamimage() {
global $post;
global $thinkup_team_styleswitch;
global $thinkup_team_layout;

$team_image = NULL;

global $thinkup_team_pageid;
$_thinkup_meta_teamstyleswitch = get_post_meta( $thinkup_team_pageid, '_thinkup_meta_teamstyleswitch', true );
$_thinkup_meta_teamlayout      = get_post_meta( $thinkup_team_pageid, '_thinkup_meta_teamlayout', true );

	// Determine image size for grid layout
	if ( empty ( $_thinkup_meta_teamstyleswitch ) or $_thinkup_meta_teamstyleswitch == 'option1' ) {
		if ( $thinkup_team_styleswitch == 'option2' ) {
			if ( empty( $thinkup_team_layout ) or $thinkup_team_layout == 'option1' ) {
				$team_image = 'column1-1/2';
			} else if ( $thinkup_team_layout == 'option2' ) {
				$team_image = 'column2-2/3';
			} else if ( $thinkup_team_layout == 'option3' ) {
				$team_image = 'column3-2/3';
			} else if ( $thinkup_team_layout == 'option4' ) {
				$team_image = 'column4-2/3';
			}
		}
	} else if ( $_thinkup_meta_teamstyleswitch == 'option3' ) {
		if ( empty( $_thinkup_meta_teamlayout ) or $_thinkup_meta_teamlayout == 'option1' ) {
			if ( empty( $thinkup_team_layout ) or $thinkup_team_layout == 'option1' ) {
				$team_image = 'column1-1/2';
			} else if ( $thinkup_team_layout == 'option2' ) {
				$team_image = 'column2-2/3';
			} else if ( $thinkup_team_layout == 'option3' ) {
				$team_image = 'column3-2/3';
			} else if ( $thinkup_team_layout == 'option4' ) {
				$team_image = 'column4-2/3';
			}
		} else if ( $_thinkup_meta_teamlayout == 'option2' ) {
			$team_image = 'column1-1/2';
		} else if ( $_thinkup_meta_teamlayout == 'option3' ) {
			$team_image = 'column2-2/3';
		} else if ( $_thinkup_meta_teamlayout == 'option4' ) {
			$team_image = 'column3-2/3';
		} else if ( $_thinkup_meta_teamlayout == 'option5' ) {
			$team_image = 'column4-2/3';
		}
	}

	// Assign default value is none set above
	if ( empty( $team_image ) ) {
		$team_image = 'column2-2/3';
	}

	$post_id = get_post_thumbnail_id( $post->ID );
	$post_img = wp_get_attachment_image_src($post_id, $team_image, true);

	echo $post_img[0];
}


/* ----------------------------------------------------------------------------------
	TEAM - TEAM LINKS STYLE
---------------------------------------------------------------------------------- */

// Determine which overlay style should be used
function thinkup_input_teamoverlay() {
global $thinkup_team_hoverstyleswitch;

global $thinkup_team_pageid;
$_thinkup_meta_teamhoverstyleswitch = get_post_meta( $thinkup_team_pageid, '_thinkup_meta_teamhoverstyleswitch', true );

	// Determine if alternate overlay style should be used
	if ( empty( $_thinkup_meta_teamhoverstyleswitch ) or $_thinkup_meta_teamhoverstyleswitch == 'option1' ) {
		if ( $thinkup_team_hoverstyleswitch == 'option2' ) {
			echo ' overlay2';
		}
	} else if ( $_thinkup_meta_teamhoverstyleswitch == 'option3' ) {
		echo ' overlay2';
	}
}


/* ----------------------------------------------------------------------------------
	TEAM - TEAM CONTENT
---------------------------------------------------------------------------------- */

// Team member - Job title
function thinkup_team_jobtitle() {

global $post;
$_thinkup_meta_teamposition  = get_post_meta( $post->ID, '_thinkup_meta_teamposition', true );

	if ( ! empty( $_thinkup_meta_teamposition ) ) {
		echo '<h5>' . $_thinkup_meta_teamposition . '</h5>';
	}
}

// Team member - Social Links
function thinkup_team_social() {

global $post;
$_thinkup_meta_teamfacebook  = get_post_meta( $post->ID, '_thinkup_meta_teamfacebook', true );
$_thinkup_meta_teamtwitter   = get_post_meta( $post->ID, '_thinkup_meta_teamtwitter', true );
$_thinkup_meta_teamgoogle    = get_post_meta( $post->ID, '_thinkup_meta_teamgoogle', true );
$_thinkup_meta_teamlinkedin  = get_post_meta( $post->ID, '_thinkup_meta_teamlinkedin', true );
$_thinkup_meta_teaminstagram = get_post_meta( $post->ID, '_thinkup_meta_teaminstagram', true );
$_thinkup_meta_teamdribbble  = get_post_meta( $post->ID, '_thinkup_meta_teamdribbble', true );
$_thinkup_meta_teamflickr    = get_post_meta( $post->ID, '_thinkup_meta_teamflickr', true );

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
			 '<a href="' . $social['link'] . '" data-tip="top" data-original-title="' . str_replace( '-plus', '+', $social['social'] ) . '">',
			 '<i class="fa fa-' . strtolower( $social['social'] ) . '"></i>',
			 '</a>',
			 '</li>';
		}
	}

	// Close list output of social media links if any link is set
	if ( $j == 1 ) { echo '</ul></div>'; }
}

// Determine which content to output
function thinkup_input_teamcontent() {
global $thinkup_team_membername;
global $thinkup_team_memberposition;
global $thinkup_team_memberexcerpt;
global $thinkup_team_membersocial;

$output = NULL;

global $thinkup_team_pageid;

// Assign meta data variable
$_thinkup_meta_teamcontentcheck = get_post_meta( $thinkup_team_pageid, '_thinkup_meta_teamcontentcheck', true );

// Convert meta data to array for migration of CMB to v1.2.0
if ( !is_array( $_thinkup_meta_teamcontentcheck ) )  {
	$_thinkup_meta_teamcontentcheck = explode( ',', $_thinkup_meta_teamcontentcheck );
}

	// Output team member name if set
	if ( empty( $_thinkup_meta_teamcontentcheck ) or in_array( 'option1', $_thinkup_meta_teamcontentcheck ) ) {
		if ( $thinkup_team_membername !== '1' ) {
			echo '<h4><a href="' . get_permalink() . '">' . get_the_title() . '</a></h4>';
		}
	} else if ( in_array( 'option2', $_thinkup_meta_teamcontentcheck ) ) {
		echo '<h4><a href="' . get_permalink() . '">' . get_the_title() . '</a></h4>';
	}

	// Output team member position if set
	if ( empty( $_thinkup_meta_teamcontentcheck ) or in_array( 'option1', $_thinkup_meta_teamcontentcheck ) ) {
		if ( $thinkup_team_memberposition !== '1' ) {
			thinkup_team_jobtitle();
		}
	} else if ( in_array( 'option3', $_thinkup_meta_teamcontentcheck ) ) {
		thinkup_team_jobtitle();
	}

	// Output team member excerpt if set
	if ( empty( $_thinkup_meta_teamcontentcheck ) or in_array( 'option1', $_thinkup_meta_teamcontentcheck ) ) {
		if ( $thinkup_team_memberexcerpt !== '1' ) {
			the_excerpt();
		}
	} else if ( in_array( 'option4', $_thinkup_meta_teamcontentcheck ) ) {
		the_excerpt();
	}

	// Output team member social links if set
	if ( empty( $_thinkup_meta_teamcontentcheck ) or in_array( 'option1', $_thinkup_meta_teamcontentcheck ) ) {
		if ( $thinkup_team_membersocial !== '1' ) {
			thinkup_team_social();
		}
	} else if ( in_array( 'option5', $_thinkup_meta_teamcontentcheck ) ) {
		thinkup_team_social();
	}
}


/* ----------------------------------------------------------------------------------
	TEAM - TEAM REDIRECT
---------------------------------------------------------------------------------- */

// Team Redirect
function thinkup_team_redirect() {
global $thinkup_team_redirect;

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
		
	if ( $thinkup_team_redirect == '1' and strpos( $pageURL, $siteURL . 'team/' ) !== false and $pageURL !== $siteURL . 'team/' ) {
			wp_redirect(get_option('siteurl').'/team/');
	}
}
add_action( 'wp_head', 'thinkup_team_redirect' );


/* ----------------------------------------------------------------------------------
	TESTIMONIAL - TESTIMONIAL STYLE
---------------------------------------------------------------------------------- */

function thinkup_input_testimoniallayout() {
global $thinkup_testimonal_styleswitch;

global $thinkup_testimonial_pageid;
$_thinkup_meta_testimonalstyleswitch = get_post_meta( $thinkup_testimonial_pageid, '_thinkup_meta_testimonalstyleswitch', true );

	// Determine which testimonial style should be used
	if( empty ( $_thinkup_meta_testimonalstyleswitch ) or $_thinkup_meta_testimonalstyleswitch == 'option1' ) {
		if ( empty( $thinkup_testimonal_styleswitch ) or $thinkup_testimonal_styleswitch == 'option1' ) {
			echo ' style1';
		} else if ( $thinkup_testimonal_styleswitch == 'option2' ) {
			echo ' style2';
		} else if ( $thinkup_testimonal_styleswitch == 'option3' ) {
			echo ' style3';
		}
	} else if( $_thinkup_meta_testimonalstyleswitch == 'option2' ) {
		echo ' style1';
	} else if( $_thinkup_meta_testimonalstyleswitch == 'option3' ) {
		echo ' style2';
	} else if( $_thinkup_meta_testimonalstyleswitch == 'option4' ) {
		echo ' style3';
	}
}

function thinkup_input_testimonialcontent() {
global $thinkup_testimonal_styleswitch;
global $thinkup_testimonial_links;

global $post;

// Assign meta data variable
if ( ! empty( $post->ID ) ) {
	$_thinkup_meta_testimonialname    = get_post_meta( $post->ID, '_thinkup_meta_testimonialname', true );
	$_thinkup_meta_testimonialcompany = get_post_meta( $post->ID, '_thinkup_meta_testimonialcompany', true );
}

// Set default values to NULL
$output_style1   = NULL;
$output_style2   = NULL;
$output_style3   = NULL;
$post_img_style1 = NULL;
$post_img_style2 = NULL;
$post_img_style3 = NULL;

global $thinkup_testimonial_pageid;
$_thinkup_meta_testimonalstyleswitch = get_post_meta( $thinkup_testimonial_pageid, '_thinkup_meta_testimonalstyleswitch', true );

	$post_id = get_post_thumbnail_id( $post->ID );
	
	if ( $thinkup_testimonial_links == '1' ) {
		$link_start = NULL;
		$link_end   = NULL;
	} else {
		$link_start = '<a href="' . get_permalink() . '">';
		$link_end   = '</a>';
	}

	// Output for Style 1
	$post_img_style1 = wp_get_attachment_image_src($post_id, 'sc-testimonial', true);

	$output_style1 .= '<div class="entry-header">';
	$output_style1 .= '<div class="testimonial-excerpt">';
	$output_style1 .= wpautop( get_the_excerpt() );
	$output_style1 .= '</div>';
	$output_style1 .= '</div>';

	$output_style1 .= '<div class="entry-content">';
	$output_style1 .= '<div class="testimonial-thumb">';
	$output_style1 .= $link_start . '<img src="' . $post_img_style1[0] . '" />' . $link_end;
	$output_style1 .= '</div>';
	$output_style1 .= '</div>';
	
	// Output for Style 2
	$post_img_style2 = wp_get_attachment_image_src($post_id, 'column3-2/5', true);

	$output_style2 .= '<div class="entry-header">';
	$output_style2 .= '<div class="testimonial-thumb">';
	$output_style2 .= $link_start . '<img src="' . $post_img_style2[0] . '" />' . $link_end;
	$output_style2 .= '</div>';
	$output_style2 .= '</div>';

	$output_style2 .= '<div class="entry-content">';

	$output_style2 .= '<div class="testimonial-quote"></div>';

	$output_style2 .= '<div class="testimonial-excerpt">';
	$output_style2 .= wpautop( get_the_excerpt() );
	$output_style2 .= '</div>';
		
	$output_style2 .= '<div class="testimonial-name">';
	$output_style2 .= '<h3>' . $link_start . $_thinkup_meta_testimonialname . $link_end . '</h3>';
	$output_style2 .= '</div>';

	$output_style2 .= '<div class="testimonial-position">';
	$output_style2 .= $_thinkup_meta_testimonialcompany;
	$output_style2 .= '</div>';

	$output_style2 .= '</div>';

	// Output for Style 3	
	$post_img_style3 = wp_get_attachment_image_src($post_id, 'thumbnail', true);

	$output_style3 .= '<div class="entry-header">';
	$output_style3 .= '<div class="testimonial-thumb">';
	$output_style3 .= $link_start . '<img src="' . $post_img_style3[0] . '" />' . $link_end;
	$output_style3 .= '</div>';
	$output_style3 .= '</div>';

	$output_style3 .= '<div class="entry-content">';
	$output_style3 .= '<div class="testimonial-excerpt">';
	$output_style3 .= wpautop( get_the_excerpt() );
	$output_style3 .= '</div>';

	$output_style3 .= '<div class="testimonial-quote"></div>';
		
	$output_style3 .= '<div class="testimonial-name">';
	$output_style3 .= '<h3>' . $link_start . $_thinkup_meta_testimonialname . $link_end . '</h3>';
	$output_style3 .= '</div>';

	$output_style3 .= '<div class="testimonial-position">';
	$output_style3 .= $_thinkup_meta_testimonialcompany;
	$output_style3 .= '</div>';

	$output_style3 .= '</div>';
	
	// Determine which content style should be output
	if ( empty( $_thinkup_meta_testimonalstyleswitch ) or $_thinkup_meta_testimonalstyleswitch == 'option1' ) {	
		if ( empty( $thinkup_testimonal_styleswitch ) or $thinkup_testimonal_styleswitch == 'option1' ) {
			$output = $output_style1;
		} else if ( $thinkup_testimonal_styleswitch == 'option2' ) {
			$output = $output_style2;
		} else if ( $thinkup_testimonal_styleswitch == 'option3' ) {
			$output = $output_style3;
		}
	} else if ( $_thinkup_meta_testimonalstyleswitch == 'option2' ) {
		$output = $output_style1;
	} else if ( $_thinkup_meta_testimonalstyleswitch == 'option3' ) {
		$output = $output_style2;
	} else if ( $_thinkup_meta_testimonalstyleswitch == 'option4' ) {
		$output = $output_style3;
	}

	// Output team page content if not empty
	if ( ! empty( $output ) ) {
		echo $output;
	}
}


/* ----------------------------------------------------------------------------------
	TESTIMONIAL - TESTIMONIAL REDIRECT
---------------------------------------------------------------------------------- */

function thinkup_testimonial_redirect() {
global $thinkup_testimonial_redirect;

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
		
	if ( $thinkup_testimonial_redirect == '1' and strpos( $pageURL, $siteURL . 'testimonials/' ) !== false and $pageURL !== $siteURL . 'testimonials/' ) {
			wp_redirect(get_option('siteurl').'/testimonials/');
	}
}
add_action( 'wp_head', 'thinkup_testimonial_redirect' );


/* ----------------------------------------------------------------------------------
	404 - CUSTOM CONTENT
---------------------------------------------------------------------------------- */

function thinkup_input_404content() {
global $thinkup_404_content;
global $thinkup_404_contentparagraph;

	if ( ! empty( $thinkup_404_content ) ) {
		if ( $thinkup_404_contentparagraph !== '1' ) {

			$thinkup_404_content = str_replace("\r\n","\n",$thinkup_404_content);

			$paragraphs = preg_split("/[\n]{2,}/",$thinkup_404_content);
			foreach ( $paragraphs as $key => $p ) {
				$paragraphs[ $key ] = "<p>".str_replace( "\n","<br />",$paragraphs[ $key ] )."</p>";
			}
			$thinkup_404_content = implode( "", $paragraphs );
			echo 	'<div class="entry-content">',
					do_shortcode( shortcode_unautop( $thinkup_404_content ) ),
					'</div>';
		}
			else if ( $thinkup_404_contentparagraph == '1' ) {
			echo 	'<div class="entry-content">',
					do_shortcode( shortcode_unautop( $thinkup_404_content ) ),
					'</div>';
		}
	} else {
		echo	'<div class="entry-content title-404">',
			'<h2><i class="fa fa-ban"></i>404</h2>',
			'<p>' . __( 'Sorry, we could not find the page you are looking for.', 'experon' ) . '<br/>' . __( 'Please try using the search function.', 'experon' ) . '</p>',
			get_search_form(),
			'</div>';
	}
}


?>