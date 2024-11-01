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
                case 'single_line_textfield':
                    ?>
                    .wpb-main-wrapper-<?php echo $popup_random_number; ?> .wpb-pp-single_line_textfield-<?php echo $element_key; ?>-<?php echo $element_val['element_field_rand_val']; ?>
                    {
                        position:absolute;
                        top: <?php echo!empty($element_val['element_top']) ? $element_val['element_top'] : 0; ?>px;
                        left: <?php echo!empty($element_val['element_left']) ? $element_val['element_left'] : 0; ?>px;
                        z-index: <?php echo!empty($element_val['z_index']) ? $element_val['z_index'] : '100'; ?>; 
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

                    .wpb-main-wrapper-<?php echo $popup_random_number; ?> .wpb-pp-single_line_textfield-<?php echo $element_key; ?>-<?php echo $element_val['element_field_rand_val']; ?> input[type="text"]{
                        border-radius: 0px;
                    }

                    .wpb-main-wrapper-<?php echo $popup_random_number; ?> .wpb-pp-single_line_textfield-<?php echo $element_key; ?>-<?php echo $element_val['element_field_rand_val']; ?> input[type="text"]:focus{
                        border-color:transparent;
                    }

                    .wpb-main-wrapper-<?php echo $popup_random_number; ?> .wpb-pp-single_line_textfield-<?php echo $element_key; ?>-<?php echo $element_val['element_field_rand_val']; ?> input[type="text"],
                    .wpb-main-wrapper-<?php echo $popup_random_number; ?> .wpb-pp-single_line_textfield-<?php echo $element_key; ?>-<?php echo $element_val['element_field_rand_val']; ?> input[type="email"],
                    .wpb-main-wrapper-<?php echo $popup_random_number; ?> .wpb-pp-single_line_textfield-<?php echo $element_key; ?>-<?php echo $element_val['element_field_rand_val']; ?> .wpb-single-line ::-webkit-input-placeholder
                    {  
                        width: <?php echo!empty($element_val['element_width']) ? $element_val['element_width'] : 203; ?>px;
                        height: <?php echo!empty($element_val['element_height']) ? $element_val['element_height'] : 42; ?>px;
                        font-family: <?php echo $element_val['typography'] != 'default' ? $element_val['typography'] : 'inherit'; ?>;
                        font-size: <?php echo $element_val['font_size'] != '' ? $element_val['font_size'] . 'px' : 'inherit'; ?>;
                        color: <?php echo!empty($element_val['font_color']) ? $element_val['font_color'] : 'inherit'; ?>;
                        font-weight: <?php echo $element_val['font_weight']; ?>;
                        text-align: <?php echo $element_val['text_align']; ?>;
                        <?php if (!empty($element_val['background_color'])) { ?>
                            background-color: <?php
                            echo $element_val['background_color'];
                        }
                        ?>;
                        background-image:url(<?php echo $element_val['background_image']; ?>); 
                        background-repeat: <?php echo $element_val['background_image_repeat']; ?>;              
                        opacity: <?php echo!empty($element_val['background_opacity']) ? $element_val['background_opacity'] : '1'; ?>;
                    }
                    .wpb-main-wrapper-<?php echo $popup_random_number; ?> .wpb-pp-single_line_textfield-<?php echo $element_key; ?>-<?php echo $element_val['element_field_rand_val']; ?> .wpb-single-line::-webkit-input-placeholder{ 
                        color: <?php echo $element_val['font_color']; ?>;
                    } 
                    .wpb-main-wrapper-<?php echo $popup_random_number; ?> .wpb-pp-single_line_textfield-<?php echo $element_key; ?>-<?php echo $element_val['element_field_rand_val']; ?> .wpb-single-line::-moz-placeholder { 
                    }  
                    .wpb-main-wrapper-<?php echo $popup_random_number; ?> .wpb-pp-single_line_textfield-<?php echo $element_key; ?>-<?php echo $element_val['element_field_rand_val']; ?> .wpb-single-line:-ms-input-placeholder { 
                        color: <?php echo $element_val['font_color']; ?>;
                    }  
                    .wpb-main-wrapper-<?php echo $popup_random_number; ?> .wpb-pp-single_line_textfield-<?php echo $element_key; ?>-<?php echo $element_val['element_field_rand_val']; ?> .wpb-single-line:-moz-placeholder { 
                        color: <?php echo $element_val['font_color']; ?>;
                    } 
                    <?php
                    break;
                case 'bullet_text_list':
                    ?>
                    .wpb-main-wrapper-<?php echo $popup_random_number; ?> .wpb-pp-bullet_text_list-<?php echo $element_key; ?>-<?php echo $element_val['element_field_rand_val']; ?>
                    {
                        position:absolute;
                        top: <?php echo!empty($element_val['element_top']) ? $element_val['element_top'] : 0; ?>px;
                        left: <?php echo!empty($element_val['element_left']) ? $element_val['element_left'] : 0; ?>px;
                        z-index: <?php echo!empty($element_val['z_index']) ? $element_val['z_index'] : '100'; ?>; 
                        width: <?php echo!empty($element_val['element_width']) ? $element_val['element_width'] : 150; ?>px;
                        height: <?php echo!empty($element_val['element_height']) ? $element_val['element_height'] : 150; ?>px;
                        font-family: <?php echo $element_val['typography'] != 'default' ? $element_val['typography'] : 'inherit'; ?>;
                        font-size: <?php echo $element_val['font_size'] != '' ? $element_val['font_size'] . 'px' : 'inherit'; ?>;
                        color: <?php echo!empty($element_val['font_color']) ? $element_val['font_color'] : 'inherit'; ?>;
                        font-weight: <?php echo $element_val['font_weight']; ?>;
                        border:<?php echo(isset($element_val['border_type'])) ? esc_attr($element_val['border_type']) : ''; ?> <?php echo(isset($element_val['element_border_color'])) ? esc_attr($element_val['element_border_color']) : ''; ?>;
                        border-radius:<?php echo(isset($element_val['border_radius'])) ? esc_attr($element_val['border_radius']) . 'px' : ''; ?>;
                        border-width:<?php echo(isset($element_val['border_width'])) ? esc_attr($element_val['border_width']) . 'px' : ''; ?>;
                        <?php if (!empty($element_val['background_color'])) { ?>
                            background-color: <?php
                            echo $element_val['background_color'];
                        }
                        ?>;
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

                    .wpb-main-wrapper-<?php echo $popup_random_number; ?> .wpb-pp-bullet_text_list-<?php echo $element_key; ?>-<?php echo $element_val['element_field_rand_val']; ?> ul li{
                        position: relative;
                        padding-left: 15px;
                        font-size: 14px;
                    }

                    .wpb-main-wrapper-<?php echo $popup_random_number; ?> .wpb-pp-bullet_text_list-<?php echo $element_key; ?>-<?php echo $element_val['element_field_rand_val']; ?> ul li:before {
                        content: "\f111";
                        font-size: 6px;
                        color: #444;
                        position: absolute;
                        left: 5px;
                        top: 4px;
                        color: #dc3b29;
                    }
                <?php case 'submit_button': ?>
                    .wpb-main-wrapper-<?php echo $popup_random_number; ?> .wpb-pp-submit_button-<?php echo $element_key; ?>-<?php echo $element_val['element_field_rand_val']; ?> .wpb-submit-button
                    {
                        position:absolute;
                        top: <?php echo!empty($element_val['element_top']) ? $element_val['element_top'] : 0; ?>px;
                        left: <?php echo!empty($element_val['element_left']) ? $element_val['element_left'] : 0; ?>px;
                        z-index: <?php echo!empty($element_val['z_index']) ? $element_val['z_index'] : '100'; ?>; 
                        width: <?php echo!empty($element_val['element_width']) ? $element_val['element_width'] : 138; ?>px;
                        height: <?php echo!empty($element_val['element_height']) ? $element_val['element_height'] : 51; ?>px;
                        font-family: <?php echo $element_val['typography'] != 'default' ? $element_val['typography'] : 'inherit'; ?>;
                        font-size: <?php echo $element_val['font_size'] != '' ? $element_val['font_size'] . 'px' : 'inherit'; ?>;
                        color: <?php echo!empty($element_val['font_color']) ? $element_val['font_color'] : '#fffff'; ?>;
                        font-weight: <?php echo $element_val['font_weight']; ?>;
                        text-align: <?php echo $element_val['text_align']; ?>;
                        border:<?php echo(isset($element_val['border_type'])) ? esc_attr($element_val['border_type']) : ''; ?> <?php echo(isset($element_val['element_border_color'])) ? esc_attr($element_val['element_border_color']) : ''; ?>;
                        border-radius:<?php echo(isset($element_val['border_radius'])) ? esc_attr($element_val['border_radius']) . 'px' : ''; ?>;
                        border-width:<?php echo(isset($element_val['border_width'])) ? esc_attr($element_val['border_width']) . 'px' : ''; ?>;
                        <?php if (!empty($element_val['background_color'])) { ?>
                            background-color: <?php
                            echo $element_val['background_color'];
                        }
                        ?>;
                        background-image:url(<?php echo $element_val['background_image']; ?>); 
                        background-repeat: <?php echo $element_val['background_image_repeat']; ?>;              
                        opacity: <?php echo!empty($element_val['background_opacity']) ? $element_val['background_opacity'] : '1'; ?>;
                        border-radius: 0px !important;
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
                case 'drop_down_select':
                    ?>
                    .wpb-main-wrapper-<?php echo $popup_random_number; ?> .wpb-pp-drop_down_select-<?php echo $element_key; ?>-<?php echo $element_val['element_field_rand_val']; ?>
                    {
                        position:absolute;
                        top: <?php echo!empty($element_val['element_top']) ? $element_val['element_top'] : 0; ?>px;
                        left: <?php echo!empty($element_val['element_left']) ? $element_val['element_left'] : 0; ?>px;
                        z-index: <?php echo!empty($element_val['z_index']) ? $element_val['z_index'] : '100'; ?>; 
                        width: <?php echo!empty($element_val['element_width']) ? $element_val['element_width'] : 138; ?>px;
                        height: <?php echo!empty($element_val['element_height']) ? $element_val['element_height'] : 51; ?>px;
                        font-family: <?php echo $element_val['typography'] != 'default' ? $element_val['typography'] : 'inherit'; ?>;
                        font-size: <?php echo $element_val['font_size'] != '' ? $element_val['font_size'] . 'px' : 'inherit'; ?>;
                        color: <?php echo!empty($element_val['font_color']) ? $element_val['font_color'] : 'inherit'; ?>;
                        font-weight: <?php echo $element_val['font_weight']; ?>;
                        text-align: <?php echo $element_val['text_align']; ?>;
                        border:<?php echo(isset($element_val['border_type'])) ? esc_attr($element_val['border_type']) : ''; ?> <?php echo(isset($element_val['element_border_color'])) ? esc_attr($element_val['element_border_color']) : ''; ?>;
                        border-radius:<?php echo(isset($element_val['border_radius'])) ? esc_attr($element_val['border_radius']) . 'px' : ''; ?>;
                        border-width:<?php echo(isset($element_val['border_width'])) ? esc_attr($element_val['border_width']) . 'px' : ''; ?>;
                        <?php if (!empty($element_val['background_color'])) { ?>
                            background-color: <?php
                            echo $element_val['background_color'];
                        }
                        ?>;
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

                    <?php
                    break;
                case 'pdf':
                    ?>
                    .wpb-main-wrapper-<?php echo $popup_random_number; ?> .wpb-pp-pdf-<?php echo $element_key; ?>-<?php echo $element_val['element_field_rand_val']; ?>
                    {
                        position:absolute;
                        top: <?php echo!empty($element_val['element_top']) ? $element_val['element_top'] : 0; ?>px;
                        left: <?php echo!empty($element_val['element_left']) ? $element_val['element_left'] : 0; ?>px;
                        z-index: <?php echo!empty($element_val['z_index']) ? $element_val['z_index'] : '100'; ?>; 
                        width: <?php echo $element_val['element_width']; ?>px;
                        height: <?php echo $element_val['element_height']; ?>px;
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
                    <?php
                    break;
                case 'image':
                    ?>
                    .wpb-main-wrapper-<?php echo $popup_random_number; ?> .wpb-pp-image-<?php echo $element_key; ?>-<?php echo $element_val['element_field_rand_val']; ?>
                    {
                        position:absolute;
                        top: <?php echo!empty($element_val['element_top']) ? $element_val['element_top'] : 0; ?>px;
                        left: <?php echo!empty($element_val['element_left']) ? $element_val['element_left'] : 0; ?>px;
                        z-index: <?php echo!empty($element_val['z_index']) ? $element_val['z_index'] : '100'; ?>;
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
                    .wpb-main-wrapper-<?php echo $popup_random_number; ?> .wpb-pp-image-<?php echo $element_key; ?> img
                    {
                        width: <?php echo $element_val['element_width']; ?>px;
                        height: <?php echo $element_val['element_height']; ?>px;
                    }
                    <?php
                    break;
                case 'youtube_video_embed':
                    ?>
                    .wpb-main-wrapper-<?php echo $popup_random_number; ?> .wpb-pp-youtube_video_embed-<?php echo $element_key; ?>-<?php echo $element_val['element_field_rand_val']; ?>
                    {
                        position:absolute;
                        top: <?php echo!empty($element_val['element_top']) ? $element_val['element_top'] : 0; ?>px;
                        left: <?php echo!empty($element_val['element_left']) ? $element_val['element_left'] : 0; ?>px;
                        z-index: <?php echo!empty($element_val['z_index']) ? $element_val['z_index'] : '100'; ?>; 
                        width: <?php echo $element_val['element_width']; ?>px;
                        height: <?php echo $element_val['element_height']; ?>px;
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
                    <?php
                    break;
                case 'vimeo_video_embed':
                    ?>
                    .wpb-main-wrapper-<?php echo $popup_random_number; ?> .wpb-pp-vimeo_video_embed-<?php echo $element_key; ?>-<?php echo $element_val['element_field_rand_val']; ?>
                    {
                        position:absolute;
                        top: <?php echo!empty($element_val['element_top']) ? $element_val['element_top'] : 0; ?>px;
                        left: <?php echo!empty($element_val['element_left']) ? $element_val['element_left'] : 0; ?>px;
                        z-index: <?php echo!empty($element_val['z_index']) ? $element_val['z_index'] : '100'; ?>; 
                        width: <?php echo $element_val['element_width']; ?>px;
                        height: <?php echo $element_val['element_height']; ?>px;
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
                    <?php
                    break;
                case 'facebook_like':
                    ?>
                    .wpb-main-wrapper-<?php echo $popup_random_number; ?> .wpb-pp-facebook_like-<?php echo $element_key; ?>-<?php echo $element_val['element_field_rand_val']; ?>
                    {
                        position:absolute;
                        top: <?php echo!empty($element_val['element_top']) ? $element_val['element_top'] : 0; ?>px;
                        left: <?php echo!empty($element_val['element_left']) ? $element_val['element_left'] : 0; ?>px;
                        z-index: <?php echo!empty($element_val['z_index']) ? $element_val['z_index'] : '100'; ?>; 
                        width: <?php echo $element_val['element_width']; ?>px;
                        height: <?php echo $element_val['element_height']; ?>px;
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
                    <?php
                    break;
                case 'social_link':
                    ?>
                    .wpb-main-wrapper-<?php echo $popup_random_number; ?> .wpb-pp-social_link-<?php echo $element_key; ?>-<?php echo $element_val['element_field_rand_val']; ?>
                    {
                        position:absolute;
                        top: <?php echo!empty($element_val['element_top']) ? $element_val['element_top'] : 0; ?>px;
                        left: <?php echo!empty($element_val['element_left']) ? $element_val['element_left'] : 0; ?>px;
                        z-index: <?php echo!empty($element_val['z_index']) ? $element_val['z_index'] : '100'; ?>; 
                        width: <?php echo $element_val['element_width']; ?>px;
                        height: <?php echo $element_val['element_height']; ?>px;
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
                    .wpb-main-wrapper-<?php echo $popup_random_number; ?> .wpb-pp-social_link-<?php echo $element_key; ?>-<?php echo $element_val['element_field_rand_val']; ?> a
                    {
                        font-size:<?php echo $element_val['social_icon_size']; ?>px;
                        color:<?php echo $element_val['social_icon_bg_color']; ?>;
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