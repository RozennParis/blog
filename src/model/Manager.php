<?php


namespace blog\model;

use \PDO;

class Manager
{


	protected function dbConnect()
	{
		try
		{
		    $db= new PDO('mysql:host=localhost;dbname=blog_Jean_Forteroche;charset=utf8', 'identifiant', 'mdp', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		}
		
		catch(Exception $e)
		{
		    die('Erreur : '.$e->getMessage());
		}

		return $db;
	}
}

