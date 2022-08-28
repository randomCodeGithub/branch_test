<?php
/**
 * Grid info blocks Template.
 *
 * @param array $block The block settings and attributes.
 * @param string $content The block inner HTML (empty).
 * @param bool $is_preview True during AJAX preview.
 * @param (int|string) $post_id The post ID this block is saved to.
 */
?>

<?php if ( have_rows( 'blocks' ) ): ?>
    <div class="csc-block-grid-info-blocks csc-block stretch-md" data-gutter="0">
        <div class="grid" data-an-type="sequence" data-an>
            <?php
            while ( have_rows( 'blocks' ) ) {
                the_row();
                get_template_part( 'template-parts/blocks/grid-info-blocks/block' );
            }
            ?>
        </div>
    </div>
<?php endif; ?>