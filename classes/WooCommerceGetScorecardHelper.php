<?php
/**
 * Created by PhpStorm.
 * User: Antonshell
 * Date: 23.09.2015
 * Time: 9:48
 */

/**
 * Class WooCommerceHelper
 */
class WooCommerceGetScorecardHelper{

    /**
     * @param $postId
     * @return array
     */
    public function getOrder($postId){
        $post = get_post($postId);
        $meta_values = get_post_meta($postId);
        $userId = $meta_values['_customer_user'][0];

        $user_meta = array();
        if($userId){
            $user = get_user_by( 'id', $userId );
            if($user){
                $user_meta = get_user_meta($userId);
            }
        }

        $order = new WC_Order($post->ID);
        $items = $order->get_items();
        $products = array();

        foreach($items as $item){
            $product = $order->get_product_from_item( $item );
            $products[$product->id] = $product;
        }

        $sitename = get_bloginfo();

        $result = [
            'post' => $post,
            'meta_values' => $meta_values,
            'user_meta' => $user_meta,
            'site_name' => $sitename,
            'items' => $items,
            'products' => $products
        ];

        return $result;
    }

    /**
     * @return array
     */
    public function getOrdersList(){
        $post_type = 'shop_order';

        global $wpdb;
        $post_ids = $wpdb->get_col( $wpdb->prepare( "SELECT ID FROM $wpdb->posts WHERE post_type=%s", $post_type ) );

        $results = array();

        foreach($post_ids as $postId){
            $order = $this->getOrder($postId);
            $results[] = $order;
        }

        return $results;
    }
}