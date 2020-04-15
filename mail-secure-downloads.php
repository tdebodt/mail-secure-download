<?php
/**
* Plugin Name: Mail Secure Downloads
* Plugin URI: https://www.yourwebsiteurl.com/
* Description: Replace links to downloadable files with a generated link from Secure Downloads plugin
* Version: 1.0
* Author: Thomas de Bodt
* Author URI: http://kovilo.com
**/

add_filter('wp_mail', 'my_wp_mail');

function my_wp_mail($atts) {
    $product = opsd_get_product('3590');
    $opt = array();
    $opt['expire'] = '+1 week';
    $opt['order'] = $atts['to'];
    $secretLink = opsd_get_secret_link($product, $opt);
    $atts['message'] = str_replace('?3590', $secretLink, $atts['message']);
	return $atts;
}