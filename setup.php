<?php namespace post_include;
 defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

 function setup_boxes(){
     add_action('add_meta_boxes','post_include\add_meta_boxes_pi');
 }

 add_action('load-post.php','post_include\setup_boxes');
 add_action('load-post-new.php','post_include\setup_boxes');


 function setup_menu(){
    add_submenu_page(
        'options-general.php',
        'Page Include',
        'Page Include',
        'edit_pages',
        'pi-settings',
        function(){
            include realpath(__DIR__.'/settings_page.php');
        }
    );
 }

 add_action('admin_menu','post_include\setup_menu');

 function setup_settings(){
     register_setting(
         'post_include',
         'post_include_elems',
         'post_include_elems_sanitize'
     );
 }

 add_action('admin_init','post_include\setup_settings');

 function post_include_elems_sanitize($settings){
     $settings = sanitize_text_field($settings);
     return $settings;
 }