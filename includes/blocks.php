<?php

/**

 * Register custom Gutenberg blocks category.

 */

function csc_block_categories( $categories, $post ) {

    return array_merge(

        $categories,

        array(

            array(

                'slug' => 'csc-blocks',

                'title' => __( 'CSC Blocks', TD )

            ),

        )

    );

}



add_filter( 'block_categories', 'csc_block_categories', 10, 2 );



/**

 * Register custom Gutenberg blocks.

 */

function register_acf_block_types() {



    /**

     * Content slider.

     */

    acf_register_block_type( array(

        'name' => 'csc-content-slider',

        'title' => __( 'Content Slider', TD ),

        'mode' => 'edit',

        'render_template' => 'template-parts/blocks/content-slider/content-slider.php',

        'category' => 'csc-blocks',

        'icon' => 'controls-play',

        'keywords' => array( 'content', 'slider' )

    ) );

    /**
     * Content slider.
     */
    acf_register_block_type( array(
        'name' => 'csc-country-rates',
        'title' => __( 'Country Rates', TD ),
        'mode' => 'edit',
        'render_template' => 'template-parts/blocks/country-rates/country-rates.php',
        'category' => 'csc-blocks',
        'icon' => 'admin-site-alt3',
        'keywords' => array( 'country rates' )
    ) );



    /**

     * Simple links.

     */

    acf_register_block_type( array(

        'name' => 'csc-simple-links',

        'title' => __( 'Simple Links', TD ),

        'mode' => 'edit',

        'render_template' => 'template-parts/blocks/simple-links/simple-links.php',

        'category' => 'csc-blocks',

        'icon' => 'admin-links',

        'keywords' => array( 'simple', 'links' )

    ) );



    /**

     * Info block.

     */

    acf_register_block_type( array(

        'name' => 'csc-info-block',

        'title' => __( 'Info Block', TD ),

        'mode' => 'edit',

        'render_template' => 'template-parts/blocks/info-block/info-block.php',

        'category' => 'csc-blocks',

        'icon' => 'welcome-widgets-menus',

        'keywords' => array( 'info', 'block' )

    ) );



    /**

     * Terms.

     */

    acf_register_block_type( array(

        'name' => 'csc-terms',

        'title' => __( 'Terms', TD ),

        'mode' => 'edit',

        'render_template' => 'template-parts/blocks/terms/terms.php',

        'category' => 'csc-blocks',

        'icon' => 'networking',

        'keywords' => array( 'terms' )

    ) );



    /**

     * Hero Block.

     */

    acf_register_block_type( array(

        'name' => 'csc-hero-block',

        'title' => __( 'Hero Block', TD ),

        'mode' => 'edit',

        'render_template' => 'template-parts/blocks/hero-block/hero-block.php',

        'category' => 'csc-blocks',

        'icon' => 'format-image',

        'keywords' => array( 'hero', 'block' )

    ) );



    /**

     * Price request.

     */

    acf_register_block_type( array(

        'name' => 'csc-price-request',

        'title' => __( 'Price Request', TD ),

        'mode' => 'edit',

        'render_template' => 'template-parts/blocks/price-request/price-request.php',

        'category' => 'csc-blocks',

        'icon' => 'cart',

        'keywords' => array( 'price', 'request' )

    ) );



    /**

     * Quote.

     */

    acf_register_block_type( array(

        'name' => 'csc-quote',

        'title' => __( 'Quote', TD ),

        'mode' => 'edit',

        'render_template' => 'template-parts/blocks/quote/quote.php',

        'category' => 'csc-blocks',

        'icon' => 'format-quote',

        'keywords' => array( 'quote' )

    ) );



    /**

     * Post list.

     */

    acf_register_block_type( array(

        'name' => 'csc-post-list',

        'title' => __( 'Post List', TD ),

        'mode' => 'edit',

        'render_template' => 'template-parts/blocks/post-list/post-list.php',

        'category' => 'csc-blocks',

        'icon' => 'editor-ul',

        'keywords' => array( 'post', 'list' )

    ) );



    /**

     * Grid info blocks.

     */

    acf_register_block_type( array(

        'name' => 'csc-grid-info-blocks',

        'title' => __( 'Grid Info Blocks', TD ),

        'mode' => 'edit',

        'render_template' => 'template-parts/blocks/grid-info-blocks/grid-info-blocks.php',

        'category' => 'csc-blocks',

        'icon' => 'grid-view',

        'keywords' => array( 'grid', 'info', 'blocks' )

    ) );



    /**

     * Contact Form.

     */

    acf_register_block_type( array(

        'name' => 'csc-contact-form',

        'title' => __( 'Contact Form', TD ),

        'mode' => 'edit',

        'render_template' => 'template-parts/blocks/contact-form/contact-form.php',

        'category' => 'csc-blocks',

        'icon' => 'email-alt',

        'keywords' => array( 'contact', 'form' )

    ) );



    /**

     * Container.

     */

    acf_register_block_type( array(

        'name' => 'csc-container',

        'title' => __( 'Container', TD ),

        'mode' => 'edit',

        'render_template' => 'template-parts/blocks/container/container.php',

        'category' => 'csc-blocks',

        'icon' => 'welcome-widgets-menus',

        'keywords' => array( 'container' )

    ) );



    /**

     * Spacer.

     */

    acf_register_block_type( array(

        'name' => 'csc-spacer',

        'title' => __( 'Spacer', TD ),

        'mode' => 'edit',

        'render_template' => 'template-parts/blocks/spacer/spacer.php',

        'category' => 'csc-blocks',

        'icon' => 'sort',

        'keywords' => array( 'spacer' )

    ) );



    /**

     * Rectangle

     */

    acf_register_block_type( array(

        'name' => 'csc-rectangle',

        'title' => __( 'Rectangle', TD ),

        'mode' => 'edit',

        'render_template' => 'template-parts/blocks/rectangle/rectangle.php',

        'category' => 'csc-blocks',

        'icon' => 'menu',

        'keywords' => array( 'rectangle' )

    ) );



    /**

     * Smart business taxonomy info block

     */

    acf_register_block_type( array(

        'name' => 'csc-smart-business-tax',

        'title' => __( 'Smart Business Taxonomy Info Block', TD ),

        'mode' => 'edit',

        'render_template' => 'template-parts/blocks/smart-business-tax-info-block/smart-business-tax-info-block.php',

        'category' => 'csc-blocks',

        'icon' => 'welcome-widgets-menus',

        'keywords' => array( 'smart', 'business', 'taxonomy', 'info', 'block' )

    ) );



    /**

     * Services

     */

    acf_register_block_type( array(

        'name' => 'csc-services',

        'title' => __( 'Services', TD ),

        'mode' => 'edit',

        'render_template' => 'template-parts/blocks/services/services.php',

        'category' => 'csc-blocks',

        'icon' => 'networking',

        'keywords' => array( 'services' )

    ) );



    /**

     * Features table.

     */

    acf_register_block_type( array(

        'name' => 'csc-features-table',

        'title' => __( 'Features table', TD ),

        'mode' => 'edit',

        'render_template' => 'template-parts/blocks/features-table/features-table.php',

        'category' => 'csc-blocks',

        'icon' => 'networking',

        'keywords' => array( 'features', 'table' )

    ) );



    /**

     * Categorized links.

     */

    acf_register_block_type( array(

        'name' => 'csc-categorized-links',

        'title' => __( 'Categorized links', TD ),

        'mode' => 'edit',

        'render_template' => 'template-parts/blocks/categorized-links/categorized-links.php',

        'category' => 'csc-blocks',

        'icon' => 'networking',

        'keywords' => array( 'categorized', 'links' )

    ) );











	   /**

     * Features big table.

     */

    acf_register_block_type( array(

        'name' => 'csc-features-big-table',

        'title' => __( 'Features big table', TD ),

        'mode' => 'edit',

        'render_template' => 'template-parts/blocks/features-big-table/features_big_table.php',

        'category' => 'csc-blocks',

        'icon' => 'networking',

        'keywords' => array( 'features', 'table' )

    ) );



      /**

      * Features big table.

      */

     acf_register_block_type( array(

         'name' => 'csc-features-big-table-2',

         'title' => __( 'Features big table 2', TD ),

         'mode' => 'edit',

         'render_template' => 'template-parts/blocks/features-big-table-2/features_big_table.php',

         'category' => 'csc-blocks',

         'icon' => 'networking',

         'keywords' => array( 'features', 'table' )

     ) );

    acf_register_block_type( array(
        'name' => 'info-columns',
        'title' => __( 'Info Columns', TD ),
        'mode' => 'edit',
        'render_template' => 'template-parts/blocks/info-columns/info-columns.php',
        'category' => 'csc-blocks',
        'keywords' => array( 'info', 'columns' )
    ) );

    acf_register_block_type( array(
        'name' => 'packages',
        'title' => __( 'Packages', TD ),
        'mode' => 'edit',
        'render_template' => 'template-parts/blocks/packages/packages.php',
        'category' => 'csc-blocks',
        'keywords' => array( 'packages' )
    ) );

    acf_register_block_type( array(
        'name' => 'request-wide',
        'title' => __( 'Request Wide', TD ),
        'mode' => 'edit',
        'render_template' => 'template-parts/blocks/request-wide/request-wide.php',
        'category' => 'csc-blocks',
        'keywords' => array( 'request', 'wide' )
    ) );



}



add_action( 'acf/init', 'register_acf_block_types' );
