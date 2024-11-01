<div class="wpb-default-settings wpb-input-field">  
    <div class="wpb-default-setting-group-wrapper">
        <div class="wpb-default-group-title">
            <h3><?php echo __('Theme Settings', 'wp-popup-lite'); ?></h3>
            <span class="wpb-arrow-down"></span>
        </div>
        <div class="wpb-default-setting-field-wrapper" id='wpb-basic-layout-setting'>
            <div class="wpb-input-field-wrap" id="wpb-basic-layout-setting">
                <div class="wpb-input-field-title">
                    <label>
                        <h4><?php echo __('Right Section Background Image', 'wp-popup-lite') ?></h4>
                    </label>
                </div>
                <div class="wpb-input-field">
                    <input id="wpb-upload-buildin-bg-image" type="text" name="buildin_theme[wpb_builtin_rightbg_image]" value="<?php echo esc_url($buildin_theme['buildin_popup']['wpb_builtin_rightbg_image']); ?>">
                    <input class="wpb-upload-buildin-bg-image-button button button-primary" type="button" value="<?php _e('Upload Background Image', 'wp-popup-lite'); ?>">
                </div>
            </div>
            <div class="wpb-input-field-wrap" id="wpb-basic-layout-setting">
                <div class="wpb-input-field-title">
                    <label>
                        <h4><?php echo __('Right Section Background Color', 'wp-popup-lite') ?></h4>
                    </label>
                </div>
                <div class="wpb-input-field">
                    <input class="buildin-default-font-color" id="wpb-upload-builtin-bg-image" type="text" name="buildin_theme[wpb_builtin_rightbg_color]" value="<?php echo esc_attr($buildin_theme['buildin_popup']['wpb_builtin_rightbg_color']); ?>">
                </div>
            </div>
            <div class="wpb-input-field-wrap" id="wpb-basic-layout-setting">
                <div class="wpb-input-field-title">
                    <label>
                        <h4><?php echo __('Main Image', 'wp-popup-lite') ?></h4>
                    </label>
                </div>
                <div class="wpb-input-field">
                    <input id="wpb-upload-buildin-bg-image" type="text" name="buildin_theme[wpb_builtin_main_image]" value="<?php echo esc_url($buildin_theme['buildin_popup']['wpb_builtin_main_image']); ?>">
                    <input class="wpb-upload-buildin-bg-image-button button button-primary" type="button" value="<?php _e('Upload Image', 'wp-popup-lite'); ?>">
                </div>
            </div>
            <div class="wpb-input-field-wrap" id="wpb-basic-layout-setting">
                <div class="wpb-input-field-title">
                    <label>
                        <h4><?php echo __('Header Text', 'wp-popup-lite') ?></h4>
                    </label>
                </div>
                <div class="wpb-input-field">
                    <input type="text" id="wpb-header-text" name="buildin_theme[wpb_header_text]" value="<?php echo esc_attr($buildin_theme['buildin_popup']['wpb_header_text']); ?>" placeholder="<?php echo __('Contact Us', 'wp-popup-lite'); ?>">
                </div>
            </div>
            <div class="wpb-input-field-wrap" id="wpb-basic-layout-setting">
                <div class="wpb-input-field-title">
                    <label>
                        <h4><?php echo __('Header Typography', 'wp-popup-lite') ?></h4>
                    </label>
                </div>
                <div class="wpb-input-field-inner">
                    <div class="wpb-input-field">
                        <select name="buildin_theme[wpb_header_typography]" id="wpb-header-font-family">
                            <option value="default"><?php _e('Default', 'wp-popup-lite'); ?></option>
                            <?php foreach (get_option('wpb_typo_fonts') as $wpb_font) { ?>
                                <option value="<?php echo $wpb_font; ?> <?php
                                if (isset($buildin_theme['buildin_popup']['wpb_header_typography']) && $buildin_theme['buildin_popup']['wpb_header_typography'] == $wpb_font) {
                                    echo 'selected="selected"';
                                }
                                ?>"><?php echo $wpb_font; ?></option>
                                    <?php } ?>
                        </select>
                    </div>
                    <div class="wpb-input-field">
                        <input type="text" id="wpb-popup-header-font-size" name="buildin_theme[wpb_header_text_font_size]" value="<?php echo esc_attr($buildin_theme['buildin_popup']['wpb_header_text_font_size']); ?>" ><?php _e('px', 'wp-popup-lite'); ?>
                    </div>
                    <div class="wpb-input-field">
                        <input type="text" class="buildin-default-font-color" id="wpb-popup-header-font-color" name="buildin_theme[wpb_header_text_font_color]" value="<?php echo esc_attr($buildin_theme['buildin_popup']['wpb_header_text_font_color']); ?>">
                    </div>
                </div>
            </div>
            <div class="wpb-input-field-wrap" id="wpb-popup-background-field">
                <div class="wpb-input-field-title">
                    <label>
                        <h4><?php echo __('Name Field as Required', 'wp-popup-lite'); ?></h4>
                    </label>
                </div>
                <div class="wpb-input-field">
                    <label class="wpb-switch">
                        <input type="checkbox" id="wpb-name-required" name="buildin_theme[wpb_name_field_req]" <?php
                        if (isset($buildin_theme['buildin_popup']['wpb_name_field_req']) && $buildin_theme['buildin_popup']['wpb_name_field_req'] == 'on') {
                            echo 'checked=checked';
                        }
                        ?>/>
                        <div class="wpb-slider round"></div>
                    </label>
                </div>
            </div>
            <div class="wpb-input-field-wrap" id="wpb-popup-background-field">
                <div class="wpb-input-field-title">
                    <label>
                        <h4><?php echo __('Name Label', 'wp-popup-lite'); ?></h4>
                    </label>
                </div>
                <div class="wpb-input-field">
                    <input type="text" id="wpb-email-label-text" name="buildin_theme[wpb_name_label_text]" value="<?php echo esc_attr($buildin_theme['buildin_popup']['wpb_name_label_text']); ?>" placeholder="<?php echo __('Name', 'wp-popup-lite'); ?>">
                </div>
            </div>
            <div class="wpb-input-field-wrap" id="wpb-basic-layout-setting">
                <div class="wpb-input-field-title">
                    <label>
                        <h4><?php echo __('Name Label Typography', 'wp-popup-lite') ?></h4>
                    </label>
                </div>
                <div class="wpb-input-field-inner">
                    <div class="wpb-input-field">
                        <select name="buildin_theme[wpb_name_label_typography]" id="wpb-inner-name-placeholder-font-family">
                            <option value="default"><?php _e('Default', 'wp-popup-lite'); ?></option>
                            <?php foreach (get_option('wpb_typo_fonts') as $wpb_font) { ?>
                                <option value="<?php echo $wpb_font; ?>" <?php
                                if (isset($buildin_theme['buildin_popup']['wpb_name_label_typography']) && $buildin_theme['buildin_popup']['wpb_name_label_typography'] == $wpb_font) {
                                    echo 'selected="selected"';
                                }
                                ?>><?php echo $wpb_font; ?></option>
                                    <?php } ?>
                        </select>
                    </div>
                    <div class="wpb-input-field">
                        <input type="text" class="buildin-default-font-color" id="wpb-popup-name-label-font-color" name="buildin_theme[wpb_name_label_font_color]" value="<?php echo esc_attr($buildin_theme['buildin_popup']['wpb_name_label_font_color']); ?>">
                    </div>
                </div>
            </div>
            <div class="wpb-input-field-wrap" id="wpb-hidden-overlay-color-field">
                <div class="wpb-input-field-title">
                    <label>
                        <h4><?php echo __('Name Placeholder', 'wp-popup-lite'); ?></h4>
                    </label>
                </div>
                <div class="wpb-input-field">
                    <input id="wpb-email-placeholder" type="text" name="buildin_theme[wpb_name_placeholder_text]" value="<?php echo esc_attr($buildin_theme['buildin_popup']['wpb_name_placeholder_text']); ?>" placeholder="<?php echo __('Enter your Name..', 'wp-popup-lite'); ?>"/>
                </div>
            </div>
            <div class="wpb-input-field-wrap" id="wpb-basic-layout-setting">
                <div class="wpb-input-field-title">
                    <label>
                        <h4><?php echo __('Name Placeholder Typography', 'wp-popup-lite') ?></h4>
                    </label>
                </div>
                <div class="wpb-input-field-inner">
                    <div class="wpb-input-field">
                        <select name="buildin_theme[wpb_name_placeholder_typography]" id="wpb-inner-email-placeholder-font-family">
                            <option value="default"><?php _e('Default', 'wp-popup-lite'); ?></option>
                            <?php foreach (get_option('wpb_typo_fonts') as $wpb_font) { ?>
                                <option value="<?php echo $wpb_font; ?>" <?php
                                if (isset($buildin_theme['buildin_popup']['wpb_name_placeholder_typography']) && $buildin_theme['buildin_popup']['wpb_name_placeholder_typography'] == $wpb_font) {
                                    echo 'selected="selected"';
                                }
                                ?>><?php echo $wpb_font; ?></option>
                                    <?php } ?>
                        </select>
                    </div>
                    <div class="wpb-input-field">
                        <input type="text" class="buildin-default-font-color" id="wpb-popup-email-placeholder-font-color" name="buildin_theme[wpb_name_placeholder_font_color]" value="<?php echo esc_attr($buildin_theme['buildin_popup']['wpb_name_placeholder_font_color']); ?>">
                    </div>
                </div>
            </div>
            <div class="wpb-input-field-wrap" id="wpb-popup-background-field">
                <div class="wpb-input-field-title">
                    <label>
                        <h4><?php echo __('Email Field as Required', 'wp-popup-lite'); ?></h4>
                    </label>
                </div>
                <div class="wpb-input-field">
                    <label class="wpb-switch">
                        <input type="checkbox" id="wpb-name-required" name="buildin_theme[wpb_email_field_req]" <?php
                        if (isset($buildin_theme['buildin_popup']['wpb_email_field_req']) && $buildin_theme['buildin_popup']['wpb_email_field_req'] == 'on') {
                            echo 'checked=checked';
                        }
                        ?>/>
                        <div class="wpb-slider round"></div>
                    </label>
                </div>
            </div>
            <div class="wpb-input-field-wrap" id="wpb-hidden-overlay-color-field">
                <div class="wpb-input-field-title">
                    <label>
                        <h4><?php echo __('Email Label', 'wp-popup-lite'); ?></h4>
                    </label>
                </div>
                <div class="wpb-input-field">
                    <input id="wpb-email-placeholder" type="text" name="buildin_theme[wpb_email_label_text]" value="<?php echo esc_attr($buildin_theme['buildin_popup']['wpb_email_label_text']); ?>" placeholder="<?php echo __('Email Address', 'wp-popup-lite'); ?>"/>
                </div>
            </div>
            <div class="wpb-input-field-wrap" id="wpb-basic-layout-setting">
                <div class="wpb-input-field-title">
                    <label>
                        <h4><?php echo __('Email Label Typography', 'wp-popup-lite') ?></h4>
                    </label>
                </div>
                <div class="wpb-input-field-inner">
                    <div class="wpb-input-field">
                        <select name="buildin_theme[wpb_email_label_typography]" id="wpb-inner-email-placeholder-font-family">
                            <option value="default"><?php _e('Default', 'wp-popup-lite'); ?></option>
                            <?php foreach (get_option('wpb_typo_fonts') as $wpb_font) { ?>
                                <option value="<?php echo $wpb_font; ?>" <?php
                                if (isset($buildin_theme['buildin_popup']['wpb_email_label_typography']) && $buildin_theme['buildin_popup']['wpb_email_label_typography'] == $wpb_font) {
                                    echo 'selected="selected"';
                                }
                                ?>><?php echo $wpb_font; ?></option>
                                    <?php } ?>
                        </select>
                    </div>
                    <div class="wpb-input-field">
                        <input type="text" class="buildin-default-font-color" id="wpb-popup-email-placeholder-font-color" name="buildin_theme[wpb_email_label_font_color]" value="<?php echo esc_attr($buildin_theme['buildin_popup']['wpb_email_label_font_color']); ?>">
                    </div>
                </div>
            </div>
            <div class="wpb-input-field-wrap" id="wpb-hidden-overlay-color-field">
                <div class="wpb-input-field-title">
                    <label>
                        <h4><?php echo __('Email Placeholder', 'wp-popup-lite'); ?></h4>
                    </label>
                </div>
                <div class="wpb-input-field">
                    <input id="wpb-email-placeholder" type="text" name="buildin_theme[wpb_email_placeholder]" value="<?php echo esc_attr($buildin_theme['buildin_popup']['wpb_email_placeholder']); ?>" placeholder="<?php echo __('Enter your email..', 'wp-popup-lite'); ?>"/>
                </div>
            </div>
            <div class="wpb-input-field-wrap" id="wpb-basic-layout-setting">
                <div class="wpb-input-field-title">
                    <label>
                        <h4><?php echo __('Email Placeholder Typography', 'wp-popup-lite') ?></h4>
                    </label>
                </div>
                <div class="wpb-input-field-inner">
                    <div class="wpb-input-field">
                        <select name="buildin_theme[wpb_email_placeholder_typography]" id="wpb-inner-email-placeholder-font-family">
                            <option value="default"><?php _e('Default', 'wp-popup-lite'); ?></option>
                            <?php foreach (get_option('wpb_typo_fonts') as $wpb_font) { ?>
                                <option value="<?php echo $wpb_font; ?>" <?php
                                if (isset($buildin_theme['buildin_popup']['wpb_email_placeholder_typography']) && $buildin_theme['buildin_popup']['wpb_email_placeholder_typography'] == $wpb_font) {
                                    echo 'selected="selected"';
                                }
                                ?>><?php echo $wpb_font; ?></option>
                                    <?php } ?>
                        </select>
                    </div>
                    <div class="wpb-input-field">
                        <input type="text" class="buildin-default-font-color" id="wpb-popup-email-placeholder-font-color" name="buildin_theme[wpb_email_placeholder_font_color]" value="<?php echo esc_attr($buildin_theme['buildin_popup']['wpb_email_placeholder_font_color']); ?>">
                    </div>
                </div>
            </div>
            <div class="wpb-input-field-wrap" id="wpb-popup-background-field">
                <div class="wpb-input-field-title">
                    <label>
                        <h4><?php echo __('Message Field as Required', 'wp-popup-lite'); ?></h4>
                    </label>
                </div>
                <div class="wpb-input-field">
                    <label class="wpb-switch">
                        <input type="checkbox" id="wpb-name-required" name="buildin_theme[wpb_message_field_req]" <?php
                        if (isset($buildin_theme['buildin_popup']['wpb_message_field_req']) && $buildin_theme['buildin_popup']['wpb_message_field_req'] == 'on') {
                            echo 'checked=checked';
                        }
                        ?>/>
                        <div class="wpb-slider round"></div>
                    </label>
                </div>
            </div>
            <div class="wpb-input-field-wrap" id="wpb-hidden-overlay-color-field">
                <div class="wpb-input-field-title">
                    <label>
                        <h4><?php echo __('Message Label', 'wp-popup-lite'); ?></h4>
                    </label>
                </div>
                <div class="wpb-input-field">
                    <input id="wpb-email-placeholder" type="text" name="buildin_theme[wpb_message_label]" value="<?php echo esc_attr($buildin_theme['buildin_popup']['wpb_message_label']); ?>" placeholder="<?php echo __('Message', 'wp-popup-lite'); ?>"/>
                </div>
            </div>
            <div class="wpb-input-field-wrap" id="wpb-basic-layout-setting">
                <div class="wpb-input-field-title">
                    <label>
                        <h4><?php echo __('Message Label Typography', 'wp-popup-lite') ?></h4>
                    </label>
                </div>
                <div class="wpb-input-field-inner">
                    <div class="wpb-input-field">
                        <select name="buildin_theme[wpb_message_label_typography]" id="wpb-inner-email-placeholder-font-family">
                            <option value="default"><?php _e('Default', 'wp-popup-lite'); ?></option>
                            <?php foreach (get_option('wpb_typo_fonts') as $wpb_font) { ?>
                                <option value="<?php echo $wpb_font; ?>" <?php
                                if (isset($buildin_theme['buildin_popup']['wpb_message_label_typography']) && $buildin_theme['buildin_popup']['wpb_message_label_typography'] == $wpb_font) {
                                    echo 'selected="selected"';
                                }
                                ?>><?php echo $wpb_font; ?></option>
                                    <?php } ?>
                        </select>
                    </div>
                    <div class="wpb-input-field">
                        <input type="text" class="buildin-default-font-color" id="wpb-popup-email-placeholder-font-color" name="buildin_theme[wpb_message_label_font_color]" value="<?php echo esc_attr($buildin_theme['buildin_popup']['wpb_message_label_font_color']); ?>">
                    </div>
                </div>
            </div>
            <div class="wpb-input-field-wrap" id="wpb-hidden-overlay-color-field">
                <div class="wpb-input-field-title">
                    <label>
                        <h4><?php echo __('Message Placeholder', 'wp-popup-lite'); ?></h4>
                    </label>
                </div>
                <div class="wpb-input-field">
                    <input id="wpb-email-placeholder" type="text" name="buildin_theme[wpb_message_placeholder]" value="<?php echo esc_attr($buildin_theme['buildin_popup']['wpb_message_placeholder']); ?>" placeholder="<?php echo __('Enter your Message..', 'wp-popup-lite'); ?>"/>
                </div>
            </div>
            <div class="wpb-input-field-wrap" id="wpb-basic-layout-setting">
                <div class="wpb-input-field-title">
                    <label>
                        <h4><?php echo __('Message Placeholder Typography', 'wp-popup-lite') ?></h4>
                    </label>
                </div>
                <div class="wpb-input-field-inner">
                    <div class="wpb-input-field">
                        <select name="buildin_theme[wpb_message_placeholder_typography]" id="wpb-inner-email-placeholder-font-family">
                            <option value="default"><?php _e('Default', 'wp-popup-lite'); ?></option>
                            <?php foreach (get_option('wpb_typo_fonts') as $wpb_font) { ?>
                                <option value="<?php echo $wpb_font; ?>" <?php
                                if (isset($buildin_theme['buildin_popup']['wpb_message_placeholder_typography']) && $buildin_theme['buildin_popup']['wpb_message_placeholder_typography'] == $wpb_font) {
                                    echo 'selected="selected"';
                                }
                                ?>><?php echo $wpb_font; ?></option>
                                    <?php } ?>
                        </select>
                    </div>
                    <div class="wpb-input-field">
                        <input type="text" class="buildin-default-font-color" id="wpb-popup-email-placeholder-font-color" name="buildin_theme[wpb_message_placeholder_font_color]" value="<?php echo esc_attr($buildin_theme['buildin_popup']['wpb_message_placeholder_font_color']); ?>">
                    </div>
                </div>
            </div>
            <div class="wpb-input-field-wrap" id="wpb-popup-shape">
                <div class="wpb-input-field-title">
                    <label>
                        <h4><?php echo __('Submit Button Text', 'wp-popup-lite') ?></h4>
                    </label>
                </div>
                <div class="wpb-input-field">
                    <input type="text" id="wpb-submit-button-text" name="buildin_theme[wpb_submit_text]" value="<?php echo esc_attr($buildin_theme['buildin_popup']['wpb_submit_text']); ?>" placeholder="<?php echo __('Mail Us', 'wp-popup-lite'); ?>">
                </div>
            </div>
            <div class="wpb-input-field-wrap" id="wpb-basic-layout-setting">
                <div class="wpb-input-field-title">
                    <label>
                        <h4><?php echo __('Submit Button Text Typography', 'wp-popup-lite') ?></h4>
                    </label>
                </div>
                <div class="wpb-input-field-inner">
                    <div class="wpb-input-field">
                        <select name="buildin_theme[wpb_submit_button_text_typography]" id="wpb-submit-button-font-family">
                            <option value="default"><?php _e('Default', 'wp-popup-lite'); ?></option>
                            <?php foreach (get_option('wpb_typo_fonts') as $wpb_font) { ?>
                                <option value="<?php echo $wpb_font; ?>" <?php
                                if (isset($buildin_theme['buildin_popup']['wpb_submit_button_text_typography']) && $buildin_theme['buildin_popup']['wpb_submit_button_text_typography'] == $wpb_font) {
                                    echo 'selected="selected"';
                                }
                                ?>><?php echo $wpb_font; ?></option>
                                    <?php } ?>
                        </select>
                    </div>
                    <div class="wpb-input-field">
                        <input type="text" class="buildin-default-font-color" id="wpb-submit-button-font-color" name="buildin_theme[wpb_submit_button_text_font_color]" value="<?php echo esc_attr($buildin_theme['buildin_popup']['wpb_submit_button_text_font_color']); ?>">
                    </div>
                </div>
            </div>
            <div class="wpb-input-field-wrap" id="wpb-basic-layout-setting">
                <div class="wpb-input-field-title">
                    <label>
                        <h4><?php echo __('Submit Button loading Text', 'wp-popup-lite') ?></h4>
                    </label>
                </div>
                <div class="wpb-input-field">
                    <input type="text" id="wpb-popup-submit-field-load" name="buildin_theme[wpb_submit_button_loading_text]" value="<?php echo esc_attr($buildin_theme['buildin_popup']['wpb_submit_button_loading_text']); ?>" placeholder="<?php echo __('Ajax loader by default', 'wp-popup-lite'); ?>">
                </div>
            </div>
            <div class="wpb-input-field-wrap" id="wpb-basic-layout-setting">
                <div class="wpb-input-field-title">
                    <label>
                        <h4><?php echo __('Submit Button Thanks Text', 'wp-popup-lite') ?></h4>
                    </label>
                </div>
                <div class="wpb-input-field">
                    <input type="text" id="wpb-popup-submit-field-thanks" name="buildin_theme[wpb_submit_button_thanks_text]" value="<?php echo esc_attr($buildin_theme['buildin_popup']['wpb_submit_button_thanks_text']); ?>" placeholder="<?php echo __('Thank You', 'wp-popup-lite'); ?>">
                </div>
            </div>
            <div class="wpb-input-field-wrap">
                <div class="wpb-input-field-title">
                    <label>
                        <h4><?php echo __('Error Text', 'wp-popup-lite') ?></h4>
                    </label>
                </div>
                <div class="wpb-input-field">
                    <input type="text" class="wpb-submit-error" id="wpb-submit-error-text" name="buildin_theme[submit_button_error_text]" value="<?php echo esc_attr($buildin_theme['buildin_popup']['submit_button_error_text']); ?>" placeholder="<?php echo __('Oh snap!', 'wp-popup-lite'); ?>"/>
                </div>
            </div>
            <div class="wpb-input-field-wrap">
                <div class="wpb-input-field-title">
                    <label>
                        <h4><?php echo __('Submit Success Message', 'wp-popup-lite') ?></h4>
                    </label>
                </div>
                <div class="wpb-input-field">
                    <input type="text" class="wpb-submit-success-message" id="wpb-submit-success-message" name="buildin_theme[submit_success_message]" value="<?php echo esc_attr($buildin_theme['buildin_popup']['submit_success_message']); ?>" placeholder="<?php echo __('Form Successfully sent', 'wp-popup-lite'); ?>"/>
                </div>
            </div>
            <div class="wpb-input-field-wrap">
                <div class="wpb-input-field-title">
                    <label>
                        <h4><?php echo __('Submit Failure Message', 'wp-popup-lite') ?></h4>
                    </label>
                </div>
                <div class="wpb-input-field">
                    <input type="text" class="wpb-submit-failure-message" id="wpb-submit-failure-message" name="buildin_theme[submit_failure_message]" value="<?php echo esc_attr($buildin_theme['buildin_popup']['submit_failure_message']); ?>" placeholder="<?php echo __('Something went wrong. Please try again.', 'wp-popup-lite'); ?>"/>
                </div>
            </div>
            <div class="wpb-input-field-wrap" id="wpb-basic-layout-setting">
                <div class="wpb-input-field-title">
                    <label>
                        <h4><?php echo __('Submit Button Background Color', 'wp-popup-lite') ?></h4>
                    </label>
                </div>
                <div class="wpb-input-field">
                    <input type="text" class="buildin-default-font-color"  id="wpb-popup-submit-button-bg" name="buildin_theme[wpb_submit_button_bg_color]" value="<?php echo esc_attr($buildin_theme['buildin_popup']['wpb_submit_button_bg_color']); ?>" >
                </div>
            </div>
            <div class="wpb-input-field-wrap" id="wpb-basic-layout-setting">
                <div class="wpb-input-field-title">
                    <label>
                        <h4><?php echo __('Submit Button Click Action', 'wp-popup-lite') ?></h4>
                    </label>
                </div>
                <div class="wpb-input-field">
                    <div class="wpb-submit-action-radio-wrap">
                        <input type="radio" id="wpb-click-no-close" name="buildin_theme[submit_click_event]" value="submit-no-close"
                        <?php
                        if ((isset($buildin_theme['buildin_popup']['submit_click_event']) && $buildin_theme['buildin_popup']['submit_click_event'] == 'submit-no-close') || !isset($buildin_theme['buildin_popup']['submit_click_event'])) {
                            echo 'checked="checked"';
                        }
                        ?>/><label for="wpb-click-no-close"><?php echo __('Submit Form and Don\'t Close Popup', 'wp-popup-lite'); ?></label>
                    </div>
                    <div class="wpb-submit-action-radio-wrap">
                        <input type="radio" id="wpb-click-close" name="buildin_theme[submit_click_event]" value="submit-and-close"
                        <?php
                        if (isset($buildin_theme['buildin_popup']['submit_click_event']) && $buildin_theme['buildin_popup']['submit_click_event'] == 'submit-and-close') {
                            echo 'checked="checked"';
                        }
                        ?>/><label for="wpb-click-close"><?php echo __('Submit Form and Close Popup', 'wp-popup-lite'); ?></label>
                    </div>
                    <div class="wpb-submit-action-radio-wrap">
                        <input type="radio" id="wpb-click-ext" name="buildin_theme[submit_click_event]" value="add-link"
                        <?php
                        if (isset($buildin_theme['buildin_popup']['submit_click_event']) && $buildin_theme['buildin_popup']['submit_click_event'] == 'add-link') {
                            echo 'checked="checked"';
                        }
                        ?>/><label for="wpb-click-ext"><?php echo __('Go To External Link', 'wp-popup-lite'); ?></label>
                        <input type="url" name="buildin_theme[submit_click_event_link]" value="<?php echo esc_url($buildin_theme['buildin_popup']['submit_click_event_link']); ?>"/>
                    </div>
                </div>
            </div>
            <div class="wpb-input-field-wrap">
                <div class="wpb-input-field-title">
                    <label>
                        <h4><?php echo __('Submit Button Icon Color', 'wp-popup-lite') ?></h4>
                    </label>
                </div>
                <div class="wpb-input-field">
                    <input type="text" class="buildin-default-font-color" id="wpb-popup-email-icon-font-color" name="buildin_theme[wpb_submit_icon_color]" value="<?php echo esc_attr($buildin_theme['buildin_popup']['wpb_submit_icon_color']); ?>">
                </div>
            </div>
        </div>
    </div>
</div>