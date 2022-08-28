<?php
/**
 * Container Template.
 *
 * @param array $block The block settings and attributes.
 * @param string $content The block inner HTML (empty).
 * @param bool $is_preview True during AJAX preview.
 * @param (int|string) $post_id The post ID this block is saved to.
 */
?>
<?php if ( get_field( 'type' ) == 'start' ): ?>
    <div class="container <?php the_field( 'width' ); ?>">
<?php else: ?>
    </div>
<?php endif; ?>