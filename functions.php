<?php
/**
 * CSC Telecom functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage CSCTelecom
 * @since 1.0.0
 */

/**
 * Define constants for global usage.
 */
define( 'TD', wp_get_theme()->get( 'TextDomain' ) );
define( 'VER', wp_get_theme()->get( 'Version' ) );
define( 'HOST', parse_url( home_url() )['host'] );
define( 'PATH_THEME', get_stylesheet_directory() );
define( 'URL_THEME', get_stylesheet_directory_uri() );
define( 'ID_FRONT', get_option( 'page_on_front' ) );

/**
 * Theme styles and scripts.
 */
include_once PATH_THEME . '/includes/assets.php';

/**
 * Custom Gutenberg blocks.
 */
include_once PATH_THEME . '/includes/blocks.php';

/**
 * Theme image sizes.
 */
include_once PATH_THEME . '/includes/images.php';

/**
 * Register theme menus.
 */
function register_theme_nav() {
    register_nav_menus(
        array(
            'header-1-nav'   => __( 'Header Navigation 1', TD ),
            'header-2-nav'   => __( 'Header Navigation 2', TD ),
            'header-new-nav' => __( 'Header (New)' ),
            'footer-1-nav'   => __( 'Footer Navigation 1', TD ),
            'footer-2-nav'   => __( 'Footer Navigation 2', TD )
        )
    );
}

/**
 * Remove unnecessary admin menu items.
 */
function custom_menu_page_removing() {
    $pages_to_remove = array(
        'edit.php',
        'edit-comments.php'
    );

    foreach ( $pages_to_remove as $page ) {
        remove_menu_page( $page );
    }
}
add_action( 'admin_menu', 'custom_menu_page_removing' );

/**
 * Remove auto paragraphs from Contact Form 7.
 */
add_filter( 'wpcf7_autop_or_not', '__return_false' );

/**
 * Modify main query on specific views.
 */

function my_pre_get_posts( $query ) {
    if ( is_tax( 'smart_business_category' ) && $query->is_main_query() ) {
        $query->query_vars[ 'orderby' ] = 'menu_order';
        $query->query_vars[ 'order' ] = 'ASC';
    }
}

add_action( 'pre_get_posts', 'my_pre_get_posts' );

/**
 * Add custom options pages.
 */
acf_add_options_page( array(
    'page_title' => __( 'Options', TD ),
    'menu_slug' => 'service-options',
    'parent_slug' => 'edit.php?post_type=service',
    'post_id' => 'service-option-' . ICL_LANGUAGE_CODE
) );

acf_add_options_page( array(
    'page_title' => __( 'Options', TD ),
    'menu_slug' => 'equipment-options',
    'parent_slug' => 'edit.php?post_type=equipment',
    'post_id' => 'equipment-option-' . ICL_LANGUAGE_CODE
) );

acf_add_options_page( array(
    'page_title' => __( 'Options', TD ),
    'menu_slug' => 'solution-options',
    'parent_slug' => 'edit.php?post_type=solution',
    'post_id' => 'solution-option-' . ICL_LANGUAGE_CODE
) );

acf_add_options_page( array(
    'page_title' => __( 'Options', TD ),
    'menu_slug' => 'resource-options',
    'parent_slug' => 'edit.php?post_type=resource',
    'post_id' => 'resource-option-' . ICL_LANGUAGE_CODE
) );

acf_add_options_page( array(
    'page_title' => __( 'Options', TD ),
    'menu_slug' => 'use_case-options',
    'parent_slug' => 'edit.php?post_type=use_case',
    'post_id' => 'use_case-option-' . ICL_LANGUAGE_CODE
) );

/**
 * Register custom shortcode attributes for modal request form.
 */

function my_shortcode_atts_wpcf7( $out, $pairs, $atts ) {
    $my_atts = array( 'module-title', 'page-link', 'internet-pack', 'mobile-pack', 'tv-pack', 'gold-number', 'result-price', 'tv', 'mobile', 'number', 'internet' );

    foreach ( $my_atts as $my_attr ) {
        if ( isset( $atts[ $my_attr ] ) ) {
            $out[ $my_attr ] = $atts[ $my_attr ];
        }
    }

    return $out;
}

add_filter( 'shortcode_atts_wpcf7', 'my_shortcode_atts_wpcf7', 10, 3 );

/**
 * Add current menu item class for post types.
 */

function special_nav_class( $classes, $item ) {
    $curr = 'current-menu-item';

    if ( $item->object == 'service' && is_singular( 'service' ) ) {
        $classes[] = $curr;
    }

    if ( $item->object == 'equipment' && is_tax( 'equipment_category' ) || $item->object == 'equipment' && is_singular( 'equipment' ) ) {
        $classes[] = $curr;
    }

    if ( $item->object == 'smart_business_category' && is_singular( 'smart_business' ) ) {
        $terms = get_the_terms( get_the_ID(), 'smart_business_category' );
        
        if ( ! is_wp_error( $terms ) && $terms ) {
            foreach ( $terms as $term ) {
                if ( $term->term_id == $item->object_id ) {
                    $classes[] = $curr;

                    break;
                }
            }
        }
    }

    return $classes;
}

add_filter( 'nav_menu_css_class' , 'special_nav_class' , 10 , 2 );

/**
 * Bitrix integration
 */
require_once PATH_THEME . '/includes/Bitrix24.php';

new Bitrix24( BITRIX24_INBOUND_WEBHOOK_URL );
// require_once PATH_THEME . '/includes/Bitrix.php';

// $bx = new Bitrix( 'csc', '92', 'l3dqeez6we1hokxj', 's$cnAE40c4' );










//$bx = new Bitrix( 'demo-bitrix', '7', 'fo0ftu35k8jxg5m9', '!qwerty@£' ); 







/**
 * Add options page for phone numbers.
 */
function csc_phone_numbers_options_pages() {

    $main = acf_add_options_page( array(
        'page_title' => __( 'CSC Telecom' ),
        'position'   => 11.1
    ) );
    
    acf_add_options_sub_page( array(
        'page_title'  => __( 'Phone Numbers' ),
        'menu_slug'   => 'phone-numbers',
        'post_id'     => 'phone-numbers',
        'parent_slug' => $main['menu_slug'],
        'position'    => 0
    ) );

    acf_add_options_sub_page( array(
        'page_title'  => __( 'Country Rates' ),
        'menu_slug'   => 'country-rates',
        'post_id'     => 'country-rates',
        'parent_slug' => $main['menu_slug'],
        'position'    => 1
    ) );

    acf_add_options_sub_page( array(
        'page_title'  => __( 'Mobile Packs' ),
        'menu_slug'   => 'mobile-packs',
        'parent_slug' => $main['menu_slug'],
        'position'    => 2
    ) );

    acf_add_options_sub_page( array(
        'page_title'  => __( 'Internet Packs' ),
        'menu_slug'   => 'internet-packs',
        'parent_slug' => $main['menu_slug'],
        'position'    => 3
    ) );

    acf_add_options_sub_page( array(
        'page_title'  => __( 'TV Packs' ),
        'menu_slug'   => 'tv-packs',
        'parent_slug' => $main['menu_slug'],
        'position'    => 4
    ) );

}

