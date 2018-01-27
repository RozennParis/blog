<?php

namespace blog\model;

class Article
{
	protected $id;
	protected $article_number;
	protected $title;
	protected $content;
	protected $dateCreation;

	public function __construct($values = null)
	{
		if ($values != null)
		{
			$this->hydrate($values);
		}
		
	}


	public function hydrate(array $values)
	{
		foreach ($values as $key=>$value)
		{
			$elements = explode('_',$key);
			$newKey='';

			foreach($elements as $el)
			{
				$newKey .= ucfirst($el);
			}
			
			$method = 'set' .ucfirst($newKey);

			if (method_exists($this, $method))
			{
				$this->$method($value);
			}
		}
	}


	public function getId()
	{
		return $this->id;
	}

	public function setId(int $id)
	{
		$this->id = $id;
	}


	public function getArticleNumber()
	{
		return $this->article_number;
	}

	public function setArticleNumber(int $article_number)
	{
		$this->article_number = $article_number;
	}


	public function getTitle()
	{
		return $this->title;
	}

	public function setTitle(string $title)
	{
		$this->title = $title;
	}


	public function getContent()
	{
		return $this->content;
	}

	public function setContent(string $content)
	{
		$this->content = $content;
	}


	public function getDateCreation()
	{
		return $this->dateCreation;
	}

	public function setDateCreation($dateCreation)
	{
		$this->dateCreation = $dateCreation;
	}


}