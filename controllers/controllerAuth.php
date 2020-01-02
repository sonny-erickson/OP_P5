<?php

function inscription()
{
    if(isset($_POST['formulInscription']) AND isset($_POST['pseudo'])AND isset($_POST['pass']) AND isset($_POST['pass2']) AND isset($_POST['mail']) AND isset($_POST['mail2']))
    {
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $pass = htmlspecialchars($_POST['pass']);   
        $pass2 = htmlspecialchars($_POST['pass2']);   
        $mail = htmlspecialchars($_POST['mail']);   
        $mail2 = htmlspecialchars($_POST['mail2']);
        if(!empty($_POST['pseudo']) AND !empty($_POST['pass']) AND !empty($_POST['pass2']) AND !empty($_POST['mail']) AND !empty($_POST['mail2']))
        {
            if($mail == $mail2)
            {
                $pass_hache = password_hash($_POST['pass'], PASSWORD_DEFAULT);
                if($pass == $pass2)
                {
                    $model = new ModelAuth();
                    if ($model ->pseudoCheck($pseudo)== 0) 
                    {
                        if ($model ->emailCheckInsciption($mail)== 0)
                        {
                            if(strlen($pseudo)<=255)
                            {
                                $model ->addUser($pseudo, $pass_hache, $mail);
                                Header("Location:index.php?page=connection"); 
                            }
                            else
                            {
                                $erreur = 'Ton pseudo est trop long !';
                            }
                        }
                        else
                        {
                            $erreur = 'Ton email est déja prit  !';
                        }     
                    }
                    else
                    {
                        $erreur = 'Ton pseudo est déja prit  !';          
                    }
                }
                else
                {
                    $erreur = 'Les deux MP ne correspondent pas !';
                }
            }
            else
            {
                $erreur = 'Les deux mails ne correspondent pas !';
            }
        }
        else
        {
        $erreur= 'Champs non remplis';
        }
    }
require 'view/viewInscription.php';
}
function connection()
{
	if(isset($_GET['erreur']))
	{
		$erreur = $_GET['erreur'];
		switch($erreur)
		{
			case 1 :
			$message = "Erreur vous n'avez pas de compte"; break;
			case 2 :
			$message = "Tout les champs doivent être complétés"; break;
			default:
			$message = "Erreur inconnue";
		}
	}
	require ('view/viewConnection.php');
}
function connectionSend()
{
    if(isset($_POST['formulConnect']) AND isset($_POST['mailConnect']) AND isset($_POST['passConnect']))   
    {
        $mailConnect = htmlspecialchars($_POST['mailConnect']);
        $passConnect = htmlspecialchars($_POST['passConnect']);   
        if(!empty($_POST['mailConnect']) AND !empty($_POST['passConnect']))
        {
            $model = new ModelAuth();
            $user = $model ->emailCheckConnection($mailConnect);
            // vérif le pass
            if (!$user) 
            {
                $erreur=1;
            }
            else
            {
                $isPassCorrect = password_verify($_POST['passConnect'], $user['pass']);
                if ($isPassCorrect)
                {
                    $_SESSION['id_member'] = $user['id_member'];
                    $_SESSION['pseudo'] = $user['pseudo'];
                    $_SESSION['rang'] = $user['rang'];
                }
                else
                {
                    $erreur =1;
                }
            }
        }
        else
        {
            $erreur =2;
        }

        if($erreur)
        {
            header("Location: index.php?page=connection&erreur=".$erreur);
        }
        else
        {
            header("Location: index.php?page=home");
        }
    }
}
function deconnexion()
{
    require ('view/viewDeco.php');
}