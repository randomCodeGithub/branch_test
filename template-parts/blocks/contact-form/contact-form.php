<?php

/**

 * Contact form Template.

 *

 * @param array $block The block settings and attributes.

 * @param string $content The block inner HTML (empty).

 * @param bool $is_preview True during AJAX preview.

 * @param (int|string) $post_id The post ID this block is saved to.

 */

?>



<div class="csc-block-contact-form csc-block">



    <?php if ( get_field( 'title' ) ): ?>

        <h3 class="title <?php the_field( 'title_style' ); ?> text-<?php the_field( 'title_position' ); ?>"><?php the_field( 'title' ); ?></h3>

    <?php endif; ?>



    <?php if ( $form = get_field( 'form' ) ): ?>


            <?php echo do_shortcode( '[contact-form-7 id="' . $form->ID . '"]' ); ?>


    <?php endif; ?>



</div>