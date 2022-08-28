<?php if ( $logo = get_field( 'logo', 'option' ) ): ?>

<?php
$has_viewbox = '';
$style = '';

if ( $logo[ 'subtype' ] == 'svg+xml' ) {
    $path = get_attached_file( $logo[ 'ID' ] );
    $contents = file_get_contents( $path );

    preg_match( '/viewBox=".*?"/', $contents, $matches );

    if ( $matches ) {
        $has_viewbox = 'has-viewbox';

        $viewbox_parts = explode( ' ', $matches[ 0 ] );
        $logo_w = str_replace( '"', '', $viewbox_parts[ 2 ] );
        $logo_h = str_replace( '"', '', $viewbox_parts[ 3 ] );

        $style = 'style="width: ' . $logo_w . 'px; height: ' . $logo_h . 'px;"';
    }
}
?>

<a class="site-logo <?php echo $has_viewbox; ?>" href="<?php echo home_url(); ?>" <?php echo $style; ?>>
    <img src="<?php echo get_media_url( $logo ); ?>">
</a>
<?php endif; ?>