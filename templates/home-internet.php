<?php
/**
 * Template Name: Home Internet
 */

get_header(); ?>

<?php $post_id = get_the_ID(); ?>

<div class="new-design container narrow-6">
    <h1 class="page-title h1 small"><?php the_title(); ?></h1>

    <div class="page-content-editor editor">
        <?php the_content(); ?>
    </div>

    <?php if ( have_rows( 'internet_packs', 'option' ) ): ?>
        <div class="internet-packs relative">
            <div class="internet-packs__inner">
                <figure class="internet-packs__decor"></figure>

                <div class="on-top">
                    <div class="row gutters-sm">
                        <?php $i = 0; while ( have_rows( 'internet_packs', 'option' ) ): the_row(); ?>
                            <div class="ip-wrap col-lg-4 col-6">
                                <article class="ip">
                                    <?php if ( get_sub_field( 'name' ) ): ?>
                                        <p class="ip__name"><?php the_sub_field( 'name' ); ?></p>
                                    <?php endif; ?>

                                    <?php if ( get_sub_field( 'price' ) ): ?>
                                        <div class="ip__price">
                                            <p class="ip__price-1">€ <?php the_sub_field( 'price' ); ?></p>
                                            <p class="ip__price-2"><?php _e( '/месяц', 'csc-telecom' ); ?></p>
                                        </div>
                                    <?php endif; ?>

                                    <?php if ( get_sub_field( 'speed' ) && get_sub_field( 'speed_label' ) ): ?>
                                        <p class="ip__speed"><?php the_sub_field( 'speed' ); ?> <?php the_sub_field( 'speed_label' ); ?></p>
                                    <?php endif; ?>

                                    <button class="ip__btn btn btn-alt full-width" data-fancybox data-src="#internet-package-<?php echo $i; ?>"><?php _e( 'запросить', 'csc-telecom' ); ?></button>

                                    <?php if ( $cf = get_field( 'request_form_ext', 'option' ) ): ?>
                                        <div class="hide">
                                            <div id="internet-package-<?php echo $i; ?>">
                                                <?php echo do_shortcode( '[contact-form-7 id="' . $cf->ID . '" module-title="' . get_sub_field( 'name' ) . '" page-link="' . get_permalink( $post_id ) . '" internet-pack="' . get_sub_field( 'name' ) . '"]' ); ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </article>
                            </div>
                        <?php $i++; endwhile; ?>
                    </div>

                    <div class="check-address">
                        <?php if ( get_field( 'ca_title' ) ): ?>
                            <p class="check-address__title h4"><?php the_field( 'ca_title' ); ?></p>
                        <?php endif; ?>

                        <div class="row gutters-sm">
                            <div class="col-lg-check-address-1 col-12">
                                <div class="relative">
                                    <figure class="check-address__icon svg-ic svg-ic--search"></figure>

                                    <input class="input" type="text" name="address" placeholder="<?php _e( 'адрес', 'csc-telecom' ); ?>">
                                </div>
                            </div>

                            <div class="col-lg-check-address-2 col-12">
                                <button class="btn btn-default full-width js-test"><span><?php _e( 'Проверить', 'csc-telecom' ); ?></span></button>
                            </div>
                        </div>

                        <div class="check-address__response p-small"></div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <div class="mp-tease">
        <div class="row">
            <div class="col-md-7 col-lg-8">
                <?php if ( get_field( 'pa_title' ) ): ?>
                    <p class="mp-tease__title h4"><?php the_field( 'pa_title' ); ?></p>
                <?php endif; ?>

                <div class="mp-tease-eq flex align-items-center">
                    <div class="mp-tease-eq__block-1 flex align-items-center">
                        <figure class="mp-tease-eq__ic svg-ic svg-ic--internet"></figure>

                        <p class="mp-tease__label mp-tease__label--limit"><?php _e( 'Домашний интернет', 'csc-telecom' ); ?></p>
                    </div>

                    <p class="mp-tease-eq__block-2 mp-tease__label mp-tease__label--large">+</p>

                    <div class="mp-tease-eq__block-3 flex align-items-center">
                        <figure class="mp-tease-eq__ic svg-ic svg-ic--mobile"></figure>

                        <p class="mp-tease__label mp-tease__label--limit"><?php _e( 'Мобилный пакет', 'csc-telecom' ); ?></p>
                    </div>

                    <p class="mp-tease-eq__block-4 mp-tease__label mp-tease__label--large">=</p>

                    <div class="featured-percentage relative">
                        <figure class="svg-ic svg-ic--percentage abs-center"></figure>
                    </div>
                </div>

                <?php if ( get_field( 'pa_text' ) ): ?>
                    <div class="mp-tease__desc editor">
                        <?php the_field( 'pa_text' ); ?>
                    </div>
                <?php endif; ?>

                <?php
                $btn = get_field( 'pa_button' );
                if ( is_array( $btn ) && $btn['title'] && $btn['url'] ): ?>
                    <a class="mp-tease__btn btn btn-default" href="<?php echo esc_url( $btn['url'] ); ?>" target="<?php echo $btn['target']; ?>"><?php echo $btn['title']; ?></a>
                <?php endif; ?>
            </div>

            <div class="col-md-5 col-lg-4">
                <div class="relative">
                    <figure class="mp-tease__decor"></figure>
                </div>
            </div>
        </div>
    </div>