add_action( 'acf/init', 'csc_phone_numbers_options_pages' );

function add_site_options() {

    // Phone numbers importer page.
    add_submenu_page(
        'phone-numbers',
        __( 'Phone Numbers Import' ),
        __( 'Phone Numbers Import' ),
        'manage_options',
        'numbers-importer',
        'csc_numbers_importer_page',
        1
    );

    // Country rates importer page.
    add_submenu_page(
        'phone-numbers',
        __( 'Country Rates Import' ),
        __( 'Country Rates Import' ),
        'manage_options',
        'country-rates-import',
        'csc_country_rates_import_page',
        10
    );

}

add_action( 'admin_menu', 'add_site_options', 105 );

/**
 * Admin notices.
 */
function csc_admin_notice( $text, $type = 'warning' ){

    $html  = '<div class="notice notice-' . $type . '">';
    $html .= '<p>' . $text . '</p>';
    $html .= '</div>';

    echo $html;

}

/**
 * Generate markup for Importer page.
 */
function csc_numbers_importer_page() {

    if ( isset( $_FILES['upload'] ) ) {

        $wp_uploads    = wp_upload_dir();
        $target_dir    = $wp_uploads['basedir'] . '/custom/';
        $target_file_f = $target_dir . basename( $_FILES['upload']['name'] );
        $target_file   = $target_dir . '/numbers.xlsx';
        $file_type     = strtolower( pathinfo( $target_file_f, PATHINFO_EXTENSION ) );
        $errors        = false;

        // Check file type.
        if ( $file_type !== 'xlsx' ) {
            csc_admin_notice( 'File type must be "xlsx".', 'error' );
            $errors = true;
        }

        if ( ! $errors ) {
            if ( move_uploaded_file( $_FILES['upload']['tmp_name'], $target_file) ) {
                csc_admin_notice( 'File uploaded successfully.', 'success' );

                // Parse xlsx file.
                require_once get_stylesheet_directory() . '/includes/SimpleXLSX.php';
                $xlsx = SimpleXLSX::parse( $target_file );

                if ( $xlsx->rows() && ! empty( $xlsx->rows() ) ) {

                    $arr = array();

                    // Add imported numbers to array.
                    foreach ( $xlsx->rows() as $number ) {
                        $arr[] = '' . $number[0];
                    }

                    if ( $_POST['import_method'] == 'append' ) {
                        $existing_numbers = get_field( 'numbers', 'phone-numbers' );
            
                        // Add existing numbers to array.
                        foreach ( $existing_numbers as $field ) {
                            $arr[] = $field['number'];
                        }
                    }
                
                    sort( $arr );
                
                    delete_field( 'numbers', 'phone-numbers' );
                
                    foreach ( $arr as $number ) {
                        add_row( 'numbers', array( 'number' => $number ), 'phone-numbers' );
                    }

                    csc_admin_notice( count( $xlsx->rows() ) . ' numbers added and sorting updated.', 'success' );

                }

            } else {
                csc_admin_notice( 'Error uploading file.', 'error' );
            }
        }

    }

    include_once get_stylesheet_directory() . '/templates/admin-importer.php';

}

/**
 * Generate markup for country rate import page.
 */
