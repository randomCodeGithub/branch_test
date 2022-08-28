<?php
$tax = get_queried_object();
if ( have_posts() ): ?>
    <div class="container">
        <ul class="tax-posts <?php if ( $tax->count == 5 ): ?>compact<?php endif; ?>" data-an-type="single" data-an="slide-in-from-bottom">
            <?php
            while ( have_posts() ) {
                the_post();
                get_template_part( 'template-parts/posts/' . get_post_type() );
            }
            ?>
        </ul>
    </div>
<?php endif; ?>