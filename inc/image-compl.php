<?php
/*
Plugin Name: complement info image
Description: Permet d'apporter des compléments d'information image
Version: 0.1
Author: Thierry MOGINOT
*/



/**
 * Initialisation
 */function wptp_add_categories_to_attachments() {
    register_taxonomy_for_object_type( 'category', 'attachment',array('hierarchical' => true, 'label' => 'Category', 'query_var' => true, 'has_archive' => true, 'rewrite' => array('slug' => 'category', 'with_front' => false))); 
}
add_action( 'init' , 'wptp_add_categories_to_attachments' );


// register new taxonomy which applies to attachments
function wptp_add_localisation_taxonomy() {
    $labels = array(
        'name'              => 'Localisations',
        'singular_name'     => 'Localisation',
        'search_items'      => 'Search Localisations',
        'all_items'         => 'All Localisations',
        'parent_item'       => 'Parent Localisation',
        'parent_item_colon' => 'Parent Localisation:',
        'edit_item'         => 'Edit Localisation',
        'update_item'       => 'Update Localisation',
        'add_new_item'      => 'Add New Localisation',
        'new_item_name'     => 'New Localisation Name',
        'menu_name'         => 'Localisation',
    );
 
    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'query_var' => 'true',
        'rewrite' => 'true',
        'show_admin_column' => 'true',
    );
 
    register_taxonomy( 'localisation', 'attachment', $args );
}
add_action( 'init', 'wptp_add_localisation_taxonomy' );

function wptp_add_affichage_taxonomy() {
    $labels = array(
        'name'              => 'Affichages',
        'singular_name'     => 'Affichage',
        'search_items'      => 'Search Affichages',
        'all_items'         => 'All Affichages',
        'parent_item'       => 'Parent Affichage',
        'parent_item_colon' => 'Parent Affichage:',
        'edit_item'         => 'Edit Affichage',
        'update_item'       => 'Update Affichage',
        'add_new_item'      => 'Add New Affichage',
        'new_item_name'     => 'New Affichage Name',
        'menu_name'         => 'Affichage',
    );
 
    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'query_var' => 'true',
        'rewrite' => 'true',
        'show_admin_column' => 'true',
    );
 
    register_taxonomy( 'affichage', 'attachment', $args );
}
add_action( 'init', 'wptp_add_affichage_taxonomy' );
?>