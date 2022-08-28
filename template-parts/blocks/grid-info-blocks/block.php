<?php
$bg = get_sub_field( 'background' );
$color = get_sub_field( 'font_color' );
$style = 'style="';

if ( $bg[ 'type' ] == 'solid' ) {
    $style .= 'background-color: ' . $bg[ 'solid' ] . ';';
} else {
    $style .= 'background-image: url(' . get_media_url( $bg[ 'image' ][ 'ID' ], 'gen_medium_2' ) . ');';
}

$style .= '"';

$tag = ( get_sub_field( 'url' ) ) ? 'a' : 'div';
$href = ( get_sub_field( 'url' ) ) ? 'href="' . get_sub_field( 'url' ) . '"' : '';
?>
<div class="column" data-an="slide-in-from-bottom">
    <<?php echo $tag; ?> class="item bg-type-<?php echo $bg[ 'type' ]; ?> bg-cover" <?php echo $href; ?> <?php echo $style; ?>>

        <div class="inner">
            <?php if ( get_sub_field( 'title' ) ): ?>
                <h3 class="title c-<?php echo $color; ?>"><?php the_sub_field( 'title' ); ?></h3>
            <?php endif; ?>

            <?php if ( get_sub_field( 'text' ) ): ?>
                <p class="text c-<?php echo $color; ?>"><?php the_sub_field( 'text' ); ?></p>
            <?php endif; ?>

            <span class="icon ic ic-arrow-right c-<?php echo ( $color == 'white' ) ? 'white' : 'primary'; ?> hide-xl hide-lg"></span>
        </div>

        <span class="icon ic ic-arrow-right c-<?php echo ( $color == 'white' ) ? 'white' : 'primary'; ?> hide-md hide-sm hide-xs"></span>

    </<?php echo $tag; ?>>
</div>