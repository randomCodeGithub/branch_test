<?php
$tax = get_queried_object();
$style = '';

if ( $bg = get_field( 'background', get_queried_object() ) ) {
    $style = 'style="background-image: url(' . get_media_url( $bg[ 'ID' ], 'site_wide' ) . ');"';
}
?>
<div class="tax-hero relative bg-cover" <?php echo $style; ?>>
    <div class="content container relative narrow-2 flex">

        <div class="title-col">
            <h2 class="title h1 small c-white"><?php echo $tax->name; ?></h2>
        </div>

        <div class="text-col">
            <p class="text c-white"><?php echo $tax->description; ?></p>
        </div>

    </div>
</div>