function csc_country_rates_import_page() {

    $eu_countries = array(
        'Austria',
        'Belgium',
        'Bulgaria',
        'Croatia',
        'Cyprus',
        'Czechia',
        'Denmark',
        'Estonia',
        'Finland',
        'France',
        'Germany',
        'Greece',
        'Hungary',
        'Ireland',
        'Italy',
        'Latvia',
        'Lithuania',
        'Luxembourg',
        'Malta',
        'Netherlands',
        'Poland',
        'Portugal',
        'Romania',
        'Slovakia',
        'Slovenia',
        'Spain',
        'Sweden'
    );

    $wp_uploads = wp_upload_dir();
    $target_dir = $wp_uploads['basedir'] . '/custom/';

    if ( isset( $_FILES['upload'] ) ) {

        $target_file_f = $target_dir . basename( $_FILES['upload']['name'] );
        $file_type     = strtolower( pathinfo( $target_file_f, PATHINFO_EXTENSION ) );
        $errors        = false;

        if ( $_POST['import_type'] == 'calls_sms' ) {
            $target_file = $target_dir . '/country-rates.xlsx';
        } elseif ( $_POST['import_type'] == 'network' ) {
            $target_file = $target_dir . '/country-network.xlsx';
        }

        // Check file type.
        if ( $file_type !== 'xlsx' ) {
            csc_admin_notice( 'File type must be "xlsx".', 'error' );
            $errors = true;
        }

        if ( ! $errors ) {
            if ( move_uploaded_file( $_FILES['upload']['tmp_name'], $target_file) ) {
                csc_admin_notice( 'File uploaded successfully.', 'success' );
            } else {
                csc_admin_notice( 'Error uploading file.', 'error' );
            }
        }

    }

    $status = false;

    if ( file_exists( $target_dir . 'country-rates.xlsx' ) ) {
        $status = true;
    }



    /*
     * Rebuild JSON.
     */
    if ( isset( $_POST['rebuild'] ) ) {
        $file_calls   = $target_dir . 'country-rates.xlsx';
        $file_network = $target_dir . 'country-network.xlsx';

        require_once get_stylesheet_directory() . '/includes/SimpleXLSX.php';

        // Get data from Calls/SMS file.
        if ( file_exists( $file_calls ) ) {
            $xlsx = SimpleXLSX::parse( $file_calls );

            // Build country dropdown from first sheet.
            $countries = array();
            $country_names = array();

            if ( $xlsx->rows(0) ) {
                foreach ( $xlsx->rows(0) as $i => $row ) {
                    // Skip column headers.
                    if ( $i === 0 ) {
                        continue;
                    }

                    $slug = sanitize_title( $row[0] );
                    $outgoing_type = ( strpos( $row[1], '*' ) === false ) ? 'inside' : 'outside';

                    if ( ! isset( $countries[$slug] ) ) {
                        $countries[$slug] = array(
                            'name' => $row[0],
                            'calls' => array(
                                'outgoing' => array(
                                    $outgoing_type => sprintf( '%.2f', round( $row[2], 2 ) )
                                )
                            ),
                            'network' => array()
                        );

                        $country_names[$slug] = array(
                            'en' => $row[0],
                            'et' => $row[0],
                            'ru' => $row[0]
                        );
                    } else {
                        $countries[$slug]['calls']['outgoing'][$outgoing_type] = sprintf( '%.2f', round( $row[2], 2 ) );
                    }
                }
            }

            // Build incoming call data.
            if ( $xlsx->rows(1) ) {
                foreach ( $xlsx->rows(1) as $i => $row ) {
                    // Skip column headers.
                    if ( $i === 0 ) {
                        continue;
                    }

                    $slug = sanitize_title( $row[0] );

                    if ( isset( $countries[$slug] ) ) {
                        $countries[$slug]['calls']['incoming'] = sprintf( '%.2f', round( $row[1], 2 ) );
                    } else {
                        $countries[$slug] = array(
                            'name' => $row[0]
                        );
                        $countries[$slug]['calls']['incoming'] = sprintf( '%.2f', round( $row[1], 2 ) );

                        $country_names[$slug] = array(
                            'en' => $row[0],
                            'et' => $row[0],
                            'ru' => $row[0]
                        );
                    }
                }
            }

            // Build SMS date.
            if ( $xlsx->rows(2) ) {
                foreach ( $xlsx->rows(2) as $i => $row ) {
                    // Skip column headers.
                    if ( $i === 0 ) {
                        continue;
                    }

                    $slug = sanitize_title( $row[0] );

                    if ( isset( $countries[$slug] ) ) {
                        $countries[$slug]['sms'] = sprintf( '%.2f', round( $row[1], 2 ) );
                    } else {
                        $countries[$slug] = array(
                            'name' => $row[0],
                            'sms' => sprintf( '%.2f', round( $row[1], 2 ) )
                        );
                    }
                }
            }
        }

        if ( file_exists( $file_network ) ) {
            unset( $xlsx );
            $xlsx = SimpleXLSX::parse( $file_network );

            if ( $xlsx->rows(1) ) {
                foreach ( $xlsx->rows(1) as $i => $row ) {
                    // Skip column headers.
                    if ( $i === 0 ) {
                        continue;
                    }

                    $slug = sanitize_title( $row[0] );

                    if ( isset( $countries[$slug] ) ) {
                        $countries[$slug]['network'][] = array(
                            'name' => $row[1],
                            'type' => $row[2]
                        );
                        $countries[$slug]['name_et'] = $row[5];
                        $countries[$slug]['name_ru'] = $row[6];
    
                        $country_names[$slug]['en'] = $row[0];
                        $country_names[$slug]['et'] = $row[5];
                        $country_names[$slug]['ru'] = $row[6];
                    } else {
                        $countries[$slug] = array(
                            'name' => $row[0],
                            'network' => array()
                        );

                        $countries[$slug]['network'][] = array(
                            'name' => $row[1],
                            'type' => $row[2]
                        );

                        $country_names[$slug] = array(
                            'en' => $row[0],
                            'et' => $row[5],
                            'ru' => $row[6]
                        );
                    }
                }
            }
        }

        ksort( $countries );
        ksort( $country_names );

        foreach ( $countries as $slug => $country ) {
            if ( in_array( $country['name'], $eu_countries ) ) {
                $countries[$slug]['eu'] = true;
            } else {
                $countries[$slug]['eu'] = false;
            }
        }

        $wp_dir = wp_upload_dir();
        $dir    = $wp_dir['basedir'] . '/json/';

        $fp  = fopen( $target_dir . 'country-rates-db.json', 'w' );
        $fp2 = fopen( $target_dir . 'country-names-db.json', 'w' );

        $write  = fwrite( $fp, json_encode( $countries, JSON_UNESCAPED_UNICODE ) );
        $write2 = fwrite( $fp2, json_encode( $country_names, JSON_UNESCAPED_UNICODE ) );

        fclose( $fp );

        if ( $write !== false && $write2 !== false ) {
            csc_admin_notice( 'Database rebuilt successfully.', 'success' );
        } else {
            csc_admin_notice( 'Error rebuilding database. Try rebuilding it again.', 'error' );
        }
    }

    include_once get_stylesheet_directory() . '/templates/admin-country-rates-import.php';

}

/**
 * Add custom field placeholder
 * for Contact Form 7.
 */
function wpcf7_add_custom_form_tags() {

    wpcf7_add_form_tag( 'private_or_business', 'wpcf7_private_or_business_form_tag_handler', array(
        'name-attr' => true
    ) );

    wpcf7_add_form_tag( 'phone_numbers', 'wpcf7_phone_numbers_form_tag_handler', array(
        'name-attr' => true
    ) );

    wpcf7_add_form_tag( 'mobile_packs', 'wpcf7_mobile_packs_form_tag_handler', array(
        'name-attr' => true
    ) );

}

add_action( 'wpcf7_init', 'wpcf7_add_custom_form_tags' );

/**
 * Markup for new fields.
 */
function wpcf7_private_or_business_form_tag_handler( $tag ) {

    if ( $tag->values && is_array( $tag->values ) ) {
        ob_start();

        get_template_part( 'template-parts/form-tag', 'private_or_business', [
            'labels' => [
                'private'  => $tag->values[0],
                'business' => $tag->values[1]
            ]
        ] );
    
        return ob_get_clean();
    }

    return;

}

