<?php  $title = "Page d'acceuil"; ?>
<?php ob_start(); ?>
    
    <h1 class="text-center text-light"> Les nouveautés attendus pour 2020</h1>
    <div>
    
      <div class="container-fluid">
        <div class="row" id="news" >
         
        </div>
      </div> 

          
  </div> 
      <?php $content = ob_get_clean(); ?>
    <?php require ("view/template.php"); ?>