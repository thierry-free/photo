<?php

class SponsoMetaBox {

    const NT_KEY = 'newtheme_sponso';
    const NONCE = '_newtheme_sponso_nonce'; //Clé de verification de l'origine d'envoi 
    public static function register () {
        add_action('add_meta_boxes', [self::class, 'add'],10, 2);
        add_action('save_post', [self::class, 'save']);
    }

    public static function add ($postType, $post){
       if ($postType === 'post'  && current_user_can('publish_post', $post)){
       
        add_meta_box(self::NT_KEY, 'Sponsoring', [self::class, 'render'], 'post','side');
        add_meta_box('newtheme_espace', '  ', 'newtheme_render_espace_box', 'post','side');//Ajouté pour gagner un espace en bas de la side bar 
        }
    }

    public static function render ($post){
        //var_dump($post);
        $value = get_post_meta($post->ID,self::NT_KEY,true);
        wp_nonce_field(self::NONCE, self::NONCE); //cRÉATION DE LA CLÉ DE VERIFICATION 
        ?>
     <input type="hidden" value="0" name="newtheme_sponso"> 
     <input type="checkbox" value="1" name= "newtheme_sponso" <?php checked($value)?>>
     <label for="newthemesponso">Sponsoriser ce post?</label>
        <?php
    }
            //Sauvegarde en base de données 
    public static function save ($post ) {
        //var_dump($post); die;
        //var_dump($_POST); die;
        //var_export(wp_verify_nonce($_POST[self::NONCE],self::NONCE)); die;
        if (array_key_exists(self::NT_KEY, $_POST) && current_user_can('publish_post', $post)
        && wp_verify_nonce($_POST[self::NONCE], self::NONCE)
        ){
            if ($_POST[self::NT_KEY] === "0") {
                delete_post_meta($post,self::NT_KEY);
            } else {
                update_post_meta($post, self::NT_KEY, 1);
            }
        }

   }  
}


?>