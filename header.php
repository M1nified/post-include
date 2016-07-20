<?php namespace post_include;
 defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

function send_it(){

    if(is_page()){
        // global $wp_query;
        $meta = get_post_meta( get_the_ID());
        if(isset($meta['meta-tabs']) && $meta['meta-tabs'][0] == 1){
            include_tabs();
        }
        if(isset($meta['meta-fancybox']) && $meta['meta-fancybox'][0] == 1){
            include_fancybox();
        }
        if(isset($meta['meta-simplescroll']) && $meta['meta-simplescroll'][0] == 1){
            include_simplescroll();
        }
    }
}

function include_tabs(){
    wp_register_style('pi_include_tabs_style',plugins_url(basename(plugin_dir_path(__FILE__)).'/includes/tabs.css'));
    wp_enqueue_style( 'pi_include_tabs_style' );
    wp_enqueue_script('pi_include_tabs_script',plugins_url(basename(plugin_dir_path(__FILE__)).'/includes/tabs.js'),['jquery','jquery-ui-tabs']);
}
function include_fancybox(){
    wp_register_style('pi_include_fancybox_style',plugins_url(basename(plugin_dir_path(__FILE__)).'/includes/lib/fancybox/jquery.fancybox-1.3.4.css'));
    wp_enqueue_style( 'pi_include_fancybox_style' );
    wp_register_script('jquery-fancybox',plugins_url(basename(plugin_dir_path(__FILE__)).'/includes/lib/fancybox/jquery.fancybox-1.3.4.js'));
    wp_enqueue_script('pi_include_fancybox_script',plugins_url(basename(plugin_dir_path(__FILE__)).'/includes/fancybox.js'),['jquery','jquery-fancybox']);
}
function include_simplescroll(){
    wp_register_style('pi_include_simplescroll_style',plugins_url(basename(plugin_dir_path(__FILE__)).'/includes/lib/simplescroll/jquery.simplescroll.css'));
    wp_enqueue_style( 'pi_include_simplescroll_style' );
    wp_register_script('jquery-simplescroll',plugins_url(basename(plugin_dir_path(__FILE__)).'/includes/lib/simplescroll/jquery.simplescroll.min.js'));
    wp_enqueue_script('pi_include_simplescroll_script',plugins_url(basename(plugin_dir_path(__FILE__)).'/includes/simplescroll.js'),['jquery','jquery-simplescroll']);
}