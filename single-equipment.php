<?php get_header(); ?>

<div class="container">

    <div class="container narrow-4">

        <div class="btn-back-wrap">
            <?php
            $post_type = get_post_type();
            $text = '';

            if ( $post_type == 'service' ) {
                $text = __( 'Our services', 'default' );
                $link = get_post_type_archive_link( $post_type );
            } elseif ( $post_type == 'smart_business' ) {
                $terms = get_the_terms( get_the_ID(), 'smart_business_category' );

                if ( $terms ) {
                    $text = $terms[ 0 ]->name;
                    $link = get_term_link( $terms[ 0 ]->term_id );
                }
            } elseif ( $post_type == 'equipment' ) {
                $text = __( 'Aprīkojums', 'default' );
                $link = get_post_type_archive_link( $post_type );
            }
            ?>
            <a class="btn-back js-back" href="<?php echo $link; ?>">
                <span class="icon ic ic-arrow-left"></span>
                <?php echo $text; ?>
            </a>
        </div>

        <h1 class="post-title h1"><?php the_title(); ?></h1>
    </div>

    <div class="editor">
        <?php the_content(); ?>
    </div>

</div>

<?php get_footer(); ?>