<div class="card" >
                <h1>On entre dans le part card</h1>
                <img src="<?php the_post_thumbnail( ) ?>" class="card-header" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?php the_title() ?></h5>
                     <h6 class="card-subtitle mb-2 text-muted"><?php /*the_category()*/ ?></h6> 
                      <!--Création du menu avec taxonomie  -->
                      <ul>
                    <?php
                    the_terms(get_the_ID(), 'Sports', '<li>', '</li><li>', '</li>');
                    ?>
                    </ul>
                    <?php
                    /*var_dump(get_the_terms(get_the_ID(), 'Sports')); */
                    ?>
                   
                    <!-- fin !!-->

                    <p class="card-text">
                        <?php the_excerpt('Voir plus') ?></p>
                    <a href="<?php the_permalink() ?>" class="btn btn-primary">Voir plus</a>
                </div>
            </div>