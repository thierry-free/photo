<?php 
get_header( );
?>


<h1><?php//the_category();?></h1>
<div class="main">
<div class="box-1">
        
        
    </div>
    <div class="border-bottom separ"></div>
    <p class="p-comment cat-hide">Cliquez sur la photo pour la voir entière</p>
    <?php  
    $category = get_category( get_query_var( 'cat' ) );
    //var_dump($category);
    $cat_id = $category->cat_ID;
    //var_dump($cat_id);
    
    $images = get_posts( array('post_type' => 'attachment', 'category__in' => $cat_id));
    //var_dump($images);
    if ( !empty($images) ):?> 
    <div class="caroussel  js-slider"> 
        <?php foreach ( $images as $image ): 
        //var_dump($image);
            //$image_url = $image->guid;?>
            <?php $datas = wp_get_attachment_metadata( $image->ID ); // les métadonnées du média
                   // var_dump($datas);
                   $metas = $datas['image_meta'];
                   $camera = $metas['camera'];
                   $focale= $metas['focal_length'];
                   $aperture = round ( $metas['aperture'], 1 );
                   $speed = round ( 1 / $metas['shutter_speed'] );
                   $iso = $metas['iso'];
                   ?>

            <?php $title =$image->post_title;
                  $description=$image->post_excerpt;
            //var_dump($title); 
            //var_dump($description);
            ?>
           
           <a href="<?=wp_get_attachment_url($image->ID,'full')?>"> <h3 class="p-comment" ><?=$title ?></h3>
          <img width="99%" src= '<?= wp_get_attachment_url($image->ID,'photo',true);?>'>
           

          <p class="p-comment"><?= $description ?></p>
          <p class="p-comment"><?=$camera .' - '. $focale.'mm - f/' .$aperture .' - '.$iso.'iso' ?> </p>
           </a>
        <?php endforeach ?>
    <?php else :?>
        <div class="box-1">
            <img width="100px" src="/wp-content/themes/NewTheme/assets/images/moi.png">
            <h2>Oupsss !! Aucune Photo pour cette demande</h2>
        </div>

    <?php endif; ?>

   


 
<?php 

// reset the query so the default query can be run 
 //Make sure you don't miss out wp_reset_postdata() at the end or the main query for the category archive won't work.
wp_reset_postdata();
 ?>



</div>
<?php get_footer();?>