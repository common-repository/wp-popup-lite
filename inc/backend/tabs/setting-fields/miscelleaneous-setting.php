<div class="wpb-field-section-title">
    <h3><?php echo __('Miscellaneous Settings', 'wp-popup-lite'); ?></h3>
</div>
<div class="wpb-field-setting">
    <label>                
        <h4><?php echo __('Cookie Expiry Date', 'wp-popup-lite'); ?></h4>
    </label>
    <div class="wpb-setting-input-field">                
        <input type="number" name="wbp_cookie_expire_period" value="<?php
        if (isset($wpb_default_settings['wbp_cookie_expire_period']) && !empty($wpb_default_settings['wbp_cookie_expire_period'])) {
            echo esc_attr($wpb_default_settings['wbp_cookie_expire_period']);
        }
        ?>"/>
        <p class="description" ><?php echo __('Set default value for cookie expire period ( in days )', 'wp-popup-lite') ?></p>
    </div>                   
</div>
<div class="wpb-field-setting">
    <label>                
        <h4><?php echo __('Disable Fontawesome', 'wp-popup-lite'); ?></h4>
    </label>
    <div class="wpb-setting-input-field">                
        <label class="wpb-switch">
            <input type="checkbox" class="wpb-checkbox"  name="wbp_disable_faw" <?php if (isset($wpb_default_settings['wbp_disable_faw']) && $wpb_default_settings['wbp_disable_faw'] == 1) { ?>checked="checked" <?php } ?>/>
            <div class="wpb-slider round"></div>
        </label>
        <p class="description" ><?php echo __('Disable font awesome if site or installed plugin already has it implemented in order to avoid  conflicts.', 'wp-popup-lite') ?></p>
    </div>                   
</div>
<div class="wpb-field-setting">
    <label>                
        <h4><?php echo __('Disable animate.css file', 'wp-popup-lite'); ?></h4>
    </label>
    <div class="wpb-setting-input-field">                
        <label class="wpb-switch">
            <input type="checkbox" class="wpb-checkbox" name="wbp_disable_css3" <?php if (isset($wpb_default_settings['wbp_disable_css3']) && $wpb_default_settings['wbp_disable_css3'] == 1) { ?>checked="checked" <?php } ?>/>
            <div class="wpb-slider round"></div>
        </label>
        <p class="description" ><?php echo __('Disable animate.css if site or installed plugin already has it implemented  in order to avoid conflicts.', 'wp-popup-lite') ?></p>
    </div>                   
</div>