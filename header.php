<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta title="Newtheme">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <?php wp_head() ?>
</head>
<body>
   


<header >
  <div class="tete">
  <a href="<?= home_url('/'); ?>" class="" title="<?php bloginfo('name') ?>">
    <img  class="logo_head" src="<?= get_theme_mod('logo') ?>" alt="<?php bloginfo('name') ?>">
  </a>
  </div>

  
<nav class="nav-tete">
  <?php wp_nav_menu(['theme_location'=>'header',
    'container'=> false,
    'menu_class'=>'nav--link'
    ])
    ?> 
  </nav>
  <div class="search_element cat-hide-big">
    <?= get_search_form(); ?>
  </div>
</header>
<div class="search_element cat-hide">
    <?= get_search_form(); ?>
  </div>
  <div class="border-bottom separ"></div>

