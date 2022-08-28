<?php if ( $image = get_field( 'image' ) ): ?>
    <figure class="image">
        <?php pandago_img( $image[ 'ID' ], 'gen_medium' ); ?>
    </figure>
<?php endif; ?>