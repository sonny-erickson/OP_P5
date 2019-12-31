<?php  $title = "Page d'acceuil"; ?>
<?php ob_start(); ?>
<h1 class="text-center text-light"> TOP 2019</h1>
<p class='text-center text-light'>Voici une liste des meilleurs jeux de l'année 2019</p>
  <div>
      <div class="container-fluid">
        <div class="row" id="top" >
         
        </div>
      </div>       
  </div>   
<?php $content = ob_get_clean(); ?>
<?php require ("view/template.php"); ?>
