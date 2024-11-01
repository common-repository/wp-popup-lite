<?php defined('ABSPATH') or die('No script kiddies please!'); ?>

<span class="wpb-popup-entry-detail-close">X</span>
<div class="wpb-view-popup-wrap">
    <?php
    global $wpdb;
    $table_name = $wpdb->prefix . "popup_banners_form_log";
    $popup_detail = $wpdb->get_results("SELECT * FROM $table_name WHERE id=" . $entry_id);
    foreach ($popup_detail as $row) {
        $form_details = maybe_unserialize($row->form_log_detail);
        $form_detail = json_decode($form_details);
    }
    ?>                                                            
    <div class="wpb-view-popup-details-container ">    
        <?php foreach ($form_detail as $keyp => $valp) {
            $log_count = 1;
            $row_class = ($log_count % 2 == 0) ? 'wpb-log-even-row' : 'wpb-log-odd-row';
            ?>                                      
            <div class='wpb-form-lof-inner-wrapper <?php echo $row_class; ?>'>
                <div class="wpb-contact-header"><?php echo esc_attr($keyp); ?></div>
                <div id="name" class="wpb-view-popup-entry-details">
                    <div class="wpb-view-detail-data">
                        <?php echo esc_attr($valp); ?>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
