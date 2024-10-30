<?php
/*
Plugin Name: CRM for WooCommerce By GetScorecard
Plugin URI: https://wordpress.org/plugins/crm-for-woocommerce/
Description: This plugin extends WooCommerce into a full Contact, Sales and Production Management system.
Version: 1.0.0
Author: GetScorecard
Author URI: http://www.getscorecard.com/

*/

/*
 * Title   : GetScorecard extension for WooCommerce
 * Author  : GetScorecard
 * Url     : http://www.getscorecard.com/
 * License : http://www.gnu.org/licenses/gpl-2.0.html
 */

require_once '_config.php';
require_once(dirname(__FILE__) . '/controllers/auth.php');

/*load scripts/styles*/
add_action('admin_print_scripts', 'gs_woocrm_load_scripts');
add_action('admin_print_scripts', 'gs_woocrm_load_styles');

function gs_woocrm_load_styles(){
    global $current_screen;
    if($current_screen->id == 'toplevel_page_woocommerce-gs-crm'){
        wp_enqueue_style('gs_commerce_styles', plugins_url('css/styles.css', __FILE__), false, '1');
    }
}

function gs_woocrm_load_scripts(){
    global $current_screen;
    if($current_screen->id == 'toplevel_page_woocommerce-gs-crm'){
        wp_register_script('ajaxloader', plugins_url('js/jquery.ajaxloader.1.5.0.min.js', __FILE__), array('jquery'), '1.4.1.33', true);
        wp_enqueue_script('ajaxloader');
        wp_register_script('validate', plugins_url('js/jquery.validate.min.js', __FILE__), array('jquery'), '1.4.1.33', true);
        wp_enqueue_script('validate');
        wp_register_script('gs_commerce_main', plugins_url('js/main.js', __FILE__), array('jquery'), '1.4.1.33', true);
        wp_enqueue_script('gs_commerce_main');
    }
}
/**/

add_action( 'save_post', 'post_save_action' );

function post_save_action($postId){
    if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
        $post = get_post($postId);
        $apiClient = new WooCommerceGetScorecardApiClient();
        if($apiClient->authorized){
            $wooCommerceHelper = new WooCommerceGetScorecardHelper();
            $data = $wooCommerceHelper->getOrder($postId);

            $apiClient->sendWebHook($data);
        }
    }
}

function gs_woocrm_menu(){

    add_menu_page( 'CRM for WooCommerce',
        'CRM for WooCommerce',
        0,
        'woocommerce-gs-crm',
        'gs_woocrm_page',
        plugins_url('images/admin-icon.png', __FILE__),
        12
    );
}


add_action('admin_menu', 'gs_woocrm_menu');

function gs_woocrm_page(){
    require_once('controllers/settings.php');
}

/*add_action( 'add_meta_boxes', 'es_add_boxes');

function es_add_boxes(){
    add_meta_box( 'easypost_data', __( 'EastPost', 'woocommerce' ), 'woocommerce_easypost_meta_box', 'shop_order', 'normal', 'low' );
}

function woocommerce_easypost_meta_box($post)
{
    print sprintf("<a href='%2\$s' style='text-align:center;display:block;'><img style='max-width:%1\$s' src='%2\$s' ></a>",'450px', get_post_meta( $post->ID, 'easypost_shipping_label', true));
}*/