function wpcf7_phone_numbers_form_tag_handler( $tag ) {

    $numbers = get_field( 'numbers', 'phone-numbers' );
    $count   = ( $numbers ) ? count( $numbers ) : 0;
    $res     = 'Nothing to display!';

    if ( isset( $_GET['number'] ) && is_numeric( $_GET['number'] ) ) {
        $selected = strip_tags( htmlspecialchars( $_GET['number'] ) );
    } else {
        $selected = false;
    }

    if ( ! empty( $numbers ) ) {
        $res  = '<div class="ccf-block wpcf7-phone-numbers">';
        $res .= '<div class="numbers-slider">';

        $res .= '<div class="slide">';
        $res .= '<div class="row">';

        $i = 0;
        foreach ( $numbers as $field ) {
            $checked = ( $selected && $selected == $field['number'] ) ? 'checked' : '';

            $res .= '<div class="radio-wrap col-lg-2 col-md-6">';
            $res .= '<label class="radio-box">';
            $res .= '<span class="wpcf7-form-control-wrap checkbox-403">';
            $res .= '<span class="wpcf7-form-control wpcf7-validates-as-required input-to-text">';
            $res .= '<span class="wpcf7-list-item first last">';
            $res .= '<input type="checkbox" name="phone_numbers[]" value="' . $field['number'] . '" ' . $checked . ' tabindex="0">';
            $res .= '<span class="wpcf7-list-item-label">' . $field['number'] . '</span>';
            $res .= '</span>';
            $res .= '</span>';
            $res .= '</span>';
            $res .= '</label>';
            $res .= '</div>';

            $i++;

            if ( $i % 6 == 0 && $i != $count && $i % 30 != 0 ) {
                $res .= '</div><div class="row">';
            }

            if ( $i % 6 == 0 && $i != $count && $i % 30 == 0 ) {
                $res .= '</div>';
            }

            if ( $i % 30 == 0 && $i != $count ) {
                $res .= '</div><div class="slide"><div class="row">';
            }
        }

        $res .= '</div>'; // Close .row
        $res .= '</div>'; // Close .slide

        $res .= '</div>'; // Close .number-sliders
        $res .= '</div>'; // Close .ccf-block
    }

    return $res;

}

function wpcf7_mobile_packs_form_tag_handler( $tag ) {

    $packs = get_field( 'mobile_packs', 'option' );

    if ( $tag->values && in_array( 'business', $tag->values ) ) {
        $packs = get_field( 'mobile_packs_business', 'option' );
    }

    $html  = '';

    if ( $packs ) {
        $html .= '<div class="ccf-block row">';

        foreach ( $packs as $pack ) {
            $html .= '<div class="radio-wrap col-lg-one-fifth col-md-6">';
            $html .= '<label class="radio-card">';
            $html .= '<div class="csc-block-price-request mg-md-small csc-block">';
            $html .= '<div class="inner">';

            // WPCF7 stuff
            $html .= '<span class="wpcf7-form-control-wrap">';
            $html .= '<span class="wpcf7-form-control wpcf7-checkbox wpcf7-validates-as-required input-to-text">';
            $html .= '<span class="wpcf7-list-item first last">';

            $html .= '<input type="checkbox" name="mobile_packs[]" value="' . $pack['name'] . '">';
            $html .= '<span class="wpcf7-list-item-label">' . $pack['name'] . '</span>';

            $html .= '</span>';
            $html .= '</span>';
            $html .= '</span>';
            // /WPCF7 stuff

            // Title
            $html .= '<p class="title mg-regular">' . $pack['name'] . '</p>';
            // /Title

            // Price
            $html .= '<div class="price-wrap">';
            $html .= '<span class="price h3">€ ' . $pack['price'] . ' </span> ';
            $html .= '<span class="period p-smaller">' . __( '/kuu', 'csc-telecom' ) . '</span>';
            $html .= '</div>';
            // /Price

            // Internet
            if ( $pack['internet'] ) {
                $html .= '<p class="internet-label p-smaller">' . __( 'Internet', 'csc-telecom' ) . '</p>';
                $html .= '<div class="internet-block">';

                foreach ( $pack['internet'] as $internet ) {
                    if ( isset( $internet['text'] ) && $internet['text'] ) {
                        $html .= '<div class="">';
                        $html .= '<span class="p-smaller">' . $internet['text'] . '</span>';
                        $html .= '</div>';
                    }
                }

                $html .= '</div>';
            }
            // /Internet

            // Description
            if ( $pack['description'] ) {
                $html .= '<div class="description-block">';
                $html .= '<span class="description p-smaller">' . $pack['description'] . '</span>';
                $html .= '</div>';
            }
            // /Description

            // Buttons
            $html .= '<div class="buttons">';
            $html .= '<div class="btn-wrap">';
            $html .= '<div class="btn btn-default full-width">' . __( 'Saada päring', 'csc-telecom' ) . '</div>';
            $html .= '</div>';
            $html .= '</div>';
            // /Buttons

            $html .= '</div>';
            $html .= '</div>';
            $html .= '</label>';
            $html .= '</div>';
        }

        $html .= '</div>';
    }

    return $html;

}

/**
 * Validate new fields.
 */
function wpcf7_private_or_business_validation_filter( $result, $tag ) {

    $empty = ( ! isset( $_POST[$tag->type] ) || empty( $_POST[$tag->type] ) );

    if ( $empty ) {
        $result->invalidate( $tag, wpcf7_get_message( 'invalid_required' ) );
    }

    return $result;

}
add_filter( 'wpcf7_validate_private_or_business', 'wpcf7_private_or_business_validation_filter', 10, 2 );

function wpcf7_phone_numbers_validation_filter( $result, $tag ) {

    $empty = ( ! isset( $_POST[$tag->type] ) || empty( $_POST[$tag->type] ) );
    $is_nums = true;

    if ( ! $empty ) {
        foreach ( $_POST[$tag->type] as $num ) {
            if ( ! is_numeric( $num ) ) {
                $is_nums = false;
                break;
            }
        }
    }

    if ( $empty ) {
        $result->invalidate( $tag, wpcf7_get_message( 'invalid_required' ) );
    }

    if ( ! $is_nums ) {
        $result->invalidate( $tag, wpcf7_get_message( 'invalid_required' ) );
    }

    return $result;

}
add_filter( 'wpcf7_validate_phone_numbers', 'wpcf7_phone_numbers_validation_filter', 10, 2 );

function wpcf7_mobile_packs_validation_filter( $result, $tag ) {

    $empty = ( ! isset( $_POST[$tag->type] ) || empty( $_POST[$tag->type] ) );

    if ( $empty ) {
        $result->invalidate( $tag, wpcf7_get_message( 'invalid_required' ) );
    }

    return $result;

}
add_filter( 'wpcf7_validate_mobile_packs', 'wpcf7_mobile_packs_validation_filter', 10, 2 );

/**
 * When saving, change the array to a comma,
 * separated list, just to make it easier 
 */
function csc_wpcf7_posted_data( $posted_data ) {

    if ( isset( $posted_data['phone_numbers'] ) ) {
        $posted_data['phone_numbers'] = implode( ', ', $posted_data['phone_numbers'] );
    }

    if ( isset( $posted_data['mobile_packs'] ) ) {
        $posted_data['mobile_packs'] = implode( ', ', $posted_data['mobile_packs'] );
    }

    return $posted_data;

}
add_filter( 'wpcf7_posted_data', 'csc_wpcf7_posted_data' );

