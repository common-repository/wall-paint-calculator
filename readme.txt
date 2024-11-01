=== Wordpress Wall Paint Calculator by Ostheimer ===
Contributors: helpstring
Tags: Wall Paint Calculator, calculator, paint, color, wallpaint, paint calculator, paint volume
Requires at least: 3.0
Tested up to: 5.1
Stable tag: 1.2

This Plugin gives you the possibility to insert a wall paint calculator via widget or shortcode into your site.

== Description ==

The user has to write the roomsize in square meters, the number of doors and the number of windows and the widget calculates the needed paint in kilograms.

#### Shortcode
* You can add the Wall Paint Calculator via shortcode [wall_paint_calculator]
* If you want to show our backlink use the shortcode [wall_paint_calculator link="true"]
* To change the title of the widget use the shortcode [wall_paint_calculator link="true" title="YOUR TITLE"]

#### Widget
* Just insert the widget in the chosen sidebar, type a title and activate the wanted options

#### Translate jQuery Messages
1. Open the file wall-paint-calculator.php and search for wp_localize_script
2. In this function you will find an array with 1 defined string
3. Translate the strings after the => into your language and save the file
4. To change the result string open the file wall-paint-calculator.js and change the strings on line 59

#### Try the demo
* See the [Wall Paint Calculator site](http://www.ostheimer.at/leistungen-preise/wordpress/plugins/wall-paint-calculator/ "Wall Paint Calculator site") on the official plugin site.

== Installation ==

1. Upload  "wall-paint-calculator" folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Add the Wall Paint Calculator to your widget enabled space
4. If you need insert in article please use short tag [wall_paint_calculator]

== Screenshots ==

1. Wall Paint Calculator Frontend Widget
2. Wall Paint Calculator Backend Widget Control

== Frequently Asked Questions ==

= How can I display the Windspeed Converter on the Frontend? =

You can add the shortcode [wall_paint_calculator] in a post or page so that the Wall Paint Calculator will be diplayed in that page.

= How can I translate the jQuery Error Messages? =

1. Upload  "wall-paint-calculator" folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Add the Wall Paint Calculator to your widget enabled space
4. If you need insert in article please use short tag [wall_paint_calculator]

== Changelog ==

= 1.2 =
* Design change

= 1.1 =
* Testet Up 5.1

= 1.0.0 =
* Initial Release

