<?php
function page_pub_init(){

    $labels = array(
        'name'=> 'Pubs',
        'singular_name'=>  'Pub',
        'add_new'=> 'Ajouter une Pub',
        'add_new_item' => 'Ajouter une nouvelle Pub',
        'edit_item' => 'Editer une Pub',
        'new_item' => 'Nouvelle Pub',
        'view_item' => 'Voir la Pub',
        'search_item' => 'Rechercher une Pub',
        'not_found' => 'Aucune Pub trouvée',
        'not_found_in_trash' => 'Aucune Pub dans la corbeille',
        'parent_item_colon' => '',
        'menu_name' => 'Pub'
    );

register_post_type('Pubpage',[
            'labels' => $labels,
            'public' => true,
            'publicity_queryable' => false,
            //'menu_position' => 9,
            'menu_icon' => 'dashicons-camera-alt',
            'capability_type'=> 'post',
            'supports'=>['title','thumbnail'],
            'show_in_rest' =>true,  
            'has_archive' =>true,  
         //'rewrite' => array('slug' => 'shoots'),
           'taxonomies'  => array( 'category' ),
            
]);
}



add_action( 'init', 'page_Pub_init', );

add_filter('manage_Pubpage_posts_columns',function($columns){
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

add_filter('manage_Pubpage_posts_custom_column',function ($column, $postId){
   /* var_dump(func_get_args()); -> recuperation des arguments */
   if ($column === 'thumbnail'){
       the_post_thumbnail('thumbnail', $postId);
   }   
},10,2);

function maPub_show(){
    
   
    $Pub = new WP_query("post_type=Pubpage");
    
    while($Pub->have_posts()){
            $Pub->the_post();
            global $post;
            //$select=get_the_category();
            the_post_thumbnail('photo-large');
            
            
            
            
    }  
}         
            
?>