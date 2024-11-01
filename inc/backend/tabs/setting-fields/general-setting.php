<div class="wpb-field-section-title">
    <h3><?php echo __('General Setting', 'wp-popup-lite'); ?></h3>
</div>
<div class="wpb-field-setting">
    <label>                
        <h4><?php echo __('Enable Popup on Site', 'wp-popup-lite'); ?></h4>
    </label>
    <div class="wpb-setting-input-field">                
        <label class="wpb-switch">
            <input type="checkbox" class="wpb-checkbox" name="wbp_enable" <?php if (isset($wpb_default_settings['check_enable']) && $wpb_default_settings['check_enable'] == 1) { ?>checked="checked" <?php } ?>>
            <div class="wpb-slider round"></div>
        </label>
        <p class="description" ><?php echo __('Enable or disable the popup on Site.', 'wp-popup-lite') ?></p>
    </div>                                    
</div>
<div class="wpb-field-setting">
    <label>                
        <h4><?php echo __('Disable Popup on Mobile', 'wp-popup-lite'); ?></h4>
    </label>
    <div class="wpb-setting-input-field">                
        <label class="wpb-switch">
            <input type="checkbox" class="wpb-checkbox" name="wbp_enable_mobile" <?php if (isset($wpb_default_settings['wbp_enable_mobile']) && $wpb_default_settings['wbp_enable_mobile'] == 1) { ?>checked="checked" <?php } ?>>
            <div class="wpb-slider round"></div>
        </label>
        <p class="description" ><?php echo __('Enable or disable the popup on Mobile Screen(less than or equals to 480px).', 'wp-popup-lite') ?></p>
    </div>                                   
</div>