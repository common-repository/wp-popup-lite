(function ($) {
    $(function () {
        var def_load_pp_id = $('#wpb_on_load_popup').val();
        var def_popup_delay = $('#wpb_popup_delay').val();
        var show_popup_cookie = $('#wpb_popup_cookie').val();
        var popup_cookie_expiry = $('#wpb_popup_cookie_expiry').val();
        var wpb_active_load_popup = false;
        var wpb_idle_timer = null;
        var scroll_fired = 1;
        var exit_fired = 1;
        var display_popup_flag = 0;
        if ($(".wpb-outer-wrap")[0]) {
            $(this).find("img").mousedown(function (e) {
                e.preventDefault()
            });
            $('.wpb-outer-wrap').each(function () {
                var selector = $(this);
                pag_popup_id = selector.data('popup-id');
                if (selector.data('load-delay') != ''
                        || selector.data('load-delay') != 0
                        ) {
                    popup_load_delay = $(this).data('load-delay');
                } else {
                    popup_load_delay = def_popup_delay;
                }
                if (def_load_pp_id != 'disabled' && def_load_pp_id == pag_popup_id)
                {
                    if (show_popup_cookie == 'always'
                            || getCookie("wp_popup_once_" + def_load_pp_id) != 'popup_show_once_' + def_load_pp_id
                            && wpb_active_load_popup == false
                            && display_popup_flag == 0
                            ) {
                        setTimeout(function () {
                            wpb_popup_open(def_load_pp_id);
                        }, popup_load_delay * 1000); // 2000 ms to load it after 5 seconds from page load by default
                        wpb_active_load_popup = true;
                    }
                }
            });
        }

//Function to open popup according to id
        function wpb_popup_open(id)
        {
            $('#wpb-outer-wrap-' + id).find('.wpb-hidden-popup').show();
            $('#wpb-outer-wrap-' + id).find('.wpb-hidden-popup').removeClass('wpb-hidden-popup').addClass('wpb-show-popup');
            $('#wpb-outer-wrap-' + id).find('#wpb-overlay-' + id).fadeIn();
            var autoclose_enable = $('.wpb-show-popup').parent().data('counter-enabled');
            var popup_close_countdown = $('.wpb-show-popup').parent().data('counter-val');
            var show_countdown_message = $('.wpb-show-popup').parent().data('counter-message-enabled');
            if (autoclose_enable == 'on'
                    && popup_close_countdown != ''
                    ) {
                if (show_countdown_message == 'yes'
                        && popup_close_countdown != ''
                        ) {
                    countdown(popup_close_countdown, id);
                }

                Timeout1 = setTimeout(function () {
                    wpb_popup_close(id);
                }, popup_close_countdown * 1000);
            }

            function countdown(counter, id) {
                interval = setInterval(function () {
                    $('#wpb-outer-wrap-' + id).find('.wpb_countdown').text(secondsTimeSpanToHMS(counter));
                    if (counter == 0) {
// Display a login box
                        clearInterval(interval);
                        wpb_popup_close(id);
                    }
                    counter--;
                }, 1000);
            }
            if (
                    (show_popup_cookie != '' && show_popup_cookie == 'always')

                    ) {
                delete_cookie('wp_popup_once_' + id); //delete cookie
            }
            display_popup_flag = 1;
        }

//Function to close popup according to id
        function wpb_popup_close(id)
        {
            $('#wpb-outer-wrap-' + id).find('.wpb-show-popup').hide();
            $('#wpb-outer-wrap-' + id).find('.wpb-show-popup').removeClass('wpb-show-popup').addClass('wpb-hidden-popup');
            $('#wpb-outer-wrap-' + id).find('#wpb-overlay-' + id).fadeOut();
            if (
                    (show_popup_cookie != '' && (show_popup_cookie == 'once' || show_popup_cookie == 'once-per-session'))
                    ) {
                checkCookie(id);
            }
            display_popup_flag = 0;
        }

//Function to close popup on overlay click
        $('.wpb_overlay').click(function () {
            data_ovlay_pp_id = $(this).attr('id');
            var array_break = data_ovlay_pp_id.split('-');
            var current_id = array_break[2];
            if ($(this).data('overlay-close') == 'close-popup')
            {
                wpb_popup_close(current_id);
                return true;
            }
        });
        $(".wpb_close_btn").click(function (e) {
            e.preventDefault();
            var close_popup_id = $(this).parents('.wpb-outer-wrap').data('popup-id');
            wpb_popup_close(close_popup_id);
        });
        //function to empty value from form field after form submission
        function wpb_reset_form(selector_id) {
            selector_id.parents('.wpb-outer-wrap').find('input[type="text"]').val('');
            selector_id.parents('.wpb-outer-wrap').find('input[type="email"]').val('');
            selector_id.parents('.wpb-outer-wrap').find('textarea').val('');
            selector_id.parents('.wpb-outer-wrap').find('option').removeAttr('selected');
        }
        function setCookie(cname, cvalue, exdays) {
            var d = new Date();
            d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
            var expires = "expires=" + d.toGMTString();
            document.cookie = cname + "=" + cvalue + "; " + expires;
        }

        function getCookie(cname) {
            var name = cname + "=";
            var ca = document.cookie.split(';');
            for (var i = 0; i < ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0) == ' ')
                    c = c.substring(1);
                if (c.indexOf(name) == 0) {
                    return c.substring(name.length, c.length);
                }
            }
            return "";
        }

        function checkCookie(id) {
            var popup_cookie = getCookie("wp_popup_once_" + id);
            if (popup_cookie != "") {
                //cookie is set
            } else {
                popup_cookie = 'popup_show_once_' + id;
                if (
                        (popup_cookie != "" && popup_cookie != null && show_popup_cookie != '' && show_popup_cookie == 'once' && def_load_pp_id != 'disabled' && def_load_pp_id == id)
                        || (popup_cookie != "" && popup_cookie != null && scroll_popup_cookie != '' && scroll_popup_cookie == 'once' && def_scroll_pp_id != 'disabled' && def_scroll_pp_id == id)
                        || (popup_cookie != "" && popup_cookie != null && idle_popup_cookie != '' && idle_popup_cookie == 'once' && def_idle_pp_id != 'disabled' && def_idle_pp_id == id)
                        || (popup_cookie != "" && popup_cookie != null && exit_popup_cookie != '' && exit_popup_cookie == 'once' && def_exit_pp_id != 'disabled' && def_exit_pp_id == id)
                        ) {
                    setCookie("wp_popup_once_" + id, popup_cookie, popup_cookie_expiry);
                } else if (
                        (popup_cookie != "" && popup_cookie != null && show_popup_cookie != '' && show_popup_cookie == 'once-per-session' && def_load_pp_id != 'disabled' && def_load_pp_id == id)
                        || (popup_cookie != "" && popup_cookie != null && scroll_popup_cookie != '' && scroll_popup_cookie == 'once-per-session' && def_scroll_pp_id != 'disabled' && def_scroll_pp_id == id)
                        || (popup_cookie != "" && popup_cookie != null && idle_popup_cookie != '' && idle_popup_cookie == 'once-per-session' && def_idle_pp_id != 'disabled' && def_idle_pp_id == id)
                        || (popup_cookie != "" && popup_cookie != null && exit_popup_cookie != '' && exit_popup_cookie == 'once-per-session' && def_exit_pp_id != 'disabled' && def_exit_pp_id == id)
                        ) {
                    setCookie("wp_popup_once_" + id, popup_cookie);
                }
            }
        }

        function delete_cookie(name) {
            document.cookie = name + '=; expires=Thu, 01 Jan 1970 00:00:01 GMT;';
        }

//        //Function to redirect site after form submission
//        function pageRedirect(button_submission_redir_link) {
//             window.location.href = ""+button_submission_redir_link+"";
//        }

        // Buildin/Custom Contact Form Submit Button on click action
        $('body').on('click', '.wpb-submit-button', function (e) {
            e.preventDefault();
            error_flag = 0;
            var $this = $(this);
            var selector_id = $(this);
            var form_values = {};
            var popup_val = $this.parents('.wpb-outer-wrap').data('popup-id');
            var popup_title = $this.parents('.wpb-outer-wrap').data('popup-title');
            var form_submission_type = $this.parents('.wpb-contact-form').attr('id');
            var button_action = $(this).data('button-action');
            var button_submit_text = $(this).data('button-submit-load');
            var button_submission_thanks = $(this).data('button-thanks');
            var button_submission_error = $(this).data('button-error');
            var button_submission_success_message = $(this).data('button-success-message');
            var button_submission_error_message = $(this).data('button-error-message');
            $(this).parents('.wpb-contact-form').find('input.wpb-fe-form-field').each(function () {
                if ($(this).hasClass('required') && $(this).val() == '') {
                    error_flag = 1;
                    $(this).addClass('wpb-input-field-error');
                }
            });
            $(this).parents('.wpb-contact-form').find('textarea.wpb-fe-form-field').each(function () {
                if ($(this).hasClass('required') && $(this).val() == '') {
                    error_flag = 1;
                    $(this).addClass('wpb-input-field-error');
                }
            });
            $(this).parents('.wpb-contact-form').find('input[type="email"]').each(function () {
                if (!validateEmail($(this).val())) {
                    error_flag = 1;
                    $(this).addClass('wpb-input-field-error');
                }
            });
            $(this).parents('.wpb-contact-form').find('.wpb-email-field').each(function () {
                if (($(this).val() != '') && !validateEmail($(this).val())) {
                    error_flag = 1;
                    $(this).addClass('required wpb-input-field-error');
                }
            });
            if (error_flag == 1) {
                return false;
            } else if (error_flag == 0) {
                $(this).parents('.wpb-contact-form').find(':input.wpb-fe-form-field').each(function () {
                    form_values[this.placeholder] = $(this).val();
                });
                var form_datavalues = JSON.stringify(form_values);
                $.ajax({
                    url: wpp_frontend_js.ajax_url,
                    data: {
                        _wpnonce: wpp_frontend_js.ajax_nonce,
                        parent_popup: popup_title,
                        form_datavalues: form_datavalues,
                        form_submission_type: form_submission_type,
                        popup_val: popup_val,
                        action: 'wpp_popup_form_submission',
                    },
                    type: "POST",
                    beforeSend: function () {
                        $this.html(button_submit_text);
                        $this.attr("disabled", true);
                        return true;
                    },
                    success: function (response) {
                        if (response == 'success') {
                            $this.html(button_submission_thanks);
                            selector_id.parents('.wpb-popup-wrapp').addClass('wpb-popup-form-message');
                            selector_id.parents('.wpb-popup-wrapp').find('.wpb-form-message').removeClass('wpb-form-failure');
                            selector_id.parents('.wpb-popup-wrapp').find('.wpb-form-message').addClass('wpb-form-success');
                            selector_id.parents('.wpb-popup-wrapp').find('.wpb-form-message').html(button_submission_success_message);
                            if (button_action === 'submit-and-close') {
                                wpb_popup_close(popup_val);
                            } else if (button_action === 'add-link' && button_submission_redir_link != '') {
                                setTimeout(function () {
                                    $(location).attr('href', button_submission_redir_link);
                                }, 5000);
                            }
                            wpb_reset_form(selector_id);
                        } else if (response == 'failed') {
                            $this.html(button_submission_error);
                            selector_id.parents('.wpb-popup-wrapp').addClass('wpb-popup-form-message');
                            selector_id.parents('.wpb-popup-wrapp').find('.wpb-form-message').removeClass('wpb-form-success');
                            selector_id.parents('.wpb-popup-wrapp').find('.wpb-form-message').addClass('wpb-form-failure');
                            selector_id.parents('.wpb-popup-wrapp').find('.wpb-form-message').html(button_submission_error_message);
                        }
                    },
                    complete: function (response) {
                        $this.attr("disabled", false);
                        return false;
                    }
                });
                return true;
            }
        }); // Custom contact form submission action ends here

        //External subscription form submission action for mailchimp and other
        $('body').on('click', '.wpb-builtin-submit-button', function (e) {
            e.preventDefault();
            error_flag = 0;
            var $this = $(this);
            var selector_id = $(this);
            var popup_title = $this.parents('.wpb-outer-wrap').data('popup-title');
            var email_address = $this.parents('.wpb-outer-wrap').find('input.wpb-email-field').val();
            if ($this.parents('.wpb-outer-wrap').find('input.wpb-name-field').length > 0) {
                var user_name = $this.parents('.wpb-outer-wrap').find('input.wpb-name-field').val();
            } else {
                var user_name = '';
            }
            var popup_val = $this.parents('.wpb-outer-wrap').data('popup-id');
            var form_submission_type = $this.parents('.wpb-contact-form').attr('id');
            var button_action = $(this).data('button-action');
            var button_submit_text = $(this).data('button-submit-load');
            var button_submission_thanks = $(this).data('button-thanks');
            var button_submission_error = $(this).data('button-error');
            var button_submission_redir_link = $(this).data('submit-redirect');
            var button_submission_success_message = $(this).data('button-success-message');
            var button_submission_error_message = $(this).data('button-error-message');
            $(this).parents('.wpb-contact-form').find('input.wpb-fe-form-field').each(function () {
                if ($(this).hasClass('required') && $(this).val() == '') {
                    error_flag = 1;
                    $(this).addClass('wpb-input-field-error');
                }
            });
            $(this).parents('.wpb-contact-form').find('textarea.wpb-fe-form-field').each(function () {
                if ($(this).hasClass('required') && $(this).val() == '') {
                    error_flag = 1;
                    $(this).addClass('wpb-input-field-error');
                }
            });
            $(this).parents('.wpb-contact-form').find('.wpb-email-field').each(function () {
                if (($(this).val() != '') && !validateEmail($(this).val())) {
                    error_flag = 1;
                    $(this).addClass('required wpb-input-field-error');
                }
            });
            $(this).parents('.wpb-contact-form').find('input[type=checkbox]').each(function () {
                var inputs = $('input[type=checkbox]:checked');
                if (inputs.length == 0) {
                    error_flag = 1;
                    $(this).addClass('wpb-input-field-error');
                }
            });
            if (error_flag == 1) {
                return false;
            } else if (error_flag == 0) {
                $.ajax({
                    url: wpp_frontend_js.ajax_url,
                    data: {
                        _wpnonce: wpp_frontend_js.ajax_nonce,
                        button_action: button_action,
                        form_submission_type: form_submission_type,
                        popup_val: popup_val,
                        user_name: user_name,
                        email_address: email_address,
                        parent_popup: popup_title,
                        action: 'wpp_popup_form_submission'
                    },
                    type: "POST",
                    beforeSend: function () {
                        $this.html(button_submit_text);
                        $this.attr("disabled", true);
                        return true;
                    },
                    success: function (response) {
                        if (response === 'subscribed') {
                            $this.html(button_submission_thanks);
                            wpb_reset_form(selector_id);
                            selector_id.parents('.wpb-popup-wrapp').addClass('wpb-popup-form-message');
                            selector_id.parents('.wpb-popup-wrapp').find('.wpb-form-message').removeClass('wpb-form-failure');
                            selector_id.parents('.wpb-popup-wrapp').find('.wpb-form-message').addClass('wpb-form-success');
                            selector_id.parents('.wpb-popup-wrapp').find('.wpb-form-message').html(button_submission_success_message);
                            if (button_action === 'submit-and-close') {
                                wpb_popup_close(popup_val);
                            } else if (button_action === 'add-link' && button_submission_redir_link != '') {
                                setTimeout(function () {
                                    $(location).attr('href', button_submission_redir_link);
                                }, 5000);
                            }
                        } else if (response === 'already_subscribed') {
                            $this.html(button_submission_error);
                            selector_id.parents('.wpb-popup-wrapp').find('.wpb-form-message').removeClass('wpb-form-success');
                            selector_id.parents('.wpb-popup-wrapp').addClass('wpb-popup-form-message');
                            selector_id.parents('.wpb-popup-wrapp').find('.wpb-form-message').addClass('wpb-form-failure');
                            selector_id.parents('.wpb-popup-wrapp').find('.wpb-form-message').html('Already Subscribed');
                        } else if (response === 'error') {
                            $this.html(button_submission_error);
                            selector_id.parents('.wpb-popup-wrapp').addClass('wpb-popup-form-message');
                            selector_id.parents('.wpb-popup-wrapp').find('.wpb-form-message').removeClass('wpb-form-success');
                            selector_id.parents('.wpb-popup-wrapp').find('.wpb-form-message').addClass('wpb-form-failure');
                            selector_id.parents('.wpb-popup-wrapp').find('.wpb-form-message').html(button_submission_error_message);
                        }
                    },
                    complete: function (response) {
                        $this.attr("disabled", false);
                        return false;
                    }
                });
                return true;
            }
        }); //External subscription/inline form submission action ends here


        //Function to convert second into minute
        function secondsTimeSpanToHMS(s) {
            var h = Math.floor(s / 3600); //Get whole hours
            s -= h * 3600;
            var m = Math.floor(s / 60); //Get remaining minutes
            s -= m * 60;
            return h + ":" + (m < 10 ? '0' + m : m) + ":" + (s < 10 ? '0' + s : s); //zero padding on minutes and seconds
        }

        // Function to validates email address .
        function validateEmail(email) {
            var filter = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
            if (filter.test(email)) {
                return true;
            } else {
                return false;
            }
        }
    }); //funtion
}(jQuery)); //main function end

(function ($) {
    var $window = $(window),
            $html = $('html');
    function resize() {
        if ($window.width() < 1171) {
            return $html.find('.wpb-outer-wrap').addClass('wpb-responsive-mobile');
        }

        $html.find('.wpb-outer-wrap').removeClass('wpb-responsive-mobile');
    }
    $window
            .resize(resize)
            .trigger('resize');
    $window
            .load(resize)
            .trigger('resize');
})(jQuery);