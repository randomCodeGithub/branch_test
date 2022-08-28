<?php get_header(); ?>

<div <?php body_class(array (ICL_LANGUAGE_CODE,"container")); ?>>

    <?php
    $width = get_field( 'content_width' );

    if ( ! $width ) {
        $width = 'default';
    }
    ?>

    <div class="container <?php if ( $width == 'wide' ): ?>narrow-6<?php else: ?>narrow-4<?php endif; ?>">
        <div class="btn-back-wrap">
            <?php
            $text = __( 'Our services', 'default' );
            $link = get_post_type_archive_link( 'service' );
            ?>

            <a class="btn-back js-back" href="<?php echo $link; ?>">
                <span class="icon ic ic-arrow-left"></span>
                <?php echo $text; ?>
            </a>
        </div>

        <h1 class="post-title h1 mg-<?php the_field( 'title_margin' ); ?>"><?php the_title(); ?></h1>
    </div>

    <?php if ( $width == 'wide' ): ?>
        <div class="container narrow-6">
    <?php endif; ?>

    <div class="editor ">
        <?php the_content(); ?>
    </div>

    <?php if ( $width == 'wide' ): ?>
        </div>
    <?php endif; ?>

</div>

<?php get_footer(); ?>