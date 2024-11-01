<?php
/*
Plugin Name: Wordpress Wall Paint Calculator by Ostheimer
Plugin URI: http://www.ostheimer.at/
Description: This Plugin gives you the possibility to insert a wall paint calculator via widget or shortcode into your site.
Author: Ostheimer.at
Version: 1.2
Author URI: http://www.ostheimer.at
	Copyright 2012  Ostheimer.at  (email : office@ostheimer.at)
    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.
    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.
    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

/* Version check */

global $wp_version;

$exit_msg='Wordpress Eyelaser Savings by Ostheimer requires WordPress 3.0 or newer.
<a href="http://codex.wordpress.org/Upgrading_Wordpress">Please update!</a>';
if(version_compare($wp_version, "3.0","<")) {
	exit($exit_msg);
}

/* Select the URL of the plugin */

$plugin_url_paint = trailingslashit( WP_PLUGIN_URL.'/'. dirname( plugin_basename(__FILE__) ));

/* Localization */

load_plugin_textdomain( 'paint', false, dirname( plugin_basename(__FILE__) ).'/languages/'  );

/* Register Widget */

function paint_init() {
	global $plugin_url_paint;
	wp_register_sidebar_widget('Wall_Paint_Calculator_1','Wall Paint Calculator', 'paint_widget');
	wp_register_widget_control('Wall_Paint_Calculator_1','Wall Paint Calculator', 'paint_widget_control');
}

add_action('init','paint_init');

/* Load CSS */

function paint_css() {
	global $plugin_url_paint;
	wp_register_style( 'paint-css', $plugin_url_paint . 'wall-paint-calculator.css' );
	wp_enqueue_style( 'paint-css' );
}
add_action( 'wp_enqueue_scripts', 'paint_css' );

/* Load Scripts */

function paint_scripts() {
	global $plugin_url_paint;
	wp_enqueue_script('paint-calculator', $plugin_url_paint . 'wall-paint-calculator.js', array('jquery'));
	wp_localize_script( 
	   'paint-calculator', 
	   'messages',
	   array(
			'onlyinteger' => _('Alle Felder ausfüllen.')
			)
	);
}

add_action('wp_enqueue_scripts','paint_scripts',10);

/* Generate Shortcode [windspeed_converter] */

function paint_shortcode($atts) {
	ob_start();
	display_paint_shortcode($atts);
	$output_string = ob_get_contents();
	ob_end_clean();
	return $output_string;
}

add_shortcode('wall_paint_calculator','paint_shortcode');

function display_paint_shortcode($atts) {
	extract(shortcode_atts( array(
				'title'     => 'Paint Calculator',
				'link' 		=> ''
			), $atts ));
		 
	echo '<div id="paint_volume_calculator" class="paint_volume_calculator">';
		echo '<h3>'.$title.'</h3>';
		echo '<form name="form_paint_volume_calculator" id="form_paint_volume_calculator">';
				echo '<div id="div_surface" class="field">
						<label>';_e( "Roomsize in m2", 'paint' ); echo '</label>
						<input type="text" name="surface" class="input_field" id="surface" maxlength="4" />
						<div class="clear"></div>
					  </div>';
				echo '<div id="div_doors" class="field">
						<label>';_e( "Number of doors", 'paint' ); echo '</label>
						<input type="text" name="doors" class="input_field" id="doors" maxlength="2" />
						<div class="clear"></div>
					  </div>';
				echo '<div id="div_windows" class="field">
						<label>';_e( "Number of windows", 'paint' ); echo '</label>
						<input type="text" name="windows" class="input_field" id="windows" maxlength="2" />
						<div class="clear"></div>
					  </div>';
				echo '<div id="div_ceiling" class="field">
						<label>';_e( "Ceiling", 'paint' ); echo '</label>
						<input type="checkbox" name="ceiling" class="input_field" id="ceiling" />
						<div class="clear"></div>
					  </div>';
				echo '<div id="result" class="field">
					  </div>';
				echo '<div id="div_calculate_button">
						<a name="calculate" class="input_field" id="calculate">';_e( "Calculate", 'paint' ); echo '</a>
					  </div>';
				echo '<div class="message"></div>';
				echo '<div class="clear"></div>';
				if($link == 'true') {
				echo '<div id="link">
						<a href="http://www.ostheimer.at" target="_blank" title="Ostheimer Wordpress Webdesign and SEO">Plugin by</a>&nbsp;<a href="http://www.maler-horvath.at" title="Maler Horvath" target="_blank">maler-horvath.at</a>
					  </div>';
				}
		echo '</form>';
	echo '</div>';
}

