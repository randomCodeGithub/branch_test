<div class="tabs country-rates-tabs">
    <div class="header-wrap mg-block-md">
        <div class="header flex">
            <button class="active" data-tab="1"><?php _e( 'Hinnad', 'default' ); ?></button>

            <?php if ( isset( $country['network'] ) && ! empty( $country['network'] ) ): ?>
                <button data-tab="2"><?php _e( 'Võrgud', 'default' ); ?></button>
            <?php endif; ?>
        </div>
    </div>

    <div class="content">
        <div class="tab active" data-tab="1">
            <?php if ( isset( $country['calls'] ) ): ?>
                <div class="cr-block mg-block-sm">
                    <h3 class="h3 mg-heading"><?php _e( 'Kõned', 'default' ); ?></h3>
                    <table class="country-rate-table data-table">
                        <tbody>
                            <?php if ( isset( $country['calls']['outgoing']['outside'] ) ): ?>
                                <tr>
                                    <td><?php _e( 'Väljaminevad kõned (kõik riigid)', 'default' ); ?></td>
                                    <td><?php echo $country['calls']['outgoing']['outside']; ?> &euro;</td>
                                </tr>
                            <?php endif; ?>
                            <?php if ( isset( $country['calls']['outgoing']['inside'] ) ): ?>
                                <tr>
                                    <td><?php _e( 'Väljaminevad kõned', 'default' ); ?> <?php echo ( isset( $country['name_' . ICL_LANGUAGE_CODE] ) ) ? $country['name_' . ICL_LANGUAGE_CODE] : $country['name']; ?></td>
                                    <td><?php echo $country['calls']['outgoing']['inside']; ?> &euro;</td>
                                </tr>
                            <?php endif; ?>
                            <?php if ( isset( $country['calls']['incoming'] ) ): ?>
                                <tr>
                                    <td><?php _e( 'Sissetulevad kõned', 'default' ); ?></td>
                                    <td><?php echo $country['calls']['incoming']; ?> &euro;</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>

            <?php if ( isset( $country['sms'] ) ): ?>
                <div class="cr-block mg-block-sm">
                    <h3 class="h3 mg-heading"><?php _e( 'SMS', 'default' ); ?></h3>
                    <table class="country-rate-table data-table">
                        <tbody>
                            <tr>
                                <td><?php _e( 'SMS sõnumi hind', 'default' ); ?></td>
                                <td><?php echo $country['sms']; ?> &euro;</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>

            <?php if ( get_field( 'internet_rates_inside_eu', 'country-rates' ) && get_field( 'internet_rates_outside_eu', 'country-rates' ) ): ?>
                <div class="cr-block mg-block-sm">
                    <h3 class="h3 mg-heading"><?php _e( 'Internet', 'default' ); ?></h3>
                    <table class="country-rate-table data-table">
                        <tbody>
                            <?php if ( $country['eu'] ): ?>
                                <tr>
                                    <td><?php _e( 'Interneti hind', 'default' ); ?></td>
                                    <td><span>1<?php _e( 'GB', 'default' ); ?> - <?php the_field( 'internet_rates_inside_eu', 'country-rates' ); ?></span> &euro;</td>
                                </tr>
                            <?php else: ?>
                            <tr>
                                    <td><?php _e( 'Interneti hind', 'default' ); ?></td>
                                    <td><span>1<?php _e( 'GB', 'default' ); ?> - <?php the_field( 'internet_rates_outside_eu', 'country-rates' ); ?></span> &euro;</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
        </div>

        <?php if ( isset( $country['network'] ) && ! empty( $country['network'] ) ): ?>
            <div class="tab" data-tab="2">
                <div class="cr-block">
                    <h3 class="h3 mg-heading"><?php _e( 'Operaatorid', 'default' ); ?></h3>
                    <table class="country-rate-table data-table mg-block-sm">
                        <thead>
                            <tr>
                                <th><p class="h4"><?php _e( 'Võrk', 'default' ); ?></p></th>
                                <th><p class="h4"><?php _e( 'Võrgu tüüp', 'default' ); ?></p></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ( $country['network'] as $network ): ?>
                                <tr>
                                    <td><?php echo $network['name']; ?></td>
                                    <td><?php echo $network['type']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>