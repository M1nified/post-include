<?php namespace post_include;
 defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

 function add_meta_boxes(){
     add_meta_box(
         'pi-class-one',
         esc_html__('Page Include','Cos tu jest'),
         'post_include\pi_class_one_callback',
         ['post','page'],
         'side',
         'default'
     );
 }

 function pi_class_one_callback($post,$box){
     wp_nonce_field( basename( __FILE__ ), 'pi_nonce' );
    //  var_dump (get_post_meta( $post->ID, 'pi-class-one', true ));
     $stored_meta = get_post_meta($post->ID);
    //  print_r($stored_meta);
     ?>

     <p><?php echo esc_attr( get_post_meta( $post->ID, 'pi-class-one', true ) ); ?></p>

     <p><label><input type="checkbox" name="meta-tabs" id="meta-tabs" value="1" <?php echo (isset($stored_meta['meta-tabs']) && $stored_meta['meta-tabs'][0] == 1) ? 'checked' : ''; ?> > Tabs</label></p>
     <p><label><input type="checkbox" name="meta-fancybox" id="meta-fancybox" value="1" <?php echo (isset($stored_meta['meta-fancybox']) && $stored_meta['meta-fancybox'][0] == 1) ? 'checked' : ''; ?> > Fancybox</label></p>
     <p><label><input type="checkbox" name="meta-simplescroll" id="meta-simplescroll" value="1" <?php echo (isset($stored_meta['meta-simplescroll']) && $stored_meta['meta-simplescroll'][0] == 1) ? 'checked' : ''; ?> > Simplescroll (old floating)</label></p>

     <?php
 }

 function meta_save($post_id){
     // Checks save status
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'pi_nonce' ] ) && wp_verify_nonce( $_POST[ 'pi_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
 
    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }
 
    // Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'meta-tabs' ] )) {
        update_post_meta( $post_id, 'meta-tabs', 1 );
    }else{
        update_post_meta( $post_id, 'meta-tabs', 0 );
    }
    if( isset( $_POST[ 'meta-fancybox' ] )) {
        update_post_meta( $post_id, 'meta-fancybox', 1 );
    }else{
        update_post_meta( $post_id, 'meta-fancybox', 0 );
    }
    if( isset( $_POST[ 'meta-simplescroll' ] )) {
        update_post_meta( $post_id, 'meta-simplescroll', 1 );
    }else{
        update_post_meta( $post_id, 'meta-simplescroll', 0 );
    }
 }

 add_action('save_post','post_include\meta_save');