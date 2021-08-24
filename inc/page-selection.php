<?php 


function page_selection_init(){

    $labels = array(
        'name'=> 'Selections',
        'singular_name'=>  'Selection',
        'add_new'=> 'Ajouter une Selection',
        'add_new_item' => 'Ajouter une nouvelle Selection',
        'edit_item' => 'Editer une Selection',
        'new_item' => 'Nouvelle Selection',
        'view_item' => 'Voir la Selection',
        'search_item' => 'Rechercher une Selection',
        'not_found' => 'Aucune Selection trouvée',
        'not_found_in_trash' => 'Aucune Selection dans la corbeille',
        'parent_item_colon' => '',
        'menu_name' => 'Selection'
    );

register_post_type('selectionpage',[
            'labels' => $labels,
            'public' => true,
            'publicity_queryable' => false,
            'menu_position' => 9,
            'menu_icon' => 'dashicons-camera-alt',
            'capability_type'=> 'post',
            'supports'=>['title','thumbnail'],
            'show_in_rest' =>true,  
            'has_archive' =>true,  
         //'rewrite' => array('slug' => 'shoots'),
           'taxonomies'  => array( 'category' ),
            
]);
}






add_action( 'init', 'page_selection_init', );

add_filter('manage_selectionpage_posts_columns',function($columns){
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

add_filter('manage_selectionpage_posts_custom_column',function ($column, $postId){
   /* var_dump(func_get_args()); -> recuperation des arguments */
   if ($column === 'thumbnail'){
       the_post_thumbnail('thumbnail', $postId);
   }   
},10,2);

function maselection_show(){
    
    
    $selection = new WP_query("post_type=selectionpage");
    
    while($selection->have_posts()){
            $selection->the_post();
            global $post;
            //var_dump($post);
            $ima_id = $post->ID;
            $title=$post->post_title;               
             //var_dump($ima_id);
            //var_dump(wp_get_attachment_url($ima_id));?>

<img src= '<?= wp_get_attachment_url($ima_id,'photo-large');?>'>

</a>


           <div>
            <a href="<?=wp_get_attachment_url($ima_id)?>"> <h3 class="p-comment" ><?=$title ?></h3>
           <?php the_post_thumbnail('photo-large');?>
        </a></div>
        <div class='border-bottom separ'></div>
        <?php
}  
}




?>


