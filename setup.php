<?php namespace post_include;
 defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

 function setup_boxes(){
     add_action('add_meta_boxes','post_include\add_meta_boxes');
 }

 add_action('load-post.php','post_include\setup_boxes');
 add_action('load-post-new.php','post_include\setup_boxes');

//  include_once(realpath(__DIR__.'/header.php'));

//  add_action('the_post','post_include\header');
add_action('wp_enqueue_scripts','post_include\send_it');