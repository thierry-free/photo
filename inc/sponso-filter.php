<?php
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
    add_filter('manage_shoot_posts_columns', function ($columns){
        $newColumns =[];
        foreach($columns as $k => $v){
            if ($k === 'date'){
                $newColumns['sponso'] = 'article sponsorisé?';
            }
            $newColumns[$k] = $v;
        }
        return $newColumns;
    });
    add_filter('manage_shoot_posts_columns', function ($columns){
        $newColumns =[];
        foreach($columns as $k => $v){
            if ($k === 'date'){
                $newColumns['sponsor'] = 'Sponsor?';
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
    add_filter('manage_shoot_posts_custom_column', function ($column, $postId){
    
        if ($column === 'sponso'){
            if (!empty(get_post_meta($postId, SponsoMetaBox::NT_KEY,true))){
                $class = 'yes';
    
            }else{
                $class = 'no';
            }
            echo '<div class="bullet bullet-' .$class . '"></div>';
        }
    }, 10, 2);


?>