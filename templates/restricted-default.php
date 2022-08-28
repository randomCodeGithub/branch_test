
<?php
/**
 * Template Name: Restricted - Default
 */
get_header(); ?>


<div class="container">
    <?php
    $user = false;

    if ( is_user_logged_in() ) {
        $user = new WP_User( get_current_user_id() );
    }

    if ( $user && in_array( 'partner_confirmed', $user->roles ) || $user && in_array( 'administrator', $user->roles ) ): ?>
        <div class="editor">
            <?php the_content(); ?>
        </div>
    <?php else: ?>
        <div class="user-form active" data-form="login">
            <?php if ( isset( $_GET['login'] ) && $_GET['login'] == 'failed' ): ?>
                <p class="wpcf7-not-valid-tip text-center" style="margin-bottom: 20px;"><?php _e( 'Sisselogimismandaadid on kehtetud!', 'csc-telecom' ); ?></p>
            <?php endif; ?>

            <?php wp_login_form( [
                'label_username' => __( 'E-mail', 'csc-telecom' ),
                'redirect'       => ( is_ssl() ? 'https://' : 'http://' ) . $_SERVER['HTTP_HOST'] . str_replace( ['?login=failed', '&login=failed'], '', $_SERVER['REQUEST_URI'] )
            ] ); ?>

            <div class="user-form__bot-link text-center">
                <button class="p-smaller js-switch-user-form" data-form="register" type="button"><?php _e( 'Registreeri', 'csc-telecom' ); ?></button>
            </div>
        </div>

        <div class="user-form" data-form="register">
            <form action="<?php echo admin_url( 'admin-post.php' ); ?>" method="post">
                <p class="login-username">
                    <label for="user_reg_email"><?php _e( 'E-mail', 'csc-telecom' ); ?></label>

                    <input type="text" name="user_reg_email" id="user_reg_email" class="input"size="20">
                </p>
                
                <p class="login-password">
                    <label for="user_reg_pass"><?php _e( 'Parool', 'csc-telecom' ); ?></label>

                    <input type="password" name="user_reg_pass" id="user_reg_pass" class="input" size="20">
                </p>

                <p class="login-password">
                    <label for="user_reg_pass_confirm"><?php _e( 'Salasõna kinnitamine', 'csc-telecom' ); ?></label>

                    <input type="password" name="user_reg_pass_confirm" id="user_reg_pass_confirm" class="input" size="20">
                </p>

                <p class="login-submit">
                    <button type="submit" class="btn btn-default"><?php _e( 'Registreeri', 'csc-telecom' ); ?></button>
                </p>

                <input type="hidden" name="redirect_to" value="<?php echo get_permalink(); ?>">
                <input type="hidden" name="action" value="csc_register_account">
            </form>

            <div class="user-form__bot-link text-center">
                <button class="p-smaller js-switch-user-form" data-form="login" type="button"><?php _e( 'Logi sisse', 'csc-telecom' ); ?></button>
            </div>
        </div>
    <?php endif; ?>
</div>

