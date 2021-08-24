<?php get_header() ?>
home page: <div class="title"><h1>LES <?php wp_title(''); ?></h1></div>
<div class="main-home">

 

<?php if (have_posts()) : ?>
    
        <?php while (have_posts()) : the_post(); ?>
        
        <?php get_template_part('parts/card','post');?>
        
        <?php endwhile ?>
    
     <?=newtheme_pagination();?>
    
    
<?php else : ?>
    <h1>Pas d'article</h1>

<?php endif; ?>









<?php get_footer() ?>