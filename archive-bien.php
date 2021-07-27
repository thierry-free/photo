<?php get_header() ?>




          


<h1>Voir tous nos biens</h1>

<?php if (have_posts()) : ?>
    <div class="row">
        <?php while (have_posts()) : the_post(); ?>
    
        <div clas="col-sm-4" style="width: 18rem;">
        <?php get_template_part('parts/card','post');?>
        </div>
    
        <?php endwhile ?>
        

    </div>

    <?= newtheme_pagination()?>
    <?= paginate_links(); ?>
    
<?php else : ?>
    <h1>Pas d'article</h1>

<?php endif; ?>

<?php get_footer();?>
