<?php
/**
 * Template Name: Home Packages
 */

get_header(); ?>

<?php $post_id = get_the_ID(); ?>

<script>
    window.$ = jQuery;

    var config = {
        items: {
            all: {
                internet: [],
                mobile: [],
                number: []
            },
            current: {
                internet: false,
                mobile: false,
                number: false
            }
        },

        layout: {
            internet: {
                icon: 'internet',
                tagline: '<?php _e( 'Домашний интернет', 'csc-telecom' ); ?>'
            },
            mobile: {
                icon: 'mobile',
                tagline: '<?php _e( 'Мобилный пакет', 'csc-telecom' ); ?>'
            },
            number: {
                icon: 'mobile',
                tagline: '<?php _e( 'Kрасивый номер', 'csc-telecom' ); ?>'
            }
        },

        required: ['internet', 'mobile'],

        mobile_discount: 0,

        init: function() {
            config.listeners();
            config.make_layout();
            config.populate_results();
        },

        listeners: function() {
            // Add/remove button handler.
            $( '.js-config-add' ).on( 'click', function() {
                var $block  = config.get_block( this );
                var $select = $block.find( 'select' );
                var name, value;

                if ( $select.length ) {
                    var select = $select[0];

                    name  = select.name;
                    value = select.value;
                } else {
                    name  = $block.attr( 'data-name' );
                    value = $block.attr( 'data-id' );
                }

                $( '.ip[data-name="' + name + '"]' ).not( $block ).removeClass( 'selected' );

                if ( ! config.is_active_block( $block ) ) {
                    $block.addClass( 'selected' );

                    config.add( name, value );
                } else {
                    $block.removeClass( 'selected' );

                    config.remove( name );
                }

                // Set discounts for all mobile packs.
                if ( name == 'internet' ) {
                    config.mobile_discount = config.items.current.internet.mobile_discount;

                    $.each( config.items.all.mobile, function( i, pack ) {
                        var $pack = $( '.ip--mobile[data-id="' + pack.id + '"]' );

                        pack.price_display = config.calculate_mobile_pack_discount( pack.price, config.mobile_discount, 'text' );
                        pack.price         = config.calculate_mobile_pack_discount( pack.price, config.mobile_discount );

                        $( '[data-mp-price]', $pack ).text( pack.price_display );
                        $( '[data-mp-discount]', $pack ).text( config.mobile_discount );
                    } );

                    $( '.ip__old-price' ).addClass( 'shown' );
                }

                config.get_results_block().trigger( 'populate' );

                // Check to see if resulst should be shown.
                var show_result = true;

                $.each( config.items.current, function( name, value ) {
                    if ( config.required.includes( name ) && ! value ) {
                        show_result = false;
                    }
                } );

                if ( show_result ) {
                    $( '.results-block' ).removeClass( 'd-none' );
                } else {
                    $( '.results-block' ).addClass( 'd-none' );
                }
            } );

            // Selectbox change handler.
            $( '.ip__select select' ).on( 'change', function() {
                var $block = config.get_block( this );

                if ( config.is_active_block( $block ) ) {
                    config.add( this.name, this.value );

                    config.get_results_block().trigger( 'populate' );
                }
            } );

            // Radio handler.
            $( '[name="client_type"]' ).on( 'change', function() {
                $( '[type="hidden"][name="client"]' ).val( this.dataset.value );

                if ( this.value ) {
                    $( '.cfg-wrap' ).addClass( 'active' );
                } else {
                    $( '.cfg-wrap' ).removeClass( 'active' );
                }

                if ( this.value == 1 || this.value == 2 ) {
                    $( '.cfg-additional-fields' ).addClass( 'active' );
                } else {
                    $( '.cfg-additional-fields' ).removeClass( 'active' );
                }

                if ( this.value == 3 ) {
                    $( '.pack-type[data-type="number"]' ).addClass( 'active' );
                    $( '.pack-type[data-type="number"] .ip' ).addClass( 'selected' );

                    config.add( 'number', $( '.pack-type[data-type="number"] select option:first-child' ).val() );
                    config.get_results_block().trigger( 'populate' );
                } else {
                    $( '.pack-type[data-type="number"]' ).removeClass( 'active' );
                    $( '.pack-type[data-type="number"] .ip' ).removeClass( 'selected' );

                    config.remove( 'number' );
                    config.get_results_block().trigger( 'populate' );
                }
            } );

            // Request form.
            $( '.js-make-request' ).on( 'click', function() {
                var client_type = $( '[name="client_type"]:checked' ).val();

                if ( client_type == 1 || client_type == 2 ) {
                    $( '[type="hidden"][name="my-number"]' ).val( $( '[name="my-custom-number"]' ).val() );
                } else {
                    $( '[type="hidden"][name="my-number"]' ).val( '' );
                }
            } );

            // Populate results when config changes.
            config.get_results_block().on( 'populate', config.populate_results );
        },

        get_block: function( item ) {
            return $( item ).closest( '.ip' );
        },

        is_active_block: function( $block ) {
            return $block.hasClass( 'selected' );
        },

        get_results_block: function() {
            return $( '.cfg-res' );
        },
        
        add: function( name, value ) {
            config.items.current[name] = config.items.all[name].find( x => x.id == value );
        },

        remove: function( name ) {
            config.items.current[name] = false;
        },

        calculate_mobile_pack_discount: function( price, discount, return_type = 'number' ) {

            var new_price = price * ( ( 100 - discount ) / 100 );

            // Format price without trailing zeros.
            if ( new_price % 1 != 0 && return_type == 'text' ) {
                return new_price = new_price.toFixed( 2 );
            }

            return parseFloat( new_price );

        },

        make_layout: function() {
            var $results = config.get_results_block();

            $.each( config.layout, function( name, obj ) {
                var $item  = $( '<div class="cfg-res-item" data-name="' + name + '"/>' );
                var $inner = $( '<div class="cfg-res-item__inner"/>' );

                $inner.append( '<span class="cfg-res-item__icon svg-ic svg-ic--' + obj.icon + '"/>' );
                $inner.append( '<p class="p-small">' + obj.tagline + '</p>' );
                $inner.append( '<p class="p-small fw-black" data-ph="name"/>' );

                if ( name != 'internet' ) {
                    $inner.append( '<p class="p-xtra-small-2 strikethrough strikethrough--black">€ <span data-ph="price_old_display"/></p>' );
                }

                $inner.append( '<p class="cfg-res-item__price fw-black">€ <span data-ph="price_display"/></p>' );
                $inner.append( '<p class="p-xtra-small-3" data-ph="desc"/>' );

                $inner.appendTo( $item );

                $item.insertBefore( $( '.cfg-res-item[data-name="result"]', $results ) );
            } );
        },

        populate_results: function() {
            var selected  = 0;
            var old_price = 0;
            var new_price = 0;

            // Populate configuration results area and form fields.
            $.each( config.items.current, function( name, obj ) {
                var $item = $( '.cfg-res-item[data-name="' + name + '"]' );
                var $pack = $( '.form-pack[data-name="' + name + '"]' );

                if ( obj ) {
                    $item.addClass( 'active' );
                    $pack.addClass( 'active' );

                    $.each( config.items.current[name], function( key, value ) {
                        var $placeholder = $( '[data-ph="' + key + '"]', $item );

                        if ( $placeholder.length ) {
                            $placeholder.html( value );
                        }
                    } );

                    selected++;

                    $( '[data-ph="name"]', $pack ).text( obj.name );
                    $( '[type="hidden"][name="' + name + '"]' ).val( obj.name );

                    if ( name != 'number' ) {
                        old_price += obj.price_old;
                        new_price += obj.price;
                    }
                } else {
                    $item.removeClass( 'active' );
                    $pack.removeClass( 'active' );

                    $( '[data-ph="name"]', $pack ).text( '' );
                    $( '[type="hidden"][name="' + name + '"]' ).val( '' );
                }
            } );

            config.get_results_block().removeClass( function( index, className ) {
                return ( className.match (/(^|\s)selected-\S+/g) || []).join(' ');
            } );

            config.get_results_block().addClass( 'selected-' + selected );

            $( '[data-name="discount"]', config.get_results_block() ).text( config.mobile_discount );

            // Calculate results.
            old_price = old_price.toFixed( 2 );
            new_price = new_price.toFixed( 2 );

            $( '[data-name="old_price"]', config.get_results_block() ).text( old_price );
            $( '[data-name="new_price"]', config.get_results_block() ).text( new_price );

            $( '[type="hidden"][name="result-price"]' ).val( new_price );
        }
    };
