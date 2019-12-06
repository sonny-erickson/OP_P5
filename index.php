<?php  $title = "Page d'acceuil"; ?>
<?php ob_start(); ?>
    
    <h1 class="text-center"> Ma superbe collection !!</h1>
    <div class="container-fluid">
       

          </div>
      </div>
      <?php $content = ob_get_clean(); ?>
    <?php require ("views/template.php"); ?>