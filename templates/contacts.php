<?php

/**
 * Template Name: Contacts 
 * Template Post Type: post, page, service
 */

get_header();

?>
<div class="editor">
    <?php the_content(); ?>
</div>

<div class="contacts-additional container narrow-5">
    <div class="c-row-1 c-row">
        <div class="c-col">
            <div class="input-block mg-large">
                <p><?php the_field( 'address_line_1', 'option' ); ?></p>
                <p><?php the_field( 'address_line_2', 'option' ); ?></p>
            </div>
            <div class="input-block mg-large">
                <?php if ( $email3 = get_field( 'email_3', 'option' ) ): ?>
                    <p>
                        <a class="email-3" href="mailto:<?php echo $email3; ?>"><?php echo $email3; ?></a>
                    </p>
                <?php endif; ?>

                <?php if ( $phone3 = get_field( 'phone_3', 'option' ) ): ?>
                    <p>
                        <?php _e( 'Tālr.', 'default' ); ?>: <a class="phone-3" href="tel:<?php echo str_replace( ' ', '', $phone3 ); ?>"><?php echo $phone3; ?></a>
                    </p>
                <?php endif; ?>
            </div>
        </div>
        <div class="c-col">
            <div class="input-block mg-large">
                <?php if ( $email1 = get_field( 'email_1', 'option' ) ): ?>
                    <p>
                        <a class="email-1" href="mailto:<?php echo $email1; ?>"><?php echo $email1; ?></a>
                    </p>
                <?php endif; ?>

                <?php if ( $phone1 = get_field( 'phone_1', 'option' ) ): ?>
                    <p>
                        <?php _e( 'Tālr.', 'default'  ); ?>: <a class="phone-1" href="tel:<?php echo str_replace( ' ', '', $phone1 ); ?>"><?php echo $phone1; ?></a>
                    </p>
                <?php endif; ?>
            </div>
            <div class="input-block mg-large">
                <?php if ( $email2 = get_field( 'email_2', 'option' ) ): ?>
                    <p>
                        <a class="email-2" href="mailto:<?php echo $email2; ?>"><?php echo $email2; ?></a>
                    </p>
                <?php endif; ?>

                <?php if ( $phone2 = get_field( 'phone_2', 'option' ) ): ?>
                    <p>
                        <?php _e( 'Tālr.', 'default' ); ?>: <a class="phone-2" href="tel:<?php echo str_replace( ' ', '', $phone2 ); ?>"><?php echo $phone2; ?></a>
                    </p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php if ( get_field( 'latitude', 'option' ) && get_field( 'longitude', 'option' ) ): ?>
    <div class="map" data-lat="<?php the_field( 'latitude', 'option' ); ?>" data-lng="<?php the_field( 'longitude', 'option' ); ?>"></div>
<?php endif; ?>

<?php get_footer(); ?>