/* Create Windspeed Converter Widget */
function paint_widget() {
	// Get saved options
    $options = get_option('wp_paint');
	$title = $options['title'];
	$link = $options['link'];
	
	// Display the Widget on the Website
	echo '<div id="paint_volume_calculator" class="paint_volume_calculator">';
		echo '<h3 class="widget-title">'.$title.'</h3>';
		echo '<form name="form_paint_volume_calculator" id="form_paint_volume_calculator">';
				echo '<div id="div_surface" class="field">
						<label>';_e( "Roomsize in m2", 'paint' ); echo '</label>
						<input type="text" name="surface" class="input_field" id="surface" maxlength="4" />
						<div class="clear"></div>
					  </div>';
				echo '<div id="div_doors" class="field">
						<label>';_e( "Number of doors", 'paint' ); echo '</label>
						<input type="text" name="doors" class="input_field" id="doors" maxlength="2" />
						<div class="clear"></div>
					  </div>';
				echo '<div id="div_windows" class="field">
						<label>';_e( "Number of windows", 'paint' ); echo '</label>
						<input type="text" name="windows" class="input_field" id="windows" maxlength="2" />
						<div class="clear"></div>
					  </div>';
				echo '<div id="div_ceiling" class="field">
						<label>';_e( "Ceiling", 'paint' ); echo '</label>
						<input type="checkbox" name="ceiling" class="input_field" id="ceiling" />
						<div class="clear"></div>
					  </div>';
				echo '<div id="result" class="field">
					  </div>';
				echo '<div id="div_calculate_button">
						<a name="calculate" class="input_field" id="calculate">';_e( "Calculate", 'paint' ); echo '</a>
					  </div>';
				echo '<div class="message"></div>';
				echo '<div class="clear"></div>';
				if($link) {
				echo '<div id="link">
						<a href="http://www.ostheimer.at" target="_blank" title="Ostheimer Wordpress Webdesign and SEO">Plugin by</a>&nbsp;<a href="http://www.maler-horvath.at" title="Maler Horvath" target="_blank">maler-horvath.at</a>
					  </div>';
				}
		echo '</form>';
	echo '</div>';
}

/* Create Windspeed Converter Widget Control */
function paint_widget_control() {
	
	 // Get saved options
      $options = get_option('wp_paint');
      
      // Handle user input
      if ($_POST["paint_submit"]) {
          // Define variables from the request
          $options['title'] = strip_tags(stripslashes($_POST["title"]));
		  $options['link'] = strip_tags(stripslashes($_POST["link"]));
          
          // Update the options to database
          update_option('wp_paint', $options);
      }
      
	  // Save options to variables
      $title = $options['title'];
	  $link = $options['link'];
	  
	  // Display the Widget-Control
	  echo '<div class="widget-content">';
	  echo '<p><label for="title">';_e( "Title", 'paint' ); echo ' <input  name="title" type="text" value="'.$title.'" /></label></p>';
	  if($link == 1) {
		   echo '<p><input type="checkbox" name="link" value="1" checked="checked" /><label> ';_e( "Show Link?", 'paint' ); echo '</label></p>';
	  } else {
		  echo '<p><input type="checkbox" name="link" value="1" /><label> ';_e( "Show Link?", 'paint' ); echo '</label></p>';
	  }
	  echo '<input type="hidden" id="paint_submit" name="paint_submit" value="1" />';
	  echo '</div>';
}