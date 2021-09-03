
</div> <!--container-->
<div class="border-bottom separ"></div>
<footer>
<?php wp_nav_menu(['theme_location'=>'footer',
'container'=>false,
'menu_class'=>'foot-nav-link'
]);?>
  <?php //dynamic_sidebar('footer');?>
  
  <div class="sociaux">
  <p>Me Suivre </p>
  <a href="https://www.facebook.com/thierryphotos">
  <img height="40px" src="/wp-content/themes/NewTheme/assets/images/facebook.png">
  </a>
  <a href="https://www.instagram.com/thierry__photos">
  <img height="40px" src="/wp-content/themes/NewTheme/assets/images/instagram.png">
  </a>
  </div>
  <br>
  <div class="foot-nav-link" >
  <p> Thierry Photos | Tous droits reservés 2021 | <a href="/mentions-legales">Mentions Légales</a> | Crédits <a target="blank" href="https://www.thierry-freelance.fr">Thierry- Freelance</a> </p>
</div>
<div class="foot">
  <a href="<?= home_url('/'); ?>" class="" title="<?php bloginfo('name') ?>">
    <img  class="logo_foot" src="<?= get_theme_mod('logo') ?>" alt="<?php bloginfo('name') ?>">
  </a>
  </div>

</footer>

<?php wp_footer()?>

</body>
</html>