<script>
    function is_email( email ) {
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        return regex.test( email );
    }

    jQuery( document ).ready( function( $ ) {
        function invalid_field( $field, message ) {

            $field.addClass( 'wpcf7-not-valid' );

            if ( $field.next().hasClass( 'wpcf7-not-valid-tip' ) ) {
                $field.next().remove();
            }

            $( '<span class="wpcf7-not-valid-tip">' + message + '</span>' ).insertAfter( $field );

        }

        /**
         * Add markup for "Remember Me" checkbox.
         */
        if ( $( '[name="rememberme"]' ).length ) {
            $( '<span class="checkbox-box"></span>' ).insertAfter( '[name="rememberme"]' );
        }

        /**
         * Switch between forms.
         */
        $( '.js-switch-user-form' ).on( 'click', function() {

            $( '.user-form' ).removeClass( 'active' );
            $( '.user-form[data-form="' + this.dataset.form + '"]' ).addClass( 'active' );

        } );

        /**
         * Validate login form.
         */
        $( '.user-form[data-form="login"]' ).on( 'submit', function() {

            var $email = $( '#user_login' );
            var email  = $email.val();
            var $pass  = $( '#user_pass' );
            var pass   = $pass.val();

            // Remove errors.
            $( '.wpcf7-not-valid', this ).removeClass( 'wpcf7-not-valid' );
            $( '.wpcf7-not-valid-tip', this ).remove();

            // Validate required email.
            if ( ! email ) {
                invalid_field( $email, '<?php _e( "E-posti aadress on kohustuslik", "csc-telecom" ); ?>' );
            }
            
            // Validate email syntax.
            if ( email && ! is_email( email ) ) {
                invalid_field( $email, '<?php _e( "Vale emaili aadress", "csc-telecom" ); ?>' );
            }

            // Validate required pass.
            if ( ! pass ) {
                invalid_field( $pass, '<?php _e( "Parool on nõutav", "csc-telecom" ); ?>' );
            }

            if ( $( '.wpcf7-not-valid', this ).length ) {
                return false;
            }

        } );

        /**
         * Validate registration form.
         */
        $( '.user-form[data-form="register"]' ).on( 'submit', function() {

            var $form = $( this );
            var $btn  = $( '[type="submit"]', $form );

            var $email = $( '#user_reg_email' );
            var email  = $email.val();
            var $pass  = $( '#user_reg_pass' );
            var pass   = $pass.val();
            var $pass2 = $( '#user_reg_pass_confirm' );
            var pass2  = $pass2.val();

            // Remove errors.
            $( '.wpcf7-not-valid', this ).removeClass( 'wpcf7-not-valid' );
            $( '.wpcf7-not-valid-tip', this ).remove();

            // Validate required email.
            if ( ! email ) {
                invalid_field( $email, '<?php _e( "E-posti aadress on kohustuslik", "csc-telecom" ); ?>' );
            }
            
            // Validate email syntax.
            if ( email && ! is_email( email ) ) {
                invalid_field( $email, '<?php _e( "Vale emaili aadress", "csc-telecom" ); ?>' );
            }

            // Validate required pass.
            if ( ! pass ) {
                invalid_field( $pass, '<?php _e( "Parool on nõutav", "csc-telecom" ); ?>' );
            }

            // Validate required pass confirmation.
            if ( ! pass2 ) {
                invalid_field( $pass2, '<?php _e( "Parool on nõutav", "csc-telecom" ); ?>' );
            }

            // Validate password confirm.
            if ( pass && pass2 && pass !== pass2 ) {
                invalid_field( $pass, '<?php _e( "Paroolid peavad ühtima", "csc-telecom" ); ?>' );
                invalid_field( $pass2, '<?php _e( "Paroolid peavad ühtima", "csc-telecom" ); ?>' );
            }

            if ( ! $( '.wpcf7-not-valid', this ).length ) {
                var data = {
                    action: 'csc_register_account',
                    email: email,
                    pass: pass,
                    pass2: pass2
                };

                $.ajax( {
                    type: 'post',
                    url: ajax_url,
                    data: data,

                    beforeSend: function() {
                        $btn.addClass( 'loading' );
                    },

                    success: function( res ) {
                        $btn.removeClass( 'loading' );

                        if ( res.success ) {
                            $form.empty().html( '<p class="text-center">' + res.data.message + '</p>' );
                        } else {
                            $( '.wpcf7-not-valid', this ).removeClass( 'wpcf7-not-valid' );
                            $( '.wpcf7-not-valid-tip', this ).remove();

                            $.each( res.data, function( field, message ) {
                                invalid_field( $( '#' + field ), message );
                            } );
                        }
                    }
                } );
            }
            
            return false;

        } );
    } );
</script>

<style>
    [data-id="private-group"]:not(.wpcf7cf-hidden) { display: block; }
</style>

<?php get_footer(); ?>