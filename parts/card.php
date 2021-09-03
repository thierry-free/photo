<div class="card-v" >
                <p>On entre dans le part card</p>
                <h2 class=""><?php the_title() ?></h2>
                <div>
                <?php the_post_thumbnail('card-header') ?>
                </div>
                <div class="">
                    
                     <h6 ><?php the_category() ?></h6> 
                      <!--Création du menu avec taxonomie  -->
                      

                    <p >
                        <?php the_excerpt('Voir plus') ?></p>
                        <div class="border-bottom separ"></div>
                    <a href="<?php the_permalink() ?>" class="button-2">Voir plus</a>
                    <div class="separ"></div>
                </div>
            </div>