<?php
/**
 * Spacer Template.
 *
 * @param array $block The block settings and attributes.
 * @param string $content The block inner HTML (empty).
 * @param bool $is_preview True during AJAX preview.
 * @param (int|string) $post_id The post ID this block is saved to.
 */
?>

<div class="csc-block-spacer csc-block" id="spacer-<?php echo $block[ 'id' ]; ?>">
    <style>
        #spacer-<?php echo $block[ 'id' ]; ?> {
            height: <?php the_field( 'height' ); ?>px;
        }

        <?php if ( get_field( 'height_tablet' ) || get_field( 'height_tablet' ) == '0' ): ?>
            @media( max-width: 1099px ) {
                #spacer-<?php echo $block[ 'id' ]; ?> {
                    height: <?php the_field( 'height_tablet' ); ?>px;
                }
            }
        <?php endif; ?>

        <?php if ( get_field( 'height_mobile' ) || get_field( 'height_mobile' ) == '0' ): ?>
            @media( max-width: 767px ) {
                #spacer-<?php echo $block[ 'id' ]; ?> {
                    height: <?php the_field( 'height_mobile' ); ?>px;
                }
            }
        <?php endif; ?>
    </style>
</div>