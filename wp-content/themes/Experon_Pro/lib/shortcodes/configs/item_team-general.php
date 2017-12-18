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
	'id' => '1561373',
	'master' => 'id',
	'fields' => array(
		'id'	=>	array(
			'label'		=> 	__('Post ID','thinkupshortcodes'),
			'caption'	=>	__('Input the project ID number.','thinkupshortcodes'),
			'type'		=>	'smalltextfield',
			'default'	=> 	'',
		),
		'size'	=>	array(
			'label'		=> 	__('Size','thinkupshortcodes'),
			'caption'	=>	__('Specify the media uploader image size','thinkupshortcodes'),
			'type'		=>	'smalltextfield',
			'default'	=> 	'',
		),
		'show_link'	=>	array(
			'label'		=> 	__('Show Link?','thinkupshortcodes'),
			'caption'	=>	__('Choose whether to show the link to the team member page.','thinkupshortcodes'),
			'type'		=>	'onoff',
			'default'	=> 	'*on,off',
			'inline'	=> 	true,
		),
		'link_style'	=>	array(
			'label'		=> 	__('Link Style','thinkupshortcodes'),
			'caption'	=>	__('Choose the style for the team member link.','thinkupshortcodes'),
			'type'		=>	'dropdown',
			'default'	=> 	'*style1,style2',
		),
		'show_name'	=>	array(
			'label'		=> 	__('Show Name?','thinkupshortcodes'),
			'caption'	=>	__('Choose whether to display the team members name.','thinkupshortcodes'),
			'type'		=>	'onoff',
			'default'	=> 	'on,*off',
			'inline'	=> 	true,
		),
		'show_position'	=>	array(
			'label'		=> 	__('Show Position?','thinkupshortcodes'),
			'caption'	=>	__('Choose whether the show the team members position?','thinkupshortcodes'),
			'type'		=>	'onoff',
			'default'	=> 	'on,*off',
			'inline'	=> 	true,
		),
		'show_excerpt'	=>	array(
			'label'		=> 	__('Show Excerpt?','thinkupshortcodes'),
			'caption'	=>	__('Choose whether to show the team members excerpt?','thinkupshortcodes'),
			'type'		=>	'onoff',
			'default'	=> 	'on,*off',
			'inline'	=> 	true,
		),
		'show_social'	=>	array(
			'label'		=> 	__('Show Social Icons?','thinkupshortcodes'),
			'caption'	=>	__('Choose whether to show the team members social media icons?','thinkupshortcodes'),
			'type'		=>	'onoff',
			'default'	=> 	'on,*off',
			'inline'	=> 	true,
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

