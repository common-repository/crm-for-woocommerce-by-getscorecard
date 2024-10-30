<?php
/**
 * Created by PhpStorm.
 * User: Antonshell
 * Date: 18.09.2015
 * Time: 16:10
 */

$wooCommerceHelper = new WooCommerceGetScorecardHelper();
$data = $wooCommerceHelper->getOrdersList();

$apiClient->importData($data);
die();