<?php

class Comments
{
	protected $id;
	protected $article_id;
	protected $parent_id;
	protected $author;
	protected $comment;
	protected $dateComment;
	protected $moderationStatus = 0;
	protected $alert = 0;

	/*public function __construct($moderationStatement, $alert) //>>> on veut donner des valeurs par défaut au moment de l'ajout du commentaires dans la bdd
	{
		$this->setModerationStatement($moderationStatement);
		$this->setAlert($alert);
	}*/


	public function getModerationStatus()
	{
		return $this->moderationStatus;
	}

	public function setModerationStatus($moderationStatus)
	{
		$this->moderationStatement = $moderationStatus;
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