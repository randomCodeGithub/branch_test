<?php
/**
 * Post Type Info Template.
 *
 * @param array $block The block settings and attributes.
 * @param string $content The block inner HTML (empty).
 * @param bool $is_preview True during AJAX preview.
 * @param (int|string) $post_id The post ID this block is saved to.
 */

$post_type = get_post_type_object( get_field( 'post_type' ) );
$title = ( get_field( 'custom_tytle' ) ) ? get_field( 'title' ) : $post_type->label;
$text = ( get_field( 'custom_text' ) ) ? get_field( 'text' ) : get_field( $post_type->name . '-option' );
?>

<div class="csc-block-info-block csc-block">

    <h3 class="title h2"><?php echo $title; ?></h3>

<div class="text mg-<?php the_field( 'text_margin' ); ?> editor">
    <?php the_field( 'text' ); ?>
</div>

<?php if ( have_rows( 'list' ) ): ?>
    <ul class="ul">
        <?php while ( have_rows( 'list' ) ): the_row(); ?>
            <li><?php the_sub_field( 'text' ); ?></li>
        <?php endwhile; ?>
    </ul>
<?php endif; ?>


</div>