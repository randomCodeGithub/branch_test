<?php
/**
 * Features_big_table Table Template.
 *
 * @param array $block The block settings and attributes.
 * @param string $content The block inner HTML (empty).
 * @param bool $is_preview True during AJAX preview.
 * @param (int|string) $post_id The post ID this block is saved to.
 */

$columns = get_field( 'columns_big_table' );
$features_big_table = get_field( 'features_big_table' );

$features_big_table_big = get_field( 'Features_big_table_collapse' );

$features_collapse_repeat = get_field( 'features_collapse_repeat' );


$features_collapse = get_field( 'features_collapse' );
?>

    <div class="csc-block-features-table csc-block-features-table-big csc-block stretch-md">
        <div class="f-row f-row-big-table">
            <div class="col-checklists">
                <div class="f-row f-row-big-table " data-an-type="sequence" data-an> <?php 
				

				if( have_rows('features_column') ):

					// loop through the rows of data
					while ( have_rows('features_column') ) : the_row(); ?>
					

						
							<div class="col-check" data-an="slide-in-from-bottom">
							
								
								<div class="header" style="height: 415px;"> <?php 
									if( have_rows('tab_group') ):

										// loop through the rows of data
										while ( have_rows('tab_group') ) : the_row(); ?>
										
										
											<?php if ( get_sub_field( 'title' ) ): ?>
												<p class="title h4"><?php echo get_sub_field( 'title' ) ; ?></p>
											<?php endif; ?>

											<div class="price-wrap">
												<?php if ( get_sub_field( 'price' ) ): ?>
													<span class="price h3">€ <?php echo get_sub_field( 'price' ); ?></span>
												<?php endif; ?>

												<?php if ( get_sub_field( 'price_period' ) ): ?>
													<span class="period p-smaller" style="margin-left:3px ">  /  <?php echo get_sub_field( 'price_period' ); ?></span>
												<?php endif; ?>
											</div>
											<?php if ( get_sub_field( 'about_title' ) ): ?>
												 <span class="period p-smaller"><?php echo get_sub_field( 'about_title' ); ?></span>
											 <?php endif; ?>
											 
											<div class="internet-block">
												<div class="internet-first">
													<?php if ( get_sub_field('internet_gb_first' ) ): ?>
														 <span class="internet p-smaller"><?php echo get_sub_field( 'internet_gb_first' ); ?></span></br>
													 <?php endif; ?>
													 <?php if ( get_sub_field( 'internet_gb_first_caption' ) ): ?>
														 <span class="internet_caption p-smaller"><?php echo get_sub_field( 'internet_gb_first_caption' ); ?></span>
													 <?php endif; ?>
												</div>
												
												<div class="internet-second">
													 <?php if ( get_sub_field('internet_gb_second' ) ): ?>
														 <span class="internet p-smaller"><?php echo get_sub_field( 'internet_gb_second' ); ?></span></br>
													 <?php endif; ?>
													 <?php if ( get_sub_field('internet_gb_second_caption' ) ): ?>
														 <span class="internet_caption p-smaller"><?php echo get_sub_field( 'internet_gb_second_caption' ); ?></span>
													 <?php endif; ?>
												 </div>
											</div>
											
											 <?php if ( get_sub_field('description_block_title' ) || get_sub_field('description_block_full' )  ): ?>
											 <div class="description-block">
													 <span class="description_block_title p-smaller"><?php echo get_sub_field( 'description_block_title' ); ?></span></br>
												
													 <span class="description p-smaller"><?php echo get_sub_field('description_block_full' ); ?></span>
											</div>
												 <?php endif; ?>
											
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
												
												
												
											
												<?php endwhile;

												else :

													// no rows found

												endif; ?>
											
											
												
<!-- 
<button class="btn btn-default size-2" data-fancybox data-src="#<?php //echo $block[ 'id' ] . $i; ?>"><?php //_e( 'Pieprasīt', 'default' ); ?></button>

                        <?php // if ( $cf = get_field( 'request_form', 'option' ) ): ?>
                          <div class="hide">
                            <div id="<?php  // echo $block[ 'id' ] . $i; ?>">
                              <?php // echo do_shortcode( '[contact-form-7 id="' . $cf->ID . '" page-link="' . get_permalink( $post_id ) . '"]' ); ?>
                            </div>
                          </div>
                        <?php //endif; ?>  -->

											</div>	
											<?php 
											
									 endwhile;

									else :

										// no rows found

									endif; ?>


								</div>
								
								
										
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
														
															 <?php if ( get_sub_field('margin') == 'true'){ ?>
																  <div class="checklist-row big-table" style="margin-top:96px!important"> 
															 <?php } else { ?>
																   <div class="checklist-row big-table open <?php echo $a ?>"  > 
															 <?php } ?>	
																
																<?php 
																 $name=get_sub_field('name');
																 if(!empty($name)) { ?>
																	 <div class="name desktop_name">
																	 <?php echo $name; ?>
																	 </div>
																<?php  } ?>
																
																<?php 
																 $name_mobile=get_sub_field('name_mobile');
																 if(!empty($name_mobile)) { ?>
																	 <div class="name mobile_name">
																	 <?php echo $name_mobile; ?>
																	 </div>
																<?php  }
																
																
																
																
																?>
																
																<div class="ind open<?php echo $a ?> " onclick="javascript:someFunction(event)">

																								
																		<button class="accordion open <?php echo $a ?> ">
																			<div class="features-block">
																				<div class="features_title">
																				<?php the_sub_field('features_title'); ?>
																				</div>
																				<div class="featrues_description">
																				<?php the_sub_field('featrues_description'); ?>
																				</div>
																			</div>
																		<span class="fa fa_plus"></span>
																		</button>
																			
																				<?php
																						

																			// loop through the rows of data

																						if( have_rows('features_collapse') ):?>
																							<div class="panel"><?php
																							// loop through the rows of data

																										// loop through the rows of data
																										while ( have_rows('features_collapse') ) : the_row(); ?>

																												
																													<div class="features-mini-block"> 
																														<div class="features_collapse_title"><?php  the_sub_field('features_collapse_title'); ?></div>
																														<div class="features_collapse_description"><?php  the_sub_field('features_collapse_description'); ?></div>
																														<div class="features_collapse_link"><a href="<?php the_sub_field('url') ?>"><?php  the_sub_field('features_text_link'); ?></a></div>
																													</div>
																												
																												
																
																											

																										<?php endwhile; ?>

																									

																								

																									</div><?php
																						else :

																							// no rows found

																						endif; ?>





			
																		

																</div>					
															</div><?php  $a++; 
														
														endwhile;

													else :

														// no rows found

													endif;?>
													
												</div>
											
									

								


									
								
								
								
								
				
							</div>
<?php 
                     endwhile;

else :

    // no rows found

endif;
					
					?>
					
					
                </div>
            </div>

        </div>
    </div>




