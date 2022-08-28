<div class="post-equipment-wrap col-lg-3 col-sm-6">
    <div class="post-equipment">
        <!-- Image -->
        <?php if ( has_post_thumbnail() ): ?>
            <figure class="image">
                <?php pandago_img( get_post_thumbnail_id(), 'equipment_thumb' ); ?>
            </figure>
        <?php endif; ?>
        <!-- /Image -->

        <h3 class="title p-smaller bold"><?php the_title(); ?></h3>

        <!-- Payment price -->
        <?php if ( get_field( 'payment_price' ) ): ?>
            <div class="payment-price">
                <span class="price h3">€ <?php the_field( 'payment_price' ); ?></span>

                <?php if ( get_field( 'payment_price_period' ) ): ?>
                    <span class="period p-smaller">/<?php the_field( 'payment_price_period' ); ?></span>
                <?php endif; ?>

            </div>
        <?php endif; ?>
        <!-- /Payment price -->

        <?php if ( get_field( 'request_form', 'option' ) ): ?>
            <div class="btn-wrap">
                <a class="btn btn-alt size-1" href="<?php the_permalink(); ?>"><?php _e( 'Uzzināt vairāk', 'default' ); ?></a>
                <button class="btn btn-default size-1" data-fancybox data-src="#eq<?php echo get_the_ID(); ?>"><?php _e( 'Pieteikties', 'default' ); ?></a>
            </div>
        <?php endif; ?>

        <!-- Full price -->
        <?php if ( get_field( 'price' ) ): ?>
            <div class="full-price p-smaller">
                <span><?php _e( 'Pilna cena', TD ); ?>:</span>
                <span>€ <?php the_field( 'price' ); ?>
            </div>
        <?php endif; ?>
        <!-- /Full price -->

        <?php if ( $cf = get_field( 'request_form', 'option' ) ): ?>
            <?php
            $terms = get_the_terms( get_the_ID(), 'equipment_category' );
            
            if ( ! is_wp_error( $terms ) && $terms ) {
                $last_term = end( $terms );

                $link = get_term_link( $last_term->term_id );
            } else {
                $link = get_permalink();
            }
            ?>
            <div class="hide">
                <div id="eq<?php echo get_the_ID(); ?>">
                    <?php echo do_shortcode( '[contact-form-7 id="' . $cf->ID . '" module-title="' . get_the_title() . '" page-link="' . $link . '"]' ); ?>
                </div>
            </div>
        <?php endif; ?>

    </div>
</div>