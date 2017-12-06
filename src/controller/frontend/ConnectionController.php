<?php

/* contrôle des données récupérées de la page de connexion >>> $_POST...
*/
namespace blog\controller\frontend;

use \blog\model\MemberManager;

class ConnectionController
{

	public function openAdmin($pseudo, $password)
	{
		$passHash = hash('sha256', $password);

		$memberManager = new MemberManager();
		$member = $memberManager->controlMember($pseudo, $passHash);

		if (!$member)
		{
			echo 'Mauvais identifiant ou mot de passe !';
		}

		else 
		{
			session_start();
	    	$_SESSION['pseudo'] = $pseudo;

		}

	}

	public function closeAdmin()
	{

	}
}

