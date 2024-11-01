(function ($) {
    $(function () {
        $('.wpb-setting-tabs-trigger').click(function () {
            $('.wpb-setting-tabs-trigger').removeClass('nav-tab-active');
            $(this).addClass('nav-tab-active');
            var board_id = 'tab-' + $(this).attr('id');
            $('.wpb-setting-tab-contents').hide();
            $('#' + board_id).show();
        });
        $('.wpb-general-tab-trigger').click(function () {
            $('.wpb-general-tab-trigger').removeClass('nav-tab-active');
            $(this).addClass('nav-tab-active');
            var board_id = 'tab-' + $(this).attr('id');
            $('.wpb-general-tab-contents').hide();
            $('#' + board_id).show();
        });
        // Switch popup custom builder and inbuild theme
        $('body').on("change", ".wpb-popup-theme-option", function () {
            $('.wpb-theme').removeClass('wpb-active-theme-type');
            $(this).parent().addClass('wpb-active-theme-type');
            if ($(this).val() == 'builtin') {
                $('.wpb-builtin-popup-theme-section').show();
                $('.wpb-custom-popup-field-section').hide();
                $('a#wpb-default-theme-setting').show();
                $('.wpb-general-tab-contents').hide();
                $('.wpb-general-tab-trigger').removeClass('nav-tab-active');
                $('a#wpb-default-theme-setting').addClass('nav-tab-active');
                $('#tab-wpb-default-theme-setting').show();
                $('.wpb-basic-layout-setting-size').hide();
                $('.wpb-general-field-background').hide();
                $('.wpb-general-field-background-color').hide();
            } else {
                $('.wpb-builtin-popup-theme-section').hide();
                $('.wpb-custom-popup-field-section').show();
                $('.wpb-general-tab-contents').hide(); //hide all tab
                $('a#wpb-default-theme-setting').hide(); //default theme tab hide
                $('#tab-wpb-default-theme-setting').hide(); //default theme content hide
                $('.wpb-general-tab-trigger').removeClass('nav-tab-active'); //remove active from all tab
                $('a#wpb-basic-layout-setting').addClass('nav-tab-active'); //add active tab to basic layout setting
                $('#tab-wpb-basic-layout-setting').show(); //show content of basic layout setting
                $('.wpb-basic-layout-setting-size').show();
                $('.wpb-general-field-background').show();
                $('.wpb-general-field-background-color').show();
            }
        });

        $("#wpb_form").bind("keypress", function (e) {
            if (e.keyCode == 13) {
                return false;
            }
        });
        /** Drag and Drop Popup Builder */
        $(".wpb-ui-draggable").droppable({
            accept: '.wpb-popup-element',
            toleranceType: 'pointer',
            hoverClass: "cell-highlight",
            drop: function (event, ui) {
                var Rand_val = Math.floor(Math.random() * 100000000);
                var Randa_val = Math.floor(Math.random() * 100);
                var element_counter = $('.wpb-menu-count').val();
                element_counter++;
                var wpb_elem_clone = $(ui.helper).clone().draggable();
                $(this).append(wpb_elem_clone);
                wpb_elem_clone.css('left', Randa_val);
                wpb_elem_clone.css('top', Randa_val);
                $(this).parents('.wpb-popup-element').find('.wpb-inner-element-top').val(Randa_val);
                $(this).parents('.wpb-popup-element').find('.wpb-inner-element-left').val(Randa_val);
                $(".wpb-ui-draggable .wpb-popup-element").addClass("wpb-popup-inner-element");
                $(".wpb-ui-draggable .wpb-popup-inner-element").removeClass("wpb-popup-element");
                $(".wpb-ui-draggable .wpb-popup-inner-element").find(".wpb-popup-element-title").remove();
                $(".wpb-ui-draggable .wpb-popup-inner-element").find(".wpb-element-inputype-sample").show();
                $(this).find('.wpb-ind-inner-element-options').css({
                    'height': 'auto'
                });
                $(this).find('#wpfm-el-field-type-rand').val(Rand_val);

                // Element Background Image Live Preview Inside Droppable       
                $('.wpb-upload-el-bg-image-button').on("click", function (e) {
                    e.preventDefault();
                    tthis = $(this);
                    var image_formfieldID = jQuery(this).parent().children('input.wpb-upload-el-bg-image').attr("id");
                    var image = wp.media({
                        title: 'Upload Image',
                        multiple: true
                    }).open()
                            .on('select', function () {
                                var uploaded_image = image.state().get('selection').first();
                                var el_bg_img_url = uploaded_image.toJSON().url;
                                $(tthis).parent().find('input#' + image_formfieldID).val(el_bg_img_url);
                                $(tthis).parents('.wpb-popup-inner-element').find('.wpb-element-inputype-sample').css('background-image', 'url(' + el_bg_img_url + ')');
                            });
                });

                // Element Parent Image Live Preview Inside Droppable       
                $('.wpb-img-upload-button').on("click", function (e) {
                    e.preventDefault();
                    var formfieldID = jQuery(this).parent().children('input.wpb-img-upload-field').attr("id");
                    var $this = $(this);
                    var image = wp.media({
                        title: 'Upload Image',
                        multiple: true
                    }).open()
                            .on('select', function (e) {
                                var uploaded_image = image.state().get('selection').first();
                                var el_img_url = uploaded_image.toJSON().url;
                                $($this).parent().children('input#' + formfieldID).val(el_img_url);
                                $($this).parent().children('input#' + formfieldID).parents('.wpb-ui-draggable').find('.wpb-element-inputype-sample img').attr('src', el_img_url);
                            });
                });

                // Element PDF Upload Live Preview Inside Droppable       
                $('.wpb-pdf-upload-button').on("click", function (e) {
                    e.preventDefault();
                    var formfieldID = jQuery(this).parent().children('input.wpb-pdf-upload-url').attr("id");
                    var $this = $(this);
                    var pdf = wp.media({
                        title: 'Upload PDF',
                        multiple: true
                    }).open()
                            .on('select', function (e) {
                                var uploaded_pdf = pdf.state().get('selection').first();
                                var el_pdf_url = uploaded_pdf.toJSON().url;
                                $($this).parent().children('input#' + formfieldID).val(el_pdf_url);
                                $($this).parents('.wpb-ui-draggable').find('.wpb-inner-element-iframe').attr('src', el_pdf_url);
                                $($this).parents('.wpb-ui-draggable').find('#wpb-inner-element-pdf-ID p').html('');
                            });
                });
                $('.wpb-ui-draggable #wpb-inner-element-background-color').wpColorPicker(myOptions_eelement_bg_color);
                $('.wpb-ui-draggable #wpb-inner-element-font-color').wpColorPicker(myOptions_font_color);
                $('.wpb-ui-draggable .wpb-inner-el-col-pick2').wpColorPicker();
                $('.wpb-ui-draggable #wpb-inner-element-social-icon-bg').wpColorPicker(myOptions_icon_bg_color);
                $('.wpb-ui-draggable #wpb-inner-element-border-color').wpColorPicker(myOptions_border_color);

                // Code for element id replace
                $('.wpb-ui-draggable input').each(function () {
                    var name_attr = $(this).attr('name');
                    if (name_attr) {
                        name_attr = name_attr.replace('popup_elem_id', element_counter);
                        $(this).attr('name', name_attr);
                    }
                });

                $('.wpb-ui-draggable select').each(function () {
                    var name_attr2 = $(this).attr('name');
                    if (name_attr2) {
                        name_attr2 = name_attr2.replace('popup_elem_id', element_counter);
                        $(this).attr('name', name_attr2);
                    }
                });

                $('.wpb-ui-draggable textarea').each(function () {
                    var name_attr3 = $(this).attr('name');
                    if (name_attr3) {
                        name_attr3 = name_attr3.replace('popup_elem_id', element_counter);
                        $(this).attr('name', name_attr3);
                    }
                });

                $('.wpb-menu-count').val(element_counter);
            }
        }); //Droppable ends here

        //Initialize draggable for element  
        $('.wpb-ui-draggable').on('mouseenter', '.wpb-popup-inner-element',
                function () {
                    if ($(this).hasClass('ui-draggable'))
                    {
                        $(this).draggable({
                            containment: ".wpb-custom-popup-builder-field",
                            connectWith: '.wpb-ui-draggable',
                            start: function (event, ui) {
                                ui.helper.addClass('snp-builder');
                                $(this).draggable("option", "cursorAt", {
                                    left: Math.floor(ui.helper.width() / 2),
                                    top: Math.floor(ui.helper.height() / 2)
                                });
                            },
                            stop: function (event, ui) {
                                ui.helper.removeClass('hover');
                            },
                            drag: function () {
                                var element_left_pos = $(this).position().left
                                var element_top_pos = $(this).position().top
                                $(this).find('#wpb-inner-element-left').val(element_left_pos);
                                $(this).find('#wpb-inner-element-top').val(element_top_pos);
                                var element_left = $(this).closest('.wpb-popup-inner-element').css("left");
                                var element_top = $(this).closest('.wpb-popup-inner-element').css("top");
                                $(this).closest('.wpb-popup-inner-element').find('#wpfm-el-field-type-left').val(element_left);
                                $(this).closest('.wpb-popup-inner-element').find('#wpfm-el-field-type-top').val(element_top);
                            }
                        });
                    }
                });

        //Initialize resizable for element
        $('.wpb-ui-draggable').on('mouseenter', '.wpb-element-inputype-sample',
                function () {
                    var input_sample_id = $(this).attr('id');
                    if (input_sample_id == 'epb-element-image' || input_sample_id == 'epb-element-pdf' || input_sample_id == 'epb-element-youtube_video_embed'
                            || input_sample_id == 'epb-element-facebook_like' || input_sample_id == 'epb-element-facebook_like') {
                        $(this).removeClass('ui-resizable');
                    } else {
                        $(this).addClass('ui-resizable');
                    }
                    if ($(this).hasClass('ui-resizable'))
                    {
                        var aspectRatio = false;
                        $(this).resizable({
                            handles: 'all',
                            autoHide: true,
                            aspectRatio: aspectRatio,
                            handles: "se",
                            start: function (event, ui) {
                                ui.helper.addClass('hover');
                            },
                            stop: function (event, ui) {
                                var element_width = ui.size.width;
                                var element_height = ui.size.height;
                                // passing value to editor
                                $(this).parents('.wpb-popup-inner-element').find('#wpb-inner-element-width').val(element_width);
                                $(this).parents('.wpb-popup-inner-element').find('#wpb-inner-element-height').val(element_height);
                            },
                            resize: function (event, ui) {
                            }
                        });
                        $(this).find('.ui-resizable-handle').show();
                    }
                });

        // Initialize draggable for element option field
        $('.wpb-ui-draggable').on('mouseenter', '.wpb-ind-inner-element-options',
                function () {
                    if (!$(this).hasClass('ui-draggable'))
                    {
                        $(this).draggable({
                            containment: ".wpb_manage_popups",
                            start: function (event, ui) {
                                ui.helper.addClass('hover');
                                $(this).css({'z-index': '100001'});
                            },
                            stop: function (event, ui) {
                                ui.helper.removeClass('hover');
                            },
                            drag: function (event, ui) {
                            }
                        });
                    }
                });

        //$('.wpb-ind-inner-element-options').draggable();

        // Show inner element action option on hover on element                
        $('body').on('mouseenter', '.wpb-ui-draggable .wp-popup-element-wrapper', function () {
            $(this).addClass('wpb-hover-element');
        });

        // Hide inner element action option on hover leave
        $('body').on('mouseleave', '.wpb-ui-draggable .wp-popup-element-wrapper', function () {
            $(this).removeClass().addClass('wp-popup-element-wrapper');
        });

        // Delete entire element and its settings on click delete
        $('.wpb-ui-draggable').on("click", ".wpb-element-del", function (e) {
            e.preventDefault();
            if (confirm('Delete this element? All of it\'s associated settings will also be deleted.')) {
                $(this).closest('.wpb-popup-inner-element').fadeOut(200, function () {
                    $(this).remove();
                });
            }
            return false;
        });

        // Individual element Inner setting show
        $('.wpb-ui-draggable').on("click", ".wpb-element-edit", function (e) {
            e.preventDefault();
            $(this).closest('.wpb-popup-inner-element').children('.wpb-ind-inner-element-options').show();
        });

        // Button close for element option field 
        $('.wpb-ui-draggable').on("click", ".wpb-ind-editor-close", function (e) {
            e.preventDefault();
            $(this).closest('.wpb-popup-inner-element').children('.wpb-ind-inner-element-options').hide();
            $(this).closest('.wpb-popup-inner-element').children('.wpb-ind-inner-element-options').css
                    ({
                        'position': 'absolute',
                        'top': '100%',
                        'left': 'absolute',
                        'margin-top': 'absolute'
                    });
            $(this).closest('.wpb-popup-inner-element').children('.wpb-inner-element-tab').remove().addClass('nav-tab wpb-inner-element-tab');
            $(this).closest('.wpb-popup-inner-element').children('#wpb-tab-layer-content').remove().addClass('nav-tab wpb-inner-element-tab nav-tab-active');
        });

        //Active class for Element setting option
        $('.wpb-ui-draggable').on("click", ".wpb-inner-element-tab", function (e) {
            e.preventDefault();
            var tab_class = $('.wpb-inner-element-tab');
            tab_class.removeClass('nav-tab-active in-el-tab-active');
            var id = $(this).attr('id');
            $(this).addClass('nav-tab-active in-el-tab-active');
            $(this).parents('.wpb-ind-inner-element-options').find('.wpb-inner-element-tab-content').hide();
            $(this).closest('.wpb-ind-inner-element-options').find('#wpb-inner-element-' + id + '').show();
        });

        //Text editor live preview
        $('.wpb-ui-draggable').on("keyup", "#wpb-inner-element-text-editor", function (e) {
            var normal_text = $(this).val().replace(/\r\n|\r|\n/g, "<br/>");
            $(this).parents('.wpb-popup-inner-element').find('.wpb-element-inputype-sample p').html(normal_text);
        });

        // Element placeholder preview
        $('.wpb-ui-draggable').on("keyup", "#wpb-inner-el-inp-placeholder", function (e) {
            $(this).parents('.wpb-popup-inner-element').find('.wpb-element-inputype-sample p').html($(this).val());
        });

        //Add Element for bulletlist text
        var bullet_counter = $('.bullet-element-count').val();
        $('body').on('click', '.wpb-option-value-add', function () {
            bullet_counter++;
            var html = $(this).parents('.wpb-bullet-field-setting-wrap').find('.wpb-inner-element-input-bulletfield-sample').clone().html();
            $(this).parents('.wpb-custom-popup-builder-field').find('.hidden-bullet-temp-container').html(html);
            $('.hidden-bullet-temp-container input').each(function () {
                var name_attr = $(this).attr('name');
                var id_attr = $(this).attr('id');
                var data_id_attr = $(this).attr('data-bullet-id');
                if (name_attr) {
                    name_attr = name_attr.replace('popup_bullet_elem_counter', bullet_counter);
                    $(this).attr('name', name_attr);
                }
                if (id_attr) {
                    id_attr = id_attr.replace(id_attr, 'wpb-inner-element-bullet-text-' + bullet_counter);
                    $(this).attr('id', id_attr);
                }
                if (data_id_attr) {
                    data_id_attr = data_id_attr.replace(data_id_attr, bullet_counter);
                    $(this).attr('data-bullet-id', data_id_attr);
                }
            });
            var html_content = $('.hidden-bullet-temp-container').html();
            $(this).parents('.wpb-bullet-field-setting-wrap').children('.wpb-inner-element-input').append(html_content);
            $(this).parents('.wpb-popup-inner-element').find('.wpb-points-ul').append('<li id="wpb-pointlist-text-' + bullet_counter + '"></li>');
            $('.bullet-element-count').val(bullet_counter);
        });

        //Live preview Pointlist Text
        $('body').on('keyup', '.wpb-ui-draggable .wpb-inner-element-bullet-texts', function () {
            var id_attr = $(this).attr('id');
            var data_id_attr = $(this).attr('data-bullet-id');
            $('input#' + id_attr).parents('.wpb-popup-inner-element').find('.wpb-initial-bullet-text-sample').remove();
            $('input#' + id_attr).parents('.wpb-popup-inner-element').find('#wpb-pointlist-text-' + data_id_attr).html('');
            $('input#' + id_attr).parents('.wpb-popup-inner-element').find('.wpb-points-ul').find('li#wpb-pointlist-text-' + data_id_attr).html($(this).val());
        });

        //Remove Point Text on remove x clicked
        $('body').on("click", ".wpb_remov_bult_field", function (e) {
            e.preventDefault();
            var data_id = $(this).parent().find('.wpb-inner-element-bullet-texts').attr('id');
            var data_id_val = $(this).parent().find('.wpb-inner-element-bullet-texts').data('bullet-id');
            $(this).parent().parents('.wpb-popup-inner-element').find('.wpb-element-inputype-sample').find('li#wpb-pointlist-text-' + data_id_val).remove();
            $('input#' + data_id).parent('div').remove();
        });

        //Bullet Icon type
        $('body').on("change", ".wpb-bullet-icon-type", function (e) {
            e.preventDefault();
            var bullet_icon_val = $(this).val();
            $(this).parents('.wpb-popup-inner-element').find('.wpb-element-inputype-sample').removeClass().addClass('wpb-element-inputype-sample ui-resizable ui-resizable-autohide wpb-bullet-icon-type-' + bullet_icon_val);
        });

        //Add option for select option
        var select_counter = $('.select-option-count').val();
        $('body').on('click', '.wpb-select-option-value-add', function () {
            select_counter++;
            var html = $(this).parents('.wpb-select-field-setting-wrap').find('.wpb-inner-element-input-selectfield-sample').clone().html();
            $(this).parents('.wpb-custom-popup-builder-field').find('.hidden-bullet-temp-container').html(html);
            $('.hidden-bullet-temp-container input').each(function () {
                var name_attr = $(this).attr('name');
                if (name_attr) {
                    name_attr = name_attr.replace('popup_select_elem_counter', select_counter);
                    $(this).attr('name', name_attr);
                }
            });
            var html_content = $('.hidden-bullet-temp-container').html();
            $(this).parents('.wpb-select-field-setting-wrap').children('.wpb-inner-element-input').append(
                    html_content
                    );

            $('.select-option-count').val(select_counter);
        });

        //Remove Select Field Options
        $('body').on("click", ".wpb_remov_bult_select_field", function (e) {
            e.preventDefault();
            $(this).parent('div').remove();
        });

        //Select Placeholder Text
        $('.wpb-ui-draggable').on("keyup", ".wpb-inner-element-select-placeholder", function () {
            $(this).parents('.wpb-popup-inner-element').find('.wpb-element-inputype-sample p').html($(this).val());
        });

        // Submit Button Title Text
        $('.wpb-ui-draggable').on("keyup", ".wpb-inner-element-submit", function (e) {
            $(this).parents('.wpb-popup-inner-element').find('.wpb-element-inputype-sample p').html($(this).val());
        });

        // Element Element parent Image Live Preview        
        $('.wpb-img-upload-button').on("click", function (e) {
            e.preventDefault();
            var formfieldID = jQuery(this).parent().children('input.wpb-img-upload-field').attr("id");
            var $this = $(this);
            var image = wp.media({
                title: 'Upload Image',
                multiple: true
            }).open()
                    .on('select', function (e) {
                        var uploaded_image = image.state().get('selection').first();
                        var el_img_url = uploaded_image.toJSON().url;
                        $($this).parent().children('input#' + formfieldID).val(el_img_url);
                        $($this).parent().children('input#' + formfieldID).parents('.wpb-ui-draggable').find('.wpb-element-inputype-sample img').attr('src', el_img_url);
                    });
        });

        // URL Youtube Video Embed
        function wpb_get_yt_video_id(url) {
            var regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/;
            var match = url.match(regExp);
            if (match && match[2].length == 11) {
                return match[2];
            } else {
                return 'false';
            }
        }
        // URL Vimeo Video Embed
        function wpb_get_vim_video_id(url) {
            var vimeoReg = /https?:\/\/(?:www\.)?vimeo.com\/(?:channels\/(?:\w+\/)?|groups\/([^\/]*)\/videos\/|album\/(\d+)\/video\/|)(\d+)(?:$|\/|\?)/;
            var match = url.match(vimeoReg);
            if (match) {
                return match[3];
            } else {
                return 'false';
            }
        }

        // Youtube and Vimeo Video Live preview Option
        $('.wpb-ui-draggable').on("keyup", ".wpb-inner-element-video-url", function (e) {
            var video_id1 = wpb_get_yt_video_id($(this).val());
            var video_id2 = wpb_get_vim_video_id($(this).val());
            var input_sample_id = $(this).parents('.wpb-popup-inner-element').find('.wpb-element-inputype-sample').attr('id');
            if (input_sample_id == 'epb-element-youtube_video_embed' && video_id1 != 'false') {
                $(this).parents('.wpb-popup-inner-element').find('.wpb-element-inputype-sample').html('<iframe width="560" height="315" id ="wpb-inner-element-vid-ID" src="//www.youtube.com/embed/' + video_id1 + '" frameborder="0" allowfullscreen></iframe>');
                $(this).parents('.wpb-inner-element-input-wrap').find('.wpb-error-element').html('');
            } else if (input_sample_id == 'epb-element-vimeo_video_embed' && video_id2 != 'false') {
                $(this).parents('.wpb-popup-inner-element').find('.wpb-element-inputype-sample').html('<iframe width="560" height="315" id ="wpb-inner-element-vid-ID" src="//player.vimeo.com/video/' + video_id2 + '" frameborder="0" allowfullscreen></iframe>');
                $(this).parents('.wpb-inner-element-input-wrap').find('.wpb-error-element').html('');
            } else {
                $(this).parents('.wpb-inner-element-input-wrap').find('.wpb-error-element').html('URL Coulnot Be Embeded.');
            }
        });

        //Element social icon color 
        var myOptions_icon_bg_color = {
            palettes: true,
            change: function (event, ui) {
                $(this).parents('.wpb-popup-inner-element').find('.wpb-element-inputype-sample a').css('color', ui.color.toString());
            },
        };

        // Implementing Social Icon for Text
        $('.wpb-ui-draggable #wpb-inner-element-social-icon-bg').wpColorPicker(myOptions_icon_bg_color);

        // Colorpicker for element  
        $('.wpb-ui-draggable').find('.wpb-inner-el-col-pick2').wpColorPicker();

        // Color picker live preview for element Font Color
        var myOptions_font_color = {
            palettes: true,
            change: function (event, ui) {
                console.log('color called');
                $(this).parents('.wpb-popup-inner-element').find('.wpb-element-inputype-sample').css('color', ui.color.toString());
            },
        };

        // Color picker live preview for Text Background Color
        var myOptions_eelement_bg_color = {
            palettes: true,
            change: function (event, ui) {
                console.log('background called');
                $(this).parents('.wpb-popup-inner-element').find('.wpb-element-inputype-sample').css('background', ui.color.toString());
            },
        };

        //Element border color 
        var myOptions_border_color = {
            palettes: true,
            change: function (event, ui) {
                $(this).parents('.wpb-popup-inner-element').find('.wpb-element-inputype-sample').css('border-color', ui.color.toString());
            },
        };

        $('.wpb-general-close-bg-color-picker').wpColorPicker();
        $('.wpb-general-color-picker').wpColorPicker();
        
        // Element Background Image Live Preview        
        $('.wpb-upload-el-bg-image-button').on("click", function (e) {
            e.preventDefault();
            tthis = $(this);
            var image_formfieldID = jQuery(this).parent().children('input.wpb-upload-el-bg-image').attr("id");
            var image = wp.media({
                title: 'Upload Image',
                multiple: true
            }).open()
                    .on('select', function (e) {
                        var uploaded_image = image.state().get('selection').first();
                        var el_bg_img_url = uploaded_image.toJSON().url;
                        $(tthis).parent().find('input#' + image_formfieldID).val(el_bg_img_url);
                        $(tthis).parents('.wpb-popup-inner-element').find('.wpb-element-inputype-sample').css('background-image', 'url(' + el_bg_img_url + ')');
                    });
        });

        // Element PDF Upload Live Preview        
        $('.wpb-pdf-upload-button').on("click", function (e) {
            e.preventDefault();
            var formfieldID = jQuery(this).parent().children('input.wpb-pdf-upload-url').attr("id");
            var $this = $(this);
            var pdf = wp.media({
                title: 'Upload PDF',
                multiple: true
            }).open()
                    .on('select', function (e) {
                        var uploaded_pdf = pdf.state().get('selection').first();
                        var el_pdf_url = uploaded_pdf.toJSON().url;
                        $($this).parent().children('input#' + formfieldID).val(el_pdf_url);
                        $($this).parents('.wpb-ui-draggable').find('.wpb-inner-element-iframe').attr('src', el_pdf_url);
                    });
        });

        //Element Text Align
        $('.wpb-ui-draggable').on("change", "#wpb-upl-el-text-align", function () {
            $(this).parents('.wpb-popup-inner-element').find('.wpb-element-inputype-sample p').css('text-align', $(this).val());
        });

        //Element font color 
        var myOptions_font_color = {
            palettes: true,
            change: function (event, ui) {
                $(this).parents('.wpb-popup-inner-element').find('.wpb-element-inputype-sample').css('color', ui.color.toString());
            },
        };


        // Element social icon size
        $('.wpb-ui-draggable').on("keyup", "#wpb-inner-element-social-icon-size", function (e) {
            $(this).parents('.wpb-popup-inner-element').find('.wpb-element-inputype-sample a').css({
                'font-size': $(this).val() + 'px'
            });
        });

        // Element Height
        $('.wpb-ui-draggable').on("keyup", "#wpb-inner-element-height", function (e) {
            var input_sample_id = $(this).parents('.wpb-popup-inner-element').find('.wpb-element-inputype-sample').attr('id');
            if (input_sample_id == 'epb-element-image') {
                $(this).parents('.wpb-popup-inner-element').find('.wpb-element-inputype-sample img').css({
                    'height': $(this).val()
                });
            } else if (input_sample_id == 'epb-element-pdf') {
                $(this).parents('.wpb-popup-inner-element').find('.wpb-element-inputype-sample #wpb-inner-element-pdf-ID').css({
                    'height': $(this).val()
                });
            } else if (input_sample_id == 'epb-element-youtube_video_embed' || input_sample_id == 'epb-element-vimeo_video_embed') {
                $(this).parents('.wpb-popup-inner-element').find('.wpb-element-inputype-sample #wpb-inner-element-ytvid-ID').css({
                    'height': $(this).val()
                });
            } else {
                $(this).parents('.wpb-popup-inner-element').find('.wpb-element-inputype-sample').css({
                    'height': $(this).val()
                });
            }
        });

        // Element Width
        $('.wpb-ui-draggable').on("keyup", "#wpb-inner-element-width", function (e) {
            var input_sample_id = $(this).parents('.wpb-popup-inner-element').find('.wpb-element-inputype-sample').attr('id');
            if (input_sample_id == 'epb-element-image') {
                $(this).parents('.wpb-popup-inner-element').find('.wpb-element-inputype-sample img').css({
                    'width': $(this).val()
                });
            } else if (input_sample_id == 'epb-element-pdf') {
                $(this).parents('.wpb-popup-inner-element').find('.wpb-element-inputype-sample #wpb-inner-element-pdf-ID').css({
                    'width': $(this).val()
                });
            } else if (input_sample_id == 'epb-element-youtube_video_embed' || input_sample_id == 'epb-element-vimeo_video_embed') {
                $(this).parents('.wpb-popup-inner-element').find('.wpb-element-inputype-sample #wpb-inner-element-ytvid-ID').css({
                    'width': $(this).val()
                });
            } else {
                $(this).parents('.wpb-popup-inner-element').find('.wpb-element-inputype-sample').css({
                    'width': $(this).val()
                });
            }
        });

        // Z-index Value
        $('.wpb-ui-draggable').on("keyup", "#wpb-inner-el-z-index", function (e) {
            $(this).parents('.wpb-popup-inner-element').find('.wpb-element-inputype-sample').css({
                'z-index': $(this).val()
            });
        });

        // Font Typography
        $('.wpb-ui-draggable').on("change", "#wpb-inner-element-font-family", function (e) {
            var font_family = $(this).val();
            $(this).parents('.wpb-popup-inner-element').find('.wpb-element-inputype-sample').css
                    ({
                        'font-family': font_family
                    });
            if (font_family != "default" && font_family != '') {
                WebFont.load({
                    google: {
                        families: [font_family]
                    }
                });
            }
        });

        // Font Size
        $('.wpb-ui-draggable').on("keyup", "#wpb-inner-element-font-size", function (e) {
            $(this).parents('.wpb-popup-inner-element').find('.wpb-element-inputype-sample p').css({
                'font-size': $(this).val() + 'px'
            });
        });

        // Font Weight
        $('.wpb-ui-draggable').on("change", "#wpb-upl-el-font-weight", function (e) {
            $(this).parents('.wpb-popup-inner-element').find('.wpb-element-inputype-sample').css({
                'font-weight': $(this).val()
            });
        });

        // Element Background image repeat
        $('.wpb-ui-draggable').on("change", "#wpb-upl-el-bg-image-repeat", function (e) {
            $(this).parents('.wpb-ui-draggable').find('.wpb-element-inputype-sample').css({
                'background-repeat': $(this).val()
            });
        });

        // Element Background Image Opacity
        $('.wpb-ui-draggable').on("change", "#wpb-upl-el-bg-image-opacity", function (e) {
            $(this).parents('.wpb-popup-inner-element').find('.wpb-element-inputype-sample').css({
                'opacity': $(this).val()
            });
        });

        /** Element Border Settings **/

        //Border Color
        $('.wpb-ui-draggable #wpb-inner-element-border-color').wpColorPicker(myOptions_border_color);

        //Element border color 
        var myOptions_border_color = {
            palettes: true,
            change: function (event, ui) {
                $(this).parents('.wpb-popup-inner-element').find('.wpb-element-inputype-sample').css('border-color', ui.color.toString());
            },
        };

        // Implementing Element background Color for Text for saved element
        $('.wpb-ui-draggable #wpb-inner-element-background-color').wpColorPicker(myOptions_eelement_bg_color);

        // Color picker live preview for Text Background Color
        var myOptions_eelement_bg_color = {
            palettes: true,
            change: function (event, ui) {
                console.log('background called');
                $(this).parents('.wpb-popup-inner-element').find('.wpb-element-inputype-sample').css('background', ui.color.toString());
            },
        };
        // Implementing Text font Color 
        $('.wpb-ui-draggable #wpb-inner-element-font-color').wpColorPicker(myOptions_font_color);

        // Color picker live preview for element Font Color
        var myOptions_font_color = {
            palettes: true,
            change: function (event, ui) {
                console.log('color called');
                $(this).parents('.wpb-popup-inner-element').find('.wpb-element-inputype-sample p').css('color', ui.color.toString());
            },
        };

        //Element Border Type
        $('.wpb-ui-draggable').on("change", "#wpb-upl-el-border-type", function (e) {
            $(this).parents('.wpb-popup-inner-element').find('.wpb-element-inputype-sample').css({
                'border': $(this).val()
            });
        });

        //Element Border Radius
        $('.wpb-ui-draggable').on("keyup", ".wpb-inner-el-border-radius", function (e) {
            $(this).parents('.wpb-popup-inner-element').find('.wpb-element-inputype-sample').css({
                'border-radius': $(this).val() + 'px'
            });
        });

        //Element Border Size
        $('.wpb-ui-draggable').on("keyup", ".wpb-upload-el-border-width", function (e) {
            $(this).parents('.wpb-popup-inner-element').find('.wpb-element-inputype-sample').css({
                'border-width': $(this).val() + 'px'
            });
        });

        /** Element Border setting ends */

        /** Element Animation Settings */

        // Element Animation Class
        $('.wpb-ui-draggable').on("change", ".wpb-animate-input-wide", function (e) {
            var animate_class = $(this).val();
            var el_attr_id = $(this).parents('.wpb-popup-inner-element').find('.wpb-element-inputype-sample').attr('id');
            $(this).parents('.wpb-popup-inner-element').find('.wpb-element-inputype-sample').removeClass();
            $(this).parents('.wpb-popup-inner-element').find('#' + el_attr_id).addClass('wpb-element-inputype-sample animated' + ' ' + animate_class);
        });

        // Element Animation duration
        $('.wpb-ui-draggable').on("keyup", ".wpb-upl-el-bg-image-duration", function (e) {
            $(this).parents('.wpb-popup-inner-element').find('.wpb-element-inputype-sample').css({
                '-webkit-animation-duration': $(this).val() + 's',
                '-moz-animation-duration': $(this).val() + 's'
            });
        });

        // Element Animation Delay
        $('.wpb-ui-draggable').on("keyup", ".wpb-upl-el-bg-image-delay", function (e) {
            $(this).parents('.wpb-popup-inner-element').find('.wpb-element-inputype-sample').css({
                '-webkit-animation-delay': $(this).val() + 's',
                '-moz-animation-delay': $(this).val() + 's'
            });
        });

        /** Element Animation Setting Ends */

        /** popup main setting */

        // Popup Height and width
        $(".wpb-popup-element").draggable({
            helper: 'clone'
        });

        //Main popup height
        $('#wpb-popup-size-height').on({
            keyup: function () {
                if (parseInt($(this).val()))
                {
                    $(this).parents('.wpb-general-settings').find('.wpb-ui-draggable').height(parseInt($(this).val()));
                }
            }
        });

        // Main popup width
        $('#wpb-popup-size-width').on({
            keyup: function () {
                if (parseInt($(this).val()))
                {
                    $(this).parents('.wpb-general-settings').find('.wpb-ui-draggable').width(parseInt($(this).val()));
                }
            }
        });
        //Main popup border type
        $('body').on("change", ".wpb-popup-border-type", function () {
            $(this).parents('.wpb-general-settings').find('.wpb-ui-draggable').css({
                'border': $(this).val()
            });
        });

        //Main popup Border size
        $('body').on("keyup", ".wpb-popup-border-size", function () {
            $(this).parents('.wpb-general-settings').find('.wpb-ui-draggable').css({
                'border-size': $(this).val() + 'px'
            });
        });

        /** Overlay Image Upload */
        $('.wpb-upload-overlay-image-button').click(function (e) {
            e.preventDefault();
            formfieldID = jQuery(this).prev().attr("id");
            formfield = jQuery("#" + formfieldID).attr('name');
            var image = wp.media({
                title: 'Upload Image',
                multiple: true
            }).open()
                    .on('select', function (e) {
                        var uploaded_image = image.state().get('selection').first();
                        var image_url = uploaded_image.toJSON().url;
                        jQuery("#" + formfieldID).val(image_url);
                    });
        });

        /** Datepicker For Duration of popup Display */
        $('.wpb-datepicker').datepicker();

        $('#wpb_popup_delay_enable').click(function () {
            if (this.checked) {
                $('.wpb-popup-delay-div').show();
            } else {
                $('.wpb-popup-delay-div').hide();
            }
        });

        $('#wpb_autoclose_enable').click(function () {
            if (this.checked) {
                $('.wpb-enable-autoclose').show();
            } else {
                $('.wpb-enable-autoclose').hide();
            }
        });

        $('#wpb-countdown-msg').change(function () {
            if ($(this).val() == 'yes') {
                $('.wpb-countdown-message-div').show();
            } else {
                $('.wpb-countdown-message-div').hide();
            }
        });

        //Main Popup Background Color
        var main_popup_bg_color = {
            palettes: true,
            change: function (event, ui) {
                $(this).parents('body').find('.wpb-ui-draggable').css('background', ui.color.toString());
            },
        };

        // Main popup border color
        var main_popup_border_color = {
            palettes: true,
            change: function (event, ui) {
                $(this).parents('body').find('.wpb-ui-draggable').css('border-color', ui.color.toString());
            },
        };

        $('#wpb_mpopup_color').wpColorPicker(main_popup_bg_color);
        $('#wpb_background_color').wpColorPicker();
        $('#wpb_overlay_color').wpColorPicker();
        $('#wpb_border_color').wpColorPicker();
        $('#wpb-popup-border-color').wpColorPicker(main_popup_border_color);

        // Popup Background Image Upload 
        $('.wpb-upload-mpopup-bg-image-button').click(function (e) {
            e.preventDefault();
            var formfieldID = jQuery(this).prev().attr("id");
            var bg_image_this = $(this);
            var image = wp.media({
                title: 'Upload Image',
                multiple: true
            }).open()
                    .on('select', function (e) {
                        var uploaded_image = image.state().get('selection').first();
                        var image_url = uploaded_image.toJSON().url;
                        jQuery("#" + formfieldID).val(image_url);
                        $(bg_image_this).parents('body').find('.wpb-ui-draggable').css('background-image', 'url(' + image_url + ')');
                    });
        });

        /** jquery for settings page */

        // Jquery to show hide page wise configuration in settng
        $('body').on("change", "#wpb-load-popup-show-hide", function () {
            if ($(this).val() == 'page-specific') {
                $(this).parents().find('#wpb-load-specific-show-hide-on').show();
            } else {
                $(this).parents().find('#wpb-load-specific-show-hide-on').hide();
            }
        });
        $('body').on("change", "#wpb-scroll-popup-show-hide", function () {
            if ($(this).val() == 'page-specific') {
                $(this).parents().find('#wpb-scroll-specific-show-hide-on').show();
            } else {
                $(this).parents().find('#wpb-scroll-specific-show-hide-on').hide();
            }
        });

        $('body').on("change", "#idle-popup-show-hide-on", function () {
            if ($(this).val() == 'page-specific') {
                $(this).parents().find('#wpb-idle-specific-show-hide-on').show();
            } else {
                $(this).parents().find('#wpb-idle-specific-show-hide-on').hide();
            }
        });

        $('body').on("change", "#wpb-exit-popup-show-hide", function () {
            if ($(this).val() == 'page-specific') {
                $(this).parents().find('#wpb-exit-specific-show-hide-on').show();
            } else {
                $(this).parents().find('#wpb-exit-specific-show-hide-on').hide();
            }
        });

        /** Load Default Theme Settings Fields on ajax call */
        //current_theme = $('.wpb-buildin-theme-selector:selected').val();
        $('.wpb-buildin-theme-selector').change(function () {
            //$('body').on("change", ".wpb-buildin-theme-selector", function () {
            var theme_selector = $(this);
            var wp_default_theme_type = theme_selector.val();
            var wpb_id = $("input[name='wpb_id']").val();
            var image_src = $('.wpb-default-theme-preview img').attr('src');
            var targeted_image = image_src.split('/');
            var final_image = targeted_image[targeted_image.length - 1];
            theme_selector.parents('.wpb-default-theme-field-wrap').find('.wpb-default-theme-preview img').attr('src', image_src.replace(final_image, wp_default_theme_type + '.jpg'));
            $.ajax({
                url: wpp_backend_js_params.ajax_url,
                data: {
                    wp_default_theme_type: wp_default_theme_type,
                    wpb_id: wpb_id,
                    _wpnonce: wpp_backend_js_params.ajax_nonce,
                    action: 'wpp_pull_theme_contents'
                },
                type: 'post',
                beforeSend: function () {
                    $('.wpb-default-theme-field-settings').html('');
                    $('.wpb-default-theme-wrapper-setting-field-wrapper').append('<span class="wpb-spinner-loader-icon"></span>');
                    
                },
                success: function (response) {
                    $('.wpb-default-theme-field-settings').html(response);
                    $('.buildin-default-font-color').wpColorPicker();
                },
                complete: function () {
                    $('.wpb-default-theme-wrapper-setting-field-wrapper span.wpb-spinner-loader-icon').fadeOut(300).remove();
                }
            });
        }).change();

        // Show Hide external subscription additional setting
        $('body').on('change', '#wpb-admin-form-submission-type', function () {
            if ($(this).val() == 'external-subscription') {
                $(this).parents('#tab-wpb-form-procedure-setting').find('#wpb-form-submission-type-external-fields').show();
            } else {
                $(this).parents('#tab-wpb-form-procedure-setting').find('#wpb-form-submission-type-external-fields').hide();
            }
        });

        $('body').on('click', '.wpb-upload-buildin-bg-image-button', function (e) {
            e.preventDefault();
            var formfieldID = jQuery(this).parent().children('input#wpb-upload-buildin-bg-image').attr("id");
            var $this = $(this);
            var image = wp.media({
                title: 'Upload Image',
                multiple: false
            }).open()
                    .on('select', function (e) {
                        var uploaded_image = image.state().get('selection').first();
                        var el_img_url = uploaded_image.toJSON().url;
                        $($this).parent().children('input#' + formfieldID).val(el_img_url);
                        //$($this).parent().children('input#' + formfieldID).parent().find('.wpb-image-preview img').attr('src', el_img_url).show();
                        //tb_remove();
                    });
        });

        $('.wpb-contact-form-log > a').click(function (e) {
            var entry_id = $(this).data('entry-id');
            $.ajax({
                url: wpp_backend_js_params.ajax_url,
                data: {
                    entry_id: entry_id,
                    _wpnonce: wpp_backend_js_params.ajax_nonce,
                    action: 'wpp_popup_contact_form_view_actions'
                },
                type: 'post',
                beforeSend: function () {
                    $('#wpb-boxes').fadeIn(300, function () {
                        $('.wpb-view-wrap').show();
                        $('.wpb-overlay').show();
                    });
                },
                success: function (res) {
                    $('.wpb-view-wrap').hide();
                    $('#wpb-boxes').html(res);
                }
            });
        });

        /** Entry Popup Close */
        $(document).mouseup(function (e) {
            var popup = $(".wpb-boxes");
            if (!$('.wpb-boxes').is(e.target) && !popup.is(e.target) && popup.has(e.target).length == 0) {
                popup.fadeOut(100);
                $('.wpb-boxes').html('');
                $('.wpb-overlay').fadeOut(100);
            }
        });
        $('body').on('click', '.wpb-popup-entry-detail-close', function () {
            $('.boxes').fadeOut(100, function () {
                $('.loading').html('<span class="wpb-view-ajax-loader"></span>');
                $('.boxes').html('');
            });
            $('.wpb-boxes').fadeOut(100);
            $('.wpb-overlay').fadeOut(100);
        });
    });
}(jQuery));//main function end

jQuery(window).load(function () {
    wpb_preview_show();
});
function wpb_preview_show() {
    jQuery('body').find('.wpb-ui-custom-pp-builder-wrap').show();
}
function handleChange(input) {
    var value = jQuery(input).val();
    var newValue = value.replace(/\D/g, '');
    newValue = parseInt(newValue);
    jQuery(input).val(newValue);

    value = jQuery(input).val();

    if (isNaN(value) || value == "") {
        jQuery(input).val('');
    }
    if (input.value < 0)
        input.value = 0;
    if (input.value > 300)
        input.value = 300;
}