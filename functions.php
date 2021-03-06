<?php
require_once('inc/image.php');
require_once('inc/supports.php');
require_once('inc/apparence.php');
require_once('inc/page-selection.php');
require_once('inc/shoot.php');
require_once('inc/pagination.php');
require_once('inc/sponso-filter.php');
require_once('inc/image-compl.php');
require_once('inc/mapub-show.php');



function newtheme_register_assets () {
    
   /**Desactiver le jquery intégré à wordpress */
    wp_deregister_script('jquery');
    wp_register_script('jquery','https://code.jquery.com/jquery-3.6.0.min.js',[],false,true);
   
    //slick 
    wp_register_script('slick', get_template_directory_uri().'/assets/slick/slick.min.js',['jquery'],false,true);
    wp_enqueue_script('slick');
    //<script type="text/javascript" src="slick/slick.min.js"></script>
    wp_register_script('new-theme-js', get_template_directory_uri().'/assets/new-theme.js',['slick'],false,true);
    wp_enqueue_script('new-theme-js');
    //swipper


    wp_enqueue_style( 
        'new', get_template_directory_uri() . '/assets/new-main.css',array(), '1.0'
        );

    wp_enqueue_style(
        'slick', get_template_directory_uri() .'/assets/slick/slick.css', array(),'1.0'   
    );
    wp_enqueue_style( 
        'slick-theme', get_template_directory_uri() .'/assets/slick/slick-theme.css', array(),'1.0'
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


//add_action('after_setup_theme', 'newtheme_supports');
add_action('wp_enqueue_scripts', 'newtheme_register_assets');
add_filter('document_title_separator', 'newtheme_title_separator');
add_filter('nav_menu_css_class','newtheme_menu_class');
add_filter('nav_menu_link_attributes','newtheme_menu_link_class');

require_once('metaboxes/sponso.php');
require_once('options/agence.php');

SponsoMetaBox::register();
AgenceMenuPage::register();


add_action('admin_enqueue_scripts', function () {
 wp_enqueue_style('admin_NewTheme', get_template_directory_uri() . '/assets/admin.css');
});

/** font awsome*/
add_action( 'wp_enqueue_scripts', 'add_font_awesome_child_theme' );
function add_font_awesome_child_theme() {
wp_enqueue_style( 'tif', get_bloginfo( 'stylesheet_directory' ) . '/tif/style.css' );
}


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


/*Contact form 7 remove span*/
//add_filter('wpcf7_form_elements', function($content) {
  //  $content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);

  //  $content = str_replace('<br />', '', $content);
        
  //  return $content;
//});