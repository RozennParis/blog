<?php

class Twig_Extension_Session extends Twig_Extension
{
	public function getGlobals()
	{
		return array('session' => $_SESSION);
	}


	public function getSession()
	{
		return 'session';
	}

	public function getPseudo($pseudo)
	{
		$_SESSION['pseudo'] = $pseudo;
	}
}
