<?php defined('ABSPATH') or die("No script kiddies please!"); ?>

<?php
$wpb_default_settings = get_option('wpb_default_settings');
?>
<div class="wrap clearfix">
    <div class="wpb-add-set-wrapper clearfix">
        <div class="wpb-panel">
            <div class="wpb-manage-header">               
                <div class="wpb-boards-wrapper">
                    <div class="wpb-banner clearfix">
                        <?php include(WPP_ABSPATH . 'inc/backend/tabs/header.php'); ?>
                    </div>
                    <div class="wbp-left-section-wrapper">
                        <?php
                        /**
                         * session messages are displayed here
                         * such as database insert, delete, update
                         * success or failure messages
                         */
                        if (isset($_GET['message']) && $_GET['message'] == 3) {
                            ?>
                            <div class="wpp-notice-mesg notice notice-success is-dismissible">
                                <?php
                                echo __('Banner Updated Successfully', 'wp-popup-lite');
                                ?>
                            </div>
                        <?php } else if (isset($_GET['message']) && $_GET['message'] == 4) { ?>
                            <div class="wpp-notice-mesg notice notice-error is-dismissible">
                                <?php
                                echo __('Failed to Update Banner', 'wp-popup-lite');
                                ?>
                            </div> 
                        <?php } else if (isset($_GET['message']) && $_GET['message'] == 1) { ?>
                            <div class="wpp-notice-mesg notice notice-success is-dismissible">
                                <?php
                                echo __('Banner Inserted Successfully', 'wp-popup-lite');
                                ?>
                            </div>
                        <?php } else if (isset($_GET['message']) && $_GET['message'] == 2) { ?>
                            <div class="wpp-notice-mesg notice notice-error is-dismissible">
                                <?php
                                echo __('Failed to Insert Banner', 'wp-popup-lite');
                                ?>
                            </div>
                            <?php
                        } ?>
                        <div class="wpb_tab_content_holder">
                            <div id="optionsframework">
                                <?php
                                /**
                                 * Manage Option section for tabs
                                 * */
                                include('tabs/manage-option.php');
                                ?>
                                <div class="wpb_contents"></div>

                            </div>
                        </div>
                    </div>
                </div>    
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>
