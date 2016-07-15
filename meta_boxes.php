<?php namespace post_include;
 defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

 function add_meta_boxes_pi(){
     add_meta_box(
         'pi-class-one',
         esc_html__('Post Include','Cos tu jest'),
         'post_include\pi_class_one_callback',
         ['post','page'],
         'side',
         'default'
     );
 }

 function pi_class_one_callback($object,$box){
     var_dump (get_post_meta( $object->ID, 'pi-class-one', true ));
     ?>

     <p><?php echo esc_attr( get_post_meta( $object->ID, 'pi-class-one', true ) ); ?></p>

     <hr>
     <p><input type="text" class="widefat" name="elems[0][script][0]" value="0" placeholder="Script..."></p>
     <p><input type="text" class="widefat" name="elems[0][style][0]" value="0" placeholder="Script..."></p>

     <?php
 }