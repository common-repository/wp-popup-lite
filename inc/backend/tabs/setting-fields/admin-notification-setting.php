<div class="wpb-field-section-title">
    <h3><?php echo __('Admin Notification Mail Setting', 'wp-popup-lite'); ?></h3>
</div>
<div class="wpb-field-setting">
    <label>                
        <h4><?php echo __('Admin Email', 'wp-popup-lite'); ?></h4>
    </label>
    <div class="wpb-setting-input-field">                
        <input type="text" name="wbp_admin_notification_email" value="<?php
        if (isset($wpb_default_settings['wbp_admin_notification_email']) && !empty($wpb_default_settings['wbp_admin_notification_email'])) {
            echo esc_attr($wpb_default_settings['wbp_admin_notification_email']);
        } else {
            echo $wpb_admin_email;
        }
        ?>">
        <p class="description" ><?php echo __('This email will be used as default while sending mail notification about subscription to admin.', 'wp-popup-lite') ?></p>
    </div>                   
</div>
<div class="wpb-field-setting">
    <label>                
        <h4><?php echo __('Admin Notification Message', 'wp-popup-lite'); ?></h4>
    </label>
    <div class="wpb-setting-input-field">                
        <textarea name="wbp_default_admin_notification_message" row="25" col="25">
            <?php
            if (isset($wpb_default_settings['wbp_default_admin_notification_message']) && !empty($wpb_default_settings['wbp_default_admin_notification_message'])) {
                echo html_entity_decode($wpb_default_settings['wbp_default_admin_notification_message']);
            } else {
                ?>
                <?php
                _e('
Hi there,

Someone just submitted form via WP Popup plugin under popup title #popup_title at #site_name.
Please visit site to view additional details.

Thank you', 'wp-popup-lite');
            }
            ?>

        </textarea>
        <p class="description"><?php _e('You can use (#site_name - Your site name & #popup_title - Title of the popup) to replace with email address', 'wp-popup-lite'); ?></p>

    </div>                   
</div>