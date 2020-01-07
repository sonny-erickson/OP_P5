<?php

function listing()
{
	$model = new ModelAdmin();
    $posts = $model -> getGames();
	require ('view/admin/viewListing.php');
	var_dump($posts);
}

function addGame()
{   
    if(isset($_POST['addGame']))    
    {
		$modelAdmin = new ModelAdmin();
		$modelAdmin ->  addGame($id, $titre, $descrition, $rating, $developers, $publishers, $genres, $date_add);
		echo "<script>alert(\"ADD =)\")</script>";
    }
}
function deleteGame($id)
{
    if(isset($id) AND !empty($id))  
    {
        $modelAdmin = new ModelAdmin();
        $modelAdmin -> deleteGame($id);
        header("Location: index.php?page=listing");
    }  
}



