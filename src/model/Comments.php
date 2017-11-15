<?php

class Comments
{
	protected $id;
	protected $article_id;
	protected $author;
	protected $comment;
	protected $dateComment;
	protected $moderationStatement = 0;
	protected $alert = 0;

	/*public function __construct($moderationStatement, $alert) //>>> on veut donner des valeurs par défaut au moment de l'ajout du commentaires dans la bdd
	{
		$this->setModerationStatement($moderationStatement);
		$this->setAlert($alert);
	}*/


	public function getModerationStatement()
	{
		return $this->moderationStatement;
	}

	public function setModerationStatement($moderationStatement)
	{
		$this->moderationStatement = $moderationStatement;
	}


	public function getAlert()
	{
		return $this->alert;
	}

	public function setAlert($alert)
	{
		$this->alert = $alert;
	}


}