<?php
/**
 * Features_big_table_2 Table Template.
 */

$post_id                    = get_the_ID();
$columns                    = get_field( 'columns_big_table' );
$features_big_table         = get_field( 'features_big_table' );
$features_big_table_big     = get_field( 'Features_big_table_collapse' );
$features_collapse_repeat   = get_field( 'features_collapse_repeat' );
$features_collapse          = get_field( 'features_collapse' );
?>

<div class="csc-block-features-table csc-block-features-table-big csc-block-features-table-big-2 csc-block stretch-md">
    <div class="f-row f-row-big-table">
        <div class="col-checklists">
            <div class="f-row f-row-big-table " data-an-type="sequence" data-an> <?php 
			if( have_rows('features_column') ):
				// loop through the rows of data
				$group_i = 0; while ( have_rows('features_column') ) : the_row(); ?>
						<div class="col-check" data-an="slide-in-from-bottom">
							<div class="header" style="height: 415px;"> <?php 
								if( have_rows('tab_group') ):
									// loop through the rows of data
									while ( have_rows('tab_group') ) : the_row(); ?>

                                        <?php if (get_sub_field( 'bestseller' )): ?>
                                            <div class="bestseller">
                                                <?php _e('ХИТ ПРОДАЖ', 'csc')?>
                                            </div>
                                        <?php endif; ?>

                                        <?php if ( get_sub_field( 'image' ) ): ?>
                                            <?php $image = get_sub_field( 'image' ); ?>
                                            <div class="feature-image-wrap">
                                                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                            </div>
                                        <?php endif; ?>

										<?php if ( get_sub_field( 'title' ) ): ?>
											<p class="title h4"><?php echo get_sub_field( 'title' ) ; ?></p>
										<?php endif; ?>

										<div class="price-wrap">
											<?php if ( get_sub_field( 'price' ) ): ?>
												<span class="price">€ <?php echo get_sub_field( 'price' ); ?></span>
											<?php endif; ?>

											<?php if ( get_sub_field( 'price_period' ) ): ?>
												<span class="period" style="margin-left:3px ">  /  <?php echo get_sub_field( 'price_period' ); ?></span>
											<?php endif; ?>
										</div>

										<?php if ( get_sub_field( 'about_title' ) ): ?>
											 <span class="period"><?php echo get_sub_field( 'about_title' ); ?></span>
										 <?php endif; ?>
										 
										<div class="internet-block">
											<div class="internet-first">
												<?php if ( get_sub_field('internet_gb_first' ) ): ?>
													 <span class="internet"><?php echo get_sub_field( 'internet_gb_first' ); ?></span></br>
												 <?php endif; ?>
												 <?php if ( get_sub_field( 'internet_gb_first_caption' ) ): ?>
													 <span class="internet_caption"><?php echo get_sub_field( 'internet_gb_first_caption' ); ?></span>
												 <?php endif; ?>
											</div>
											
											<div class="internet-second">
												 <?php if ( get_sub_field('internet_gb_second' ) ): ?>
													 <span class="internet"><?php echo get_sub_field( 'internet_gb_second' ); ?></span></br>
												 <?php endif; ?>
												 <?php if ( get_sub_field('internet_gb_second_caption' ) ): ?>
													 <span class="internet_caption"><?php echo get_sub_field( 'internet_gb_second_caption' ); ?></span>
												 <?php endif; ?>
											 </div>
										</div>
										
											
                                        <div class="button-table-block">
                                            <?php if( have_rows('additional_button') ):
                                                // loop through the rows of data
                                                while ( have_rows('additional_button') ) : the_row(); ?>
                                                    <div class="buttons <?php if ( get_sub_field('text') && get_sub_field('url') ): ?>multiple-buttons<?php endif; ?>">
                                                    <?php if ( get_sub_field('text') && get_sub_field( 'url' ) ): ?>
                                                        <div class="btn-wrap btn-wrap-color" style="margin-bottom: 10px;">
                                                            <a class="btn btn-alt" href="<?php echo get_sub_field('url'); ?>"><?php echo get_sub_field('text'); ?></a>
                                                        </div>
                                                    <?php endif; ?>
                                                    </div>
                                                <?php endwhile; ?>
                                            <?php endif; ?>

                                            <?php if ( get_sub_field( 'request_button' ) ): ?>
                                                <div class="btn-wrap">
                                                    <button class="btn btn-default full-width" data-fancybox data-src="#<?php echo $block[ 'id' ]; ?>-<?php echo $group_i; ?>">
                                                        <?php
                                                        if ( ICL_LANGUAGE_CODE == 'ru' ) {
                                                            echo 'запросить';
                                                        } else {
                                                            echo 'saada päring';
                                                            // _e( 'Pieprasīt', 'default' );
                                                        }
                                                        ?>
                                                    </button>
                                                </div>

                                                <?php if ( $cf = get_field( 'request_form', 'option' ) ): ?>
                                                    <div class="hide">
                                                        <div id="<?php echo $block[ 'id' ]; ?>-<?php echo $group_i; ?>">
                                                            <?php echo do_shortcode( '[contact-form-7 id="' . $cf->ID . '" module-title="' . get_sub_field( 'title' ) . '" page-link="' . get_permalink( $post_id ) . '"]' ); ?>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </div>	

                                        <?php if ( get_sub_field('description_block_title' ) || get_sub_field('description_block_full' )  ): ?>
                                            <div class="description-block">
                                                <?php if (get_sub_field( 'description_block_title' )): ?>
                                                    <span class="description_block_title"><?php echo get_sub_field( 'description_block_title' ); ?></span>
                                                <?php endif; ?>
                                                <?php if (get_sub_field('description_block_full' )): ?>
                                                    <span class="description"><?php echo get_sub_field('description_block_full' ); ?></span>
                                                <?php endif; ?>
                                           </div>
                                        <?php endif; ?>

							    <?php 
