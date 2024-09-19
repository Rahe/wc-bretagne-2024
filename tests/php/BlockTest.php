<?php
namespace WC\Bretagne_2024\Tests;
use function WC\Bretagne_2024\wc_bretagne_bootstrap;

class BlockTest extends \WP_UnitTestCase_Base {

	public static function wpSetUpBeforeClass(): void {
		wc_bretagne_bootstrap();
	}

	public function test_block_no_prefix_suffix(): void {
		$block = render_block( [
			'blockName' =>'wc-bretagne-2024/demo',
			'attrs' => ['content'=> "Mon contenu"],
			'innerHTML' => '',
			'innerBlocks' => [],
			'innerContent' => [],
		] );

		$this->assertStringContainsString( 'Mon contenu', $block );
		$this->assertStringNotContainsString( 'wc-bretagne-prefix', $block );
		$this->assertStringNotContainsString( 'wc-bretagne-suffix', $block );
	}

	public function test_block_no_prefix_with_suffix(): void {
		$block = render_block( [
			'blockName' =>'wc-bretagne-2024/demo',
			'attrs' => ['content'=> "Mon contenu", 'suffix' => 'CONTENU suffix'],
			'innerHTML' => '',
			'innerBlocks' => [],
			'innerContent' => [],
		] );

		$this->assertStringContainsString( 'Mon contenu', $block );
		$this->assertStringContainsString( 'wc-bretagne-suffix', $block );
		$this->assertStringContainsString( 'CONTENU suffix', $block );
		$this->assertStringNotContainsString( 'wc-bretagne-prefix', $block );
	}

	public function test_block_prefix_no_suffix(): void {
		$block = render_block( [
			'blockName' =>'wc-bretagne-2024/demo',
			'attrs' => ['content'=> "Mon contenu", 'prefix' => 'CONTENU prefix'],
			'innerHTML' => '',
			'innerBlocks' => [],
			'innerContent' => [],
		] );

		$this->assertStringContainsString( 'Mon contenu', $block );
		$this->assertStringContainsString( 'wc-bretagne-prefix', $block );
		$this->assertStringContainsString( 'CONTENU prefix', $block );
		$this->assertStringNotContainsString( 'wc-bretagne-suffix', $block );
	}

	public function test_block_prefix_and_suffix(): void {
		$block = render_block( [
			'blockName' =>'wc-bretagne-2024/demo',
			'attrs' => ['content'=> "Mon contenu", 'prefix' => 'CONTENU prefix', 'suffix' => 'CONTENU suffix'],
			'innerHTML' => '',
			'innerBlocks' => [],
			'innerContent' => [],
		] );

		$this->assertStringContainsString( 'Mon contenu', $block );
		$this->assertStringContainsString( 'wc-bretagne-prefix', $block );
		$this->assertStringContainsString( 'wc-bretagne-suffix', $block );
		$this->assertStringContainsString( 'CONTENU prefix', $block );
		$this->assertStringContainsString( 'CONTENU suffix', $block );
	}
}
