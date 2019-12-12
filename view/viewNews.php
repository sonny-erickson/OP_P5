<?php  $title = "Page d'acceuil"; ?>
<?php ob_start(); ?>
    
    <h1 class="text-center"> Voici toutes les nouveautés</h1>
    <div class="container-fluid">
       

          </div>
      </div>
      <?php $content = ob_get_clean(); ?>
    <?php require ("view/template.php"); ?>