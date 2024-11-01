<?php
defined('ABSPATH') or die("No direct script allowed!!!");

$buildin_theme = unserialize($popup_data->builtin_details);

if (isset($buildin_theme['buildin_popup']['wpb_header_typography']) && $buildin_theme['buildin_popup']['wpb_header_typography'] != 'default') {
    $fonts_final = str_replace(' ', '+', $buildin_theme['buildin_popup']['wpb_header_typography']);
    echo "<link rel='stylesheet' id='wpb-google-fonts-style-css' href='//fonts.googleapis.com/css?family=" . $fonts_final . "' type='text/css' media='all' />";
}
if (isset($buildin_theme['buildin_popup']['wpb_subheader_typography']) && $buildin_theme['buildin_popup']['wpb_subheader_typography'] != 'default') {
    $fonts_final = str_replace(' ', '+', $buildin_theme['buildin_popup']['wpb_subheader_typography']);
    echo "<link rel='stylesheet' id='wpb-google-fonts-style-css' href='//fonts.googleapis.com/css?family=" . $fonts_final . "' type='text/css' media='all' />";
}
if (isset($buildin_theme['buildin_popup']['wpb_secondary_subheader_typography']) && $buildin_theme['buildin_popup']['wpb_secondary_subheader_typography'] != 'default') {
    $fonts_final = str_replace(' ', '+', $buildin_theme['buildin_popup']['wpb_secondary_subheader_typography']);
    echo "<link rel='stylesheet' id='wpb-google-fonts-style-css' href='//fonts.googleapis.com/css?family=" . $fonts_final . "' type='text/css' media='all' />";
}
if (isset($buildin_theme['buildin_popup']['wpb_submit_button_text_typography']) && $buildin_theme['buildin_popup']['wpb_submit_button_text_typography'] != 'default') {
    $fonts_final = str_replace(' ', '+', $buildin_theme['buildin_popup']['wpb_submit_button_text_typography']);
    echo "<link rel='stylesheet' id='wpb-google-fonts-style-css' href='//fonts.googleapis.com/css?family=" . $fonts_final . "' type='text/css' media='all' />";
}
if (isset($buildin_theme['buildin_popup']['wpb_email_placeholder_typography']) && $buildin_theme['buildin_popup']['wpb_email_placeholder_typography'] != 'default') {
    $fonts_final = str_replace(' ', '+', $buildin_theme['buildin_popup']['wpb_email_placeholder_typography']);
    echo "<link rel='stylesheet' id='wpb-google-fonts-style-css' href='//fonts.googleapis.com/css?family=" . $fonts_final . "' type='text/css' media='all' />";
}

