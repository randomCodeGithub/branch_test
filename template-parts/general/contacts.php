<div class="contacts">
    <?php if ( $email1 = get_field( 'email_1', 'option' ) ): ?>
			<span><?php echo get_field( 'field_name_first', 'option' ) ?></span>
			<a class="email-1" href="mailto:<?php echo $email1; ?>"><?php echo $email1; ?></a>
    <?php endif; ?>

    <?php if ( $phone1 = get_field( 'phone_1', 'option' ) ): ?>
        <a class="phone-1" href="tel:<?php echo str_replace( ' ', '', $phone1 ); ?>"><?php echo $phone1; ?></a>
    <?php endif; ?>


    <?php if ( $email2 = get_field( 'email_2', 'option' ) ): ?>
		<span><?php echo  get_field( 'field_name_second', 'option' ) ?></span>
        <a class="email-2" href="mailto:<?php echo $email2; ?>"><?php echo $email2; ?></a>
    <?php endif; ?>

    <?php if ( $phone2 = get_field( 'phone_2', 'option' ) ): ?>
        <a class="phone-2" href="tel:<?php echo str_replace( ' ', '', $phone2 ); ?>"><?php echo $phone2; ?></a>
    <?php endif; ?>


    <?php if ( $email3 = get_field( 'email_3', 'option' ) ): ?>
		<span><?php echo  get_field( 'field_name_third', 'option' ) ?></span>
        <a class="email-3" href="mailto:<?php echo $email3; ?>"><?php echo $email3; ?></a>
    <?php endif; ?>

    <?php if ( $phone3 = get_field( 'phone_3', 'option' ) ): ?>
        <a class="phone-3" href="tel:<?php echo str_replace( ' ', '', $phone3 ); ?>"><?php echo $phone3; ?></a>
    <?php endif; ?>
</div>