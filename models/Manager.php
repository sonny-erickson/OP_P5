<?php

class Manager
{
    public function dbConnect()
    {
        try
        {
            $db = new PDO('mysql:host=localhost;dbname=projet5;charset=utf8', 'root', '');
            // Code les caractères
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $db;
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }
    }
}