<?php
function newtheme_pagination (){
    $pages = paginate_links(['type' => 'array']);    /**récupération sous forme de tableau */
    if ($pages === null) {  /**Si il n'y a pas plusieurs pages  */
         return;                /**renvoi */
     } ?>
    <div class="pagination">
    <nav label="pagination" > 
    <ul class="pagination">
        <?php                     /**"""" */
    $pages = paginate_links(['type' => 'array']);
    /**var_dump($page);*/
    foreach($pages as $page){
            $active =strpos($page, 'current') !== false;
            $class = 'page-item';
            if ($active){
                    $class .= ' active';
            }
        echo '<li class="' .$class . '">';
        echo str_replace('page-numbers','page-link', $page);
        echo '</li>';

    }?>
    </ul>
    </nav>
    </div>
    <?php
}

?>