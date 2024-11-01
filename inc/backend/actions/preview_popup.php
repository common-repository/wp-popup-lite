<html>
    <head>
        <script>
            jQuery(document).ready(function () {
                jQuery(window).load(function () {
                    wpb_preview_show();
                });
                function wpb_preview_show() {
                    jQuery('body').find('.wpb-hidden-popup').show().removeClass('wpb-hidden-popup').addClass('wpb-show-popup');
                    var popup_id = jQuery('.wpb-show-popup').parent().data('popup-id');
                    wpb_popup_open(popup_id);
                }
                //Function to open popup according to id
                function wpb_popup_open(id)
                {
                    jQuery('#wpb-outer-wrap-' + id).find('.wpb-hidden-popup').show();
                    jQuery('#wpb-outer-wrap-' + id).find('.wpb-hidden-popup').removeClass('wpb-hidden-popup').addClass('wpb-show-popup');
                    jQuery('#wpb-outer-wrap-' + id).find('#wpb-overlay-' + id).fadeIn();
                    var autoclose_enable = jQuery('.wpb-show-popup').parent().data('counter-enabled');
                    var popup_close_countdown = jQuery('.wpb-show-popup').parent().data('counter-val');
                    var show_countdown_message = jQuery('.wpb-show-popup').parent().data('counter-message-enabled');
                    if (autoclose_enable == 'on' && popup_close_countdown != '') {
                        if (show_countdown_message == 'yes' && popup_close_countdown != '') {
                            countdown(popup_close_countdown);
                        }

                        Timeout1 = setTimeout(function () {
                            wpb_popup_close(id);
                        }, popup_close_countdown * 1000);
                    }

                    function countdown(counter) {
                        interval = setInterval(function () {
                            jQuery('.wpb_countdown').text(counter);
                            if (counter == 0) {
                                // Display a login box
                                clearInterval(interval);
                                wpb_popup_close(id);
                            }
                            counter--;
                        }, 1000);
                    }
                }

                //Function to close popup according to id
                function wpb_popup_close(id)
                {
                    jQuery('#wpb-outer-wrap-' + id).find('.wpb-show-popup').hide();
                    jQuery('#wpb-outer-wrap-' + id).find('.wpb-show-popup').removeClass('wpb-show-popup').addClass('wpb-hidden-popup');
                    jQuery('#wpb-outer-wrap-' + id).find('#wpb-overlay-' + id).fadeOut();
                }

                //Function to close popup on overlay click
                jQuery('.wpb_overlay').click(function () {
                    data_ovlay_pp_id = jQuery(this).attr('id');
                    var array_break = data_ovlay_pp_id.split('-');
                    var current_id = array_break[2];
                    if (jQuery(this).data('overlay-close') == 'close-popup')
                    {
                        wpb_popup_close(current_id);
                        return true;
                    } else {
                        return false;
                    }
                });

                //Jquery to close popup
                jQuery(".wpb_close_btn").click(function () {
                    var close_popup_id = jQuery(this).parents('.wpb-outer-wrap').data('popup-id');
                    wpb_popup_close(close_popup_id);
                });
            });
        </script>
    </head>
</html>