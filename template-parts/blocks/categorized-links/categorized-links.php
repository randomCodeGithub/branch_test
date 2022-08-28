<div class="csc-block-terms csc-block">

    <?php if ( get_field( 'title' ) ): ?>
        <h2 class="b-title h2" data-an-type="single" data-an="slide-in-from-bottom"><?php the_field( 'title' ); ?></h2>
    <?php endif; ?>

    <?php if ( have_rows( 'categories' ) ): ?>
        <ul class="terms flex" data-an-type="single" data-an="slide-in-from-bottom" data-same-height="title">
            <?php while ( have_rows( 'categories' ) ): the_row(); ?>
                <li>
                    <h4 class="title h3"><?php the_sub_field( 'title' ); ?></h4>

                    <?php if ( have_rows( 'links' ) ): ?>
                        <ul class="term-posts">
                            <?php while ( have_rows( 'links' ) ): the_row(); ?>
                                <li>
                                    <a href="<?php the_sub_field( 'url' ); ?>"><?php the_sub_field( 'title' ); ?></a>
                                </li>
                            <?php endwhile; ?>
                        </ul>
                    <?php endif; ?>


                    <span class="icon ic ic-arrow-right c-primary hide-md hide-sm hide-xs"></span>

                </li>
            <?php endwhile; ?>
        </ul>
    <?php endif; ?>

</div>