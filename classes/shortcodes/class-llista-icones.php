<?php
/**
 * @package sc-shortcodes
 */

/**
 * Representa les llistes de dues columnes amb icones.
 */
class SC_Shortcodes_IconList {

	/**
	 * Constructor del shortcode per a llistes.
	 *
	 * @param type $shortcodes_handler gestiona les URL.
	 */
	public function __construct( $shortcodes_handler = null ) {
		if ( $shortcodes_handler != null ) {
			$shortcodes_handler->add( 'llista-icones' , array( $this, 'shortcode' ), true );
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
		$atributs = shortcode_atts( array(
			'color' => 'blanc',
		), $atts );

		if ( empty( $content ) ) {
			return $content;
		}

		$itemCss = $this->get_item_css_class( $atributs['color'] );
		$columnCss = $this->get_column_css_class( $atributs['color'] );

		$html = '<div class="row">';

		$items = preg_split( '/\R/', $content, -1, PREG_SPLIT_NO_EMPTY );

		$columns = $this->get_icon_list_columns( $items, $itemCss );

		$html .= '<div class="' . $columnCss . ' col-sm-6">' . $columns[0] . '</div>';
		$html .= '<div class="' . $columnCss .' col-sm-6">' . $columns[1] . '</div>';
		$html .= '</div>';

		return $html;
	}

	/**
	 * Genera les classes CSS adequades al paràmetre per a cada columna.
	 *
	 * @param string $color color del shortcode.
	 * @param string $default classe per defecte.
	 */
	private function get_column_css_class( $color, $default = '' ) {

		switch ( $color ) {
			case 'blancgris':
				return 'col-xs-12';
			default:
				return $default;
		}
	}

	/**
	 * Genera les classes CSS adequades al paràmetre per a cada element.
	 *
	 * @param string $color color del shortcode.
	 * @param string $default classe per defecte.
	 */
	private function get_item_css_class( $color, $default = 'thumbnail-blanc' ) {

		switch ( $color ) {
			case 'gris':
				return 'thumbnail-gris';
			case 'blanc':
				return 'thumbnail-blanc';
			case 'blancgris':
				return 'thumbnail-blanc thumbnail-invers';
			default:
				return $default;
		}
	}

	/**
	 * Genera l'HTML de totes les cel·les de la llista.
	 *
	 * @param array  $items elementss de la llista.
	 * @param string $css classe CSS per a cada element.
	 * @return type HTML renderitzat.
	 */
	private function get_icon_list_columns( $items, $css ) {
		$column0 = '';
		$column1 = '';
		$total_items = 0;

		foreach ( $items as $item ) {
			$item_html = $this->get_icon_list_item( $item, $css );

			( $total_items % 2 == 0 ) ? $column0 .= $item_html : $column1 .= $item_html;

			$total_items++;
		}

		return array( $column0, $column1 );
	}

	/**
	 * Genera l'HTML d'un elemenent de la llista.
	 *
	 * @param string $item cadena de text representant totes les parts d'un element.
	 * @param string $css classe CSS per a mostrar el color de la cel·la.
	 * @return string HTML renderitzat per a un element de la llista.
	 */
	private function get_icon_list_item( $item, $css ) {
		$parts = explode( '|', $item );

		if ( $this->validate( $parts ) ) {
			$icon = $this->get_icon( $parts[0] );
			$heading = $this->get_heading( $parts[1] );
			$body = $this->get_body( $parts[2] );

			$html = '<div class="thumbnail ' . $css . '">';

			$html .= '<i class="fa fa-' . $icon . '"></i>';

			$html .= '<div class="caption">';

			if ( ! empty( $heading ) ) {
				$html .= '<h3>' . $heading . '</h3>';
			}

			if ( ! empty( $body ) ) {
				$html .= '<p>' . $body . '</p>';
			}

			$html .= '</div>';

			$html .= '</div>';

		}
		else {
			$html = '<div class="bg-danger">';
			$html .= 'L\'element de la llista no conté 3 parts';
			$html .= '<pre>' . $item . '</pre>';
			$html .= '</div>';
		}//end if
		return $html;
	}

	/**
	 * Comprova si els elements tenen la forma adequada
	 *
	 * @param array $elements Elements a validar.
	 */
	private function validate( $elements ) {
		return is_array( $elements ) && count( $elements ) == 3;
	}

	/**
	 * Generate defaults icon
	 *
	 * @param string $icon icona a utilitzar.
	 * @return string
	 */
	private function get_icon( $icon ) {
		return ( isset( $icon ) && ! empty( $icon )) ? $icon : 'circle';
	}

	/**
	 * Generate defaults heading
	 *
	 * @param string $heading capçalera a utilitzar.
	 * @return string
	 */
	private function get_heading( $heading ) {
		return ( isset( $heading ) && ! empty( $heading )) ? $heading : '';
	}

	/**
	 * Generate defaults body
	 *
	 * @param string $body cos a utilitzar.
	 * @return string
	 */
	private function get_body( $body ) {
		return ( isset( $body ) && ! empty( $body )) ? $body : '';
	}
}
