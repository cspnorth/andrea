<?php
/**
*
* fieldconfig for thinkupshortcodes/General
*
* @package Thinkupshortcodes
* @author Think Up Themes Ltd contact@thinkupthemes.com
* @license GPL-2.0+
* @link www.thinkupthemes.com
* @copyright 2017 Think Up Themes Ltd
*/


$group = array(
	'label' => __('General','thinkupshortcodes'),
	'id' => '1011101089',
	'master' => 'heading',
	'fields' => array(
		'heading'	=>	array(
			'label'		=> 	__('Heading','thinkupshortcodes'),
			'caption'	=>	__('Add a heading to your portfolio carousel (e.g. Latest Work)','thinkupshortcodes'),
			'type'		=>	'textfield',
			'default'	=> 	'',
		),
		'items'	=>	array(
			'label'		=> 	__('Items','thinkupshortcodes'),
			'caption'	=>	__('Choose the number of blog posts to display in carousel window','thinkupshortcodes'),
			'type'		=>	'dropdown',
			'default'	=> 	'2,3,4',
		),
		'scroll'	=>	array(
			'label'		=> 	__('Scroll','thinkupshortcodes'),
			'caption'	=>	__('Choose the number of blog posts to scroll on click','thinkupshortcodes'),
			'type'		=>	'dropdown',
			'default'	=> 	'1,2,3,4',
		),
		'speed'	=>	array(
			'label'		=> 	__('Scroll Duration','thinkupshortcodes'),
			'caption'	=>	__('Specify a duartion for the carousel scroll in milliseconds (default = 500)','thinkupshortcodes'),
			'type'		=>	'smalltextfield',
			'default'	=> 	'500',
		),
		'effect'	=>	array(
			'label'		=> 	__('Effect','thinkupshortcodes'),
			'caption'	=>	__('Choose a scroll effect (Default: scroll)','thinkupshortcodes'),
			'type'		=>	'dropdown',
			'default'	=> 	'none,scroll,directscroll,fade,crossfade,cover,cover-fade,uncover,uncover-fade',
		),
		'show_link'	=>	array(
			'label'		=> 	__('Show Link?','thinkupshortcodes'),
			'caption'	=>	__('Choose whether to show the link to the team member page.','thinkupshortcodes'),
			'type'		=>	'checkbox',
			'default'	=> 	'*on,off',
		),
		'link_style'	=>	array(
			'label'		=> 	__('Link Style','thinkupshortcodes'),
			'caption'	=>	__('Choose the style for the team member link.','thinkupshortcodes'),
			'type'		=>	'dropdown',
			'default'	=> 	'*style1,style2',
		),
		'show_name'	=>	array(
			'label'		=> 	__('Show Name? ','thinkupshortcodes'),
			'caption'	=>	__('Choose whether to show the team members name.','thinkupshortcodes'),
			'type'		=>	'onoff',
			'default'	=> 	'on,*off',
			'inline'	=> 	true,
		),
		'show_position'	=>	array(
			'label'		=> 	__('Show Position?','thinkupshortcodes'),
			'caption'	=>	__('Choose whether to show the team members position.','thinkupshortcodes'),
			'type'		=>	'onoff',
			'default'	=> 	'on,*off',
			'inline'	=> 	true,
		),
		'show_excerpt'	=>	array(
			'label'		=> 	__('Show Excerpt?','thinkupshortcodes'),
			'caption'	=>	__('Choose whether to show the team members excerpt.','thinkupshortcodes'),
			'type'		=>	'onoff',
			'default'	=> 	'on,*off',
			'inline'	=> 	true,
		),
		'show_social'	=>	array(
			'label'		=> 	__('Show Social Icons','thinkupshortcodes'),
			'caption'	=>	__('Choose whether to show the team members social links.','thinkupshortcodes'),
			'type'		=>	'onoff',
			'default'	=> 	'on,*off',
			'inline'	=> 	true,
		),
		'tag'	=>	array(
			'label'		=> 	__('Tag','thinkupshortcodes'),
			'caption'	=>	__('Input the tag ID number to display posts from a single category (i.e. 0 = all).','thinkupshortcodes'),
			'type'		=>	'smalltextfield',
			'default'	=> 	'0',
		),
	),
	'styles'	=> array(
		'toggles.css',
	),
	'scripts'	=> array(
		'toggles.min.js',
	),
	'multiple'	=> false,
);

