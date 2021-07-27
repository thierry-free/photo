<?php //var_dump(dynamic_sidebar( 'homepage'))?> /<!--afiiche un bouléin  false / true -->

<?php if(dynamic_sidebar( 'homepage')):?> <!--Si la sidebar est vide : bouléin false possible d'afficher une sidebare par défaut -->
    <div class="p-4">
        <h4 class="fst-italic">Archives</h4>
        <ol class="list-unstyled mb-0"> 
            <?php wp_getarchives(['type'=> 'monthly']) ?>
        </ol>  
    </div>  
<?php endif ?>    