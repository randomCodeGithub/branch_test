<?php
/**
 * Features Table Template.
 *
 * @param array $block The block settings and attributes.
 * @param string $content The block inner HTML (empty).
 * @param bool $is_preview True during AJAX preview.
 * @param (int|string) $post_id The post ID this block is saved to.
 */

$columns = get_field( 'columns' );
$features = get_field( 'features' );
?>

<?php if ( have_rows( 'columns' ) && have_rows( 'features' ) ): ?>
    <div class="csc-block-features-table csc-block stretch-md">
        <div class="f-row">

            <div class="col-features" data-an-type="single" data-an="slide-in-from-bottom">
                <p class="features-title quote">Features:</p>
                <div class="features-list">
                    <?php foreach ( $features as $feature ): ?>
                        <div class="feature-wrap">
                            <div class="feature"><?php echo $feature[ 'name' ]; ?></div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="col-checklists">
                <div class="f-row" data-an-type="sequence" data-an>
                    <?php foreach ( $columns as $i => $column ): ?>
                        <div class="col-check" data-an="slide-in-from-bottom">
                            <div class="header">

                                <?php if ( $column[ 'title' ] ): ?>
                                    <p class="title h4"><?php echo $column[ 'title' ]; ?></p>
                                <?php endif; ?>

                                <div class="price-wrap">
                                    <?php if ( $column[ 'price' ] ): ?>
                                        <span class="price h3">€ <?php echo $column[ 'price' ]; ?></span>
                                    <?php endif; ?>

                                    <?php if ( $column[ 'price_period' ] ): ?>
                                        <span class="period p-smaller">/<?php echo $column[ 'price_period' ]; ?></span>
                                    <?php endif; ?>
                                </div>

                                <button class="btn btn-default size-2" data-fancybox data-src="#<?php echo $block[ 'id' ] . $i; ?>"><?php _e( 'Pieprasīt', 'default' ); ?></button>

                                <?php if ( $cf = get_field( 'request_form', 'option' ) ): ?>
                                    <div class="hide">
                                        <div id="<?php echo $block[ 'id' ] . $i; ?>">
                                            <?php echo do_shortcode( '[contact-form-7 id="' . $cf->ID . '" module-title="' . $column[ 'title' ] . '" page-link="' . get_permalink( $post_id ) . '"]' ); ?>
                                        </div>
                                    </div>
                                <?php endif; ?>

                            </div>
                            <div class="checklist">
                                <?php foreach ( $features as $feature ): ?>
                                    <div class="checklist-row  table-row">
                                        <p class="text-center hide-xl hide-lg"><?php echo $feature[ 'name' ]; ?></p>
                                        <div class="ind <?php if ( ! $feature[ 'checklist' ][ $i ][ 'checked' ] ): ?>empty<?php endif; ?>">
                                            <span class="icon ic <?php echo ( $feature[ 'checklist' ][ $i ][ 'checked' ] ) ? 'ic-checkmark' : 'ic-minus'; ?>"></span>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <div class="header hide-xl hide-lg">

                                <?php if ( $column[ 'title' ] ): ?>
                                    <p class="title h4"><?php echo $column[ 'title' ]; ?></p>
                                <?php endif; ?>

                                <div class="price-wrap">
                                    <?php if ( $column[ 'price' ] ): ?>
                                        <span class="price h3">€ <?php echo $column[ 'price' ]; ?></span>
                                    <?php endif; ?>

                                    <?php if ( $column[ 'price_period' ] ): ?>
                                        <span class="period p-smaller">/<?php echo $column[ 'price_period' ]; ?></span>
                                    <?php endif; ?>
                                </div>

                                <button class="btn btn-default size-2" data-fancybox data-src="#<?php echo $block[ 'id' ] . $i; ?>"><?php _e( 'Pieprasīt', 'default' ); ?></button>

                                <?php if ( $cf = get_field( 'request_form', 'option' ) ): ?>
                                    <div class="hide">
                                        <div id="<?php echo $block[ 'id' ] . $i; ?>">
                                            <?php echo do_shortcode( '[contact-form-7 id="' . $cf->ID . '" module-title="' . $column[ 'title' ] . '" page-link="' . get_permalink( $post_id ) . '"]' ); ?>
                                        </div>
                                    </div>
                                <?php endif; ?>

                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

        </div>
    </div>
<?php endif; ?>