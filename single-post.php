<?php get_header() ?>


<?php if (have_posts()) : while (have_posts() ): the_post(); ?>


        <?php if(get_post_meta(get_the_ID(), SponsoMetaBox::NT_KEY, true) === '1'): ?>
                <div class="alert alert-info">
                    Cet article est sponsorisé
                </div>
                <?php else: ?>
                    <div class="alert">
                    Cet article n'est pas sponsorisé
                </div>
        <?php endif ?>
<div class="main">
    <!--<div class="row">
        <div class="col-lg-3 offset-4">
        <img src="<?php the_post_thumbnail_url()?>" class='card-header' alt="" >
        </div>
        </div>-->
    <div class="box-1">page single post
        <h2><?php the_title()?></h2></div>
    <div class="border-bottom separ"></div>
    <?php the_content()?>
    <?php //var_dump(get_attached_media('image', get_post())); ?>
    
    <div class=" border-bottom separ"></div>
    <div class="caroussel  js-slider">
                    <?php foreach(get_attached_media('image', get_post()) as $image):?>
                        <a href="<?=wp_get_attachment_url($image->ID)?>">
                            <img class="img-caroussel" src="<?=wp_get_attachment_image_url($image->ID,'caroussel');?> ">
                    </a>
                    <?php endforeach ?>
    </div>
    

    <div class=" border-bottom separ"></div>

    <h2>Articles relatifs</h2>

    <div class="row">

        <?php       /*utilisisation de WP_QUERY qui cré une requete de selection à afficher*/

        $sports = array_map(function ($term){   /*Supplément pour rendre dinamic la recherche sur les relatifs à l'article*/
        return $term->term_id;
        },
        get_the_terms(get_post(), 'Sports'));

        $query = new WP_Query([
            'post__not_in' => [get_the_ID()],
            'post_type' => 'post',   /*recupère les post ou possible d'aficher par ex des biens*/
            'posts_per_page' => 5,
            'orderby' => 'rand',
            'tax_query' => [
                ['taxonomy'=>'Sports',
                'terms'=> $sports 
                ]    
            ],
            'meta_query' => [
                ['key' => SponsoMetaBox::NT_KEY,
                'compare' => 'EXISTS']
            ]
        ]);
        /*création de la boucle WP_QUERY*/
        while ($query->have_posts()) : $query->the_post(); 
        ?>
        <div class="col-sm-4">
            <?php 
            
            get_template_part('parts/card', 'post'); ?>
        </div>
            <?php endwhile; wp_reset_postdata(); ?>
    
    </div>

    <h2>Les biens en vente dans la région</h2>

    <div class="row">

        <?php       /*utilisisation de WP_QUERY qui cré une requete de selection à afficher*/
        
       

        $query = new WP_Query([
            'post__not_in' => [get_the_ID()],
            'post_type' => 'bien',   /*recupère les post ou possible d'aficher par ex des biens*/
            'posts_per_page' => 3,
            
        ]);
        /*création de la boucle WP_QUERY*/
        while ($query->have_posts()) : $query->the_post(); 
        ?>
        <div class="col-sm-4">
            <?php 
            
            get_template_part('parts/card', 'post'); ?>
        </div>
            <?php endwhile; wp_reset_postdata(); ?>
    
    </div>
<?php endwhile;endif; ?>  




<?php get_footer() ?><div clas="col-sm-4">