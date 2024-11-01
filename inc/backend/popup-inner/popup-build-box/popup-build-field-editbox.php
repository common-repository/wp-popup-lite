<?php
defined('ABSPATH') or die("No direct script allowed!!!");

//var_dump($custom_generated_popup);
$popup_keyArray = array();
$popup_bulletkeyArray = array();
foreach ($custom_generated_popup as $element_key => $element_val) {
    if ($element_key != 0) {
        ?>
        <?php
        $edit_element_array = array();
        array_push($edit_element_array, $element_val['element_field_type']);
        $popup_keyArray[$element_key] = $element_key;
        ?>  
        <div class="ui-draggable ui-draggable-handle wpb-popup-inner-element" 
             style="position: absolute;right: auto; bottom: auto; left: <?php echo esc_attr($element_val['element_field_left']); ?>; top: <?php echo esc_attr($element_val['element_field_top']); ?>; z-index:<?php echo!empty($element_val['z_index']) ? esc_attr($element_val['z_index']) : '0'; ?>;">                
            <div class="wp-popup-element-wrapper" id="builder-loading-inner">
                <?php
                switch ($element_val['element_field_type']) {
                    case 'normal_text':
                        ?>   
                        <div class="wpb-element-inputype-sample <?php echo!empty($element_val['animation']) ? 'animated' . ' ' . $element_val['animation'] : ''; ?>" id="epb-element-<?php echo $element_val['element_field_type']; ?>" 
                             style="display:block;
                             width: <?php echo!empty($element_val['element_width']) ? esc_attr($element_val['element_width']) : '140'; ?>px; 
                             height: <?php echo!empty($element_val['element_height']) ? esc_attr($element_val['element_height']) : '60'; ?>px;
                             font-family:<?php echo!empty($element_val['typography']) && $element_val['typography'] != 'default' ? esc_attr($element_val['typography']) : 'sans-serif'; ?>;
                             font-size:<?php echo!empty($element_val['font_size']) ? esc_attr($element_val['font_size']) : '14'; ?>px;
                             color:<?php echo!empty($element_val['font_color']) ? esc_attr($element_val['font_color']) : '#000000'; ?>;
                             font-weight:<?php echo!empty($element_val['font_weight']) ? esc_attr($element_val['font_weight']) : '500'; ?>;
                             <?php echo!empty($element_val['background_color']) ? 'background-color:' . esc_attr($element_val['background_color']) . ';' : ''; ?> 
                             background-image:url(<?php echo esc_attr($element_val['background_image']); ?>); 
                             background-repeat: <?php echo!empty($element_val['background_image_repeat']) ? esc_attr($element_val['background_image_repeat']) : 'no-repeat'; ?>;              
                             opacity: <?php echo!empty($element_val['background_opacity']) ? esc_attr($element_val['background_opacity']) : '1'; ?>;
                             text-align:<?php echo(isset($element_val['text_align'])) ? esc_attr($element_val['text_align']) : 'left'; ?>;
                             border:<?php echo(isset($element_val['border_type'])) ? esc_attr($element_val['border_type']) : ''; ?> <?php echo(isset($element_val['element_border_color'])) ? esc_attr($element_val['element_border_color']) : ''; ?>;
                             border-radius:<?php echo(isset($element_val['border_radius'])) ? esc_attr($element_val['border_radius']) . 'px' : ''; ?>;
                             border-width:<?php echo(isset($element_val['border_width'])) ? esc_attr($element_val['border_width']) . 'px' : ''; ?>;
                             ">
                            <p style="font-size: <?php echo!empty($element_val['font_size']) ? esc_attr($element_val['font_size']) : '14'; ?>px;"><?php echo (!empty($element_val['normal_text'])) ? esc_attr($element_val['normal_text']) : 'Lorem Isum Dolar et.'; ?></p>
                        </div>
                        <?php
                        break;
                    case 'single_line_textfield':
                        ?>
                        <div class="wpb-element-inputype-sample <?php echo!empty($element_val['animation']) ? 'animated' . ' ' . esc_attr($element_val['animation']) : ''; ?>" id="epb-element-<?php echo esc_attr($element_val['element_field_type']); ?>"
                             style="border: 1px solid #ddd; box-shadow: inset 0 1px 2px rgba(0,0,0,.07); text-align: center; 
                             width: <?php echo!empty($element_val['element_width']) ? esc_attr($element_val['element_width']) : '203'; ?>px; 
                             height: <?php echo!empty($element_val['element_height']) ? esc_attr($element_val['element_height']) : '42'; ?>px;
                             font-family:<?php echo!empty($element_val['typography']) ? esc_attr($element_val['typography']) : 'sans-serif'; ?>;
                             font-size:<?php echo!empty($element_val['font_size']) ? esc_attr($element_val['font_size']) : '16'; ?>px;
                             color:<?php echo!empty($element_val['font_color']) ? esc_attr($element_val['font_color']) : '#000000'; ?>;
                             font-weight:<?php echo!empty($element_val['font_weight']) ? esc_attr($element_val['font_weight']) : '500'; ?>;
                             background-color:<?php echo!empty($element_val['background_color']) ? esc_attr($element_val['background_color']) : '#fff'; ?>; 
                             background-image:url(<?php echo esc_attr($element_val['background_image']); ?>); 
                             background-repeat: <?php echo!empty($element_val['background_image_repeat']) ? esc_attr($element_val['background_image_repeat']) : 'no-repeat'; ?>;              
                             opacity: <?php echo!empty($element_val['background_opacity']) ? esc_attr($element_val['background_opacity']) : '1'; ?>;
                             text-align:<?php echo(isset($element_val['text_align'])) ? esc_attr($element_val['text_align']) : 'left'; ?>;
                             border:<?php echo(isset($element_val['border_type'])) ? esc_attr($element_val['border_type']) : ''; ?> <?php echo(isset($element_val['element_border_color'])) ? esc_attr($element_val['element_border_color']) : ''; ?>;
                             border-radius:<?php echo(isset($element_val['border_radius'])) ? esc_attr($element_val['border_radius']) . 'px' : ''; ?>;
                             border-width:<?php echo(isset($element_val['border_width'])) ? esc_attr($element_val['border_width']) . 'px' : ''; ?>;
                             ">                    
                                 <?php
                                 if (!empty($element_val['single_line_text_field_type_placeholder'])) {
                                     echo '<p>' . esc_attr($element_val['single_line_text_field_type_placeholder']) . '</p>';
                                 } else {
                                     echo '<p></p>';
                                 }
                                 ?>
                        </div>
                        <?php
                        break;
                    case 'bullet_text_list':
                        ?>
                        <div class="wpb-element-inputype-sample wpb-bullet-icon-type-<?php echo!empty($element_val['bullet_text_bullet_type']) ? esc_attr($element_val['bullet_text_bullet_type']) : 'default'; ?> <?php echo!empty($element_val['animation']) ? 'animated' . ' ' . esc_attr($element_val['animation']) : ''; ?>" id="epb-element-<?php echo esc_attr($element_val['element_field_type']); ?>" 
                             style="text-align:left;
                             width: <?php echo!empty($element_val['element_width']) ? esc_attr($element_val['element_width']) : '240'; ?>px; 
                             height: <?php echo!empty($element_val['element_height']) ? esc_attr($element_val['element_height']) : '70'; ?>px;
                             font-family:<?php echo!empty($element_val['typography']) ? esc_attr($element_val['typography']) : 'sans-serif'; ?>;
                             font-size:<?php echo!empty($element_val['font_size']) ? esc_attr($element_val['font_size']) : '16'; ?>px;
                             color:<?php echo!empty($element_val['font_color']) ? esc_attr($element_val['font_color']) : '#000000'; ?>;
                             font-weight:<?php echo!empty($element_val['font_weight']) ? esc_attr($element_val['font_weight']) : '500'; ?>;
                             <?php echo!empty($element_val['background_color']) ? 'background-color:' . esc_attr($element_val['background_color']) . ';' : ''; ?> 
                             background-image:url(<?php echo esc_attr($element_val['background_image']); ?>); 
                             background-repeat: <?php echo!empty($element_val['background_image_repeat']) ? esc_attr($element_val['background_image_repeat']) : 'no-repeat'; ?>;              
                             opacity: <?php echo!empty($element_val['background_opacity']) ? esc_attr($element_val['background_opacity']) : '1'; ?>;
                             text-align:<?php echo(isset($element_val['text_align'])) ? esc_attr($element_val['text_align']) : 'left'; ?>;
                             border:<?php echo(isset($element_val['border_type'])) ? esc_attr($element_val['border_type']) : ''; ?> <?php echo(isset($element_val['element_border_color'])) ? esc_attr($element_val['element_border_color']) : ''; ?>;
                             border-radius:<?php echo(isset($element_val['border_radius'])) ? esc_attr($element_val['border_radius']) . 'px' : ''; ?>;
                             border-width:<?php echo(isset($element_val['border_width'])) ? esc_attr($element_val['border_width']) . 'px' : ''; ?>;
                             ">
                                 <?php if (!empty($element_val['bullet_texts'])) { ?>
                                <ul class="wpb-points-ul">
                                    <?php
                                    foreach ($element_val['bullet_texts'] as $key => $val) {
                                        if ($key != 'popup_bullet_elem_counter') {
                                            ?>
                                            <li id="wpb-pointlist-text-<?php echo $key; ?>"><?php echo $val; ?></li>
                                            <?php
                                        }
                                    }
                                    ?>
                                </ul>
                            <?php } else { ?>
                                <ul class="wpb-points-ul">
                                    <li class="wpb-initial-bullet-text-sample"><?php echo __('Lorem Isum Dolar et.', 'wp-popup-lite'); ?></li>
                                    <li class="wpb-initial-bullet-text-sample"><?php echo __('Sed ut perspiciatis unde omnis iste.', 'wp-popup-lite'); ?></li>
                                </ul>
                            <?php } ?>
                        </div>
                        <?php
                        break;
                    case 'submit_button':
                        ?>
                        <div class="wpb-element-inputype-sample <?php echo!empty($element_val['animation']) ? 'animated' . ' ' . esc_attr($element_val['animation']) : ''; ?>" id="epb-element-<?php echo esc_attr($element_val['element_field_type']); ?>" 
                             style="border: 1px solid #b5abab; text-align: center; position: relative;
                             width: <?php echo!empty($element_val['element_width']) ? esc_attr($element_val['element_width']) : '175'; ?>px; 
                             height: <?php echo!empty($element_val['element_height']) ? esc_attr($element_val['element_height']) : '50'; ?>px;
                             font-family:<?php echo!empty($element_val['typography']) ? esc_attr($element_val['typography']) : 'sans-serif'; ?>;
                             color:<?php echo!empty($element_val['font_color']) ? esc_attr($element_val['font_color']) : '#fffff'; ?>;
                             background-color:<?php echo!empty($element_val['background_color']) ? esc_attr($element_val['background_color']) : '#222'; ?>; 
                             background-image:url(<?php echo esc_attr($element_val['background_image']); ?>); 
                             background-repeat: <?php echo!empty($element_val['background_image_repeat']) ? esc_attr($element_val['background_image_repeat']) : 'no-repeat'; ?>;              
                             opacity: <?php echo!empty($element_val['background_opacity']) ? esc_attr($element_val['background_opacity']) : '1'; ?>;
                             text-align:<?php echo(isset($element_val['text_align'])) ? esc_attr($element_val['text_align']) : 'center'; ?>;
                             border:<?php echo(isset($element_val['border_type'])) ? esc_attr($element_val['border_type']) : ''; ?> <?php echo(isset($element_val['element_border_color'])) ? esc_attr($element_val['element_border_color']) : ''; ?>;
                             border-radius:<?php echo(isset($element_val['border_radius'])) ? esc_attr($element_val['border_radius']) . 'px' : ''; ?>;
                             border-width:<?php echo(isset($element_val['border_width'])) ? esc_attr($element_val['border_width']) . 'px' : ''; ?>;
                             ">
                            <p style="
                               font-size:<?php echo!empty($element_val['font_size']) ? esc_attr($element_val['font_size']) : '16'; ?>px;
                               font-weight:<?php echo!empty($element_val['font_weight']) ? esc_attr($element_val['font_weight']) : '500'; ?>;">
                               <?php
                               if (!empty($element_val['submit_button_title'])) {
                                   echo esc_attr($element_val['submit_button_title']);
                               } else {
                                   echo __('Submit', 'wp-popup-lite');
                               }
                               ?>
                            </p>
                        </div>
                        <?php
                        break;
                    case 'text_area':
                        ?>
                        <div class="wpb-element-inputype-sample <?php echo!empty($element_val['animation']) ? 'animated' . ' ' . esc_attr($element_val['animation']) : ''; ?>" id="epb-element-<?php echo esc_attr($element_val['element_field_type']); ?>" 
                             style="border: 1px solid #b5abab; text-align: center; position: relative;
                             width: <?php echo!empty($element_val['element_width']) ? esc_attr($element_val['element_width']) : '175'; ?>px; 
                             height: <?php echo!empty($element_val['element_height']) ? esc_attr($element_val['element_height']) : '50'; ?>px;
                             font-family:<?php echo!empty($element_val['typography']) ? esc_attr($element_val['typography']) : 'sans-serif'; ?>;
                             color:<?php echo!empty($element_val['font_color']) ? esc_attr($element_val['font_color']) : ''; ?>;
                             background-color:<?php echo!empty($element_val['background_color']) ? esc_attr($element_val['background_color']) : ''; ?>; 
                             background-image:url(<?php echo esc_attr($element_val['background_image']); ?>); 
                             background-repeat: <?php echo!empty($element_val['background_image_repeat']) ? esc_attr($element_val['background_image_repeat']) : 'no-repeat'; ?>;              
                             opacity: <?php echo!empty($element_val['background_opacity']) ? esc_attr($element_val['background_opacity']) : '1'; ?>;
                             text-align:<?php echo(isset($element_val['text_align'])) ? esc_attr($element_val['text_align']) : 'left'; ?>;
                             border:<?php echo(isset($element_val['border_type'])) ? esc_attr($element_val['border_type']) : ''; ?> <?php echo(isset($element_val['element_border_color'])) ? esc_attr($element_val['element_border_color']) : ''; ?>;
                             border-radius:<?php echo(isset($element_val['border_radius'])) ? esc_attr($element_val['border_radius']) . 'px' : ''; ?>;
                             border-width:<?php echo(isset($element_val['border_width'])) ? esc_attr($element_val['border_width']) . 'px' : ''; ?>;
                             ">
                            <p style="
                               font-size:<?php echo!empty($element_val['font_size']) ? esc_attr($element_val['font_size']) : '16'; ?>px;
                               font-weight:<?php echo!empty($element_val['font_weight']) ? esc_attr($element_val['font_weight']) : '500'; ?>;">
                               <?php
                               if (!empty($element_val['textarea_placeholder'])) {
                                   echo esc_attr($element_val['textarea_placeholder']);
                               }
                               ?>
                            </p>
                        </div>
                        <?php
                        break;
                    case 'image':
                        ?>
                        <div class="wpb-element-inputype-sample <?php echo!empty($element_val['animation']) ? 'animated' . ' ' . esc_attr($element_val['animation']) : ''; ?>" id="epb-element-<?php echo esc_attr($element_val['element_field_type']); ?>">
                            <img src="<?php
                            if (!empty($element_val['image_url'])) {
                                echo esc_url($element_val['image_url']);
                            } else {
                                echo WPB_PRO_IMAGE_DIR . '/img-placeholder.png';
                            }
                            ?>" 
                                 style="height: <?php echo!empty($element_val['element_height']) . 'px' ? esc_attr($element_val['element_height']) : 'auto'; ?>; width:<?php echo!empty($element_val['element_width']) ? esc_attr($element_val['element_width']) . 'px' : ''; ?>;"/>
                        </div>
                        <?php
                        break;
                    case 'drop_down_select':
                        ?>
                        <div class="wpb-element-inputype-sample" id="epb-element-<?php echo esc_attr($element_val['element_field_type']); ?>" 
                             style="display:block;border: 1px solid #b5abab;text-align: center; position: relative;
                             width: <?php echo!empty($element_val['element_width']) ? esc_attr($element_val['element_width']) : '200'; ?>px; 
                             height: <?php echo!empty($element_val['element_height']) ? esc_attr($element_val['element_height']) : '50'; ?>px;
                             font-family:<?php echo!empty($element_val['typography']) ? esc_attr($element_val['typography']) : 'sans-serif'; ?>;
                             font-size:<?php echo!empty($element_val['font_size']) ? esc_attr($element_val['font_size']) : '16'; ?>px;
                             color:<?php echo!empty($element_val['font_color']) ? esc_attr($element_val['font_color']) : '#000000'; ?>;
                             font-weight:<?php echo!empty($element_val['font_weight']) ? esc_attr($element_val['font_weight']) : '500'; ?>;
                             <?php echo!empty($element_val['background_color']) ? 'background-color:' . esc_attr($element_val['background_color']) . ';' : ''; ?> 
                             background-image:url(<?php echo esc_attr($element_val['background_image']); ?>); 
                             background-repeat: <?php echo!empty($element_val['background_image_repeat']) ? esc_attr($element_val['background_image_repeat']) : 'no-repeat'; ?>;              
                             opacity: <?php echo!empty($element_val['background_opacity']) ? esc_attr($element_val['background_opacity']) : '1'; ?>;
                             text-align:<?php echo(isset($element_val['text_align'])) ? esc_attr($element_val['text_align']) : 'left'; ?>;
                             border:<?php echo(isset($element_val['border_type'])) ? esc_attr($element_val['border_type']) : ''; ?> <?php echo(isset($element_val['element_border_color'])) ? esc_attr($element_val['element_border_color']) : ''; ?>;
                             border-radius:<?php echo(isset($element_val['border_radius'])) ? esc_attr($element_val['border_radius']) . 'px' : ''; ?>;
                             border-width:<?php echo(isset($element_val['border_width'])) ? esc_attr($element_val['border_width']) . 'px' : ''; ?>;
                             ">
                            <p><?php echo!empty($element_val['select_placeholder']) ? esc_attr($element_val['select_placeholder']) : ''; ?></p>
                        </div>
                        <?php
                        break;
                    case 'pdf':
                        ?>
                        <div class="wpb-element-inputype-sample" id="epb-element-<?php echo $element_val['element_field_type']; ?>" style="display:block; width:100%;">
                            <div id="wpb-inner-element-pdf-ID" style="width: <?php echo!empty($element_val['element_width']) ? $element_val['element_width'] : '500'; ?>px;;height:<?php echo!empty($element_val['element_height']) ? $element_val['element_height'] : '495'; ?>px;">
                                <iframe class="wpb-inner-element-iframe" style="width:100%;height:100%;" src="<?php echo!empty($element_val['pdf_file_url']) ? esc_url($element_val['pdf_file_url']) : 'http://www.pdf995.com/samples/pdf.pdf"'; ?>"></iframe>
                            </div>
                        </div>
                        <?php
                        break;
                    case 'youtube_video_embed';
                        ?>
                        <div class="wpb-element-inputype-sample" id="epb-element-<?php echo $element_val['element_field_type']; ?>" style="display:block; width:100%;">
                            <?php
                            if (!empty($element_val['video_url'])) {
                                // break the URL into its components
                                $parts = parse_url(esc_url($element_val['video_url']));

                                // $parts['query'] contains the query string: 'v=Z29MkJdMKqs&feature=grec_index'
                                // parse variables into key=>value array
                                $query = array();
                                parse_str($parts['query'], $query);
                                ?>
                                <iframe width="<?php echo $element_val['element_width']; ?>" height="<?php echo $element_val['element_height']; ?>" src="<?php echo 'http://www.youtube.com/embed/'.$query['v']; ?>" frameborder="0" allowfullscreen></iframe>
                            </div>
                            <?php
                        }
                        break;
                    case 'vimeo_video_embed';
                        ?>
                        <div class="wpb-element-inputype-sample" id="epb-element-<?php echo $element_val['element_field_type']; ?>" style="display:block; width:100%;">
                        <?php echo!empty($element_val['video_url']) ? '<iframe width="560" height="315" id ="wpb-inner-element-vid-ID" src="' . esc_url($element_val['video_url']) . '" frameborder="0" allowfullscreen></iframe>' : __('Enter Vimeo Video URL', 'wp-popup-lite'); ?>  
                        </div>
                        <?php
                        break;
                    case'facebook_like';
                        ?>
                        <div class="wpb-element-inputype-sample" id="epb-element-<?php echo $element_val['element_field_type']; ?>" style="display:block; width:100%;">
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
                            <div class="fb-page" data-href="https://www.facebook.com/<?php echo!empty($element_val['facebook_like']) ? $element_val['facebook_like'] : 'facebook'; ?>" data-width="<?php echo (isset($element_val['element_width'])) ? esc_attr($element_val['element_width']) : '380'; ?>" 
                                 data-hide-cover="<?php echo (isset($element_val['facebook_like_cover_type']) && $element_val['facebook_like_cover_type'] === 'on') ? 'true' : 'false'; ?>" 
                                 data-show-facepile="<?php echo (isset($element_val['facebook_like_friendfaces']) && $element_val['facebook_like_friendfaces'] === 'on') ? 'true' : 'false'; ?>" 
                                 data-show-posts="<?php echo (isset($element_val['facebook__posts']) && $element_val['facebook__posts'] === 'on') ? 'true' : 'false'; ?>">
                            </div>
                        </div>
                        <?php
                        break;
                    case 'social_link':
                        ?>
                        <div class="wpb-element-inputype-sample" id="epb-element-<?php echo $element_val['element_field_type']; ?>" style="display:block; width:100%;">
                            <div class="wpb-inputype-sample-fb">
                                <?php if (!isset($element_val['social_link_fb_enable'])) { ?>
                                    <a target="_blank" href="<?php echo!empty($element_val['wp_el_type_social_fb']) ? $element_val['wp_el_type_social_fb'] : 'javascript:void(0)'; ?>" style="font-size: <?php echo!empty($element_val['social_icon_size']) ? $element_val['social_icon_size'] : '45'; ?>px; color: <?php echo!empty($element_val['social_icon_bg_color']) ? $element_val['social_icon_bg_color'] : ''; ?>;"><i class="fa fa-facebook-square"></i></a>
                                <?php } ?>
                                <?php if (!isset($element_val['social_link_tw_enable'])) { ?>
                                    <a target="_blank" href="<?php echo!empty($element_val['social_link_tw_url']) ? $element_val['social_link_tw_url'] : 'javascript:void(0)'; ?>" style="font-size: <?php echo!empty($element_val['social_icon_size']) ? $element_val['social_icon_size'] : '45'; ?>px; color: <?php echo!empty($element_val['social_icon_bg_color']) ? $element_val['social_icon_bg_color'] : ''; ?>;"><i class="fa fa-twitter-square"></i></a>
                                <?php } ?>
                                <?php if (!isset($element_val['social_link_gp_enable'])) { ?>
                                    <a target="_blank" href="<?php echo!empty($element_val['social_link_gp_url']) ? $element_val['social_link_gp_url'] : 'javascript:void(0)'; ?>" style="font-size: <?php echo!empty($element_val['social_icon_size']) ? $element_val['social_icon_size'] : '45'; ?>px; color: <?php echo!empty($element_val['social_icon_bg_color']) ? $element_val['social_icon_bg_color'] : ''; ?>;"><i class="fa fa-google-plus-square"></i></a>
                                <?php } ?>
                                <?php if (!isset($element_val['social_link_li_enable'])) { ?>
                                    <a target="_blank" href="<?php echo!empty($element_val['social_link_li_url']) ? $element_val['social_link_li_url'] : 'javascript:void(0)'; ?>" style="font-size: <?php echo!empty($element_val['social_icon_size']) ? $element_val['social_icon_size'] : '45'; ?>px; color: <?php echo!empty($element_val['social_icon_bg_color']) ? $element_val['social_icon_bg_color'] : ''; ?>;"><i class="fa fa-linkedin-square"></i></a>
                        <?php } ?>
                            </div>
                        </div>
                        <?php
                        break;
                    default:
                        ?>
        <?php } ?>    
                <div class="wpb-option-field" id="wpb-element-action-<?php echo $element_val['element_field_type']; ?>" style="display:none;">
                    <div class="wpb-element-editbox-opts" id="wpb-element-editbox-opts">
                        <a class="wpb-element-edit" href="javascript:void(0)"><i class="fa fa-pencil-square-o"></i><?php echo __('Edit', 'wp-popup-lite'); ?></a>
                        <a class="wpb-element-del" href="javascript:void(0)"><i class="fa fa-trash-o"></i><?php echo __('Delete', 'wp-popup-lite'); ?></a>
                        <a class="wpb-element-handle-a wpb-element-handle" href="javascript:void(0)"><i class="fa fa-arrows"></i><?php echo __('Move', 'wp-popup-lite'); ?></a>
                    </div>
                </div>
            </div>
            <div class="wpb-ind-inner-element-options" id="pb-ind-inner-element-options-<?php echo $element_val['element_field_type']; ?>" style="display:none;">
                <div class="wpb-inner-element-header-section">
                    <span><?php echo __('Element Design Settings', 'wp-popup-lite'); ?></span>
                    <div class="wpb-ind-inner-element-options-close wpb-ind-editor-close">X</div>
                </div>
                <h2 class="wpb-nav-list nav-tab-wrapper">
                    <?php if (in_array($element_val['element_field_type'], $edit_element_array)) { ?>
                        <a href="#" class="nav-tab wpb-inner-element-tab in-el-tab-active" id="wpb-tab-layer-content"><?php echo __('Layer Content', 'wp-popup-lite'); ?></a>
                    <?php } ?>
                    <?php if (in_array($element_val['element_field_type'], $edit_element_array)) { ?>
                        <a href="#" class="nav-tab wpb-inner-element-tab" id="wpb-tab-general-setting"><?php echo __('General', 'wp-popup-lite'); ?></a>
                    <?php } ?>
                    <?php if (in_array($element_val['element_field_type'], array('normal_text', 'single_line_textfield', 'bullet_text_list', 'submit_button', 'drop_down_select', 'text_area'))) { ?>
                        <a href="#" class="nav-tab wpb-inner-element-tab" id="wpb-tab-font"><?php echo __('Typography', 'wp-popup-lite'); ?></a>
                    <?php } ?>
                    <?php if (in_array($element_val['element_field_type'], array('normal_text', 'single_line_textfield', 'bullet_text_list', 'submit_button', 'drop_down_select', 'text_area'))) { ?>
                        <a href="#" class="nav-tab wpb-inner-element-tab" id="wpb-tab-background"><?php echo __('Background', 'wp-popup-lite'); ?></a>
                    <?php } ?>
                    <?php if (in_array($element_val['element_field_type'], array('normal_text', 'single_line_textfield', 'bullet_text_list', 'submit_button', 'drop_down_select', 'text_area'))) { ?>
                        <a href="#" class="nav-tab wpb-inner-element-tab" id="wpb-tab-border"><?php echo __('Border', 'wp-popup-lite'); ?></a>
                    <?php } ?>
                    <?php if (in_array($element_val['element_field_type'], $edit_element_array)) { ?>
                        <a href="#" class="nav-tab wpb-inner-element-tab" id="wpb-tab-animation"><?php echo __('Animation', 'wp-popup-lite'); ?></a>
        <?php } ?>
                </h2>
                <div class="wpb-ind-inner-element-options-settings">
                    <div class="wpb-inner-element-tab-content" id="wpb-inner-element-wpb-tab-layer-content" style="display: block;">
        <?php if (in_array($element_val['element_field_type'], array('normal_text'))) { ?>
                            <div class="wpb-inner-element-input-wrap">
                                <label><?php echo __('Input Text', 'wp-popup-lite'); ?></label>
                                <div class="wpb-inner-element-input">
                                    <textarea name="wpb_el_val[<?php echo $element_key; ?>][normal_text]" id="wpb-inner-element-text-editor" data-field-name="id">
                            <?php echo $element_val['normal_text']; ?></textarea>
                                </div>
                            </div>
        <?php } ?>
        <?php if (in_array($element_val['element_field_type'], array('single_line_textfield'))) { ?>
                            <div class="wpb-inner-element-input-wrap">
                                <label><?php echo __('Use Field as', 'wp-popup-lite'); ?></label>
                                <div class="wpb-inner-element-input">
                                    <select name="wpb_el_val[<?php echo $element_key; ?>][single_line_text_field_type]" data-field-name="id">
                                        <option value="name-field" <?php echo $element_val['single_line_text_field_type'] == 'name-field' ? 'checked="checked"' : ''; ?>>
                                            <?php echo __('Name Field', 'wp-popup-lite'); ?></option>
                                        <option value="email-field" <?php echo $element_val['single_line_text_field_type'] == 'email-field' ? 'checked="checked"' : ''; ?>>
            <?php echo __('Email Field', 'wp-popup-lite'); ?></option>
                                    </select>
                                </div>
                            </div>
                            <div class="wpb-inner-element-input-wrap">
                                <label><?php echo __('Placeholder', 'wp-popup-lite'); ?></label>
                                <div class="wpb-inner-element-input">
                                    <input type="text" id="wpb-inner-el-inp-placeholder" name="wpb_el_val[<?php echo $element_key; ?>][single_line_text_field_type_placeholder]" data-field-name="id" value="<?php echo $element_val['single_line_text_field_type_placeholder']; ?>"/>
                                </div>
                            </div>
                            <div class="wpb-inner-element-input-wrap">
                                <label><?php echo __('Required', 'wp-popup-lite'); ?></label>
                                <div class="wpb-inner-element-input">
                                    <input type="checkbox" name="wpb_el_val[<?php echo $element_key; ?>][single_line_text_field_type_required]" data-field-name="id" <?php
                                    if (isset($element_val['single_line_text_field_type_required']) && $element_val['single_line_text_field_type_required'] == 'on') {
                                        echo 'checked="checked"';
                                    }
                                    ?>/>
                                </div>
                            </div>
        <?php } ?>
        <?php if (in_array($element_val['element_field_type'], array('bullet_text_list'))) { ?>
                            <div class="wpb-inner-element-input-wrap wpb-bullet-field-setting-wrap">
                                <div class="wpb-bullet-add-field-wrap">
                                    <label><?php echo __('Bullet Texts', 'wp-popup-lite'); ?></label>
                                    <input type="button" class="primary button-primary wpb-option-value-add" value="<?php echo __('Add Bullet Points', 'wp-popup-lite'); ?>"/>
                                </div>
                                <div class="wpb-inner-element-input">
                                    <?php
                                    if (!empty($element_val['bullet_texts']) && is_array($element_val['bullet_texts'])) {
                                        foreach ($element_val['bullet_texts'] as $key => $val) {
                                            if ($key != 'popup_bullet_elem_counter') {
                                                $popup_bulletkeyArray[$key] = $key;
                                                ?>
                                                <div class="wpb-inner-element-input-bulletfield">
                                                    <input type="text" class="wpb-inner-element-bullet-texts" id="wpb-inner-element-bullet-text-<?php echo $key; ?>" name="wpb_el_val[<?php echo $element_key; ?>][bullet_texts][<?php echo $key; ?>]" data-field-name="id" data-bullet-id="<?php echo $key; ?>" value="<?php echo $val; ?>"><span class="wpb_remov_bult_field">X</span>
                                                </div>
                                                <?php
                                            }
                                        }
                                    }
                                    ?>
                                </div>
                                <div class="wpb-inner-element-input-bulletfield-sample" style="display:none">
                                    <div class="wpb-inner-element-input-bulletfield">
                                        <input type="text" class="wpb-inner-element-bullet-texts" id="wpb-inner-element-bullet-text-popup_bullet_elem_counter" name="wpb_el_val[<?php echo $element_key; ?>][bullet_texts][popup_bullet_elem_counter]" data-field-name="id" data-bullet-id="data_bullet_id"><span class="wpb_remov_bult_field">X</span>
                                    </div>
                                </div>
                            </div>
                            <div class="wpb-inner-element-input-wrap">
                                <label><?php echo __('Bullet Points', 'wp-popup-lite'); ?></label>
                                <div class="wpb-inner-element-input">
                                    <select class="wpb-bullet-icon-type" name="wpb_el_val[<?php echo $element_key; ?>][bullet_text_bullet_type]" data-field-name="id">
                                        <option value="default"
                                        <?php
                                        if (isset($element_val['bullet_text_bullet_type']) && $element_val['bullet_text_bullet_type'] == 'default' || !isset($element_val['bullet_text_bullet_type'])) {
                                            echo 'selected="selected"';
                                        }
                                        ?>><?php echo __('Default', 'wp-popup-lite'); ?></option>
                                        <option value="square" 
                                        <?php
                                        if (isset($element_val['bullet_text_bullet_type']) && $element_val['bullet_text_bullet_type'] == 'square') {
                                            echo 'selected="selected"';
                                        }
                                        ?>><?php echo __('Square', 'wp-popup-lite'); ?></option>
                                        <option value="star"
                                        <?php
                                        if (isset($element_val['bullet_text_bullet_type']) && $element_val['bullet_text_bullet_type'] == 'star') {
                                            echo 'selected="selected"';
                                        }
                                        ?>><?php echo __('Star', 'wp-popup-lite'); ?></option>
                                        <option value="diamond"
                                        <?php
                                        if (isset($element_val['bullet_text_bullet_type']) && $element_val['bullet_text_bullet_type'] == 'diamond') {
                                            echo 'selected="selected"';
                                        }
                                        ?>><?php echo __('Diamond', 'wp-popup-lite'); ?></option>
                                        <option value="check" 
                                        <?php
                                        if (isset($element_val['bullet_text_bullet_type']) && $element_val['bullet_text_bullet_type'] == 'check') {
                                            echo 'selected="selected"';
                                        }
                                        ?>><?php echo __('Check', 'wp-popup-lite'); ?></option>
                                        <option value="cross" accesskey="<?php
                                        if (isset($element_val['bullet_text_bullet_type']) && $element_val['bullet_text_bullet_type'] == 'cross') {
                                            echo 'selected="selected"';
                                        }
                                        ?>"><?php echo __('Cross', 'wp-popup-lite'); ?></option>
                                    </select>
                                </div>
                            </div>
        <?php } ?>
        <?php if (in_array($element_val['element_field_type'], array('drop_down_select'))) { ?>
                            <div class="wpb-inner-element-input-wrap wpb-select-field-setting-wrap">
                                <div class="wpb-select-add-field-wrap">
                                    <label><?php echo __('Select Option', 'wp-popup-lite'); ?></label>
                                    <input type="button" class="wpb-select-option-value-add secondary button-secondary" value="Add New Option" />
                                </div>
                                <div class="wpb-inner-element-input">
                                    <div class="wpb-inner-element-input-option-field">
                                        <?php if (!empty($element_val['select_option']) && is_array($element_val['select_option'])) { ?>
                                            <?php
                                            foreach ($element_val['select_option'] as $key => $val) {
                                                if ($key != 'popup_select_elem_counter') {
                                                    ?>                                     
                                                    <div class="wpb-inner-element-input-selectfield">
                                                        <input type="text" class="wpb-inner-element-select-texts" id="wpb-inner-element-select-text" name="wpb_el_val[<?php echo $element_key; ?>][select_option][<?php echo $key; ?>]" data-field-name="id" value="<?php echo esc_attr($val); ?>"><span class="wpb_remov_bult_select_field">X</span>
                                                    </div>
                                                    <?php
                                                }
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="wpb-inner-element-input-selectfield-sample" style="display:none">
                                    <div class="wpb-inner-element-input-selectfield">
                                        <input type="text" class="wpb-inner-element-select-texts" id="wpb-inner-element-select-text" name="wpb_el_val[<?php echo $element_key; ?>][select_option][popup_select_elem_counter]" data-field-name="id" ><span class="wpb_remov_bult_select_field">X</span>
                                    </div>
                                </div>
                            </div>
                            <div class="wpb-inner-element-input-wrap">
                                <label><?php echo __('Placeholder', 'wp-popup-lite'); ?></label>
                                <div class="wpb-inner-element-input">
                                    <input type="text" class="wpb-inner-element-select-placeholder" id="wpb-inner-element-select-placeholder" name="wpb_el_val[<?php echo $element_key; ?>][select_placeholder]" data-field-name="id" value="<?php echo!empty($element_val['select_placeholder']) ? esc_attr($element_val['select_placeholder']) : ''; ?>"/>
                                </div>
                            </div>
        <?php } ?>
        <?php if (in_array($element_val['element_field_type'], array('text_area'))) { ?>
                            <div class="wpb-inner-element-input-wrap">
                                <label><?php echo __('Placeholder', 'wp-popup-lite'); ?></label>
                                <div class="wpb-inner-element-input">
                                    <input type="text" id="wpb-inner-el-inp-placeholder" name="wpb_el_val[<?php echo $element_key; ?>][textarea_placeholder]" data-field-name="id" value="<?php echo $element_val['textarea_placeholder']; ?>"/>
                                </div>
                            </div>
                            <div class="wpb-inner-element-input-wrap">
                                <label><?php echo __('Required', 'wp-popup-lite'); ?></label>
                                <div class="wpb-inner-element-input">
                                    <input type="checkbox" name="wpb_el_val[<?php echo $element_key; ?>][textarea_required]" data-field-name="id" <?php
                                    if (isset($element_val['textarea_required']) && $element_val['textarea_required'] == 'on') {
                                        echo 'checked="checked"';
                                    }
                                    ?>/>
                                </div>
                            </div>
        <?php } ?>
        <?php if (in_array($element_val['element_field_type'], array('submit_button'))) { ?>
                            <div class="wpb-inner-element-input-wrap">
                                <label><?php echo __('Title', 'wp-popup-lite'); ?></label>
                                <div class="wpb-inner-element-input">
                                    <input type="text" class="wpb-inner-element-submit" id="wpb-inner-element-submit-text" name="wpb_el_val[<?php echo $element_key; ?>][submit_button_title]" data-field-name="id" value="<?php echo $element_val['submit_button_title']; ?>"/>
                                </div>
                            </div>
                            <div class="wpb-inner-element-input-wrap">
                                <label><?php echo __('Loading Text', 'wp-popup-lite'); ?></label>
                                <div class="wpb-inner-element-input">
                                    <input type="text" class="wpb-inner-element-submit-loader" id="wpb-inner-element-submit-loading-text" name="wpb_el_val[<?php echo $element_key; ?>][submit_button_loading_text]" data-field-name="id" placeholder="Ajax Loader by default" value="<?php echo!empty($element_val['submit_button_loading_text']) ? $element_val['submit_button_loading_text'] : ''; ?>"/>
                                </div>
                            </div>
                            <div class="wpb-inner-element-input-wrap">
                                <label><?php echo __('Thank you Text', 'wp-popup-lite'); ?></label>
                                <div class="wpb-inner-element-input">
                                    <input type="text" class="wpb-inner-element-submit-thanks" id="wpb-inner-element-submit-thanks-text" name="wpb_el_val[<?php echo $element_key; ?>][submit_button_thanks_text]" data-field-name="id" placeholder="E.g. Thank You" value="<?php echo!empty($element_val['submit_button_thanks_text']) ? $element_val['submit_button_thanks_text'] : ''; ?>"/>
                                </div>
                            </div>
                            <div class="wpb-inner-element-input-wrap">
                                <label><?php echo __('Error Text', 'wp-popup-lite'); ?></label>
                                <div class="wpb-inner-element-input">
                                    <input type="text" class="wpb-inner-element-submit-error" id="wpb-inner-element-submit-error-text" name="wpb_el_val[<?php echo $element_key; ?>][submit_button_error_text]" data-field-name="id" placeholder="E.g. Oh snap!" value="<?php echo!empty($element_val['submit_button_error_text']) ? $element_val['submit_button_error_text'] : ''; ?>"/>
                                </div>
                            </div>
                            <div class="wpb-inner-element-input-wrap">
                                <label>
            <?php echo __('On Button Click', 'wp-popup-lite'); ?></label>
                                <div class="wpb-inner-element-input">
                                    <div class="wpb-inner-field">
                                        <input type="radio" id="wpb-submit-sction-selector-close" name="wpb_el_val[<?php echo $element_key; ?>][submit_click_event]" value="default" data-field-name="id" <?php echo isset($element_val['submit_click_event']) && $element_val['submit_click_event'] == 'default' || !isset($element_val['image_click_event']) ? 'checked="checked"' : ''; ?>/>
                                        <label for="wpb-submit-sction-selector-close"><?php echo __('Submit Form and Close Popup', 'wp-popup-lite'); ?></label>
                                    </div>
                                    <div class="wpb-inner-field">
                                        <input type="radio" id="wpb-submit-sction-selector-just-close" name="wpb_el_val[<?php echo $element_key; ?>][submit_click_event]" value="close" data-field-name="id" <?php echo isset($element_val['submit_click_event']) && $element_val['submit_click_event'] == 'close' ? 'checked="checked"' : ''; ?>/>
                                        <label for="wpb-submit-sction-selector-just-close"><?php echo __('Just Close Popup', 'wp-popup-lite'); ?></label>
                                    </div>
                                    <div class="wpb-inner-field">
                                        <input type="radio" id="wpb-submit-sction-selector-no-close" name="wpb_el_val[<?php echo $element_key; ?>][submit_click_event]" value="do-nothing" data-field-name="id" <?php echo isset($element_val['submit_click_event']) && $element_val['submit_click_event'] == 'do-nothing' ? 'checked="checked"' : ''; ?>/>
                                        <label for="wpb-submit-sction-selector-no-close"><?php echo __('Submit Form and Don\'t close popup', 'wp-popup-lite'); ?></label>
                                    </div>
                                    <div class="wpb-inner-field">
                                        <input type="radio" id="wpb-submit-sction-selector-ext-link" name="wpb_el_val[<?php echo $element_key; ?>][submit_click_event]" value="add-link" data-field-name="id" <?php echo isset($element_val['submit_click_event']) && $element_val['submit_click_event'] == 'add-link' ? 'checked="checked"' : ''; ?>/>
                                        <label for="wpb-submit-sction-selector-ext-link"><?php echo __('Submit Form and Go To This Link', 'wp-popup-lite'); ?></label>
                                        <input type="url" name="wpb_el_val[<?php echo $element_key; ?>][submit_click_event_link]" data-field-name="id" value="<?php echo esc_url($element_val['submit_click_event_link']); ?>"/>
                                    </div>
                                </div>
                            </div>
                            <div class="wpb-input-field-wrap">
                                <div class="wpb-input-field-title">
                                    <label>
                                        <h4><?php echo __('Submit Success Message', 'wp-popup-lite') ?></h4>
                                    </label>
                                </div>
                                <div class="wpb-input-field">
                                    <input type="text" class="wpb-submit-success-message" id="wpb-submit-success-message" name="wpb_el_val[<?php echo $element_key; ?>][submit_success_message]" value="<?php echo esc_attr($element_val['submit_success_message']); ?>" placeholder="<?php echo __('E.g. Form Successfully sent', 'wp-popup-lite'); ?>"/>
                                </div>
                            </div>
                            <div class="wpb-input-field-wrap">
                                <div class="wpb-input-field-title">
                                    <label>
                                        <h4><?php echo __('Submit Failure Message', 'wp-popup-lite') ?></h4>
                                    </label>
                                </div>
                                <div class="wpb-input-field">
                                    <input type="text" class="wpb-submit-failure-message" id="wpb-submit-failure-message" name="wpb_el_val[<?php echo $element_key; ?>][submit_failure_message]" value="<?php echo esc_attr($element_val['submit_failure_message']); ?>" placeholder="<?php echo __('E.g. Something went wrong. Please try again.', 'wp-popup-lite'); ?>"/>
                                </div>
                            </div>
        <?php } ?>
                                <?php if (in_array($element_val['element_field_type'], array('image'))) { ?>
                            <div class="wpb-inner-element-input-wrap">
                                <label>
            <?php echo __('Image URL', 'wp-popup-lite'); ?></label>
                                <div class="wpb-inner-element-input">
                                    <input id="wpb-upload-file-url" type="url" class="wpb-img-upload-field" name="wpb_el_val[<?php echo $element_key; ?>][image_url]" wpb-innner-opt-file-type="<?php echo $element_key; ?>"  data-field-name="id" value="<?php echo $element_val['image_url']; ?>"/>
                                    <input id="wpb-upload-file-url-button" type="button" class="wpb-img-upload-button button-secondary input-controller" value="Upload File" size="25"/>                                       
                                </div>
                            </div>
                            <div class="wpb-inner-element-input-wrap">
                                <label>
            <?php echo __('On Click Event', 'wp-popup-lite'); ?></label>
                                <div class="wpb-inner-element-input">
                                    <input type="radio" name="wpb_el_val[<?php echo $element_key; ?>][image_click_event]" value="default" data-field-name="id" <?php echo isset($element_val['image_click_event']) && $element_val['image_click_event'] == 'default' || !isset($element_val['image_click_event']) ? 'checked="checked"' : ''; ?>/><?php echo __('Do Nothing', 'wp-popup-lite'); ?>
                                    <input type="radio" name="wpb_el_val[<?php echo $element_key; ?>][image_click_event]" value="close" data-field-name="id" <?php echo isset($element_val['image_click_event']) && $element_val['image_click_event'] == 'close' ? 'checked="checked"' : ''; ?>/><?php echo __('Close Popup', 'wp-popup-lite'); ?>
                                    <input type="radio" name="wpb_el_val[<?php echo $element_key; ?>][image_click_event]" value="add-link" data-field-name="id" <?php echo isset($element_val['image_click_event']) && $element_val['image_click_event'] == 'add-link' ? 'checked="checked"' : ''; ?>/><?php echo __('Add Link', 'wp-popup-lite'); ?>
                                    <input type="text" name="wpb_el_val[<?php echo $element_key; ?>][image_click_event_link]" data-field-name="id" <?php echo isset($element_val['image_click_event_link']) && !empty($element_val['image_click_event_link']) ? $element_val['image_click_event_link'] : ''; ?>/>
                                </div>
                            </div>
        <?php } ?>
                                <?php if (in_array($element_val['element_field_type'], array('pdf'))) { ?>
                            <div class="wpb-inner-element-input-wrap">
                                <label>
            <?php echo __('PDF URL', 'wp-popup-lite'); ?></label>
                                <div class="wpb-inner-element-input">
                                    <input id="wpb-upload-pdf-file-url" type="text" class="wpb-pdf-upload-url" name="wpb_el_val[<?php echo $element_key; ?>][pdf_file_url]" wpb-innner-opt-file-type="<?php echo $element_key; ?>" class="input-controller" data-field-name="id" value="<?php echo $element_val['pdf_file_url']; ?>"/>
                                    <input id="wpb-upload-pdf-button" type="button" class="wpb-pdf-upload-button button-secondary input-controller" value="Upload PDF" size="25"/>                                       
                                </div>
                            </div>
        <?php } ?>
        <?php if (in_array($element_val['element_field_type'], array('youtube_video_embed', 'vimeo_video_embed'))) { ?>
                            <div class="wpb-inner-element-input-wrap">
                                <label><?php echo __('Video Url', 'wp-popup-lite'); ?></label>
                                <div class="wpb-inner-element-input">
                                    <textarea class="wpb-inner-element-video-url" name="wpb_el_val[<?php echo $element_key; ?>][video_url]" data-field-name="id" placeholder="<?php echo __('Enter Video URL Here', 'wp-popup-lite'); ?>"><?php echo $element_val['video_url']; ?></textarea>
                                </div>
                                <div class="wpb-error-element"></div>
                            </div>
                        <?php } ?>

        <?php if (in_array($element_val['element_field_type'], array('facebook_like'))) { ?>
                            <div class="wpb-inner-element-input-wrap">
                                <label><?php echo __('Facebook Page Name', 'wp-popup-lite'); ?></label>
                                <div class="wpb-inner-element-input">
                                    <input type="text" class="wpb-inner-element-fb-likebox" name="wpb_el_val[<?php echo $element_key; ?>][facebook_like]" data-field-name="id" value="<?php echo $element_val['facebook_like']; ?>"/>
                                </div>
                                <label class="wpb-inner-element-desc"><?php __('Get facebook like box code', 'wp-popup-lite'); ?><a href="https://developers.facebook.com/docs/plugins/page-plugin"><?php __('here', 'wp-popup-lite'); ?></a></label>
                            </div>
                            <div class="wpb-inner-element-input-wrap">
                                <label><?php echo __('Hide Cover Photo', 'wp-popup-lite'); ?></label>
                                <div class="wpb-inner-element-input">
                                    <input type="checkbox" class="wpb-inner-element-fblb-cover-type" name="wpb_el_val[<?php echo $element_key; ?>][facebook_like_cover_type]" data-field-name="id" <?php
                                    if (isset($element_val['facebook_like_cover_type']) && $element_val['facebook_like_cover_type'] == 'on') {
                                        echo 'checked="checked"';
                                    }
                                    ?>/>
                                </div>
                            </div>
                            <div class="wpb-inner-element-input-wrap">
                                <label><?php echo __('Show Friend\'s Faces', 'wp-popup-lite'); ?></label>
                                <div class="wpb-inner-element-input">
                                    <input type="checkbox" class="wpb-inner-element-fblb-friendfaces" name="wpb_el_val[<?php echo $element_key; ?>][facebook_like_friendfaces]" data-field-name="id" <?php
                                    if (isset($element_val['facebook_like_friendfaces']) && $element_val['facebook_like_friendfaces'] == 'on') {
                                        echo 'checked="checked"';
                                    }
                                    ?>/>
                                </div>
                            </div>
                            <div class="wpb-inner-element-input-wrap">
                                <label><?php echo __('Show Facebook Posts', 'wp-popup-lite'); ?></label>
                                <div class="wpb-inner-element-input">
                                    <input type="checkbox" class="wpb-inner-element-fblb-posts" name="wpb_el_val[<?php echo $element_key; ?>][facebook__posts]" data-field-name="id" <?php
                                    if (isset($element_val['facebook__posts']) && $element_val['facebook__posts'] == 'on') {
                                        echo 'checked="checked"';
                                    }
                                    ?>/>
                                </div>
                            </div>
                        <?php } ?>

        <?php if (in_array($element_val['element_field_type'], array('social_link'))) { ?>
                            <div class="wpb-inner-element-input-wrap">
                                <label><?php echo __('Facebook Link', 'wp-popup-lite'); ?></label>
                                <div class="wpb-inner-element-input">
                                    <label>
                                        <input type="checkbox" value="1" name="wpb_el_val[<?php echo $element_key; ?>][social_link_fb_enable]" data-field-name="id" <?php
                                        if (isset($element_val['social_link_fb_enable']) && $element_val['social_link_fb_enable'] == 1) {
                                            echo 'checked="checked"';
                                        }
                                        ?>/>
                                        <span><?php echo __('Hide Facebook Link', 'wp-popup-lite'); ?></span>
                                    </label>
                                    <input type="text" value="<?php echo $element_val['wp_el_type_social_fb']; ?>" placeholder="Your Facebook URL" name="wpb_el_val[<?php echo $element_key; ?>][wp_el_type_social_fb]" data-field-name="id"/>
                                </div>
                            </div>
                            <div class="wpb-inner-element-input-wrap">
                                <label><?php echo __('Twitter Link', 'wp-popup-lite'); ?></label>
                                <div class="wpb-inner-element-input">
                                    <label>
                                        <input type="checkbox" value="1" name="wpb_el_val[<?php echo $element_key; ?>][social_link_tw_enable]" <?php
                                        if (isset($element_val['social_link_tw_enable']) && $element_val['social_link_tw_enable'] == 1) {
                                            echo 'checked="checked"';
                                        }
                                        ?> data-field-name="id"/>
                                        <span><?php echo __('Hide Twitter Link', 'wp-popup-lite'); ?></span>
                                    </label>
                                    <input type="text" value="<?php echo $element_val['social_link_tw_url']; ?>" placeholder="Your Twitter URL" name="wpb_el_val[<?php echo $element_key; ?>][social_link_tw_url]" data-field-name="id"/>
                                </div>
                            </div>
                            <div class="wpb-inner-element-input-wrap">
                                <label><?php echo __('Google Plus Link', 'wp-popup-lite'); ?></label>
                                <div class="wpb-inner-element-input">
                                    <label>
                                        <input type="checkbox" value="1" name="wpb_el_val[<?php echo $element_key; ?>][social_link_gp_enable]" data-field-name="id" <?php
                                        if (isset($element_val['social_link_gp_enable']) && $element_val['social_link_gp_enable'] == 1) {
                                            echo 'checked="checked"';
                                        }
                                        ?>/>
                                        <span><?php echo __('Hide Google Plus Link', 'wp-popup-lite'); ?></span>
                                    </label>
                                    <input type="text" value="<?php echo $element_val['social_link_gp_url']; ?>" placeholder="Your Google Plus URL" name="wpb_el_val[<?php echo $element_key; ?>][social_link_gp_url]" data-field-name="id"/>
                                </div>
                            </div>
                            <div class="wpb-inner-element-input-wrap">
                                <label><?php echo __('Linkedin Link', 'wp-popup-lite'); ?></label>
                                <div class="wpb-inner-element-input">
                                    <label>
                                        <input type="checkbox" value="1" name="wpb_el_val[<?php echo $element_key; ?>][social_link_li_enable]" data-field-name="id" <?php
                                        if (isset($element_val['social_link_li_enable']) && $element_val['social_link_li_enable'] == 1) {
                                            echo 'checked="checked"';
                                        }
                                        ?>/>
                                        <span><?php echo __('Hide Linkedin Link', 'wp-popup-lite'); ?></span>
                                    </label>
                                    <input type="text" value="<?php echo $element_val['social_link_li_url']; ?>" placeholder="Your Linkedin URL" name="wpb_el_val[<?php echo $element_key; ?>][social_link_li_url]" data-field-name="id"/>
                                </div>
                            </div>
                            <div class="wpb-inner-element-input-wrap">
                                <label><?php echo __('Icon Size', 'wp-popup-lite'); ?></label>
                                <div class="wpb-inner-element-input">
                                    <input type="number" name="wpb_el_val[<?php echo $element_key; ?>][social_icon_size]" id="wpb-inner-element-social-icon-size" data-field-name="id" value="<?php echo $element_val['social_icon_size']; ?>"/><?php echo __('px', 'wp-popup-lite'); ?>
                                </div>
                            </div>
                            <div class="wpb-inner-element-input-wrap">
                                <label><?php echo __('Icon Bg Color', 'wp-popup-lite'); ?></label>
                                <div class="wpb-inner-element-input">
                                    <input type="text" name="wpb_el_val[<?php echo $element_key; ?>][social_icon_bg_color]" class="wpb-inner-el-col-pick2" id="wpb-inner-element-social-icon-bg" data-field-name="id" value="<?php echo $element_val['social_icon_bg_color']; ?>"/>
                                </div>
                            </div>
        <?php } ?>
                    </div><!-- .wpb-inner-element-wpb-tab-layer-content -->
                    <div class="wpb-inner-element-tab-content" id="wpb-inner-element-wpb-tab-general-setting" style="display: none;">
                        <div class="wpb-inner-element-input-wrap">
                            <label><?php echo __('Height', 'wp-popup-lite'); ?></label>
                            <div class="wpb-inner-element-input">
                                <input type="number" name="wpb_el_val[<?php echo $element_key; ?>][element_height]" id="wpb-inner-element-height" data-field-name="id" value="<?php echo $element_val['element_height']; ?>"/><?php echo __('px', 'wp-popup-lite'); ?>
                            </div>
                        </div>
                        <div class="wpb-inner-element-input-wrap">
                            <label><?php echo __('Width', 'wp-popup-lite'); ?></label>
                            <div class="wpb-inner-element-input">
                                <input type="number" name="wpb_el_val[<?php echo $element_key; ?>][element_width]" id="wpb-inner-element-width" data-field-name="id" value="<?php echo $element_val['element_width']; ?>"/><?php echo __('px', 'wp-popup-lite'); ?>
                            </div>
                        </div>
                        <div class="wpb-inner-element-input-wrap">
                            <label><?php echo __('Top', 'wp-popup-lite'); ?></label>
                            <div class="wpb-inner-element-input">
                                <input type="number" name="wpb_el_val[<?php echo $element_key; ?>][element_top]" id="wpb-inner-element-top" data-field-name="id" value="<?php echo $element_val['element_top']; ?>"/><?php echo __('px', 'wp-popup-lite'); ?>
                            </div>
                        </div>
                        <div class="wpb-inner-element-input-wrap">
                            <label><?php echo __('Left', 'wp-popup-lite'); ?></label>
                            <div class="wpb-inner-element-input">
                                <input type="number" name="wpb_el_val[<?php echo $element_key; ?>][element_left]" id="wpb-inner-element-left" data-field-name="id" value="<?php echo $element_val['element_left']; ?>"/><?php echo __('px', 'wp-popup-lite'); ?>
                            </div>
                        </div>
                        <div class="wpb-inner-element-input-wrap">
                            <label><?php echo __('z-index value', 'wp-popup-lite'); ?></label>
                            <div class="wpb-inner-element-input">
                                <input type="number" min="-1" max="10" id="wpb-inner-el-z-index" name="wpb_el_val[<?php echo $element_key; ?>][z_index]" id="wpb-inner-element-left" data-field-name="id" value="<?php echo $element_val['z_index']; ?>"/>
                            </div>
                        </div>
                    </div>
        <?php if (in_array($element_val['element_field_type'], array('normal_text', 'single_line_textfield', 'bullet_text_list', 'submit_button', 'drop_down_select', 'text_area'))) { ?>
                        <div class="wpb-inner-element-tab-content" id="wpb-inner-element-wpb-tab-font" style="display: none;">
                            <div class="wpb-inner-element-input-wrap">
                                <label><?php echo __('Typography', 'wp-popup-lite'); ?></label>
                                <div class="wpb-inner-element-input-wrap">
                                    <select name="wpb_el_val[<?php echo $element_key; ?>][typography]" id="wpb-inner-element-font-family" data-field-name="id">
                                        <option value=""><?php echo __('Default', 'wp-popup-lite'); ?></option>
                                        <?php foreach ($wpb_fonts as $wpb_font) { ?>
                                            <option value="<?php echo $wpb_font; ?>" <?php if ($element_val['typography'] == $wpb_font) { ?>selected="selected"<?php } ?>><?php echo $wpb_font; ?></option>
            <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="wpb-inner-element-input-wrap">
                                <label><?php echo __('Font Size', 'wp-popup-lite'); ?></label>
                                <div class="wpb-inner-element-input">
                                    <input type="number" id="wpb-inner-element-font-size" name="wpb_el_val[<?php echo $element_key; ?>][font_size]" data-field-name="id" value="<?php
                                    if (!empty($element_val['font_size'])) {
                                        echo $element_val['font_size'];
                                    }
                                    ?>"/>
                                </div>
                            </div>
                            <div class="wpb-inner-element-input-wrap">
                                <label><?php echo __('Font Color', 'wp-popup-lite'); ?></label>
                                <div class="wpb-inner-element-input">
                                    <input type="text" id="wpb-inner-element-font-color" name="wpb_el_val[<?php echo $element_key; ?>][font_color]" data-field-name="id" value="<?php
                                    if (!empty($element_val['font_color'])) {
                                        echo $element_val['font_color'];
                                    }
                                    ?>"/>
                                </div>
                            </div>
                            <div class="wpb-inner-element-input-wrap">
                                <label><?php echo __('Font Weight', 'wp-popup-lite'); ?></label>
                                <div class="wpb-inner-element-input">
                                    <select id="wpb-upl-el-font-weight" name="wpb_el_val[<?php echo $element_key; ?>][font_weight]" data-field-name="id">
                                        <option value="400" <?php if (isset($element_val['font_weight']) && $element_val['font_weight'] == 400) { ?>selected="selected"<?php } ?>><?php echo __('Normal', 'wp-popup-lite'); ?></option>
                                        <option value="100" <?php if (isset($element_val['font_weight']) && $element_val['font_weight'] == 100) { ?>selected="selected"<?php } ?>><?php echo __('Light', 'wp-popup-lite'); ?></option>
                                        <option value="500" <?php if (isset($element_val['font_weight']) && $element_val['font_weight'] == 500) { ?>selected="selected"<?php } ?>><?php echo __('Semi Bold', 'wp-popup-lite'); ?></option>
                                        <option value="700" <?php if (isset($element_val['font_weight']) && $element_val['font_weight'] == 700) { ?>selected="selected"<?php } ?>><?php echo __('Bold', 'wp-popup-lite'); ?></option>
                                        <option value="900" <?php if (isset($element_val['font_weight']) && $element_val['font_weight'] == 900) { ?>selected="selected"<?php } ?>><?php echo __('Dark Bold', 'wp-popup-lite'); ?></option>
                                    </select>  
                                </div>
                            </div>
                            <div class="wpb-inner-element-input-wrap">
                                <label><?php echo __('Text Align', 'wp-popup-lite'); ?></label>
                                <div class="wpb-inner-element-input">
                                    <select id="wpb-upl-el-text-align" name="wpb_el_val[popup_elem_id][text_align]" data-field-name="id">
                                        <option value="left" <?php if (isset($element_val['text_align']) && $element_val['text_align'] == 'left') { ?>selected="selected"<?php } ?>><?php echo __('Left', 'wp-popup-lite'); ?></option>
                                        <option value="center" <?php if (isset($element_val['text_align']) && $element_val['text_align'] == 'center') { ?>selected="selected"<?php } ?>><?php echo __('Center', 'wp-popup-lite'); ?></option>
                                        <option value="right" <?php if (isset($element_val['text_align']) && $element_val['text_align'] == 'right') { ?>selected="selected"<?php } ?>><?php echo __('Right', 'wp-popup-lite'); ?></option>
                                        <option value="justify" <?php if (isset($element_val['text_align']) && $element_val['text_align'] == 'justify') { ?>selected="selected"<?php } ?>><?php echo __('Justify', 'wp-popup-lite'); ?></option>
                                    </select>  
                                </div>
                            </div>
                        </div><!-- .wpb-inner-element-wpb-tab-font-->
                    <?php } ?>

        <?php if (in_array($element_val['element_field_type'], array('normal_text', 'single_line_textfield', 'bullet_text_list', 'submit_button', 'drop_down_select', 'text_area'))) { ?>
                        <div class="wpb-inner-element-tab-content" id="wpb-inner-element-wpb-tab-background" style="display: none;">
                            <div class="wpb-inner-element-input-wrap">
                                <label><?php echo __('Background Color', 'wp-popup-lite'); ?></label>
                                <div class="wpb-inner-element-input">
                                    <input type="text" id="wpb-inner-element-background-color" name="wpb_el_val[<?php echo $element_key; ?>][background_color]" data-field-name="id" value="<?php echo esc_attr($element_val['background_color']); ?>"/>
                                </div>
                            </div>
            <?php if (in_array($element_val['element_field_type'], array('submit_button'))) { ?>
                                <div class="wpb-inner-element-input-wrap">
                                    <label><?php echo __('Background Color Hover', 'wp-popup-lite'); ?></label>
                                    <div class="wpb-inner-element-input">
                                        <input type="text" class="wpb-inner-el-col-pick2" name="wpb_el_val[<?php echo $element_key; ?>][background_color_hover]" data-field-name="id" value="<?php echo esc_attr($element_val['background_color_hover']); ?>"/>
                                    </div>
                                </div>
            <?php } ?>
                            <div class="wpb-inner-element-input-wrap">
                                <label><?php echo __('Background Image', 'wp-popup-lite'); ?></label>
                                <div class="wpb-inner-element-input">
                                    <input class="wpb-upload-el-bg-image" id="wpb-upl-el-bg-image" type="text" name="wpb_el_val[<?php echo $element_key; ?>][background_image]" data-field-name="id" value="<?php echo esc_url($element_val['background_image']); ?>"/>
                                    <input class="wpb-upload-el-bg-image-button button-secondary" type="button" value="<?php echo __('Background Image', 'wp-popup-lite'); ?>" />
                                </div>
                            </div>
                            <div class="wpb-inner-element-input-wrap">
                                <label><?php echo __('Background Image Repeat', 'wp-popup-lite'); ?></label>
                                <div class="wpb-inner-element-input">
                                    <select id="wpb-upl-el-bg-image-repeat" name="wpb_el_val[<?php echo $element_key; ?>][background_image_repeat]" data-field-name="id">
                                        <option value="no-repeat" <?php if ($element_val['font_weight'] == 'no-repeat') { ?>selected="selected"<?php } ?>>
                                            <?php echo __('No Repeat', 'wp-popup-lite'); ?></option>
                                        <option value="repeat" <?php if ($element_val['font_weight'] == 'repeat') { ?>selected="selected"<?php } ?>>
                                            <?php echo __('Repeat', 'wp-popup-lite'); ?></option>
                                        <option value="repeat-x" <?php if ($element_val['font_weight'] == 'repeat-x') { ?>selected="selected"<?php } ?>>
                                            <?php echo __('Repeat-x', 'wp-popup-lite'); ?></option>
                                        <option value="repeat-y" <?php if ($element_val['font_weight'] == 'repeat-y') { ?>selected="selected"<?php } ?>>
            <?php echo __('Repeat-y', 'wp-popup-lite'); ?></option>
                                    </select>
                                </div>
                            </div>
                            <div class="wpb-inner-element-input-wrap">
                                <label><?php echo __('Background Opacity', 'wp-popup-lite'); ?></label>
                                <div class="wpb-inner-element-input">
                                    <select id="wpb-upl-el-bg-image-opacity" name="wpb_el_val[<?php echo $element_key; ?>][background_opacity]" data-field-name="id">
                                        <option value="1" <?php if ($element_val['background_opacity'] == 1) { ?>selected="selected"<?php } ?>>
                                            <?php echo __('1', 'wp-popup-lite'); ?></option>
                                        <option value="0.1" <?php if ($element_val['background_opacity'] == 0.1) { ?>selected="selected"<?php } ?>>
                                            <?php echo __('0.1', 'wp-popup-lite'); ?></option>
                                        <option value="0.2" <?php if ($element_val['background_opacity'] == 0.2) { ?>selected="selected"<?php } ?>>
                                            <?php echo __('0.2', 'wp-popup-lite'); ?></option>
                                        <option value="0.3" <?php if ($element_val['background_opacity'] == 0.3) { ?>selected="selected"<?php } ?>>
                                            <?php echo __('0.3', 'wp-popup-lite'); ?></option>
                                        <option value="0.4" <?php if ($element_val['background_opacity'] == 0.4) { ?>selected="selected"<?php } ?>>
                                            <?php echo __('0.4', 'wp-popup-lite'); ?></option>
                                        <option value="0.5" <?php if ($element_val['background_opacity'] == 0.5) { ?>selected="selected"<?php } ?>>
                                            <?php echo __('0.5', 'wp-popup-lite'); ?></option>
                                        <option value="0.6" <?php if ($element_val['background_opacity'] == 0.6) { ?>selected="selected"<?php } ?>>
                                            <?php echo __('0.6', 'wp-popup-lite'); ?></option>
                                        <option value="0.7" <?php if ($element_val['background_opacity'] == 0.7) { ?>selected="selected"<?php } ?>>
                                            <?php echo __('0.7', 'wp-popup-lite'); ?></option>
                                        <option value="0.8" <?php if ($element_val['background_opacity'] == 0.8) { ?>selected="selected"<?php } ?>>
                                            <?php echo __('0.8', 'wp-popup-lite'); ?></option>
                                        <option value="0.9" <?php if ($element_val['background_opacity'] == 0.9) { ?>selected="selected"<?php } ?>>
            <?php echo __('0.9', 'wp-popup-lite'); ?></option>
                                    </select>
                                </div>
                            </div>
                        </div><!-- wpb-inner-element-wpb-tab-background -->
        <?php } ?>
        <?php if (in_array($element_val['element_field_type'], array('normal_text', 'single_line_textfield', 'bullet_text_list', 'submit_button', 'drop_down_select', 'text_area'))) { ?>
                        <div class="wpb-inner-element-tab-content" id="wpb-inner-element-wpb-tab-border" style="display: none;">
                            <div class="wpb-inner-element-input-wrap">
                                <label><?php echo __('Border Type', 'wp-popup-lite'); ?></label>
                                <div class="wpb-inner-element-input">
                                    <select id="wpb-upl-el-border-type" name="wpb_el_val[<?php echo $element_key; ?>][border_type]" data-field-name="id">
                                        <option value="default" <?php if ($element_val['border_type'] == 'default') { ?>selected="selected"<?php } ?>><?php echo __('Default', 'wp-popup-lite'); ?></option>
                                        <option value="dotted" <?php if ($element_val['border_type'] == 'dotted') { ?>selected="selected"<?php } ?>><?php echo __('Dotted', 'wp-popup-lite'); ?></option>
                                        <option value="dashed" <?php if ($element_val['border_type'] == 'dashed') { ?>selected="selected"<?php } ?>><?php echo __('Dashed', 'wp-popup-lite'); ?></option>
                                        <option value="double" <?php if ($element_val['border_type'] == 'double') { ?>selected="selected"<?php } ?>><?php echo __('Double', 'wp-popup-lite'); ?></option>
                                        <option value="groove" <?php if ($element_val['border_type'] == 'groove') { ?>selected="selected"<?php } ?>><?php echo __('Groove', 'wp-popup-lite'); ?></option>
                                        <option value="ridge" <?php if ($element_val['border_type'] == 'ridge') { ?>selected="selected"<?php } ?>><?php echo __('Ridge', 'wp-popup-lite'); ?></option>
                                        <option value="inset" <?php if ($element_val['border_type'] == 'inset') { ?>selected="selected"<?php } ?>><?php echo __('Inset', 'wp-popup-lite'); ?></option>
                                    </select>
                                </div>
                            </div>
                            <div class="wpb-inner-element-input-wrap">
                                <label><?php echo __('Border Color', 'wp-popup-lite'); ?></label>
                                <div class="wpb-inner-element-input">
                                    <input type="text" id="wpb-inner-element-border-color" name="wpb_el_val[<?php echo $element_key; ?>][element_border_color]" data-field-name="id" value="<?php
                                    if (isset($element_val['element_border_color']) && !empty($element_val['element_border_color'])) {
                                        echo esc_attr($element_val['element_border_color']);
                                    }
                                    ?>"/>
                                </div>
                            </div>
                            <div class="wpb-inner-element-input-wrap">
                                <label><?php echo __('Border radius', 'wp-popup-lite'); ?></label>
                                <div class="wpb-inner-element-input">
                                    <input type="number" class="wpb-inner-el-border-radius" name="wpb_el_val[<?php echo $element_key; ?>][border_radius]" data-field-name="id" value="<?php
                                    if (isset($element_val['border_radius']) && !empty($element_val['border_radius'])) {
                                        echo esc_attr($element_val['border_radius']);
                                    }
                                    ?>"/><?php _e('px', 'wp-popup-lite'); ?>
                                </div>
                            </div>
                            <div class="wpb-inner-element-input-wrap">
                                <label><?php echo __('Border Width', 'wp-popup-lite'); ?></label>
                                <div class="wpb-inner-element-input">
                                    <input class="wpb-upload-el-border-width" id="wpb-upl-el-border-width" type="number" name="wpb_el_val[<?php echo $element_key; ?>][border_width]" data-field-name="id" value="<?php
                                    if (isset($element_val['border_width']) && !empty($element_val['border_width'])) {
                                        echo esc_attr($element_val['border_width']);
                                    }
                                    ?>"/><?php _e('px', 'wp-popup-lite'); ?>
                                </div>
                            </div>
                        </div><!-- wpb-inner-element-wpb-tab-border -->
        <?php } ?>
                    <div class="wpb-inner-element-tab-content" id="wpb-inner-element-wpb-tab-animation" style="display: none;">                          
                        <div class="wpb-inner-element-input-wrap">
                            <label><?php echo __('Animation Effect', 'wp-popup-lite'); ?></label>
                            <div class="wpb-inner-element-input">
                                <select class="wpb-animate-input-wide" id="wpb-layer-element" name="wpb_el_val[<?php echo $element_key; ?>][animation]" data-field-name="id">
                                    <option value="default" <?php if ($element_val['animation'] == 'default') { ?>selected="selected"<?php } ?>>
                                        <?php echo __('Use Default', 'wp-popup-lite'); ?></option>
                                    <option value="bounceIn" <?php if ($element_val['animation'] == 'bounceIn') { ?>selected="selected"<?php } ?>>
                                        <?php echo __('Bounce', 'wp-popup-lite'); ?></option>
                                    <option value="bounceInUp" <?php if ($element_val['animation'] == 'bounceInUp') { ?>selected="selected"<?php } ?>>
                                        <?php echo __('Bounce Up', 'wp-popup-lite'); ?></option>
                                    <option value="bounceInDown" <?php if ($element_val['animation'] == 'bounceInDown') { ?>selected="selected"<?php } ?>>
                                        <?php echo __('Bounce Down', 'wp-popup-lite'); ?></option>
                                    <option value="bounceInLeft" <?php if ($element_val['animation'] == 'bounceInLeft') { ?>selected="selected"<?php } ?>>
                                        <?php echo __('Bounce Right', 'wp-popup-lite'); ?></option>
                                    <option value="bounceInRight" <?php if ($element_val['animation'] == 'bounceInRight') { ?>selected="selected"<?php } ?>>
                                        <?php echo __('Bounce Left', 'wp-popup-lite'); ?></option>
                                    <option value="fadeIn" <?php if ($element_val['animation'] == 'fadeIn') { ?>selected="selected"<?php } ?>>
                                        <?php echo __('Fade', 'wp-popup-lite'); ?></option>
                                    <option value="fadeInUp" <?php if ($element_val['animation'] == 'fadeInUp') { ?>selected="selected"<?php } ?>>
                                        <?php echo __('Fade Up', 'wp-popup-lite'); ?></option>
                                    <option value="fadeInDown" <?php if ($element_val['animation'] == 'fadeInDown') { ?>selected="selected"<?php } ?>>
                                        <?php echo __('Fade Down', 'wp-popup-lite'); ?></option>
                                    <option value="fadeInLeft" <?php if ($element_val['animation'] == 'fadeInLeft') { ?>selected="selected"<?php } ?>>
                                        <?php echo __('Fade Right', 'wp-popup-lite'); ?></option>
                                    <option value="fadeInRight" <?php if ($element_val['animation'] == 'fadeInRight') { ?>selected="selected"<?php } ?>>
                                        <?php echo __('Fade Left', 'wp-popup-lite'); ?></option>
                                    <option value="flipInX" <?php if ($element_val['animation'] == 'flipInX') { ?>selected="selected"<?php } ?>>
                                        <?php echo __('Flip X', 'wp-popup-lite'); ?></option>
                                    <option value="flipInY" <?php if ($element_val['animation'] == 'flipInY') { ?>selected="selected"<?php } ?>>
                                        <?php echo __('Flip Y', 'wp-popup-lite'); ?></option>
                                    <option value="lightSpeedIn" <?php if ($element_val['animation'] == 'lightSpeedIn') { ?>selected="selected"<?php } ?>>
                                        <?php echo __('Light Speed', 'wp-popup-lite'); ?></option>
                                    <option value="rotateIn" <?php if ($element_val['animation'] == 'rotateIn') { ?>selected="selected"<?php } ?>>
                                        <?php echo __('Rotate', 'wp-popup-lite'); ?></option>
                                    <option value="rotateInDownLeft" <?php if ($element_val['animation'] == 'rotateInDownLeft') { ?>selected="selected"<?php } ?>>
                                        <?php echo __('Rotate Down Left', 'wp-popup-lite'); ?></option>
                                    <option value="rotateInDownRight" <?php if ($element_val['animation'] == 'rotateInDownRight') { ?>selected="selected"<?php } ?>>
                                        <?php echo __('Rotate Down Right', 'wp-popup-lite'); ?></option>
                                    <option value="rotateInUpLeft" <?php if ($element_val['animation'] == 'rotateInUpLeft') { ?>selected="selected"<?php } ?>>
                                        <?php echo __('Rotate Up Left', 'wp-popup-lite'); ?></option>
                                    <option value="rotateInUpRight" <?php if ($element_val['animation'] == 'rotateInUpRight') { ?>selected="selected"<?php } ?>>
                                        <?php echo __('Rotate Up Right', 'wp-popup-lite'); ?></option>
                                    <option value="rollIn" <?php if ($element_val['animation'] == 'rollIn') { ?>selected="selected"<?php } ?>>
                                        <?php echo __('Roll', 'wp-popup-lite'); ?></option>
                                    <option value="zoomIn" <?php if ($element_val['animation'] == 'zoomIn') { ?>selected="selected"<?php } ?>>
                                        <?php echo __('Zoom', 'wp-popup-lite'); ?></option>
                                    <option value="zoomInUp" <?php if ($element_val['animation'] == 'zoomInUp') { ?>selected="selected"<?php } ?>>
                                        <?php echo __('Zoom Up', 'wp-popup-lite'); ?></option>
                                    <option value="zoomInDown" <?php if ($element_val['animation'] == 'zoomInDown') { ?>selected="selected"<?php } ?>>
                                        <?php echo __('Zoom Down', 'wp-popup-lite'); ?></option>
                                    <option value="zoomInLeft" <?php if ($element_val['animation'] == 'zoomInLeft') { ?>selected="selected"<?php } ?>>
                                        <?php echo __('Zoom Left', 'wp-popup-lite'); ?></option>
                                    <option value="zoomInRight" <?php if ($element_val['animation'] == 'zoomInRight') { ?>selected="selected"<?php } ?>>
        <?php echo __('Zoom Right', 'wp-popup-lite'); ?></option>
                                </select>
                            </div>
                        </div>
                        <div class="wpb-inner-element-input-wrap">
                            <label><?php echo __('Duration', 'wp-popup-lite'); ?></label>
                            <div class="wpb-inner-element-input">
                                <input type="number" class="wpb-upl-el-bg-popup-duration" name="wpb_el_val[<?php echo $element_key; ?>][animate_duration]" data-field-name="id" value="<?php echo $element_val['animate_duration']; ?>"/><?php echo __('In second', 'wp-popup-lite'); ?>
                            </div>
                        </div>                                 
                        <div class="wpb-inner-element-input-wrap">
                            <label><?php echo __('Delay', 'wp-popup-lite'); ?></label>
                            <div class="wpb-inner-element-input">
                                <input type="number" class="wpb-upl-el-bg-popup-delay" name="wpb_el_val[<?php echo $element_key; ?>][animate_delay]" value="<?php echo esc_attr($element_val['animate_delay']); ?>"/><?php echo __('In second', 'wp-popup-lite'); ?>
                            </div>
                        </div>
                    </div><!-- .wpb-inner-element-wpb-ab-animation -->
                </div>
                <div class="wpb-ind-editor-close wpb-ind-inner-element-options-okay"><?php echo __('Done', 'wp-popup-lite'); ?></div>
            </div>                
            <input type="hidden" id="wpfm-el-field-type-rand" name="wpb_el_val[<?php echo $element_key; ?>][element_field_rand_val]" data-field-name="id" value="<?php echo!empty($element_val['element_field_rand_val']) ? esc_attr($element_val['element_field_rand_val']) : 0; ?>"/>
            <input type="hidden" id="wpfm-el-field-type-top" name="wpb_el_val[<?php echo $element_key; ?>][element_field_top]" data-field-name="id" value="<?php echo esc_attr($element_val['element_field_top']); ?>"/>
            <input type="hidden" id="wpfm-el-field-type-left" name="wpb_el_val[<?php echo $element_key; ?>][element_field_left]" data-field-name="id" value="<?php echo esc_attr($element_val['element_field_left']); ?>"/>
            <input type="hidden" id="wpfm-el-field-type" name="wpb_el_val[<?php echo $element_key; ?>][element_field_type]" value="<?php echo esc_attr($element_val['element_field_type']); ?>" /> 
        </div>                              
        <?php
    }
}
$max_popup_key = !empty($popup_keyArray) ? array_keys($popup_keyArray, max($popup_keyArray)) : array('0' => '0');
$max_popup_bullet_key = !empty($popup_bulletkeyArray) ? array_keys($popup_bulletkeyArray, max($popup_bulletkeyArray)) : array('0' => '0');
?>