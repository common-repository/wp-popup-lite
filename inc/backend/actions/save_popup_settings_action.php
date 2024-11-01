<?php defined('ABSPATH') or die("No script kiddies please!"); ?>
<?php

/** Option Table values
 * array (size=29)
  'action' => string 'wpb_save_options' (length=16)
  'wbp_enable' => string 'on' (length=2)
  'wbp_enable_mobile' => string 'on' (length=2)
  'wbp_enable_logged' => string 'on' (length=2)
  'wpb_default_id' => string '' (length=0)
  'wpb_disp_duration' => string '' (length=0)
  'default_spopup_id' => string '' (length=0)
  'wpb_sdisp_duration' => string '' (length=0)
  'wpb_scroll_offset' => string '' (length=0)
  'default_ipopup_id' => string '' (length=0)
  'wpb_idisp_duration' => string '' (length=0)
  'wpb_ideal_wait_period' => string '' (length=0)
  'default_epopup_id' => string '' (length=0)
  'wpb_edisp_duration' => string '' (length=0)
  'default_cpopup_id' => string '' (length=0)
  'wpb_cdisp_duration' => string '' (length=0)
  'wbp_enable_grecaptcha' => string 'on' (length=2)
  'wbp_grecaptcha_secret_key' => string '' (length=0)
  'wbp_grecaptcha_public_key' => string '' (length=0)
  'wbp_mail_username' => string 'Wp Popup Banners' (length=16)
  'wbp_mail_email' => string 'no-reply@localhost/wp-popup-banners' (length=35)
  'wbp_default_subscript_message' => string '' (length=96)
  'wbp_default_subscript_thnk_message' => string '' (length=96)
  'wbp_cookie_expire_period' => string '' (length=0)
  'wbp_disable_faw' => string 'on' (length=2)
  'wbp_disable_css3' => string 'on' (length=2)
 */
$allowedposttags = array(
    'a' => array(
        'href' => array(),
        'title' => array()),
    'br' => array(),
    'p' => array(
        'style' => array()),
    'hr' => array(),
    'abbr' => array(
        'title' => array()),
    'b' => array(),
    'ul' => array(),
    'li' => array(),
    'ol' => array(),
    'h1' => array(
        'style' => array()),
    'h2' => array(
        'style' => array()),
    'h3' => array(
        'style' => array()),
    'h4' => array(
        'style' => array()),
    'h5' => array(
        'style' => array()),
    'h6' => array(
        'style' => array()),
    'span' => array(
        'style' => array()),
    'blockquote' => array(
        'cite' => array()),
    'cite' => array(),
    'code' => array(),
    'del' => array(
        'datetime' => array()),
    'em' => array(),
    'i' => array(),
    'q' => array(
        'cite' => array()),
    'strike' => array(),
    'strong' => array(),
    'quotes' => array(),
);

$allowediframetags = array(
    'iframe' => array(
        'quotes' => array(),
        'br' => array(),
        'src' => array(),
        'width' => array(),
        'height' => array(),
        'frameborder' => array(),
        'style' => array(),
        'allowfullscreen' => array()
    ),
    'quotes' => array(),
);

$_POST = array_map('stripslashes_deep', $_POST);
global $wpdb;
$wpb_settings = array();

/**
 * get the popup id if the action is edit
 */
$wpbid = (isset($_POST['wpb_id'])) ? $_POST['wpb_id'] : '';


/**
 * check id the form submission for add/edit popup details for add/edit page
 */
if (isset($_POST['wpb_save_settings'])) {
    foreach ($_POST as $key => $val) {
        if ($key != 'id') {
            $$key = stripslashes_deep($val);
        }
    }
}

/**
 * check id the form submission for popup default value setting for settingspage
 */
