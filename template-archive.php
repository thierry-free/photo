<?php 
/** 
 * Template Name: Page archive
 * Template post Type: page
 */
?>
<?php get_header( )?>
<div class="title"><h1><?php wp_title(); ?></h1>
<h1> Template Archives</h1>
</div>
<div class="container">
<?php if (have_posts()) : ?>
    <div class="row">
        <?php while (have_posts()) : the_post(); ?>
    
        <div clas="col-lg-10 offset-2" style="width: 18rem;">
            <div class="card" >
                <?php the_post_thumbnail('card-header',['class'=> 'card-img-top', 'alt'=>'','style'=>'height: auto;'])?>
                <img src="<?php  #the_post_thumbnail()?>" class="" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?php the_title() ?></h5>

                    <h6 class="card-subtitle mb-2 text-muted"><?php the_category() ?></h6>

                     <!--Création du menu avec taxonomie  -->
                    <ul>
                    <?php
                    the_terms(get_the_ID(), 'Sports', '<li>', '</li><li>', '</li>');
                    ?>
                    </ul>
                    <?php
                    /*var_dump(get_the_terms(get_the_ID(), 'Sports'));*/
                    ?>
                   
                    <!-- fin !!-->
                    
                    <p class="card-text"><?php the_excerpt('Voir plus') ?></p>
                    <a href="<?php the_permalink() ?>" class="btn btn-primary">Voir plus</a>
                </div>
            </div>
        </div>
        <?php endwhile ?>
    </div>
    // newtheme_pagination()
<?php else : ?>
    <h1>Pas d'article</h1>

<?php endif; ?>









<?php get_footer() ?><div clas="col-sm-4">