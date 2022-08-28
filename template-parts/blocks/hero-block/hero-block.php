<?php
/**
 * Hero block Template.
 *
 * @param array $block The block settings and attributes.
 * @param string $content The block inner HTML (empty).
 * @param bool $is_preview True during AJAX preview.
 * @param (int|string) $post_id The post ID this block is saved to.
 */

$background = get_field( 'background' );
$read_more = get_field( 'read_more' );

if ( $background ) {
    $style = 'data-src="' . get_media_url( $background[ 'ID' ], 'site_wide' ) . '"';
} else {
    $style = '';
}
?>

<div class="csc-block-hero-block csc-block bg-cover js-lazy <?php if ( get_field( 'stretch_on_handheld' ) ): ?>stretch-md<?php endif; ?> <?php if ( ! get_field( 'text' ) ): ?>no-text-col<?php endif; ?>" <?php echo $style; ?> data-an-type="single" data-an="<?php the_field( 'animation' ); ?>-in-from-bottom">
    <div class="block-content container narrow-2 flex">

        <div class="title-col">
            <?php if ( get_field( 'title' ) ): ?>
                <h2 class="title h1 small c-white"><?php the_field( 'title' ); ?></h2>
            <?php endif; ?>
        </div>

        <?php if ( get_field( 'text' ) ): ?>
            <div class="text-col">
                <div class="text editor c-white">
                    <?php the_field( 'text' ); ?>
                </div>

                <?php if ( $read_more[ 'title' ] && $read_more[ 'url' ] ): ?>
                    <a class="read-more" href="<?php echo $read_more[ 'url' ]; ?>">
                        <span class="ic ic-arrow-right"></span>
                        <?php echo $read_more[ 'title' ]; ?>
                    </a>
                <?php endif; ?>
            </div>
        <?php endif; ?>

    </div>
</div>