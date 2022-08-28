<?php

if ( is_admin() ) return;

$hh_labels = array();

if ( have_rows( 'packages' ) ): ?>
    <?php $count = count( get_field( 'packages' ) ); ?>

    <div class="c-packages c-packages--<?php echo $count; ?>">
        <div class="container narrow-6">
            <div class="c-packages__packages l-pkg flex justify-content-center">
                <?php $i = 0; while ( have_rows( 'packages' ) ): the_row(); ?>
                    <?php
                    $hh_labels[] = array(
                        'is_special' => ( get_sub_field( 'special' ) ) ? true : false,
                        'label'      => get_sub_field( 'handheld_name' )
                    );
                    ?>

                    <div class="l-pkg__item">
                        <div class="c-pkg <?php if ( get_sub_field( 'special' ) ): ?>c-pkg--special<?php endif; ?>">
                            <?php if ( $image = get_sub_field( 'image' ) ): ?>
                                <figure class="c-pkg__image">
                                    <img src="<?php echo get_media_url( $image ); ?>" title alt>
                                </figure>
                            <?php endif; ?>

                            <?php if ( get_sub_field( 'name' ) ): ?>
                                <div class="c-pkg__section first relative">
                                    <h4 class="c-pkg__title h4"><?php the_sub_field( 'name' ); ?></h4>

                                    <?php if ( get_sub_field( 'special' ) && get_sub_field( 'special_label' ) ): ?>
                                        <p class="c-pkg__special-label"><?php the_sub_field( 'special_label' ); ?></p>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>

                            <?php if ( get_sub_field( 'price' ) ): ?>
                                <div class="c-pkg__section c-pkg__section--pdb-small">
                                    <p class="c-pkg__price h3"><?php the_sub_field( 'price' ); ?></p>

                                    <?php if ( get_sub_field( 'price_label' ) ): ?>
                                        <p class="c-pkg__price-label"><?php the_sub_field( 'price_label' ); ?></p>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>

                            <div class="c-pkg__section">
                                <?php if ( have_rows( 'info_columns' ) ): ?>
                                    <?php while ( have_rows( 'info_columns' ) ): the_row(); ?>
                                        <div class="c-pkg__info">
                                            <?php if ( get_sub_field( 'label' ) ): ?>
                                                <div class="c-pkg__info-label p-xtra-small-2"><?php the_sub_field( 'label' ); ?></div>
                                            <?php endif; ?>

                                            <div class="flex">
                                                <div class="c-pkg__info-col">
                                                    <div class="h5"><?php the_sub_field( 'left_column_value' ); ?></div>

                                                    <div class="p-xtra-small-2"><?php the_sub_field( 'left_column_label' ); ?></div>
                                                </div>

                                                <div class="c-pkg__info-col">
                                                    <div class="h5"><?php the_sub_field( 'right_column_value' ); ?></div>

                                                    <div class="p-xtra-small-2"><?php the_sub_field( 'right_column_label' ); ?></div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endwhile; ?>
                                <?php endif; ?>

                                <div class="c-pkg__narrow">
                                    <?php if ( get_field( 'request_form', 'option' ) && get_sub_field( 'price_request' ) ): ?>
                                        <div class="c-pkg__request">
                                            <button class="btn btn-default full-width" data-fancybox data-src="#<?php echo $block[ 'id' ] . $i; ?>"><?php _e( 'Запросить', 'default' ); ?></button>
                                        </div>
                                    <?php endif; ?>

                                    <?php if ( get_sub_field( 'note' ) ): ?>
                                        <p class="p-xtra-small-2"><?php the_sub_field( 'note' ); ?></p>
                                    <?php endif; ?>
                                </div>

                                <?php if ( $cf = get_field( 'request_form', 'option' ) ): ?>
                                    <div class="hide">
                                        <div id="<?php echo $block[ 'id' ] . $i; ?>">
                                            <?php echo do_shortcode( '[contact-form-7 id="' . $cf->ID . '" module-title="' . preg_replace( '/( )+/', ' ', strip_tags( get_sub_field( 'name' ) ) ) . '" page-link="' . get_permalink( $post_id ) . '"]' ); ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>

                        <?php if ( have_rows( 'table' ) ): ?>
                            <div class="d-md-none">
                                <?php while ( have_rows( 'table' ) ): the_row(); ?>
                                    <div class="c-pkg__mob-value">
                                        <?php if ( get_sub_field( 'label' ) ): ?>
                                            <div class="c-tbl__title h5 text-center"><?php the_sub_field( 'label' ); ?></div>

                                            <?php
                                            $values = get_sub_field( 'values' );
                                            
                                            if ( isset( $values[$i] ) ): ?>
                                                <div class="c-tbl__value-item">
                                                    <div class="c-tbl__value"><?php echo $values[$i]['value']; ?></div>
                                                </div>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php $i++; endwhile; ?>
            </div>

            <div class="c-packages__headers">
                <div class="container narrow-6">
                    <div class="d-none d-lg-block">
                        <div class="l-pkg flex">
                            <?php $i = 0; while ( have_rows( 'packages' ) ): the_row(); ?>
                                <div class="l-pkg__item">
                                    <div class="c-pkg <?php if ( get_sub_field( 'special' ) ): ?>c-pkg--special<?php endif; ?>">
                                        <?php if ( get_sub_field( 'name' ) ): ?>
                                            <div class="c-pkg__section relative">
                                                <h4 class="c-pkg__title h4"><?php the_sub_field( 'name' ); ?></h4>

                                                <?php if ( get_sub_field( 'special' ) && get_sub_field( 'special_label' ) ): ?>
                                                    <p class="c-pkg__special-label"><?php the_sub_field( 'special_label' ); ?></p>
                                                <?php endif; ?>
                                            </div>
                                        <?php endif; ?>

                                        <?php if ( get_sub_field( 'price' ) ): ?>
                                            <div class="c-pkg__section c-pkg__section--pdb-small">
                                                <p class="c-pkg__price h3"><?php the_sub_field( 'price' ); ?></p>

                                                <?php if ( get_sub_field( 'price_label' ) ): ?>
                                                    <p class="c-pkg__price-label"><?php the_sub_field( 'price_label' ); ?></p>
                                                <?php endif; ?>
                                            </div>
                                        <?php endif; ?>

                                        <div class="c-pkg__section">
                                            <div class="c-pkg__narrow">
                                                <?php if ( get_field( 'request_form', 'option' ) && get_sub_field( 'price_request' ) ): ?>
                                                    <div class="c-pkg__request">
                                                        <button class="btn btn-default full-width" data-fancybox data-src="#<?php echo $block[ 'id' ] . $i; ?>"><?php _e( 'Запросить', 'default' ); ?></button>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php $i++; endwhile; ?>
                        </div>
                    </div>

                    <div class="d-lg-none">
                        <div class="c-packages__hh-headings l-pkg flex">
                            <?php foreach ( $hh_labels as $label ): ?>
                                <div class="l-pkg__item">
                                    <div class="c-tbl__value-item c-tbl__value-item--heading <?php if ( $label['is_special'] ): ?>c-tbl__value-item--special<?php endif; ?>">
                                        <p class="c-tbl__value"><?php echo $label['label']; ?></p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>

            <?php if ( have_rows( 'table' ) ): ?>
                <div class="c-tbl d-none d-md-block">
                    <div class="d-lg-none">
                        <div class="c-packages__hh-headings l-pkg flex">
                            <?php foreach ( $hh_labels as $label ): ?>
                                <div class="l-pkg__item">
                                    <div class="c-tbl__value-item c-tbl__value-item--heading <?php if ( $label['is_special'] ): ?>c-tbl__value-item--special<?php endif; ?>">
                                        <p class="c-tbl__value"><?php echo $label['label']; ?></p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <?php while ( have_rows( 'table' ) ): the_row(); ?>
                        <div class="c-tbl__item text-center">
                            <?php if ( get_sub_field( 'label' ) ): ?>
                                <p class="c-tbl__title h5"><?php the_sub_field( 'label' ); ?></p>
                            <?php endif; ?>

                            <?php if ( have_rows( 'values' ) ): ?>
                                <div class="l-pkg flex">
                                    <?php while ( have_rows( 'values' ) ): the_row(); ?>
                                        <div class="l-pkg__item">
                                            <div class="c-tbl__value-item">
                                                <p class="c-tbl__value"><?php the_sub_field( 'value' ); ?></p>
                                            </div>
                                        </div>
                                    <?php endwhile; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>

            <div class="c-tbl__foot">
                <?php if ( get_field( 'table_note' ) ): ?>
                    <div class="editor"><?php the_field( 'table_note' ); ?></div>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php endif; ?>