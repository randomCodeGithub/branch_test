var $w = $( window );
var $d = $( document );


/**
 * Animation related scripts.
 */
var animations = {
    offset: 40,
    elements: []
}

/**
 * Loops through all animatable elements
 * and adds 'animate' class when element is in viewport.
 */
function animatePage() {

    // Loop through all saved elements.
    for ( var i = 0; i < animations.elements.length; i++ ) {
        var $el = $( '[data-an-id="' + animations.elements[i].id + '"]' );

        var offset = ( $el[ 0 ].hasAttribute( 'data-an-offset' ) ) ? parseInt( $el.attr( 'data-an-offset' ) ) : animations.offset;

        // Check if current element is visible within viewport.
        if ( $el.isOnScreen( function( deltas ) { return deltas.top >= animations.offset && deltas.bottom >= animations.offset; } ) ) {

            // Handle the animation.
            handleAnimation( animations.elements[i] );

            /*
             * Remove current element from array so that loop
             * doesn't iterate over it again. Also must substract 1
             * from current index.
             */
            animations.elements.splice( i, 1 );
            i--;

            // If there are no more elements, unbind animations scroll event.
            if ( animations.elements.length == 0 ) {
                $d.off( 'scroll.animations' );
            }

        }

    }

}

/**
 * Handles an animation based on the type.
 *
 * @param {object} el
 */
function handleAnimation( el ) {

    var $el = $( '[data-an-id="' + el.id + '"]' );

    if ( el.type == 'sequence' ) {

        // Handle 'sequence' type aniamtions.
        $el.find( '[data-an]' ).each( function( i, el ) {
            setTimeout(function(){
                $( el ).attr( 'data-an-complete', true );
            }, 50 + ( i * 200 ) );
        });

        $el.attr( 'data-an-complete', true );

    } else {

        // Handle 'single' type animations.
        // Check if animation should be fired after a time.
        if ( el.wait > 0 ) {
            setTimeout( function() {
                $el.attr( 'data-an-complete', true );
            }, el.wait);
        } else {
            $el.attr( 'data-an-complete', true );
        }
    }

}

/** End of: Animation related scripts */


