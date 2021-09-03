<?php get_header() ?>


<?php if (have_posts()) : while (have_posts() ): the_post(); ?>


        <?php if(get_post_meta(get_the_ID(), SponsoMetaBox::NT_KEY, true) === '1'): ?>
                <div class="alert alert-info">
                    Cet article est sponsorisé
                </div>
                <?php else: ?>
                    <div class="alert">
                    <!--Cet article n'est pas sponsorisé-->
                </div>
        <?php endif ?>
<div class="main2">
    <!--<div class="row">
        <div class="col-lg-3 offset-4">
        <img src="<?php the_post_thumbnail_url()?>" class='card-header' alt="" >
        </div>
        </div>-->
    <div class="box-1">
        <h2><?php the_title()?></h2></div>
    <div class="border-bottom separ"></div>
    <?php the_content()?>
    <?php //var_dump(get_attached_media('image', get_post())); ?>
    
    <div class=" border-bottom separ"></div>
    <div class="caroussel  js-slider">
                    <?php foreach(get_attached_media('image', get_post()) as $image):?>
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
                        <a href="<?=wp_get_attachment_url($image->ID)?>">
                            <img class="img-caroussel" src="<?=wp_get_attachment_image_url($image->ID,'new-image');?> ">
                            <p class="p-comment"><?= $description ?></p>
          <p class="p-comment"><?=$camera .' - '. $focale.'mm - f/' .$aperture .' - '.$iso.'iso' ?> </p>
                        </a>
                    <?php endforeach ?>
    </div>
    

    <div class=" border-bottom separ"></div>

    

  
<?php endwhile;endif; ?>  




<?php get_footer() ?>