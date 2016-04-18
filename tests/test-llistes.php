<?php

class TestLlistes extends PHPUnit_Framework_TestCase {

	var $thumbnail_blanc = 'thumbnail-blanc';
	var $thumbnail_gris = 'thumbnail-gris';

	function test_empty_content_returns_empty() {

		$blanc = 'blanc';

		$llistes = new SC_Shortcodes_IconList();

		$resultat = $llistes->shortcode( array( 'color' => $blanc ), '' );

		$this->assertEquals( '', $resultat );
	}

	function test_malformed_content_returns_error() {

		$llistes = new SC_Shortcodes_IconList();

		$resultat = $llistes->shortcode( array(), 'a|b' );

		$this->assertContains( 'bg-danger', $resultat );
	}

	function test_color_blanc_returns_blanc() {

		$color = 'blanc';

		$llistes = new SC_Shortcodes_IconList();

		$resultat = $llistes->shortcode( array( 'color' => $color ), 'a|b|c' );

		$this->assertContains( $this->thumbnail_blanc, $resultat );
	}

	function test_color_gris_returns_gris() {

		$color = 'gris';

		$llistes = new SC_Shortcodes_IconList();

		$resultat = $llistes->shortcode( array( 'color' => $color ), 'a|b|c' );

		$this->assertContains( $this->thumbnail_gris, $resultat );
	}

	function test_color_incorrecte_returns_blanc() {

		$color = 'roig';

		$llistes = new SC_Shortcodes_IconList();

		$resultat = $llistes->shortcode( array( 'color' => $color ), 'a|b|c' );

		$this->assertContains( $this->thumbnail_blanc, $resultat );
	}

	function test_2_contingut_genera_elements() {

		$element = 'class="thumbnail';

		$llistes = new SC_Shortcodes_IconList();

		$resultat = $llistes->shortcode( array(), "a|b|c\na|b|c" );

		$elementsFound = substr_count( $resultat, $element );

		$this->assertEquals( 2, $elementsFound );
	}
}

