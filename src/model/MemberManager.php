<?php

namespace blog\model;

use \PDO;


class MemberManager extends Manager
{
	protected $db;

	public function __construct()
	{
		$this->db = self::dbConnect();
	}
	

	public function addNewMember(Member $member)
	{
		
		$req = $this->db->prepare('INSERT INTO members (pseudo, password, date_inscription) VALUES (:pseudo, :password, NOW())');
		$req->execute(array(
			'pseudo' => $member->getPseudo(),
			'password'=> $member->getPassword()));

	}

	public function controlMember(Member $member)
	{
		
		$req = $this->db->prepare('SELECT pseudo, password FROM members WHERE pseudo = :pseudo');
		$req->execute(array(
			'pseudo' => $member->getPseudo()));
		
		$result = $req->fetch(PDO::FETCH_ASSOC);

		return $result;
	}


}