<?php
$obj = get_queried_object();

$terms = get_terms( array(
    'taxonomy' => 'equipment_category',
    'hide_empty' => false,
    'parent' => ( $obj->parent ) ? $obj->parent : $obj->term_id
) );

if ( ! is_wp_error( $terms ) && $terms ): ?>
    <div class="term-filters">
        <?php foreach ( $terms as $term ): ?>
            <?php
            $class = ( $obj->term_id == $term->term_id ) ? 'class="active"' : '';
            $link = get_term_link( $term->term_id );
            ?>
            <a <?php echo $class; ?> href="<?php echo $link; ?>"><?php echo $term->name; ?></a>
        <?php endforeach; ?>
    </div>
<?php endif; ?>