/**
 * A tag to be used in "Mail" section so the user receives the special tag
 * [phone_numbers] and [mobile_packs]
 */
function wpcf7_tag_post( $output, $name, $html ) {

    $name       = preg_replace( '/^wpcf7\./', '_', $name );
    $submission = WPCF7_Submission::get_instance();

    if ( ! $submission ) {
        return $output;
    }

    if ( $name == 'private_or_busines' ) {
        return $submission->get_posted_data( 'private_or_busines' );
    }

    if ( $name == 'phone_numbers' ) {
        return $submission->get_posted_data( 'phone_numbers' );
    }

    if ( $name == 'mobile_packs' ) {
        return $submission->get_posted_data( 'mobile_packs' );
    }

    return $output;

}

add_filter( 'wpcf7_special_mail_tags', 'wpcf7_tag_post', 10, 3 );


/**
 * Remove phone number from database after
 * successful email submission.
 */
function remove_phone_number( $cf7 ) {

    $wpcf7      = WPCF7_ContactForm::get_current();
    $submission = WPCF7_Submission::get_instance();

    $data = $submission->get_posted_data();

    if ( isset( $data['phone_numbers'] ) || isset( $data['number'] ) ) {
        $all_numbers = get_field( 'numbers', 'phone-numbers' );

        if ( isset( $data['phone_numbers'] ) ) {
            $selected = explode( ', ', $data['phone_numbers'] );
        } elseif ( isset( $data['number'] ) ) {
            $selected = [$data['number']];
        }

        $selected_i = array();

        if ( ! empty( $all_numbers ) ) {
            $i = 1; // This needs to be 1 instead of 0 because ACFs delete_row.
            foreach ( $all_numbers as $field ) {
                if ( in_array( $field['number'], $selected ) ) {
                    delete_row( 'numbers', $i, 'phone-numbers' );
                } else {
                    $i++;
                }
            }
        }
    }

}

add_action( 'wpcf7_mail_sent', 'remove_phone_number' );

if ( isset( $_GET['repopulate_numbers'] ) && is_user_logged_in() ) {

    $txt_file = file_get_contents( get_stylesheet_directory() . '/numbers.txt' );
    $rows     = explode( "\n", $txt_file );

    // delete_field( 'numbers', 'phone-numbers' );

    foreach ( $rows as $number ) {
        add_row( 'numbers', array( 'number' => $number ), 'phone-numbers' );
    }

}

if ( isset( $_GET['dump_numbers'] ) && is_user_logged_in() ) {

    $all_numbers = get_field( 'numbers', 'phone-numbers' );

    foreach ( $all_numbers as $field ) {
        echo $field['number'] . "<br>";
    }

}

if ( isset( $_GET['sort_numbers'] ) && is_user_logged_in() ) {

    $all_numbers = get_field( 'numbers', 'phone-numbers' );
    $arr = array();

    foreach ( $all_numbers as $field ) {
        $arr[] = $field['number'];
    }

    sort( $arr );

    delete_field( 'numbers', 'phone-numbers' );

    foreach ( $arr as $number ) {
        add_row( 'numbers', array( 'number' => $number ), 'phone-numbers' );
    }

}

function test_sort( $a, $b ) {
    return strcasecmp( $a['et'], $b['et'] );
}

function csc_get_country_names() {

    $wp_uploads  = wp_upload_dir();
    $target_dir  = $wp_uploads['basedir'] . '/custom/';
    $target_file = $target_dir . 'country-names-db.json';

    if ( ! file_exists( $target_file ) ) {
        return false;
    }

    $countries = array();
    $json = json_decode( file_get_contents( $target_file ), true );

    uasort( $json, 'test_sort' );

    return $json;

}


function get_random_number() {

    $numbers = get_field( 'numbers', 'phone-numbers' );
    $number  = $numbers[array_rand( $numbers )]['number'];

    return $number;

}

function csc_get_country_rates( $data ) {

    $wp_uploads  = wp_upload_dir();
    $target_dir  = $wp_uploads['basedir'] . '/custom/';
    $target_file = $target_dir . 'country-rates-db.json';

    if ( ! file_exists( $target_file ) ) {
        return false;
    }

    $slug = $data->get_param( 'country' );
    $json = json_decode( file_get_contents( $target_file ), true );

    if ( ! isset( $json[$slug] ) ) {
        return false;
    }

    $country = $json[$slug];

    ob_start();

    include_once PATH_THEME . '/templates/country-rates-tabs.php';

    return ob_get_clean();

}

add_action( 'rest_api_init', function () {
    register_rest_route( 'csc-telecom', '/get-number/', array(
        'methods' => 'GET',
        'callback' => 'get_random_number',
    ) );

    register_rest_route( 'csc-telecom', '/get-country-rates/', array(
        'methods' => WP_REST_Server::READABLE,
        'callback' => 'csc_get_country_rates',
    ) );
} );

/**
 * Generate Word doc.
 */


function customize_add_button_atts( $attributes ) {
    return array_merge( $attributes, array(
      'additional_classes' => 'add-wpcf7-field',
    ) );
  }
  add_filter( 'wpcf7_field_group_add_button_atts', 'customize_add_button_atts' );

  function customize_remove_button_atts( $attributes ) {
    return array_merge( $attributes, array(
      'additional_classes' => 'remove-wpcf7-field',
    ) );
  }
  add_filter( 'wpcf7_field_group_remove_button_atts', 'customize_remove_button_atts' );



function csc_get_contract_number( $employee_id ) {
    $file = get_stylesheet_directory() . '/cn.json';
    $json = json_decode( file_get_contents( $file ), true );

    if ( isset( $json['num'] ) ) {
        $json['num'] += 1;
    } else {
        $json['num'] = 1;
    }

    $zeros = '000';

    if ( $json['num'] < 10 ) {
        $zeros = '00';
    } elseif ( $json['num'] >= 10 && $json['num'] < 100 ) {
        $zeros = '0';
    } elseif ( $json['num'] >= 100 ) {
        $zeros = '';
    }

    file_put_contents( $file, json_encode( $json, JSON_UNESCAPED_UNICODE ) );

    return $employee_id . $zeros . $json['num'] . date( 'dmY' );
}

function csc_get_reference_number( $contract_number, $employee_id ) {

    $contract_number = preg_replace("/[^0-9]/", "", $contract_number );

    $digits = str_split( $contract_number );
    $method = [7,3,1];
    $mi     = 0;
    $sum    = 0;
    $index  = count( $digits );
     
    while ($index) {
        --$index;
         
        $sum += $digits[$index] * $method[$mi];
         
        $mi++;

        if ( $mi > 2 ) {
            $mi = 0;
        }
    }
     
    $nearest_10 = ceil( $sum / 10 ) * 10;
     
    $last_digit = $nearest_10 - $sum;

    if ( $last_digit == 10 ) {
        $last_digit = 0;
    }
     
    return $contract_number . $last_digit;

}

