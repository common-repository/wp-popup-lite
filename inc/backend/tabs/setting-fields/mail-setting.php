<div class="wpb-field-section-title">
    <h3><?php echo __('Mail Setting', 'wp-popup-lite'); ?></h3>
</div>
<div class="wpb-field-setting">
    <label>                
        <h4><?php echo __('Mail Username', 'wp-popup-lite'); ?></h4>
    </label>
    <div class="wpb-setting-input-field">                
        <input type="text" name="wbp_mail_username" value="<?php
        if (isset($wpb_default_settings['wbp_mail_username']) && !empty($wpb_default_settings['wbp_mail_username'])) {
            echo esc_attr($wpb_default_settings['wbp_mail_username']);
        } else {
            echo esc_attr($wpb_blog_name);
        }
        ?>">
        <p class="description" ><?php echo __('This username will be used as default while sending mail to user.', 'wp-popup-lite') ?></p>
    </div>                   
</div>
<div class="wpb-field-setting">
    <label>                
        <h4><?php echo __('Sent From Email', 'wp-popup-lite'); ?></h4>
    </label>
    <div class="wpb-setting-input-field">                
        <input type="text" name="wbp_mail_email" value="<?php
        if (isset($wpb_default_settings['wbp_mail_email']) && !empty($wpb_default_settings['wbp_mail_email'])) {
            echo esc_attr($wpb_default_settings['wbp_mail_email']);
        } else {
            echo 'no-reply@' . esc_attr($wpb_site_urlc);
        }
        ?>">
        <p class="description" ><?php echo __('This email will be used as default while sending mail to user.', 'wp-popup-lite') ?></p>
    </div>                   
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


