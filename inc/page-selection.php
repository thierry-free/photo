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
           'taxonomies'  => array( 'category','affichage' ),
            
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
    'taxonomies' =>$columns['affichage'],
    'date' =>$columns['date'],
    ];
});

add_filter('manage_selectionpage_posts_custom_column',function ($column, $postId){
   /* var_dump(func_get_args()); -> recuperation des arguments */
   if ($column === 'thumbnail'){
       the_post_thumbnail('thumbnail', $postId);
   }   
},10,2);
add_filter('manage_selectionpage_posts_columns', function ($columns){
    $newColumns =[];
    foreach($columns as $k => $v){
        if ($k === 'date'){
            $newColumns['affichage'] = 'taille';
        }
        $newColumns[$k] = $v;
    }
    return $newColumns;
});
/**
 * Selection des images depuis les posts selection
 * avec recuperation de la class (taille affichage)
 */
function maselection_show(){
  
            
            $selection = new WP_query(array(
                'post_type'=>'selectionpage',
                'posts_per_page'=>30,
            ));
    //var_dump($selection);
    
    while($selection->have_posts()){
            $selection->the_post();
            global $post;
            
    
            $taxonomy = get_the_terms( get_the_ID(), 'affichage' );
               // var_dump($taxonomy);
                foreach ( $taxonomy as $tax ) {
                    //var_dump($tax->slug);
                     //echo esc_html( $tax->name ); 
                     $class=($tax->slug);
                        //$class=($tax->name);
                     //var_dump($class);?>
                    <div class="<?= $class?>">
                    <?php

                        $image_id = get_post_thumbnail_id();
                        $img_src = wp_get_attachment_image_url( $image_id,$class );
                        $img_alt = get_post_meta( $image_id, '_wp_attachment_image_alt', true ); ?>
                   <!--
                   *Récupération des exifs
                -->
                   <?php $datas = wp_get_attachment_metadata( $image_id ); // les métadonnées du média
                   //var_dump($datas);
                   $metas = $datas['image_meta'];
                   $camera = $metas['camera'];
                   $focale= $metas['focal_length'];
                   $aperture = round ( $metas['aperture'], 1 );
                   $speed = round (1/ $metas['shutter_speed'] );
                   $iso = $metas['iso'];?>
                    
                    
                   <!--affichage--> 
                
                    <p class="p-comment"><?php the_title();?></p>
                    <img width="98%" src="<?php echo esc_attr( $img_src ); ?>"  alt="<?php echo $img_alt; ?>">
            
                    <p class="p-comment"><?=$camera .' - '. $focale.'mm - f/' .$aperture .' - 1/'.$speed. 's - '.$iso.'iso' ?> </p>
                    <?php
                            
                           
                    ?>
                    </div>

                    <?php
            } };              
    }
            
    ?>