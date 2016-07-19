<?php namespace post_include;
 defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

function send_it(){

    if(is_page()){
        global $wp_query;
        echo "PAGE";
    }

    $meta = get_post_meta( get_the_ID(), 'meta-tabs', true );
    if(!empty($meta) && $meta == 1){
        include_tabs();
    }
}

function include_tabs(){
    wp_register_style('pi_include_tabs_style',plugins_url(basename(plugin_dir_path(__FILE__)).'/includes/tabs.css'));
    wp_enqueue_style( 'pi_include_tabs_style' );
    wp_enqueue_script('pi_include_tabs_script',plugins_url(basename(plugin_dir_path(__FILE__)).'/includes/tabs.js'),['jquery','jquery-ui-tabs']);
}
