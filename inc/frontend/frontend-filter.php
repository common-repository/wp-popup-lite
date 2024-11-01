<?php
defined('ABSPATH') or die("No script kiddies please!");

global $wp_query, $post, $wpdb;
$wpb_default_settings = get_option('wpb_default_settings');
$enable_popup = isset($wpb_default_settings['check_enable']) && !empty($wpb_default_settings['check_enable']) ? esc_attr($wpb_default_settings['check_enable']) : '';
$enable_popup_on_mobile = isset($wpb_default_settings['wbp_enable_mobile']) && !empty($wpb_default_settings['wbp_enable_mobile']) ? esc_attr($wpb_default_settings['wbp_enable_mobile']) : ''; /* Enable Disable popup for mobile version */
$disable_pp_logged = isset($wpb_default_settings['wbp_enable_logged']) && !empty($wpb_default_settings['wbp_enable_logged']) ? esc_attr($wpb_default_settings['wbp_enable_logged']) : ''; /* Enable Disable popup for Logged in User */

$default_popup = isset($wpb_default_settings['default_popup_id']) && !empty($wpb_default_settings['default_popup_id']) ? esc_attr($wpb_default_settings['default_popup_id']) : ''; /* Default/Load popup id value from option table */
$popup_default_disp_type = isset($wpb_default_settings['wpb_disp_duration']) && !empty($wpb_default_settings['default_popup_id']) ? esc_attr($wpb_default_settings['wpb_disp_duration']) : ''; /* popup display type either once, always, once per session etc */
$show_pages_wise_popup = isset($wpb_default_settings['load_popup_show_hide_on']) && !empty($wpb_default_settings['load_popup_show_hide_on']) ? esc_attr($wpb_default_settings['load_popup_show_hide_on']) : ''; /* Display hide popup on specific page, home page or specific page */
$popup_delay_duration = isset($wpb_default_settings['popup_delay']) && !empty($wpb_default_settings['popup_delay']) ? esc_attr($wpb_default_settings['popup_delay']) : ''; /* Popup Delay duration */
$page_wise_popup_id = '';
if (!is_404()) {
    $current_page_id = $wp_query->post->ID;
} else {
    $current_page_id = '';
}

/* For Load Popup */
if ($default_popup != "default") {
    if (intval($page_wise_popup_id)) {
        $load_popup = $page_wise_popup_id;
        $show_hide_load_popup = "show_load_popup";
        $load_default_popup = 1;
    } else {
        if ($page_wise_popup_id == "default") {
            $load_popup = $default_popup;
            $show_hide_load_popup = "show_load_popup";
            $load_default_popup = 1;
        } else if ($page_wise_popup_id == "disable") {
            $load_popup = $default_popup;
            $show_hide_load_popup = "hide_load_popup";
            $load_default_popup = 0;
        } else if ($page_wise_popup_id == "") {
            $load_popup = $default_popup;
            $show_hide_load_popup = "show_load_popup";
            $load_default_popup = 1;
        } else {
            $load_popup = $page_wise_popup_id;
            $show_hide_load_popup = "hide_load_popup";
            $load_default_popup = 0;
        }
    }
} else {
    if (intval($page_wise_popup_id)) {
        $load_popup = $page_wise_popup_id;
        $show_hide_load_popup = 'hide_load_popup';
    } else {
        $show_hide_load_popup = "hide_load_popup";
    }
    $load_default_popup = 0;
}



