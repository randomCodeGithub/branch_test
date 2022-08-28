<?php
/**
 * Info block Template.
 *
 * @param array $block The block settings and attributes.
 * @param string $content The block inner HTML (empty).
 * @param bool $is_preview True during AJAX preview.
 * @param (int|string) $post_id The post ID this block is saved to.
 */

$style = ( get_field( 'background_color' ) ) ? 'style="background-color: ' . get_field( 'background_color' ) . '"' : '';
$image_position = get_field( 'image_position' );

$class = 'mg-' . get_field( 'block_margin' );
$class .= ' ';

$class .= ( ! get_field( 'image' ) ) ? 'no-image' : '';
$class .= ' ';

$class .= ( $style ) ? 'image-pos-' . $image_position : '';
$class .= ' ';

$class .= ( get_field( 'stretch_on_handheld' ) ) ? 'stretch-on-handheld' : '';
$class .= ' ';

$class .= ( ! get_field( 'background_color' ) ) ? 'no-bg' : '';
$class .= ' ';
?>

<div class="csc-block-info-block csc-block <?php echo $class; ?>" <?php echo $style; ?> data-an-type="single" data-an="slide-in-from-bottom">

    <?php
    if ( $image_position == 'top' ) {
        get_template_part( 'template-parts/blocks/info-block/image' );
    }
    ?>

    <div class="inner">
        <h3 class="title mg-<?php the_field( 'title_margin' ); ?> h2"><?php the_field( 'title' ); ?></h3>

        <div class="text mg-<?php the_field( 'text_margin' ); ?> editor">
            <?php the_field( 'text' ); ?>
        </div>

        <?php if ( have_rows( 'list' ) ): ?>
            <ul class="ul">
                <?php while ( have_rows( 'list' ) ): the_row(); ?>
                    <li>
                        <?php if ( get_sub_field( 'url' ) ): ?>
                            <a href="<?php the_sub_field( 'url' ); ?>"><?php the_sub_field( 'text' ); ?></a>
                        <?php
                        else:
                            the_sub_field( 'text' );
                        endif;
                        ?>
                    </li>
                <?php endwhile; ?>
            </ul>
        <?php endif; ?>
    </div>

    <?php
    if ( $image_position == 'bottom' ) {
        get_template_part( 'template-parts/blocks/info-block/image' );
    }
    ?>

</div>