jQuery( document ).ready( function( $ ) {

    var $b = $( 'body' );
    var w_w = $w.width();

    var breakpoints = {
        tablet: 1099,
        mobile: 767
    };


    /**
     * Initialize sumo select.
     */
    $( '.select' ).SumoSelect( {
        search: true,
        searchText: php.str_search + '...'
    } );

    function sumo_discount( price ) {
        price = parseFloat( price ).toFixed( 2 );
        price_prep = 'EUR <strong class="strikethrough strikethrough--black">' + price + '</strong> / ';

        return price_prep;
    }

    $( '.ip__select select' ).each( function( i, select ) {

        $( select ).SumoSelect();

        // Append discounted price to selectbox.
        if ( select.hasAttribute( 'data-mobile-discount' ) ) {
            // Set discount proce for options.
            $( select ).parent().find( '.optWrapper li' ).each( function( x, li ) {
                var price_prep = sumo_discount( $( 'option:nth-child(' + ( x + 1 ) + ')', select ).attr( 'data-new-price' ) )

                $( 'label', li ).prepend( price_prep );
            } );

            // Set discount price for initial option.
            $( select ).parent().find( '.CaptionCont > span' ).html( $( select ).parent().find( '.optWrapper li:first-child label' ).html() );

            // Set discount price when selecting option.
            $( select ).on( 'sumo:closed', function( sumo ) {
                var price_prep = sumo_discount( $( 'option[value="' + select.value + '"]', select ).attr( 'data-new-price' ) )

                if ( ! $( select ).parent().find( '.CaptionCont > span strong' ).length ) {
                    $( select ).parent().find( '.CaptionCont > span' ).prepend( price_prep );   
                }
            } );
        }
    } );

    /**
     * Filter out country-rate-block
     * by selected value in selectbox.
     */
    $d.on( 'change', '.js-country-rate-picker', function() {
        $( '[data-ajax="country-rates"]' ).empty();

        if ( this.value == '0' ) {
            return false;
        }

        var $wrap = $( this ).closest( '.select-wrap' ).addClass( 'loading' );

        $.get( site_url + '/wp-json/csc-telecom/get-country-rates/?country=' + this.value, function( data ) {
            $( '[data-ajax="country-rates"]' ).empty().append( data );

            $wrap.removeClass( 'loading' );
        } );
    } );

    $d.on( 'click', '.tabs .header button', function() {
        var $el   = $( this );
        var $wrap = $el.closest( '.tabs' );

        $( '.header button', $wrap ).removeClass( 'active' );
        $el.addClass( 'active' );

        $( '.tab', $wrap ).removeClass( 'active' );
        $( '.tab[data-tab="' + $el.attr( 'data-tab' ) + '"]', $wrap ).addClass( 'active' );
    } );

    $( '.numbers-slider' ).slick( {
        infinite: false,
        slidesToShow: 1,
        slidesToScroll: 1,
        prevArrow: '<div class="slick-prev"><span class="ic ic-arrow-left"></span></div>',
        nextArrow: '<div class="slick-next"><span class="ic ic-arrow-right"></span><span class="arrow-label">' + php.str_more_numbers + '</span></div>'
    } );

    var itt = $( 'textarea[name="your-message"]' );

    $( '.input-to-text input' ).on( 'change', function() {
        var text  = itt.val();
        var value = this.value;

        if ( $( this ).is( ':checked' ) ) {
            itt.val( text + ' ' + value + ',' );
        } else {
            itt.val( text.replace( ' ' + value + ',', '' ) );
        }
    } );

    if ( $( '.input-to-text input:checked' ).length ) {
        $( '.input-to-text input:checked' ).each( function( i, el ) {
            var text  = itt.val();
            var value = el.value;
    
            if ( $( el ).is( ':checked' ) ) {
                itt.val( text + ' ' + value + ',' );
            } else {
                itt.val( text.replace( ' ' + value + ',', '' ) );
            }
        } );
    }

    (function( $ ) {
    // the sameHeight functions makes all the selected elements of the same height
    $.fn.sameHeight = function() {
        var selector = this;
        var heights = [];

        // Save the heights of every element into an array
        selector.each(function(){
            var height = $(this).height();
            heights.push(height);
        });

        // Get the biggest height
        var maxHeight = Math.max.apply(null, heights);
        // Show in the console to verify
        //console.log(heights,maxHeight);

        // Set the maxHeight to every selected element
        selector.each(function(){
            $(this).height(maxHeight);
        });
    };

}( jQuery ));

    var count = $(".csc-block-features-table-big-2 .f-row-big-table-description .col-check:first-child .checklist-row").length;
    var i;
    for (i = 0; i < count; i++) {
      $('.csc-block-features-table-big-2 .f-row-big-table-description .checklist .checklist-row:nth-child(' + i + ') .features-block').sameHeight();
    }


    /**
     * Animation related scripts.
     */

    /**
     * Prepare elements that needs to be animated
     * and save reference into the array.
     */
    $( '[data-an]' ).each( function( i, el ) {

        /*
         * Check if element has 'data-an-type' attribute
         * and add reference only if it has. Sequence animation
         * items won't have this attribute and it's fine, since
         * they are not needed inside references.
         */
        if ( el.hasAttribute( 'data-an-type' ) && getComputedStyle(el)['display'] != 'none' ) {

            $( el ).attr({
                'data-an-id': i,
                'data-an-complete': false
            });

            animations.elements.push({
                id: i,
                type: el.dataset.anType,
                wait: ( el.hasAttribute( 'data-an-wait' ) ) ? parseInt( el.dataset.anWait ) : 0
            });

        }

    });

    /**
     * Check if page has any animations and bind function
     * that animates page on scroll event. Also run animatePage
     * function to animate elements that are already in viewport.
     */
    if ( animations.elements.length > 0 ) {
        $d.on( 'scroll.animations', animatePage );
        $w.on( 'load', animatePage );
    }

    /** End of: Animation related scripts */


    /**
     * Toggle navigation.
     */
    $d.on( 'click', '.js-toggle-nav', function() {
        $b.toggleClass( 'nav-open' );
    } );

    $d.on( 'click', '.nav-bg', function() {
        $b.removeClass( 'nav-open' );
    } );


    /**
     * Content slider.
     */
    $( '.content-slider' ).slick( {
        prevArrow: '<button type="button" class="slick-prev"><span class="ic ic-arrow-left"></span></button>',
        nextArrow: '<button type="button" class="slick-next"><span class="ic ic-arrow-right"></span></button>'
    } );


    /**
     * Fancybox.
     */
    $( '[data-fancybox]' ).fancybox( {
        touch: false,
        beforeShow: function() {
            $( 'html' ).addClass( 'fbox-open' );
        },
        afterShow: function( instance, current ) {
            if ( $( '.g-recaptcha', current.$content ).length && ! $( '.g-recaptcha iframe', current.$content ).length ) {
                grecaptcha.render( $( '.g-recaptcha', current.$content )[0], {
                    'sitekey' : $( '.g-recaptcha', current.$content ).attr( 'data-sitekey' )
                });
            }
        },
        afterClose: function( instance, current ) {
            $( 'html' ).removeClass( 'fbox-open' );

            if ( $( current.src ).find( '.request-form' ).length > 0 ) {
                $( current.src ).find( 'form' )[ 0 ].reset();
                $( current.src ).find( '.wpcf7-response-output' ).hide();

                $( current.src ).find( '.request-form .regular' ).removeClass( 'hide' );
                $( current.src ).find( '.request-form .success' ).addClass( 'hide' );
            }
        }
    } );



    /**
     * Switch to success message on successful request form submission.
     */
    $( '.wpcf7 [type="submit"]' ).on( 'click', function() {
        $( this ).addClass( 'loading' );
    } );

    document.addEventListener( 'wpcf7submit', function( event ) {
        $( '.wpcf7 [type="submit"]' ).removeClass( 'loading' );
    }, false );

    document.addEventListener( 'wpcf7mailsent', function( event ) {

        $( '.fancybox-stage .request-form .regular' ).addClass( 'hide' );
        $( '.fancybox-stage .request-form .success' ).removeClass( 'hide' );

    }, false );



    /**
     * Same height list for price request block.
     */
    function priceRequestListHeight() {

        if ( $( '.csc-block-price-request .list' ).length > 0 ) {

            var highest = 0;

            $( '.csc-block-price-request' ).each( function( i, el ) {
                if ( $( '.list', el ).length > 0 && $( '.list', el ).height() > highest )  {
                    highest = $( '.list', el ).height();
                }
            } );

            $( '.csc-block-price-request .list' ).height( highest );

        }

    }

    priceRequestListHeight();



    /**
     * Features table feature column offset.
     */
    function featureTableColumnOffset() {

        $( '.csc-block-features-table' ).each( function( i, el ) {

            var highest = 0;
            var titleHeight = $( '.features-title', el ).outerHeight( true );

            $( '.header', el ).each( function( i, el ) {
                var height = $( el ).outerHeight();

                highest = ( height > highest ) ? height : highest;
            } );

            $( '.col-features', el ).css( 'padding-top', highest - titleHeight + 12 );

        } );

    }

    featureTableColumnOffset();



    /**
     * Prepare info blocks for responsive.
     */
    var $info_blocks = $( '.csc-block-info-block.smart-business-info, .csc-block-info-block.stretch-on-handheld' );

    $info_blocks.each( function( i, el ) {

        var $block = $( el );
        var $parent = $block.parent();

        if ( $parent.hasClass( 'wp-block-column' ) && $parent.next().hasClass( 'wp-block-column' ) ) {
            $block.closest( '.wp-block-columns' ).addClass( 'has-info-blocks stretch-md' );
        }

    } );



    /**
     * Stretch element width.
     */

    var $stretch_md = $( '.stretch-md' );

    function stretchElements() {

        $stretch_md.each( function( i, el ) {

            var $el = $( el );
            var gutter = ( el.hasAttribute( 'data-gutter' ) ) ? parseInt( $el.attr( 'data-gutter' ) ) : 20;

            // Reset margins to properly calculate offset.
            $el.css( {
                marginLeft: '',
                marginRight: ''
            } );

            var offset = $el.offset().left - gutter;
            var margin = '-' + offset + 'px';

            $el.css( {
                marginLeft: margin,
                marginRight: margin
            } );

        } );

    }



    if ( $stretch_md.length && w_w <= breakpoints.tablet ) {

        stretchElements();

        $w.on( 'resize', stretchElements );

    }



    /**

     * Move post list block to the main column on responsive mode.

     */

    var $post_list = $( '.csc-block-post-list' );



    function movePostList() {

        $post_list.each( function( i, el ) {

            var $el = $( el );

            $el.appendTo( $el.closest( '.editor > .container' ).find( '> .wp-block-columns' ).last() );

        } );

    }



    if ( $post_list.length && w_w <= breakpoints.tablet ) {

        movePostList();

    }



    /**

     * Initialize Google Maps.

     */

    var gmapRetry = 0;

    var $map = $( '.map' );



    function initMap() {

        if ( $map.length ) {

            /*

             * Check if API has loaded already and load map.

             * If not, retry after 100 ms.

             */

            if ( typeof google != 'undefined' ) {

                var el = $map[ 0 ];



                var pos = {

                    lat: parseFloat( el.dataset.lat ),

                    lng: parseFloat( el.dataset.lng )

                };



                var zoom = ( w_w <= breakpoints.mobile ) ? 14 : 16;



                setTimeout( function() {

                    var map = new google.maps.Map( el, {

                        center: pos,

                        zoom: zoom,

                        disableDefaultUI: true,

                        gestureHandling: 'none'

                    } );



                    new google.maps.Marker( {

                        position: pos,

                        map: map,

                        icon: php.theme_url + '/assets/img/marker.png'

                    } );

                }, 2500 );

            } else {

                gmapRetry++;

                setTimeout( initMap, 100 );

            }

        }

    }



    initMap();


    function stretch_blocks() {
        $( '.c-packages' ).each( function( i, el ) {
            var $block = $( el );

            $block.css( 'width', '' );
            $block.css( 'margin-left', '' );

            var width  = $( '.site-content' ).width();
            var offset = $block.offset().left;
    
            $block.width( width );

            console.log(offset);
    
            if ( width + offset > $( window ).width() ) {
                $block.css( 'margin-left', '-' + ( offset ) + 'px' );
            }
        } );
    }

    setTimeout( stretch_blocks, 250 );
    $( window ).on( 'resize', stretch_blocks );

    /**
     * Fixed table header row for .c-packages block.
     */
     var c_packages = {
        active: false,
        height: 0,
        offset: 0
    };

    if ( $('.c-packages').length ) {
        c_packages.active = true;
        c_packages.height = ( $(window).width() >= 1100 ) ? $( '.c-packages' ).height() : $( '.c-packages .c-tbl' ).height();
        c_packages.offset = ( $(window).width() >= 1100 ) ? $( '.c-packages__packages' ).offset().top + $( '.c-pkg__image' ).height() : $( '.c-packages .c-tbl' ).offset().top;
    }

    $( document ).on( 'scroll', function() {
        var st = $( document ).scrollTop();

        if ( st >= c_packages.offset && st < c_packages.offset + c_packages.height - $('.c-packages__headers').outerHeight() ) {
            $( 'body' ).addClass( 'show-packages-headers' );
        } else {
            $( 'body' ).removeClass( 'show-packages-headers' );
        }
    } );

    /**
     * Fancy sub menus.
     */
    $( '.has-fancy-sub-menu > a' ).on( 'click', function( e ) {
        e.preventDefault();
        e.stopPropagation();

        var $menu = $( '.fsm-wrap[data-id="' + this.dataset.fsm + '"]' );

        $( '.fsm-wrap:not([data-id="' + this.dataset.fsm + '"])' ).removeClass( 'active' );
        $( '.nav-main .active' ).not( this ).removeClass( 'active' );

        if ( $menu.length ) {
            if ( ! $menu.hasClass( 'active' ) ) {
                $( this ).addClass( 'active' );
                $menu.addClass( 'active' );
            } else {
                $( this ).removeClass( 'active' );
                $menu.removeClass( 'active' );
            }
        }
    } );

    $( document ).on( 'click', function() {
        $( '.fsm-wrap, .nav-main .active' ).removeClass( 'active' );
    } );

} );
