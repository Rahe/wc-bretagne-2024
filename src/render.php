<?php
/**
 * @var array{prefix: string, suffix: string, content: string} $attributes
 */
?>
<div <?php echo get_block_wrapper_attributes( [ 'class' => "wc-bretagne-2024-container" ] ) ?>>
	<?php if ( ! empty( $attributes['prefix'] ) ) : ?>
		<span class="wc-bretagne-prefix"><?php echo esc_html( $attributes['prefix'] ); ?></span>
	<?php endif; ?>
	<p><?php echo wp_kses_post( $attributes['content'] ); ?></p>
	<?php if ( ! empty( $attributes['suffix'] ) ) : ?>
		<span class="wc-bretagne-suffix"><?php echo esc_html( $attributes['suffix'] ); ?></span>
	<?php endif; ?>
</div>