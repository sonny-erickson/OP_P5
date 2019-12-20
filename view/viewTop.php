<?php  $title = "Page d'acceuil"; ?>
<?php ob_start(); ?>
<h1 class="text-center text-light"> TOP 2019</h1>
  <div>
    
      <div class="container-fluid">
        <div class="row" id="top" >
         
        </div>
      </div> 

          
  </div>   
<?php $content = ob_get_clean(); ?>
<?php require ("view/template.php"); ?>
