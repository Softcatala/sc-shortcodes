<?php
/**
 * @package sc-shortcodes
 */

/**
Plugin Name: SC Shortcodes
Plugin URI: https://github.com/Softcatala/sc-shortcodes
Description: Plugin tha allows creating shortcodes that are processed before the formatting functions. Based on http://betterwp.net/protect-shortcodes-from-wpautop-and-the-likes/
Version: 0.0.1
Author: Xavi Ivars
Author URI: http://www.softcatala.org

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 3
of the License, or any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
 */

include_once( 'classes/class-sc-shortcodes.php' );
include_once( 'classes/shortcodes/class-llista-icones.php' );
include_once( 'classes/shortcodes/class-llista-links.php' );

$sc_shortcode_handler = new SC_Shortcodes();

new SC_Shortcodes_IconList( $sc_shortcode_handler );
new SC_Shortcodes_LinkList( $sc_shortcode_handler );

$sc_shortcode_handler->setup();
