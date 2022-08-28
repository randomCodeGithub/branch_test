<?php
$terms = get_terms( array(
    'taxonomy' => 'equipment_category',
    'hide_empty' => false,
    'parent' => 0
) );

if ( ! is_wp_error( $terms ) && $terms ): ?>
    <div class="container">
        <ul class="tax-posts has-sub-posts <?php if ( count( $terms ) == 5 ): ?>compact<?php endif; ?>" data-an-type="single" data-an="slide-in-from-bottom">
            <?php foreach ( $terms as $term ): ?>
                <li class="post-wrap">
                    <div class="post">

                        <h3 class="title h3">
                            <a href="<?php echo get_term_link( $term->term_id ); ?>"><?php echo $term->name; ?></a>
                        </h3>

                        <?php
                        $sub_terms = get_terms( array(
                            'taxonomy' => 'equipment_category',
                            'hide_empty' => false,
                            'parent' => $term->term_id
                        ) );

                        if ( ! is_wp_error( $sub_terms ) && $sub_terms ): ?>
                            <ul class="tax-sub-posts">
                                <?php foreach ( $sub_terms as $sub_term ): ?>
                                    <li>
                                        <a href="<?php echo get_term_link( $sub_term->term_id ); ?>"><?php echo $sub_term->name; ?></a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>

                        <span class="icon ic ic-arrow-right c-primary"></span>

                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>