<?php

/* contrôle des données récupérées de la page de connexion >>> $_POST...
*/
namespace blog\controller\frontend;

use \blog\model\ArticleManager;
use \blog\model\Article;
use \blog\model\MemberManager;
use \blog\model\Member;

class ConnectionController extends \blog\controller\Controller
{
	/** Method to have an access to the inscription page 
	 * 
	 */
	public function accessToInscription()
	{
		echo $this->twig->render('inscriptionView.twig', array());
	}


	/** Method to add a member 
	 * 
	 */
	public function addMember($login, $password, $passwordBis)
	{
		if ($password === $passwordBis){

			$passHash = password_hash($password, PASSWORD_BCRYPT);

			$data = new Member();
			$data->setPseudo($login);
			$data->setPassword($passHash);

			$memberManager = new MemberManager();
			$member = $memberManager->addNewMember($data);

			echo $this->twig->render('connectionView.twig', array(
	    	'member'=>$member
	    	));
		}
		else {
			echo 'Les mots de passe ne sont pas identiques';
		}
	}

	/** Method to open the admin page 
	 * 
	 */
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
				return $_SESSION;
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


	/** Method to close the admin
	 * 
	 */
	public function closeAdmin()
	{
		session_unset();
		session_destroy();

		header('Location: index.php');
	}

	/** Method to have an access to the login page 
	 * 
	 */
	public function accessToAdmin()
	{
		$articleManager = new ArticleManager();
		$chapters = $articleManager->getChapters();
		
		echo $this->twig->render('connectionView.twig', array(
	    	'chapters'=>$chapters
	    ));
	}
}

