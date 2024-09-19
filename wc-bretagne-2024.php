<?php
/**
 * Plugin Name: WC Bretagne 2024
 * Plugin URI: https://test.fr
 * Description: Plugin pour le WC Bretagne 2024.
 * Version: 0.1
 * Requires at least: 6.1
 * Requires PHP: 8.0
 * Author: Nicolas JUEN
 * License: GPLv3+
 * Licence URI : https://www.gnu.org/licenses/gpl-3.0.html
 */


namespace WC\Bretagne_2024;
add_action( 'init', __NAMESPACE__.'\\wc_bretagne_bootstrap', 10, 0 );

function wc_bretagne_bootstrap() {
	register_block_type_from_metadata( __DIR__ . '/build/' );
}

add_filter( 'manage_posts_columns', __NAMESPACE__.'\\manage_columns' );
add_action(
	'manage_posts_custom_column',
	__NAMESPACE__.'\\manage_columns_data',
	10,
	2
);

function get_post_counter( \WP_Post $content ): int {
	return \str_word_count($content->post_content);
}

function get_post_reading_time( \WP_Post $content ): float {
	$word_count = get_post_counter($content);
	$reading_time = $word_count / get_option( 'wc_bretagne_wpm', 200 );
	return \ceil($reading_time);
}

function manage_columns( $columns = [] ): array {
	$columns['wc_bretagne']      = "Temps de lecture";

	return $columns;
}

function manage_columns_data( string $name, $id ): void {
	if ( ! in_array( $name, [ 'wc_bretagne' ] ) ) {
		return;
	}

	echo get_post_reading_time( get_post( $id ) ).' min';
}
