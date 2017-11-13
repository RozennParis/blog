<?php

class Article
{
	protected $id;
	protected $title;
	protected $content;
	protected $dateCreation;

	public function __construct($title, $content)
	{
		$this->setTitle($title);
		$this->setContent($content);
	}


	public function getTitle()
	{
		return $this->title;
	}

	public function setTitle($title)
	{
		$this->title = $title;
	}


	public function getContent()
	{
		return $this->content;
	}

	public function setContent($content)
	{
		$this->content = $content;
	}


}