if ($enable_popup == 1) {
    if (!is_feed()) {
        if (isset($_GET['wpb_preview']) && !empty($_GET['wpb_preview'])) {
            $popup_id = sanitize_text_field($_GET['banner_id']);
            $get_data_from_table = $this->get_popup_data($popup_id);
            if (isset($get_data_from_table[0]) && !empty($get_data_from_table[0])) {
                $popup_data = $get_data_from_table[0];
                $parameteres = unserialize($popup_data->option_value);
                $custom_generated_popup = unserialize($popup_data->popup_builder);
                $wpb_theme_type = (isset($parameteres['popup_parameters']['wpb_theme_type'])) ? $parameteres['popup_parameters']['wpb_theme_type'] : '';
                if ($wpb_theme_type == 'custom') {
                    include(WPP_ABSPATH . 'inc/frontend/custom/custom-generator.php' );
                } else {
                    $wpb_buildin_theme_type = (isset($parameteres['popup_parameters']['wpb_buildin_theme_tpye'])) ? $parameteres['popup_parameters']['wpb_buildin_theme_tpye'] : 'theme-1';
                    if (!empty($wpb_buildin_theme_type) && ($wpb_buildin_theme_type == $wpb_buildin_theme_type )) {
                        require_once(WPP_ABSPATH . 'inc/theme/' . $wpb_buildin_theme_type . '/' . $wpb_buildin_theme_type . '.php' );
                    }
                }
            }
        } else {
            if ($show_pages_wise_popup == "all-pages") {

                /* For Load Popup Display */
                if ($show_hide_load_popup == "show_load_popup" && $load_default_popup == 1) {
                    $popup_id = $load_popup;

                    $get_data_from_table = $this->get_popup_data($popup_id);
                    if (isset($get_data_from_table[0]) && !empty($get_data_from_table[0])) {
                        $popup_data = $get_data_from_table[0];
                        $parameteres = unserialize($popup_data->option_value);
                        $custom_generated_popup = unserialize($popup_data->popup_builder);
                        $wpb_theme_type = (isset($parameteres['popup_parameters']['wpb_theme_type'])) ? $parameteres['popup_parameters']['wpb_theme_type'] : '';
                        if ($wpb_theme_type == 'custom') {
                            include('custom/custom-generator.php' );
                        } else {
                            $wpb_buildin_theme_type = (isset($parameteres['popup_parameters']['wpb_buildin_theme_tpye'])) ? $parameteres['popup_parameters']['wpb_buildin_theme_tpye'] : 'theme-1';
                            if (!empty($wpb_buildin_theme_type) && ($wpb_buildin_theme_type == $wpb_buildin_theme_type )) {
                                require_once(WPP_ABSPATH . 'inc/theme/' . $wpb_buildin_theme_type . '/' . $wpb_buildin_theme_type . '.php' );
                            } else {
                                //no popup
                            }
                        }
                    }
                }
            } else if ($show_pages_wise_popup == "home-page") {
                if (is_front_page()) {

                    /* For Load Popup Display */
                    if ($show_hide_load_popup == "show_load_popup" && $load_default_popup == 1) {
                        $popup_id = $load_popup;
                        $get_data_from_table = $this->get_popup_data($popup_id);
                        if (isset($get_data_from_table[0]) && !empty($get_data_from_table[0])) {
                            $popup_data = $get_data_from_table[0];
                            $parameteres = unserialize($popup_data->option_value);
                            $custom_generated_popup = unserialize($popup_data->popup_builder);
                            $wpb_theme_type = (isset($parameteres['popup_parameters']['wpb_theme_type'])) ? $parameteres['popup_parameters']['wpb_theme_type'] : '';
                            if ($wpb_theme_type == 'custom') {
                                include('custom/custom-generator.php' );
                            } else {
                                $wpb_buildin_theme_type = (isset($parameteres['popup_parameters']['wpb_buildin_theme_tpye'])) ? $parameteres['popup_parameters']['wpb_buildin_theme_tpye'] : 'theme-1';
                                if (!empty($wpb_buildin_theme_type) && ($wpb_buildin_theme_type == $wpb_buildin_theme_type )) {
                                    require_once(WPP_ABSPATH . 'inc/theme/' . $wpb_buildin_theme_type . '/' . $wpb_buildin_theme_type . '.php' );
                                } else {
                                    //no popup
                                }
                            }
                        }
                    }
                }
            } else {
//                if (isset($wpb_default_settings['load_page_specific_display']) && is_array($wpb_default_settings['load_page_specific_display'])) {
//                    $showpages_array = $wpb_default_settings['load_page_specific_display'];
//                } else {
//                    $showpages_array = array();
//                }
//
//                if (in_array($current_page_id, $showpages_array) && !is_front_page()) {
//
//                    /* For Load Popup Display */
//                    if ($show_hide_load_popup == "show_load_popup" && $load_default_popup == 1) {
//                        $popup_id = $load_popup;
//                        $get_data_from_table = $this->get_popup_data($popup_id);
//                        if (isset($get_data_from_table[0]) && !empty($get_data_from_table[0])) {
//                            $popup_data = $get_data_from_table[0];
//                            $parameteres = unserialize($popup_data->option_value);
//                            $custom_generated_popup = unserialize($popup_data->popup_builder);
//                            $wpb_theme_type = (isset($parameteres['popup_parameters']['wpb_theme_type'])) ? $parameteres['popup_parameters']['wpb_theme_type'] : '';
//                            if ($wpb_theme_type == 'custom') {
//                                include('custom/custom-generator.php' );
//                            } else {
//                                $wpb_buildin_theme_type = (isset($parameteres['popup_parameters']['wpb_buildin_theme_tpye'])) ? $parameteres['popup_parameters']['wpb_buildin_theme_tpye'] : 'theme-1';
//                                if (!empty($wpb_buildin_theme_type) && ($wpb_buildin_theme_type == $wpb_buildin_theme_type )) {
//                                    require_once(WPP_ABSPATH . 'inc/theme/' . $wpb_buildin_theme_type . '/' . $wpb_buildin_theme_type . '.php' );
//                                } else {
//                                    //no popup
//                                }
//                            }
//                        }
//                    }
//                }
            } /* Else pagewise load display ends */
        }
        ?>
        <div class="default-wpb-popup-val" style="display:none;">
            <input type="hidden" id="wpb_on_load_popup" value="<?php
            if ($show_hide_load_popup == "show_load_popup" && $load_default_popup == 1 && intval($load_popup)) {
                echo $load_popup;
            } else if ($show_hide_load_popup == "show_load_popup" && $load_default_popup == 1 && !intval($load_popup) && intval($default_popup)) {
                echo $default_popup;
            } else {
                echo 'disabled';
            }
            ?>">
            <input type="hidden" id="wpb_on_scroll_popup" value="<?php
            if ($show_hide_scroll_popup == "show_scroll_popup" && $scroll_default_popup == 1 && intval($scroll_popup)) {
                echo $scroll_popup;
            } else if ($show_hide_scroll_popup == "show_scroll_popup" && $scroll_default_popup == 1 && !intval($scroll_popup) && intval($default_spopup)) {
                echo $default_spopup;
            } else {
                echo 'disabled';
            }
            ?>">
            <input type="hidden" id="wpb_on_idle_popup" value="<?php
            if ($show_hide_idle_popup == "show_idle_popup" && $idle_default_popup == 1 && intval($idle_popup)) {
                echo $idle_popup;
            } else if ($show_hide_idle_popup == "show_idle_popup" && $idle_default_popup == 1 && !intval($idle_popup) && intval($default_ipopup)) {
                echo $default_ipopup;
            } else {
                echo 'disabled';
            }
            ?>">
            <input type="hidden" id="wpb_on_exit_popup" value="<?php
            if ($show_hide_exit_popup == "show_exit_popup" && $exit_default_popup == 1 && intval($exit_popup)) {
                echo $exit_popup;
            } else if ($show_hide_exit_popup == "show_exit_popup" && $exit_default_popup == 1 && !intval($exit_popup) && intval($default_epopup)) {
                echo $default_epopup;
            } else {
                echo 'disabled';
            }
            ?>">
            <input type="hidden" id="wpb_popup_delay" value="<?php
            if (isset($page_wise_popup_delay_time) && $page_wise_popup_delay_time != 0 || $page_wise_popup_delay_time != '') {
                echo $page_wise_popup_delay_time;
            } else if (!empty($popup_delay_duration)) {
                echo $popup_delay_duration;
            } else {
                echo '2';
            }
            ?>">
            <input type="hidden" id="wpb_idle_wait_period" value="<?php
            if (isset($wpb_ipopup_wait_period) && $wpb_ipopup_wait_period != 0 || $wpb_ipopup_wait_period != '') {
                echo $wpb_ipopup_wait_period;
            } else if (!empty($wpb_ideal_wait_period)) {
                echo $wpb_ideal_wait_period;
            } else {
                echo '5';
            }
            ?>">
            <input type="hidden" id="wpb_scroll_offset_value" value="<?php
            if (isset($wpb_spopup_scroll_offset) && $wpb_spopup_scroll_offset != 0 || $wpb_spopup_scroll_offset != '') {
                echo $wpb_spopup_scroll_offset;
            } else if (!empty($wpb_scroll_offset)) {
                echo $wpb_scroll_offset;
            } else {
                echo '50';
            }
            ?>">
            <input type="hidden" id="wpb_popup_cookie" value="<?php
            if (isset($wpb_load_disp_duration) && $wpb_load_disp_duration != 'default') {
                echo $wpb_load_disp_duration;
            } else if (isset($popup_default_disp_type) && ($wpb_load_disp_duration == 'default' || !isset($wpb_load_disp_duration))) {
                echo $popup_default_disp_type;
            } else {
                echo 'always';
            }
            ?>">
            <input type="hidden" id="wpb_scrol_popup_cookie" value="<?php
            if (isset($wpb_spopup_disp_duration) && $wpb_spopup_disp_duration != 'default') {
                echo $wpb_spopup_disp_duration;
            } else if (isset($popup_sdisp_type) && ($wpb_spopup_disp_duration == 'default' || !isset($wpb_spopup_disp_duration))) {
                echo $popup_sdisp_type;
            } else {
                echo 'always';
            }
            ?>">
            <input type="hidden" id="wpb_idle_popup_cookie" value="<?php
            if (isset($wpb_ipopup_disp_duration) && $wpb_ipopup_disp_duration != 'default') {
                echo $wpb_ipopup_disp_duration;
            } else if (isset($popup_idisp_type) && ($wpb_ipopup_disp_duration == 'default' || !isset($wpb_ipopup_disp_duration))) {
                echo $popup_idisp_type;
            } else {
                echo 'always';
            }
            ?>">
            <input type="hidden" id="wpb_exit_popup_cookie" value="<?php
            if (isset($wpb_epopup_disp_duration) && $wpb_epopup_disp_duration != 'default') {
                echo $wpb_epopup_disp_duration;
            } else if (isset($popup_edisp_type) && ($wpb_epopup_disp_duration == 'default' || !isset($wpb_epopup_disp_duration))) {
                echo $popup_edisp_type;
            } else {
                echo 'always';
            }
            ?>">
            <input type="hidden" id="wpb_popup_cookie_expiry" value="<?php
            if (isset($wpb_default_settings['wbp_cookie_expire_period']) && !empty($wpb_default_settings['wbp_cookie_expire_period'])) {
                echo esc_attr($wpb_default_settings['wbp_cookie_expire_period']);
            } else {
                echo 365;
            }
            ?>">
            <input type="hidden" id="wpb_current_page_id" value="<?php
            if (isset($current_page_id) && !empty($current_page_id)) {
                echo esc_attr($current_page_id);
            } else {
                echo '';
            }
            ?>">
        </div>
        <?php if (isset($wpb_default_settings['wbp_enable_mobile']) && $wpb_default_settings['wbp_enable_mobile'] == 1) {
            ?>
            <style type="text/css">
                /* Portrait and Landscape */
                @media only screen 
                and (min-device-width: 320px) 
                and (max-device-width: 480px)
                and (-webkit-min-device-pixel-ratio: 2) {
                    .wpb-outer-wrap{display:none; }	
                }

                /* Portrait */
                @media only screen 
                and (min-device-width: 320px) 
                and (max-device-width: 480px)
                and (-webkit-min-device-pixel-ratio: 2)
                and (orientation: portrait) {
                    .wpb-outer-wrap{display:none; }	
                }

                /* Landscape */
                @media only screen 
                and (min-device-width: 320px) 
                and (max-device-width: 480px)
                and (-webkit-min-device-pixel-ratio: 2)
                and (orientation: landscape) {
                    .wpb-outer-wrap{display:none; }	
                }

                /* ----------- iPhone 5 and 5S ----------- */

                /* Portrait and Landscape */
                @media only screen 
                and (min-device-width: 320px) 
                and (max-device-width: 568px)
                and (-webkit-min-device-pixel-ratio: 2) {
                    .wpb-outer-wrap{display:none; }	
                }

                /* Portrait */
                @media only screen 
                and (min-device-width: 320px) 
                and (max-device-width: 568px)
                and (-webkit-min-device-pixel-ratio: 2)
                and (orientation: portrait) {
                    .wpb-outer-wrap{display:none; }	
                }

                /* Landscape */
                @media only screen 
                and (min-device-width: 320px) 
                and (max-device-width: 568px)
                and (-webkit-min-device-pixel-ratio: 2)
                and (orientation: landscape) {
                    .wpb-outer-wrap{display:none; }	
                }

                /* ----------- iPhone 6 ----------- */

                /* Portrait and Landscape */
                @media only screen 
                and (min-device-width: 375px) 
                and (max-device-width: 667px) 
                and (-webkit-min-device-pixel-ratio: 2) { 
                    .wpb-outer-wrap{display:none; }	
                }

                /* Portrait */
                @media only screen 
                and (min-device-width: 375px) 
                and (max-device-width: 667px) 
                and (-webkit-min-device-pixel-ratio: 2)
                and (orientation: portrait) { 
                    .wpb-outer-wrap{display:none; }	
                }

                /* Landscape */
                @media only screen 
                and (min-device-width: 375px) 
                and (max-device-width: 667px) 
                and (-webkit-min-device-pixel-ratio: 2)
                and (orientation: landscape) { 
                    .wpb-outer-wrap{display:none; }	
                }

                /* ----------- iPhone 6+ ----------- */

                /* Portrait and Landscape */
                @media only screen 
                and (min-device-width: 414px) 
                and (max-device-width: 736px) 
                and (-webkit-min-device-pixel-ratio: 3) { 
                    .wpb-outer-wrap{display:none; }	
                }

                /* Portrait */
                @media only screen 
                and (min-device-width: 414px) 
                and (max-device-width: 736px) 
                and (-webkit-min-device-pixel-ratio: 3)
                and (orientation: portrait) { 
                    .wpb-outer-wrap{display:none; }	
                }

                /* Landscape */
                @media only screen 
                and (min-device-width: 414px) 
                and (max-device-width: 736px) 
                and (-webkit-min-device-pixel-ratio: 3)
                and (orientation: landscape) { 
                    .wpb-outer-wrap{display:none; }	
                }

            </style>
        <?php } ?>
        <?php
    } /* Is feed check end */
} /* Enable popup check end if */
?>