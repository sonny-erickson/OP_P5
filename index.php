<?php 
session_start();
require ('vendor/autoload.php');
require_once ('controllers/controller.php');
require_once ('controllers/controllerAuth.php');
require_once ('controllers/controllerAdmin.php');
try
{
	if(isset($_GET['page']))
	{
		if($_GET['page'] === 'home')
		{
			home();
		}
		else if($_GET['page'] === 'top')
		{
			top();
		}
		else if($_GET['page'] === 'news')
		{
			news();
		}
		else if($_GET['page'] === 'mention')
		{
			mention();
		}
		else if($_GET['page'] === 'details')
		{
			details();
		}
		else if($_GET['page'] === 'jeuSolo')
		{
			jeuSolo();
		}
		else if($_GET['page'] === 'error')
		{
			error();
		}
		// --------------------------> AUTH
		else if($_GET['page'] === 'inscription')
		{
			inscription();
		}
		else if($_GET['page'] === 'connection')
		{
			connection();
		}
		else if($_GET['page'] === 'connectionSend')
		{
			connectionSend();
		}
		else if($_GET['page'] === 'deconnexion')
		{
			deconnexion();
		}	
		// --------------------------> ADMIN
		else if($_GET['page'] === 'listing')
		{
			listing();
		}
		else if($_GET['page'] === 'addGame')
		{
			addGame();
		}
		else if($_GET['page'] === 'deleteGame')
		{
			deleteGame($_GET['id_game'], $_GET['id_plat']);
		}
		else
		{
			home();
		}
		
		// else if($_GET['page'] === "route")
	    // {
	    //     controlleur();
	    // }
	}
	else
		{
			home();
		}
}
catch(Exception $e) 
{ 
   $errorMessage = $e->getMessage();
   //header ('Location: index.php?page=error');
   echo($errorMessage);
}

