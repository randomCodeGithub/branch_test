<!-- Info bar -->
<div class="info-bar bg-black hide-md hide-sm hide-xs">
    <div class="container wide flex">

        <!-- Social networks -->
        <?php get_template_part( 'template-parts/social' ); ?>
        <!-- /Social networks -->

        <?php if ( $link = get_field( 'link_after_social', 'option' ) ): ?>
            <?php if ( $link['label'] && $link['url'] ): ?>
                <a class="link-after-social" href="<?php echo $link['url']; ?>"><?php echo $link['label']; ?></a>
            <?php endif; ?>
        <?php endif; ?>

        <!-- Contacts -->
        <div class="m-l-auto flex align-items-center">
            <?php
            get_template_part( 'template-parts/general/contacts' );
            language_switcher();
            ?>

            <?php if ( is_user_logged_in() && isset( $args['show_logout'] ) && $args['show_logout'] ): ?>
                <?php
                $user = new WP_User( get_current_user_id() );

                if ( $user && in_array( 'partner_confirmed', $user->roles ) ): ?>
                    <a class="p-smaller" href="<?php echo wp_logout_url( ( is_ssl() ? 'https://' : 'http://' ) . $_SERVER['HTTP_HOST'] . str_replace( ['?login=failed', '&login=failed'], '', $_SERVER['REQUEST_URI'] ) ); ?>"><?php _e( 'Logi välja' ); ?></a>
                <?php endif; ?>
            <?php endif; ?>
        </div>
        <!-- Contacts -->
    </div>
</div>
<!-- /Info bar -->