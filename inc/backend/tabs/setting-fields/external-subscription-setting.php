<div class="wpb-field-section-title">
    <h3><?php echo __('External Subscription Option Setting', 'wp-popup-lite'); ?></h3>
</div>
<div class="wpb-field-setting">
    <label>                
        <h4><?php echo __('Select Form Mail Option', 'wp-popup-lite'); ?></h4>
    </label>
    <div class="wpb-setting-input-field">                
        <select classs="" name="form_mail_option">
            <option value="mailchimp" <?php if (isset($wpb_default_settings['form_mail_option']) && $wpb_default_settings['form_mail_option'] == 'mailchimp') { ?>selected="selected"<?php } ?>><?php echo __('MailChimp', 'wp-popup-lite'); ?></option>
        </select>
        <p class="description" ><?php echo __('Please choose external subscription party.', 'wp-popup-lite') ?></p>
    </div>                   
</div>
<div class='wpb-field-outer-wrapper-section'>
    <div class="wpb-field-setting">
        <label>                
            <h4><?php echo __('Mailchimp API key', 'wp-popup-lite'); ?></h4>
        </label>
        <div class="wpb-setting-input-field">                
            <input type="text" name="wbp_mailchimp_api_key" value="<?php
            if (isset($wpb_default_settings['wbp_mailchimp_api_key']) && !empty($wpb_default_settings['wbp_mailchimp_api_key'])) {
                echo esc_attr($wpb_default_settings['wbp_mailchimp_api_key']);
            }
            ?>">
            <p class="description"><?php _e('Get Your MailChimp API Key', 'wp-popup-lite'); ?> <a target="_blank" href="https://admin.mailchimp.com/account/api"><?php _e('here.', 'wp-popup-lite'); ?></a> / <a target="_blank" href="http://kb.mailchimp.com/accounts/management/about-api-keys"><?php _e('How do I get my API key.', 'wp-popup-lite'); ?></a></p>
        </div>                   
    </div>
    <div class="wpb-field-setting">
        <label>                
            <h4><?php echo __('Mailchimp Status', 'wp-popup-lite'); ?></h4>
        </label>
        <div class="wpb-setting-input-field">                
            <?php $connected = ( $this->wpp_mc_get_api()->is_connected() ); ?>
            <input type="hidden" id="wpb-mc-connected" value="<?php _e('CONNECTED', 'wp-popup-lite'); ?>"/>
            <input type="hidden" id="wpb-mc-connected" value="<?php _e('NOT CONNECTED', 'wp-popup-lite'); ?>"/>    
            <span class="wpb-positive" id="wpb-postive-response"><?php
                if ($connected) {
                    _e('CONNECTED', 'wp-popup-lite');
                } else {
                    _e('NOT CONNECTED', 'wp-popup-lite');
                }
                ?>
            </span>
            <?php if (!$connected) { ?>
                <p class="description"><?php _e('Please fill mailchimp api key above to get Mailchimp Account List.'); ?></p>
            <?php } ?>
        </div>
    </div>
</div>
<div class='wpb-field-outer-wrapper-section'>
    <?php
    if ($connected) {
        $wpb_mailchimp_lists = ($this->mailchimp->get_lists());
        ?>
        <div class="wpb-field-setting">
            <label>                
                <h4><?php echo __('Mailchimp List', 'wp-popup-lite'); ?></h4>
            </label>
            <div class="apexnb-notifybar">
                <p class="wpb-detail"><?php _e('The table below shows your MailChimp lists data.', 'wp-popup-lite'); ?></p>
            </div>
            <div class="wpb-lists-overview">
                <?php if (empty($wpb_mailchimp_lists) || !is_array($wpb_mailchimp_lists)) { ?>
                    <p><?php _e('No lists were found in your MailChimp account', 'wp-popup-lite'); ?>.</p>
                    <?php
                } else {
                    printf('<p>' . __('A total of %d lists were found in your MailChimp account.', 'wp-popup-lite') . '</p>', count($wpb_mailchimp_lists));
                    $i = 1;
                    foreach ($wpb_mailchimp_lists as $list) {
                        ?>
                        <div class="wpb-inner-list-name" id="list-<?php echo $i; ?>" style="cursor:pointer;">
                            <?php echo esc_html($list->name); ?>
                        </div>
                        <div class="clear"></div>
                        <table class="widefat wpb_liststable" cellspacing="0" id="lists-<?php echo $i; ?>">
                            <tbody>
                                <tr>
                                    <th width="150"><?php echo __('List ID', 'wp-popup-lite'); ?></th>
                                    <td><?php echo esc_html($list->id); ?></td>
                                </tr>
                                <tr>
                                    <th><?php echo __('Total subscribers', 'wp-popup-lite'); ?></th>
                                    <td><?php echo esc_html($list->subscriber_count); ?></td>
                                </tr>
                                <tr>
                                    <th>Fields</th>
                                    <td style="padding: 0; border: 0;">
                                        <?php if (!empty($list->merge_vars) && is_array($list->merge_vars)) { ?>
                                            <table class="widefat fixed" cellspacing="0" style="margin: 7px;width: 52%;">
                                                <thead>
                                                    <tr>
                                                        <th><?php echo __('Name', 'wp-popup-lite'); ?></th>
                                                        <th><?php echo __('Tag', 'wp-popup-lite'); ?></th>
                                                        <th><?php echo __('Type', 'wp-popup-lite'); ?></th>
                                                    </tr>
                                                </thead>
                                                <?php foreach ($list->merge_vars as $merge_var) { ?>
                                                    <tr title="<?php printf(__('%s (%s) with field type %s.', 'wp-popup-lite'), esc_html($merge_var->name), esc_html($merge_var->tag), esc_html($merge_var->field_type)); ?>">
                                                        <td><?php
                                                            echo esc_html($merge_var->name);
                                                            if ($merge_var->req) {
                                                                echo '<span style="color:red;">*</span>';
                                                            }
                                                            ?></td>
                                                        <td><code><?php echo esc_html($merge_var->tag); ?></code></td>
                                                        <td><?php echo esc_html($merge_var->field_type); ?></td>
                                                    </tr>
                                                <?php } ?>
                                            </table>
                                        <?php } ?>
                                    </td>
                                </tr>
                                <?php if (!empty($list->interest_groupings) && is_array($list->interest_groupings)) { ?>
                                    <tr>
                                        <th><?php _e('Interest Groupings','wp-pop-banners-pro');?></th>
                                        <td style="padding: 0; border: 0;">
                                            <table class="widefat fixed" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th><?php _e('Name'); ?></th>
                                                        <th><?php _e('Groups'); ?></th>
                                                    </tr>
                                                </thead>
                                                <?php foreach ($list->interest_groupings as $grouping) { ?>
                                                    <tr title="<?php esc_attr(printf(__('%s (ID: %s) with type %s.', 'wp-popup-lite'), $grouping->name, $grouping->id, $grouping->form_field)); ?>">
                                                        <td><?php echo esc_html($grouping->name); ?></td>
                                                        <td>
                                                            <ul class="ul-square">
                                                                <?php foreach ($grouping->groups as $group) { ?>
                                                                    <li><?php echo esc_html($group->name); ?></li>
                                                                <?php } ?>
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            <?php } ?>
                        </table>
                        <?php
                        $i++;
                    }
                }
                ?>
            </div>
        </div>
    <?php } ?>
</div>