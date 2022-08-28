<?php
$term = get_term( get_field( 'term' ), 'smart_business_category' );

if ( $image = get_field( 'background', $term ) ): ?>
    <div class="image-wrap">
        <figure class="image bg-cover js-lazy" data-src="<?php echo get_media_url( $image[ 'ID' ], 'gen_medium' ); ?>"></figure>
    </div>
<?php endif; ?>