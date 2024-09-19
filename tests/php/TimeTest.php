<?php
namespace WC\Bretagne_2024\Tests;

use function WC\Bretagne_2024\get_post_counter;
use function WC\Bretagne_2024\get_post_reading_time;

class TimeTest extends \WP_UnitTestCase_Base {
	public function test_get_post_counter(): void {
		// Créer un post
		$post_id = self::factory()->post->create( [ 'post_content' => 'Hello World' ] );
		// Récupérer le post
		$post = get_post( $post_id );
		// Vérifier que le nombre de mots est bien de 2
		$this->assertEquals( 2, get_post_counter( $post ) );
	}

	public function test_reading_time(): void {
		// Créer un post
		$post_id = self::factory()->post->create( [ 'post_content' => 'Hello World' ] );
		// Récupérer le post
		$post = get_post( $post_id );
		// Vérifier que le nombre de mots est bien de 2
		$this->assertEquals( 1, get_post_reading_time( $post ) );
	}

	public function test_reading_time_with_reading_speed(): void {
		// Créer un post
		$post_id = self::factory()->post->create( [ 'post_content' => 'Hello World World World World World World World World World World' ] );
		// Récupérer le post
		$post = get_post( $post_id );

		update_option( 'wc_bretagne_wpm', 1 );
		// Vérifier que le nombre de mots est bien de 11
		$this->assertEquals( 11, get_post_reading_time( $post ) );
	}

}
