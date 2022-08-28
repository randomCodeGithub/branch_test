<div class="private-or-business container">
    <div class="row justify-content-center">
        <div class="col-6 col-md-4 col-lg-2">
            <label class="radio-box">
                <span class="wpcf7-list-item first">
                    <input type="radio" name="private_or_business" value="<?php echo $args['labels']['private']; ?>" data-type="private" checked>
                    <p class="wpcf7-list-item-label"><?php echo $args['labels']['private']; ?></p>
                </span>
            </label>
        </div>
        <div class="col-6 col-md-4 col-lg-2">
            <label class="radio-box">
                <span class="wpcf7-list-item last">
                    <input type="radio" name="private_or_business" value="<?php echo $args['labels']['business']; ?>" data-type="business">
                    <p class="wpcf7-list-item-label"><?php echo $args['labels']['business']; ?></p>
                </span>
            </label>
        </div>
    </div>
</div>