<?php 
add_action('after_setup_theme', function(){
    set_post_thumbnail_size(250,250,true);
    add_image_size( 'photo',720, 480, true);
    add_image_size( 'photo-square', 450, 450, true );
    add_image_size( 'photo-double', 500, 333, true );
    add_image_size('photo-triple',350,233,true);
    add_image_size('photo-pano', 800, 197,true);
    add_image_size('photo-vert',360,531,true);
    add_image_size('photo-vert-2',600,886,true);
    add_image_size( 'photo-large', 1000, 700, true );
    add_image_size( 'card-header', 100, 100, true);
    add_image_size('caroussel',900, 600, true);
    add_image_size('full',1980,1320,true);
   
});


/*function wptp_add_categories_to_attachments() {
    register_taxonomy('media_categories', 'attachment', array('hierarchical' => true, 'label' => 'Media Categories', 'query_var' => true, 'has_archive' => true, 'rewrite' => array('slug' => 'media-category', 'with_front' => false)));
}
add_action( 'init' , 'wptp_add_categories_to_attachments' );*/

