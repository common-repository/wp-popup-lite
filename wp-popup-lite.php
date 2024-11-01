<?php

defined('ABSPATH') or die("No script kiddies please");
/*
  Plugin Name: WP Popup Lite
  Plugin URI:  https://accesspressthemes.com/wordpress-plugins/wp-popup/
  Description: Popup plugin to add multifuntional responsive popup in your WordPress site.
  Version:     1.0.8
  Author:      AccessPress Themes
  Author URI:  http://accesspressthemes.com
  License:     GPL2
  License URI: https://www.gnu.org/licenses/gpl-2.0.html
  Domain Path: /languages/
  Text Domain: wp-popup-lite
 */

/**
 * Declaration of necessary constants for plugin
 */
defined('WPP_IMAGE_DIR') or define('WPP_IMAGE_DIR', plugin_dir_url(__FILE__) . 'images');
defined('WPP_BACKEND_DIR') or define('WPP_BACKEND_DIR', plugin_dir_url(__FILE__) . 'inc/backend');
defined('WPP_JS_DIR') or define('WPP_JS_DIR', plugin_dir_url(__FILE__) . 'js');
defined('WPP_CSS_DIR') or define('WPP_CSS_DIR', plugin_dir_url(__FILE__) . 'css');
defined('WPP_VERSION') or define('WPP_VERSION', '1.0.8');
defined('WPB_DEFAULT_VARIABLE') or define('WPB_DEFAULT_VARIABLE', 'wpb_default_settings');
defined('WPP_ABSPATH') or define('WPP_ABSPATH', plugin_dir_path(__FILE__));
if (!defined('WPP_FILE_DIR')) {
  define('WPP_FILE_DIR', plugin_dir_url(__FILE__) . 'inc/backend/');
}

