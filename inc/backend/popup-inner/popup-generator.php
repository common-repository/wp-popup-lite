<?php defined('ABSPATH') or die("No script kiddies please!"); ?>

<?php
global $wpdb;
$table_name = $wpdb->prefix . "popup_banners";

if (isset($_GET['wpbid']) && $_GET['wpbid'] != '' && isset($_GET['action']) && $_GET['action'] == 'edit') {
    $wpb_id = intval(sanitize_text_field($_GET['wpbid']));

    $popup_details = $wpdb->get_results("SELECT * FROM $table_name where id=$wpb_id");
    if (!empty($popup_details)) {
        $edit = true;
        $parameteres = array();
        foreach ($popup_details as $key => $value) {
            $buildin_theme = unserialize($value->builtin_details);
            $parameteres = unserialize($value->option_value);
            $custom_generated_popup = maybe_unserialize($value->popup_builder);
            $title = (isset($parameteres['popup_parameters']['title'])) ? $parameteres['popup_parameters']['title'] : '';
            $wpb_theme_type = (isset($parameteres['popup_parameters']['wpb_theme_type'])) ? $parameteres['popup_parameters']['wpb_theme_type'] : '';
            $wpb_buildin_theme_tpye = (isset($parameteres['popup_parameters']['wpb_buildin_theme_tpye'])) ? $parameteres['popup_parameters']['wpb_buildin_theme_tpye'] : 'theme-1';
            $wpb_height = (isset($parameteres['popup_parameters']['wpb_height'])) ? $parameteres['popup_parameters']['wpb_height'] : '';
            $wpb_width = (isset($parameteres['popup_parameters']['wpb_width'])) ? $parameteres['popup_parameters']['wpb_width'] : '';
            $wpb_popup_position = (isset($parameteres['popup_parameters']['wpb_popup_position'])) ? $parameteres['popup_parameters']['wpb_popup_position'] : '';
            $wpb_mpopup_color = (isset($parameteres['popup_parameters']['wpb_mpopup_color'])) ? $parameteres['popup_parameters']['wpb_mpopup_color'] : '';
            $wpb_popup_animation_option = (isset($parameteres['popup_parameters']['wpb_popup_option'])) ? $parameteres['popup_parameters']['wpb_popup_option'] : '';
            $wpb_popup_animate_duration = (isset($parameteres['popup_parameters']['wpb_popup_animate_duration'])) ? $parameteres['popup_parameters']['wpb_popup_animate_duration'] : '';
            $wpb_popup_animate_delay = (isset($parameteres['popup_parameters']['wpb_popup_animate_delay'])) ? $parameteres['popup_parameters']['wpb_popup_animate_delay'] : '';
            $wpb_enable_overlay = (isset($parameteres['popup_parameters']['wpb_enable_overlay'])) ? $parameteres['popup_parameters']['wpb_enable_overlay'] : 'off';
            $wpb_overlay_color = (isset($parameteres['popup_parameters']['wpb_overlay_color'])) ? $parameteres['popup_parameters']['wpb_overlay_color'] : '';
            $wpb_upload_overlay_image = (isset($parameteres['popup_parameters']['wpb_upload_overlay_image'])) ? $parameteres['popup_parameters']['wpb_upload_overlay_image'] : '';
            $wpb_overlay_text = (isset($parameteres['popup_parameters']['wpb_overlay_text'])) ? $parameteres['popup_parameters']['wpb_overlay_text'] : ''; //WP Editor 
            $wpb_overlay_img_txt_repeat = (isset($parameteres['popup_parameters']['wpb_overlay_img_txt_repeat'])) ? $parameteres['popup_parameters']['wpb_overlay_img_txt_repeat'] : '';
            $overlay_type = (isset($parameteres['popup_parameters']['overlay_type'])) ? $parameteres['popup_parameters']['overlay_type'] : '';
            $wpb_overlay_link_click = (isset($parameteres['popup_parameters']['wpb_overlay_link_click'])) ? $parameteres['popup_parameters']['wpb_overlay_link_click'] : '';
            $wpb_popup_overlay_link = (isset($parameteres['popup_parameters']['wpb_popup_overlay_link'])) ? $parameteres['popup_parameters']['wpb_popup_overlay_link'] : '';
            $wpb_starting_date = (isset($parameteres['popup_parameters']['wpb_starting_date'])) ? $parameteres['popup_parameters']['wpb_starting_date'] : '';
            $wpb_ending_date = (isset($parameteres['popup_parameters']['wpb_ending_date'])) ? $parameteres['popup_parameters']['wpb_ending_date'] : '';
            $wpb_select_default_email = (isset($parameteres['popup_parameters']['wpb_select_default_email'])) ? $parameteres['popup_parameters']['wpb_select_default_email'] : 'default';
            $wpb_custom_admin_email = (isset($parameteres['popup_parameters']['wpb_custom_admin_email'])) ? $parameteres['popup_parameters']['wpb_custom_admin_email'] : '';
            $wpb_close_button_enable = (isset($parameteres['popup_parameters']['wpb_close'])) ? $parameteres['popup_parameters']['wpb_close'] : '';
            $wpb_autoclose_enable = (isset($parameteres['popup_parameters']['autoclose_enable'])) ? $parameteres['popup_parameters']['autoclose_enable'] : '';
            $wpb_close_countdown_time = (isset($parameteres['popup_parameters']['popup_close_countdown'])) ? $parameteres['popup_parameters']['popup_close_countdown'] : '';
            $wpb_show_countdown_message = (isset($parameteres['popup_parameters']['wpb_countdown_msg'])) ? $parameteres['popup_parameters']['wpb_countdown_msg'] : '';
            $wpb_close_countdown_msg = (isset($parameteres['popup_parameters']['close_countdown_msg'])) ? $parameteres['popup_parameters']['close_countdown_msg'] : '';
            $wpb_popup_shape = (isset($parameteres['popup_parameters']['wpb_popup_shape'])) ? $parameteres['popup_parameters']['wpb_popup_shape'] : '';
            $wpb_popup_border = (isset($parameteres['popup_parameters']['wpb_popup_border'])) ? $parameteres['popup_parameters']['wpb_popup_border'] : '';
            $wpb_border_type = (isset($parameteres['popup_parameters']['wpb_border_type'])) ? $parameteres['popup_parameters']['wpb_border_type'] : '';
            $wpb_border_size = (isset($parameteres['popup_parameters']['wpb_border_size'])) ? $parameteres['popup_parameters']['wpb_border_size'] : '';
            $wpb_border_color = (isset($parameteres['popup_parameters']['wpb_border_color'])) ? $parameteres['popup_parameters']['wpb_border_color'] : '';
            $added_date = (isset($parameteres['popup_parameters']['added_date'])) ? $parameteres['popup_parameters']['added_date'] : '';
            $disable_window_scroll = (isset($parameteres['popup_parameters']['disable_window_scroll'])) ? $parameteres['popup_parameters']['disable_window_scroll'] : 'off';
            $popup_random_number = (isset($parameteres['popup_parameters']['popup_random_val'])) ? $parameteres['popup_parameters']['popup_random_val'] : (rand(10, 10000));
            $wpb_form_submission_type = (isset($parameteres['popup_parameters']['wpb_form_type'])) ? $parameteres['popup_parameters']['wpb_form_type'] : '';
            $close_button_color = (isset($parameteres['popup_parameters']['wpb_close_icon_color'])) ? $parameteres['popup_parameters']['wpb_close_icon_color'] : '';
            $close_button_bg = (isset($parameteres['popup_parameters']['wpb_close_icon_bg_color'])) ? $parameteres['popup_parameters']['wpb_close_icon_bg_color'] : '';
        }
    } else {
        echo "<script>
            window.location.href = 'admin.php?page=wpp&message=7';
            </script>";
    }
} else if (isset($_GET['wpbid']) && $_GET['wpbid'] == '') {
    echo "<script>
        window.location.href = 'admin.php?page=wpp';
        </script>";
}
?>
<div class="wrap clearfix">
    <div class="wpb-add-set-wrapper clearfix">
        <div class="wpb-panel">
            <div class="wpb-manage-header">               
                <div class="wpb-boards-wrapper">
                    <?php if (isset($_GET['page']) && $_GET['page'] == 'wpp-new-popup') { ?>
                        <div class="wpb-banner clearfix">
                            <?php include(WPP_ABSPATH . 'inc/backend/tabs/header.php'); ?>
                        </div>
                    <?php } ?>
                    <div class="wbp-tab-title">
                        <h3><?php echo ( isset($_GET['page']) && $_GET['page'] == 'wpp-new-popup' ) ? __('Add New Popup Banner', 'wp-popup-lite') : __('Edit Popup Banner', 'wp-popup-lite'); ?></h3>
                    </div>
                    <div class="wpb-general-options postbox">    
                        <form action="<?php echo admin_url() . 'admin-post.php' ?>" method='post' id="wpb_form" novalidate>
                            <input type="hidden" name="action" value="wpb_save_options" />
                            <?php
                            wp_nonce_field('wpb_nonce_save_settings', 'wpb_add_nonce_save_settings');
                            include(WPP_ABSPATH . '/inc/backend/popup-inner/general-settings.php');
                            ?>
                            <div class="clearfix"></div>
                            <input type="hidden" value="<?php echo isset($wpb_id) && !empty($wpb_id) ? $wpb_id : ''; ?>" name="wpb_id"/>
                            <div class="wpb-popup-submit-wrap">
                                <ul class="wpb-submit-ind-sec">
                                    <li>
                                        <span class="wpb-action-button-icon"><i class="fa fa-floppy-o" aria-hidden="true"></i></span>
                                        <input class="button-primary wpb-save-button" type="submit" name="wpb_save_settings" value="<?php _e('Save', 'wp-popup-lite'); ?>" />
                                    </li>
                                    <?php if (isset($_GET['wpbid'])) { ?>
                                        <li>
                                            <span class="wpb-action-button-icon" id="wpb-preview-icon"><i class="fa fa-eye" aria-hidden="true"></i></span>
                                            <a href="<?php echo site_url('?wpb_preview=true&banner_id=' . intval(sanitize_text_field($_GET['wpbid']))); ?>" target="_blank">
                                                <input class="button-primary" type="button" value="<?php esc_attr_e('Preview'); ?>" />
                                            </a>
                                            <p class="description"><?php _e('Please save banner before preview', 'wp-popup-lite'); ?></p>
                                        </li>
                                    <?php } ?>
                                    <li>
                                        <span class="wpb-action-button-icon wpb-to-back-icon"><i class="fa fa-times" aria-hidden="true"></i></span>
                                        <a href="<?php echo admin_url('/admin.php?page=wpp'); ?>">
                                            <input class="button-primary" type="button" value="<?php _e('Cancel', 'wp-popup-lite'); ?>" />
                                        </a>
                                    </li>
                            </div>
                        </form>
                    </div>
                </div>    
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>
