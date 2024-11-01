<?php defined('ABSPATH') or die("No script kiddies please!"); ?>
<div class="wrap clearfix">
    <div class="wpb-add-set-wrapper clearfix">
        <div class="wpb-panel">
            <div class="wpb-manage-header">               
                <div class="wpb-boards-wrapper">
                    <div class="wpb-banner clearfix">
                        <?php include(WPP_ABSPATH . 'inc/backend/tabs/header.php'); ?>
                    </div>
                    <div class="table-header-wraper-whole clearfix">
                        <div class="wpb-table-header-wrapper">
                            <div class="wbp-tab-title">
                                <h3><?php echo __('Contact Form Log', 'wp-popup-lite'); ?></h3>
                            </div>
                            <div class="wpb_manage_popups wpb_tabs_content ">
                                <?php
                                if (isset($_GET['action']) && ($_GET['action'] == 'edit' )) {
                                    
                                } else {
                                    ?>        
                                    <div class="wpb-listing postbox clearfix">
                                        <?php
                                        if (isset($_GET['message']) && $_GET['message'] == 1) {
                                            ?>
                                            <div class="wpp-notice-mesg notice notice-success is-dismissible">
                                                <p><?php
                                                    echo __('Log Deleted Successfully', 'wp-popup-lite');
                                                    ?>
                                                </p>
                                            </div>
                                        <?php } else if (isset($_GET['message']) && $_GET['message'] == 2) { ?>          
                                            <div class="wpp-notice-mesg notice notice-success is-dismissible">
                                                <p><?php
                                                    echo __('Failed to Delete Log', 'wp-popup-lite');
                                                    ?>
                                                </p>
                                            </div>
                                        <?php } ?>
                                        <?php
                                        global $wpdb;
                                        $table_name = $wpdb->prefix . "popup_banners_form_log";
                                        $logs = $wpdb->get_results("SELECT * FROM $table_name order by id DESC", ARRAY_A);
                                        $wpb_clear_log_nonce = wp_create_nonce('wpb-clear-log-nonce');
                                        ?>

                                        <table class="wp-list-table widefat fixed posts">
                                            <thead>
                                                <tr>
                                                    <th><?php _e('SN', 'wp-popup-lite'); ?></th>
                                                    <th><?php _e('Parent Popup', 'wp-popup-lite'); ?></th>
                                                    <th><?php _e('Submitted Date', 'wp-popup-lite'); ?></th>
                                                    <th><?php _e('Action', 'wp-popup-lite'); ?></th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th><?php _e('SN', 'wp-popup-lite'); ?></th>
                                                    <th><?php _e('Parent Popup', 'wp-popup-lite'); ?></th>
                                                    <th><?php _e('Submitted Date', 'wp-popup-lite'); ?></th>
                                                    <th><?php _e('Action', 'wp-popup-lite'); ?></th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                <?php
                                                if (count($logs) > 0) {
                                                    $log_count = 1;
                                                    $parameteres = array();
                                                    foreach ($logs as $log) {
                                                        $id = $log['id'];
                                                        $wpb_log_delete_nonce = wp_create_nonce('wpb_delete_log_nonce');
                                                        $row_class = ($log_count % 2 == 0) ? 'wpb-even-row' : 'wpb-odd-row';
                                                        ?>
                                                        <tr class="<?php echo $row_class; ?>">
                                                            <td><?php echo $log_count; ?></td>
                                                            <td><?php echo esc_attr($log['parent_popup']); ?></td>
                                                            <td><?php echo esc_attr($log['entry_date']); ?></td>
                                                            <td>
                                                                <div class="wpb-row-actions">
                                                                    <span class="delete" id="wpb-delete-icon"><a href="<?php echo admin_url("admin-post.php?action=wpp_delete_form_log&wpb_id=$id&_wpnonce=$wpb_log_delete_nonce"); ?>" onclick="return confirm('<?php _e('Are you sure to delete this log?', 'wp-popup-lite'); ?>');"><i class="fa fa-trash-o"></i></a></span>
                                                                    <span class="post-link wpb-contact-form-log" id="wpb-preview-icon"><a href="javascript:void(0);" data-entry-id="<?php echo $log['id']; ?>"><i class="fa fa-eye" aria-hidden="true"></i></a></span>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                        $log_count++;
                                                    }
                                                } else {
                                                    ?>
                                                    <tr colspan="3"><td><?php _e('No Log Found', 'wp-popup-lite'); ?></td></tr>
                                                    <?php
                                                }
                                                ?>

                                            </tbody>
                                        </table>
                                    </div>
                                <?php } ?>
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
<div class="wpb-boxes-wrapper">
    <div class="wpb-overlay" style="display:none;"></div>
    <div id="wpb-boxes" class="wpb-boxes" style="display:none;"></div>
    <div class="wpb-view-wrap" style="display:none"><span class="wpb-view-ajax-loader"></span></div>
</div>



