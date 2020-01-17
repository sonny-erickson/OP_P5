<?php

function listing()
{
	$model = new ModelAdmin();
    $posts = $model -> getGames();
	require ('view/admin/viewListing.php');
}

function addGame()
{   
    //1 verif si jeu existe deja ds table games // bool true
    //2 verif si plat exist deja ds table platforms
    //3 si c'est pas le cas  il faut crer jeu et platform dans la bdd (recup info jeu)
    //4 ds tout les cas ajouter le jeu a la liste du membre
    //5 pont: 
    $modelAdmin = new ModelAdmin();
    $games= $modelAdmin -> getGames();
    $platforms= $modelAdmin -> getPlatforms();
    $gameCheck=json_decode(file_get_contents('https://api.rawg.io/api/games/'.$_GET['game']));
    $title = $gameCheck->name;
    $description = $gameCheck->description;
    $rating = $gameCheck->rating;
    $developers = $gameCheck->name;
    $publishers = $gameCheck->name;
    $genres =$gameCheck->genres[0]->name;
    
   
    $slug = $gameCheck->slug;
    $slugPlatform ="";
    $namePlatform = "";
    // recuperation console name 
    $platformsFetchName = $gameCheck->platforms;
    foreach($platformsFetchName as $platform) {
        //var_dump($platform->platform->slug);
        if($platform->platform->slug == $_GET['platform']) {
            $namePlatform .= $platform->platform->name;
            $slugPlatform .= $platform->platform->slug;
        }
    }
    $isInGames=false;
    $isInPlatforms=false;
//   echo('<pre>');
//      var_export($games["slug"]);//$platforms[$i]['slug']
//      echo('</pre>');

    for($i = 0; $i < count($games); $i++){
        if($gameCheck->slug == $games[$i]["slug"]){//compare infos BDD à infos JSON
            $isInGames=true;
            header("Location: index.php?page=listing"); 
            break;
        }
    }
    if($isInGames == false){
        $modelAdmin ->  addGame($title, $description, $rating, $developers, $publishers, $genres, $slug);
       // header("Location: index.php?page=listing");    
    } 
    for($i = 0; $i < count($platforms); $i++){
        if($_GET['platform'] == $platforms[$i]['slug']){//compare infos BDD à infos JSON
            $isInPlatforms=true;
            header("Location: index.php?page=listing"); 
            break;
        }
    }
    if($isInPlatforms == false){
        $modelAdmin -> addPlatform($slugPlatform, $namePlatform);
        header("Location: index.php?page=listing");    
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



