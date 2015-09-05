<?php
/*
  Plugin Name: Automagic Shortcodes
  Plugin URI: 
  Version: 0.0.1
  Author: Tiago Fabre
  Author URI: 
  Description: 
  Text Domain: automagic-shortcodes
  Domain Path: /languages
  License: GPL
 */

if( !class_exists('atms') ):
class atms{


	function __construct()
	{
		//add_action( 'init', array( $this, 'load_plugin_textdomain' ) );
		add_action('init', array($this, 'includes'));
	}

	/**
	* Includes.
	*/
	function includes() {
		include_once('core/api.php');

		function test($args)
		{
			print_r($args);
			return "Content replaced!";
		}

		//add_mshortcode('baztag','test');

	}
	
	/**
	 * Load the plugin text domain for translation.
	 */
	function load_plugin_textdomain() {
		load_plugin_textdomain( 'automagic-shortcodes', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
	}
}


	function atms()
	{
		global $atms;
		
		if( !isset($atms) )
		{
			$atms = new atms();
		}
		
		return $atms;
	}

	atms();
endif;
?>