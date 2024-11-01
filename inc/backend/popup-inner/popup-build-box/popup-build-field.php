<?php defined('ABSPATH') or die("No script kiddies please!"); ?>

<?php
$wpb_popup_fields = get_option('wpb_popup_fields');
$wpb_fonts = get_option('wpb_typo_fonts');
if (isset($custom_generated_popup) && !empty($custom_generated_popup)) {
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
}
?>
<div class="wpb-custom-popup-builder-field" id="wpb-popup-builder-tab">
    <span class="wpb-popup-element-title"><?php echo __('Popup Elements', 'wp-popup-lite'); ?></span>
    <p class="wpb-popup-element-title-des"><?php echo __('This is the basic layout design idea for custom popup. Some design may vary when on frontend.', 'wp-popup-lite'); ?></p>
    <div class="wpb-popup-element-outerwrap">
        <div class="wpb-popup-elements-wrap">
            <div class="wpb-popup-elements-inner-wrap wpb-relative">
                <?php
                $element_array = array();
                $bullet_array = array();
                if (isset($wpb_popup_fields['wpb_popup_fields']) && !empty($wpb_popup_fields['wpb_popup_fields'])) {
                    foreach ($wpb_popup_fields['wpb_popup_fields'] as $key => $val) {
                        if ($key != 'facebook_like' && $key != 'single_line_textfield' && $key !='bullet_text_list' && $key != 'drop_down_select' && $key != 'text_area' && $key != 'submit_button' && $key != 'social_link' && $key != 'vimeo_video_embed') {
                            array_push($element_array, $key);
                            ?>
                            <div class="wpb-popup-element" id="builder-loadings">                 
                                <div class="wp-popup-element-wrapper" id="builder-loading-inner">
                                    <div class="button wpb-popup-element-title" id="wpb-popup-element-<?php echo $key; ?>" data-field-type="<?php echo esc_attr($val['data_field_type']); ?>">
                                        <?php echo esc_attr($val['element_title']); ?>
                                    </div>                  
                                    <?php
                                    switch ($key) {
                                        case 'normal_text':
                                            ?>   
                                            <div class="wpb-element-inputype-sample" id="epb-element-<?php echo $key; ?>" style="display:none; width:<?php echo esc_attr($val['element_width']) . 'px'; ?>;height:<?php echo esc_attr($val['element_height']) . 'px'; ?>; text-align:left;">
                                                <p><?php echo __('Lorem Isum Dolar et.', 'wp-popup-lite'); ?></p>
                                            </div>
                                            <?php
                                            break;
                                        case 'image':
                                            ?>
                                            <div class="wpb-element-inputype-sample" id="epb-element-<?php echo $key; ?>" style="display:none">
                                                <img src="<?php echo WPP_IMAGE_DIR . '/img-placeholder.png'; ?>" style="width:<?php echo esc_attr($val['element_width']) . 'px'; ?>;height:<?php echo esc_attr($val['element_height']) . 'px'; ?>;"/>
                                            </div>
                                            <?php
                                            break;
                                        case 'pdf':
                                            ?>
                                            <div class="wpb-element-inputype-sample" id="epb-element-<?php echo $key; ?>" style="display:none; width:100%;">
                                                <div id="wpb-inner-element-pdf-ID" style="width: <?php echo esc_attr($val['element_width']) . 'px'; ?>;height:<?php echo esc_attr($val['element_height']) . 'px'; ?>;">
                                                    <iframe class="wpb-inner-element-iframe" style="width:100%;height:100%;" src="http://www.pdf995.com/samples/pdf.pdf"></iframe>
                                                </div>
                                            </div>
                                            <?php
                                            break;
                                        case 'youtube_video_embed';
                                            ?>
                                            <div class="wpb-element-inputype-sample" id="epb-element-<?php echo $key; ?>" style="display:none; width:100%; height:auto;">
                                                <?php echo __('Enter Youtube Video URL', 'wp-popup-lite'); ?>  
                                            </div>
                                            <?php
                                            break;
                                        default:
                                            ?>
                                    <?php } ?>    
                                    <div class="wpb-option-field" id="wpb-element-action-<?php echo $key; ?>" style="display: none;"> 
                                        <div class="wpb-element-editbox-opts" id="wpb-element-editbox-opts">
                                            <a class="wpb-element-edit" href="javascript:void(0)"><i class="fa fa-pencil-square-o"></i><?php echo __('Edit', 'wp-popup-lite'); ?></a>
                                            <a class="wpb-element-del" href="javascript:void(0)"><i class="fa fa-trash-o"></i><?php echo __('Delete', 'wp-popup-lite'); ?></a>
                                            <a class="wpb-element-handle-a wpb-element-handle" href="javascript:void(0)"><i class="fa fa-arrows"></i><?php echo __('Move', 'wp-popup-lite'); ?></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="wpb-ind-inner-element-options" id="pb-ind-inner-element-options-<?php echo $key; ?>" style="display:none; height:auto;">
                                    <div class="wpb-inner-element-header-section">
                                        <span><?php echo __('Element Design Settings', 'wp-popup-lite'); ?></span>
                                        <div class="wpb-ind-inner-element-options-close wpb-ind-editor-close">X</div>
                                    </div>
                                    <h2 class="wpb-nav-list nav-tab-wrapper">
                                        <?php if (in_array($key, $element_array)) { ?>
                                            <a href="#" class="nav-tab wpb-inner-element-tab nav-tab-active in-el-tab-active" id="wpb-tab-layer-content"><?php echo __('Layer Content', 'wp-popup-lite'); ?></a>
                                        <?php } ?>
                                        <?php if (in_array($key, $element_array)) { ?>
                                            <a href="#" class="nav-tab wpb-inner-element-tab" id="wpb-tab-general-setting"><?php echo __('General', 'wp-popup-lite'); ?></a>
                                        <?php } ?>
                                        <?php if (in_array($key, array('normal_text', 'single_line_textfield', 'bullet_text_list', 'submit_button', 'drop_down_select', 'text_area'))) { ?>
                                            <a href="#" class="nav-tab wpb-inner-element-tab" id="wpb-tab-font"><?php echo __('Typography', 'wp-popup-lite'); ?></a>
                                        <?php } ?>
                                        <?php if (in_array($key, array('normal_text', 'single_line_textfield', 'bullet_text_list', 'submit_button', 'drop_down_select', 'text_area'))) { ?>
                                            <a href="#" class="nav-tab wpb-inner-element-tab" id="wpb-tab-background"><?php echo __('Background', 'wp-popup-lite'); ?></a>
                                        <?php } ?>
                                        <?php if (in_array($key, array('normal_text', 'single_line_textfield', 'bullet_text_list', 'submit_button', 'drop_down_select', 'text_area'))) { ?>
                                            <a href="#" class="nav-tab wpb-inner-element-tab" id="wpb-tab-border"><?php echo __('Border', 'wp-popup-lite'); ?></a>
                                        <?php } ?>
                                        <?php if (in_array($key, $element_array)) { ?>
                                            <a href="#" class="nav-tab wpb-inner-element-tab" id="wpb-tab-animation"><?php echo __('Animation', 'wp-popup-lite'); ?></a>
                                        <?php } ?>
                                    </h2>
                                    <div class="wpb-ind-inner-element-options-settings">
                                        <div class="wpb-inner-element-tab-content" id="wpb-inner-element-wpb-tab-layer-content" style="display: block;">
                                            <?php if (in_array($key, array('normal_text'))) { ?>
                                                <div class="wpb-inner-element-input-wrap">
                                                    <label><?php echo __('Input Text', 'wp-popup-lite'); ?></label>
                                                    <div class="wpb-inner-element-input">
                                                        <textarea name="wpb_el_val[popup_elem_id][normal_text]" id="wpb-inner-element-text-editor" data-field-name="id"></textarea>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                            <?php if (in_array($key, array('single_line_textfield'))) { ?>
                                                <div class="wpb-inner-element-input-wrap">
                                                    <label><?php echo __('Use Field as', 'wp-popup-lite'); ?></label>
                                                    <div class="wpb-inner-element-input">
                                                        <select name="wpb_el_val[popup_elem_id][single_line_text_field_type]" data-field-name="id">
                                                            <option value="name-field"><?php echo __('Name Field', 'wp-popup-lite'); ?></option>
                                                            <option value="email-field"><?php echo __('Email Field', 'wp-popup-lite'); ?></option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="wpb-inner-element-input-wrap">
                                                    <label><?php echo __('Placeholder', 'wp-popup-lite'); ?></label>
                                                    <div class="wpb-inner-element-input">
                                                        <input type="text" id="wpb-inner-el-inp-placeholder" name="wpb_el_val[popup_elem_id][single_line_text_field_type_placeholder]" data-field-name="id"/>
                                                    </div>
                                                </div>
                                                <div class="wpb-inner-element-input-wrap">
                                                    <label><?php echo __('Required', 'wp-popup-lite'); ?></label>
                                                    <div class="wpb-inner-element-input">
                                                        <input type="checkbox" name="wpb_el_val[popup_elem_id][single_line_text_field_type_required]" data-field-name="id"/>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                            <?php if (in_array($key, array('text_area'))) { ?>
                                                <div class="wpb-inner-element-input-wrap">
                                                    <label><?php echo __('Placeholder', 'wp-popup-lite'); ?></label>
                                                    <div class="wpb-inner-element-input">
                                                        <input type="text" id="wpb-inner-el-inp-placeholder" name="wpb_el_val[popup_elem_id][textarea_placeholder]" data-field-name="id"/>
                                                    </div>
                                                </div>
                                                <div class="wpb-inner-element-input-wrap">
                                                    <label><?php echo __('Required', 'wp-popup-lite'); ?></label>
                                                    <div class="wpb-inner-element-input">
                                                        <input type="checkbox" name="wpb_el_val[popup_elem_id][textarea_required]" data-field-name="id"/>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                            <?php if (in_array($key, array('bullet_text_list'))) { ?>
                                                <div class="wpb-inner-element-input-wrap wpb-bullet-field-setting-wrap">
                                                    <div class="wpb-bullet-add-field-wrap">
                                                        <label><?php echo __('Bullet Texts', 'wp-popup-lite'); ?></label>
                                                        <input type="button" class="primary button-primary wpb-option-value-add" value="<?php echo __('Add Bullet Points', 'wp-popup-lite'); ?>"/>
                                                    </div>
                                                    <div class="wpb-inner-element-input"></div>
                                                    <div class="wpb-inner-element-input-bulletfield-sample" style="display:none">
                                                        <div class="wpb-inner-element-input-bulletfield">
                                                            <input type="text" class="wpb-inner-element-bullet-texts" id="wpb-inner-element-bullet-text-popup_bullet_elem_counter" name="wpb_el_val[popup_elem_id][bullet_texts][popup_bullet_elem_counter]" data-field-name="id" data-bullet-id="data_bullet_id"><span class="wpb_remov_bult_field">X</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="wpb-inner-element-input-wrap">
                                                    <label><?php echo __('Bullet Points', 'wp-popup-lite'); ?></label>
                                                    <div class="wpb-inner-element-input">
                                                        <select class="wpb-bullet-icon-type" name="wpb_el_val[popup_elem_id][bullet_text_bullet_type]" data-field-name="id">
                                                            <option value="default"><?php echo __('Default', 'wp-popup-lite'); ?></option>
                                                            <option value="square"><?php echo __('Square', 'wp-popup-lite'); ?></option>
                                                            <option value="star"><?php echo __('Star', 'wp-popup-lite'); ?></option>
                                                            <option value="check"><?php echo __('Check', 'wp-popup-lite'); ?></option>
                                                            <option value="cross"><?php echo __('Cross', 'wp-popup-lite'); ?></option>

                                                        </select>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                            <?php if (in_array($key, array('drop_down_select'))) { ?>
                                                <div class="wpb-inner-element-input-wrap wpb-select-field-setting-wrap">
                                                    <div class="wpb-select-add-field-wrap">
                                                        <label><?php echo __('Select Option', 'wp-popup-lite'); ?></label>
                                                        <input type="button" class="wpb-select-option-value-add secondary button-secondary" value="Add New Option" />
                                                    </div>
                                                    <div class="wpb-inner-element-input"></div>
                                                    <div class="wpb-inner-element-input-selectfield-sample" style="display:none">
                                                        <div class="wpb-inner-element-input-selectfield">
                                                            <input type="text" class="wpb-inner-element-select-texts" id="wpb-inner-element-select-text" name="wpb_el_val[popup_elem_id][select_option][popup_select_elem_counter]" data-field-name="id" ><span class="wpb_remov_bult_select_field">X</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="wpb-inner-element-input-wrap">
                                                    <label><?php echo __('Placeholder', 'wp-popup-lite'); ?></label>
                                                    <div class="wpb-inner-element-input">
                                                        <input type="text" class="wpb-inner-element-select-placeholder" id="wpb-inner-element-select-placeholder" name="wpb_el_val[popup_elem_id][select_placeholder]" data-field-name="id"/>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                            <?php if (in_array($key, array('submit_button'))) { ?>
                                                <div class="wpb-inner-element-input-wrap">
                                                    <label><?php echo __('Title', 'wp-popup-lite'); ?></label>
                                                    <div class="wpb-inner-element-input">
                                                        <input type="text" class="wpb-inner-element-submit" id="wpb-inner-element-submit-text" name="wpb_el_val[popup_elem_id][submit_button_title]" data-field-name="id"/>
                                                    </div>
                                                </div>
                                                <div class="wpb-inner-element-input-wrap">
                                                    <label><?php echo __('Loading Text', 'wp-popup-lite'); ?></label>
                                                    <div class="wpb-inner-element-input">
                                                        <input type="text" class="wpb-inner-element-submit-loader" id="wpb-inner-element-submit-loading-text" name="wpb_el_val[popup_elem_id][submit_button_loading_text]" data-field-name="id" placeholder="Ajax Loader by default"/>
                                                    </div>
                                                </div>
                                                <div class="wpb-inner-element-input-wrap">
                                                    <label><?php echo __('Thank you Text', 'wp-popup-lite'); ?></label>
                                                    <div class="wpb-inner-element-input">
                                                        <input type="text" class="wpb-inner-element-submit-thanks" id="wpb-inner-element-submit-thanks-text" name="wpb_el_val[popup_elem_id][submit_button_thanks_text]" data-field-name="id" placeholder="E.g. Thank You"/>
                                                    </div>
                                                </div>
                                                <div class="wpb-inner-element-input-wrap">
                                                    <label><?php echo __('Error Text', 'wp-popup-lite'); ?></label>
                                                    <div class="wpb-inner-element-input">
                                                        <input type="text" class="wpb-inner-element-submit-error" id="wpb-inner-element-submit-error-text" name="wpb_el_val[popup_elem_id][submit_button_error_text]" data-field-name="id" placeholder="E.g. Oh snap!"/>
                                                    </div>
                                                </div>
                                                <div class="wpb-input-field-wrap">
                                                    <div class="wpb-input-field-title">
                                                        <label>
                                                            <h4><?php echo __('Submit Success Message', 'wp-popup-lite') ?></h4>
                                                        </label>
                                                    </div>
                                                    <div class="wpb-input-field">
                                                        <input type="text" class="wpb-submit-success-message" id="wpb-submit-success-message" name="wpb_el_val[popup_elem_id][submit_success_message]" data-field-name="id" placeholder="<?php echo __('E.g. Form Successfully sent', 'wp-popup-lite'); ?>"/>
                                                    </div>
                                                </div>
                                                <div class="wpb-input-field-wrap">
                                                    <div class="wpb-input-field-title">
                                                        <label>
                                                            <h4><?php echo __('Submit Failure Message', 'wp-popup-lite') ?></h4>
                                                        </label>
                                                    </div>
                                                    <div class="wpb-input-field">
                                                        <input type="text" class="wpb-submit-failure-message" id="wpb-submit-failure-message" name="wpb_el_val[popup_elem_id][submit_failure_message]" data-field-name="id" placeholder="<?php echo __('E.g. Something went wrong. Please try again.', 'wp-popup-lite'); ?>"/>
                                                    </div>
                                                </div>
                                                <div class="wpb-inner-element-input-wrap">
                                                    <label>
                                                        <?php echo __('On Button Click', 'wp-popup-lite'); ?>
                                                    </label>
                                                    <div class="wpb-inner-element-input">
                                                        <div class="wpb-inner-field">
                                                            <select name="wpb_el_val[popup_elem_id][submit_click_event]">
                                                                <option value="do-nothing"><?php echo __('Submit Form and Don\'t close popup', 'wp-popup-lite'); ?></option>
                                                                <option value="default"><?php echo __('Submit Form and Close Popup', 'wp-popup-lite'); ?></option>
                                                                <option value="close"><?php echo __('Just Close Popup', 'wp-popup-lite'); ?></option>
                                                                <option value="add-link"><?php echo __('Submit Form and Go To This Link', 'wp-popup-lite'); ?></option>
                                                            </select>
                                                            <input type="url" name="wpb_el_val[popup_elem_id][submit_click_event_link]" data-field-name="id" />
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                            <?php if (in_array($key, array('image'))) { ?>
                                                <div class="wpb-inner-element-input-wrap">
                                                    <label>
                                                        <?php echo __('Image URL', 'wp-popup-lite'); ?></label>
                                                    <div class="wpb-inner-element-input">
                                                        <input id="wpb-upload-file-url" type="url" class="wpb-img-upload-field" name="wpb_el_val[popup_elem_id][image_url]" wpb-innner-opt-file-type="<?php echo $key; ?>"  data-field-name="id"/>
                                                        <input id="wpb-upload-file-url-button" type="button" class="wpb-img-upload-button button-secondary input-controller" value="Upload File" size="25"/>                                       
                                                    </div>
                                                </div>
                                                <div class="wpb-inner-element-input-wrap">
                                                    <label>
                                                        <?php echo __('On Click Event', 'wp-popup-lite'); ?></label>
                                                    <div class="wpb-inner-element-input">
                                                        <input type="radio" name="wpb_el_val[popup_elem_id][image_click_event]" value="default" data-field-name="id" checked="checked"/><?php echo __('Do Nothing', 'wp-popup-lite'); ?>
                                                        <input type="radio" name="wpb_el_val[popup_elem_id][image_click_event]" value="close" data-field-name="id"/><?php echo __('Close Popup', 'wp-popup-lite'); ?>
                                                        <input type="radio" name="wpb_el_val[popup_elem_id][image_click_event]" value="add-link" data-field-name="id"/><?php echo __('Add Link', 'wp-popup-lite'); ?>
                                                        <input type="text" name="wpb_el_val[popup_elem_id][image_click_event_link]" data-field-name="id" />
                                                    </div>
                                                </div>
                                            <?php } ?>
                                            <?php if (in_array($key, array('pdf'))) { ?>
                                                <div class="wpb-inner-element-input-wrap">
                                                    <label>
                                                        <?php echo __('PDF URL', 'wp-popup-lite'); ?></label>
                                                    <div class="wpb-inner-element-input">
                                                        <input id="wpb-upload-pdf-file-url" type="text" class="wpb-pdf-upload-url" name="wpb_el_val[popup_elem_id][pdf_file_url]" wpb-innner-opt-file-type="<?php echo $key; ?>" class="input-controller" data-field-name="id"/>
                                                        <input id="wpb-upload-pdf-button" type="button" class="wpb-pdf-upload-button button-secondary input-controller" value="Upload PDF" size="25"/>                                       
                                                    </div>
                                                </div>
                                            <?php } ?>
                                            <?php if (in_array($key, array('youtube_video_embed', 'vimeo_video_embed'))) { ?>
                                                <div class="wpb-inner-element-input-wrap">
                                                    <label><?php echo __('Video Url', 'wp-popup-lite'); ?></label>
                                                    <div class="wpb-inner-element-input">
                                                        <textarea class="wpb-inner-element-video-url" name="wpb_el_val[popup_elem_id][video_url]" data-field-name="id" placeholder="<?php echo __('Enter Video URL Here', 'wp-popup-lite'); ?>"></textarea>
                                                    </div>
                                                    <div class="wpb-error-element"></div>
                                                </div>
                                            <?php } ?>

                                            <?php if (in_array($key, array('facebook_like'))) { ?>
                                                <div class="wpb-inner-element-input-wrap">
                                                    <label><?php echo __('Facebook Page Name', 'wp-popup-lite'); ?></label>
                                                    <div class="wpb-inner-element-input">
                                                        <input type="text" class="wpb-inner-element-fb-likebox" name="wpb_el_val[popup_elem_id][facebook_like]" data-field-name="id"/>
                                                    </div>
                                                    <label class="wpb-inner-element-desc"><?php __('Get my facebook like box code', 'wp-popup-lite'); ?><a target="_blank" href="https://developers.facebook.com/docs/plugins/page-plugin"><?php __('here', 'wp-popup-lite'); ?></a></label>
                                                </div>
                                                <div class="wpb-inner-element-input-wrap">
                                                    <label><?php echo __('Hide Cover Photo', 'wp-popup-lite'); ?></label>
                                                    <div class="wpb-inner-element-input">
                                                        <input type="checkbox" class="wpb-inner-element-fblb-cover-type" name="wpb_el_val[popup_elem_id][facebook_like_cover_type]" data-field-name="id"/>
                                                    </div>
                                                </div>
                                                <div class="wpb-inner-element-input-wrap">
                                                    <label><?php echo __('Show Friend\'s Faces', 'wp-popup-lite'); ?></label>
                                                    <div class="wpb-inner-element-input">
                                                        <input type="checkbox" class="wpb-inner-element-fblb-friendfaces" name="wpb_el_val[popup_elem_id][facebook_like_friendfaces]" data-field-name="id"/>
                                                    </div>
                                                </div>
                                                <div class="wpb-inner-element-input-wrap">
                                                    <label><?php echo __('Show Facebook Posts', 'wp-popup-lite'); ?></label>
                                                    <div class="wpb-inner-element-input">
                                                        <input type="checkbox" class="wpb-inner-element-fblb-posts" name="wpb_el_val[popup_elem_id][facebook__posts]" data-field-name="id"/>
                                                    </div>
                                                </div>
                                            <?php } ?>

                                            <?php if (in_array($key, array('social_link'))) { ?>
                                                <div class="wpb-inner-element-input-wrap">
                                                    <label><?php echo __('Facebook Link', 'wp-popup-lite'); ?></label>
                                                    <div class="wpb-inner-element-input">
                                                        <label>
                                                            <input type="checkbox" value="1" name="wpb_el_val[popup_elem_id][social_link_fb_enable]" data-field-name="id"/>
                                                            <span><?php echo __('Hide Facebook Link', 'wp-popup-lite'); ?></span>
                                                        </label>
                                                        <input type="text" value="" placeholder="Your Facebook URL" name="wpb_el_val[popup_elem_id][wp_el_type_social_fb]" data-field-name="id"/>
                                                    </div>
                                                </div>
                                                <div class="wpb-inner-element-input-wrap">
                                                    <label><?php echo __('Twitter Link', 'wp-popup-lite'); ?></label>
                                                    <div class="wpb-inner-element-input">
                                                        <label>
                                                            <input type="checkbox" value="1" name="wpb_el_val[popup_elem_id][social_link_tw_enable]" data-field-name="id"/>
                                                            <span><?php echo __('Hide Twitter Link', 'wp-popup-lite'); ?></span>
                                                        </label>
                                                        <input type="text" value="" placeholder="Your Twitter URL" name="wpb_el_val[popup_elem_id][social_link_tw_url]" data-field-name="id"/>
                                                    </div>
                                                </div>
                                                <div class="wpb-inner-element-input-wrap">
                                                    <label><?php echo __('Google Plus Link', 'wp-popup-lite'); ?></label>
                                                    <div class="wpb-inner-element-input">
                                                        <label>
                                                            <input type="checkbox" value="1" name="wpb_el_val[popup_elem_id][social_link_gp_enable]" data-field-name="id"/>
                                                            <span><?php echo __('Hide Google Plus Link', 'wp-popup-lite'); ?></span>
                                                        </label>
                                                        <input type="text" value="" placeholder="Your Google Plus URL" name="wpb_el_val[popup_elem_id][social_link_gp_url]" data-field-name="id"/>
                                                    </div>
                                                </div>
                                                <div class="wpb-inner-element-input-wrap">
                                                    <label><?php echo __('Linkedin Link', 'wp-popup-lite'); ?></label>
                                                    <div class="wpb-inner-element-input">
                                                        <label>
                                                            <input type="checkbox" value="1" name="wpb_el_val[popup_elem_id][social_link_li_enable]" data-field-name="id"/>
                                                            <span><?php echo __('Hide Linkedin Link', 'wp-popup-lite'); ?></span>
                                                        </label>
                                                        <input type="text" value="" placeholder="Your Linkedin URL" name="wpb_el_val[popup_elem_id][social_link_li_url]" data-field-name="id"/>
                                                    </div>
                                                </div>
                                                <div class="wpb-inner-element-input-wrap">
                                                    <label><?php echo __('Icon Size', 'wp-popup-lite'); ?></label>
                                                    <div class="wpb-inner-element-input">
                                                        <input type="number" name="wpb_el_val[popup_elem_id][social_icon_size]" id="wpb-inner-element-social-icon-size" data-field-name="id"/><?php echo __('px', 'wp-popup-lite'); ?>
                                                    </div>
                                                </div>
                                                <div class="wpb-inner-element-input-wrap">
                                                    <label><?php echo __('Icon Bg Color', 'wp-popup-lite'); ?></label>
                                                    <div class="wpb-inner-element-input">
                                                        <input type="text" name="wpb_el_val[popup_elem_id][social_icon_bg_color]" class="wpb-inner-el-col-pick2" id="wpb-inner-element-social-icon-bg" data-field-name="id"/><?php echo __('px', 'wp-popup-lite'); ?>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div><!-- .wpb-inner-element-wpb-tab-layer-content -->
                                        <div class="wpb-inner-element-tab-content" id="wpb-inner-element-wpb-tab-general-setting" style="display: none;">
                                            <!-- something -->
                                            <?php
                                            switch ($key) {
                                                case 'normal_text':
                                                    ?>   
                                                    <div class="wpb-inner-element-input-wrap">
                                                        <label><?php echo __('Width', 'wp-popup-lite'); ?></label>
                                                        <div class="wpb-inner-element-input">
                                                            <input type="number" name="wpb_el_val[popup_elem_id][element_width]" id="wpb-inner-element-width" data-field-name="id" value="<?php echo esc_attr($val['element_width']); ?>"/><?php echo __('px', 'wp-popup-lite'); ?>
                                                        </div>
                                                    </div>
                                                    <div class="wpb-inner-element-input-wrap">
                                                        <label><?php echo __('Height', 'wp-popup-lite'); ?></label>
                                                        <div class="wpb-inner-element-input">
                                                            <input type="number" name="wpb_el_val[popup_elem_id][element_height]" id="wpb-inner-element-height" data-field-name="id" value="<?php echo esc_attr($val['element_height']); ?>"/><?php echo __('px', 'wp-popup-lite'); ?>
                                                        </div>
                                                    </div>
                                                    <?php
                                                    break;
                                                case 'submit_button':
                                                    ?>
                                                    <div class="wpb-inner-element-input-wrap">
                                                        <label><?php echo __('Width', 'wp-popup-lite'); ?></label>
                                                        <div class="wpb-inner-element-input">
                                                            <input type="number" name="wpb_el_val[popup_elem_id][element_width]" id="wpb-inner-element-width" data-field-name="id" value="<?php echo esc_attr($val['element_width']); ?>"/><?php echo __('px', 'wp-popup-lite'); ?>
                                                        </div>
                                                    </div>
                                                    <div class="wpb-inner-element-input-wrap">
                                                        <label><?php echo __('Height', 'wp-popup-lite'); ?></label>
                                                        <div class="wpb-inner-element-input">
                                                            <input type="number" name="wpb_el_val[popup_elem_id][element_height]" id="wpb-inner-element-height" data-field-name="id" value="<?php echo esc_attr($val['element_height']); ?>"/><?php echo __('px', 'wp-popup-lite'); ?>
                                                        </div>
                                                    </div>
                                                    <?php
                                                    break;
                                                case 'image':
                                                    ?>
                                                    <div class="wpb-inner-element-input-wrap">
                                                        <label><?php echo __('Width', 'wp-popup-lite'); ?></label>
                                                        <div class="wpb-inner-element-input">
                                                            <input type="number" name="wpb_el_val[popup_elem_id][element_width]" id="wpb-inner-element-width" data-field-name="id" value="<?php echo esc_attr($val['element_width']); ?>"/><?php echo __('px', 'wp-popup-lite'); ?>
                                                        </div>
                                                    </div>
                                                    <div class="wpb-inner-element-input-wrap">
                                                        <label><?php echo __('Height', 'wp-popup-lite'); ?></label>
                                                        <div class="wpb-inner-element-input">
                                                            <input type="number" name="wpb_el_val[popup_elem_id][element_height]" id="wpb-inner-element-height" data-field-name="id" value="<?php echo esc_attr($val['element_height']); ?>"/><?php echo __('px', 'wp-popup-lite'); ?>
                                                        </div>
                                                    </div>
                                                    <?php
                                                    break;
                                                case 'text_area':
                                                    ?>
                                                    <div class="wpb-inner-element-input-wrap">
                                                        <label><?php echo __('Width', 'wp-popup-lite'); ?></label>
                                                        <div class="wpb-inner-element-input">
                                                            <input type="number" name="wpb_el_val[popup_elem_id][element_width]" id="wpb-inner-element-width" data-field-name="id" value="<?php echo esc_attr($val['element_width']); ?>"/><?php echo __('px', 'wp-popup-lite'); ?>
                                                        </div>
                                                    </div>
                                                    <div class="wpb-inner-element-input-wrap">
                                                        <label><?php echo __('Height', 'wp-popup-lite'); ?></label>
                                                        <div class="wpb-inner-element-input">
                                                            <input type="number" name="wpb_el_val[popup_elem_id][element_height]" id="wpb-inner-element-height" data-field-name="id" value="<?php echo esc_attr($val['element_height']); ?>"/><?php echo __('px', 'wp-popup-lite'); ?>
                                                        </div>
                                                    </div>
                                                    <?php
                                                    break;
                                                case 'pdf':
                                                    ?>
                                                    <div class="wpb-inner-element-input-wrap">
                                                        <label><?php echo __('Width', 'wp-popup-lite'); ?></label>
                                                        <div class="wpb-inner-element-input">
                                                            <input type="number" name="wpb_el_val[popup_elem_id][element_width]" id="wpb-inner-element-width" data-field-name="id" value="<?php echo esc_attr($val['element_width']); ?>"/><?php echo __('px', 'wp-popup-lite'); ?>
                                                        </div>
                                                    </div>
                                                    <div class="wpb-inner-element-input-wrap">
                                                        <label><?php echo __('Height', 'wp-popup-lite'); ?></label>
                                                        <div class="wpb-inner-element-input">
                                                            <input type="number" name="wpb_el_val[popup_elem_id][element_height]" id="wpb-inner-element-height" data-field-name="id" value="<?php echo esc_attr($val['element_height']); ?>"/><?php echo __('px', 'wp-popup-lite'); ?>
                                                        </div>
                                                    </div>
                                                    <?php
                                                    break;
                                                case 'youtube_video_embed';
                                                    ?>
                                                    <div class="wpb-inner-element-input-wrap">
                                                        <label><?php echo __('Width', 'wp-popup-lite'); ?></label>
                                                        <div class="wpb-inner-element-input">
                                                            <input type="number" name="wpb_el_val[popup_elem_id][element_width]" id="wpb-inner-element-width" data-field-name="id" value="<?php echo esc_attr($val['element_width']); ?>"/><?php echo __('px', 'wp-popup-lite'); ?>
                                                        </div>
                                                    </div>
                                                    <div class="wpb-inner-element-input-wrap">
                                                        <label><?php echo __('Height', 'wp-popup-lite'); ?></label>
                                                        <div class="wpb-inner-element-input">
                                                            <input type="number" name="wpb_el_val[popup_elem_id][element_height]" id="wpb-inner-element-height" data-field-name="id" value="<?php echo esc_attr($val['element_height']); ?>"/><?php echo __('px', 'wp-popup-lite'); ?>
                                                        </div>
                                                    </div>
                                                    <?php
                                                    break;
                                                case'facebook_like';
                                                    ?>
                                                    <div class="wpb-inner-element-input-wrap">
                                                        <label><?php echo __('Width', 'wp-popup-lite'); ?></label>
                                                        <div class="wpb-inner-element-input">
                                                            <input type="number" name="wpb_el_val[popup_elem_id][element_width]" id="wpb-inner-element-width" data-field-name="id" value="<?php echo esc_attr($val['element_width']); ?>"/><?php echo __('px', 'wp-popup-lite'); ?>
                                                        </div>
                                                    </div>
                                                    <div class="wpb-inner-element-input-wrap">
                                                        <label><?php echo __('Height', 'wp-popup-lite'); ?></label>
                                                        <div class="wpb-inner-element-input">
                                                            <input type="number" name="wpb_el_val[popup_elem_id][element_height]" id="wpb-inner-element-height" data-field-name="id" value="<?php echo esc_attr($val['element_height']); ?>"/><?php echo __('px', 'wp-popup-lite'); ?>
                                                        </div>
                                                    </div>
                                                    <?php
                                                    break;
                                                default:
                                                    ?>
                                            <?php } ?>   
                                            <div class="wpb-inner-element-input-wrap">
                                                <label><?php echo __('Top', 'wp-popup-lite'); ?></label>
                                                <div class="wpb-inner-element-input">
                                                    <input type="number" name="wpb_el_val[popup_elem_id][element_top]" id="wpb-inner-element-top" data-field-name="id"/><?php echo __('px', 'wp-popup-lite'); ?>
                                                </div>
                                            </div>
                                            <div class="wpb-inner-element-input-wrap">
                                                <label><?php echo __('Left', 'wp-popup-lite'); ?></label>
                                                <div class="wpb-inner-element-input">
                                                    <input type="number" name="wpb_el_val[popup_elem_id][element_left]" id="wpb-inner-element-left" data-field-name="id"/><?php echo __('px', 'wp-popup-lite'); ?>
                                                </div>
                                            </div>
                                            <div class="wpb-inner-element-input-wrap">
                                                <label><?php echo __('z-index value', 'wp-popup-lite'); ?></label>
                                                <div class="wpb-inner-element-input">
                                                    <input type="number" min="1" max="10" id="wpb-inner-el-z-index" name="wpb_el_val[popup_elem_id][z_index]" id="wpb-inner-element-left" data-field-name="id"/>
                                                </div>
                                            </div>
                                        </div>
                                        <?php if (in_array($key, array('normal_text', 'single_line_textfield', 'bullet_text_list', 'submit_button', 'drop_down_select', 'text_area'))) { ?>
                                            <div class="wpb-inner-element-tab-content" id="wpb-inner-element-wpb-tab-font" style="display: none;">
                                                <div class="wpb-inner-element-input-wrap">
                                                    <label><?php echo __('Typography', 'wp-popup-lite'); ?></label>
                                                    <div class="wpb-inner-element-input-wrap">
                                                        <select name="wpb_el_val[popup_elem_id][typography]" id="wpb-inner-element-font-family" data-field-name="id">
                                                            <option value="default">Default</option>
                                                            <?php foreach ($wpb_fonts as $wpb_font) { ?>
                                                                <option value="<?php echo $wpb_font; ?>"><?php echo $wpb_font; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="wpb-inner-element-input-wrap">
                                                    <label><?php echo __('Font Size', 'wp-popup-lite'); ?></label>
                                                    <div class="wpb-inner-element-input">
                                                        <input type="number" id="wpb-inner-element-font-size" name="wpb_el_val[popup_elem_id][font_size]" data-field-name="id"/>
                                                    </div>
                                                </div>
                                                <div class="wpb-inner-element-input-wrap">
                                                    <label><?php echo __('Font Color', 'wp-popup-lite'); ?></label>
                                                    <div class="wpb-inner-element-input">
                                                        <input type="text" id="wpb-inner-element-font-color" name="wpb_el_val[popup_elem_id][font_color]" data-field-name="id"/>
                                                    </div>
                                                </div>
                                                <div class="wpb-inner-element-input-wrap">
                                                    <label><?php echo __('Font Weight', 'wp-popup-lite'); ?></label>
                                                    <div class="wpb-inner-element-input">
                                                        <select id="wpb-upl-el-font-weight" name="wpb_el_val[popup_elem_id][font_weight]" data-field-name="id">
                                                            <option value="400"><?php echo __('Normal', 'wp-popup-lite'); ?></option>
                                                            <option value="100"><?php echo __('Light', 'wp-popup-lite'); ?></option>
                                                            <option value="500"><?php echo __('Semi Bold', 'wp-popup-lite'); ?></option>
                                                            <option value="700"><?php echo __('Bold', 'wp-popup-lite'); ?></option>
                                                            <option value="900"><?php echo __('Dark Bold', 'wp-popup-lite'); ?></option>
                                                        </select>  
                                                    </div>
                                                </div>
                                                <div class="wpb-inner-element-input-wrap">
                                                    <label><?php echo __('Text Align', 'wp-popup-lite'); ?></label>
                                                    <div class="wpb-inner-element-input">
                                                        <select id="wpb-upl-el-text-align" name="wpb_el_val[popup_elem_id][text_align]" data-field-name="id">
                                                            <option value="left"><?php echo __('Left', 'wp-popup-lite'); ?></option>
                                                            <option value="center"><?php echo __('Center', 'wp-popup-lite'); ?></option>
                                                            <option value="right"><?php echo __('Right', 'wp-popup-lite'); ?></option>
                                                            <option value="justify"><?php echo __('Justify', 'wp-popup-lite'); ?></option>
                                                        </select>  
                                                    </div>
                                                </div>
                                            </div><!-- .wpb-inner-element-wpb-tab-font-->
                                        <?php } ?>

                                        <?php if (in_array($key, array('normal_text', 'single_line_textfield', 'bullet_text_list', 'submit_button', 'drop_down_select', 'text_area'))) { ?>
                                            <div class="wpb-inner-element-tab-content" id="wpb-inner-element-wpb-tab-background" style="display: none;">
                                                <div class="wpb-inner-element-input-wrap">
                                                    <label><?php echo __('Background Color', 'wp-popup-lite'); ?></label>
                                                    <div class="wpb-inner-element-input">
                                                        <input type="text" id="wpb-inner-element-background-color" name="wpb_el_val[popup_elem_id][background_color]" data-field-name="id"/>
                                                    </div>
                                                </div>
                                                <?php if (in_array($key, array('submit_button'))) { ?>
                                                    <div class="wpb-inner-element-input-wrap">
                                                        <label><?php echo __('Background Color Hover', 'wp-popup-lite'); ?></label>
                                                        <div class="wpb-inner-element-input">
                                                            <input type="text" class="wpb-inner-el-col-pick2" name="wpb_el_val[popup_elem_id][background_color_hover]" data-field-name="id"/>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                                <div class="wpb-inner-element-input-wrap">
                                                    <label><?php echo __('Background Image', 'wp-popup-lite'); ?></label>
                                                    <div class="wpb-inner-element-input">
                                                        <input class="wpb-upload-el-bg-image" id="wpb-upl-el-bg-image" type="text" name="wpb_el_val[popup_elem_id][background_image]" data-field-name="id"/>
                                                        <input class="wpb-upload-el-bg-image-button button-secondary" type="button" value="<?php echo __('Background Image', 'wp-popup-lite'); ?>" />
                                                    </div>
                                                </div>
                                                <div class="wpb-inner-element-input-wrap">
                                                    <label><?php echo __('Background Image Repeat', 'wp-popup-lite'); ?></label>
                                                    <div class="wpb-inner-element-input">
                                                        <select id="wpb-upl-el-bg-image-repeat" name="wpb_el_val[popup_elem_id][background_image_repeat]" data-field-name="id">
                                                            <option value="no-repeat"><?php echo __('No Repeat', 'wp-popup-lite'); ?></option>
                                                            <option value="repeat"><?php echo __('Repeat', 'wp-popup-lite'); ?></option>
                                                            <option value="repeat-x"><?php echo __('Repeat-x', 'wp-popup-lite'); ?></option>
                                                            <option value="repeat-y"><?php echo __('Repeat-y', 'wp-popup-lite'); ?></option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="wpb-inner-element-input-wrap">
                                                    <label><?php echo __('Background Opacity', 'wp-popup-lite'); ?></label>
                                                    <div class="wpb-inner-element-input">
                                                        <select id="wpb-upl-el-bg-image-opacity" name="wpb_el_val[popup_elem_id][background_opacity]" data-field-name="id">
                                                            <option value="1"><?php echo __('None', 'wp-popup-lite'); ?></option>
                                                            <option value="0.1"><?php echo __('0.1', 'wp-popup-lite'); ?></option>
                                                            <option value="0.2"><?php echo __('0.2', 'wp-popup-lite'); ?></option>
                                                            <option value="0.3"><?php echo __('0.3', 'wp-popup-lite'); ?></option>
                                                            <option value="0.4"><?php echo __('0.4', 'wp-popup-lite'); ?></option>
                                                            <option value="0.5"><?php echo __('0.5', 'wp-popup-lite'); ?></option>
                                                            <option value="0.6"><?php echo __('0.6', 'wp-popup-lite'); ?></option>
                                                            <option value="0.7"><?php echo __('0.7', 'wp-popup-lite'); ?></option>
                                                            <option value="0.8"><?php echo __('0.8', 'wp-popup-lite'); ?></option>
                                                            <option value="0.9"><?php echo __('0.9', 'wp-popup-lite'); ?></option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div><!-- wpb-inner-element-wpb-tab-background -->
                                        <?php } ?>
                                        <?php if (in_array($key, array('normal_text', 'single_line_textfield', 'bullet_text_list', 'submit_button', 'drop_down_select', 'text_area'))) { ?>
                                            <div class="wpb-inner-element-tab-content" id="wpb-inner-element-wpb-tab-border" style="display: none;">
                                                <div class="wpb-inner-element-input-wrap">
                                                    <label><?php echo __('Border Type', 'wp-popup-lite'); ?></label>
                                                    <div class="wpb-inner-element-input">
                                                        <select id="wpb-upl-el-border-type" name="wpb_el_val[popup_elem_id][border_type]" data-field-name="id">
                                                            <option value="default" selected="selected"><?php echo __('Default', 'wp-popup-lite'); ?></option>
                                                            <option value="dotted"><?php echo __('Dotted', 'wp-popup-lite'); ?></option>
                                                            <option value="dashed"><?php echo __('Dashed', 'wp-popup-lite'); ?></option>
                                                            <option value="double"><?php echo __('Double', 'wp-popup-lite'); ?></option>
                                                            <option value="groove"><?php echo __('Groove', 'wp-popup-lite'); ?></option>
                                                            <option value="ridge"><?php echo __('Ridge', 'wp-popup-lite'); ?></option>
                                                            <option value="inset"><?php echo __('Inset', 'wp-popup-lite'); ?></option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="wpb-inner-element-input-wrap">
                                                    <label><?php echo __('Border Color', 'wp-popup-lite'); ?></label>
                                                    <div class="wpb-inner-element-input">
                                                        <input type="text" id="wpb-inner-element-border-color" name="wpb_el_val[popup_elem_id][element_border_color]" data-field-name="id"/>
                                                    </div>
                                                </div>
                                                <div class="wpb-inner-element-input-wrap">
                                                    <label><?php echo __('Border radius', 'wp-popup-lite'); ?></label>
                                                    <div class="wpb-inner-element-input">
                                                        <input type="number" class="wpb-inner-el-border-radius" name="wpb_el_val[popup_elem_id][border_radius]" data-field-name="id"/><?php _e('px', 'wp-popup-lite'); ?>
                                                    </div>
                                                </div>
                                                <div class="wpb-inner-element-input-wrap">
                                                    <label><?php echo __('Border Width', 'wp-popup-lite'); ?></label>
                                                    <div class="wpb-inner-element-input">
                                                        <input class="wpb-upload-el-border-width" id="wpb-upl-el-border-width" type="number" name="wpb_el_val[popup_elem_id][border_width]" data-field-name="id"/><?php _e('px', 'wp-popup-lite'); ?>
                                                    </div>
                                                </div>
                                            </div><!-- wpb-inner-element-wpb-tab-border -->
                                        <?php } ?>

                                        <div class="wpb-inner-element-tab-content" id="wpb-inner-element-wpb-tab-animation" style="display: none;">                          
                                            <div class="wpb-inner-element-input-wrap">
                                                <label><?php echo __('Animation Effect', 'wp-popup-lite'); ?></label>
                                                <div class="wpb-inner-element-input">
                                                    <select class="wpb-animate-input-wide" id="wpb-layer-element" name="wpb_el_val[popup_elem_id][animation]" data-field-name="id">
                                                        <option value="default"><?php echo __('Use Default', 'wp-popup-lite'); ?></option>
                                                        <option value="bounceIn"><?php echo __('Bounce', 'wp-popup-lite'); ?></option>
                                                        <option value="bounceInUp"><?php echo __('Bounce Up', 'wp-popup-lite'); ?></option>
                                                        <option value="bounceInDown"><?php echo __('Bounce Down', 'wp-popup-lite'); ?></option>
                                                        <option value="bounceInLeft"><?php echo __('Bounce Right', 'wp-popup-lite'); ?></option>
                                                        <option value="bounceInRight"><?php echo __('Bounce Left', 'wp-popup-lite'); ?></option>
                                                        <option value="fadeIn"><?php echo __('Fade', 'wp-popup-lite'); ?></option>
                                                        <option value="fadeInUp"><?php echo __('Fade Up', 'wp-popup-lite'); ?></option>
                                                        <option value="fadeInDown"><?php echo __('Fade Down', 'wp-popup-lite'); ?></option>
                                                        <option value="fadeInLeft"><?php echo __('Fade Right', 'wp-popup-lite'); ?></option>
                                                        <option value="fadeInRight"><?php echo __('Fade Left', 'wp-popup-lite'); ?></option>
                                                        <option value="flipInX"><?php echo __('Flip X', 'wp-popup-lite'); ?></option>
                                                        <option value="flipInY"><?php echo __('Flip Y', 'wp-popup-lite'); ?></option>
                                                        <option value="lightSpeedIn"><?php echo __('Light Speed', 'wp-popup-lite'); ?></option>
                                                        <option value="rotateIn"><?php echo __('Rotate', 'wp-popup-lite'); ?></option>
                                                        <option value="rotateInDownLeft"><?php echo __('Rotate Down Left', 'wp-popup-lite'); ?></option>
                                                        <option value="rotateInDownRight"><?php echo __('Rotate Down Right', 'wp-popup-lite'); ?></option>
                                                        <option value="rotateInUpLeft"><?php echo __('Rotate Up Left', 'wp-popup-lite'); ?></option>
                                                        <option value="rotateInUpRight"><?php echo __('Rotate Up Right', 'wp-popup-lite'); ?></option>
                                                        <option value="rollIn"><?php echo __('Roll', 'wp-popup-lite'); ?></option>
                                                        <option value="zoomIn"><?php echo __('Zoom', 'wp-popup-lite'); ?></option>
                                                        <option value="zoomInUp"><?php echo __('Zoom Up', 'wp-popup-lite'); ?></option>
                                                        <option value="zoomInDown"><?php echo __('Zoom Down', 'wp-popup-lite'); ?></option>
                                                        <option value="zoomInLeft"><?php echo __('Zoom Right', 'wp-popup-lite'); ?></option>
                                                        <option value="zoomInRight"><?php echo __('Zoom Left', 'wp-popup-lite'); ?></option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="wpb-inner-element-input-wrap">
                                                <label><?php echo __('Duration', 'wp-popup-lite'); ?></label>
                                                <div class="wpb-inner-element-input">
                                                    <input type="number" class="wpb-upl-el-bg-popup-duration" name="wpb_el_val[popup_elem_id][animate_duration]" data-field-name="id"/><?php echo __('In second', 'wp-popup-lite'); ?>
                                                </div>
                                            </div>                                 
                                            <div class="wpb-inner-element-input-wrap">
                                                <label><?php echo __('Delay', 'wp-popup-lite'); ?></label>
                                                <div class="wpb-inner-element-input">
                                                    <input type="number" class="wpb-upl-el-bg-popup-delay" name="wpb_el_val[popup_elem_id][animate_delay]"/><?php echo __('In second', 'wp-popup-lite'); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="wpb-ind-editor-close wpb-ind-inner-element-options-okay"><?php echo __('Done', 'wp-popup-lite'); ?></div>
                                </div>                
                                <input type="hidden" id="wpfm-el-field-type-rand" name="wpb_el_val[popup_elem_id][element_field_rand_val]" data-field-name="id" />
                                <input type="hidden" id="wpfm-el-field-type-top" name="wpb_el_val[popup_elem_id][element_field_top]" data-field-name="id" />
                                <input type="hidden" id="wpfm-el-field-type-left" name="wpb_el_val[popup_elem_id][element_field_left]" data-field-name="id" />
                                <input type="hidden" id="wpfm-el-field-type" name="wpb_el_val[popup_elem_id][element_field_type]" value="<?php echo $key; ?>" data-field-name="id" /> 
                            </div>

                        <?php }
                    }
                }
                ?>
            </div>              
        </div>
    </div><!-- .wpb-popup-element-outerwrap -->
    <div class="wpb-ui-custom-pp-builder-wrap">
        <div class="wpb-ui-draggable ui-draggable-handle" style="height:<?php echo (isset($edit) && !empty($wpb_height)) ? $wpb_height : '500'; ?>px; width:<?php echo (isset($edit) && !empty($wpb_width)) ? $wpb_width : '500'; ?>px; text-align:center; margin: 0 auto; position:relative; 
             background-color:<?php echo (isset($edit) && !empty($wpb_mpopup_color)) ? $wpb_mpopup_color : ''; ?>; border:<?php echo (isset($edit) && isset($wpb_popup_border) && $wpb_popup_border == 'yes') ? esc_attr($wpb_border_size) . 'px' : ''; ?> <?php echo (isset($edit) && isset($wpb_popup_border) && $wpb_popup_border == 'yes') ? esc_attr($wpb_border_type) : ''; ?> <?php echo (isset($edit) && isset($wpb_popup_border) && $wpb_popup_border == 'yes') ? esc_attr($wpb_border_color) : ''; ?>;">   
             <?php
             if (isset($edit) && isset($custom_generated_popup) && !empty($custom_generated_popup)) {
                 include(WPP_ABSPATH . '/inc/backend/popup-inner/popup-build-box/popup-build-field-editbox.php');
             }
             ?>
        </div>
    </div>
    <div class="hidden-bullet-temp-container" style="display:none;"></div>
</div><!-- .wpb-custom-popup-builder-field #wpb-popup-builder-tab -->
<input type="hidden" name="element_count" value="<?php
if (isset($edit) && isset($custom_generated_popup) && !empty($custom_generated_popup)) {
    echo $max_popup_key[0];
} else {
    echo '0';
}
?>" class="wpb-menu-count"/>

<input type="hidden" name="wpb_opt[bullet_element_count]" value="<?php
if (isset($edit) && isset($custom_generated_popup)) {
    echo $max_popup_bullet_key[0];
} else {
    echo 0;
}
?>" class="bullet-element-count"/>

<input type="hidden" name="wpb_opt[select_option_count]" value="<?php
if (isset($edit) && isset($custom_generated_popup) && !empty($custom_generated_popup) && !empty($parameteres['popup_parameters']['select_option_count'])) {
    echo esc_attr($parameteres['popup_parameters']['select_option_count']);
} else {
    echo 0;
}
?>" class="select-option-count"/>