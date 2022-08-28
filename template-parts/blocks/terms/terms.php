<?php
/**
 * Terms Template.
 *
 * @param array $block The block settings and attributes.
 * @param string $content The block inner HTML (empty).
 * @param bool $is_preview True during AJAX preview.
 * @param (int|string) $post_id The post ID this block is saved to.
 */
?>

<div class="csc-block-terms csc-block">

    <?php if ( get_field( 'title' ) ): ?>
        <h2 class="b-title h2"><?php the_field( 'title' ); ?></h2>
    <?php endif; ?>

    <?php
    $terms = get_terms( array(
        'taxonomy' => get_field( 'taxonomy' ),
        'hide_empty' => ( get_field( 'show_empty_terms' ) ) ? false : true
    ) );

    if ( ! is_wp_error( $terms ) && $terms ):
    ?>
        <ul class="terms flex" data-an-type="single" data-an="slide-in-from-bottom">
            <?php foreach ( $terms as $term ): ?>
                <li>
                    <h4 class="title h3"><?php echo $term->name; ?></h4>

                    <?php if ( get_field( 'show_posts' ) ): ?>
                        <?php
                        $args = array(
                            'post_type' => get_field( 'post_type' ),
                            'posts_per_page' => -1,
                            'orderby' => 'menu_order',
                            'order' => 'ASC',
                            'tax_query' => array(
                                array(
                                    'taxonomy' => get_field( 'taxonomy' ),
                                    'fields' => 'term_id',
                                    'terms' => $term->term_id
                                )
                            )
                        );
                        $query = new WP_Query( $args );

                        if ( $query->have_posts() ):
                        ?>
                            <ul class="term-posts">
                                <?php while ( $query->have_posts() ): $query->the_post(); ?>
                                    <li>
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </li>
                                <?php endwhile; wp_reset_postdata(); ?>
                            </ul>
                        <?php endif; ?>

                    <?php endif; ?>

                    <span class="icon ic ic-arrow-right c-primary hide-md hide-sm hide-xs"></span>

                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

</div>