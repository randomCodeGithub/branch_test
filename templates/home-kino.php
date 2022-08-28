<?php
/**
 * Template Name: Home Kino
 */

$show_discounts = false;

get_header(); ?>

<?php
$precheck     = get_field( 'co_pre_check' );
$mob_discount = ( float ) get_field( 'co_mobile_pack_discount' );
?>

<script>
    window.$ = jQuery;

    var config = {
        items: {
            all: {
                tv: [],
                mobile: [],
                internet: [],
                number: []
            },
            current: {
                tv: false,
                mobile: false,
                internet: false,
                number: false
            }
        },

        layout: {
            tv: {
                icon: 'tv',
                tagline: '<?php _e( 'ТВ + Кино', 'csc-telecom' ); ?>'
            },
            mobile: {
                icon: 'mobile',
                tagline: '<?php _e( 'Мобилный пакет', 'csc-telecom' ); ?>'
            },
            number: {
                icon: 'mobile',
                tagline: '<?php _e( 'Kрасивый номер', 'csc-telecom' ); ?>'
            },
            internet: {
                icon: 'internet',
                tagline: '<?php _e( 'Домашний интернет', 'csc-telecom' ); ?>'
            }
        },

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
                var select  = $select[0];

                if ( ! config.is_active_block( $block ) ) {
                    $block.addClass( 'selected' );

                    config.add( select.name, select.value );
                } else {
                    $block.removeClass( 'selected' );

                    config.remove( select.name );
                }

                config.get_results_block().trigger( 'populate' );
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
                    $( '.ip-wrap[data-type="number"]' ).addClass( 'active' );
                    $( '.ip-wrap[data-type="number"] .ip' ).addClass( 'selected' );

                    config.add( 'number', $( '.ip-wrap[data-type="number"] select option:first-child' ).val() );
                    config.get_results_block().trigger( 'populate' );
                } else {
                    $( '.ip-wrap[data-type="number"]' ).removeClass( 'active' );
                    $( '.ip-wrap[data-type="number"] .ip' ).removeClass( 'selected' );

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

        make_layout: function() {
            var $results = config.get_results_block();

            $.each( config.layout, function( name, obj ) {
                var $item  = $( '<div class="cfg-res-item" data-name="' + name + '"/>' );
                var $inner = $( '<div class="cfg-res-item__inner"/>' );

                $inner.append( '<span class="cfg-res-item__icon svg-ic svg-ic--' + obj.icon + '"/>' );
                $inner.append( '<p class="p-small">' + obj.tagline + '</p>' );
                $inner.append( '<p class="p-small fw-black" data-ph="name"/>' );

                <?php if ( $show_discounts ): ?>
                    if ( name != 'internet' ) {
                        $inner.append( '<p class="p-xtra-small-2 strikethrough strikethrough--black">€ <span data-ph="price_old_display"/></p>' );
                    }
                    $inner.append( '<p class="cfg-res-item__price fw-black">€ <span data-ph="price_display"/></p>' );
                <?php else: ?>
                    if ( name == 'internet' ) {
                        $inner.append( '<p class="cfg-res-item__price fw-black">€ <span data-ph="price_display"/></p>' );
                    }

                    $inner.append( '<p class="cfg-res-item__price fw-black">€ <span data-ph="price_old_display"/></p>' );
                <?php endif; ?>
                
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

                    if ( 'price_old_display' in obj ) {
                        
                    } else {
                        $( '[data-ph="price_old_display"]', $item ).parent().hide();
                    }

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
                        if ( 'price_old' in obj ) {
                            old_price += obj.price_old;
                        } else {
                            old_price += obj.price;
                        }

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

            // Calculate results.
            old_price = old_price.toFixed( 2 );
            new_price = new_price.toFixed( 2 );

            $( '[data-name="old_price"]', config.get_results_block() ).text( old_price );
            $( '[data-name="new_price"]', config.get_results_block() ).text( new_price );

            $( '[type="hidden"][name="result-price"]' ).val( new_price );
        }
    };
</script>

<div class="new-design new-design--no-bot">
    <!-- Hero section -->
    <div class="container narrow-6">
        <h1 class="page-title h1 small"><?php the_title(); ?></h1>

        <div class="fs flex">
            <?php if ( $image = get_field( 'fs_image' ) ): ?>
                <div class="fs-col-2 order-md-2">
                    <figure class="fs-image">
                        <?php pandago_img( $image ); ?>
                    </figure>
                </div>
            <?php endif; ?>

            <div class="fs-col-1 order-md-1">
                <?php if ( $logo = get_field( 'fs_logo' ) ): ?>
                    <figure class="fs-logo">
                        <?php pandago_img( $logo ); ?>
                    </figure>
                <?php endif; ?>

                <?php if ( get_field( 'fs_sub_title' ) ): ?>
                    <p class="fs-sub-title fw-black"><?php the_field( 'fs_sub_title' ); ?></p>
                <?php endif; ?>

                <?php if ( have_rows( 'fs_list' ) ): ?>
                    <ul class="fs-list list">
                        <?php while ( have_rows( 'fs_list' ) ): the_row(); ?>
                            <?php if ( get_sub_field( 'text' ) ): ?>
                                <li><?php the_sub_field( 'text' ); ?></li>
                            <?php endif; ?>
                        <?php endwhile; ?>
                    </ul>
                <?php endif; ?>

                <?php if ( get_field( 'fs_new_price' ) ): ?>
                    <div class="fs-price item-price">
                        <?php if ( get_field( 'fs_old_price' ) ): ?>
                            <p class="item-price__old strikethrough strikethrough--black">€ <?php the_field( 'fs_old_price' ); ?></p>
                        <?php endif; ?>

                        <p class="item-price__1">€ <?php the_field( 'fs_new_price' ); ?></p>
                        <p class="item-price__2"><?php _e( '/месяц', 'csc-telecom' ); ?></p>
                    </div>
                <?php endif; ?>

                <a class="btn btn-default btn-large size-4" href="#order"><?php _e( 'Заказать', 'csc-telecom' ); ?></a>
            </div>
        </div>
    </div>
    <!-- /Hero section -->

    <!-- Info bar -->
    <div class="ibar">
        <div class="container narrow-6">
            <?php if ( get_field( 'ib_title' ) ): ?>
                <p class="ibar__title fw-black text-center"><?Php the_field( 'ib_title' ); ?></p>
            <?php endif; ?>

            <?php if ( have_rows( 'ib_items' ) ): ?>
                <div class="featured-items row">
                    <?php while ( have_rows( 'ib_items' ) ): the_row(); ?>
                        <div class="featured-item col-md-4 text-center">
                            <?php if ( $icon = get_sub_field( 'icon' ) ): ?>
                                <figure class="featured-item__icon">
                                    <?php pandago_img( $icon ); ?>
                                </figure>
                            <?php endif; ?>

                            <?php if ( get_sub_field( 'text' ) ): ?>
                                <p class="featured-item__text p-small"><?php the_sub_field( 'text' ); ?></p>
                            <?php endif; ?>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <!-- /Info bar -->

    <!-- Configurator -->
    <div class="container narrow-6" id="order">
        <?php if ( get_field( 'co_title' ) ): ?>
            <h2 class="cfg-title h3"><?php the_field( 'co_title' ); ?></h2>
        <?php endif; ?>

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
            <div class="cfg-grid row gutters-sm">
                <!-- TV packs -->
                <?php if ( have_rows( 'tv_packs', 'option' ) ): ?>
                    <?php $i = 1; while ( have_rows( 'tv_packs', 'option' ) ): the_row(); ?>
                        <div class="ip-wrap col-md-6" data-type="tv">
                            <article class="ip ip--alt <?php if ( in_array( 'tv', $precheck ) ): ?>selected<?php endif; ?>" data-id="<?php echo $i; ?>">
                                <figure class="ip__icon svg-ic svg-ic--tv"></figure>

                                <p class="ip__name"><?php _e( 'ТВ + Кино', 'csc-telecom' ); ?></p>

                                <?php if ( get_sub_field( 'price' ) ): ?>
                                    <div class="ip__price">
                                        <?php if ( $show_discounts ): ?>
                                            <?php if ( get_sub_field( 'old_price' ) ): ?>
                                                <p class="ip__price-old p-small strikethrough strikethrough--black">€ <?php the_sub_field( 'old_price' ); ?></p>
                                            <?php endif; ?>

                                            <p class="ip__price-1">€ <?php the_sub_field( 'price' ); ?></p>
                                        <?php else: ?>
                                            <?php if ( get_sub_field( 'old_price' ) ): ?>
                                                <p class="ip__price-1">€ <?php the_sub_field( 'old_price' ); ?></p>
                                            <?php else: ?>
                                                <p class="ip__price-1">€ <?php the_sub_field( 'price' ); ?></p>
                                            <?php endif; ?>
                                        <?php endif; ?>

                                        <p class="ip__price-2"><?php _e( '/месяц', 'csc-telecom' ); ?></p>
                                    </div>
                                <?php endif; ?>

                                <?php if ( get_sub_field( 'speed' ) ): ?>
                                    <p class="ip__speed"><?php the_sub_field( 'speed' ); ?></p>
                                <?php endif; ?>

                                <button class="ip__btn btn btn-alt full-width">
                                    <span class="ip__btn-text"><?php _e( 'добавить', 'csc-telecom' ); ?></span>
                                    <span class="ip__btn-ic ic ic-checkmark abs-center"></span>
                                </button>
                            </article>

                            <script>
                                config.items.all.tv.push( {
                                    id: <?php echo $i; ?>,
                                    name: '<?php the_sub_field( 'name' ); ?>',
                                    <?php if ( get_sub_field( 'old_price' ) ): ?>
                                        price_old: parseFloat( <?php the_sub_field( 'old_price' ); ?> ),
                                        price_old_display: parseFloat( <?php the_sub_field( 'old_price' ); ?> ) + '<?php _e( '/месяц', 'csc-telecom' ); ?>',
                                    <?php endif; ?>
                                    price: parseFloat( <?php the_sub_field( 'price' ); ?> ),
                                    price_display: parseFloat( <?php the_sub_field( 'price' ); ?> ) + '<?php _e( '/месяц', 'csc-telecom' ); ?>'
                                } );
                            </script>
                        </div>

                        <?php break; ?>
                    <?php $i++; endwhile; ?>
                <?php endif; ?>
                <!-- /TV packs -->

                <!-- Mobile packs -->
                <?php if ( have_rows( 'mobile_packs', 'option' ) ): ?>
                    <div class="ip-wrap col-md-6" data-type="mobile">
                        <article class="ip ip--alt <?php if ( in_array( 'mobile', $precheck ) ): ?>selected<?php endif; ?>">
                            <figure class="ip__icon svg-ic svg-ic--mobile"></figure>

                            <p class="ip__name mg-large"><?php _e( 'Мобильный пакет', 'csc-telecom' ); ?></p>

                            <div class="ip__select">
                                <select name="mobile" data-mobile-discount>
                                    <?php $i = 1; while ( have_rows( 'mobile_packs', 'option' ) ): the_row(); ?>
                                        <?php
                                        $price     = ( float ) get_sub_field( 'price' );
                                        $new_price = $price * ( ( 100 - $mob_discount ) / 100 );
                                        ?>

                                        <option value="<?php echo $i; ?>" data-new-price="<?php echo $new_price; ?>"><?php the_sub_field( 'price' ); ?> - <?php the_sub_field( 'name' ); ?></option>
                                    <?php $i++; endwhile; ?>
                                </select>
                            </div>

                            <?php if ( $more = get_field( 'mobile_packs_learn_more', 'option' ) ): ?>
                                <div class="ip__more">
                                    <a href="<?php echo esc_url( $more ); ?>"><?php _e( 'узнать больше', 'csc-telecom' ); ?></a>
                                </div>
                            <?php endif; ?>

                            <button class="ip__btn btn btn-alt full-width">
                                <span class="ip__btn-text"><?php _e( 'добавить', 'csc-telecom' ); ?></span>
                                <span class="ip__btn-ic ic ic-checkmark abs-center"></span>
                            </button>
                        </article>

                        <?php $i = 1; while ( have_rows( 'mobile_packs', 'option' ) ): the_row(); ?>
                            <?php
                            $price     = ( float ) get_sub_field( 'price' );
                            $new_price = $price * ( ( 100 - $mob_discount ) / 100 );
                            ?>

                            <script>
                                var item = {
                                    id: <?php echo $i; ?>,
                                    name: '<?php the_sub_field( 'name' ); ?>',
                                    price_old: parseFloat( <?php the_sub_field( 'price' ); ?> ),
                                    price_old_display: parseFloat( <?php the_sub_field( 'price' ); ?> ).toFixed( 2 ) + '<?php _e( '/месяц', 'csc-telecom' ); ?>',
                                    price: parseFloat( <?php echo $new_price; ?> ),
                                    price_display: parseFloat( <?php echo $new_price; ?> ).toFixed( 2 ) + '<?php _e( '/месяц', 'csc-telecom' ); ?>',
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
                        <?php $i++; endwhile; ?>
                    </div>
                <?php endif; ?>
                <!-- /Mobile packs -->

                <!-- Internet packs -->
                <?php if ( have_rows( 'internet_packs', 'option' ) ): ?>
                    <div class="ip-wrap col-md-6" data-type="internet">
                        <article class="ip ip--alt <?php if ( in_array( 'internet', $precheck ) ): ?>selected<?php endif; ?>">
                            <figure class="ip__icon svg-ic svg-ic--internet"></figure>

                            <p class="ip__name mg-large"><?php _e( 'Домашний интернет', 'csc-telecom' ); ?></p>

                            <div class="ip__select">
                                <select name="internet">
                                    <?php $i = 1; while ( have_rows( 'internet_packs', 'option' ) ): the_row(); ?>
                                        <option value="<?php echo $i; ?>">EUR <?php the_sub_field( 'price' ); ?> - <?php the_sub_field( 'name' ); ?> - <?php the_sub_field( 'speed' ); ?> <?php the_sub_field( 'speed_label' ); ?></option>
                                    <?php $i++; endwhile; ?>
                                </select>
                            </div>

                            <?php if ( $more = get_field( 'internet_packs_learn_more', 'option' ) ): ?>
                                <div class="ip__more">
                                    <a href="<?php echo esc_url( $more ); ?>"><?php _e( 'узнать больше', 'csc-telecom' ); ?></a>
                                </div>
                            <?php endif; ?>

                            <button class="ip__btn btn btn-alt full-width js-config-add">
                                <span class="ip__btn-text"><?php _e( 'добавить', 'csc-telecom' ); ?></span>
                                <span class="ip__btn-ic ic ic-checkmark abs-center"></span>
                            </button>
                        </article>

                        <?php $i = 1; while ( have_rows( 'internet_packs', 'option' ) ): the_row(); ?>
                            <script>
                                config.items.all.internet.push( {
                                    id: <?php echo $i; ?>,
                                    name: '<?php the_sub_field( 'name' ); ?>',
                                    price_old: parseFloat( <?php the_sub_field( 'price' ); ?> ), 
                                    price: parseFloat( <?php the_sub_field( 'price' ); ?> ),
                                    price_display: parseFloat( <?php the_sub_field( 'price' ); ?> ).toFixed( 2 ) + '<?php _e( '/месяц', 'csc-telecom' ); ?>',
                                    desc: '<?php the_sub_field( 'speed' ); ?> <?php the_sub_field( 'speed_label' ); ?>'
                                } );
                            </script>
                        <?php $i++; endwhile; ?>
                    </div>
                <?php endif; ?>
                <!-- /Internet packs -->

                <!-- Gold numbers -->
                <?php if ( have_rows( 'numbers', 'phone-numbers' ) ): ?>
                    <?php $num_price = get_field( 'price', 'phone-numbers' ); ?>

                    <div class="ip-wrap col-md-6" data-type="number">
                        <article class="ip ip--alt <?php if ( in_array( 'number', $precheck ) ): ?>selected<?php endif; ?>">
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

                            <button class="ip__btn btn btn-alt full-width js-config-add">
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
                <?php endif; ?>
                <!-- /Gold numbers -->
            </div>

            <!-- Config result -->
            <?php if ( get_field( 'co_sub_title' ) ): ?>
                <p class="cfg-sub-title fw-black text-center"><?php the_field( 'co_sub_title' ); ?></p>
            <?php endif; ?>

            <div class="cfg-res flex-lg justify-content-lg-between">
                <div class="cfg-res-item active" data-name="result">
                    <div class="cfg-res-item__inner">
                        <div class="cfg-res-item__price-wrap">
                            <div class="cfg-res-item__old-price flex justify-content-end align-items-center">
                                <p class="p-xtra-small strikethrough strikethrough--black">€ <span data-name="old_price">13,98</span><?php _e( '/месяц', 'csc-telecom' ); ?></p>
                                <p class="discount-tag">-<?php echo $mob_discount; ?>%</p>
                            </div>

                            <p class="cfg-res-item__new-price c-primary-alt p-large fw-black text-right">€ <span data-name="new_price">11.98</span><?php _e( '/месяц', 'csc-telecom' ); ?></p>
                        </div>

                        <div class="btn-wrap">
                            <button class="btn btn-default btn-large full-width js-make-request" data-fancybox data-src="#request"><?php _e( 'запросить', 'csc-telecom' ); ?></button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Config result -->
        </div>
    </div>
    <!-- /Configurator -->

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
                            <h3 class="form-title"><?php _e( 'Saime teie päringu kätte!', 'csc-telecom' ); ?></h3>
                            <p class="form-sub-title p"><?php _e( 'Võtame teiega ühendust lähiajal.', 'csc-telecom' ); ?></p>
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
    <div class="flex justify-content-center">
        <figure class="cfg-decor">
            <img src="<?php echo URL_THEME; ?>/assets/img/owl-4.png">
        </figure>
    </div>
    <!-- /End decor -->
</div>

<script>
    <?php if ( in_array( 'tv', $precheck ) ): ?>
        config.items.current.tv = config.items.all.tv.find( x => x.id == 1 );
    <?php endif; ?>

    <?php if ( in_array( 'mobile', $precheck ) ): ?>
        config.items.current.mobile = config.items.all.mobile.find( x => x.id == 1 );
    <?php endif; ?>

    <?php if ( in_array( 'number', $precheck ) ): ?>
        config.items.current.number = config.items.all.number.find( x => x.id == 1 );
    <?php endif; ?>

    <?php if ( in_array( 'internet', $precheck ) ): ?>
        config.items.current.internet = config.items.all.internet.find( x => x.id == 1 );
    <?php endif; ?>

    jQuery( document ).ready( function( $ ) {
        config.init();
    } );
</script>

<?php get_footer(); ?>