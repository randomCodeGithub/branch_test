<?php

if ( is_admin() ) return;

if ( have_rows( 'columns' ) ): ?>
    <?php $width = get_field( 'column_width' ); ?>

    <div class="c-info-columns row" data-same-height="c-info-columns__title">
        <?php $i = 0; while ( have_rows( 'columns' ) ): the_row(); ?>
            <div class="c-info-columns__item col-lg-<?php echo $width; ?> col-md-6">
                <?php if ( get_sub_field( 'title' ) ): ?>
                    <h3 class="c-info-columns__title h3"><?php the_sub_field( 'title' ); ?></h3>
                <?php endif; ?>

                <?php if ( get_sub_field( 'text' ) ): ?>
                    <div class="c-info-columns__desc editor">
                        <?php the_sub_field( 'text' ); ?>
                    </div>
                <?php endif; ?>

                <?php
                $button = get_sub_field( 'button' );

                if ( $button['title'] && $button['url'] ): ?>
                    <div class="c-info-columns__btn-wrap">
                        <?php if ( strpos($button['url'], '#request-form') !== false && get_field( 'request_form', 'option' ) ): ?>
                            <?php $cf = get_field( 'request_form', 'option' ); ?>

                            <button class="btn btn-default size-3" data-fancybox data-src="#<?php echo $block[ 'id' ] . $i; ?>"><?php echo $button['title']; ?></button>

                            <div class="hide">
                                <div id="<?php echo $block[ 'id' ] . $i; ?>">
                                    <?php echo do_shortcode( '[contact-form-7 id="' . $cf->ID . '" module-title="' . preg_replace( '/( )+/', ' ', strip_tags( get_sub_field( 'title' ) ) ) . '" page-link="' . get_permalink( $post_id ) . '"]' ); ?>
                                </div>
                            </div>
                        <?php else: ?>
                            <a class="btn btn-default size-3" href="<?php echo $button['url']; ?>"><?php echo $button['title']; ?></a>
                        <?php endif; ?>                        
                    </div>
                <?php endif; ?>
            </div>
        <?php $i++; endwhile; ?>
    </div>
<?php endif; ?>