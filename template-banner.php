<?php
/** 
 * Template Name: Page avec Bannière
 * Template post Type: page, post
 */
?>

<?php get_header() ?>


<?php if (have_posts()) : while (have_posts() ): the_post(); ?>
    

        <p>Ici la bannière</p>
            <img src="<?php the_post_thumbnail_url()?>" alt="" style= "width:50%; height : auto;">
        </p>

        <h1><?php the_title()?></h1>

        <?php the_content()?>



<?php endwhile;endif; ?>  








<?php get_footer() ?><div clas="col-sm-4">