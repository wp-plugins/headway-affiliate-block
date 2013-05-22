<?php
/*
Plugin Name: Headway Block: Headway Affiliate
Plugin URI: http://blocks.headway101.com/affiliate/
Description: Headway Affiliate block is built to let you easily add a headway themes promotional box to your website.
Version: 1.2
Author: Headway101
Author URI: http://www.headway101.com
License: GNU GPL v2
*/

/**
 * Everything is ran at the after_setup_theme action to insure that all of Headway's classes and functions are loaded.
 **/
add_action('after_setup_theme', 'affiliate_block_register');
function affiliate_block_register() {

	if ( !class_exists('Headway') )
		return;
	
	require_once 'block.php';
	require_once 'block-options.php';
	return headway_register_block('HeadwayAffiliateBlock', plugins_url(false, __FILE__));

}
/**
 * If you plan on adding your block to Headway Extend, then this will be the code that will enable auto-updates for the block/plugin.
 **/
define('AFFILIATE_BLOCK_VERSION', '1.2');
add_action('init', 'affiliate_block_extend_updater');
function affiliate_block_extend_updater() {

	if ( !class_exists('HeadwayUpdaterAPI') )
		return;

	$updater = new HeadwayUpdaterAPI(array(
		'slug' => 'affiliate-block',
		'path' => plugin_basename(__FILE__),
		'name' => 'Affiliate',
		'type' => 'block',
		'current_version' => AFFILIATE_BLOCK_VERSION
	));

}