<?php

/* contrôle des données récupérées de la page de connexion >>> $_POST...
*/
namespace blog\controller\frontend;

use \blog\model\MemberManager;
use \blog\model\Member;

class ConnectionController
{

	public function accessToInscription()
	{
		require('src/view/frontend/inscriptionView.php');
	}

	public function addMember($login, $password, $passwordBis)
	{
		if ($password === $passwordBis){

			$passHash = password_hash($password, PASSWORD_BCRYPT);

			$data = new Member();
			$data->setPseudo($login);
			$data->setPassword($passHash);

			$memberManager = new MemberManager();
			$member = $memberManager->addNewMember($data);

			require('src/view/frontend/connectionView.php');
		}
		else {
			echo 'Les mots de passe ne sont pas identiques';
		}
	}

	public function openAdmin($pseudo, $password)
	{

		$data = new Member();
		$data->setPseudo($pseudo);
		$data->setPassword($password);

		$memberManager = new MemberManager();
		$member = $memberManager->controlMember($data);

		

		if ($member['pseudo'] === $pseudo ){

			if (password_verify($password, $member['password']))
			{	
				$_SESSION['pseudo'] = $pseudo; 
			}
			else 
			{
				echo 'Mauvais mot de passe !';
			}
		}
		else 
		{
			echo 'Mauvais identifiant !';
		}

	}

	public function closeAdmin()
	{
		session_unset();
		session_destroy();

		require ('src/view/frontend/listArticlesView.php');
	}


	public function accessToAdmin()
	{
		require('src/view/frontend/connectionView.php');
	}
}

