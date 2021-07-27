<?php get_header() ?>

<?php /* wp_list_categories(['taxonomy' => 'Sports', 'title_li'=> '']);*/?>

<?php $Sports = get_terms(['taxonomy' => 'Sports']);?>
    <ul class="nav nav-pills my-4">
        <?php foreach($Sports as $Sports): ?>
            <li class="nav-item">
                <a href="<?=get_term_link($Sports) ?>" class="nav-link <?= is_tax('Sports', $Sports->term_id) ? 'active':'' ?>"> <?= $Sports->name ?></a>

            </li>
            <?php endforeach; ?>
    </ul>        

Salut t'es sur la home page:<?php wp_title(); ?>
<h1>Home page</h1>

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









<?php get_footer() ?><div clas="col-sm-4">