if (isset($_POST['wbp_enable']) || (isset($_POST['wpb_default_id']) && intval($_POST['wpb_default_id']))) {
    if (isset($_POST['load_page_specific_display'])) {
        $load_popup_show_hide_page_specific = array_map('sanitize_text_field', $_POST['load_page_specific_display']);
        if (isset($load_popup_show_hide_page_specific)) {
            $load_popup_show_hide_page_specific = $load_popup_show_hide_page_specific;
        } else {
            $load_popup_show_hide_page_specific = array();
        }
    } else {
        $load_popup_show_hide_page_specific = array();
    }
    if (isset($_POST['scroll_page_specific_display'])) {
        $scroll_popup_show_hide_page_specific = array_map('sanitize_text_field', $_POST['scroll_page_specific_display']);
        if (isset($scroll_popup_show_hide_page_specific)) {
            $scroll_popup_show_hide_page_specific = $scroll_popup_show_hide_page_specific;
        } else {
            $scroll_popup_show_hide_page_specific = array();
        }
    } else {
        $scroll_popup_show_hide_page_specific = array();
    }

    if (isset($_POST['idle_page_specific_display'])) {
        $idle_popup_show_hide_page_specific = array_map('sanitize_text_field', $_POST['idle_page_specific_display']);
        if (isset($idle_popup_show_hide_page_specific)) {
            $idle_popup_show_hide_page_specific = $idle_popup_show_hide_page_specific;
        } else {
            $idle_popup_show_hide_page_specific = array();
        }
    } else {
        $idle_popup_show_hide_page_specific = array();
    }

    if (isset($_POST['exit_page_specific_display'])) {
        $exit_popup_show_hide_page_specific = array_map('sanitize_text_field', $_POST['exit_page_specific_display']);
        if (isset($exit_popup_show_hide_page_specific)) {
            $exit_popup_show_hide_page_specific = $exit_popup_show_hide_page_specific;
        } else {
            $exit_popup_show_hide_page_specific = array();
        }
    } else {
        $exit_popup_show_hide_page_specific = array();
    }

    $wpb_settings = array(
        'check_enable' => (isset($wbp_enable)) ? 1 : 0,
        'wbp_enable_mobile' => isset($_POST['wbp_enable_mobile']) ? 1 : 0,
        'wbp_enable_logged' => isset($_POST['wbp_enable_logged']) ? 1 : 0,
        'wpb_disp_duration' => isset($_POST['wpb_disp_duration']) ? sanitize_text_field($_POST['wpb_disp_duration']) : '',
        'default_popup_id' => $wpb_default_id,
        'popup_delay' => isset($_POST['popup_delay']) ? sanitize_text_field($_POST['popup_delay']) : '',
        'default_spopup_id' => isset($_POST['default_spopup_id']) ? sanitize_text_field($_POST['default_spopup_id']) : '',
        'wpb_scroll_offset' => isset($_POST['wpb_scroll_offset']) ? sanitize_text_field($_POST['wpb_scroll_offset']) : '',
        'wpb_sdisp_duration' => isset($_POST['wpb_sdisp_duration']) ? sanitize_text_field($_POST['wpb_sdisp_duration']) : '',
        'default_ipopup_id' => isset($_POST['default_ipopup_id']) ? sanitize_text_field($_POST['default_ipopup_id']) : '',
        'wpb_idisp_duration' => isset($_POST['wpb_idisp_duration']) ? sanitize_text_field($_POST['wpb_idisp_duration']) : '',
        'wpb_ideal_wait_period' => isset($_POST['wpb_ideal_wait_period']) ? sanitize_text_field($_POST['wpb_ideal_wait_period']) : '',
        'default_epopup_id' => isset($_POST['default_epopup_id']) ? sanitize_text_field($_POST['default_epopup_id']) : '',
        'wpb_edisp_duration' => isset($_POST['wpb_edisp_duration']) ? sanitize_text_field($_POST['wpb_edisp_duration']) : '',
        'default_cpopup_id' => isset($_POST['default_cpopup_id']) ? sanitize_text_field($_POST['default_cpopup_id']) : '',
        'wpb_cdisp_duration' => isset($_POST['wpb_cdisp_duration']) ? sanitize_text_field($_POST['wpb_cdisp_duration']) : '',
        'wbp_enable_grecaptcha' => isset($_POST['wbp_enable_grecaptcha']) ? 1 : 0,
        'wbp_grecaptcha_secret_key' => isset($_POST['wbp_grecaptcha_secret_key']) ? sanitize_text_field($_POST['wbp_grecaptcha_secret_key']) : '',
        'wbp_grecaptcha_public_key' => isset($_POST['wbp_grecaptcha_public_key']) ? sanitize_text_field($_POST['wbp_grecaptcha_public_key']) : '',
        'wbp_mail_username' => isset($_POST['wbp_mail_username']) ? sanitize_text_field($_POST['wbp_mail_username']) : '',
        'wbp_mail_email' => isset($_POST['wbp_mail_email']) ? sanitize_email($_POST['wbp_mail_email']) : '',
        'wbp_default_subscript_message' => isset($_POST['wbp_default_subscript_message']) ? sanitize_text_field($_POST['wbp_default_subscript_message']) : '',
        'wbp_default_subscript_thnk_message' => isset($_POST['wbp_default_subscript_thnk_message']) ? sanitize_text_field($_POST['wbp_default_subscript_thnk_message']) : '',
        'wbp_enable_admin_notification_email' => isset($_POST['wbp_enable_admin_notification_email']) ? 1 : 0,
        'wbp_admin_notification_email' => isset($_POST['wbp_admin_notification_email']) ? sanitize_email($_POST['wbp_admin_notification_email']) : '',
        'wbp_default_admin_notification_message' => isset($_POST['wbp_default_admin_notification_message']) ? sanitize_text_field($_POST['wbp_default_admin_notification_message']) : '',
        'wbp_cookie_expire_period' => isset($_POST['wbp_cookie_expire_period']) ? sanitize_text_field($_POST['wbp_cookie_expire_period']) : '',
        'wbp_disable_faw' => isset($_POST['wbp_disable_faw']) ? 1 : 0,
        'wbp_disable_css3' => isset($_POST['wbp_disable_css3']) ? 1 : 0,
        'load_popup_show_hide_on' => isset($_POST['load_popup_show_hide_on']) ? sanitize_text_field($_POST['load_popup_show_hide_on']) : '',
        'load_page_specific_display' => $load_popup_show_hide_page_specific,
        'scroll_popup_show_hide_on' => isset($_POST['scroll_popup_show_hide_on']) ? sanitize_text_field($_POST['scroll_popup_show_hide_on']) : '',
        'scroll_page_specific_display' => $scroll_popup_show_hide_page_specific,
        'idle_popup_show_hide_on' => isset($_POST['idle_popup_show_hide_on']) ? sanitize_text_field($_POST['idle_popup_show_hide_on']) : '',
        'idle_page_specific_display' => $idle_popup_show_hide_page_specific,
        'exit_popup_show_hide_on' => isset($_POST['exit_popup_show_hide_on']) ? sanitize_text_field($_POST['exit_popup_show_hide_on']) : '',
        'exit_page_specific_display' => $exit_popup_show_hide_page_specific,
        'form_mail_option' => isset($_POST['form_mail_option']) ? sanitize_text_field($_POST['form_mail_option']) : '',
        'wbp_mailchimp_api_key' => isset($_POST['wbp_mailchimp_api_key']) ? sanitize_text_field($_POST['wbp_mailchimp_api_key']) : '',
        'wbp_smtp_enable' => (isset($_POST['wbp_smtp_enable'])) ? 1 : 0,
        'wbp_smtp_auth_en' => (isset($_POST['wbp_smtp_auth_en'])) ? 1 : 0,
        'wpb_smtp_host' => isset($_POST['wpb_smtp_host']) ? sanitize_text_field($_POST['wpb_smtp_host']) : '',
        'wpb_smtp_port' => isset($_POST['wpb_smtp_port']) ? sanitize_text_field($_POST['wpb_smtp_port']) : '',
        'wpb_encryption_type' => isset($_POST['wpb_encryption_type']) ? sanitize_text_field($_POST['wpb_encryption_type']) : '',
        'wpb_smtp_username' => isset($_POST['wpb_smtp_username']) ? sanitize_text_field($_POST['wpb_smtp_username']) : '',
        'wpb_smtp_password' => isset($_POST['wpb_smtp_password']) ? sanitize_text_field($_POST['wpb_smtp_password']) : '',
        'wbp_default_admin_notification_message' => isset($_POST['wbp_default_admin_notification_message']) ? wp_kses($_POST['wbp_default_admin_notification_message'], $allowedposttags) : '',
    );

    $update_option_table = update_option(WPB_DEFAULT_VARIABLE, $wpb_settings);
    if ($update_option_table || $wpdb->last_error == '') {
        wp_redirect(admin_url() . 'admin.php?page=wpp-setting&message=1');
        die();
    } else {
        wp_redirect(admin_url() . 'admin.php?page=wpp-setting&message=2');
        die();
    }
} else {
    $table_name = $wpdb->prefix . "popup_banners";

    $pages_list = '';
    if (isset($_POST['wpb_select_pages'])) {
        $pages_list = isset($_POST['wpb_select_pages'])?sanitize_text_field($_POST['wpb_select_pages']):'';
    }

/*
 * Pushing all values into array for saving 
 */
    foreach ($_POST as $key => $val) {
        if ($key == 'wpb_el_val' || $key == 'wpb_opt' || $key == 'buildin_theme' || $key == 'wpb_ext_sett' || $key == 'buildin_theme_google_embed') {
            $$key = $val;
        } else {
            $$key = sanitize_text_field($val);
        }
    }
    /** 
     * Sanitizing each form fields for popup field added 
     */
    $popup_element_structure_temp = array();
    if (!empty($wpb_el_val)) {
        foreach ($wpb_el_val as $key => $val) {
            //normal_text;
            $popup_element_structure_temp[$key] = array();
            if ($key != 'popup_elem_id') {
                foreach ($val as $k => $v) {
                    if ($val == 'normal_text') {
                        if (!is_array($v)) {
                            $popup_element_structure_temp[$key][$k] = wp_kses($v, $allowedposttags);
                        } else {
                            $popup_element_structure_temp[$key][$k] = array_map(wp_kses($v), $allowedposttags);
                        }
                    } else {
                        if (!is_array($v)) {
                            $popup_element_structure_temp[$key][$k] = sanitize_text_field($v);
                        } else {
                            $popup_element_structure_temp[$key][$k] = array_map('sanitize_text_field', $v);
                        }
                    }
                }
            }
        }
    }
    $popup_element_structure = $popup_element_structure_temp;

    $popup_extra_settings_temp = array();
    if (!empty($wpb_ext_sett)) {
        foreach ($wpb_ext_sett as $key => $val) {
            $popup_extra_settings_temp[$key] = array();
            if ($key == 'wpb_mc_lists') {
                foreach ($val as $k => $v) {
                    if (!is_array($k)) {
                        $popup_extra_settings_temp[$key][$k] = sanitize_text_field($v);
                    } else {
                        $popup_extra_settings_temp[$key][$k] = array_map('sanitize_text_field', $v);
                    }
                }
            }
        }
    }
    $popup_popup_extra_settings_val = $popup_extra_settings_temp;

    $popup_google_embed_val = array();
    if (isset($buildin_theme_google_embed) && !empty($buildin_theme_google_embed)) {
        foreach ($buildin_theme_google_embed as $key => $val) {
            $popup_google_embed_val[$key] = wp_kses($val, $allowediframetags);
        }
    }

    /** Sanitize general setting fields for popup */
    $popup_parameters = array();
    $buildin_popup_parameters = array();
    $popup_parameters['popup_parameters'] = array_map('sanitize_text_field', $wpb_opt);
    $popup_parameters['wpb_ext_sett'] = $popup_popup_extra_settings_val;
    $buildin_popup_parameters['buildin_popup'] = $buildin_theme; 
    $buildin_popup_parameters['buildin_theme_google_embed'] = $popup_google_embed_val;

    /**
     * update the popup details
     */
    if ($wpbid != '') {
        $update = $wpdb->update(
                $table_name, array(
            'option_value' => maybe_serialize($popup_parameters),
            'popup_builder' => maybe_serialize($popup_element_structure),
            'builtin_details' => maybe_serialize($buildin_popup_parameters),
                ), array(
            'id' => $wpbid
                )
        );

        if ($update) {//if update success
            wp_redirect(admin_url() . 'admin.php?page=wpp&action=edit&wpbid=' . $wpbid .'&message=3');   
        } else {
            wp_redirect(admin_url() . 'admin.php?page=wpp&action=edit&wpbid=' . $wpbid .'&message=4');   
        }
    } else {
        
        /**
         * insert the popup details
         */
        $insert = $wpdb->insert(
                $table_name, array(
            'option_value' => serialize($popup_parameters),
            'popup_builder' => maybe_serialize($popup_element_structure),
            'builtin_details' => maybe_serialize($popup_parameters['buildin_popup']),
                )
        );

        $wpb_default_settings = get_option('wpb_default_settings');
        if ($wpb_default_settings['default_popup_id'] == '') {
            $wpb_settings = array(
                'default_popup_id' => $wpdb->insert_id
            );

            $update_option_table = update_option(WPB_DEFAULT_VARIABLE, $wpb_settings);
        }

        if ($insert) {//if insert success
            $wpbid = $wpdb->insert_id;
            wp_redirect(admin_url() . 'admin.php?page=wpp&action=edit&wpbid=' . $wpbid .'&message=1');            
        } else {
            wp_redirect(admin_url() . 'admin.php?page=wpp&action=edit&wpbid=' . $wpbid .'&message=2');
        }
    }
}
exit;
// end