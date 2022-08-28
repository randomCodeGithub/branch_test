<?php
/**
 * Post list Template.
 *
 * @param array $block The block settings and attributes.
 * @param string $content The block inner HTML (empty).
 * @param bool $is_preview True during AJAX preview.
 * @param (int|string) $post_id The post ID this block is saved to.
 */
?>

<?php if ( have_rows( 'posts' ) ): ?>
    <div class="csc-block-post-list csc-block" data-an-type="single" data-an="fade-in-from-bottom">

        <?php if ( get_field( 'title' ) ): ?>
            <h3 class="title quote"><?php the_field( 'title' ); ?></h3>
        <?php endif; ?>

        <ul class="ul">
            <?php
            while ( have_rows( 'posts' ) ) {
                the_row();
                get_template_part( 'template-parts/blocks/post-list/item' );
            }
            ?>
        </ul>

    </div>
<?php endif; ?>