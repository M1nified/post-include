<?php namespace post_include;
 defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
 include_once(realpath(__DIR__.'/values.php'));

$option = get_option('general');
var_dump($option);
print_r($option);
$sf = settings_fields('general');
var_dump($sf);
print_r($sf);