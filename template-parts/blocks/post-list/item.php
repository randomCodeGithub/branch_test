<?php $post = get_sub_field( 'post' ); ?>
<li>
    <a href="<?php echo get_permalink( $post->ID ); ?>"><?php echo $post->post_title; ?></a>
</li>