</script>

<div class="new-design new-design--no-bot container narrow-6">
    <h1 class="page-title h1 small"><?php the_title(); ?></h1>

    <div class="page-content-editor editor">
        <?php the_content(); ?>
    </div>

    <div class="cfg-additional">
        <div class="checkbox wpcf7-checkbox">
            <label>
                <span class="wpcf7-list-item">
                    <input class="cfg-check" type="radio" name="client_type" value="1" data-value="<?php _e( 'Уже клиент CSC Mobiil', 'csc-mobile' ); ?>">

                    <span class="wpcf7-list-item-label"><?php _e( 'Уже клиент CSC Mobiil', 'csc-mobile' ); ?></span>
                </span>
            </label>
        </div>

        <div class="checkbox wpcf7-checkbox">
            <label>
                <span class="wpcf7-list-item">
                    <input class="cfg-check" type="radio" name="client_type" value="2" data-value="<?php _e( 'Хочу стать клиентом и перенести свой номер в сеть CSC', 'csc-mobile' ); ?>">

                    <span class="wpcf7-list-item-label"><?php _e( 'Хочу стать клиентом и перенести свой номер в сеть CSC', 'csc-mobile' ); ?></span>
                </span>
            </label>
        </div>

        <div class="checkbox wpcf7-checkbox">
            <label>
                <span class="wpcf7-list-item">
                    <input class="cfg-check" type="radio" name="client_type" value="3" data-value="<?php _e( 'Хочу стать клиентом и выбрать красивый номер CSC ', 'csc-mobile' ); ?>">

                    <span class="wpcf7-list-item-label"><?php _e( 'Хочу стать клиентом и выбрать красивый номер CSC ', 'csc-mobile' ); ?></span>
                </span>
            </label>
        </div>
    </div>

    <div class="cfg-additional-fields">
        <label class="input-block">
            <span class="label"><?php _e( 'Номер телефона', 'csc-telecom' ); ?></span>
            <span class="wpcf7-form-control-wrap">
                <input name="my-custom-number" type="text" class="input" placeholder="<?php _e( 'Номер телефона', 'csc-telecom' ); ?>">
            </span>
        </label>
    </div>

    <div class="cfg-wrap">
        <div class="packs-config-wrap">
            <!-- Internet packs -->
            <?php if ( have_rows( 'internet_packs', 'option' ) ): ?>
                <div class="internet-packs internet-packs--alt">
                    <?php if ( get_field( 'step_1_title' ) ): ?>
                        <h2 class="step-title"><span class="step-title__bold"><?php _e( 'Шаг', 'csc-telecom' ); ?> 1:</span> <?php the_field( 'step_1_title' ); ?></h2>
                    <?php endif; ?>

                    <div class="internet-packs__inner relative">
                        <figure class="internet-packs__decor"></figure>

                        <div class="on-top">
                            <div class="row gutters-sm">
                                <?php
                                $i = 1;
                                while ( have_rows( 'internet_packs', 'option' ) ): the_row(); ?>
                                    <?php
                                    if ( get_sub_field( 'exclude_from_combo_view' ) ) {
                                        continue;
                                    }
                                    ?>

                                    <!-- Single internet pack -->
                                    <div class="ip-wrap col-lg-<?php if ( $i > 3 ): ?>6<?php else: ?>4<?php endif; ?> col-<?php if ( $i == 5 ): ?>12<?php else: ?>6<?php endif; ?>">
                                        <article class="ip ip--alt" data-name="internet" data-id="<?php echo $i; ?>">
                                            <figure class="ip__icon svg-ic svg-ic--internet"></figure>

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

                                            <button class="ip__btn btn btn-alt full-width js-config-add">
                                                <span class="ip__btn-text"><?php _e( 'выбрать', 'csc-telecom' ); ?></span>
                                                <span class="ip__btn-ic ic ic-checkmark abs-center"></span>    
                                            </button>
                                        </article>

                                        <script>
                                            config.items.all.internet.push( {
                                                id: <?php echo $i; ?>,
                                                name: '<?php the_sub_field( 'name' ); ?>',
                                                price_old: parseFloat( <?php the_sub_field( 'price' ); ?> ), 
                                                price: parseFloat( <?php the_sub_field( 'price' ); ?> ),
                                                price_display: parseFloat( <?php the_sub_field( 'price' ); ?> ).toFixed( 2 ) + '<?php _e( '/месяц', 'csc-telecom' ); ?>',
                                                mobile_discount: parseInt( <?php the_sub_field( 'mobile_pack_discount' ); ?> ),
                                                desc: '<?php the_sub_field( 'speed' ); ?> <?php the_sub_field( 'speed_label' ); ?>'
                                            } );
                                        </script>
                                    </div>
                                    <!-- /Single internet pack -->
                                <?php $i++; endwhile; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <!-- /Internet packs -->

            <!-- Mobile packs -->
            <?php if ( have_rows( 'mobile_packs', 'option' ) ): ?>
                <?php $link_to_packages = get_field( 'link_to_mobile_packages' ); ?>

                <div class="mobile-packs">
                    <?php if ( get_field( 'step_2_title' ) ): ?>
                        <h2 class="step-title"><span class="step-title__bold"><?php _e( 'Шаг', 'csc-telecom' ); ?> 2:</span> <?php the_field( 'step_2_title' ); ?></h2>
                    <?php endif; ?>

                    <div class="mobile-packs__inner relative">
                        <figure class="mobile-packs__decor"></figure>

                        <div class="row gutters-sm">
                            <?php
                            $i = 1;
                            while ( have_rows( 'mobile_packs', 'option' ) ): the_row(); ?>
                                <!-- Single mobile pack -->
                                <div class="ip-wrap col-lg-<?php if ( $i > 3 ): ?>6<?php else: ?>4<?php endif; ?> col-md-<?php if ( $i == 5 ): ?>12<?php else: ?>6<?php endif; ?>">
                                    <article class="ip ip--mobile" data-name="mobile" data-id="<?php echo $i; ?>">
                                        <figure class="ip__icon svg-ic svg-ic--mobile"></figure>

                                        <?php if ( $link_to_packages ): ?>
                                            <a class="ip__block-link" href="<?php echo esc_url( $link_to_packages ); ?>"></a>
                                        <?php endif; ?>

                                        <?php if ( get_sub_field( 'name' ) ): ?>
                                            <p class="ip__name"><?php the_sub_field( 'name' ); ?></p>
                                        <?php endif; ?>

                                        <?php if ( get_sub_field( 'price' ) ): ?>
                                            <div class="ip__old-price flex align-items-center">
                                                <p>€ <?php echo str_replace( '.00', '', get_sub_field( 'price' ) ); ?></p>

                                                <div class="discount-tag">-<span data-mp-discount></span>%</div>
                                            </div>

                                            <div class="ip__price">
                                                <p class="ip__price-1">€ <span data-mp-price><?php echo str_replace( '.00', '', get_sub_field( 'price' ) ); ?></span></p>
                                                <p class="ip__price-2"><?php _e( '/месяц', 'csc-telecom' ); ?></p>
                                            </div>
                                        <?php endif; ?>

                                        <?php if ( have_rows( 'internet' ) ): ?>
                                            <div class="ip__internet">
                                                <p><?php _e( 'Интернет:', 'csc-telecom' ); ?></p>

                                                <ul>
                                                    <?php while ( have_rows( 'internet' ) ): the_row(); ?>
                                                        <li><?php the_sub_field( 'text' ); ?></li>
                                                    <?php endwhile; ?>

                                                    <?php if ( get_sub_field( 'description' ) ): ?>
                                                        <li class="desc-plus">+</li>
                                                        <li class="desc"><?php the_sub_field( 'description' ); ?></li>
                                                    <?php endif; ?>
                                                </ul>
                                            </div>
                                        <?php endif; ?>

                                        <button class="ip__btn btn btn-alt full-width js-config-add">
                                            <span class="ip__btn-text"><?php _e( 'выбрать', 'csc-telecom' ); ?></span>
                                            <span class="ip__btn-ic ic ic-checkmark abs-center"></span>
                                        </button>
                                    </article>

                                    <script>
                                        var item = {
                                            id: <?php echo $i; ?>,
                                            name: '<?php the_sub_field( 'name' ); ?>',
                                            price_old: parseFloat( <?php the_sub_field( 'price' ); ?> ),
                                            price_old_display: parseFloat( <?php the_sub_field( 'price' ); ?> ).toFixed( 2 ) + '<?php _e( '/месяц', 'csc-telecom' ); ?>',
                                            price: parseFloat( <?php the_sub_field( 'price' ); ?> ),
                                            price_display: parseFloat( <?php the_sub_field( 'price' ); ?> ).toFixed( 2 ) + '<?php _e( '/месяц', 'csc-telecom' ); ?>',
                                            desc: '',
                                        };

                                        <?php if ( $internet = get_sub_field( 'internet' ) ): ?>
                                            item.desc += '<?php echo implode( '<br>', array_map( function( $entry ) { return $entry['text']; }, $internet ) ); ?>';
                                        <?php endif; ?>

                                        <?php if ( get_sub_field( 'description' ) ): ?>
                                            item.desc += '<br><?php the_sub_field( 'description' ); ?>';
                                        <?php endif; ?>

                                        config.items.all.mobile.push( item );
                                    </script>
                                </div>
                                <!-- /Single mobile pack -->
                            <?php $i++; endwhile; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <!-- /Mobile packs -->

            <!-- Gold numbers -->
            <?php if ( have_rows( 'numbers', 'phone-numbers' ) ): ?>
                <?php $num_price = get_field( 'price', 'phone-numbers' ); ?>

                <div class="pack-type internet-packs internet-packs--alt packs-config--3" data-type="number">
                    <?php if ( get_field( 'step_3_title' ) ): ?>
                        <h2 class="step-title"><span class="step-title__bold"><?php _e( 'Шаг', 'csc-telecom' ); ?> 3:</span> <?php the_field( 'step_3_title' ); ?></h2>
                    <?php endif; ?>

                    <div class="internet-packs__inner relative">
                        <figure class="internet-packs__decor packs-config__decor"></figure>

                        <div class="on-top">
                            <div class="ip-wrap">
                                <article class="ip ip--alt">
                                    <figure class="ip__icon svg-ic svg-ic--mobile"></figure>

                                    <p class="ip__name mg-large"><?php _e( 'Kрасивый номер', 'csc-telecom' ); ?></p>

                                    <div class="ip__select">
                                        <select name="number">
                                            <?php $i = 1; while ( have_rows( 'numbers', 'phone-numbers' ) ): the_row(); ?>
                                                <option value="<?php echo $i; ?>"><?php the_sub_field( 'number' ); ?></option>
                                            <?php $i++; endwhile; ?>
                                        </select>
                                    </div>

                                    <?php if ( $more = get_field( 'gold_numbers_learn_more', 'option' ) ): ?>
                                        <div class="ip__more">
                                            <a href="<?php echo esc_url( $more ); ?>"><?php _e( 'узнать больше', 'csc-telecom' ); ?></a>
                                        </div>
                                    <?php endif; ?>

                                    <button class="ip__btn btn btn-alt full-width">
                                        <span class="ip__btn-text"><?php _e( 'добавить', 'csc-telecom' ); ?></span>
                                        <span class="ip__btn-ic ic ic-checkmark abs-center"></span>
                                    </button>
                                </article>

                                <?php $i = 1; while ( have_rows( 'numbers', 'phone-numbers' ) ): the_row(); ?>
                                    <script>
                                        config.items.all.number.push( {
                                            id: <?php echo $i; ?>,
                                            name: '<?php the_sub_field( 'number' ); ?>',
                                            price_old: parseFloat( <?php echo $num_price; ?> ),
                                            price_old_display: parseFloat( <?php echo $num_price; ?> ) + '<?php _e( '/месяц', 'csc-telecom' ); ?>',
                                            price: 0.00,
                                            price_display: 0.00.toFixed( 2 ) + '<?php _e( '/месяц', 'csc-telecom' ); ?>'
                                        } );
                                    </script>
                                <?php $i++; endwhile; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <!-- /Gold numbers -->
        </div>

        <!-- Config result -->
        <div class="results-block d-none">
            <?php if ( get_field( 'results_title' ) ): ?>
                <p class="cfg-sub-title fw-black h3"><?php the_field( 'results_title' ); ?></p>
            <?php endif; ?>

            <div class="cfg-res flex-lg justify-content-lg-between">
                <div class="cfg-res-item active" data-name="result">
                    <div class="cfg-res-item__inner">
                        <div class="cfg-res-item__price-wrap">
                            <div class="cfg-res-item__old-price flex justify-content-end align-items-center">
                                <p class="p-xtra-small strikethrough strikethrough--black">€ <span data-name="old_price">13,98</span><?php _e( '/месяц', 'csc-telecom' ); ?></p>
                                <p class="discount-tag">-<span data-name="discount"></span>%</p>
                            </div>

                            <p class="cfg-res-item__new-price c-primary-alt p-large fw-black text-right">€ <span data-name="new_price">11.98</span><?php _e( '/месяц', 'csc-telecom' ); ?></p>
                        </div>

                        <div class="btn-wrap">
                            <button class="btn btn-default btn-large full-width js-make-request" data-fancybox data-src="#request"><?php _e( 'запросить', 'csc-telecom' ); ?></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Config result -->
    </div>

    <?php if ( $form = get_field( 'co_form' ) ): ?>
        <div class="hide">
            <div id="request">
                <div class="request-form request-form--wide">
                    <div class="inner">
                        <div class="regular">
                            <div class="row gutters-lg">
                                <div class="col-md-6">
                                    <?php if ( get_field( 'co_form_title' ) ): ?>
                                        <p class="form-title"><?php the_field( 'co_form_title' ); ?></p>
                                    <?php endif; ?>

                                    <div class="form-pack" data-name="tv">
                                        <span class="form-pack__icon svg-ic svg-ic--tv"></span>

                                        <p class="form-pack__name p-small"><?php _e( 'ТВ + Кино', 'csc-telecom' ); ?></p>
                                        <p class="p-small fw-black" data-ph="name"></p>
                                    </div>

                                    <div class="form-pack" data-name="mobile">
                                        <span class="form-pack__icon svg-ic svg-ic--mobile"></span>

                                        <p class="form-pack__name p-small"><?php _e( 'Мобилный пакет', 'csc-telecom' ); ?></p>
                                        <p class="p-small fw-black" data-ph="name"></p>
                                    </div>

                                    <div class="form-pack" data-name="number">
                                        <span class="form-pack__icon svg-ic svg-ic--mobile"></span>

                                        <p class="form-pack__name p-small"><?php _e( 'Kрасивый номер', 'csc-telecom' ); ?></p>
                                        <p class="p-small fw-black" data-ph="name"></p>
                                    </div>

                                    <div class="form-pack" data-name="internet">
                                        <span class="form-pack__icon svg-ic svg-ic--internet"></span>

                                        <p class="form-pack__name p-small"><?php _e( 'Домашний интернет', 'csc-telecom' ); ?></p>
                                        <p class="p-small fw-black" data-ph="name"></p>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <?php echo do_shortcode( '[contact-form-7 id="' . $form . '"]' ); ?>
                                </div>
                            </div>
                        </div>
                        <div class="success hide">
                            <h3 class="form-title">Saime teie päringu kätte!</h3>
                            <p class="form-sub-title p">Võtame teiega ühendust lähiajal.</p>
                            <div class="flex">
                                <div class="submit-wrap m-l-auto">
                                    <button class="btn btn-default large size-1" data-fancybox-close>OK</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <!-- End decor -->
    <div class="flex justify-content-end">
        <figure>
            <img src="<?php echo URL_THEME; ?>/assets/img/owl-5.png">
        </figure>
    </div>
    <!-- /End decor -->

</div>

<script>
    config.items.current.number = config.items.all.number.find( x => x.id == 1 );

    jQuery( document ).ready( function( $ ) {
        config.init();
    } );
</script>

<style>
    .cfg-res { margin-bottom: 17px; }

    .cfg-sub-title,
    .cfg-res-item[data-name="internet"] [data-ph="name"] { margin-bottom: 17px; }

    .cfg-res-item[data-name=result] .cfg-res-item__old-price { margin-bottom: 1px; }

    .cfg-res-item[data-name=result] .cfg-res-item__new-price { margin-bottom: 9px; }
</style>

<?php get_footer(); ?>