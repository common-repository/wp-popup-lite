<div class="wpb-field-section-title">
    <h3><?php echo __('On Action Setting', 'wp-popup-lite'); ?></h3>
</div>
<div class="wpb-field-section-inner-content">
    <div class="wpb-field-section-inner-title">
        <h3><?php echo __('On Page Load', 'wp-popup-lite'); ?></h3>
    </div>
    <div class="wpb-field-setting">
        <div class="wpb-field-inner-section-title">
            <label>
                <h4><?php echo __('Select Default Popup', 'wp-popup-lite'); ?></h4>
            </label>                                               
        </div>                           
        <div class="wpb-setting-input-field">
            <select id="" name="wpb_default_id">
                <option value="default"><?php echo __('Disable Popup', 'wp-popup-lite') ?></option>
                <?php
                foreach ($rows as $key => $value) {
                    $parameteres = (unserialize($value->option_value));
                    ?>
                    <option value="<?php echo $value->id; ?>" <?php if (isset($wpb_default_settings['default_popup_id']) && $wpb_default_settings['default_popup_id'] == $value->id) { ?>selected="selected" <?php } ?> ><?php echo esc_attr($parameteres['popup_parameters']['title']); ?></option>
                    <?php
                }
                ?>                        
            </select>
            <p class="description"><?php echo __('Select the popup popup to display on page load', 'wp-popup-lite') ?></p>
        </div>
    </div>
    <div class="wpb-field-setting">
        <div class="wpb-field-inner-section-title">
            <label>
                <h4><?php echo __('Popup Display Type', 'wp-popup-lite'); ?></h4>
            </label>                                               
        </div>   
        <div class="wpb-setting-input-field">
            <select id="" name="wpb_disp_duration">
                <option value="always" <?php if (isset($wpb_default_settings['wpb_disp_duration']) && $wpb_default_settings['wpb_disp_duration'] == 'once') { ?>selected="selected" <?php } ?> ><?php echo __('Always', 'wp-popup-lite'); ?></option>                        
                <option value="once" <?php if (isset($wpb_default_settings['wpb_disp_duration']) && $wpb_default_settings['wpb_disp_duration'] == 'once') { ?>selected="selected" <?php } ?> ><?php echo __('Only Once', 'wp-popup-lite'); ?></option>  
            </select>
        </div>
    </div>
    <div class="wpb-field-setting">
        <div class="wpb-field-inner-section-title">
            <label>
                <h4><?php echo __('Display Popup On', 'wp-popup-lite'); ?></h4>
            </label>                                               
        </div>
        <div class="menu-option-inner-input">
            <select name="load_popup_show_hide_on" id="wpb-load-popup-show-hide" class="wpfm-display-menu-option" >
                <option value="home-page"  <?php if (isset($wpb_default_settings['load_popup_show_hide_on']) && $wpb_default_settings['load_popup_show_hide_on'] == 'home-page') { ?>selected="selected"<?php } ?>><?php _e('Home page Only', 'wp-popup-lite'); ?></option>
            </select>
        </div>
    </div>
    <div class="wpb-field-setting" id="wpb-load-specific-show-hide-on" <?php if (isset($wpb_default_settings['load_popup_show_hide_on']) && $wpb_default_settings['load_popup_show_hide_on'] == 'page-specific') { ?>style="display:block;"<?php } else { ?>style="display:none;<?php } ?>">
        
    </div>
    <div class="wpb-field-setting">
        <label>
            <h4><?php echo __('Popup Delay (in second)', 'wp-popup-lite'); ?></h4>
        </label>
        <div class="wpb-setting-input-field">
            <div class="wpb-val-slider" id="slider">
                <input type="number" name="popup_delay" value="<?php
                if (isset($wpb_default_settings['popup_delay']) && !empty($wpb_default_settings['popup_delay'])) {
                    echo esc_attr($wpb_default_settings['popup_delay']);
                }
                ?>"/>
            </div>
            <p class="description" ><?php echo __('Time delay to display popup after the page load. Default is 2 seconds.', 'wp-popup-lite') ?></p>
        </div>
    </div>
</div><!-- On load Field Setting Ends -->