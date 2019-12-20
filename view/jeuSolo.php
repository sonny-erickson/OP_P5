<?php  $title = "Page d'acceuil"; ?>
<?php ob_start(); ?>
    
    <div>
    
      <div class="container-fluid">
        <div id="solo" >
         
        </div>
      </div> 

          
  </div> 
      <?php $content = ob_get_clean(); ?>
    <?php require ("view/template.php"); ?>