$group_i++; endwhile;
 ?>
                            <?php endif; ?>

							</div>
					</div> <?php // < ?>
                <?php 
endwhile;
 ?>

               <?php endif;
 ?>
            </div>
            <div class="f-row f-row-big-table f-row-big-table-description" data-an-type="sequence" data-an>
                <?php
                if( have_rows('features_column_info') ):
                    // loop through the rows of data
                    while ( have_rows('features_column_info') ) : the_row(); ?>
                        <?php if (get_sub_field('bestseller')): ?>
                            <?php $bestseller = "best"; ?>
                        <?php else: ?>
                            <?php $bestseller = ""; ?>
                        <?php endif; ?>
                        <div class="col-check <?php echo $bestseller ?>" data-an="slide-in-from-bottom">
                            <style>
                            .accordion {
                              background-color: #e8e8e8;
                              color: #444;
                              cursor: pointer;
                              padding: 18px;
                              width: 100%;
                              border: none;
                              border-bottom: 2px solid #ccc;
                              text-align: left;
                              outline: none;
                              font-size: 15px;
                              transition: 0.4s;
                            }
                            .active, .accordion:hover {
                              background-color: #ccc;
                            }
                            .panel {
                              padding: 0 18px;
                              display: none;
                              background-color: white;
                              overflow: hidden;
                            }
                            </style>
                            <div class="checklist"> <?php
                                // check if the repeater field has rows of data
                                if( have_rows('Features_big_table_collapse') ):
                                    // loop through the rows of data
                                    $a=0;
                                    while ( have_rows('Features_big_table_collapse') ) : the_row(); ?>
                                        <div class="checklist-row big-table">
                                                <div class="featrues_description">
                                                    <?php the_sub_field('featrues_description'); ?>
                                                </div>
                                                <div class="features-block">
                                                    <div class="features_title">
                                                        <?php the_sub_field('features_title'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php $a++; ?>
                                        <?php endwhile; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                <?php endwhile; ?>
            <?php endif; ?>
            </div>
            <?php
            // Check rows exists.
            if( have_rows('features_additional_info') ):

                // Loop through rows.
                while( have_rows('features_additional_info') ) : the_row(); ?>
                    <div class="features-additional-info">
                        <div class="additional-info">
                            <?= get_sub_field('features_content') ?>
                        </div>
                        <div class="additional-info-link">
                            <?php
                            $link = get_sub_field('features_link');
                            if( $link ):
                                $link_url = $link['url'];
                                $link_title = $link['title'];
                                $link_target = $link['target'] ? $link['target'] : '_self';
                                ?>
                                <div class="btn-wrap btn-wrap-color">
                                    <a class="btn btn-alt" target="<?php echo esc_attr( $link_target ); ?>" href="<?php echo esc_url( $link_url ); ?>"><?php echo esc_html( $link_title ); ?></a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php
                // End loop.
                endwhile;

            // No value.
            else :
                // Do something...
            endif;
            ?>
        </div>
    </div>
</div>



