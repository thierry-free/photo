<?php
/** 
 * Template Name: Page contact
 * Template post Type: page
 */
?>

<?php get_header() ?>

        <div class="contact_main">
                <div class="d_contact">
                        <div class="d__contact1">
                 <img width="50%" src= '/wp-content/themes/NewTheme/assets/images/moi.png'>  
                        </div>
                        <div class="d__contact2">
                 <p>Vous pouvez me contacter via ce formulaire.</p>
                        </div>
                </div>

                <?= do_shortcode('[contact-form-7 id="202" title="Formulaire de contact 1"]');?>


        </div>
           
     





<?php get_footer() ?><div clas="col-sm-4">