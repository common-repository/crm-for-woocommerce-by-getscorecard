<?php
/**
 * Created by PhpStorm.
 * User: Antonshell
 * Date: 18.09.2015
 * Time: 8:40
 */

include('_getscorecard_banner.php');
include('_scripts_init.php'); ?>

<div id="container_woo_gs_crm">
    <div id="woo_gs_crm_toleft_wide">
        <h1><img src="<?php echo plugins_url('../images/engranaje.png', __FILE__); ?>" width="42" height="55" alt="GetScorecard.com" />It seems you don't have WooCommerce installed</h1>
        <p style="margin:-20px 0px 10px 52px;">
            CRM for WooCommerce is an extension for the WooCommerce plugin to integrate with GetScorecard.com. It requires an installation of WooCommerce to work.
        </p>

        <p class="cf7_download_link">To download <strong>"WooCommerce"</strong>, <a class="thickbox" href="<?php echo get_bloginfo('url'); ?>/wp-admin/plugin-install.php?tab=plugin-information&plugin=woocommerce&TB_iframe=true&width=640&height=565">click here</a></p>

        <p class="cf7_download_link">(Once you install "WooCommerce", you can click on <strong>"CRM for WooCommerce"</strong> settings and continue WooCommerce integrations setup).</p>

    </div>
</div>