<?php


/**
 * Member representative class
 */

class Member
{
	protected $id;
	protected $pseudo;
	protected $password;
	protected $dateInscription;

	
	public function getPseudo()
	{
		return $this->pseudo;
	}


	public function getPassword()
	{
		return $this->password;
	}
}