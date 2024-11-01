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
                    <input id="wpb-upload-buildin-bg-image" type="text" name="buildin_theme[wpb_builtin_rightbg_color]" value="<?php echo esc_url($buildin_theme['buildin_popup']['wpb_builtin_rightbg_color']); ?>">
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
                        <h4><?php echo __('Left Section Background Image', 'wp-popup-lite') ?></h4>
                    </label>
                </div>
                <div class="wpb-input-field">
                    <input id="wpb-upload-buildin-bg-image" type="text" name="buildin_theme[wpb_builtin_leftbg_image]" value="<?php echo esc_url($buildin_theme['buildin_popup']['wpb_builtin_leftbg_image']); ?>">
                    <input class="wpb-upload-buildin-bg-image-button button button-primary" type="button" value="<?php _e('Upload Background Image', 'wp-popup-lite'); ?>">
                </div>
            </div>
            <div class="wpb-input-field-wrap" id="wpb-basic-layout-setting">
                <div class="wpb-input-field-title">
                    <label>
                        <h4><?php echo __('Left Section Background Color', 'wp-popup-lite') ?></h4>
                    </label>
                </div>
                <div class="wpb-input-field">
                    <input class="buildin-default-font-color" id="wpb-upload-builtin-bg-image" type="text" name="buildin_theme[wpb_builtin_leftbg_color]" value="<?php echo isset($buildin_theme['buildin_popup']['wpb_builtin_leftbg_color'])&& !empty($buildin_theme['buildin_popup']['wpb_builtin_leftbg_color'])?esc_attr($buildin_theme['buildin_popup']['wpb_builtin_leftbg_color']):''; ?>">
                </div>
            </div>
            <div class="wpb-input-field-wrap" id="wpb-basic-layout-setting">
                <div class="wpb-input-field-title">
                    <label>
                        <h4><?php echo __('Product Image', 'wp-popup-lite') ?></h4>
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
                        <h4><?php echo __('Product Image Position Top/Bottom', 'wp-popup-lite') ?></h4>
                    </label>
                </div>
                <div class="wpb-input-field">
                    <input id="wpb-upload-buildin-bg-image-top" type="number" name="buildin_theme[wpb_builtin_main_image_top]" value="<?php echo esc_attr($buildin_theme['buildin_popup']['wpb_builtin_main_image_top']); ?>"><?php echo __('px', 'wp-popup-lite') ?><p class="description"><?php echo __('Default: 0px','wp-popup-lite');?></p>
                </div>
                
            </div>
            <div class="wpb-input-field-wrap" id="wpb-basic-layout-setting">
                <div class="wpb-input-field-title">
                    <label>
                        <h4><?php echo __('Product Image Position Right/Left', 'wp-popup-lite') ?></h4>
                    </label>
                </div>
                <div class="wpb-input-field">
                    <input id="wpb-upload-buildin-bg-image-Left" type="number" name="buildin_theme[wpb_builtin_main_image_left]" value="<?php echo esc_attr($buildin_theme['buildin_popup']['wpb_builtin_main_image_left']); ?>"><?php echo __('px', 'wp-popup-lite') ?><p class="description"><?php echo __('Default: 35px','wp-popup-lite');?></p>
                </div>
            </div>
            <div class="wpb-input-field-wrap" id="wpb-basic-layout-setting">
                <div class="wpb-input-field-title">
                    <label>
                        <h4><?php echo __('Header Text', 'wp-popup-lite') ?></h4>
                    </label>
                </div>
                <div class="wpb-input-field">
                    <input type="text" id="wpb-header-text" name="buildin_theme[wpb_header_text]" value="<?php echo esc_attr($buildin_theme['buildin_popup']['wpb_header_text']); ?>" placeholder="<?php echo __('Winter Collection', 'wp-popup-lite'); ?>">
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
                        <input type="text" id="wpb-popup-header-font-size" name="buildin_theme[wpb_header_text_font_size]" value="<?php echo esc_attr($buildin_theme['buildin_popup']['wpb_header_text_font_size']); ?>" ><?php _e('px','wp-popup-lite');?>
                    </div>
                    <div class="wpb-input-field">
                        <input type="text" class="buildin-default-font-color" id="wpb-popup-header-font-color" name="buildin_theme[wpb_header_text_font_color]" value="<?php echo esc_attr($buildin_theme['buildin_popup']['wpb_header_text_font_color']); ?>">
                    </div>
                </div>
            </div>
            <div class="wpb-input-field-wrap" id="wpb-popup-position">
                <div class="wpb-input-field-title">
                    <label>
                        <h4><?php echo __('Sub Header Text', 'wp-popup-lite') ?></h4>
                    </label>
                </div>
                <div class="wpb-input-field">
                    <input type="text" id="wpb-popup-sub-header-text" name="buildin_theme[wpb_subheader_text]" value="<?php echo esc_attr($buildin_theme['buildin_popup']['wpb_subheader_text']); ?>" placeholder="<?php echo __('Get your own brand...', 'wp-popup-lite'); ?>">
                </div>
            </div>
            <div class="wpb-input-field-wrap" id="wpb-basic-layout-setting">
                <div class="wpb-input-field-title">
                    <label>
                        <h4><?php echo __('Sub Header Typography', 'wp-popup-lite') ?></h4>
                    </label>
                </div>
                <div class="wpb-input-field-inner">
                    <div class="wpb-input-field">
                        <select name="buildin_theme[wpb_subheader_typography]" id="wpb-inner-element-font-family">
                            <option value="default"><?php _e('Default', 'wp-popup-lite'); ?></option>
                            <?php foreach (get_option('wpb_typo_fonts') as $wpb_font) { ?>
                                <option value="<?php echo $wpb_font; ?>" <?php
                                if (isset($buildin_theme['buildin_popup']['wpb_subheader_typography']) && $buildin_theme['buildin_popup']['wpb_subheader_typography'] == $wpb_font) {
                                    echo 'selected="selected"';
                                }
                                ?>><?php echo $wpb_font; ?></option>
                                    <?php } ?>
                        </select>
                    </div>
                    <div class="wpb-input-field">
                        <input type="text" id="wpb-popup-header-font-size" name="buildin_theme[wpb_subheader_text_font_size]" value="<?php echo esc_attr($buildin_theme['buildin_popup']['wpb_subheader_text_font_size']); ?>" ><?php _e('px','wp-popup-lite');?>
                    </div>
                    <div class="wpb-input-field">
                        <input type="text" class="buildin-default-font-color" id="wpb-popup-header-font-color" name="buildin_theme[wpb_subheader_text_font_color]" value="<?php echo esc_attr($buildin_theme['buildin_popup']['wpb_subheader_text_font_color']); ?>">
                    </div>
                </div>
            </div>
            <div class="wpb-input-field-wrap" id="wpb-popup-shape">
                <div class="wpb-input-field-title">
                    <label>
                        <h4><?php echo __('Shop Now Button Text', 'wp-popup-lite') ?></h4>
                    </label>
                </div>
                <div class="wpb-input-field">
                    <input type="text" id="wpb-submit-button-text" name="buildin_theme[wpb_submit_text]" value="<?php echo esc_attr($buildin_theme['buildin_popup']['wpb_submit_text']); ?>" placeholder="<?php echo __('Add to cart', 'wp-popup-lite'); ?>">
                </div>
            </div>
            <div class="wpb-input-field-wrap" id="wpb-basic-layout-setting">
                <div class="wpb-input-field-title">
                    <label>
                        <h4><?php echo __('Shop Now Button Text Typography', 'wp-popup-lite') ?></h4>
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
                        <h4><?php echo __('Shop Now Button Link', 'wp-popup-lite') ?></h4>
                    </label>
                </div>
                <div class="wpb-input-field">
                    <input type="text" id="wpb-popup-header-font-size" name="buildin_theme[wpb_submit_button_link]" value="<?php echo esc_attr($buildin_theme['buildin_popup']['wpb_submit_button_link']); ?>">
                </div>
            </div>
            <div class="wpb-input-field-wrap" id="wpb-basic-layout-setting">
                <div class="wpb-input-field-title">
                    <label>
                        <h4><?php echo __('Shop Now Button Background COlor', 'wp-popup-lite') ?></h4>
                    </label>
                </div>
                <div class="wpb-input-field">
                    <input type="text" class="buildin-default-font-color"  id="wpb-popup-submit-button-bg" name="buildin_theme[wpb_submit_button_bg_color]" value="<?php echo esc_attr($buildin_theme['buildin_popup']['wpb_submit_button_bg_color']); ?>" >
                </div>
            </div>
        </div>
    </div>
</div>