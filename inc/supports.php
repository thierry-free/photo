<?php
defined('ABSPATH') or die();

add_action('after_setup_theme', function () {
    add_theme_support('title-tag');
    add_theme_support('menus');
    add_theme_support('html5');
    add_theme_support('post-thumbnails');
    register_nav_menu('header','En tete du menu');
    register_nav_menu('footer','Pied de page');
    

});
add_filter('upload_mimes', function ($mimes){
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
});

/**function newtheme_register_assets () {
    /**Ajout bootstrap popper & jquery + mise en footer avec true ds les arguments 
    wp_register_style('bootstrap','https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css',[]);
    wp_register_script('bootstrap','https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js', ['popper', 'jquery'],false,true);
                                                                                                            /**dependences
                                                                                                             
    wp_register_script('popper', 'https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js',[],false,true);
   /**Desactiver le jquery intégré à wordpress 
    wp_deregister_script('jquery');
    wp_register_script('jquery','https://code.jquery.com/jquery-3.5.1.slim.min.js',[],false,true);
    /**mise en attente chargement 
    wp_enqueue_style('bootstrap');
    wp_enqueue_script('bootstrap');

    //wp_enqueue_style( 
       // 'new', 
      //  get_template_directory_uri() . '/assets/new-main.css',
       // array(), 
       // '1.0'
   // );
}
add_action('wp_enqueue_scripts', 'newtheme_register_assets');*/