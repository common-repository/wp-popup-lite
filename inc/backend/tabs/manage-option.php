<?php defined('ABSPATH') or die("No script kiddies please!"); ?>

<div class="wpb_manage_popups wpb_tabs_content ">
    <?php if (isset($_GET['action']) && ($_GET['action'] == 'edit' )) { ?>
        <div class="wpb-create-new">
            <?php include(WPP_ABSPATH . 'inc/backend/popup-inner/popup-generator.php'); ?>    
        </div>
    <?php } else { ?>        
        <div class="wpb-listing postbox clearfix">
            <?php
            global $wpdb;
            $table_name = $wpdb->prefix . "popup_banners";
            $logs = $wpdb->get_results("SELECT * FROM $table_name order by id DESC", ARRAY_A);
            $wpb_clear_log_nonce = wp_create_nonce('wpb-clear-log-nonce');
            if (isset($_GET['message']) && $_GET['message'] == 'delete-popup') {
                ?>
                <div class="wpp-notice-mesg notice notice-success is-dismissible">
                    <?php
                    echo __('Popup Banner Deleted Successfully', 'wp-popup-lite');
                    ?>
                </div>
            <?php } else if (isset($_GET['message']) && $_GET['message'] == 'no-delete-popup') { ?>
                <div class="wpp-notice-mesg notice notice-error is-dismissible">
                    <?php
                    echo __('Couldnot Delete Popup Banner', 'wp-popup-lite');
                    ?>
                </div>
            <?php } else if (isset($_GET['message']) && $_GET['message'] == 7) { ?>
                <div class="wpp-notice-mesg notice notice-error is-dismissible">
                    <?php
                    echo __('Invalid link or data not found', 'wp-popup-lite');
                    ?>
                </div>
            <?php } ?>
            <div class="wpb-table-header-wrapper">
                <div class="wpb-add-new">
                    <span><?php echo __('Popup Banners', 'wp-popup-lite') ?></span>
                    <a href="<?php echo admin_url('admin.php'); ?>?page=wpp-new-popup" class="add-new-h2"><?php echo __('Add New Popup', 'wp-popup-lite') ?></a>
                </div>
                <table class="wp-list-table widefat fixed posts">
                    <thead>
                        <tr>
                            <th><?php _e('SN', 'wp-popup-lite'); ?></th>
                            <th><?php _e('Title', 'wp-popup-lite'); ?></th>
                            <th><?php _e('Popup Theme', 'wp-popup-lite'); ?></th>
                            <th><?php _e('Created Date', 'wp-popup-lite'); ?></th>
                            <th><?php _e('Action', 'wp-popup-lite'); ?></th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th><?php _e('SN', 'wp-popup-lite'); ?></th>
                            <th><?php _e('Title', 'wp-popup-lite'); ?></th>
                            <th><?php _e('Popup Theme', 'wp-popup-lite'); ?></th>
                            <th><?php _e('Created Date', 'wp-popup-lite'); ?></th>
                            <th><?php _e('Action', 'wp-popup-lite'); ?></th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        if (count($logs) > 0) {
                            $log_count = 1;
                            $parameteres = array();
                            foreach ($logs as $log) {
                                $parameteres = unserialize($log['option_value']);
                                $id = $log['id'];
                                $delete_nonce = wp_create_nonce('wpb_delete_nonce');
                                $row_class = ($log_count % 2 == 0) ? 'wpb-even-row' : 'wpb-odd-row';
                                ?>
                                <tr class="<?php echo $row_class; ?>">
                                    <td <?php if ($wpb_default_settings['default_popup_id'] == $log['id']) { ?> class="wpb_default" <?php } ?>><?php echo $log_count; ?></td>
                                    <td class="wpb-popup-title wpb-column-title">
                                        <?php echo ($parameteres['popup_parameters']['title'] != '') ? $parameteres['popup_parameters']['title'] : __('Untitled Popup', 'wp-popup-lite'); ?>
                                    </td>
                                    <td><?php echo isset($parameteres['popup_parameters']['wpb_theme_type']) && !empty($parameteres['popup_parameters']['wpb_theme_type']) ? ucfirst($parameteres['popup_parameters']['wpb_theme_type']) : ''; ?></td>
                                    <td><?php echo esc_attr($parameteres['popup_parameters']['added_date']); ?></td>
                                    <td>
                                        <div class="wpb-row-actions">
                                            <span class="post-link"><a href="<?php echo admin_url("admin.php?page=wpp&action=edit&wpbid={$log['id']}"); ?>"><i class="fa fa-pencil-square-o"></i></a></span>
                                            <span class="delete"><a href="<?php echo admin_url("admin-post.php?action=wpb_delete&wpb_id={$log['id']}&_wpnonce=$delete_nonce"); ?>" onclick="return confirm('<?php _e('Are you sure to delete this Popup Banner?', 'wp-popup-lite'); ?>');"><i class="fa fa-trash-o"></i></a></span>
                                            <span class="post-link-preview"><a href="<?php echo site_url('?wpb_preview=true&banner_id=' . $id); ?>"  target="_blank"><i class="fa fa-eye" aria-hidden="true"></i></a></span>
                                        </div>
                                    </td>
                                </tr>
                                <?php
                                $log_count++;
                            }
                        } else {
                            ?>
                            <tr colspan="3"><td><?php _e('No Popup Banners found', 'wp-popup-lite'); ?></td></tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="wpp-sidebar">
                <?php include(WPP_ABSPATH . 'inc/backend/tabs/sidebar.php'); ?>
            </div>
        </div>
    <?php } ?>
</div>



