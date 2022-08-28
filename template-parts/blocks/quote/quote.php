<?php
/**
 * Quote Template.
 *
 * @param array $block The block settings and attributes.
 * @param string $content The block inner HTML (empty).
 * @param bool $is_preview True during AJAX preview.
 * @param (int|string) $post_id The post ID this block is saved to.
 */
?>

<div class="csc-block-quote csc-block" data-an-type="single" data-an="fade-in-from-bottom">
    <p class="quote"><?php the_field( 'quote' ); ?></p>
</div>