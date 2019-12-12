<?php 
session_start();
require_once ('controllers/controller.php');
require_once ('controllers/controllerAuth.php');


try
{
	if(isset($_GET['page']))
	{
		if($_GET['page'] === 'home')
		{
			home();
		}
		if($_GET['page'] === 'top')
		{
			top();
		}
		if($_GET['page'] === 'news')
		{
			news();
		}
		else if($_GET['page'] === 'mention')
		{
			mention();
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
		else if($_GET['page'] === 'deconnexion')
		{
			deconnexion();
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
   var_dump($errorMessage);
   header ('Location: index.php?page=error');	
}

