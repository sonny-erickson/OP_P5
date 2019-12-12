<?php  $title = "Page d'acceuil"; ?>
<?php ob_start(); ?>
    
    <h1 class="text-center"> Bienvenue sur le site de jeux vidéos actuel et rétro-gaming</h1>
    <div class="container-fluid">
       

          </div>
      </div>
      <?php $content = ob_get_clean(); ?>
    <?php require ("view/template.php"); ?>