</div>



<script>
    jQuery( document ).ready( function( $ ) {
        /**
         * Test address click handler.
         */
        $( '.js-test' ).click( function() {

            // Prepare elements/values.
            var $btn      = $( this );
            var $input    = $btn.closest( '.check-address' ).find( '[name="address"]' );
            var address   = $input.val(); // Test address: Künnapuu tee 20, Rae küla
            var $response = $( '.check-address__response' );
            var lang      = ( $( 'html' ).attr( 'lang' ) == 'et' ) ? 'est' : 'rus';

            // Check if value exists.
            $input.removeClass( 'error' );

            if ( ! address ) {
                $input.addClass( 'error' );
                return;
            }

            // Post data.
            var data = {
                address: address,
                action: 'csc_api_get_address_id'
            };

            $.ajax( {
                type: 'post',
                url: ajax_url,
                data: data,

                beforeSend: function() {
                    $btn.addClass( 'loading' );
                },

                complete: function() {
                    $btn.removeClass( 'loading' );
                },

                success: function( res ) {
                    $response.empty();

                    if ( res.success ) {
                        var $row = $( '<div class="row"/>' );

                        $.each( res.data.services, function( i, service ) {
                            var $col     = $( '<div class="service-wrap col-lg-6"/>' );
                            var $service = $( '<div class="service"/>' );

                            $service.append( '<p>' + service.group[lang] + '</p>' );
                            $service.append( '<p class="ip__name">' + service.name[lang] + '</p>' );
                            $service.append( '<div class="ip__price"><p class="ip__price-1">€ ' + service.price + '</p><p class="ip__price-2"><?php _e( '/месяц', 'csc-telecom' ); ?></p></div>' );

                            if ( service.speed.down.indexOf( 'M' ) !== -1 ) {
                                $service.append( '<p class="ip__speed">' + service.speed.down.split( 'M' )[0] + ' <?php _e( 'Мбит/с', 'csc-telecom' ); ?></p>' );
                            } else {
                                $service.append( '<p class="ip__speed">' + service.speed.down + '</p>' );
                            }

                            $service.appendTo( $col );
                            $col.appendTo( $row );
                        } );

                        $row.appendTo( $response );
                    } else {
                        $response.html( '<p>' + res.data.message + '</p>' )                        
                    }
                },

                error: function( jqXHR, textStatus, errorThrown ) {
                    console.log( 'Checking address failed', textStatus + ': ' + errorThrown );
                }
            } );
        } );
    } );
</script>

<style>

</style>

<?php get_footer(); ?>