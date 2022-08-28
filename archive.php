<?php
$obj = get_queried_object();
$part = '';
$hero = 'archive';

if ( is_archive() && ! is_tax() ) {
    $part = $obj->name;
} elseif ( is_tax() ) {
    $part = $obj->taxonomy;
    $hero = $part;
}

get_header();

get_template_part( 'template-parts/general/hero', $hero );
get_template_part( 'template-parts/loops/' . $part );

get_footer();