<?php
defined('ABSPATH') or die("No direct script allowed!!!");

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

<div class="wpb-outer-wrap wpb-custom-popup-layout" id="wpb-outer-wrap-<?php echo esc_attr($popup_id); ?>" data-popup-id="<?php echo esc_attr($popup_id); ?>" data-popup-title="<?php echo $title; ?>" data-load-delay="<?php echo!empty($page_wise_popup_delay_time) ? esc_attr($page_wise_popup_delay_time) : esc_attr($wpb_default_settings['popup_delay']); ?>" 
     data-scroll-offset="<?php echo!empty($wpb_spopup_scroll_offset) ? esc_attr($wpb_spopup_scroll_offset) : esc_attr($wpb_default_settings['wpb_scroll_offset']); ?>"
     data-idle-wait-period="<?php echo!empty($wpb_ipopup_wait_period) && $wpb_ipopup_wait_period != 'default' ? esc_attr($wpb_ipopup_wait_period) : esc_attr($wpb_default_settings['wpb_ideal_wait_period']); ?>" data-counter-enabled="<?php echo isset($wpb_autoclose_enable) ? esc_attr($wpb_autoclose_enable) : 'no'; ?>" data-counter-message-enabled="<?php echo isset($wpb_show_countdown_message) ? esc_attr($wpb_show_countdown_message) : 'no'; ?>" data-counter-val="<?php echo isset($wpb_close_countdown_time) ? esc_attr($wpb_close_countdown_time) : ''; ?>" >
         <?php
         foreach ($custom_generated_popup as $element_key => $element_val) {
             if ($element_key != 0) {
                 $font_family = isset($element_val['typography']) ? esc_attr($element_val['typography']) : 'inline';
                 if ($font_family != 'default' && $font_family != '' && $font_family != 'inline') {
                     $fonts_final = str_replace(' ', '+', $font_family);
                     ?>
                <link rel='stylesheet' id='wpb-google-fonts-style-css' href='//fonts.googleapis.com/css?family=<?php echo $fonts_final; ?>' type='text/css' media='all' /> 
                <?php
            }
        }
    }
    //include('custom-generator-css.php');  
    ?>
    <style type="text/css">
        .wpb-main-wrapper-<?php echo esc_attr($popup_random_number); ?>
        {
            border-radius: <?php echo ($wpb_popup_shape == 'rounded_corner') ? '10px' : '0px' ?>;
            <?php if ($wpb_theme_type == 'custom' && $wpb_height != '' && $wpb_width != '' || $wpb_theme_type == 'custom' && $wpb_height != '' || $wpb_theme_type == 'custom' && $wpb_width != '') { ?>
                max-height:<?php echo esc_attr($wpb_height); ?>px;
                height: <?php echo esc_attr($wpb_height); ?>px;
                max-width:<?php echo esc_attr($wpb_width); ?>px;
                width:<?php echo esc_attr($wpb_width); ?>px;
                animation-duration:<?php echo!empty($wpb_popup_animate_duration) ? esc_attr($wpb_popup_animate_duration) : 1; ?>s;;
            <?php } ?>
            <?php if ($wpb_popup_position == 'center-left') { ?>
                left: 0; bottom: 0; top: 0;
            <?php } else if ($wpb_popup_position == 'center-right') { ?>
                right: 0; bottom: 0; top: 0;
            <?php } else if ($wpb_popup_position == 'center-mid') { ?>
                right: 0; bottom: 0; top: 0; left:0;
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
            <?php } else { ?>
                right: 0; bottom: 0; top: 0; left:0;
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
            <?php
        }
        foreach ($custom_generated_popup as $element_key => $element_val) {
            if ($element_key != 0) {
                switch ($element_val['element_field_type']) {
                    case 'normal_text':
                        ?>
                        .wpb-main-wrapper-<?php echo $popup_random_number; ?> .wpb-pp-normal_text-<?php echo $element_key; ?>-<?php echo $element_val['element_field_rand_val']; ?>
                        {
                            position:absolute;
                            top: <?php echo!empty($element_val['element_top']) ? $element_val['element_top'] : 0; ?>px;
                            left: <?php echo!empty($element_val['element_left']) ? $element_val['element_left'] : 0; ?>px;
                            z-index: <?php echo!empty($element_val['z_index']) ? $element_val['z_index'] : '100'; ?>; 
                            width: <?php echo!empty($element_val['element_width']) ? $element_val['element_width'] : 140; ?>px;
                            height: <?php echo!empty($element_val['element_height']) ? $element_val['element_height'] : 60; ?>px;
                            font-family: <?php echo $element_val['typography'] != 'default' ? $element_val['typography'] : 'inherit'; ?>;
                            font-size: <?php echo $element_val['font_size'] != '' ? $element_val['font_size'] . 'px' : 'inherit'; ?>;
                            color: <?php echo!empty($element_val['font_color']) ? $element_val['font_color'] : 'inherit'; ?>;
                            font-weight: <?php echo $element_val['font_weight']; ?>;
                            text-align:<?php echo(isset($element_val['text_align'])) ? esc_attr($element_val['text_align']) : 'left'; ?>;
                            border:<?php echo(isset($element_val['border_type'])) ? esc_attr($element_val['border_type']) : ''; ?> <?php echo(isset($element_val['element_border_color'])) ? esc_attr($element_val['element_border_color']) : ''; ?>;
                            border-radius:<?php echo(isset($element_val['border_radius'])) ? esc_attr($element_val['border_radius']) . 'px' : ''; ?>;
                            border-width:<?php echo(isset($element_val['border_width'])) ? esc_attr($element_val['border_width']) . 'px' : ''; ?>;
                            background-color: <?php echo!empty($element_val['background_color']) ? $element_val['background_color'] : ''; ?>;
                            background-image:url(<?php echo $element_val['background_image']; ?>); 
                            background-repeat: <?php echo $element_val['background_image_repeat']; ?>;              
                            opacity: <?php echo!empty($element_val['background_opacity']) ? $element_val['background_opacity'] : '1'; ?>;
                            <?php if (!empty($element_val['animate_duration'])) { ?>
                                animation-duration:<?php echo $element_val['animate_duration']; ?>s;
                                <?php
                            }
                            ?>;
                            <?php if (!empty($element_val['animate_delay'])) { ?>
                                animation-delay:<?php echo $element_val['animate_delay']; ?>s;
                                <?php
                            }
                            ?>;
                            text-align: center;
                        }
                        <?php
                        break;
                    case 'submit_button':
                        ?>
                        .wpb-main-wrapper-<?php echo $popup_random_number; ?> .wpb-pp-submit_button-<?php echo $element_key; ?>-<?php echo $element_val['element_field_rand_val']; ?> .wpb-custom-button
                        {
                            position:absolute;
                            top: <?php echo!empty($element_val['element_top']) ? esc_attr($element_val['element_top']) : 0; ?>px;
                            left: <?php echo!empty($element_val['element_left']) ? esc_attr($element_val['element_left']) : 0; ?>px;
                            z-index: <?php echo!empty($element_val['z_index']) ? esc_attr($element_val['z_index']) : '100'; ?>; 
                            width: <?php echo!empty($element_val['element_width']) ? esc_attr($element_val['element_width']) : 138; ?>px;
                            height: <?php echo!empty($element_val['element_height']) ? esc_attr($element_val['element_height']) : 51; ?>px;
                            font-family: <?php echo $element_val['typography'] != 'default' ? esc_attr($element_val['typography']) : 'inherit'; ?>;
                            font-size: <?php echo $element_val['font_size'] != '' ? esc_attr($element_val['font_size']) . 'px' : 'inherit'; ?>;
                            color: <?php echo!empty($element_val['font_color']) ? esc_attr($element_val['font_color']) : '#fffff'; ?>;
                            font-weight: <?php echo $element_val['font_weight']; ?>;
                            text-align: <?php echo $element_val['text_align']; ?>;
                            border:<?php echo(isset($element_val['border_type'])) ? esc_attr($element_val['border_type']) : ''; ?> <?php echo(isset($element_val['element_border_color'])) ? esc_attr($element_val['element_border_color']) : ''; ?>;
                            border-radius:<?php echo(isset($element_val['border_radius'])) ? esc_attr($element_val['border_radius']) . 'px' : ''; ?>;
                            -moz-border-radius: <?php echo(isset($element_val['border_radius'])) ? esc_attr($element_val['border_radius']) . 'px' : ''; ?>;
                            -webkit-border-radius: <?php echo(isset($element_val['border_radius'])) ? esc_attr($element_val['border_radius']) . 'px' : ''; ?>;
                            border-width:<?php echo(isset($element_val['border_width'])) ? esc_attr($element_val['border_width']) . 'px' : ''; ?>;
                            background-color: <?php echo!empty($element_val['background_color']) ? $element_val['background_color'] : '#222'; ?>;
                            background-image:url(<?php echo $element_val['background_image']; ?>); 
                            background-repeat: <?php echo $element_val['background_image_repeat']; ?>;              
                            opacity: <?php echo!empty($element_val['background_opacity']) ? $element_val['background_opacity'] : '1'; ?>;
                            <?php if (!empty($element_val['animate_duration'])) { ?>
                                animation-duration:<?php echo $element_val['animate_duration']; ?>s;
                                <?php
                            }
                            ?>;
                            <?php if (!empty($element_val['animate_delay'])) { ?>
                                animation-delay:<?php echo $element_val['animate_delay']; ?>s;
                                <?php
                            }
                            ?>;
                        }
                        .wpb-main-wrapper-<?php echo $popup_random_number; ?> .wpb-pp-submit_button-<?php echo $element_key; ?>-<?php echo $element_val['element_field_rand_val']; ?> .wpb-submit-button:hover{
                            background-color:<?php echo $element_val['background_color_hover']; ?>;
                        }
                        .wpb-main-wrapper-<?php echo $popup_random_number; ?> .wpb-pp-submit_button-<?php echo $element_key; ?>-<?php echo $element_val['element_field_rand_val']; ?> button:focus{
                            outline:none;    
                        }
                        .wpb-main-wrapper-<?php echo $popup_random_number; ?> .wpb-pp-submit_button-<?php echo $element_key; ?>-<?php echo $element_val['element_field_rand_val']; ?> button{
                            text-transform:none;
                        }
                        <?php
                        break;
                    case 'pdf':
                        ?>
                        .wpb-main-wrapper-<?php echo $popup_random_number; ?> .wpb-pp-pdf-<?php echo $element_key; ?>-<?php echo $element_val['element_field_rand_val']; ?>
                        {
                            position:absolute;
                            top: <?php echo!empty($element_val['element_top']) ? esc_attr($element_val['element_top']) : 0; ?>px;
                            left: <?php echo!empty($element_val['element_left']) ? esc_attr($element_val['element_left']) : 0; ?>px;
                            z-index: <?php echo!empty($element_val['z_index']) ? esc_attr($element_val['z_index']) : ''; ?>; 
                            width: <?php echo esc_attr($element_val['element_width']); ?>px;
                            height: <?php echo esc_attr($element_val['element_height']); ?>px;
                            <?php if (!empty($element_val['animate_duration'])) { ?>
                                animation-duration:<?php echo esc_attr($element_val['animate_duration']); ?>s;
                                <?php
                            }
                            ?>;
                            <?php if (!empty($element_val['animate_delay'])) { ?>
                                animation-delay:<?php echo esc_attr($element_val['animate_delay']); ?>s;
                                <?php
                            }
                            ?>;
                        }
                        <?php
                        break;
                    case 'image':
                        ?>
                        .wpb-main-wrapper-<?php echo $popup_random_number; ?> .wpb-pp-image-<?php echo $element_key; ?>-<?php echo $element_val['element_field_rand_val']; ?>
                        {
                            position:absolute;
                            top: <?php echo!empty($element_val['element_top']) ? esc_attr($element_val['element_top']) : 0; ?>px;
                            left: <?php echo!empty($element_val['element_left']) ? esc_attr($element_val['element_left']) : 0; ?>px;
                            z-index: <?php echo!empty($element_val['z_index']) ? esc_attr($element_val['z_index']) : ''; ?>;
                            <?php if (!empty($element_val['animate_duration'])) { ?>
                                animation-duration:<?php echo esc_attr($element_val['animate_duration']); ?>s;
                                <?php
                            }
                            ?>;
                            <?php if (!empty($element_val['animate_delay'])) { ?>
                                animation-delay:<?php echo esc_attr($element_val['animate_delay']); ?>s;
                                <?php
                            }
                            ?>;
                        }
                        .wpb-main-wrapper-<?php echo $popup_random_number; ?> .wpb-pp-image-<?php echo $element_key; ?> img
                        {
                            width: <?php echo esc_attr($element_val['element_width']); ?>px;
                            height: <?php echo esc_attr($element_val['element_height']); ?>px;
                        }
                        <?php
                        break;
                    case 'youtube_video_embed':
                        ?>
                        .wpb-main-wrapper-<?php echo $popup_random_number; ?> .wpb-pp-youtube_video_embed-<?php echo $element_key; ?>-<?php echo $element_val['element_field_rand_val']; ?>
                        {
                            position:absolute;
                            top: <?php echo!empty($element_val['element_top']) ? esc_attr($element_val['element_top']) : 0; ?>px;
                            left: <?php echo!empty($element_val['element_left']) ? esc_attr($element_val['element_left']) : 0; ?>px;
                            z-index: <?php echo!empty($element_val['z_index']) ? esc_attr($element_val['z_index']) : ''; ?>; 
                            width: <?php echo esc_attr($element_val['element_width']); ?>px;
                            height: <?php echo esc_attr($element_val['element_height']); ?>px;
                            <?php if (!empty($element_val['animate_duration'])) { ?>
                                animation-duration:<?php echo esc_attr($element_val['animate_duration']); ?>s;
                                <?php
                            }
                            ?>;
                            <?php if (!empty($element_val['animate_delay'])) { ?>
                                animation-delay:<?php echo esc_attr($element_val['animate_delay']); ?>s;
                                <?php
                            }
                            ?>;
                        }
                        <?php
                        break;
                    case 'facebook_like':
                        ?>
                        .wpb-main-wrapper-<?php echo $popup_random_number; ?> .wpb-pp-facebook_like-<?php echo $element_key; ?>-<?php echo $element_val['element_field_rand_val']; ?>
                        {
                            position:absolute;
                            top: <?php echo!empty($element_val['element_top']) ? esc_attr($element_val['element_top']) : 0; ?>px;
                            left: <?php echo!empty($element_val['element_left']) ? esc_attr($element_val['element_left']) : 0; ?>px;
                            z-index: <?php echo!empty($element_val['z_index']) ? esc_attr($element_val['z_index']) : '100'; ?>; 
                            width: <?php echo esc_attr($element_val['element_width']); ?>px;
                            height: <?php echo esc_attr($element_val['element_height']); ?>px;
                            <?php if (!empty($element_val['animate_duration'])) { ?>
                                animation-duration:<?php echo esc_attr($element_val['animate_duration']); ?>s;
                                <?php
                            }
                            ?>;
                            <?php if (!empty($element_val['animate_delay'])) { ?>
                                animation-delay:<?php echo esc_attr($element_val['animate_delay']); ?>s;
                                <?php
                            }
                            ?>;
                        }
                        <?php
                        break;
                    default:
                }
            }
        }
        ?>
        <?php if ($disable_window_scroll == 'on') { ?>
            body{
                overflow:hidden;
            }  
        <?php } ?>
        .wpb-main-wrapper-<?php echo $popup_random_number; ?> .wpb-pp-fe-content .wpb-input-field-error{
            border-color:red !important;
        }
    </style>
    <div class="wpb-main-wrapper-<?php echo $parameteres['popup_parameters']['popup_random_val']; ?> wpb-popup-wrapp wpb-hidden-popup wpb-<?php echo $wpb_theme_type; ?>-popup animated <?php echo $wpb_popup_animation_option; ?>" style="display:none;">
        <?php
        if ($wpb_close_button_enable == 'enable') {
            echo '<div class="wpb_close_btn wpb-close-option"></div><div class="clear"></div>';
        }
        ?>
        <div class="wpb-inner-wrapper" style="position:relative;"> 
            <div class="wpb-popup-content">
                <form action="#" class="wpb-contact-form" name="wpb-custom-form-submission" id="inbuild-form">
                    <?php
                    if ($wpb_theme_type == 'custom') {
                        foreach ($custom_generated_popup as $element_key => $element_val) {
                            if ($element_key != 0) {
                                switch ($element_val['element_field_type']) {
                                    case 'normal_text':
                                        ?>
                                        <div class="wpb-pp-fe-content wpb-pp-<?php echo $element_val['element_field_type']; ?>-<?php echo $element_key; ?>-<?php echo $element_val['element_field_rand_val']; ?> animated <?php echo $element_val['animation']; ?>" data-animation="<?php echo $element_val['animation']; ?>">
                                            <div class="wpb-pp-table-content">
                                                <p><?php echo (!empty($element_val['normal_text'])) ? $element_val['normal_text'] : 'Lorem Isum Dolar et.'; ?></p>
                                            </div>
                                        </div>
                                        <?php
                                        break;
                                    case 'submit_button';
                                        if (isset($element_val['submit_click_event']) && $element_val['submit_click_event'] == 'default') {
                                            $submit_action = 'submit-and-close';
                                        } else if (isset($element_val['submit_click_event']) && $element_val['submit_click_event'] == 'close') {
                                            $submit_action = 'close';
                                        } else if (isset($element_val['submit_click_event']) && $element_val['submit_click_event'] == 'do-nothing') {
                                            $submit_action = 'do-nothing';
                                        } else if (isset($element_val['submit_click_event']) && $element_val['submit_click_event'] == 'add-link') {
                                            $submit_action = '<a href="' . esc_url($element_val['submit_click_event_link']) . '" target="blank"';
                                        } else {
                                            $submit_action = 'submit-and-close';
                                        }
                                        ?>
                                        <div class="wpb-pp-fe-content wpb-pp-<?php echo $element_val['element_field_type']; ?>-<?php echo $element_key; ?>-<?php echo $element_val['element_field_rand_val']; ?> animated <?php echo $element_val['animation']; ?>" data-animation="<?php echo $element_val['animation']; ?>">
                                            <div class="wpb-pp-table-content"> 
                                                <button name="submit" value="<?php echo!empty($element_val['submit_button_title']) ?: 'Submit'; ?>" class="<?php
                                                if (!empty($submit_action) && $submit_action == 'close') {
                                                    echo 'wpb-custom-button wpb_close_btn';
                                                } else {
                                                    echo 'wpb-custom-button wpb-submit-button';
                                                }
                                                ?>" 
                                                        data-button-submit-load="<?php echo!empty($element_val["submit_button_loading_text"]) ? esc_attr($element_val["submit_button_loading_text"]) : "<i class='fa fa-spinner fa-spin'></i>";
                                                ?>" data-button-action="<?php echo $submit_action; ?>" data-button-thanks="<?php echo!empty($element_val["submit_button_thanks_text"]) ? esc_attr($element_val["submit_button_thanks_text"]) : __('Thank You', 'wp-popup-lite');
                                                ?>" data-button-error="<?php echo!empty($element_val["submit_button_error_text"]) ? esc_attr($element_val["submit_button_error_text"]) : __('Oh snap!', 'wp-popup-lite');
                                                ?>" data-button-success-message="<?php echo!empty($element_val["submit_success_message"]) ? esc_attr($element_val["submit_success_message"]) : __('Form Successfully Submitted', 'wp-popup-lite');
                                                ?>" data-button-error-message="<?php echo!empty($element_val["submit_failure_message"]) ? esc_attr($element_val["submit_failure_message"]) : __('Something went wrong. Please try again.', 'wp-popup-lite');
                                                ?>"/><?php echo $element_val['submit_button_title']; ?></button>
                                            </div>
                                        </div>
                                        <?php
                                        break;
                                    case 'image';
                                        ?>
                                        <div class="wpb-pp-fe-content wpb-pp-<?php echo $element_val['element_field_type']; ?>-<?php echo $element_key; ?>-<?php echo esc_attr($element_val['element_field_rand_val']); ?> animated <?php echo esc_attr($element_val['animation']); ?>" data-animation="<?php echo esc_attr($element_val['animation']); ?>">
                                            <div class="wpb-pp-table-content <?php
                                            if (isset($element_val['image_click_event']) && $element_val['image_click_event'] == 'close') {
                                                echo 'wpb_close_btn';
                                            }
                                            ?>">
                                                <img src="<?php
                                                if (!empty($element_val['image_url'])) {
                                                    echo esc_url($element_val['image_url']);
                                                } else {
                                                    echo WPP_IMAGE_DIR . '/img-placeholder.png';
                                                }
                                                ?>" <?php if (isset($element_val['image_click_event']) && $element_val['image_click_event'] == 'add-link') { ?>
                                                         onclick="window.location.href = '<?php echo esc_url($element_val['image_click_event_link']); ?>'" 
                                                     <?php } ?>/>
                                            </div>
                                        </div>
                                        <?php
                                        break;
                                    case 'pdf':
                                        ?>
                                        <div class="wpb-pp-fe-content wpb-pp-<?php echo $element_val['element_field_type']; ?>-<?php echo $element_key; ?>-<?php echo esc_attr($element_val['element_field_rand_val']); ?> animated <?php echo esc_attr($element_val['animation']); ?>" data-animation="<?php echo esc_attr($element_val['animation']); ?>">
                                            <div class="wpb-pp-table-content"> 
                                                <iframe class="wpb-inner-element-iframe" style="height:<?php echo!empty($element_val['element_height']) ? esc_attr($element_val['element_height']) . 'px' : '500px'; ?>; width:<?php echo!empty($element_val['element_width']) ? esc_attr($element_val['element_width']) . 'px' : '500px'; ?>;" src="<?php echo!empty($element_val['pdf_file_url']) ? esc_url($element_val['pdf_file_url']) : 'http://www.pdf995.com/samples/pdf.pdf'; ?>"></iframe>
                                            </div>
                                        </div>
                                        <?php
                                        break;
                                    case 'youtube_video_embed':
                                        $video_url = !empty($element_val['video_url']) ? esc_url($element_val['video_url']) : '';
                                        if (!empty($video_url)) {
                                            // break the URL into its components
                                            $parts = parse_url(esc_url($element_val['video_url']));

                                            // $parts['query'] contains the query string: 'v=Z29MkJdMKqs&feature=grec_index'
                                            // parse variables into key=>value array
                                            $query = array();
                                            parse_str($parts['query'], $query);
                                            ?>
                                            <div class="wpb-pp-fe-content wpb-pp-<?php echo esc_attr($element_val['element_field_type']); ?>-<?php echo $element_key; ?>-<?php echo esc_attr($element_val['element_field_rand_val']); ?> animated <?php echo esc_attr($element_val['animation']); ?>" data-animation="<?php echo esc_attr($element_val['animation']); ?>">
                                                <div class="wpb-pp-table-content"> 
                                                    <iframe width="<?php echo $element_val['element_width']; ?>px;" height="<?php echo $element_val['element_height']; ?>" src="<?php echo 'http://www.youtube.com/embed/'.$query['v']; ?>" frameborder="0" allowfullscreen></iframe>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                        break;
                                    case'facebook_like';
                                        ?>
                                        <div class="wpb-pp-fe-content wpb-pp-<?php echo esc_attr($element_val['element_field_type']); ?>-<?php echo $element_key; ?>-<?php echo esc_attr($element_val['element_field_rand_val']); ?> animated <?php echo esc_attr($element_val['animation']); ?>" data-animation="<?php echo esc_attr($element_val['animation']); ?>">
                                            <div class="wpb-pp-table-content"> 
                                                <div id="fb-root"></div>
                                                <script>(function (d, s, id) {
                                                        var js, fjs = d.getElementsByTagName(s)[0];
                                                        if (d.getElementById(id))
                                                            return;
                                                        js = d.createElement(s);
                                                        js.id = id;
                                                        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8";
                                                        fjs.parentNode.insertBefore(js, fjs);
                                                    }(document, 'script', 'facebook-jssdk'));</script>
                                                <div class="fb-page" data-href="https://www.facebook.com/<?php echo!empty($element_val['facebook_like']) ? $element_val['facebook_like'] : 'facebook'; ?>" data-width="380" 
                                                     data-hide-cover="<?php echo (isset($element_val['facebook_like_header_type']) && $element_val['facebook_like_header_type'] == 'on') ? 'false' : 'true'; ?>" 
                                                     data-show-facepile="<?php echo (isset($element_val['facebook_like_cover_type']) && $element_val['facebook_like_cover_type'] == 'on') ? 'false' : 'true'; ?>" 
                                                     data-show-posts="<?php echo (isset($element_val['facebook_like_friendfaces']) && $element_val['facebook_like_friendfaces'] == 'on') ? 'false' : 'true'; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                        break;
                                    default:
                                }
                            }
                        }
                    }
                    ?>
                    <?php if ($wpb_autoclose_enable == 'on' && $wpb_show_countdown_message == 'yes' && $wpb_close_countdown_time != '') { ?>
                        <div class="wpb-popup-timer-content">
                            <?php
                            echo str_replace('#timer', '<span class="wpb_countdown"></span>', $wpb_close_countdown_msg);
                            ?>
                        </div>
                    <?php } ?>

                </form>
            </div>
        </div>
        <span class="wpb-form-message"></span>
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

