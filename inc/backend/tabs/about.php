<?php defined('ABSPATH') or die("No script kiddies please!"); ?>

<div class="wrap clearfix">
    <div class="wpb-add-set-wrapper clearfix">
        <div class="wpb-panel">
            <div class="wpb-manage-header">               
                <div class="wpb-boards-wrapper">
                    <div class="wpb-banner clearfix">
                        <?php include(WPP_ABSPATH . 'inc/backend/tabs/header.php'); ?>
                    </div>
                    <div class="wbp-left-section-wrapper">
                        <div class="wpb_tab_content_holder">
                            <div id="optionsframework">
                                <div class="wpb_about wpb_tabs_content postbox" >
                                    <div class="wpb-table-header-wrapper clearfix">
                                        <div class="wpb-section wpb-overall-side-wrap" id="wpb-section-about" style="">
                                            <div class="about-pinterest-wrapper clearfix">
                                                <div class="about-desc-wrap clearfix">
                                                    <div class="more-title"> <?php echo __('About Plugin', 'wp-popup-lite') ?></div>
                                                    <div class="about-content">
                                                        <p><strong><?php _e('WP Popup Lite', 'wp-popup-lite'); ?></strong><?php _e(' - is a WordPress plugin by AccessPress Themes. It allows you to create multiple popup banners for your website. You can create various types of popup, define individual settings for each banner and have the banner popup on your website or specific pages of the website.', 'wp-popup-lite'); ?></p> 
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="social-more-wrap clearfix">
                                                <div class="more-title"> <?php echo __('More from AccessPress Themes', 'wp-popup-lite') ?></div>
                                                <ul class="more-product">
                                                    <li><a href="https://accesspressthemes.com/plugins/" target="_blank"><span class="prod-title"><?php echo __('Wordpress Plugins', 'wp-popup-lite') ?></span> <img src="<?php echo WPP_IMAGE_DIR; ?>/plugin.png" width="100%"> </a></li>
                                                    <li><a href="https://accesspressthemes.com/themes/" target="_blank"><span class="prod-title"><?php echo __('Wordpress Themes', 'wp-popup-lite') ?></span> <img src="<?php echo WPP_IMAGE_DIR; ?>/theme.png" width="100%"></a></li>
                                                </ul>
                                            </div>

                                            <div class="social-share-wrap clearfix">
                                                <div class="more-title"><?php echo __('Get social', 'wp-popup-lite') ?></div>
                                                <div class="social-iframe"> <strong><?php echo __('Like us on facebook:', 'wp-popup-lite') ?></strong><br>
                                                    <iframe style="border: none; overflow: hidden; width: 764px; height: 206px;" src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2Fpages%2FAccessPress-Themes%2F1396595907277967&amp;width=842&amp;height=258&amp;colorscheme=light&amp;show_faces=true&amp;header=false&amp;stream=false&amp;show_border=true&amp;appId=1411139805828592" width="240" height="150" frameborder="0" scrolling="no"></iframe></div>
                                                    <ul class="about-social clearfix">
                                                        <li><a href="https://www.facebook.com/pages/AccessPress-Themes/1396595907277967" class="fb"><i class="fa fa-facebook"> </i> <span><?php _e(' Follow us on ', 'wp-popup-lite'); ?><span class="bold"><?php echo __('Facebook', 'wp-popup-lite') ?></span></span></a></li>
                                                        <li><a href="https://twitter.com/apthemes" class="twt"><i class="fa fa-twitter"> </i><span><?php _e(' Follow us on', 'wp-popup-lite') ?><span class="bold"><?php echo __('Twitter', 'wp-popup-lite') ?></span> </span></a></li>
                                                        <li><a href="https://www.youtube.com/user/accesspressthemes" class="utube"><i class="fa fa-youtube"> </i><span> <?php _e('Subscribe us on', 'wp-popup-lite') ?> <span class="bold"><?php echo __('Youtube', 'wp-popup-lite') ?></span> </span></a></li>
                                                        <li><a href="skype:access-keys" class="skype"><i class="fa fa-skype"> </i><span><?php _e('Contact us on', 'wp-popup-lite'); ?> <span class="bold"><?php echo __('Skype', 'wp-popup-lite') ?></span> </span></a></li>
                                                        <li><a href="https://www.pinterest.com/accesspresswp/" class="pin"><i class="fa fa-pinterest"> </i><span><?php _e(' Follow us on', 'wp-popup-lite'); ?> <span class="bold"><?php echo __('Pinterest', 'wp-popup-lite') ?></span> </span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="wpp-sidebar">
                                                <?php include(WPP_ABSPATH . 'inc/backend/tabs/sidebar.php'); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>    
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>