use \PhpOffice\PhpWord\PhpWord;

add_action( 'wpcf7_mail_sent', function( $form ) {
    $submission = WPCF7_Submission::get_instance();

    if ( $submission ) {
        $data = $submission->get_posted_data();

        if ( isset( $data['private_or_business'] ) ) {
            require_once get_stylesheet_directory() . '/includes/vendor/autoload.php';

            $phpword = new PhpWord();
        
            include get_stylesheet_directory() . '/word/generate-setup.php';

            $contract_number = csc_get_contract_number( $data['employee-id'] );

            $info = [
                'contract_number'  => $contract_number,
                'address'          => $data['address'],
                'phone'            => $data['contact-number'],
                'email'            => $data['email-for-invoices'],
                'reference_number' => csc_get_reference_number( $contract_number, $data['employee-id'] ),
                'position'         => 'Juhatuse liige',
                'rep_name'         => 'Oxana Romanova',
                'rep_position'     => 'Müügijuht',
                'contract_term'    => 24,
                'contract_type'    => 'fixed',
                'numbers'          => explode( ', ', $data['phone_numbers'] ),
                'sim'              => [],
                'packs'            => []
            ];

            if ( $info['numbers'] ) {
                $empty = true;

                foreach ( $info['numbers'] as $number ) {
                    if ( trim( $number ) ) {
                        $empty = false;
                    }                    
                }

                if ( $empty ) {
                    $info['numbers'] = [];
                }
            }

            if ( $data['private_or_business'] == 'Частный клиент' || $data['private_or_business'] == 'Eraklient' ) {
                $type = 'private';

                $info['position']  = '';
                $info['name']      = $data['fullname'];
                $info['pers_code'] = $data['personal-code'];
            } elseif ( $data['private_or_business'] == 'Бизнес клиент' || $data['private_or_business'] == 'Äriklient' ) {
                $type = 'business';

                $info['company_name'] = $data['company-name'];
                $info['reg_code']     = $data['registration-code'];
                $info['vat_number']   = $data['vat-number'];
                $info['name']         = $data['business-fullname'];
            }

            // Set contract type.
            if ( is_array( $data['contract-type'] ) && $data['contract-type'][0] ) {
                if ( $data['contract-type'][0] == 'Срочный' || $data['contract-type'][0] == 'Tähtajaline' ) {
                    $info['contract_term'] = $data['contract-term'];
                } else {
                    $info['contract_type'] = 'no-limit';
                }
            }

            // Set mobile packs.
            $sel_packs = explode( ', ', $data['mobile_packs'] );
            $packs     = get_field( 'mobile_packs', 'option' );

            foreach ( $packs as $pack ) {
                if ( in_array( $pack['name'], $sel_packs ) ) {
                    $info['packs'][] = [
                        'name'  => $pack['name'],
                        'price' => $pack['price']
                    ];
                }
            }

            // Set sim card numbers.
            foreach ( $data as $key => $value ) {
                if ( strpos( $key, 'own-number' ) !== false ) {
                    $info['numbers'][] = $value;
                }
            }

            foreach ( $data as $key => $value ) {
                if ( strpos( $key, 'sim-card-number' ) !== false ) {
                    $info['sim'][] = $value;
                }
            }

            // Generate Word document.
            include get_stylesheet_directory() . '/word/generate-' . $type . '.php';

            $wp_uploads = wp_upload_dir();
            $target_dir = $wp_uploads['basedir'] . '/custom/';

            $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter( $phpword, 'Word2007' );
            $objWriter->save( $target_dir . $contract_number . '.docx' );
        }
    }
} );

/**
 * Redirect user to hard coded link when form data is submitted.
 */
function contact_form_login_redirect() {
    ?>
    <script>
        document.addEventListener( 'wpcf7mailsent', function ( e ) {
            if ( e.detail.contactFormId == 2498 ) {
                var contract_id;

                for ( var i = 0; i < e.detail.inputs.length; i++ ) {
                    if ( e.detail.inputs[i].name == 'employee-id' ) {
                        contract_id = e.detail.inputs[i].value;
                        break;
                    }
                }

                location = 'https://private.csc.ee/?download=' + contract_id;
            }
        }, false );
    </script>

    <?php
}

add_action( 'wp_footer', 'contact_form_login_redirect' );

if ( isset( $_GET['download'] ) ) {
    $wp_uploads = wp_upload_dir();
    $target_dir = $wp_uploads['basedir'] . '/custom/';

    $file = get_stylesheet_directory() . '/cn.json';
    $json = json_decode( file_get_contents( $file ), true );
    $employee_id = $_GET['download'];

    $zeros = '000';

    if ( $json['num'] < 10 ) {
        $zeros = '00';
    } elseif ( $json['num'] >= 10 && $json['num'] < 100 ) {
        $zeros = '0';
    } elseif ( $json['num'] >= 100 ) {
        $zeros = '';
    }

    $file_path  = $target_dir . $employee_id . $zeros . $json['num'] . date( 'dmY' ) . '.docx';
    $file_url   = 'https://private.csc.ee/uploads/custom/' . $employee_id . $zeros . $json['num'] . date( 'dmY' ) . '.docx';

    if ( file_exists( $file_path ) ) {
        ob_clean();

        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Cache-Control: private",false);
        header("Content-Type: application/msword");
        header("Content-Disposition: attachment; filename=\"".basename($file_path)."\";" );
        header("Content-Transfer-Encoding: binary");
        
        flush();
        readfile( $file_path );

        unlink( $file_path );

        exit;
    }
}



/**
 * Internet address check at https://stv.ee/cscapi/
 */
