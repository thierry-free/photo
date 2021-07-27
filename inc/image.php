<?php 
add_action('after_setup_theme', function(){
    set_post_thumbnail_size(250,250,true);
    add_image_size( 'new-image',720, 480, true);
    add_image_size( 'new-image-square', 450, 450, true );
    add_image_size( 'new-archive', 385, 220, true );
    add_image_size( 'new-archive-large', 802, 220, true );
    add_image_size( 'card-header', 100, 100, true);
});

function wptp_add_categories_to_attachments() {
    register_taxonomy_for_object_type( 'category', 'attachment' );
}
add_action( 'init' , 'wptp_add_categories_to_attachments' );


// register new taxonomy which applies to attachments
function wptp_add_location_taxonomy() {
    $labels = array(
        'name'              => 'Locations',
        'singular_name'     => 'Location',
        'search_items'      => 'Search Locations',
        'all_items'         => 'All Locations',
        'parent_item'       => 'Parent Location',
        'parent_item_colon' => 'Parent Location:',
        'edit_item'         => 'Edit Location',
        'update_item'       => 'Update Location',
        'add_new_item'      => 'Add New Location',
        'new_item_name'     => 'New Location Name',
        'menu_name'         => 'Location',
    );
 
    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'query_var' => 'true',
        'rewrite' => 'true',
        'show_admin_column' => 'true',
    );
 
    register_taxonomy( 'location', 'attachment', $args );
}
add_action( 'init', 'wptp_add_location_taxonomy' );