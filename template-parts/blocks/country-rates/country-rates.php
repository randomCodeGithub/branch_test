
<?php
$countries = csc_get_country_names();

if ( $countries ): ?>

    <div class="csc-block-country-rates">

        <div class="row">
            <div class="col-lg-4">
                <?php if ( get_field( 'title' ) ): ?>
                    <p class="select-label bold"><?php the_field( 'title' ); ?></p>
                <?php endif; ?>

                <div class="select-wrap">
                    <select class="select js-country-rate-picker" autocomplete="off">
                        <option value="0" selected>-</option>
                        <?php foreach ( $countries as $slug => $country ): ?>
                            <option value="<?php echo $slug; ?>"><?php echo ( isset( $country[ICL_LANGUAGE_CODE] ) ) ? $country[ICL_LANGUAGE_CODE] : $country['en']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
        </div>

        <div data-ajax="country-rates"></div>

    </div>

<?php endif; ?>