require('inc/class/class-api.php');
require('inc/class/class-mailchimp.php');
if (!class_exists('WPP_Class')) {

    /**
     * Declaration of plugin main class
     */
    class WPP_Class {

      var $wpb_settings;

        /**
         * Constructor
         */
        function __construct() {

          $this->wpb_settings = get_option('wpb_default_settings');
          $this->mailchimp = new WPP_MailChimp();
            register_activation_hook(__FILE__, array($this, 'wpp_activation_function')); //load the function on plugin Activation
            add_action('admin_init', array($this, 'plugin_init')); //session start and load the text domain on plugin initialization
            add_action('admin_menu', array($this, 'add_wpp_menu')); //add the plugin menu on menu bar
            add_action('admin_enqueue_scripts', array($this, 'enqueue_admin_script')); //register admin scripts and css
            add_action('admin_post_wpb_save_options', array($this, 'wpb_save_options')); //save the form data to the database
            add_action('admin_post_wpb_delete', array($this, 'delete_wpb')); //delete popup data from database
            add_action('admin_post_wpp_delete_form_log', array($this, 'wpp_delete_form_log')); //delete popup data from database
            add_action('admin_post_wpp_activate_plugin_option', array($this, 'wpp_activate_plugin_option')); //Plugin activation option
            add_action('wp_ajax_get_popup_data', array($this, 'wpp_get_popup_data')); //get the popup data from database on ajax call
            add_action('wp_ajax_nopriv_get_popup_data', array($this, 'no_perminission')); //restrict the ajax call for other users except admin login
            add_action('wp_ajax_wpp_pull_theme_contents', array($this, 'wpp_pull_theme_contents'));
            add_action('wp_enqueue_scripts', array($this, 'wpp_register_frontend_assets')); //register the front end scripts and css
            add_action('wp_footer', array($this, 'wpp_appendto_footer'), 100); //append the popup div on the footer of page
            add_action('wp_footer', array($this, 'wpp_append_preview_to_footer'), 100); //append the popup div on the footer of page 
            add_action('wp_ajax_wpp_popup_form_submission', array($this, 'wpp_popup_form_submission')); //Ajax form submssion from frontend
            add_action('wp_ajax_nopriv_wpp_popup_form_submission', array($this, 'wpp_popup_form_submission')); //Localization of ajax form submssion from frontend
            add_action('wp_ajax_wpp_popup_contact_form_view_actions', array($this, 'wpp_popup_contact_form_view_actions')); // Contact form view action
            add_filter( 'admin_footer_text', array( $this, 'wppl_admin_footer_text' ) );
            add_filter( 'plugin_row_meta', array( $this, 'wppl_plugin_row_meta' ), 10, 2 );
          }

          function wppl_admin_footer_text( $text ){
            global $post;
            if ( (isset( $_GET[ 'page' ] ) && in_array($_GET[ 'page' ], array('wpp','wpp-new-popup','wpp-cf-log','wpp-setting','wpp-about') ) ) ) {
              $link = 'https://wordpress.org/support/plugin/wp-popup-lite/reviews/#new-post';
              $pro_link = 'https://accesspressthemes.com/wordpress-plugins/wp-popup-banners-pro/';
              $text = 'Enjoyed WP Popup Lite? <a href="' . $link . '" target="_blank">Please leave us a ★★★★★ rating</a> We really appreciate your support! | Try premium version of <a href="' . $pro_link . '" target="_blank">WP Popup Banners Pro</a> - more features, more power!';
              return $text;
            } else {
              return $text;
            }
          }

          function wppl_plugin_row_meta( $links, $file ){

            if ( strpos( $file, 'wp-popup-lite.php' ) !== false ) {
              $new_links = array(
                'demo' => '<a href="http://demo.accesspressthemes.com/wordpress-plugins/wp-popup-lite" target="_blank"><span class="dashicons dashicons-welcome-view-site"></span>Live Demo</a>',
                'doc' => '<a href="https://accesspressthemes.com/documentation/wp-popup-lite/" target="_blank"><span class="dashicons dashicons-media-document"></span>Documentation</a>',
                'support' => '<a href="http://accesspressthemes.com/support" target="_blank"><span class="dashicons dashicons-admin-users"></span>Support</a>',
                'pro' => '<a href="https://accesspressthemes.com/wordpress-plugins/wp-popup-banners-pro/" target="_blank"><span class="dashicons dashicons-cart"></span>Premium version</a>'
              );

              $links = array_merge( $links, $new_links );
            }

            return $links;
          }
        /**
         * Starts session on admin_init hook
         */
        function plugin_init() {
          load_plugin_textdomain('wp-popup-lite', false, dirname(plugin_basename(__FILE__)) . '/languages');
        }

        /**
         * Returns Default Settings
         */
        function get_default_settings() {
          $default_settings = array(
            'check_enable' => '1',
            'default_popup_id' => ''
          );

          return $default_settings;
        }

        /**
         * Plugin Admin Menu
         */
        function add_wpp_menu() {
          add_menu_page(__('WP Popup Lite', 'wp-popup-lite'), __('WP Popup Lite', 'wp-popup-lite'), 'manage_options', 'wpp', array($this, 'wpb_settings'), 'dashicons-admin-page');
          add_submenu_page('wpp', 'All Popups', 'All Popups', 'manage_options', 'wpp', array($this, 'wpb_settings'));
          add_submenu_page('wpp', 'Add New Popup', 'Add New Popup', 'manage_options', 'wpp-new-popup', array($this, 'wpp_new_popup'));
          add_submenu_page('wpp', 'Contact Form log', 'Contact Form log', 'manage_options', 'wpp-cf-log', array($this, 'wpp_contact_form_log'));
          add_submenu_page('wpp', 'Popup settings', 'Popup settings', 'manage_options', 'wpp-setting', array($this, 'wpp_popup_setting'));
          add_submenu_page('wpp', 'About', 'About', 'manage_options', 'wpp-about', array($this, 'wpp_about'));
          add_submenu_page('null', 'Activate', 'Activate', 'manage_options', 'wpp-activation', array($this, 'wpp_activation'));
        }

        /**
         * Page for activation call 
         */
        function wpp_activation() {
          include_once('inc/backend/cores/activate.php');
        }

        /*
         * Plugin Activation update option plugin redirect
         */

        function wpp_activation_function() {
          include('inc/backend/cores/activation.php');
        }

        /**
         * Plugin Main Settings Page
         */
        function wpb_settings() {
          include('inc/backend/main-page.php');
        }

        /**
         * setting page 
         */
        function wpp_popup_setting() {
          include('inc/backend/tabs/setting.php');
        }

        /**
         * About Section 
         */
        function wpp_about() {
          include('inc/backend/tabs/about.php');
        }

        /**
         * Subscription Log 
         */
        function wpp_contact_form_log() {
          include('inc/backend/tabs/contact-form-log.php');
        }

        /**
         * New popup section 
         */
        function wpp_new_popup() {
          include('inc/backend/popup-inner/popup-generator.php');
        }

        /**
         * How tO use section 
         */
        function wpp_how_to_use() {
          include('inc/backend/how-to-use.php');
        }

        /**
         * Registers Admin Assets
         */
        function enqueue_admin_script($hook) {
          $wpp_admin_ajax_nonce = wp_create_nonce('wpp-admin-ajax-nonce');
          $wpp_admin_ajax_object = array('ajax_url' => admin_url('admin-ajax.php'), 'ajax_nonce' => $wpp_admin_ajax_nonce);
          wp_enqueue_script('wpp-admin-js', WPP_JS_DIR . '/backend_popup.js', array('jquery', 'wp-color-picker', 'jquery-ui-draggable', 'jquery-ui-droppable', 'jquery-ui-resizable', 'jquery-ui-datepicker', 'jquery-ui-core'), WPP_VERSION, false);
          wp_localize_script('wpp-admin-js', 'wpp_backend_js_params', $wpp_admin_ajax_object);
          wp_enqueue_style('wp-color-picker');
          wp_enqueue_style('wpp-fontawesome', WPP_CSS_DIR . '/font-awesome/font-awesome.min.css');
          wp_enqueue_style('wpp-admin-css', WPP_CSS_DIR . '/backend.css', array(), WPP_VERSION);
          wp_enqueue_style('wpp-popup-css', WPP_CSS_DIR . '/wpb_popup.css', array(), WPP_VERSION);
          wp_enqueue_script('wpp-colorpicker-alpha', WPP_JS_DIR . '/wp-color-picker-alpha.js', array('wp-color-picker'), WPP_VERSION);
          wp_enqueue_media();
          wp_enqueue_script('wpp-pro-webfont', '//ajax.googleapis.com/ajax/libs/webfont/1.4.7/webfont.js');
          wp_enqueue_style('wpp-jquery-animate-css', WPP_CSS_DIR . '/animate.css');
            /**
             * localize the variable with javascript
             */
            wp_localize_script(
              'wpp-popup-js', 'wpp_admin_js', array(
                'wpp_ajaxurl' => admin_url('admin-ajax.php'),
                'wpp_ajax_nonce' => wp_create_nonce('wpp_ajax_nonce')
              )
            );
          }

        /**
         * Registers frontend Assets
         */
        function wpp_register_frontend_assets() {
          $wpb_default_settings = get_option('wpb_default_settings');
          $wpp_frontend_ajax_nonce = wp_create_nonce('wpp_frontend_ajax_nonce');
          $wpp_frontend_ajax_object = array('ajax_url' => admin_url('admin-ajax.php'), 'ajax_nonce' => $wpp_frontend_ajax_nonce);
          wp_enqueue_script('wpp-frontend-js-script', WPP_JS_DIR . '/frontend_popup.js', array('jquery'), WPP_VERSION, false);
          wp_localize_script('wpp-frontend-js-script', 'wpp_frontend_js', $wpp_frontend_ajax_object);
          wp_enqueue_style('wpp-frontend-css', WPP_CSS_DIR . '/wpb_popup.css', array(), WPP_VERSION);
          if ((!isset($wpb_default_settings['wbp_disable_css3'])) || isset($wpb_default_settings['wbp_disable_css3']) && $wpb_default_settings['wbp_disable_css3'] != 1) {
            wp_enqueue_style('wpp-jquery-animate-css', WPP_CSS_DIR . '/animate.css');
          }
          if ((!isset($wpb_default_settings['wbp_disable_faw'])) || isset($wpb_default_settings['wbp_disable_faw']) && $wpb_default_settings['wbp_disable_faw'] != 1) {
            wp_enqueue_style('wpp-fontawesome', WPP_CSS_DIR . '/font-awesome/font-awesome.min.css');
          }
          wp_enqueue_style('wpp-frontend-responsive-css', WPP_CSS_DIR . '/wpb_responsive.css', array(), WPP_VERSION);
        }

        /**
         * Save popup parameters to the database
         * 
         */
        function wpb_save_options() {
          if (isset($_POST['wpb_add_nonce_save_settings'], $_POST['wpb_save_settings']) && wp_verify_nonce($_POST['wpb_add_nonce_save_settings'], 'wpb_nonce_save_settings') && current_user_can('manage_options')) {
                /**
                 * include to add/update popup if condition matched
                 */
                include( 'inc/backend/actions/save_popup_settings_action.php' );
              } else {
                die('No direct script allowed!!!');
              }
            }

            public static function wpp_mc_get_api() {
              $wpb_default_settings = get_option('wpb_default_settings');
              if (isset($wpb_default_settings['wbp_mailchimp_api_key']) && !empty($wpb_default_settings['wbp_mailchimp_api_key'])) {
                $api = new WPP_API($wpb_default_settings['wbp_mailchimp_api_key']);
              } else {
                $api = new WPP_API('');
              }
              return $api;
            }

        /**
         * 
         * Delete banner from database
         */
        function delete_wpb() {
          if (!empty($_GET) && wp_verify_nonce($_GET['_wpnonce'], 'wpb_delete_nonce')) {
            $log_id = (isset($_GET['wpb_id'])) ? intval(sanitize_text_field($_GET['wpb_id'])) : '';
            global $wpdb;
            $table_name = $wpdb->prefix . 'popup_banners';
            $delete = $wpdb->delete($table_name, array('id' => $log_id), array('%d'));
            if ($delete) {
              wp_redirect(admin_url() . 'admin.php?page=wpp&message=delete-popup');
            } else {
              wp_redirect(admin_url() . 'admin.php?page=wpp&message=no-delete-popup');
            }
          } else {
            die('No direct script allowed!');
          }
        }

        function wpp_delete_form_log() {
          if (!empty($_GET) && wp_verify_nonce($_GET['_wpnonce'], 'wpb_delete_log_nonce') && current_user_can('manage_options')) {
            $log_id = (isset($_GET['wpb_id'])) ? intval(sanitize_text_field($_GET['wpb_id'])) : '';
            global $wpdb;
            $table_name = $wpdb->prefix . 'popup_banners_form_log';
            $delete = $wpdb->delete($table_name, array('id' => $log_id), array('%d'));
            if ($delete) {
              wp_redirect(admin_url() . 'admin.php?page=wpp-cf-log&message=1');
            } else {
              wp_redirect(admin_url() . 'admin.php?page=wpp-cf-log&message=2');
            }
          } else {
            die('No direct script allowed!');
          }
        }

        /**
         * Get popup parameters from database
         */
        function wpp_get_popup_data() {
          return (include('inc/backend/cores/get_db_data.php'));
        }

        /**
         * restrict the Ajax call to the unauthorized users
         */
        function no_perminission() {
          die('No script kiddies please!!');
        }

        /**
         * Function to display popup to frontend
         */
        function wpp_appendto_footer() {
          include( 'inc/frontend/frontend-filter.php' );
        }

        /** Get all pages */
        function wpp_get_all_page_lists() {
          wp_reset_postdata();
          $pages = get_pages(array('posts_per_page' => -1, 'post_status' => 'publish'));
          $page_lists = array();
          if (count($pages) > 0) {
            foreach ($pages as $page) :
              $page_lists[$page->ID] = $page->post_title;
            endforeach;
          }
          return $page_lists;
        }

        /**
         * get Popup Content Data From Table. 
         */
        function get_popup_data($id) {
          global $wpdb;
          $table_name = $wpdb->prefix . "popup_banners";
          if (intval(esc_attr($id))) {
            $popup_content = $wpdb->get_results("SELECT * FROM $table_name where id = $id");
          } else {
            $popup_content = $wpdb->get_results("SELECT * FROM $table_name");
          }
          return $popup_content;
        }

        /**
         * Function To Pull Theme Setting Contents 
         */
        function wpp_pull_theme_contents() {
          if (isset($_POST['_wpnonce']) && wp_verify_nonce($_POST['_wpnonce'], 'wpp-admin-ajax-nonce') && current_user_can('manage_options')) {
            $wpb_id = sanitize_text_field($_POST['wpb_id']);
            $wp_default_theme_type = sanitize_text_field($_POST['wp_default_theme_type']);
            if (isset($wpb_id) && !empty($wpb_id)) {
              $get_data_from_table = $this->get_popup_data($wpb_id);
              if (isset($get_data_from_table[0]) && !empty($get_data_from_table[0])) {
                $popup_data = $get_data_from_table[0];
                $buildin_theme = maybe_unserialize($popup_data->builtin_details);
              }
            }
            include('inc/theme/' . $wp_default_theme_type . '/' . $wp_default_theme_type . '-fields.php');
            die();
          }
        }

        /**
         * Function To Print DB values 
         */
        function print_array($array) {
          echo "<pre style=\"background:#fff;\">";
          print_r($array);
          echo "</pre>";
        }

        /**
         * Function To convert output in frontend
         */
        function output_converting_br($text) {
          $text = implode("\n", explode("<br />", $text));
          return $text;
        }

        /**
         * Function To sanitize linebreaks
         */
        function sanitize_escaping_linebreaks($text) {
          $text = implode("<br />", explode("\n", $text));
          return $text;
        }

        /**
         * Function To Preview Form
         */
        function wpp_append_preview_to_footer() {
          if (isset($_GET['wpb_preview'], $_GET['banner_id']) && is_user_logged_in() && current_user_can('manage_options')) {
            include('inc/backend/actions/preview_popup.php');
            exit();
          }
        }

        /**
         * View Popup Contact Form Details 
         */
        function wpp_popup_contact_form_view_actions() {
          if (isset($_POST['_wpnonce']) && wp_verify_nonce($_POST['_wpnonce'], 'wpp-admin-ajax-nonce') && current_user_can('manage_options')) {
            global $wpdb;
            $entry_id = sanitize_text_field($_POST['entry_id']);
            include( 'inc/backend/actions/wpb_view_form-entry.php' );
            die();
          } else {
            die('No script kiddies please!');
          }
        }

        /**
         * Function to be called when popup form is submitted 
         */
        function wpp_popup_form_submission() {
          if (isset($_POST['_wpnonce']) && wp_verify_nonce($_POST['_wpnonce'], 'wpp_frontend_ajax_nonce')) {
            global $wpdb;
            $wpb_default_settings = get_option('wpb_default_settings');
            $form_submission_type = sanitize_text_field($_POST['form_submission_type']);

            if (isset($form_submission_type) && $form_submission_type == 'inbuild-form') {
              $entry_date = date("d-m-Y (D) H:i:s");
              $form_datavalues = stripslashes_deep($_POST['form_datavalues']);
              $form_datavalues = (is_array($form_datavalues)) ? array_map("sanitize_text_field", $form_datavalues) : sanitize_text_field($form_datavalues);
              $parent_popup = sanitize_text_field($_POST['parent_popup']);
              $popup_val = sanitize_text_field($_POST['popup_val']);
              $get_data_from_table = $this->get_popup_data($popup_val);

              $log_table_name = $wpdb->prefix . "popup_banners_form_log";
              $insert = $wpdb->insert(
                $log_table_name, array(
                  'parent_popup' => $parent_popup,
                  'form_log_detail' => $form_datavalues,
                  'entry_date' => $entry_date,
                )
              );
              if ($insert) {
                echo 'success';
                if (isset($get_data_from_table[0]) && !empty($get_data_from_table[0])) {
                  $popup_data = $get_data_from_table[0];
                  $parameteres = unserialize($popup_data->option_value);
                  if (isset($parameteres['popup_parameters']['wpp_admin_alert_en']) && $parameteres['popup_parameters']['wpp_admin_alert_en'] == 'on') {
                    $admin_email_type = isset($parameteres['popup_parameters']['wpp_select_default_email']) ? sanitize_email($parameteres['popup_parameters']['wpp_select_default_email']) : 'default';
                    $default_admin_alert_email = isset($wpb_default_settings['wbp_admin_notification_email']) && !empty($wpb_default_settings['wbp_admin_notification_email']) ? sanitize_email($wpb_default_settings['wbp_admin_notification_email']) : sanitize_email(get_option('admin_email'));
                    $custom_admin_alert_email = isset($parameteres['popup_parameters']['wpp_custom_admin_email']) && !empty($parameteres['popup_parameters']['wpp_custom_admin_email']) ? sanitize_email($parameteres['popup_parameters']['wpp_custom_admin_email']) : sanitize_email(get_option('admin_email'));
                    if ($admin_email_type == "default") {
                      $to = $default_admin_alert_email;
                    } else {
                      $to = $custom_admin_alert_email;
                    }
                    if (isset($wpb_default_settings['wbp_mail_username']) && !empty($wpb_default_settings['wbp_mail_username'])) {
                      $site_name = esc_attr($wpb_default_settings['wbp_mail_username']);
                    } else {
                      $site_name = esc_attr(get_option('blogname'));
                    }
                    $from_site_url = isset($wpb_default_settings['wbp_mail_email']) && !empty($wpb_default_settings['wbp_mail_email']) ? sanitize_email($wpb_default_settings['wbp_mail_email']) : '';

                    $email_message_from_backend = nl2br(html_entity_decode($wpb_default_settings['wbp_default_admin_notification_message']));
                    $orginalstr = array('#sitename', '#popup_title');
                    $replacestr = array($site_name, $parent_popup);
                    $message = str_replace($orginalstr, $replacestr, $email_message_from_backend);
                    $from = 'From:' . $from_site_url . ' <' . $from_site_url . '>' . "\r\n";
                    $subject = 'New Form Submitted';

                    $headers = "X-Mailer: php\n";
                    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                    $headers .= 'From: ' . $from_site_url . ' ' . "\r\n\\";
                    $headers .= 'Reply-To: ' . $from_site_url . ' ' . "\r\n\\";
                    $headers .= 'X-Mailer: PHP/' . phpversion();

                    $mail = wp_mail($to, $subject, $message, $headers);
                    if ($mail) {
                      echo 'mail-sent';
                    } else {
                      echo 'mail-not-sent';
                    }
                  }
                }
              } else {
                echo 'failed';
                die();
              }
            } else if (isset($form_submission_type) && $form_submission_type == 'external-subscription' && $wpb_default_settings['form_mail_option'] == 'mailchimp') {
                    //Mailchimp Form action
              $email_address = sanitize_email($_POST['email_address']);
              $user_name = sanitize_text_field($_POST['user_name']);
              $popup_val = intval(sanitize_text_field($_POST['popup_val']));
              $get_data_from_table = $this->get_popup_data(intval($popup_val));
              if (isset($get_data_from_table[0]) && !empty($get_data_from_table[0])) {
                $popup_data = $get_data_from_table[0];
                $parameteres = unserialize($popup_data->option_value);
                $buildin_theme = unserialize($popup_data->builtin_details);
                $api = WPP_Class::wpp_mc_get_api();
                $email_type = 'html';
                $merge_vars = array();
                        //$mailchimp_list = isset($parameteres['wpb_ext_sett']['wpb_mc_lists']) && !empty($parameteres['wpb_ext_sett']['wpb_mc_lists']) ? $parameteres['wpp_ext_sett']['wpp_mc_lists'] : '';
                $mailchimp_list = isset($parameteres['wpb_ext_sett']['wpb_mc_lists']) ? $parameteres['wpb_ext_sett']['wpb_mc_lists'] : array();
                if (!empty($mailchimp_list)) {
                  foreach ($mailchimp_list as $list_key => $list_val) {
                    $result = $api->subscribe($list_key, $email_address, $merge_vars, $email_type, '', '', 'true', '');
                  }
                            // did we succeed in subscribing with the parsed data?
                  if (!$result) {
                    echo $this->message_type = ( $api->get_error_code() === 214 ) ? 'already_subscribed' : 'error';
                  } else {
                    $this->message_type = 'subscribed';
                    echo $this->message_type;
                    if (isset($parameteres['popup_parameters']['wpb_admin_alert_en']) && $parameteres['popup_parameters']['wpb_admin_alert_en'] == on) {
                      $this->wpp_admin_subscription_email_alert($popup_val, $email_address, $user_name);
                    }
                  }
                } else {
                  $this->message_type = 'error';
                  echo $this->message_type;
                }
              } else {
                $this->message_type = 'error';
                echo $this->message_type;
              }
                    //mailchimp function ends
            }
          }
          die();
        }

        /**
         * Function To Alert Admin when the user subscribe to the site
         */
        function wpp_admin_subscription_email_alert($popup_val, $email_address, $user_name) {
          $wpb_default_settings = get_option('wpb_default_settings');
          $get_data_from_table = $this->get_popup_data($popup_val);
          if (isset($get_data_from_table[0]) && !empty($get_data_from_table[0])) {
            $popup_data = $get_data_from_table[0];
            $parameteres = unserialize($popup_data->option_value);
            $buildin_theme = unserialize($popup_data->builtin_details);
            $admin_email_type = isset($parameteres['popup_parameters']['wpb_select_default_email']) ? sanitize_email($parameteres['popup_parameters']['wpb_select_default_email']) : 'default';
            $default_admin_alert_email = isset($wpb_default_settings['wbp_admin_notification_email']) && !empty($wpb_default_settings['wbp_admin_notification_email']) ? sanitize_email($wpb_default_settings['wbp_admin_notification_email']) : sanitize_email(get_option('admin_email'));
            $custom_admin_alert_email = isset($parameteres['popup_parameters']['wpb_custom_admin_email']) && !empty($parameteres['popup_parameters']['wpb_custom_admin_email']) ? sanitize_email($parameteres['popup_parameters']['wpb_custom_admin_email']) : sanitize_email(get_option('admin_email'));
            if ($admin_email_type == "default") {
              $to = $default_admin_alert_email;
            } else {
              $to = $custom_admin_alert_email;
            }
            if (isset($wpb_default_settings['wbp_mail_username']) && !empty($wpb_default_settings['wbp_mail_username'])) {
              $site_name = esc_attr($wpb_default_settings['wbp_mail_username']);
            } else {
              $site_name = esc_attr(get_option('blogname'));
            }
            $from_site_url = isset($wpb_default_settings['wbp_mail_email']) && !empty($wpb_default_settings['wbp_mail_email']) ? esc_attr($wpb_default_settings['wbp_mail_email']) : '';

            $message = 'Hi there, <br/><br/>
            Someone just subscribed via WP Popop Lite plugin at ' . $site_name . '.<br/><br/> 
            <strong>Subscriber Details :</strong> <br>
            User name: ' . $user_name . '<br/>
            Email: ' . $email_address . '<br/><br/> Thank you.';

            $subject = 'New visitor from ' . $email_address;

            $headers = "X-Mailer: php\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $headers .= 'From: ' . $from_site_url . ' ' . "\r\n\\";
            $headers .= 'Reply-To: ' . $from_site_url . ' ' . "\r\n\\";
            $headers .= 'X-Mailer: PHP/' . phpversion();

            $mail = wp_mail($to, $subject, $message, $headers);
          }
          die();
        }

      }

    $wpp_object = new WPP_Class(); //initialization of plugin
  }
  // end of plugin