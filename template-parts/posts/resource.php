<li class="post-wrap">
    <a class="post" href="<?php the_permalink(); ?>">

        <h3 class="title h3"><?php the_title(); ?></h3>
    
        <?php if ( has_excerpt() ): ?>
            <p class="excerpt p"><?php the_excerpt(); ?></p>
        <?php endif; ?>

        <span class="icon ic ic-arrow-right c-primary"></span>

    </a>
</li>