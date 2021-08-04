<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta title="Newtheme">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="// get_template_directory_uri() ./assets/new-main.css ">

    <?php wp_head() ?>
</head>
<body>
   


<nav class="navbar navbar-expand-lg navbar-default mb-4">
  
  <a href="<?= home_url('/'); ?>" class="navbar-brand" title="<?php bloginfo('name') ?>">
    <img src="<?= get_theme_mod('logo') ?>" alt="<?php bloginfo('name') ?>">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">

  <?php wp_nav_menu(['theme_location'=>'header',
    'container'=> false,
    'menu_class'=>'navbar-nav ml-auto'
    ])
    ?> 


   
    
    <?= get_search_form() ?>
  </div>
</nav>

