<?php
$tax = get_queried_object();
if ( have_posts() ): ?>
    <div class="container">
        <ul class="tax-posts" data-an-type="single" data-an="slide-in-from-bottom">
            <?php
            while ( have_posts() ) {
                the_post();
                get_template_part( 'template-parts/posts/' . get_post_type() );
            }
            ?>
        </ul>
    </div>
<?php endif; ?>