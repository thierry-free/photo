<?php
require_once('inc/image.php');
require_once('inc/supports.php');
require_once('inc/apparence.php');
/**Ajout titre dynamique */
/**function newtheme_supports (){
    add_theme_support('title-tag');
    add_theme_support( 'post-thumbnails' ); //*ajout image en avant
    add_theme_support('menus');
    register_nav_menu('header','En tete du menu');
    register_nav_menu('footer','Pied de page');
    add_image_size('card-header', 350, 215, true);
}*/

function newtheme_register_assets () {
    /**Ajout bootstrap popper & jquery + mise en footer avec true ds les arguments*/ 
    wp_register_style('bootstrap','https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css',[]);
    wp_register_script('bootstrap','https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js', ['popper', 'jquery'],false,true);
                                                                                                            /**dependences*/
                                                                                                             
    wp_register_script('popper', 'https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js',[],false,true);
   /**Desactiver le jquery intégré à wordpress */
    wp_deregister_script('jquery');
    wp_register_script('jquery','https://code.jquery.com/jquery-3.5.1.slim.min.js',[],false,true);
   /**  mise en attente chargement*/ 
    wp_enqueue_style('bootstrap');
    wp_enqueue_script('bootstrap');

    wp_enqueue_style( 
        'new', 
        get_template_directory_uri() . '/assets/new-main.css',
        array(), 
        '1.0'
    );
}

/**Creation d'un filtre */
function newtheme_title_separator (){
    return '|';
}
function newtheme_menu_class($classes)
{
   // var_dump(func_get_args());
   // die();
    $classes[] = 'nav-item'; //creation du filtre et reuperation dela class nav-item bootstrap
    return $classes;

}
function newtheme_menu_link_class($attrs)
{
  
    $attrs['class'] = 'nav-link'; //creation du filtre
    return $attrs;


}


function newtheme_pagination (){
    $pages = paginate_links(['type' => 'array']);    /**récupération sous forme de tableau */
    if ($pages === null) {  /**Si il n'y a pas plusieurs pages  */
         return;                /**renvoi */
     }
    echo '<nav aria-label="pagination" class="my-4">'; /**récupération de la mise en page bootstrap */
    echo '<ul class="pagination">';                     /**"""" */
    $pages = paginate_links(['type' => 'array']);
    /**var_dump($page);*/
    foreach($pages as $page){
            $active =strpos($page, 'current') !== false;
            $class = 'page-item';
            if ($active){
                    $class .= ' active';
            }
        echo '<li class="' .$class . '">';
        echo str_replace('page-numbers','page-link', $page);
        echo '</li>';

    }
    echo '</ul>';
    echo '</nav>';
}

function newtheme_init(){
    register_taxonomy('Sports', 'post',[
        'labels'=> [
        'name' => 'Sports',   
        'singular_name' => 'Sport',
        'plural_name' => 'Sports',
        'search_items' => 'Rechercher des sports',
        'all_items' => 'Tous les sports',
        'edit_item' => 'Editer le sport',
        'update_item' => 'Mettre à jour le sport',
        'add_new_item' => 'Ajouter un nouveau sport',
        'new_item_name' => 'Nouveau nom du sport',
        'menu_name' => 'Sports',
    ],
    'show_in_rest'=> true, /**Pour faire apparaitre dans l' api REST */
    'hierarchical'=> true,
    'show_admin_column'=> true,
    ]);

    register_post_type('Bien',[
        'label' => 'Bien',
        'public' => true,
        'menu_position' => 3,
        'menu_icon' => 'dashicons-building',
        'supports' => ['title','editor','thumbnail'],
        'show_in_rest' =>true,  /** pour l'utilisation du module bloc en edition */
        'has-archive' =>true, /**Pour avoir une page d'archive */


    ]);
}



add_action('init', 'newtheme_init');/**pour la creation des taxonomies */
//add_action('after_setup_theme', 'newtheme_supports');
add_action('wp_enqueue_scripts', 'newtheme_register_assets');
add_filter('document_title_separator', 'newtheme_title_separator');
add_filter('nav_menu_css_class','newtheme_menu_class');
add_filter('nav_menu_link_attributes','newtheme_menu_link_class');

require_once('metaboxes/sponso.php');
require_once('options/agence.php');

SponsoMetaBox::register();
AgenceMenuPage::register();


add_filter('manage_bien_posts_columns',function($columns){
    /*var_dump($columns);die;*/
    /*->récuperation des colonnes et ajout de nouvelles*/
    return [
    'cb' => $columns['cb'],
    'thumbnail' => 'Miniature', /*Nouvelle colonne*/
    'title' =>$columns['title'],
    'date' =>$columns['date']
    ];
});

add_filter('manage_bien_posts_custom_column',function ($column, $postId){
   /* var_dump(func_get_args()); -> recuperation des arguments */
   if ($column === 'thumbnail'){
       the_post_thumbnail('thumbnail', $postId);
   }   
},10,2);

add_action('admin_enqueue_scripts', function () {
    wp_enqueue_style('admin_NewTheme', get_template_directory_uri() . '/assets/admin.css');
});
    /*rajout d'une colonne sponso en admin dans les posts*/
add_filter('manage_post_posts_columns', function ($columns){
    $newColumns =[];
    foreach($columns as $k => $v){
        if ($k === 'date'){
            $newColumns['sponso'] = 'article sponsorisé?';
        }
        $newColumns[$k] = $v;
    }
    return $newColumns;
});

add_filter('manage_post_posts_custom_column', function ($column, $postId){

    if ($column === 'sponso'){
        if (!empty(get_post_meta($postId, SponsoMetaBox::NT_KEY,true))){
            $class = 'yes';

        }else{
            $class = 'no';
        }
        echo '<div class="bullet bullet-' .$class . '"></div>';
    }
}, 10, 2);

require_once 'widgets/youtubeWidget.php';

//Création des sides bar

function newtheme_register_widget(){
    register_widget( YoutubeWidget::class );

    register_sidebar( [
        'id' => 'homepage',
        'name'=> 'Sidebar Accueil',
        'before_widget' => '<div class="p-4 %2$s" id="ù1$s">',
        'after_widget' => '</div>',
        'before_title'=>'<h4 class="font-italic">',
        'after_title'=>'</h4>'
    ]);
}

add_action( 'widgets_init','newtheme_register_widget');