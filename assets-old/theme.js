/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = "./resources/theme.js");
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/script.js":
/*!********************************!*\
  !*** ./resources/js/script.js ***!
  \********************************/
/*! no static exports found */
/***/ (function(module, exports) {

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


    $( '.numbers-slider' ).slick( {
        infinite: false,
        slidesToShow: 1,
        slidesToScroll: 1,
        prevArrow: '<div class="slick-prev"><span class="ic ic-arrow-left"></span></div>',
        nextArrow: '<div class="slick-next"><span class="ic ic-arrow-right"></span><span class="arrow-label">Еще номера</span></div>'
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

        afterClose: function( instance, current ) {

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



} );

/***/ }),

/***/ "./resources/scss/style.scss":
/*!***********************************!*\
  !*** ./resources/scss/style.scss ***!
  \***********************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "./resources/theme.js":
/*!****************************!*\
  !*** ./resources/theme.js ***!
  \****************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

window.$ = window.jQuery

__webpack_require__(/*! ./scss/style.scss */ "./resources/scss/style.scss")
__webpack_require__(/*! ./js/script.js */ "./resources/js/script.js")

/***/ })

/******/ });
//# sourceMappingURL=theme.js.map