<?php  $title = "Page d'acceuil"; ?>
<?php ob_start(); ?>
<h1 class="text-center"> TOP 2019</h1>
  <div id="top">
    
      <div class="container">
        <div class="row my-5" id="games" >
         
        </div>
      </div> 

          
  </div>   
<?php $content = ob_get_clean(); ?>
<?php require ("view/template.php"); ?>
<?php require ("view/require/template-card.php"); ?>