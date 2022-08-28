<?php
/**
 * Price request Template.
 *
 * @param array $block The block settings and attributes.
 * @param string $content The block inner HTML (empty).
 * @param bool $is_preview True during AJAX preview.
 * @param (int|string) $post_id The post ID this block is saved to.
 */
?>

<div class="csc-block-price-request mg-md-<?php the_field( 'handheld_margin' ); ?> csc-block stretch-md" data-an-type="single" data-an="fade-in-from-bottom">

    <div class="inner">
        <?php if ( get_field( 'title' ) ): ?>
            <p class="title mg-<?php the_field( 'title_margin' ); ?>"><?php the_field( 'title' ); ?></p>
        <?php endif; ?>

        <?php if ( get_field( 'sub_title' ) ): ?>
            <p class="sub-title p-smaller"><?php the_field( 'sub_title' ); ?></p>
        <?php endif; ?>

        <?php if ( get_field( 'price' ) ): ?>
            <div class="price-wrap">

                <span class="price h3">€ <?php the_field( 'price' ); ?></span>

                <?php if ( get_field( 'price_period' ) ): ?>
                    <span class="period p-smaller">/<?php the_field( 'price_period' ); ?></span>
                <?php endif; ?>

            </div>
        <?php endif; ?>

        <?php if ( get_field( 'price_additional' ) ): ?>
            <p class="price-additional p-smaller"><?php the_field( 'price_additional' ); ?></p>
        <?php endif; ?>

        <?php if ( have_rows( 'list' ) ): ?>
            <ul class="list">
                <?php while ( have_rows( 'list' ) ): the_row(); ?>
                    <li><?php the_sub_field( 'text' ); ?></li>
                <?php endwhile; ?>
            </ul>
        <?php endif; ?>

        <?php $btn_add = get_field( 'additional_button' ); ?>

        <div class="buttons <?php if ( $btn_add[ 'text' ] && $btn_add[ 'url' ] ): ?>multiple-buttons<?php endif; ?>">
            <?php if ( $btn_add[ 'text' ] && $btn_add[ 'url' ] ): ?>
                <div class="btn-wrap">
                    <a class="btn btn-alt <?php the_field( 'button_size' ); ?>" href="<?php echo $btn_add[ 'url' ]; ?>"><?php echo $btn_add[ 'text' ]; ?></a>
                </div>
            <?php endif; ?>

            <?php if ( get_field( 'request_form', 'option' ) ): ?>
                <div class="btn-wrap">
                    <button class="btn btn-default <?php the_field( 'button_size' ); ?>" data-fancybox data-src="#<?php echo $block[ 'id' ]; ?>">
                        <?php
                        if ( ICL_LANGUAGE_CODE == 'ru' ) {
                            echo 'Отправить запрос';
                        } else {
                            _e( 'Pieprasīt', 'default' );
                        }
                        ?>
                    </button>
                </div>
            <?php endif; ?>
        </div>

        <?php if ( get_field( 'info' ) ): ?>
            <div class="info p-xtra-small">
                <?php the_field( 'info' ); ?>
            </div>
        <?php endif; ?>

        <?php if ( $cf = get_field( 'request_form', 'option' ) ): ?>
            <div class="hide">
                <div id="<?php echo $block[ 'id' ]; ?>">
                    <?php echo do_shortcode( '[contact-form-7 id="' . $cf->ID . '" module-title="' . get_field( 'title' ) . '" page-link="' . get_permalink( $post_id ) . '"]' ); ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>