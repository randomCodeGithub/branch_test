<?php
get_template_part( 'template-parts/head' );

$no_border = ( is_front_page() || is_archive() && ! is_tax() || is_archive() && is_tax( 'smart_business_category' ) || get_field( 'hide_header_border' ) ) ? 'no-border' : '';
?>

<header class="site-header <?php echo $no_border; ?>">

    <?php get_template_part( 'template-parts/general/info-bar', null, [
        'show_logout' => true
    ] ); ?>

    <!-- Menu -->
    <div class="menu container container-md-wide">
        <div class="inner flex">
            <?php get_template_part( 'template-parts/general/site-logo' ); ?>

            <div class="m-l-auto">
                <div class="nav-bg"></div>

                <div class="nav-wrap">
                    <div class="hide-xl hide-lg">
                        <?php language_switcher(); ?>
                    </div>

                    <nav class="nav-main">
                        <?php pandago_nav( 'header-new', '', 0, new Csc_Menu_Walker() ); ?>
                    </nav>

                    <?php if ( $link = get_field( 'link_after_social', 'option' ) ): ?>
                        <?php if ( $link['label'] && $link['url'] ): ?>
                            <a class="hide-xl hide-lg link-after-social" href="<?php echo $link['url']; ?>"><?php echo $link['label']; ?></a>
                        <?php endif; ?>
                    <?php endif; ?>

                    <?php if ( is_user_logged_in() ): ?>
                        <?php
                        $user = new WP_User( get_current_user_id() );

                        if ( $user && in_array( 'partner_confirmed', $user->roles ) ): ?>
                            <a class="hide-xl hide-lg link-after-social" href="<?php echo wp_logout_url( ( is_ssl() ? 'https://' : 'http://' ) . $_SERVER['HTTP_HOST'] . str_replace( ['?login=failed', '&login=failed'], '', $_SERVER['REQUEST_URI'] ) ); ?>"><?php _e( 'Logi välja' ); ?></a>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>

                <button class="burger hide-xl hide-lg js-toggle-nav">
                    <span class="top"></span>
                    <span class="mid"></span>
                    <span class="bot"></span>
                </burger>
            </div>
        </div>
    </div>
    <!-- /Menu -->
</header>

<?php if ( have_rows( 'sub_menus', 'options' ) ): ?>
    <div class="fsms-wrap">
        <div class="container">
            <?php while ( have_rows( 'sub_menus', 'options' ) ): the_row(); ?>
                <div class="fsm-wrap" data-id="<?php the_sub_field( 'id' ); ?>">
                    <div class="fsm">
                        <?php if ( $image = get_sub_field( 'image' ) ): ?>
                            <figure class="fsm__image"><?php pandago_img( $image, 'full', 'no-lazy' ); ?></figure>
                        <?php endif; ?>

                        <?php if ( get_sub_field( 'name' ) ): ?>
                            <p class="fsm__name"><?php the_sub_field( 'name' ); ?></p>
                        <?php endif; ?>

                        <?php if ( have_rows( 'items' ) ): ?>
                            <ul class="fsm__menu">
                                <?php while ( have_rows( 'items' ) ): the_row(); ?>
                                    <?php if ( $item = get_sub_field( 'item' ) ): ?>
                                        <li class="fsm__menu-item">
                                            <a class="fsm__menu-link" href="<?php echo esc_url( get_permalink( $item->ID ) ); ?>"><?php echo $item->post_title; ?></a>
                                        </li>
                                    <?php endif; ?>
                                <?php endwhile; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
<?php endif; ?>

<div class="site-content">