<!DOCTYPE html>
<html lang="fr">
	<head>
	  <meta charset="UTF-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	  <meta http-equiv="X-UA-Compatible" content="ie=edge">
	  <title>
	  <?php if(isset($title)) : ?>
	  	<?= $title ?> 
	  <?php else : ?>
	  	Projet PHP
	  <?php endif ?>
	  </title>
	  <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
	  <script src="https://cdn.tiny.cloud/1/gn3qzvlvva4r85v1bgn4yi9ywwhsm4mx2i7m2z0qqjxdwvyb/tinymce/5/tinymce.min.js"></script>
		<script>tinymce.init
		({
			selector:'#mytextarea',
			language:'fr_FR',
			entity_encoding : "raw",
			forced_root_block : false,
            force_br_newlines : true,
            force_p_newlines : false,
		});
	  </script>
	  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
                integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
                crossorigin="anonymous">
	  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
				  integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" 
				  crossorigin="anonymous">
	  <link rel="stylesheet" type="text/css" href="assets/style.css"/>
	</head>

	

	