<?php
if ( $bg = get_sub_field( 'image' ) ):
    $style = ( $bg[ 'type' ] == 'single' ) ? 'style="background-image: url( ' . get_media_url( $bg[ 'image' ][ 'ID' ], 'container' ) . ' );"' : '';

    $url = get_sub_field( 'url' );
    $tag = ( $url ) ? 'a' : 'div';
    $href = ( $url ) ? 'href="' . $url . '"' : '';
?>
    <li>
        <<?php echo $tag; ?> class="slide bg-type-<?php echo $bg[ 'type' ]; ?>" <?php echo $href; ?> <?php echo $style; ?>>

            <?php if ( $bg[ 'type' ] == 'separate' ): ?>

                <div class="bg" style="background-color: <?php echo $bg[ 'background_color' ]; ?>; top: <?php echo $bg[ 'offset' ]; ?>px;"></div>

                <img class="image" src="<?php echo get_media_url( $bg[ 'image' ][ 'ID' ] ); ?>">

            <?php endif; ?>

            <div class="slide-content">

                <?php if ( get_sub_field( 'title' ) ): ?>
                    <h3 class="title h1"><?php the_sub_field( 'title' ); ?></h3>
                <?php endif; ?>

                <?php if ( get_sub_field( 'sub_title' ) ): ?>
                    <p class="sub-title"><?php the_sub_field( 'sub_title' ); ?></p>
                <?php endif; ?>

            </div>
        </<?php echo $tag; ?>>
    </li>
<?php endif; ?>