<?php
$obj = get_queried_object();
$option = $obj->name . '-option-' . ICL_LANGUAGE_CODE;

$style = '';

if ( $bg = get_field( 'background', $option ) ) {
    $style = 'style="background-image: url(' . get_media_url( $bg[ 'ID' ], 'site_wide' ) . ');"';
}

?>
<div class="tax-hero relative bg-cover" <?php echo $style; ?> data-an-type="single" data-an="fade-in-from-bottom">
    <div class="content container relative narrow-2 flex">

        <div class="title-col">
            <h2 class="title h1 small c-white"><?php the_field( 'title', $option ); ?></h2>
        </div>

        <div class="text-col">
            <p class="text c-white"><?php the_field( 'description', $option ); ?></p>
        </div>

    </div>
</div>