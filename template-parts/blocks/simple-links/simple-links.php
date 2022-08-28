<?php
/**
 * Simple links Template.
 *
 * @param array $block The block settings and attributes.
 * @param string $content The block inner HTML (empty).
 * @param bool $is_preview True during AJAX preview.
 * @param (int|string) $post_id The post ID this block is saved to.
 */
?>

<div class="csc-block-simple-links csc-block">
    <?php if ( have_rows( 'links' ) ): ?>
        <ul class="links flex" data-an-type="single" data-an="slide-in-from-bottom">
            <?php
            while ( have_rows( 'links' ) ) {
                the_row();

                get_template_part( 'template-parts/blocks/simple-links/link' );
            }
            ?>
        </ul>
    <?php
    else:
        get_template_part( 'template-parts/blocks/no-content' );
    endif;
    ?>
</div>