$title = (isset($parameteres['popup_parameters']['title'])) ? esc_attr($parameteres['popup_parameters']['title']) : '';
$wpb_height = (isset($parameteres['popup_parameters']['wpb_height'])) ? esc_attr($parameteres['popup_parameters']['wpb_height']) : 500;
$wpb_width = (isset($parameteres['popup_parameters']['wpb_width'])) ? esc_attr($parameteres['popup_parameters']['wpb_width']) : 500;
$wpb_popup_position = (isset($parameteres['popup_parameters']['wpb_popup_position'])) ? esc_attr($parameteres['popup_parameters']['wpb_popup_position']) : 'center-mid';
$wpb_mpopup_color = (isset($parameteres['popup_parameters']['wpb_mpopup_color'])) ? esc_attr($parameteres['popup_parameters']['wpb_mpopup_color']) : '';
$wpb_mpopup_image = (isset($parameteres['popup_parameters']['wpb_mpopup_image'])) ? esc_url($parameteres['popup_parameters']['wpb_mpopup_image']) : '';
$wpb_popup_animation_option = (isset($parameteres['popup_parameters']['wpb_popup_option'])) ? esc_attr($parameteres['popup_parameters']['wpb_popup_option']) : '';
$wpb_popup_animate_duration = (isset($parameteres['popup_parameters']['wpb_popup_animate_duration'])) ? esc_attr($parameteres['popup_parameters']['wpb_popup_animate_duration']) : '';
$wpb_popup_animate_delay = (isset($parameteres['popup_parameters']['wpb_popup_animate_delay'])) ? esc_attr($parameteres['popup_parameters']['wpb_popup_animate_delay']) : '';
$wpb_enable_overlay = (isset($parameteres['popup_parameters']['wpb_enable_overlay'])) ? esc_attr($parameteres['popup_parameters']['wpb_enable_overlay']) : 'off';
$wpb_overlay_color = (isset($parameteres['popup_parameters']['wpb_overlay_color'])) ? esc_attr($parameteres['popup_parameters']['wpb_overlay_color']) : '';
$wpb_upload_overlay_image = (isset($parameteres['popup_parameters']['wpb_upload_overlay_image'])) ? esc_attr($parameteres['popup_parameters']['wpb_upload_overlay_image']) : '';
$wpb_overlay_img_txt_repeat = (isset($parameteres['popup_parameters']['wpb_overlay_img_txt_repeat'])) ? esc_attr($parameteres['popup_parameters']['wpb_overlay_img_txt_repeat']) : '';
$overlay_type = (isset($parameteres['popup_parameters']['overlay_type'])) ? esc_attr($parameteres['popup_parameters']['overlay_type']) : '';
$wpb_overlay_link_click = (isset($parameteres['popup_parameters']['wpb_overlay_link_click'])) ? esc_attr($parameteres['popup_parameters']['wpb_overlay_link_click']) : '';
$wpb_popup_overlay_link = (isset($parameteres['popup_parameters']['wpb_popup_overlay_link'])) ? esc_attr($parameteres['popup_parameters']['wpb_popup_overlay_link']) : '';
$wpb_starting_date = (isset($parameteres['popup_parameters']['wpb_starting_date'])) ? esc_attr($parameteres['popup_parameters']['wpb_starting_date']) : '';
$wpb_ending_date = (isset($parameteres['popup_parameters']['wpb_ending_date'])) ? esc_attr($parameteres['popup_parameters']['wpb_ending_date']) : '';
$wpb_select_default_email = (isset($parameteres['popup_parameters']['wpb_select_default_email'])) ? esc_attr($parameteres['popup_parameters']['wpb_select_default_email']) : 'default';
$wpb_custom_admin_email = (isset($parameteres['popup_parameters']['wpb_custom_admin_email'])) ? esc_attr($parameteres['popup_parameters']['wpb_custom_admin_email']) : '';
$wpb_close_button_enable = (isset($parameteres['popup_parameters']['wpb_close'])) ? esc_attr($parameteres['popup_parameters']['wpb_close']) : '';
$wpb_autoclose_enable = (isset($parameteres['popup_parameters']['autoclose_enable'])) ? esc_attr($parameteres['popup_parameters']['autoclose_enable']) : '';
$wpb_close_countdown_time = (isset($parameteres['popup_parameters']['popup_close_countdown'])) ? esc_attr($parameteres['popup_parameters']['popup_close_countdown']) : '';
$wpb_show_countdown_message = (isset($parameteres['popup_parameters']['wpb_countdown_msg'])) ? esc_attr($parameteres['popup_parameters']['wpb_countdown_msg']) : '';
$wpb_close_countdown_msg = (isset($parameteres['popup_parameters']['close_countdown_msg'])) ? esc_attr($parameteres['popup_parameters']['close_countdown_msg']) : '';
$wpb_popup_shape = (isset($parameteres['popup_parameters']['wpb_popup_shape'])) ? esc_attr($parameteres['popup_parameters']['wpb_popup_shape']) : '';
$wpb_popup_border = (isset($parameteres['popup_parameters']['wpb_popup_border'])) ? esc_attr($parameteres['popup_parameters']['wpb_popup_border']) : '';
$wpb_border_type = (isset($parameteres['popup_parameters']['wpb_border_type'])) ? esc_attr($parameteres['popup_parameters']['wpb_border_type']) : '';
$wpb_border_size = (isset($parameteres['popup_parameters']['wpb_border_size'])) ? esc_attr($parameteres['popup_parameters']['wpb_border_size']) : '';
$wpb_border_color = (isset($parameteres['popup_parameters']['wpb_border_color'])) ? esc_attr($parameteres['popup_parameters']['wpb_border_color']) : '';
$added_date = (isset($parameteres['popup_parameters']['added_date'])) ? esc_attr($parameteres['popup_parameters']['added_date']) : '';
$disable_window_scroll = (isset($parameteres['popup_parameters']['disable_window_scroll'])) ? esc_attr($parameteres['popup_parameters']['disable_window_scroll']) : 'off';
$popup_random_number = (isset($parameteres['popup_parameters']['popup_random_val'])) ? esc_attr($parameteres['popup_parameters']['popup_random_val']) : (rand(10, 10000));
?>
<div class="wpb-outer-wrap wpb-default-popup-layout wpb-<?php echo $wpb_buildin_theme_type; ?>" id="wpb-outer-wrap-<?php echo esc_attr($popup_id); ?>" data-popup-id="<?php echo esc_attr($popup_id); ?>" 
     data-popup-title="<?php echo $title; ?>" data-load-delay="<?php if(isset($page_wise_popup_delay_time) && !empty($page_wise_popup_delay_time)){ echo $page_wise_popup_delay_time; }else if(isset($wpb_default_settings['popup_delay']) && !empty($wpb_default_settings['popup_delay'])){ esc_attr($wpb_default_settings['popup_delay']); } ?>" 
     data-scroll-offset="<?php if(isset($wpb_spopup_scroll_offset) && !empty($wpb_spopup_scroll_offset)){ echo esc_attr($wpb_spopup_scroll_offset); }else if(isset($wpb_default_settings['wpb_scroll_offset']) && !empty($wpb_default_settings['wpb_scroll_offset'])){ echo esc_attr($wpb_default_settings['wpb_scroll_offset']); }?>"
     data-idle-wait-period="<?php if(isset($wpb_ipopup_wait_period) && !empty($wpb_ipopup_wait_period) && $wpb_ipopup_wait_period != 'default'){echo  esc_attr($wpb_ipopup_wait_period);}else if(isset($wpb_default_settings['wpb_ideal_wait_period']) && !empty($wpb_default_settings['wpb_ideal_wait_period'])){echo esc_attr($wpb_default_settings['wpb_ideal_wait_period']); } ?>" 
     data-counter-enabled="<?php echo isset($wpb_autoclose_enable) ? esc_attr($wpb_autoclose_enable) : 'no'; ?>" 
     data-counter-message-enabled="<?php echo isset($wpb_show_countdown_message) ? esc_attr($wpb_show_countdown_message) : 'no'; ?>" data-counter-val="<?php echo isset($wpb_close_countdown_time) ? esc_attr($wpb_close_countdown_time) : ''; ?>" >
    <style type="text/css">
        .wpb-main-wrapper-<?php echo esc_attr($popup_random_number); ?>
        {
            border-radius: <?php echo ($wpb_popup_shape == 'rounded_corner') ? '10px' : '0px' ?>;
            <?php if ($wpb_theme_type == 'builtin' && $wpb_height != '' && $wpb_width != '' || $wpb_theme_type == 'builtin' && $wpb_height != '' || $wpb_theme_type == 'builtin' && $wpb_width != '') { ?>
                max-height:<?php echo esc_attr($wpb_height); ?>px;
                height: <?php echo esc_attr($wpb_height); ?>px;
                max-width:<?php echo esc_attr($wpb_width); ?>px;
                width:<?php echo esc_attr($wpb_width); ?>px;
                animation-duration:<?php echo!empty($wpb_popup_animate_duration) ? esc_attr($wpb_popup_animate_duration) : 1; ?>s;;
            <?php } ?>
            <?php if ($wpb_popup_position == 'center-left') { ?>
                top:50%;
                -moz- transform:translateY(-50%);   
                -webkit- transform:translateY(-50%);   
                transform:translateY(-50%); 
                left:0;
            <?php } else if ($wpb_popup_position == 'center-right') { ?>
                right: 0;
                top:50%;
                -moz- transform:translateY(-50%);   
                -webkit- transform:translateY(-50%);   
                transform:translateY(-50%); 
            <?php } else if ($wpb_popup_position == 'center-mid') { ?>
                right: 0;
                top:50%;
                -moz- transform:translateY(-50%);   
                -webkit- transform:translateY(-50%);   
                transform:translateY(-50%); 0; 
                left:0;
            <?php } else if ($wpb_popup_position == 'top-left') { ?>
                top: 0; left:0;
            <?php } else if ($wpb_popup_position == 'top-center') { ?>
                left: 0; top: 0; right: 0;
            <?php } else if ($wpb_popup_position == 'top-right') { ?>
                top: 0; right: 0;
            <?php } else if ($wpb_popup_position == 'bottom-center') { ?>
                left: 0; top: 0; right: 0;
            <?php } else if ($wpb_popup_position == 'bottom-right') { ?>
                bottom: 0; right: 0;
            <?php } else if ($wpb_popup_position == 'bottom-left') { ?>
                left: 0; bottom: 0;
            <?php } ?>
            <?php if ($wpb_popup_border == 'yes') { ?>
                border-style: <?php echo esc_attr($wpb_border_type); ?>;
                border-width: <?php
                echo $wpb_border_size;
                echo (strpos($wpb_border_size, 'px') == false) ? 'px' : '';
                ?>;
                <?php } ?>
                <?php if ($wpb_border_color != '') { ?>
                border-color : <?php echo esc_attr($wpb_border_color); ?>;
            <?php } ?>
            <?php if (!empty($wpb_mpopup_color)) { ?>
                background-color:<?php echo esc_attr($wpb_mpopup_color); ?>;
            <?php } ?>
            <?php if (!empty($wpb_mpopup_image)) { ?>
                background-image: url(<?php echo esc_url($wpb_mpopup_image); ?>);
            <?php } ?>
        }
        <?php if ($wpb_enable_overlay == 'on') { ?>
            .wpb_overlay-<?php echo $popup_random_number; ?>
            {
                opacity: <?php echo $overlay_type; ?>;
                <?php echo!empty($wpb_overlay_color) ? 'background-color:' . esc_attr($wpb_overlay_color) . ';' : ''; ?>
                background-image:url(<?php echo!empty($wpb_upload_overlay_image) ? esc_url($wpb_upload_overlay_image) : ''; ?>);
                background-repeat:<?php echo isset($wpb_overlay_img_txt_repeat) ? esc_attr($wpb_overlay_img_txt_repeat) : ''; ?>;
            }
        <?php } ?> 
        .wpb-main-wrapper-<?php echo $parameteres['popup_parameters']['popup_random_val']; ?>.wpb-builtin-popup{
            background-color:<?php echo isset($buildin_theme['buildin_popup']['wpb_builtin_rightbg_color']) && !empty($buildin_theme['buildin_popup']['wpb_builtin_rightbg_color']) ? esc_attr($buildin_theme['buildin_popup']['wpb_builtin_rightbg_color']) : '#ebebeb'; ?>;
            background-image:url('<?php echo isset($buildin_theme['buildin_popup']['wpb_builtin_rightbg_image']) && !empty($buildin_theme['buildin_popup']['wpb_builtin_rightbg_image']) ? esc_attr($buildin_theme['buildin_popup']['wpb_builtin_rightbg_image']) : ''; ?>');
        }
        .wpb-main-wrapper-<?php echo $parameteres['popup_parameters']['popup_random_val']; ?> .wpb-theme4-wrapper .wpb-left-content-title{
            font-family:<?php echo isset($buildin_theme['buildin_popup']['wpb_header_typography']) && !empty($buildin_theme['buildin_popup']['wpb_header_typography']) ? esc_attr($buildin_theme['buildin_popup']['wpb_header_typography']) : ''; ?>;
            font-size:<?php echo isset($buildin_theme['buildin_popup']['wpb_header_text_font_size']) && !empty($buildin_theme['buildin_popup']['wpb_header_text_font_size']) ? esc_attr($buildin_theme['buildin_popup']['wpb_header_text_font_size']) . 'px' : ''; ?>;
            color:<?php echo isset($buildin_theme['buildin_popup']['wpb_header_text_font_color']) && !empty($buildin_theme['buildin_popup']['wpb_header_text_font_color']) ? esc_attr($buildin_theme['buildin_popup']['wpb_header_text_font_color']) : ''; ?>;
            -webkit-animation-delay: <?php echo!empty($wpb_popup_animate_delay) ? esc_attr($wpb_popup_animate_delay + 0.25) : 1.25; ?>s; /* Safari 4.0 - 8.0 */
            animation-delay: <?php echo!empty($wpb_popup_animate_delay) ? esc_attr($wpb_popup_animate_delay + 0.25) : 1.25; ?>s; 
            animation-duration:1.5s; 
            -webkit-animation-duration: 1.5s; /* Safari 4.0 - 8.0 */
        }
        .wpb-main-wrapper-<?php echo $parameteres['popup_parameters']['popup_random_val']; ?> .wpb-theme4-wrapper .wpb-left-desc{
            font-family:<?php echo isset($buildin_theme['buildin_popup']['wpb_subheader_typography']) && !empty($buildin_theme['buildin_popup']['wpb_subheader_typography']) ? esc_attr($buildin_theme['buildin_popup']['wpb_subheader_typography']) : ''; ?>;
            font-size:<?php echo isset($buildin_theme['buildin_popup']['wpb_subheader_text_font_size']) && !empty($buildin_theme['buildin_popup']['wpb_subheader_text_font_size']) ? esc_attr($buildin_theme['buildin_popup']['wpb_subheader_text_font_size']) . 'px' : ''; ?>;
            color:<?php echo isset($buildin_theme['buildin_popup']['wpb_subheader_text_font_color']) && !empty($buildin_theme['buildin_popup']['wpb_subheader_text_font_color']) ? esc_attr($buildin_theme['buildin_popup']['wpb_subheader_text_font_color']) : ''; ?>;
            -webkit-animation-delay: <?php echo!empty($wpb_popup_animate_delay) ? esc_attr($wpb_popup_animate_delay + 0.5) : 1.5; ?>s; /* Safari 4.0 - 8.0 */
            animation-delay: <?php echo!empty($wpb_popup_animate_delay) ? esc_attr($wpb_popup_animate_delay + 0.5) : 1.5; ?>s; 
            animation-duration:1.5s; 
            -webkit-animation-duration: 1.5s; /* Safari 4.0 - 8.0 */
        }
        .wpb-main-wrapper-<?php echo $parameteres['popup_parameters']['popup_random_val']; ?> .wpb-theme4-wrapper .wpb-left-content-title span{
            font-family:<?php echo isset($buildin_theme['buildin_popup']['wpb_secondary_subheader_typography']) && !empty($buildin_theme['buildin_popup']['wpb_secondary_subheader_typography']) ? esc_attr($buildin_theme['buildin_popup']['wpb_secondary_subheader_typography']) : ''; ?>;
            font-size:<?php echo isset($buildin_theme['buildin_popup']['wpb_secondary_subheader_font_size']) && !empty($buildin_theme['buildin_popup']['wpb_secondary_subheader_font_size']) ? esc_attr($buildin_theme['buildin_popup']['wpb_secondary_subheader_font_size']) . 'px' : ''; ?>;
            color:<?php echo isset($buildin_theme['buildin_popup']['wpb_secondary_subheader_font_color']) && !empty($buildin_theme['buildin_popup']['wpb_secondary_subheader_font_color']) ? esc_attr($buildin_theme['buildin_popup']['wpb_secondary_subheader_font_color']) : ''; ?>;
            -webkit-animation-delay: <?php echo!empty($wpb_popup_animate_delay) ? esc_attr($wpb_popup_animate_delay + 0.75) : 1.75; ?>s; /* Safari 4.0 - 8.0 */
            animation-delay: <?php echo!empty($wpb_popup_animate_delay) ? esc_attr($wpb_popup_animate_delay + 0.75) : 1.75; ?>s; 
            animation-duration:1.5s; 
            -webkit-animation-duration: 1.5s; /* Safari 4.0 - 8.0 */
        }
        .wpb-main-wrapper-<?php echo $parameteres['popup_parameters']['popup_random_val']; ?> .wpb-theme4-wrapper input.wpb-left-text-field{
            -webkit-animation-delay: <?php echo!empty($wpb_popup_animate_delay) ? esc_attr($wpb_popup_animate_delay + 1.75) : 2.75; ?>s; /* Safari 4.0 - 8.0 */
            animation-delay: <?php echo!empty($wpb_popup_animate_delay) ? esc_attr($wpb_popup_animate_delay + 1.75) : 2.75; ?>s;
            animation-duration:1.5s; 
            -webkit-animation-duration: 1.5s; /* Safari 4.0 - 8.0 */
        }
        .wpb-main-wrapper-<?php echo $parameteres['popup_parameters']['popup_random_val']; ?> .wpb-theme4-wrapper .wpb-right-content{
            bottom: <?php echo isset($buildin_theme['buildin_popup']['wpb_builtin_main_image_top']) && !empty($buildin_theme['buildin_popup']['wpb_builtin_main_image_top']) ? esc_attr($buildin_theme['buildin_popup']['wpb_builtin_main_image_top']) : ''; ?>px;
            right: <?php echo isset($buildin_theme['buildin_popup']['wpb_builtin_main_image_left']) && !empty($buildin_theme['buildin_popup']['wpb_builtin_main_image_left']) ? esc_attr($buildin_theme['buildin_popup']['wpb_builtin_main_image_left']) : ''; ?>px;
            -webkit-animation-delay: <?php echo!empty($wpb_popup_animate_delay) ? esc_attr($wpb_popup_animate_delay + 1.75) : 2.75; ?>s; /* Safari 4.0 - 8.0 */
            animation-delay: <?php echo!empty($wpb_popup_animate_delay) ? esc_attr($wpb_popup_animate_delay + 1.75) : 2.75; ?>s;
            animation-duration:1.5s; 
            -webkit-animation-duration: 1.5s; /* Safari 4.0 - 8.0 */
        }
        .wpb-main-wrapper-<?php echo $parameteres['popup_parameters']['popup_random_val']; ?> .wpb-theme4-wrapper .wpb-theme4-form input[type="text"]::-moz-placeholder,
        .wpb-main-wrapper-<?php echo $parameteres['popup_parameters']['popup_random_val']; ?> .wpb-theme4-wrapper .wpb-theme4-form input[type="text"]{
            font-family:<?php echo isset($buildin_theme['buildin_popup']['wpb_email_placeholder_typography']) && !empty($buildin_theme['buildin_popup']['wpb_email_placeholder_typography']) ? esc_attr($buildin_theme['buildin_popup']['wpb_email_placeholder_typography']) : ''; ?>;
            color:<?php echo isset($buildin_theme['buildin_popup']['wpb_email_placeholder_font_color']) && !empty($buildin_theme['buildin_popup']['wpb_email_placeholder_font_color']) ? esc_attr($buildin_theme['buildin_popup']['wpb_email_placeholder_font_color']) . '!important' : ''; ?>;
        }
        .wpb-main-wrapper-<?php echo $parameteres['popup_parameters']['popup_random_val']; ?> .wpb-theme4-wrapper .wpb-theme4-form input[type="text"]:-ms-input-placeholder,
        .wpb-main-wrapper-<?php echo $parameteres['popup_parameters']['popup_random_val']; ?> .wpb-theme4-wrapper .wpb-theme4-form input[type="text"]{
            font-family:<?php echo isset($buildin_theme['buildin_popup']['wpb_email_placeholder_typography']) && !empty($buildin_theme['buildin_popup']['wpb_email_placeholder_typography']) ? esc_attr($buildin_theme['buildin_popup']['wpb_email_placeholder_typography']) : ''; ?>;
            color:<?php echo isset($buildin_theme['buildin_popup']['wpb_email_placeholder_font_color']) && !empty($buildin_theme['buildin_popup']['wpb_email_placeholder_font_color']) ? esc_attr($buildin_theme['buildin_popup']['wpb_email_placeholder_font_color']) . '!important' : ''; ?>;
        }
        .wpb-main-wrapper-<?php echo $parameteres['popup_parameters']['popup_random_val']; ?> .wpb-theme4-wrapper .wpb-theme4-form input[type="text"]::-webkit-input-placeholder,
        .wpb-main-wrapper-<?php echo $parameteres['popup_parameters']['popup_random_val']; ?> .wpb-theme4-wrapper .wpb-theme4-form input[type="text"]{
            font-family:<?php echo isset($buildin_theme['buildin_popup']['wpb_email_placeholder_typography']) && !empty($buildin_theme['buildin_popup']['wpb_email_placeholder_typography']) ? esc_attr($buildin_theme['buildin_popup']['wpb_email_placeholder_typography']) : ''; ?>;
            color:<?php echo isset($buildin_theme['buildin_popup']['wpb_email_placeholder_font_color']) && !empty($buildin_theme['buildin_popup']['wpb_email_placeholder_font_color']) ? esc_attr($buildin_theme['buildin_popup']['wpb_email_placeholder_font_color']) . '!important' : ''; ?> ;
        }
        .wpb-main-wrapper-<?php echo $parameteres['popup_parameters']['popup_random_val']; ?> .wpb-theme4-button{
            border-color: transparent <?php echo isset($buildin_theme['buildin_popup']['wpb_submit_button_bg_color']) && !empty($buildin_theme['buildin_popup']['wpb_submit_button_bg_color']) ? esc_attr($buildin_theme['buildin_popup']['wpb_submit_button_bg_color']) : ''; ?> transparent transparent;;
        }
        .wpb-main-wrapper-<?php echo $parameteres['popup_parameters']['popup_random_val']; ?> .wpb-theme4-wrapper .wpb-theme4-button{
            font-family:<?php echo isset($buildin_theme['buildin_popup']['wpb_submit_button_text_typography']) && !empty($buildin_theme['buildin_popup']['wpb_submit_button_text_typography']) ? esc_attr($buildin_theme['buildin_popup']['wpb_submit_button_text_typography']) : ''; ?>;
            background-color:<?php echo isset($buildin_theme['buildin_popup']['wpb_submit_button_bg_color']) && !empty($buildin_theme['buildin_popup']['wpb_submit_button_bg_color']) ? esc_attr($buildin_theme['buildin_popup']['wpb_submit_button_bg_color']) : '#999999'; ?>;     
            color:<?php echo isset($buildin_theme['buildin_popup']['wpb_submit_button_text_font_color']) && !empty($buildin_theme['buildin_popup']['wpb_submit_button_text_font_color']) ? esc_attr($buildin_theme['buildin_popup']['wpb_submit_button_text_font_color']) : ''; ?>;
            -webkit-animation-delay: <?php echo!empty($wpb_popup_animate_delay) ? esc_attr($wpb_popup_animate_delay + 1.5) : 2.5; ?>s; /* Safari 4.0 - 8.0 */
            animation-delay: <?php echo!empty($wpb_popup_animate_delay) ? esc_attr($wpb_popup_animate_delay + 1.5) : 2.5; ?>s;
            animation-duration:1.5s; 
            -webkit-animation-duration: 1.5s; /* Safari 4.0 - 8.0 */
        }
        .wpb-main-wrapper-<?php echo $parameteres['popup_parameters']['popup_random_val']; ?> .wpb-theme4-wrapper .wpb-theme4-button:before{
            color:<?php echo isset($buildin_theme['buildin_popup']['wpb_email_icon_color']) && !empty($buildin_theme['buildin_popup']['wpb_email_icon_color']) ? esc_attr($buildin_theme['buildin_popup']['wpb_email_icon_color']) : ''; ?>; 
        }
        .wpb-main-wrapper-<?php echo $parameteres['popup_parameters']['popup_random_val']; ?> .wpb-theme-checkbox{
            font-family:<?php echo isset($buildin_theme['buildin_popup']['wpb_popup_once_text_typography']) && !empty($buildin_theme['buildin_popup']['wpb_popup_once_text_typography']) ? esc_attr($buildin_theme['buildin_popup']['wpb_popup_once_text_typography']) : ''; ?>;
            color:<?php echo isset($buildin_theme['buildin_popup']['wpb_popup_once_text_color']) && !empty($buildin_theme['buildin_popup']['wpb_popup_once_text_color']) ? esc_attr($buildin_theme['buildin_popup']['wpb_popup_once_text_color']) : ''; ?>!important; 
            -webkit-animation-delay: <?php echo!empty($wpb_popup_animate_delay) ? esc_attr($wpb_popup_animate_delay + 1.25) : 2.25; ?>s; /* Safari 4.0 - 8.0 */
            animation-delay: <?php echo!empty($wpb_popup_animate_delay) ? esc_attr($wpb_popup_animate_delay + 1.25) : 2.25; ?>s;
            animation-duration:1.5s; 
            -webkit-animation-duration: 1.5s; /* Safari 4.0 - 8.0 */
        }
        .wpb-main-wrapper-<?php echo $parameteres['popup_parameters']['popup_random_val']; ?> .wpb_close_btn.wpb-close-option:after{
            color:<?php echo isset($parameteres['popup_parameters']['wpb_close_icon_color']) && !empty($parameteres['popup_parameters']['wpb_close_icon_color']) ? esc_attr($parameteres['popup_parameters']['wpb_close_icon_color']) : ''; ?>;
        }
        .wpb-main-wrapper-<?php echo $parameteres['popup_parameters']['popup_random_val']; ?> .wpb-slanted-button{
            border-color: transparent <?php echo isset($parameteres['popup_parameters']['wpb_close_icon_bg_color']) && !empty($parameteres['popup_parameters']['wpb_close_icon_bg_color']) ? esc_attr($parameteres['popup_parameters']['wpb_close_icon_bg_color']) : ''; ?>  transparent transparent;  
        }
        .wpb-main-wrapper-<?php echo $parameteres['popup_parameters']['popup_random_val']; ?> .wpb-theme4-wrapper .wpb-fe-form-field.required.wpb-input-field-error{
            border-color:red !important;
        }
    </style>
    <div class="wpb-main-wrapper-<?php echo $parameteres['popup_parameters']['popup_random_val']; ?> wpb-popup-wrapp wpb-hidden-popup wpb-<?php echo $wpb_theme_type; ?>-popup" style="display:none;">
        <div class="wpb-main-inner-wrap animated <?php echo $wpb_popup_animation_option; ?>">
            <?php
            if (isset($wpb_close_button_enable) && $wpb_close_button_enable == 'enable') {
                echo '<div class="wpb_close_btn wpb-close-option wpb-' . esc_attr($wpb_buildin_theme_type) . '-close-button"></div><div class="wpb-slanted-button"></div><div class="clear"></div>';
            }
            ?>
            <div class="wpb-inner-wrapper" style="position:relative;"> 
                <div class="wpb-popup-content">
                    <form action="#" class="wpb-contact-form" name="wpb-custom-form-submission" id="<?php
                    if (isset($parameteres['popup_parameters']['wpb_form_type'])) {
                        echo esc_attr($parameteres['popup_parameters']['wpb_form_type']);
                    } else {
                        echo 'opt-in-subscripton';
                    }
                    ?>">
                        <div class="wpb-theme4-wrapper">
                            <div class="wpb-theme4-inner-wrapper">
                                <div class="wpb-left-content">
                                    <div class="wpb-left-inner-content">
                                        <p class="wpb-left-content-title animated fadeInDown"><?php echo isset($buildin_theme['buildin_popup']['wpb_header_text']) && !empty($buildin_theme['buildin_popup']['wpb_header_text']) ? esc_attr($buildin_theme['buildin_popup']['wpb_header_text']) : ''; ?></p>
                                        <p class="wpb-left-desc animated fadeInLeft"><?php echo isset($buildin_theme['buildin_popup']['wpb_subheader_text']) && !empty($buildin_theme['buildin_popup']['wpb_subheader_text']) ? esc_attr($buildin_theme['buildin_popup']['wpb_subheader_text']) : '' ?> <span class="animated fadeInRight"><?php echo isset($buildin_theme['buildin_popup']['wpb_secondary_subheader_text']) && !empty($buildin_theme['buildin_popup']['wpb_secondary_subheader_text']) ? esc_attr($buildin_theme['buildin_popup']['wpb_secondary_subheader_text']) : ''; ?></span></p>
                                        <div class="wpb-theme4-form">
                                            <div class="wpb-left-input-field">
                                                <input class="wpb-left-text-field wpb-fe-form-field wpb-email-field required animated fadeIn" type="text" name="wpb_email_address" placeholder="<?php echo isset($buildin_theme['buildin_popup']['wpb_email_placeholder']) && !empty($buildin_theme['buildin_popup']['wpb_email_placeholder']) ? esc_attr($buildin_theme['buildin_popup']['wpb_email_placeholder']) : ''; ?>">
                                                <?php if (isset($buildin_theme['buildin_popup']['wpb_popup_once_text']) && !empty($buildin_theme['buildin_popup']['wpb_popup_once_text'])) { ?>
                                                    <div class="wpb-theme-checkbox animated fadeIn">
                                                        <input class="wpb-popup-checkbox" type="checkbox" name="wpb-check"><?php echo isset($buildin_theme['buildin_popup']['wpb_popup_once_text']) && !empty($buildin_theme['buildin_popup']['wpb_popup_once_text']) ? esc_attr($buildin_theme['buildin_popup']['wpb_popup_once_text']) : '' ?>
                                                    </div>
                                                <?php } ?>
                                                <button class="wpb-theme4-button wpb-subscribe-button animated fadeInUp <?php
                                                if (isset($parameteres['popup_parameters']['wpb_form_type']) && $parameteres['popup_parameters']['wpb_form_type'] == 'inbuild-form') {
                                                    echo 'wpb-submit-button';
                                                } else if (isset($parameteres['popup_parameters']['wpb_form_type']) && $parameteres['popup_parameters']['wpb_form_type'] == 'external-subscription' || $parameteres['popup_parameters']['wpb_form_type'] == 'opt-in-subscripton') {
                                                    echo 'wpb-builtin-submit-button';
                                                } else {
                                                    echo 'opt-in-subscripton';
                                                }
                                                ?>" data-button-action="<?php echo!empty($buildin_theme['buildin_popup']["submit_click_event"]) ? $buildin_theme['buildin_popup']["submit_click_event"] : "";
                                                ?>" data-button-submit-load="<?php echo!empty($buildin_theme['buildin_popup']["wpb_submit_button_loading_text"]) ? $buildin_theme['buildin_popup']["wpb_submit_button_loading_text"] : "<i class='fa fa-spinner fa-spin'></i>";
                                                ?>" data-button-thanks="<?php echo!empty($buildin_theme['buildin_popup']["wpb_submit_button_thanks_text"]) ? $buildin_theme['buildin_popup']["wpb_submit_button_thanks_text"] : __('Thank You', 'wp-popup-lite');
                                                ?>" data-button-error="<?php echo!empty($buildin_theme["submit_button_error_text"]) ? $buildin_theme["submit_button_error_text"] : __('Oh snap!', 'wp-popup-lite');
                                                ?>" data-button-success-message="<?php echo!empty($buildin_theme["submit_success_message"]) ? $buildin_theme["submit_success_message"] : __('Form successfully submitted', 'wp-popup-lite');
                                                ?>" data-button-error-message="<?php echo!empty($buildin_theme["submit_failure_message"]) ? $buildin_theme["submit_failure_message"] : __('Something went wrong. Please try again.', 'wp-popup-lite');
                                                ?>" data-submit-redirect="<?php echo!empty($buildin_theme['buildin_popup']["submit_click_event_link"]) ? $buildin_theme['buildin_popup']["submit_click_event_link"] : '';
                                                ?>" ><?php echo isset($buildin_theme['buildin_popup']['wpb_submit_text']) && !empty($buildin_theme['buildin_popup']['wpb_submit_text']) ? esc_attr($buildin_theme['buildin_popup']['wpb_submit_text']) : ''; ?></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="wpb-right-content animated bounceIn">
                                    <?php if (isset($buildin_theme['buildin_popup']['wpb_builtin_main_image']) && !empty($buildin_theme['buildin_popup']['wpb_builtin_main_image'])) { ?>
                                        <img src="<?php echo isset($buildin_theme['buildin_popup']['wpb_builtin_main_image']) && !empty($buildin_theme['buildin_popup']['wpb_builtin_main_image']) ? esc_url($buildin_theme['buildin_popup']['wpb_builtin_main_image']) : WPP_IMAGE_DIR . '/temp-4.png'; ?>">
                                    <?php } ?>
                                </div>           
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <span class="wpb-form-message"></span>
        </div>
    </div>
    <?php
    if ($wpb_enable_overlay == 'on') {
        if ($wpb_overlay_link_click == 'add-link') {
            echo '<a href="' . esc_url($wpb_popup_overlay_link) . '">';
        }
        ?>
        <div class="wpb_overlay <?php
        if ($wpb_overlay_link_click == 'close-popup') {
            echo 'wpb-close-option';
        }
        ?> wpb_overlay-<?php echo esc_attr($popup_random_number); ?>" id="wpb-overlay-<?php echo esc_attr($popup_id); ?>" data-overlay-close="<?php echo esc_attr($wpb_overlay_link_click); ?>" style="display:none" ></div>
        <?php
        if ($wpb_overlay_link_click == 'add-link') {
            echo '</a>';
        }
        ?>
    <?php } ?>
</div>           