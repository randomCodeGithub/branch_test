<?php
$term = get_queried_object();
$args = array(
    'post_type' => 'equipment',
    'posts_per_page' => -1,
    'tax_query' => array(
        array(
            'taxonomy' => 'equipment_category',
            'fields' => 'term_id',
            'terms' => $term->term_id
        )
    )
);
$query = new WP_Query( $args );

if ( $query->have_posts() ): ?>
    <div class="row">
        <?php
        while ( $query->have_posts() ) {
            $query->the_post();
            get_template_part( 'template-parts/posts/equipment' );
        }
        wp_reset_postdata();
        ?>
    </div>
<?php endif; ?>