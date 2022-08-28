<?php
/**
 * Content slider Template.
 *
 * @param array $block The block settings and attributes.
 * @param string $content The block inner HTML (empty).
 * @param bool $is_preview True during AJAX preview.
 * @param (int|string) $post_id The post ID this block is saved to.
 */
?>

<div class="csc-block-content-slider csc-block stretch-md">
    <?php if ( have_rows( 'slider' ) ): ?>
        <ul class="content-slider">
            <?php
            while ( have_rows( 'slider' ) ) {
                the_row();

                get_template_part( 'template-parts/blocks/content-slider/slide' );
            }
            ?>
        </ul>
    <?php
    else:
        get_template_part( 'template-parts/blocks/no-content' );
    endif;
    ?>
</div>