<?php
defined('ABSPATH') or die("No script kiddies please!");

$wpb_default_settings = get_option('wpb_default_settings');
$wpb_site_url = esc_url(get_option('siteurl'));
$wpb_site_urlc = preg_replace('#^https?://#', '', $wpb_site_url);
$wpb_blog_name = esc_attr(get_option('blogname'));
$wpb_admin_email = sanitize_email(get_option('admin_email'));
global $wpdb;
$table_name = $wpdb->prefix . "popup_banners";
$rows = $wpdb->get_results("SELECT * FROM $table_name");
$wpb_default_settings = get_option('wpb_default_settings');
$pages = $this->wpp_get_all_page_lists();
$args = array('public' => true, '_builtin' => false);
$output = 'objects';
$operator = 'and';
$all_post_types = array();
if (!empty($post_types)) {
    foreach ($post_types as $post_type) {
        $all_post_types[] = $post_type;
    }
}
$all_post_tssypes = array();
if (!empty($catesdgories)) {
    foreach ($post_types as $catesdgories) {
        $all_post_tssypes[] = $catesdgories;
    }
}
if (isset($wpb_default_settings['load_page_specific_display']) && is_array($wpb_default_settings['load_page_specific_display'])) {
    $load_show_pages_list_array = $wpb_default_settings['load_page_specific_display'];
} else {
    $load_show_pages_list_array = '';
}
?>
<div class="wrap clearfix">
    <div class="wpb-add-set-wrapper clearfix">
        <div class="wpb-panel">
            <div class="wpb-manage-header">               
                <div class="wpb-boards-wrapper">
                    <div class="wpb-banner clearfix">
                        <?php include(WPP_ABSPATH . 'inc/backend/tabs/header.php'); ?>
                    </div>
                    <div class="wbp-left-section-wrapper">   
                        <div class="wpb_tab_content_holder">
                            <div id="optionsframework">
                                <div  class="wpb_settings wpb_setting_tabs_content">
                                    <form id="wpb_setting_form" action="<?php echo admin_url() . 'admin-post.php' ?>" method='post'>
                                        <input type="hidden" name="action" value="wpb_save_options" />
                                        <?php wp_nonce_field('wpb_nonce_save_settings', 'wpb_add_nonce_save_settings'); ?>
                                        <?php
                                        /**
                                         * session messages are displayed here
                                         * such as database insert, delete, update
                                         * success or failure messages
                                         */
                                        if (isset($_GET['message']) && $_GET['message'] == 1) {
                                            ?>
                                            <div class="wpb-setting-notice notice notice-success is-dismissible">
                                                <?php
                                                echo __('Default Setting Value Updated Successfully', 'wp-popup-lite');
                                                ?>
                                            </div>
                                        <?php } else if (isset($_GET['message']) && $_GET['message'] == 2) { ?>
                                            <div class="wpb-setting-notice notice notice-error is-dismissible">
                                                <?php
                                                echo __('Default Setting Value Couln\'t be Updated.', 'wp-popup-lite');
                                                ?>
                                            </div> 
                                        <?php } ?> 
                                        <div class="wpb-setting-nav-tab">
                                            <h2 class="nav-tab-wrapper">                             
                                                <a href="javascript:void(0)" id="wpb-general-setting" class="wpb-setting-tabs-trigger nav-tab nav-tab-active"><?php _e('General', 'wp-popup-lite'); ?></a>
                                                <a href="javascript:void(0)" id="wpb-on-actions-setting" class="wpb-setting-tabs-trigger nav-tab"><?php _e('On Action', 'wp-popup-lite'); ?></a>
                                                <a href="javascript:void(0)" id="wpb-subscription-mail-setting" class="wpb-setting-tabs-trigger nav-tab"><?php _e('User Mail', 'wp-popup-lite'); ?></a>
                                                <a href="javascript:void(0)" id="wpb-admin-other-mail" class="wpb-setting-tabs-trigger nav-tab"><?php _e('External Subscription', 'wp-popup-lite'); ?></a>
                                                <a href="javascript:void(0)" id="wpb-admin-other-setting" class="wpb-setting-tabs-trigger nav-tab"><?php _e('Miscellaneous', 'wp-popup-lite'); ?></a>
                                                <a href="javascript:void(0)" id="wpb-admin-notification-mails-setting" class="wpb-setting-tabs-trigger nav-tab"><?php _e('Admin Notification', 'wp-popup-lite'); ?></a>
                                            </h2>
                                        </div>
                                        <div class="wpb-setting-field-wrapper wpb-setting-tab-contents" id="tab-wpb-general-setting" style="display:block;">
                                            <?php include( 'setting-fields/general-setting.php' ); ?>
                                        </div>
                                        <div class="wpb-setting-field-wrapper wpb-setting-tab-contents" id="tab-wpb-on-actions-setting" style="display:none;">
                                            <?php include( 'setting-fields/on-action-setting.php' ); ?>
                                        </div>                                      
                                        <div class="wpb-setting-field-wrapper wpb-setting-tab-contents" id="tab-wpb-google-recaptcha" style="display:none;">
                                            <?php include( 'setting-fields/recaptcha-setting.php' ); ?> 
                                        </div>
                                        <div class="wpb-setting-field-wrapper wpb-setting-tab-contents" id="tab-wpb-subscription-mail-setting" style="display:none;">
                                            <?php include( 'setting-fields/mail-setting.php' ); ?>   
                                        </div>
                                        <div class="wpb-setting-field-wrapper wpb-setting-tab-contents" id="tab-wpb-admin-other-mail" style="display:none;">
                                            <?php include( 'setting-fields/external-subscription-setting.php' ); ?> 
                                        </div>
                                        <div class="wpb-setting-field-wrapper wpb-setting-tab-contents" id="tab-wpb-admin-notification-mails-setting" style="display:none;">
                                            <?php include( 'setting-fields/admin-notification-setting.php' ); ?> 
                                        </div>                                   
                                        <div class="wpb-setting-field-wrapper wpb-setting-tab-contents" id="tab-wpb-admin-other-setting" style="display:none;">
                                            <?php include( 'setting-fields/miscelleaneous-setting.php' ); ?>
                                        </div>                                       
                                        <div class="wpb-field-setting wpb-save-setting-button">                            
                                            <div class="wpb-setting-input-field">
                                                <input type="submit" class="button-primary wpb-bottom-submit" name='wpb_save_settings' value="<?php
                                                if (isset($edit)) {
                                                    _e('Update Settings', 'wp-popup-lite');
                                                } else {
                                                    _e('Save settings', 'wp-popup-lite');
                                                }
                                                ?>" />
                                            </div>                            
                                        </div>
                                    </form>                                                             
                                </div>
                                <div class="wpp-sidebar">
                                    <?php include(WPP_ABSPATH . 'inc/backend/tabs/sidebar.php'); ?>
                                </div>
                            </div>
                        </div>
                    </div>    
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>
</div>