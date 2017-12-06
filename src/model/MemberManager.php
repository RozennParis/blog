<?php

namespace blog\model;

class MemberManager extends Manager
{
	protected $db;

	public function __construct()
	{
		$this->db = self::dbConnect();
	}
	
	public function controlMember($pseudo, $password)
	{
		
		$req = $this->db->prepare('SELECT pseudo, password FROM members WHERE pseudo = :pseudo AND password = :password');
		$req->execute(array(
			'pseudo' => $pseudo,
			'password'=> $password));
		
		$result = $req->fetch();

		return $result;
	}


}