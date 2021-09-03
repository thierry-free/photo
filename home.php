<?php get_header() ?>
<div class="title"><h1>LES <?php single_post_title(''); ?></h1></div>
<div class="main-home">

 <?php
 $query = new WP_query(array(
     'post_type'=>'post',
    'orderby' => 'rand',
     'posts_per_page'=>3,
     //'ignore_sticky_posts' => 1,
 ));
 ?>

<?php if ($query->have_posts()) : ?>
    
        <?php while ($query->have_posts()) :$query-> the_post(); ?>
        
        <?php get_template_part('parts/card','post');?>
        
        
        
        <?php endwhile ?>
        <?=newtheme_pagination();?>
        <?php wp_reset_postdata(  );?>
        
    
    
    
<?php else : ?>
    <h1>Pas d'article</h1>

<?php endif; ?>

<?php get_footer() ?>