<?php  $title = "Page d'acceuil"; ?>
<?php ob_start(); ?>
<div>
  <div class="container-fluid">
    <div id="solo" ></div>
    <?php if(isset($_SESSION['pseudo'])): ?>
    <div id="AddGameSolo" ></div>
    <?php endif;?>
  </div>  
</div> 
<script>
  var platforms=<?php echo $platforms; ?>
</script>
<script src="js/Apisolo.js"></script>
<script>   
  let jeu = new Solo("<?php echo $slug; ?>");
</script>
<?php $content = ob_get_clean(); ?>
<?php require ("view/template.php"); ?>