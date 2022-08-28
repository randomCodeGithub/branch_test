<?php
$terms = get_terms( array(
    'taxonomy' => 'service_category',
    'hide_empty' => false
) );

if ( ! is_wp_error( $terms ) && $terms ): ?>
    <div class="container">
        <ul class="tax-posts has-sub-posts <?php if ( count( $terms ) == 5 ): ?>compact<?php endif; ?>" data-an-type="single" data-an="slide-in-from-bottom">
            <?php foreach ( $terms as $term ): ?>
                <li class="post-wrap">
                    <div class="post">

                        <h3 class="title h3"><?php echo $term->name; ?></h3>

                        <?php
                        $args = array(
                            'post_type' => 'service',
                            'posts_per_page' => -1,
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'service_category',
                                    'fields' => 'term_id',
                                    'terms' => $term->term_id
                                )
                            )
                        );
                        $query = new WP_Query( $args );

                        if ( $query->have_posts() ): ?>
                            <ul class="tax-sub-posts">
                                <?php
                                while ( $query->have_posts() ) {
                                    $query->the_post();
                                    get_template_part( 'template-parts/posts/service' );
                                }
                                wp_reset_postdata();
                                ?>
                            </ul>
                        <?php endif; ?>

                        <span class="icon ic ic-arrow-right c-primary"></span>

                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>