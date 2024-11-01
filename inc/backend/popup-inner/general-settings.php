<?php defined('ABSPATH') or die("No script kiddies please!"); ?>

<div class="wpb-general-settings wpb-input-field">
    <div class="wpb-default-setting-group-wrapper">
        <div class="wpb-default-group-title-main">
            <h3><?php echo __('Popup Title', 'wp-popup-lite'); ?></h3>
        </div>
        <div class="wpb-default-setting-field-wrapper">
            <div class="wpb-input-field-wrap">
                <div class="wpb-input-field">
                    <input type="text" placeholder="<?php echo __('Title of Popup', 'wp-popup-lite') ?>" name="wpb_opt[title]" value="<?php echo (isset($edit)) ? $title : ''; ?>">
                </div>
            </div>
        </div>
    </div>
    <div class="wpb-default-setting-group-wrapper">
        <div class="wpb-theme-selector">
            <h3><?php echo __('Select Popup Theme', 'wp-popup-lite'); ?></h3>
        </div>
        <div class="wpb-default-setting-field-wrapper">
            <div class="wpb-input-field-wrap">
                <div class="wpb-input-field">
                    <label class="wpb-theme wpb-active-theme-type">
                        <input type="radio" value="builtin" class="wpb-popup-theme-option" name="wpb_opt[wpb_theme_type]" <?php
                        if (isset($edit) && $wpb_theme_type == 'builtin' || empty($wpb_theme_type)) {
                            echo 'checked="checked"';
                        }
                        ?> />
                               <?php echo __('Use Built In Theme', 'wp-popup-lite') ?>
                    </label>
                    <label class="wpb-theme">
                        <input type="radio" value="custom" class="wpb-popup-theme-option" name="wpb_opt[wpb_theme_type]" <?php
                        if (isset($edit) && $wpb_theme_type == 'custom') {
                            echo 'checked="checked"';
                        }
                        ?>/>                    
                               <?php echo __('Build Custom Popup', 'wp-popup-lite') ?>
                    </label>
                </div>
            </div>
        </div>
    </div>    
    <div class="wpb-popup-theme-selector-section">
        <div class="wpb-builtin-popup-theme-section" style="<?php
        if (isset($edit) && $wpb_theme_type == 'builtin' || empty($wpb_theme_type)) {
            echo 'display:block';
        } else {
            echo 'display:none';
        }
        ?>">
                 <?php include(WPP_ABSPATH . '/inc/backend/popup-inner/popup-build-box/popup-buildin-theme.php'); ?>
        </div>
        <div class="wpb-custom-popup-field-section" style="<?php
        if (isset($edit) && $wpb_theme_type == 'custom') {
            echo 'display:block';
        } else {
            echo 'display:none';
        }
        ?>">
                 <?php include(WPP_ABSPATH . '/inc/backend/popup-inner/popup-build-box/popup-build-field.php'); ?>
        </div>
    </div>
    <div class="wpb-default-settings wpb-input-field">
        <h2 class="nav-tab-wrapper">                             
            <a href="javascript:void(0)" id="wpb-default-theme-setting" class="wpb-general-tab-trigger nav-tab nav-tab-active" <?php
            if (isset($edit) && $wpb_theme_type == 'builtin' || !isset($wpb_theme_type)) {
                echo 'style="display:block"';
            } else {
                echo 'style="display:none"';
            }
            ?>><?php _e('Default Theme Setting', 'wp-popup-lite'); ?></a>
            <a href="javascript:void(0)" id="wpb-basic-layout-setting" class="wpb-general-tab-trigger nav-tab <?php
            if (isset($edit) && $wpb_theme_type == 'custom') {
                echo 'nav-tab-active';
            }
            ?>"><?php _e('Basic Layout Setting', 'wp-popup-lite'); ?></a>
            <a href="javascript:void(0)" id="wpb-border-setting" class="wpb-general-tab-trigger nav-tab"><?php _e('Border Setting', 'wp-popup-lite'); ?></a>
            <a href="javascript:void(0)" id="wpb-miscellaneous-setting" class="wpb-general-tab-trigger nav-tab"><?php _e('Miscellaneous Setting', 'wp-popup-lite'); ?></a>
            <a href="javascript:void(0)" id="wpb-animation-setting" class="wpb-general-tab-trigger nav-tab"><?php _e('Animation Setting', 'wp-popup-lite'); ?></a>
            <a href="javascript:void(0)" id="wpb-overlay-setting" class="wpb-general-tab-trigger nav-tab"><?php _e('Ovelay Setting', 'wp-popup-lite'); ?></a>
            <a href="javascript:void(0)" id="wpb-form-procedure-setting" class="wpb-general-tab-trigger nav-tab"><?php _e('Form Setting', 'wp-popup-lite'); ?></a>
            <a href="javascript:void(0)" id="wpb-email-setting" class="wpb-general-tab-trigger nav-tab"><?php _e('Email setting', 'wp-popup-lite'); ?></a>
        </h2>
        <div class="wpb-default-theme-field-settings  wpb-general-tab-contents" id="tab-wpb-default-theme-setting" <?php
        if (isset($edit) && $wpb_theme_type == 'builtin' || !isset($wpb_theme_type)) {
            echo 'style="display:block"';
        } else {
            echo 'style="display:none"';
        }
        ?>>
        </div>
        <div class="wpb-default-setting-group-wrapper wpb-general-tab-contents" id="tab-wpb-basic-layout-setting" <?php
        if (isset($edit) && $wpb_theme_type == 'custom') {
            echo 'style="display:block"';
        } else {
            echo 'style="display:none"';
        }
        ?>>
            <div class="wpb-default-group-title">
                <h3><?php echo __('Basic Layout Setting', 'wp-popup-lite'); ?></h3>
            </div>
            <div class="wpb-default-setting-field-wrapper" id='wpb-basic-layout-setting'>
                <div class="wpb-input-field-wrap wpb-basic-layout-setting-size" id="wpb-basic-layout-setting" <?php
                if (isset($edit) && $wpb_theme_type == 'builtin' || !isset($wpb_theme_type)) {
                    echo 'style="display:none"';
                } else {
                    echo 'style="display:block"';
                }
                ?>>
                    <div class="wpb-input-field-title">
                        <label>
                            <h4><?php echo __('Size', 'wp-popup-lite') ?></h4>
                        </label>
                    </div>
                    <div class="wpb-input-field">
                        <input type="number" id="wpb-popup-size-width" name="wpb_opt[wpb_width]" value="<?php echo (isset($edit) && !empty($wpb_width)) ? $wpb_width : '500'; ?>"><?php echo __('&nbsp;X&nbsp;', 'wp-popup-lite'); ?>
                        <input type="number" id="wpb-popup-size-height" name="wpb_opt[wpb_height]" value="<?php echo (isset($edit) && !empty($wpb_height)) ? $wpb_height : '500'; ?>">
                    </div>
                </div>
                <div class="wpb-input-field-wrap wpb-general-field-background-color" id="wpb-popup-background-field" <?php
                if (isset($edit) && $wpb_theme_type == 'builtin' || !isset($wpb_theme_type)) {
                    echo 'style="display:none"';
                } else {
                    echo 'style="display:block"';
                }
                ?>>
                    <div class="wpb-input-field-title">
                        <label>
                            <h4><?php echo __('Background Color', 'wp-popup-lite'); ?></h4>
                        </label>
                    </div>
                    <div class="wpb-input-field">
                        <input type="text" id="wpb_mpopup_color" name="wpb_opt[wpb_mpopup_color]" value="<?php echo (isset($edit) && !empty($wpb_mpopup_color)) ? $wpb_mpopup_color : ''; ?>">
                    </div>
                </div>
                <div class="wpb-input-field-wrap wpb-general-field-background" id="wpb-hidden-overlay-color-field" <?php
                if (isset($edit) && $wpb_theme_type == 'builtin' || !isset($wpb_theme_type)) {
                    echo 'style="display:none"';
                } else {
                    echo 'style="display:block"';
                }
                ?>>
                    <div class="wpb-input-field-title">
                        <label>
                            <h4><?php echo __('Background Image', 'wp-popup-lite'); ?></h4>
                        </label>
                    </div>
                    <div class="wpb-input-field">
                        <input id="wpb-upload-mpopup-bg-image" type="text" name="wpb_opt[wpb_mpopup_image]" value="<?php echo (isset($edit)) && !empty($wpb_mpopup_image) ? $wpb_mpopup_image : ''; ?>" />
                        <input class="wpb-upload-mpopup-bg-image-button button button-primary" type="button" value="Upload Background Image" />
                    </div>
                </div>
                <div class="wpb-input-field-wrap" id="wpb-popup-shape">
                    <div class="wpb-input-field-title">
                        <label>
                            <h4><?php echo __('Shape', 'wp-popup-lite') ?></h4>
                        </label>
                    </div>
                    <div class="wpb-input-field">
                        <select class="wpb-popup-shape" name="wpb_opt[wpb_popup_shape]">
                            <option value="sharp_corner" <?php
                            if (isset($edit) && $wpb_popup_shape == 'sharp_corner') {
                                echo 'selected="selected"';
                            }
                            ?>>
                                <?php echo __('Sharp Corner', 'wp-popup-lite') ?></option> 
                            <option value="rounded_corner" <?php
                            if (isset($edit) && $wpb_popup_shape == 'rounded_corner') {
                                echo 'selected="selected"';
                            }
                            ?>>
                                <?php echo __('Rounded Corner', 'wp-popup-lite') ?></option>
                        </select> 
                    </div>
                </div>
            </div>
        </div>
        <div class="wpb-default-settings wpb-input-field" >
            <div class="wpb-default-setting-group-wrapper wpb-general-tab-contents" id="tab-wpb-border-setting" style="display:none">
                <div class="wpb-default-group-title">
                    <h3><?php echo __('Border Setting', 'wp-popup-lite'); ?></h3>
                </div>
                <div class="wpb-default-setting-field-wrapper" id='wpb-basic-layout-setting'>
                    <div class="wpb-input-field-wrap" id="wpb-popup-border">
                        <div class="wpb-input-field-title">
                            <label>
                                <h4><?php echo __('Border', 'wp-popup-lite'); ?></h4>
                            </label>
                        </div>
                        <div class="wpb-input-field">
                            <select class="wpb-popup-border" name="wpb_opt[wpb_popup_border]">
                                <option value="no" <?php
                                if (isset($edit) && $wpb_popup_border == 'no') {
                                    echo 'selected="selected"';
                                }
                                ?>>
                                    <?php echo __('No', 'wp-popup-lite') ?></option>
                                <option value="yes" <?php
                                if (isset($edit) && $wpb_popup_border == 'yes') {
                                    echo 'selected="selected"';
                                }
                                ?>>
                                    <?php echo __('Yes', 'wp-popup-lite') ?></option>
                            </select> 
                        </div>
                    </div>
                    <div class="wpb-input-hidden-field" id="wpb-hidden-input-border">
                        <div class="wpb-input-field-wrap" id="wpb-hidden-input-border">
                            <div class="wpb-input-field-title">
                                <label>
                                    <h4><?php echo __('Border Type', 'wp-popup-lite'); ?></h4>
                                </label>
                            </div>
                            <div class="wpb-input-field">
                                <select class="wpb-popup-border-type" name="wpb_opt[wpb_border_type]">
                                    <option value="" <?php
                                    if (isset($edit) && $wpb_border_type == 'none') {
                                        echo 'selected="selected"';
                                    }
                                    ?>>
                                        <?php echo __('None', 'wp-popup-lite') ?></option>
                                    <option value="solid" <?php
                                    if (isset($edit) && $wpb_border_type == 'solid') {
                                        echo 'selected="selected"';
                                    }
                                    ?>>
                                        <?php echo __('Solid', 'wp-popup-lite') ?></option>
                                    <option value="dotted" <?php
                                    if (isset($edit) && $wpb_border_type == 'dotted') {
                                        echo 'selected="selected"';
                                    }
                                    ?>>
                                        <?php echo __('Dotted', 'wp-popup-lite') ?></option>
                                    <option value="dashed" <?php
                                    if (isset($edit) && $wpb_border_type == 'dashed') {
                                        echo 'selected="selected"';
                                    }
                                    ?>>
                                        <?php echo __('Dashed', 'wp-popup-lite') ?></option>
                                    <option value="double" <?php
                                    if (isset($edit) && $wpb_border_type == 'double') {
                                        echo 'selected="selected"';
                                    }
                                    ?>>
                                        <?php echo __('Double', 'wp-popup-lite') ?></option>
                                    <option value="groove" <?php
                                    if (isset($edit) && $wpb_border_type == 'groove') {
                                        echo 'selected="selected"';
                                    }
                                    ?>>
                                        <?php echo __('Groove', 'wp-popup-lite') ?></option>
                                    <option value="ridge" <?php
                                    if (isset($edit) && $wpb_border_type == 'ridge') {
                                        echo 'selected="selected"';
                                    }
                                    ?>>
                                        <?php echo __('Ridge', 'wp-popup-lite') ?></option>
                                    <option value="inset" <?php
                                    if (isset($edit) && $wpb_border_type == 'inset') {
                                        echo 'selected="selected"';
                                    }
                                    ?>>
                                        <?php echo __('Inset', 'wp-popup-lite') ?></option>
                                </select> 
                            </div>
                        </div>
                        <div class="wpb-input-field-wrap" id="wpb-hidden-input-border">
                            <div class="wpb-input-field-title">
                                <label>
                                    <h4><?php echo __('Border Size', 'wp-popup-lite'); ?></h4>
                                </label>
                            </div>
                            <div class="wpb-input-field">
                                <input type="number" id="wpb-popup-border-size" name="wpb_opt[wpb_border_size]" value="<?php echo (isset($edit) && !empty($wpb_border_size)) ? $wpb_border_size : ''; ?>"/>
                            </div>
                        </div>

                        <div class="wpb-input-field-wrap" id="wpb-hidden-input-border-color">
                            <div class="wpb-input-field-title">
                                <label>
                                    <h4><?php echo __('Border Color', 'wp-popup-lite'); ?></h4>
                                </label>
                            </div>
                            <div class="wpb-input-field">
                                <input type="text" id="wpb-popup-border-color" name="wpb_opt[wpb_border_color]" value="<?php echo (isset($edit) && !empty($wpb_border_color)) ? $wpb_border_color : ''; ?>"/>
                            </div>
                        </div>
                    </div>   
                </div>
            </div>    
            <div class="wpb-default-settings wpb-input-field wpb-general-tab-contents" id="tab-wpb-miscellaneous-setting" style="display:none">
                <div class="wpb-default-setting-group-wrapper">
                    <div class="wpb-default-group-title">
                        <h3><?php echo __('Miscellaneous Setting', 'wp-popup-lite'); ?></h3>
                    </div>    
                    <div class="wpb-default-setting-field-wrapper" id='wpb-basic-layout-setting'>
                        <div class="wpb-input-field-wrap" id="wpb-hidden-input-border-color">
                            <div class="wpb-input-field-title">
                                <label>
                                    <h4><?php echo __('Enable Close Button', 'wp-popup-lite'); ?></h4>
                                </label>
                            </div>
                            <div class="wpb-input-field">
                                <select id="wpb-popup-padding" name="wpb_opt[wpb_close]">
                                    <option value="enable"  <?php
                                    if (isset($edit) && $wpb_close_button_enable == 'enable') {
                                        echo 'selected="selected"';
                                    }
                                    ?>>
                                        <?php _e('Enable', 'wp-popup-lite'); ?></option>
                                    <option value="disable"  <?php
                                    if (isset($edit) && $wpb_close_button_enable == 'disable') {
                                        echo 'selected="selected"';
                                    }
                                    ?>>
                                        <?php _e('Disable', 'wp-popup-lite'); ?></option>
                                </select>
                            </div>
                        </div>
                        <div class="wpb-input-field-wrap" id="wpb-hidden-input-close-option">
                            <div class="wpb-input-field-title">
                                <label>
                                    <h4><?php echo __('Close Button Icon Color', 'wp-popup-lite'); ?></h4>
                                </label>
                            </div>
                            <div class="wpb-input-field">
                                <input type="text" class="wpb-general-color-picker" name="wpb_opt[wpb_close_icon_color]" value="<?php echo (isset($edit) && isset($close_button_color) && !empty($close_button_color)) ? $close_button_color : ''; ?>"/>
                            </div>
                        </div>
                        <div class="wpb-input-field-wrap" id="wpb-hidden-input-close-option">
                            <div class="wpb-input-field-title">
                                <label>
                                    <h4><?php echo __('Close Button background Color', 'wp-popup-lite'); ?></h4>
                                </label>
                            </div>
                            <div class="wpb-input-field">
                                <input type="text" class="wpb-general-close-bg-color-picker" name="wpb_opt[wpb_close_icon_bg_color]" value="<?php echo (isset($edit) && isset($close_button_bg) && !empty($close_button_bg)) ? $close_button_bg : ''; ?>"/>
                            </div>
                        </div>
                        <div class="wpb-input-field-wrap">
                            <div class="wpb-input-field-title">
                                <label>
                                    <h4><?php echo __('Enable Auto close', 'wp-popup-lite'); ?></h4>
                                </label>
                            </div>
                            <div class="wpb-input-field">
                                <label class="wpb-switch">
                                    <input type="checkbox" id="wpb_autoclose_enable" name="wpb_opt[autoclose_enable]" <?php if (isset($edit) && $wpb_autoclose_enable == 'on') { ?> checked <?php } ?> >
                                    <div class="wpb-slider round"></div>
                                </label>
                                <p class="description" ><?php echo __('Enable or disable popup autoclose. The popup will automatically close after some period of time if user does not close.', 'wp-popup-lite') ?></p>
                            </div>
                        </div>
                        <div class="wpb-enable-autoclose" <?php if ((isset($edit) && $wpb_autoclose_enable != 'on') || !(isset($edit))) { ?> style="display:none;" <?php } ?>>
                            <div class="wpb-input-field-wrap">
                                <div class="wpb-input-field-title">
                                    <label>
                                        <h4><?php echo __('Close Countdown Time', 'wp-popup-lite'); ?></h4>
                                    </label>
                                </div>
                                <div class="wpb-input-field">
                                    <input type="number" id="popup_close_countdown" name="wpb_opt[popup_close_countdown]" min="10" value="<?php echo (isset($edit)) ? $wpb_close_countdown_time : ''; ?>"  onchange="handleChange(this);" /><?php _e('In second', 'wp-popup-lite'); ?>
                                    <p class="description" ><?php echo __('Please enter the autoclose countdown time in seconds. Minimum time required is 10 seconds.', 'wp-popup-lite') ?></p>
                                </div>
                            </div>

                            <div class="wpb-input-field-wrap">
                                <div class="wpb-input-field-title">
                                    <label>
                                        <h4><?php echo __('Show Countdown Message', 'wp-popup-lite'); ?></h4>
                                    </label>
                                </div>
                                <div class="wpb-input-field">
                                    <select id="wpb-countdown-msg" name="wpb_opt[wpb_countdown_msg]">
                                        <option value="no" <?php if (isset($edit) && $wpb_show_countdown_message == 'no') { ?> selected="selected" <?php } ?> ><?php echo __('No', 'wp-popup-lite') ?></option>
                                        <option value="yes" <?php if (isset($edit) && $wpb_show_countdown_message == 'yes') { ?> selected="selected" <?php } ?> ><?php echo __('Yes', 'wp-popup-lite') ?></option>
                                    </select>
                                    <p class="description" ><?php echo __('Show countdown message', 'wp-popup-lite') ?></p>
                                </div>
                            </div>

                            <div class="wpb-input-field-wrap wpb-countdown-message-div" <?php if ((isset($edit) && $wpb_show_countdown_message != 'yes') || !isset($edit)) { ?>style="display:none" <?php } ?>>
                                <div class="wpb-input-field-title">
                                    <label>
                                        <h4><?php echo __('Countdown Message', 'wp-popup-lite'); ?></h4>
                                    </label>
                                </div>
                                <div class="wpb-input-field">
                                    <textarea id="close_countdown_msg" name="wpb_opt[close_countdown_msg]" placeholder="<?php _e('Eg. Popup will automatically close in #timer seconds', 'wp-popup-lite'); ?>">
                                        <?php echo (isset($edit)) ? $wpb_close_countdown_msg : ''; ?>
                                    </textarea>
                                    <p class="description" ><?php echo __('Please use #timer in the message where you want to display the timer.', 'wp-popup-lite') ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="wpb-input-field-wrap">
                            <div class="wpb-input-field-title">
                                <label>
                                    <h4><?php echo __('Disable Window Scrolling', 'wp-popup-lite'); ?></h4>
                                </label>
                            </div>
                            <div class="wpb-input-field">
                                <label class="wpb-switch">
                                    <input type="checkbox" id="wpb_disable_window_scroll" name="wpb_opt[disable_window_scroll]" <?php if (isset($edit) && $disable_window_scroll == 'on') { ?> checked <?php } ?> >
                                    <div class="wpb-slider round"></div>
                                </label>
                                <p class="description" ><?php echo __('If enabled, popup will be fixed on screen and user cannot scroll the page.', 'wp-popup-lite') ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="wpb-default-setting-group-wrapper wpb-general-tab-contents" id="tab-wpb-animation-setting" style="display:none">
                <div class="wpb-default-group-title">
                    <h3><?php echo __('Animation Setting', 'wp-popup-lite'); ?></h3>
                </div>
                <div class="wpb-default-setting-field-wrapper">
                    <div class="wpb-input-field-wrap" id="wpb-popup-animation">
                        <div class="wpb-input-field-title">
                            <label>
                                <h4><?php echo __('Popup Animation', 'wp-popup-lite'); ?></h4>
                            </label>
                        </div>
                        <div class="wpb-input-field">
                            <select class="wpb-popup-animation" id="wpb-popup-animate" name="wpb_opt[wpb_popup_option]">
                                <option value="default" <?php
                                if (isset($edit) && $wpb_popup_animation_option == 'default') {
                                    echo 'selected="selected"';
                                }
                                ?>>
                                    <?php echo __('Default', 'wp-popup-lite'); ?></option>
                                <option value="slideInLeft" <?php
                                if (isset($edit) && $wpb_popup_animation_option == 'slideInLeft') {
                                    echo 'selected="selected"';
                                }
                                ?>>
                                    <?php echo __('Slide In Left', 'wp-popup-lite'); ?></option>
                                <option value="slideInRight" <?php
                                if (isset($edit) && $wpb_popup_animation_option == 'slideInRight') {
                                    echo 'selected="selected"';
                                }
                                ?>>
                                    <?php echo __('Slide In Right', 'wp-popup-lite'); ?></option>
                                <option value="slideInUp" <?php
                                if (isset($edit) && $wpb_popup_animation_option == 'slideInUp') {
                                    echo 'selected="selected"';
                                }
                                ?>>
                                    <?php echo __('Slide In Up', 'wp-popup-lite'); ?></option>
                                <option value="slideInDown" <?php
                                if (isset($edit) && $wpb_popup_animation_option == 'slideInDown') {
                                    echo 'selected="selected"';
                                }
                                ?>>
                                    <?php echo __('slide In Down', 'wp-popup-lite'); ?></option>
                                <option value="bounceIn" <?php
                                if (isset($edit) && $wpb_popup_animation_option == 'bounceIn') {
                                    echo 'selected="selected"';
                                }
                                ?>>
                                    <?php echo __('Bounce In', 'wp-popup-lite'); ?></option>
                                <option value="bounceInUp" <?php
                                if (isset($edit) && $wpb_popup_animation_option == 'bounceInUp') {
                                    echo 'selected="selected"';
                                }
                                ?>>
                                    <?php echo __('Bounce In Up', 'wp-popup-lite'); ?></option>
                                <option value="bounceInDown" <?php
                                if (isset($edit) && $wpb_popup_animation_option == 'bounceInDown') {
                                    echo 'selected="selected"';
                                }
                                ?>>
                                    <?php echo __('Bounce In Down', 'wp-popup-lite'); ?></option>
                                <option value="bounceInLeft" <?php
                                if (isset($edit) && $wpb_popup_animation_option == 'bounceInLeft') {
                                    echo 'selected="selected"';
                                }
                                ?>>
                                    <?php echo __('Bounce In Left', 'wp-popup-lite'); ?></option>
                                <option value="bounceInRight" <?php
                                if (isset($edit) && $wpb_popup_animation_option == 'bounceInRight') {
                                    echo 'selected="selected"';
                                }
                                ?>>
                                    <?php echo __('Bounce In Right', 'wp-popup-lite'); ?></option>
                                <option value="fadeIn" <?php
                                if (isset($edit) && $wpb_popup_animation_option == 'fadeIn') {
                                    echo 'selected="selected"';
                                }
                                ?>>
                                    <?php echo __('Fade In', 'wp-popup-lite'); ?></option>
                                <option value="fadeInUp" <?php
                                if (isset($edit) && $wpb_popup_animation_option == 'fadeInUp') {
                                    echo 'selected="selected"';
                                }
                                ?>>
                                    <?php echo __('Fade Up', 'wp-popup-lite'); ?></option>
                                <option value="fadeInDown" <?php
                                if (isset($edit) && $wpb_popup_animation_option == 'fadeInDown') {
                                    echo 'selected="selected"';
                                }
                                ?>>
                                    <?php echo __('Fade In Down', 'wp-popup-lite'); ?></option>
                                <option value="fadeInLeft" <?php
                                if (isset($edit) && $wpb_popup_animation_option == 'fadeInLeft') {
                                    echo 'selected="selected"';
                                }
                                ?>>
                                    <?php echo __('Fade In Left', 'wp-popup-lite'); ?></option>
                                <option value="fadeInRight" <?php
                                if (isset($edit) && $wpb_popup_animation_option == 'fadeInRight') {
                                    echo 'selected="selected"';
                                }
                                ?>>
                                    <?php echo __('Fade In Right', 'wp-popup-lite'); ?></option>
                                <option value="flipInX" <?php
                                if (isset($edit) && $wpb_popup_animation_option == 'flipInX') {
                                    echo 'selected="selected"';
                                }
                                ?>>
                                    <?php echo __('Flip X', 'wp-popup-lite'); ?></option>
                                <option value="flipInY" <?php
                                if (isset($edit) && $wpb_popup_animation_option == 'flipInY') {
                                    echo 'selected="selected"';
                                }
                                ?>>
                                    <?php echo __('Flip Y', 'wp-popup-lite'); ?></option>
                                <option value="lightSpeedIn" <?php
                                if (isset($edit) && $wpb_popup_animation_option == 'lightSpeedIn') {
                                    echo 'selected="selected"';
                                }
                                ?>>
                                    <?php echo __('Light Speed', 'wp-popup-lite'); ?></option>
                                <option value="rotateIn" <?php
                                if (isset($edit) && $wpb_popup_animation_option == 'rotateIn') {
                                    echo 'selected="selected"';
                                }
                                ?>>
                                    <?php echo __('Rotate In', 'wp-popup-lite'); ?></option>
                                <option value="rotateInDownLeft" <?php
                                if (isset($edit) && $wpb_popup_animation_option == 'rotateInDownLeft') {
                                    echo 'selected="selected"';
                                }
                                ?>>
                                    <?php echo __('Rotate Down Left', 'wp-popup-lite'); ?></option>
                                <option value="rotateInDownRight" <?php
                                if (isset($edit) && $wpb_popup_animation_option == 'rotateInDownRight') {
                                    echo 'selected="selected"';
                                }
                                ?>>
                                    <?php echo __('Rotate Down Right', 'wp-popup-lite'); ?></option>
                                <option value="rotateInUpLeft" <?php
                                if (isset($edit) && $wpb_popup_animation_option == 'rotateInUpLeft') {
                                    echo 'selected="selected"';
                                }
                                ?>>
                                    <?php echo __('Rotate Up Left', 'wp-popup-lite'); ?></option>
                                <option value="rotateInUpRight" <?php
                                if (isset($edit) && $wpb_popup_animation_option == 'rotateInUpRight') {
                                    echo 'selected="selected"';
                                }
                                ?>>
                                    <?php echo __('Rotate Up Right', 'wp-popup-lite'); ?></option>
                                <option value="rollIn" <?php
                                if (isset($edit) && $wpb_popup_animation_option == 'rollIn') {
                                    echo 'selected="selected"';
                                }
                                ?>>
                                    <?php echo __('Roll', 'wp-popup-lite'); ?></option>
                                <option value="zoomIn" <?php
                                if (isset($edit) && $wpb_popup_animation_option == 'zoomIn') {
                                    echo 'selected="selected"';
                                }
                                ?>>
                                    <?php echo __('Zoom', 'wp-popup-lite'); ?></option>
                                <option value="zoomInUp" <?php
                                if (isset($edit) && $wpb_popup_animation_option == 'zoomInUp') {
                                    echo 'selected="selected"';
                                }
                                ?>>
                                    <?php echo __('Zoom Up', 'wp-popup-lite'); ?></option>
                                <option value="zoomInDown" <?php
                                if (isset($edit) && $wpb_popup_animation_option == 'zoomInDown') {
                                    echo 'selected="selected"';
                                }
                                ?>>
                                    <?php echo __('Zoom Down', 'wp-popup-lite'); ?></option>
                                <option value="zoomInLeft" <?php
                                if (isset($edit) && $wpb_popup_animation_option == 'zoomInLeft') {
                                    echo 'selected="selected"';
                                }
                                ?>>
                                    <?php echo __('Zoom In Left', 'wp-popup-lite'); ?></option>
                                <option value="zoomInRight" <?php
                                if (isset($edit) && $wpb_popup_animation_option == 'zoomInRight') {
                                    echo 'selected="selected"';
                                }
                                ?>>
                                    <?php echo __('Zoom In Right', 'wp-popup-lite'); ?></option>
                            </select>
                        </div>
                    </div>
                    <div class="wpb-input-field-wrap" id="wpb-popup-animation-duration">
                        <div class="wpb-input-field-title">
                            <label>
                                <h4><?php echo __('Animation Duration', 'wp-popup-lite'); ?></h4>
                            </label>
                        </div>
                        <div class="wpb-input-field">
                            <input type="number" id="wpb-popup-animation-duration" name="wpb_opt[wpb_popup_animate_duration]" value="<?php echo (isset($edit)) ? $wpb_popup_animate_duration : ''; ?>"><?php echo __('s', 'wp-popup-lite'); ?>
                        </div>
                    </div>
                    <div class="wpb-input-field-wrap" id="wpb-popup-animation-delay">
                        <div class="wpb-input-field-title">
                            <label>
                                <h4><?php echo __('Animation Delay', 'wp-popup-lite'); ?></h4>
                            </label>
                        </div>
                        <div class="wpb-input-field">
                            <input type="number" id="wpb-popup-animation-delay" name="wpb_opt[wpb_popup_animate_delay]" value="<?php echo (isset($edit)) ? $wpb_popup_animate_delay : ''; ?>"><?php echo __('s', 'wp-popup-lite'); ?>
                        </div>
                    </div>                       
                </div>
            </div>
            <div class="wpb-default-setting-group-wrapper wpb-general-tab-contents" id="tab-wpb-overlay-setting" style="display:none">
                <div class="wpb-default-group-title">
                    <h3><?php echo __('Overlay Setting', 'wp-popup-lite'); ?></h3>
                </div>
                <div class="wpb-default-setting-field-wrapper">
                    <div class="wpb-input-field-wrap" id="wpb-enable-overlay">
                        <div class="wpb-input-field-title">
                            <label>
                                <h4><?php echo __('Enable Overlay', 'wp-popup-lite'); ?></h4>
                            </label>
                        </div>
                        <div class="wpb-input-field">
                            <label class="wpb-switch">
                                <input type="checkbox" id="wpb-enable-overlay" name="wpb_opt[wpb_enable_overlay]" <?php
                                if (isset($edit) && $wpb_enable_overlay == 'on') {
                                    echo 'checked=checked';
                                }
                                ?>/>
                                <div class="wpb-slider round"></div>
                            </label>
                            <p class="description"><?php echo __('Tick on checkbox to enbale overlay', 'wp-popup-lite') ?></p>
                        </div>
                    </div>
                    <div class="wpb-input-field-wrap" id="wpb-hidden-overlay-color-field">
                        <div class="wpb-input-field-title">
                            <label>
                                <h4><?php echo __('Overlay Color', 'wp-popup-lite'); ?></h4>
                            </label>
                        </div>
                        <div class="wpb-input-field">
                            <input type="text" id="wpb_overlay_color" name="wpb_opt[wpb_overlay_color]" value="<?php echo (isset($edit) && !empty($wpb_overlay_color)) ? $wpb_overlay_color : ''; ?>">
                            <p class="description" ><?php echo __('Color of the overlay', 'wp-popup-lite') ?></p>
                        </div>
                    </div>
                    <div class="wpb-input-field-wrap" id="wpb-hidden-overlay-color-field">
                        <div class="wpb-input-field-title">
                            <label>
                                <h4><?php echo __('Upload Image', 'wp-popup-lite'); ?></h4>
                            </label>
                        </div>
                        <div class="wpb-input-field">
                            <input id="wpb-upload-overlay-image" type="text" name="wpb_opt[wpb_upload_overlay_image]" value="<?php echo (isset($edit)) ? $wpb_upload_overlay_image : ''; ?>" />
                            <input class="wpb-upload-overlay-image-button button button-primary" type="button" value="Upload Overlay Image" />
                            <p class="description" ><?php echo __('Directly upload the image or give the external image link on the input field. eg: https://upload.wikimedia.org/wikipedia/commons/3/36/Hopetoun_falls.jpg', 'wp-popup-lite') ?></p>
                        </div>
                    </div>
                    <div class="wpb-additional-overlay-image-setting">
                        <div class="wpb-input-field-title">
                            <label>
                                <h4><?php echo __('Background Repeat', 'wp-popup-lite') ?></h4>
                            </label>
                        </div>
                        <div class="wpb-input-field">
                            <select class="wpb-overlay-repeat" name="wpb_opt[wpb_overlay_img_txt_repeat]">
                                <option value="no-repeat" <?php
                                if (isset($edit) && $wpb_overlay_img_txt_repeat == 'no-repeat') {
                                    echo 'selected="selected"';
                                }
                                ?>>
                                    <?php echo __('No Repeat', 'wp-popup-lite') ?></option>
                                <option value="repeat-x" <?php
                                if (isset($edit) && $wpb_overlay_img_txt_repeat == 'repeat-x') {
                                    echo 'selected="selected"';
                                }
                                ?>>
                                    <?php echo __('Repeat X', 'wp-popup-lite') ?></option>
                                <option value="repeat-y" <?php
                                if (isset($edit) && $wpb_overlay_img_txt_repeat == 'repeat-y') {
                                    echo 'selected="selected"';
                                }
                                ?>>
                                    <?php echo __('Repeat Y', 'wp-popup-lite') ?></option>
                                <option value="repeat" <?php
                                if (isset($edit) && $wpb_overlay_img_txt_repeat == 'repeat') {
                                    echo 'selected="selected"';
                                }
                                ?>>
                                    <?php echo __('Repeat', 'wp-popup-lite') ?></option>
                            </select>
                        </div>
                    </div>
                    <div class="wpb-input-field-wrap">
                        <div class="wpb-input-field-title">
                            <label>
                                <h4><?php echo __('Overlay Opacity', 'wp-popup-lite') ?></h4>
                            </label>
                        </div>
                        <div class="wpb-input-field">
                            <select id="wpb-overlay-opacity" name="wpb_opt[overlay_type]">
                                <option value="0.3" <?php if (isset($edit) && $overlay_type == '0.3') { ?> selected="selected" <?php } ?>>
                                    <?php echo __('Light Overlay', 'wp-popup-lite') ?></option>
                                <option value="0.8" <?php if (isset($edit) && $overlay_type == '0.8') { ?> selected="selected" <?php } ?>>
                                    <?php echo __('Dark Overlay', 'wp-popup-lite') ?></option>
                                <option value="0" <?php if (isset($edit) && $overlay_type == '0') { ?> selected="selected" <?php } ?>>
                                    <?php echo __('No Overlay', 'wp-popup-lite') ?></option>
                            </select>
                        </div>
                    </div>
                    <div class="wpb-input-field-wrap">
                        <div class="wpb-input-field-title">
                            <label>
                                <h4><?php echo __('Add Overlay On Click Action', 'wp-popup-lite') ?></h4>
                            </label>
                        </div>
                        <div class="wpb-input-field">
                            <select id="wpb-overlay-link" name="wpb_opt[wpb_overlay_link_click]">
                                <option value="close-popup" <?php if (isset($edit) && $wpb_overlay_link_click == 'close-popup') { ?> selected="selected" <?php } ?>>
                                    <?php echo __('Close Popup ', 'wp-popup-lite') ?></option>
                                <option value="add-link" <?php if (isset($edit) && $wpb_overlay_link_click == 'add-link') { ?> selected="selected" <?php } ?>>
                                    <?php echo __('Add Link', 'wp-popup-lite') ?></option>
                                <option value="none" <?php if (isset($edit) && $wpb_overlay_link_click == 'none') { ?> selected="selected" <?php } ?>>
                                    <?php echo __('Do Nothing', 'wp-popup-lite') ?></option>
                            </select>
                        </div>
                    </div>
                    <div class="wpb-input-field-wrap">
                        <div class="wpb-input-field-title">
                            <label>
                                <h4><?php echo __('Overlay Link', 'wp-popup-lite'); ?></h4>
                            </label>
                        </div>
                        <div class="wpb-input-field">
                            <input type="text" name="wpb_opt[wpb_popup_overlay_link]" value="<?php echo (isset($edit)) ? $wpb_popup_overlay_link : ''; ?>" class="wpb-popup-overlay-link"/>
                        </div>
                    </div>          
                </div>
            </div>
            <div class="wpb-default-setting-group-wrapper wpb-general-tab-contents" id="tab-wpb-form-procedure-setting" style="display:none">
                <div class="wpb-default-group-title">
                    <h3><?php echo __('Form Submission Procedure', 'wp-popup-lite'); ?></h3>
                </div>
                <div class="wpb-default-setting-field-wrapper">
                    <div class="wpb-input-field-wrap">
                        <div class="wpb-input-field-title">
                            <label>
                                <h4><?php _e('Submit Form as', 'wp-popup-lite'); ?></h4>
                            </label>
                        </div>
                        <div class="wpb-input-field">
                            <select name="wpb_opt[wpb_form_type]" id="wpb-admin-form-submission-type">
                                <option value="default" ><?php _e('Select Form Submission Method', 'wp-popup-lite') ?></option>
                                <option value="inbuild-form" <?php
                                if (isset($edit) && $wpb_form_submission_type == 'inbuild-form') {
                                    echo 'selected="selected"';
                                }
                                ?>><?php _e('Inbuilt Form', 'wp-popup-lite') ?></option>
                                <option value="external-subscription" <?php
                                if (isset($edit) && $wpb_form_submission_type == 'external-subscription') {
                                    echo 'selected="selected"';
                                }
                                ?>><?php _e('External Party Subscription', 'wp-popup-lite') ?></option>
                            </select>                                       
                        </div>
                    </div>         
                </div>
                <div class="wpb-default-setting-field-wrapper" id="wpb-form-submission-type-external-fields" <?php
                if (isset($edit) && $wpb_form_submission_type == 'external-subscription') {
                    echo 'style="display:block"';
                } else {
                    echo 'style="display:none"';
                }
                ?>>
                    <div class="wpb-input-field-wrap">
                        <div class="wpb-input-field-title">
                            <label>
                                <h4><?php _e('Mailchimp Subscription List', 'wp-popup-lite'); ?></h4>
                            </label>
                        </div>       
                        <div class="wpb-input-field">
                            <?php
                            $connected = ( $this->wpp_mc_get_api()->is_connected() );
                            if ($connected) {
                                $wpb_mailchimp_lists = ($this->mailchimp->get_lists());
                                foreach ($wpb_mailchimp_lists as $list) {
                                    if (!empty($list)) {
                                        if (isset($parameteres['wpb_ext_sett']['wpb_mc_lists'])) {
                                            $mailchimp_lists = $parameteres['wpb_ext_sett']['wpb_mc_lists']; //[esc_attr($list->id)];
                                            if (in_array($list->id, $mailchimp_lists)) {
                                                $check = "checked='checked'";
                                            } else {
                                                $check = '';
                                            }
                                        } else {
                                            $check = '';
                                        }
                                    }
                                    ?>
                                    <label for="list-<?php echo esc_attr($list->id); ?>">
                                        <input type="checkbox" id="list-<?php echo esc_attr($list->id); ?>" name="wpb_ext_sett[wpb_mc_lists][<?php echo esc_attr($list->id); ?>]" 
                                               value="<?php echo esc_attr($list->id); ?>" <?php echo $check; ?> />
                                        <?php echo esc_html($list->name); ?></label>    
                                    <?php
                                }
                            }
                            ?>
                        </div>
                    </div> 
                </div>
            </div>
            <div class="wpb-default-setting-group-wrapper wpb-general-tab-contents" id="tab-wpb-email-setting" style="display:none">
                <div class="wpb-default-group-title">
                    <h3><?php echo __('Email Setting', 'wp-popup-lite'); ?></h3>
                </div>
                <div class="wpb-default-setting-field-wrapper">
                    <div class="wpb-input-field-wrap">
                        <div class="wpb-input-field-title">
                            <label>
                                <h4><?php _e('Reciever Email:', 'wp-popup-lite'); ?></h4>
                            </label>
                        </div>       
                        <div class="wpb-input-field">
                            <select name="wpb_opt[wpb_select_default_email]" id="wpb-admin-email" class="wpb-admin-email">
                                <option value="default" <?php if (isset($edit) && $wpb_select_default_email == 'default') { ?> selected="selected" <?php } ?>><?php _e('Use Default', 'wp-popup-lite') ?></option>
                                <option value="custom-email" <?php if (isset($edit) && $wpb_select_default_email == 'custom-email') { ?> selected="selected" <?php } ?>><?php _e('Use Custom Email', 'wp-popup-lite') ?></option>
                            </select>                                       
                        </div>
                    </div>         
                    <div class="wpb-input-field-wrap">
                        <div class="wpb-input-field-title">
                            <label>
                                <h4><?php _e('Reciever Custom Email:', 'wp-popup-lite'); ?></h4>
                            </label>
                        </div>                
                        <div class="wpb-input-field">
                            <input type="email" name="wpb_opt[wpb_custom_admin_email]" id="wpb-custom-admin-email" class="wpb-custom-admin-email" value="<?php echo (isset($edit)) ? $wpb_custom_admin_email : ''; ?>"/>                                       
                            <p class="description" ><?php echo __('Mail and admin notification mail will be send to this email address instead of default from setting page.', 'wp-popup-lite') ?></p>
                        </div>
                    </div>
                    <div class="wpb-input-field-wrap">
                        <div class="wpb-input-field-title">
                            <label>
                                <h4><?php _e('Send Admin mail when Contact form submitted', 'wp-popup-lite'); ?></h4>
                            </label>
                        </div>       
                        <div class="wpb-input-field">
                            <label class="wpb-switch">
                                <input type="checkbox" id="wpb-email-confirmation" name="wpb_opt[wpb_admin_alert_en]" <?php
                                if (isset($edit) && isset($parameteres['popup_parameters']['wpb_admin_alert_en']) && $parameteres['popup_parameters']['wpb_admin_alert_en'] == 'on') {
                                    echo 'checked=checked';
                                }
                                ?>/>
                                <div class="wpb-slider round"></div>
                            </label>
                            <p class="description"><?php echo __('If checked, then admin will be informed when someone form submitted to above email.', 'wp-popup-lite') ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" name="wpb_opt[added_date]" value="<?php
            if (isset($edit)) {
                echo $added_date;
            } else {
                echo date('Y-m-d h:i:s');
            }
            ?>"/>
            <input type="hidden" name="wpb_opt[popup_random_val]" value="<?php echo (isset($edit)) ? $popup_random_number : (rand(10, 10000)); ?>"/>
        </div>
    </div>
</div>                 