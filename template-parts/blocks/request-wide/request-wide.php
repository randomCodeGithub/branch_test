<?php

if ( is_admin() ) return;

if ( get_field( 'request_form', 'option' ) && get_field( 'title' ) ): ?>
    <div class="c-request-wide flex justify-content-between">
        <div class="c-request-wide__col-1">
            <p class="c-request-wide__title"><?php the_field( 'title' ); ?></p>

            <?php if ( get_field( 'text' ) ): ?>
                <p class="c-request-wide__text"><?php the_field( 'text' ); ?></p>
            <?php endif; ?>
        </div>

        <?php
        $button = get_field( 'button' );

        if ( $button['title'] && $button['url'] ): ?>
            <div class="c-request-wide__col-2 text-right">
                <?php if ( strpos($button['url'], '#request-form') !== false && get_field( 'request_form', 'option' ) ): ?>
                    <?php $cf = get_field( 'request_form', 'option' ); ?>

                    <button class="btn btn-default" data-fancybox data-src="#<?php echo $block[ 'id' ] . $i; ?>"><?php echo $button['title']; ?></button>

                    <div class="hide">
                        <div id="<?php echo $block[ 'id' ] . $i; ?>">
                            <?php echo do_shortcode( '[contact-form-7 id="' . $cf->ID . '" module-title="' . preg_replace( '/( )+/', ' ', strip_tags( get_field( 'title' ) ) ) . '" page-link="' . get_permalink( $post_id ) . '"]' ); ?>
                        </div>
                    </div>
                <?php else: ?>
                    <a class="btn btn-default" href="<?php echo $button['url']; ?>"><?php echo $button['title']; ?></a>
                <?php endif; ?>                        
            </div>
        <?php endif; ?>
    </div>
<?php endif; ?>