<?php
/**
 * Rectangle Template.
 *
 * @param array $block The block settings and attributes.
 * @param string $content The block inner HTML (empty).
 * @param bool $is_preview True during AJAX preview.
 * @param (int|string) $post_id The post ID this block is saved to.
 */
?>

<div class="csc-block-rectangle csc-block stretch-md" style="height: <?php the_field( 'height' ); ?>px; background: <?php the_field( 'color' ); ?>;"></div>