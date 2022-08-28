<?php
$obj = get_queried_object();
$term = ( $obj->parent ) ? get_term( $obj->parent, 'equipment_category' ) : get_term( $obj->term_id, 'equipment_category' );

get_header(); ?>

<div class="container narrow-4">
    <h1 class="page-title h1 text-center"><?php echo $term->name; ?></h1>

    <?php get_template_part( 'template-parts/filters/equipment' ); ?>

    <div class="posts-container" data-an-type="single" data-an="slide-in-from-bottom">
        <?php get_template_part( 'template-parts/loops/equipment', 'category' ); ?>
    </div>
</div>

<div class="container">
    
</div>

<?php get_footer(); ?>