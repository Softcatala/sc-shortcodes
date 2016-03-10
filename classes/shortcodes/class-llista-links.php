<?php
/**
 * @package sc-shortcodes
 */

/**
 * Representa les llistes de dues columnes amb icones.
 */
class SC_Shortcodes_LinkList {

	/**
	 * Constructor del shortcode per a llistes.
	 *
	 * @param type $shortcodes_handler gestiona les URL.
	 */
	public function __construct( $shortcodes_handler = null ) {
		if ( $shortcodes_handler != null ) {
			$shortcodes_handler->add( 'llista-links' , array( $this, 'shortcode' ), true );
		}
	}

	/**
	 * Aplica el shortcode.
	 *
	 * @param array  $atts atributs del shortcode.
	 * @param string $content contingut intern del shortcode.
	 * @return string HTML renderitzat.
	 */
	function shortcode( $atts, $content ) {

		$items = preg_split( '/\R/', $content, -1, PREG_SPLIT_NO_EMPTY );

		$total_items = count( $items );

		$html = '<div class="row"><ul class="llista-check col-sm-6">';
		foreach ( $items as $key => $item ) {
			if ( $key == intval($total_items/2 + 1) ) {
				$html .= '</ul><ul class="llista-check col-sm-6">';
			}

			$values = explode( '|', $item );
			$html .= '<li><a href="'.$values[1].'"><i class="fa fa-check"></i><span>'.$values[0].'</span></a></li>';
		}
		$html .= '</ul></div>';

		return $html;
	}
}
