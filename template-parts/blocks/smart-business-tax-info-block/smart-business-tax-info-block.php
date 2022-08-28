<?php
/**
 * Smart business taxonomy info block Template.
 *
 * @param array $block The block settings and attributes.
 * @param string $content The block inner HTML (empty).
 * @param bool $is_preview True during AJAX preview.
 * @param (int|string) $post_id The post ID this block is saved to.
 */
$term = get_term( get_field( 'term' ), 'smart_business_category' );
$style = ( get_field( 'background_color' ) ) ? 'style="background-color: ' . get_field( 'background_color' ) . '"' : '';
$image_position = get_field( 'image_position' );
?>

<div class="csc-block-info-block smart-business-info csc-block <?php if ( $style ): ?>image-pos-<?php echo $image_position; ?><?php endif; ?>" <?php echo $style; ?> data-an-type="single" data-an="slide-in-from-bottom">

    <?php if ( $image_position == 'top' ): ?>
        <?php get_template_part( 'template-parts/blocks/smart-business-tax-info-block/image' ); ?>
    <?php else: ?>
        <div class="hide-xl hide-lg">
            <?php get_template_part( 'template-parts/blocks/smart-business-tax-info-block/image' ); ?>
        </div>
    <?php endif; ?>

    <div class="inner">
        <h3 class="title h2"><?php echo $term->name; ?></h3>

        <p class="text"><?php echo $term->description; ?></p>

        <?php
        $args = array(
            'post_type' => 'smart_business',
            'posts_per_page' => -1,
            'tax_query' => array(
                array(
                    'taxonomy' => 'smart_business_category',
                    'fields' => 'term_id',
                    'terms' => $term->term_id
                )
            )
        );
        $query = new WP_Query( $args );

        if ( $query->have_posts() ): ?>
            <ul class="ul">
                <?php
                while ( $query->have_posts() ):
                    $query->the_post(); ?>
                    <li>
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </li>
                <?php
                endwhile;
                wp_reset_postdata();
                ?>
            </ul>
        <?php endif; ?>
    </div>

    <?php if ( $image_position == 'bottom' ): ?>
        <div class="image-wrap-position hide-md hide-sm hide-xs">
            <?php get_template_part( 'template-parts/blocks/smart-business-tax-info-block/image' ); ?>
        </div>
    <?php endif; ?>

</div>