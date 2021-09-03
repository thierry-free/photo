<?php get_header() ?>



<div class="title"><h1>Mes Derniers Shoots</h1></div>
<div class="main-home">
<?php
 $query = new WP_query (array(
    'post_type'=>'Shoot',
    'orderby'=>'rand',
    'order'=> 'ASC',
    'posts_per_page'=>2,
 ));
 //var_dump($query);
?>
<?php if ($query->have_posts()) : ?>
    
        <?php while ($query->have_posts()) : $query->the_post();?>
        
        <?php get_template_part('parts/card-long','posts');?>
        
        <?php endwhile ?>
    
    <?= newtheme_pagination()?>
    <?php wp_reset_postdata(  );?>
    <!-- paginate_links; -->
    
<?php else : ?>
    <h1>Pas d'article</h1>

<?php endif; ?>

<?php get_footer();?>
