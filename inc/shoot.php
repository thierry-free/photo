<?php

function newtheme_init(){
    /* register_taxonomy('Shoots', 'post',[
         'labels'=> [
         'name' => 'Shoots',   
         'singular_name' => 'Shoot',
         'plural_name' => 'Shoots',
         'search_items' => 'Rechercher des shoots',
         'all_items' => 'Tous les shoots',
         'edit_item' => 'Editer le shoot',
         'update_item' => 'Mettre à jour le shoot',
         'add_new_item' => 'Ajouter un nouveau shoot',
         'new_item_name' => 'Nouveau nom du shoot',
         'menu_name' => 'Shoots',
     ],
     'show_in_rest'=> true, /**Pour faire apparaitre dans l' api REST 
     'hierarchical'=> true,
     'show_admin_column'=> true,
     ]);*/
 
     
     register_post_type('Shoot',[
         'label' => 'Shoots',
         'public' => true,
         'menu_position' => 3,
         'menu_icon' => 'dashicons-camera-alt',
         'supports' => ['title','editor','thumbnail'],
         'show_in_rest' =>true,  /** pour l'utilisation du module bloc en edition*/ 
         'has_archive' =>true, /**Pour avoir une page d'archive */
         //'rewrite' => array('slug' => 'shoots'),
         'taxonomies'  => array( 'category' ),
         'supports'=>['title','editor', 'excerpt', 'thumbnail']
 
 ]);
 }
 add_action('init', 'newtheme_init');/**pour la creation des taxonomies */

 add_filter('manage_shoot_posts_columns',function($columns){
    /*var_dump($columns);die;*/
    /*->récuperation des colonnes et ajout de nouvelles*/
    return [
    'cb' => $columns['cb'],
    'thumbnail' => 'Miniature', /*Nouvelle colonne*/
    'title' =>$columns['title'],
    'categories'=>$columns['categories'],
    'date' =>$columns['date'],
    ];
});

add_filter('manage_shoot_posts_custom_column',function ($column, $postId){
   /* var_dump(func_get_args()); -> recuperation des arguments */
   if ($column === 'thumbnail'){
       the_post_thumbnail('thumbnail', $postId);
   }   
},10,2);
?>