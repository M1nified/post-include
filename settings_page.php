<?php namespace post_include;
 defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
 include_once(realpath(__DIR__.'/values.php'));

//  function fx_smb_settings_page(){
 
    /* global vars */
    global $hook_suffix;
 
    /* utility hook */
    // do_action( 'fx_smb_settings_page_init' );
 
    /* enable add_meta_boxes function in this page. */
    do_action( 'add_meta_box', $hook_suffix );
    ?>
 
    <div class="wrap">
 
        <h2>Settings Meta Box</h2>
 
        <?php settings_errors(); ?>
 
 
            <form id="fx-smb-form" method="post" action="#">

                <?php settings_fields( 'post_include' ); // options group  ?>
                <?php wp_nonce_field( 'closedpostboxes', 'closedpostboxesnonce', false ); ?>
                <?php wp_nonce_field( 'meta-box-order', 'meta-box-order-nonce', false ); ?>

                <?php

                get_option('post_include_elems');


                ?>

                <div id="poststuff">
 
                    <div id="post-body" class="metabox-holder columns-<?php echo 1 == get_current_screen()->get_columns() ? '1' : '2'; ?>">
 
                        <div id="postbox-container-1" class="postbox-container">
 
                            <?php do_meta_boxes( $hook_suffix, 'side', null ); ?>
                            <!-- #side-sortables -->
 
                        </div><!-- #postbox-container-1 -->
 
                        <div id="postbox-container-2" class="postbox-container">
 
                            <?php do_meta_boxes( $hook_suffix, 'normal', null ); ?>
                            <!-- #normal-sortables -->
 
                            <?php do_meta_boxes( $hook_suffix, 'advanced', null ); ?>
                            <!-- #advanced-sortables -->
 
                        </div><!-- #postbox-container-2 -->
 
                    </div><!-- #post-body -->
 
                    <br class="clear">
 
                </div><!-- #poststuff -->
 
            </form>
 
 
    </div><!-- .wrap -->
    // <?php
// }