function csc_api_get_address_id() {

    $address = urlencode( sanitize_text_field( $_POST['address'] ) );

    // Wrong addres.
    if ( ! $address ) {
        wp_send_json_error( [
            'message' => __( 'Неверный адрес', 'csc-telecom' )
        ] );
    }

    // Get address ID.
    $url = 'https://stv.ee/cscapi/address/' . $address;

    $request = wp_remote_get( $url, [
        'sslverify' => false
    ] );

    if ( is_wp_error( $request ) ) {
        wp_send_json_error( [
            'message' => __( 'Не удалось получить данные из API', 'csc-telecom' )
        ] );
    }

    $body = wp_remote_retrieve_body( $request );
    $json = json_decode( $body, true );

    if ( ! $json ) {
        wp_send_json_error( [
            'message' => __( 'Адрес не найден', 'csc-telecom' )
        ] );
    }

    // Get services available to address.
    $match = $json[0];
    $url   = 'http://stv.ee/cscapi/services/' . $match['id'];

    $request = wp_remote_get( $url, [
        'sslverify' => false
    ] );

    if ( is_wp_error( $request ) ) {
        wp_send_json_error( [
            'message' => __( 'Не удалось получить данные из API', 'csc-telecom' )
        ] );
    }

    $body = wp_remote_retrieve_body( $request );
    $json = json_decode( $body, true );

    if ( ! $json ) {
        wp_send_json_error( [
            'message' => __( 'Для этого адреса услуги не найдены', 'csc-telecom' )
        ] );
    }

    wp_send_json_success( [
        'services' => $json
    ] );

}
add_action( 'wp_ajax_nopriv_csc_api_get_address_id', 'csc_api_get_address_id' );
add_action( 'wp_ajax_csc_api_get_address_id', 'csc_api_get_address_id' );

// Remove "Private: " from titles
function csc_remove_private_prefix( $title ) {

	$title = str_replace( ['Private: ', 'Privaatpostitus: ', 'Личное: '], '', $title );
	return $title;

}
add_filter( 'the_title', 'csc_remove_private_prefix' );

/**
 * Create account.
 */
add_role( 'partner', 'Partner', [
    'read' => true
] );

add_role( 'partner_confirmed', 'Partner ( Confirmed )', [
    'read' => true
] );

function csc_register_account() {

    $email = ( isset( $_POST['email'] ) ? htmlspecialchars( strip_tags( $_POST['email'] ) ) : '' );
    $pass  = ( isset( $_POST['pass'] ) ? htmlspecialchars( strip_tags( $_POST['pass'] ) ) : '' );
    $pass2 = ( isset( $_POST['pass2'] ) ? htmlspecialchars( strip_tags( $_POST['pass2'] ) ) : '' );

    $err = [];

    // Check required fields.
    if ( ! $email ) {
        $err['user_reg_email'] = __( 'E-posti aadress on kohustuslik', 'csc-telecom' );
    }

    if ( ! $pass ) {
        $err['user_reg_pass'] = __( 'Parool on nõutav', 'csc-telecom' );
    }

    if ( ! $pass2 ) {
        $err['user_reg_pass_confirm'] = __( 'Parool on nõutav', 'csc-telecom' );
    }

    // Check password confirmation.
    if ( $pass !== $pass2 ) {
        $err['user_reg_pass']         = __( 'Paroolid peavad ühtima', 'csc-telecom' );
        $err['user_reg_pass_confirm'] = __( 'Paroolid peavad ühtima', 'csc-telecom' );
    }

    // Check if email already exists.
    if ( email_exists( $email ) ) {
        $err['user_reg_email'] = __( 'Meil on juba registreeritud', 'csc-telecom' );
    }

    // If there are any validation errors, send error.
    if ( $err ) {
        wp_send_json_error( $err );
    } else {
        $user_id = wp_create_user( $email, $pass, $email );

        if ( ! is_wp_error( $user_id ) ) {
            // User has been created.
            $user = new WP_User( $user_id );
            $user->set_role( 'partner' );

            // Send email to admin.
            $to      = get_field( 'partners_notification_email', 'options' );
            $subject = 'New partner registration';
            $message = 'A new partner (' . $email . ') has been registered on ' . home_url( '/' ) . '. To confirm this user visit ' . admin_url( 'user-edit.php?user_id=' . $user_id ) . ' and change user role to "Partner (Confirmed)".';
            $headers = ['Content-Type: text/html; charset=UTF-8'];

            wp_mail( $to, $subject, $message, $headers );

            wp_send_json_success( [
                'message' => __( 'Teie konto on loodud. Peate ootama, kuni saidi administraator teie konto kinnitab.', 'csc-telecom' )
            ] );
        }
    }

}
add_action( 'wp_ajax_csc_register_account', 'csc_register_account' );
add_action( 'wp_ajax_nopriv_csc_register_account', 'csc_register_account' );

/**
 * Send notice to partner user when account has been confirmed.
 */
function csc_send_partner_confirmation_email( $user_id, $role, $old_roles ) {

    if ( $role == 'partner_confirmed' ) {
        $user = new WP_User( $user_id );

        $to      = $user->user_email;
        $subject = 'Partner registration confirmed';
        $message = 'Your registration has been confirmed on ' . home_url( '/' ) . '. You can now login and access sites restricted content.';
        $headers = ['Content-Type: text/html; charset=UTF-8'];

        wp_mail( $to, $subject, $message, $headers );
    }

}
add_action( 'set_user_role', 'csc_send_partner_confirmation_email', 10, 3 );

/**
 * Redirect partners to partners page on login.
 */
function csc_restrict_admin_access() {

    if ( ! is_admin() || ( is_user_logged_in() && isset( $GLOBALS['pagenow'] ) AND 'wp-login.php' === $GLOBALS['pagenow'] ) ) {
        return;
    }

    $user = new WP_User( get_current_user_id() );
    
    if ( in_array( 'partner', $user->roles ) ) {
        $redirect = home_url( '/' );

        if ( $partners_page = get_field( 'page_partners', 'option' ) ) {
            $redirect = get_permalink( $partners_page );
        }

        exit( wp_redirect( $redirect ) );
    }

}
add_action( 'admin_init', 'csc_restrict_admin_access', 100 );

/**
 * Redirect user back to login form if login failed.
 */
function csc_front_end_login_fail( $username ) {

   $referrer = $_SERVER['HTTP_REFERER'];

    if ( ! empty( $referrer ) && ! strstr( $referrer, 'wp-login' ) && ! strstr( $referrer, 'wp-admin' ) ) {
        $referrer = str_replace( ['?login=failed', '&login=failed'], '', $referrer );
        $append   = '?login=failed';

        if ( strpos( $referrer, '?') !== false ) {
            $append = '&login=failed';
        }

        wp_redirect( $referrer . $append );
        exit;
    }

}
add_action( 'wp_login_failed', 'csc_front_end_login_fail' );

/**
 * Main menu walker.
 */
class Csc_Menu_Walker extends Walker_Nav_Menu {

    public function start_el( &$output, $data_object, $depth = 0, $args = null, $current_object_id = 0 ) {
        // Restores the more descriptive, specific name for use within this method.
        $menu_item = $data_object;
 
        if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
            $t = '';
            $n = '';
        } else {
            $t = "\t";
            $n = "\n";
        }
        $indent = ( $depth ) ? str_repeat( $t, $depth ) : '';
 
