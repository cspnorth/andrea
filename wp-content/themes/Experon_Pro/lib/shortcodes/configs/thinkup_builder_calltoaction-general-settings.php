<?php
/**
*
* fieldconfig for thinkupshortcodes/General Settings
*
* @package Thinkupshortcodes
* @author Think Up Themes Ltd contact@thinkupthemes.com
* @license GPL-2.0+
* @link www.thinkupthemes.com
* @copyright 2017 Think Up Themes Ltd
*/


$group = array(
	'label' => __('General Settings','thinkupshortcodes'),
	'id' => '155141036',
	'master' => 'style',
	'fields' => array(
		'style'	=>	array(
			'label'		=> 	__('Style','thinkupshortcodes'),
			'caption'	=>	__('Style','thinkupshortcodes'),
			'type'		=>	'dropdown',
			'default'	=> 	'*style1||Style 1,style2||Style 2',
		),
		'title'	=>	array(
			'label'		=> 	__('Title','thinkupshortcodes'),
			'caption'	=>	__('Title','thinkupshortcodes'),
			'type'		=>	'textfield',
			'default'	=> 	'',
		),
		'teaser'	=>	array(
			'label'		=> 	__('Teaser','thinkupshortcodes'),
			'caption'	=>	__('Teaser','thinkupshortcodes'),
			'type'		=>	'textbox',
			'default'	=> 	'',
		),
		'button'	=>	array(
			'label'		=> 	__('Button Text','thinkupshortcodes'),
			'caption'	=>	__('Button Text','thinkupshortcodes'),
			'type'		=>	'smalltextfield',
			'default'	=> 	'',
		),
		'link'	=>	array(
			'label'		=> 	__('Button Link','thinkupshortcodes'),
			'caption'	=>	__('Button Link','thinkupshortcodes'),
			'type'		=>	'textfield',
			'default'	=> 	'',
		),
		'target'	=>	array(
			'label'		=> 	__('Button Target','thinkupshortcodes'),
			'caption'	=>	__('Button Target','thinkupshortcodes'),
			'type'		=>	'dropdown',
			'default'	=> 	'*current||Current Tab ,new||New Tab',
		),
		'color_custom'	=>	array(
			'label'		=> 	__('Custom Colors (Set below):','thinkupshortcodes'),
          'caption'   =>  '',
			'type'		=>	'onoff',
			'default'	=> 	'on||on,*off||off',
			'inline'	=> 	true,
		),
		'color_text'	=>	array(
			'label'		=> 	__('Text Color:','thinkupshortcodes'),
          'caption'   =>  '',
			'type'		=>	'colorpicker',
			'default'	=> 	'',
		),
		'color_text_hover'	=>	array(
			'label'		=> 	__('Text Color (Hover):','thinkupshortcodes'),
          'caption'   =>  '',
			'type'		=>	'colorpicker',
			'default'	=> 	'',
		),
		'color_bg'	=>	array(
			'label'		=> 	__('Background Color:','thinkupshortcodes'),
          'caption'   =>  '',
			'type'		=>	'colorpicker',
			'default'	=> 	'',
		),
		'color_bg_hover'	=>	array(
			'label'		=> 	__('Background Color (Hover):','thinkupshortcodes'),
          'caption'   =>  '',
			'type'		=>	'colorpicker',
			'default'	=> 	'',
		),
	),
	'styles'	=> array(
		'toggles.css',
		'minicolors.css',
	),
	'scripts'	=> array(
		'toggles.min.js',
		'minicolors.js',
	),
	'multiple'	=> false,
);

