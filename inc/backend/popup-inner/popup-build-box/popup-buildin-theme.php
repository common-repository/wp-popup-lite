<?php
defined('ABSPATH') or die("No direct script allowed!!!");

$contact_counter = 1;
$woo_counter = 1;
$coupon_counter = 1;
$verification_counter = 1;
?>

<div class="wpb-default-theme-wrapper">
    <div class="wpb-default-setting-group-wrapper">
        <div class="wpb-default-group-title">
            <h3><?php echo __('Select Builtin Theme', 'wp-popup-lite'); ?></h3>
        </div>
        <div class="wpb-default-theme-wrapper-setting-field-wrapper">
            <div class="wpb-default-theme-field-wrap">
                <div class="wpb-default-theme-input-field">
                    <select name="wpb_opt[wpb_buildin_theme_tpye]" class="wpb-buildin-theme-selector" id="wpb-buildin-theme-selector">
                        <option value="theme-1"><?php _e('Select Popup', 'wp-popup-lite'); ?></option>
                        <optgroup class="wpb-group-popup-label" label="<?php _e('Subscription Popup', 'wp-popup-lite'); ?>">
                            <?php
                            $inc1 = 1;
                            for ($i = 1; $i <= 5; $i++) {
                                ?>
                                <option value="theme-<?php echo $i; ?>" <?php
                                if ((isset($wpb_buildin_theme_tpye) && $wpb_buildin_theme_tpye == 'theme-' . $i)) {
                                    echo 'selected="selected"';
                                }
                                ?>><?php
                                            _e('Subscription Popup #', 'wp-popup-lite');
                                            echo $inc1;
                                            ?></option>
                                <?php
                                $inc1++;
                            }
                            ?>
                        </optgroup>
                        <optgroup class="wpb-group-popup-label" label="<?php _e('Contact Form Popup', 'wp-popup-lite'); ?>">
                            <?php
                            $inc3 = 1;
                            for ($i = 23; $i <= 25; $i++) {
                                ?>
                                <option value="theme-<?php echo $i; ?>" <?php
                                if (isset($wpb_buildin_theme_tpye) && $wpb_buildin_theme_tpye == 'theme-' . $i) {
                                    echo 'selected="selected"';
                                }
                                ?>><?php
                                            _e('Contact Form Popup #', 'wp-popup-lite');
                                            echo $inc3;
                                            ?></option>
                                <?php
                                $inc3++;
                            }
                            ?>
                        </optgroup>
                        <optgroup class="wpb-group-popup-label" label="<?php _e('Woo Cart Popup', 'wp-popup-lite'); ?>">
                            <?php
                            $inc4 = 1;
                            for ($i = 29; $i <= 31; $i++) {
                                ?>
                                <option value="theme-<?php echo $i; ?>" <?php
                                if (isset($wpb_buildin_theme_tpye) && $wpb_buildin_theme_tpye == 'theme-' . $i) {
                                    echo 'selected="selected"';
                                }
                                ?>><?php
                                            _e('Woo Cart Popup #', 'wp-popup-lite');
                                            echo $inc4;
                                            ?></option>
                                <?php
                                $inc4++;
                            }
                            ?>
                        </optgroup>
                        <optgroup class="wpb-group-popup-label" label="<?php _e('Coupon Popup', 'wp-popup-lite'); ?>">
                            <?php
                            $inc5 = 1;
                            for ($i = 36; $i <= 37; $i++) {
                                ?>
                                <option value="theme-<?php echo $i; ?>" <?php
                                if (isset($wpb_buildin_theme_tpye) && $wpb_buildin_theme_tpye == 'theme-' . $i) {
                                    echo 'selected="selected"';
                                }
                                ?>><?php
                                            _e('Coupon Popup #', 'wp-popup-lite');
                                            echo $inc5;
                                            ?></option>
                                <?php
                                $inc5++;
                            }
                            ?>
                        </optgroup>
                    </select>
                </div>
                <div class="wpb-default-theme-preview">
                    <img class="theme-preview" src="<?php echo WPP_IMAGE_DIR . '/theme-preview/theme-1.jpg'; ?>">
                </div>
            </div>
        </div>
    </div>
</div>