        $classes   = empty( $menu_item->classes ) ? array() : (array) $menu_item->classes;
        $classes[] = 'menu-item-' . $menu_item->ID;
 
        if ( get_field( 'fancy_sub_menu', $menu_item->ID ) ) {
            $classes[] = 'has-fancy-sub-menu';
        }

        /**
         * Filters the arguments for a single nav menu item.
         *
         * @since 4.4.0
         *
         * @param stdClass $args      An object of wp_nav_menu() arguments.
         * @param WP_Post  $menu_item Menu item data object.
         * @param int      $depth     Depth of menu item. Used for padding.
         */
        $args = apply_filters( 'nav_menu_item_args', $args, $menu_item, $depth );
 
        /**
         * Filters the CSS classes applied to a menu item's list item element.
         *
         * @since 3.0.0
         * @since 4.1.0 The `$depth` parameter was added.
         *
         * @param string[] $classes   Array of the CSS classes that are applied to the menu item's `<li>` element.
         * @param WP_Post  $menu_item The current menu item object.
         * @param stdClass $args      An object of wp_nav_menu() arguments.
         * @param int      $depth     Depth of menu item. Used for padding.
         */
        $class_names = implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $menu_item, $args, $depth ) );
        $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
 
        /**
         * Filters the ID applied to a menu item's list item element.
         *
         * @since 3.0.1
         * @since 4.1.0 The `$depth` parameter was added.
         *
         * @param string   $menu_id   The ID that is applied to the menu item's `<li>` element.
         * @param WP_Post  $menu_item The current menu item.
         * @param stdClass $args      An object of wp_nav_menu() arguments.
         * @param int      $depth     Depth of menu item. Used for padding.
         */
        $id = apply_filters( 'nav_menu_item_id', 'menu-item-' . $menu_item->ID, $menu_item, $args, $depth );
        $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';
 
        $output .= $indent . '<li' . $id . $class_names . '>';
 
        $atts           = array();
        $atts['title']  = ! empty( $menu_item->attr_title ) ? $menu_item->attr_title : '';
        $atts['target'] = ! empty( $menu_item->target ) ? $menu_item->target : '';
        if ( '_blank' === $menu_item->target && empty( $menu_item->xfn ) ) {
            $atts['rel'] = 'noopener';
        } else {
            $atts['rel'] = $menu_item->xfn;
        }
        $atts['href']         = ! empty( $menu_item->url ) ? $menu_item->url : '';
        $atts['aria-current'] = $menu_item->current ? 'page' : '';

        if ( get_field( 'fancy_sub_menu', $menu_item->ID ) ) {
            $atts['data-fsm'] = get_field( 'fancy_sub_menu', $menu_item->ID );
        }
 
        /**
         * Filters the HTML attributes applied to a menu item's anchor element.
         *
         * @since 3.6.0
         * @since 4.1.0 The `$depth` parameter was added.
         *
         * @param array $atts {
         *     The HTML attributes applied to the menu item's `<a>` element, empty strings are ignored.
         *
         *     @type string $title        Title attribute.
         *     @type string $target       Target attribute.
         *     @type string $rel          The rel attribute.
         *     @type string $href         The href attribute.
         *     @type string $aria-current The aria-current attribute.
         * }
         * @param WP_Post  $menu_item The current menu item object.
         * @param stdClass $args      An object of wp_nav_menu() arguments.
         * @param int      $depth     Depth of menu item. Used for padding.
         */
        $atts = apply_filters( 'nav_menu_link_attributes', $atts, $menu_item, $args, $depth );
 
        $attributes = '';
        foreach ( $atts as $attr => $value ) {
            if ( is_scalar( $value ) && '' !== $value && false !== $value ) {
                $value       = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }
 
        /** This filter is documented in wp-includes/post-template.php */
        $title = apply_filters( 'the_title', $menu_item->title, $menu_item->ID );
 
        /**
         * Filters a menu item's title.
         *
         * @since 4.4.0
         *
         * @param string   $title     The menu item's title.
         * @param WP_Post  $menu_item The current menu item object.
         * @param stdClass $args      An object of wp_nav_menu() arguments.
         * @param int      $depth     Depth of menu item. Used for padding.
         */
        $title = apply_filters( 'nav_menu_item_title', $title, $menu_item, $args, $depth );
 
        $item_output  = $args->before;
        $item_output .= '<a' . $attributes . '>';
        $item_output .= $args->link_before . $title . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;
 
        if ( is_user_logged_in() && get_field( 'fancy_sub_menu', $menu_item->ID ) && get_field( 'sub_menus', 'option' ) ) {
            $item_output .= '<ul class="fancy-sub-menu">';

            foreach ( get_field( 'sub_menus', 'option' ) as $sub_menu ) {
                if ( $sub_menu['id'] == get_field( 'fancy_sub_menu', $menu_item->ID ) ) {
                    $sub_menu_items = $sub_menu['items'];

                    foreach ( $sub_menu_items as $sub_menu_item ) {
                        $item_output .= '<li><a href="' . get_permalink( $sub_menu_item['item']->ID ) . '">' . $sub_menu_item['item']->post_title . '</a></li>';
                    }
                }
            }

            $item_output .= '</ul>';
        }

        /**
         * Filters a menu item's starting output.
         *
         * The menu item's starting output only includes `$args->before`, the opening `<a>`,
         * the menu item's title, the closing `</a>`, and `$args->after`. Currently, there is
         * no filter for modifying the opening and closing `<li>` for a menu item.
         *
         * @since 3.0.0
         *
         * @param string   $item_output The menu item's starting HTML output.
         * @param WP_Post  $menu_item   Menu item data object.
         * @param int      $depth       Depth of menu item. Used for padding.
         * @param stdClass $args        An object of wp_nav_menu() arguments.
         */
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $menu_item, $depth, $args );
    }

}

add_action( 'wpcf7_before_send_mail', 'wpcf7_change_recipient' );
 
function wpcf7_change_recipient($contact_form){
 
    if ( $_SERVER['REMOTE_ADDR'] == '78.84.254.65' ) {
        $submission = WPCF7_Submission::get_instance();
        $recipient = "destripet@gmail.com"; //MODIFY YOUR RECIPIENT
        $mail = $contact_form->prop( 'mail' );
        $mail['recipient'] = $recipient;
        $contact_form->set_properties(array('mail'=>$mail));
    }
 
}

define( 'ALLOW_UNFILTERED_UPLOADS', true );