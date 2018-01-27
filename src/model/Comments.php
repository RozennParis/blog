<?php

namespace blog\model;

class Comments
{
	protected $id;
	protected $article_id;
	protected $concerned_article;
	protected $parent_id;
	protected $author;
	protected $comment;
	protected $comment_date;
	protected $moderation_status;
	protected $alert;

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

		return $this;
	}

	public function getId()
	{
		return $this->id;
	}

	public function setId(int $id)
	{
		$this->id = $id;
	}


	public function getArticleId()
	{
		return $this->article_id;
	}

	public function setArticleId(int $article_id)
	{
		$this->article_id = $article_id;
	}


	public function getConcernedArticle()
	{
		return $this->concerned_article;
	}

	public function setConcernedArticle(int $concerned_article)
	{
		$this->concerned_article = $concerned_article;
	}
	

	public function getParentId()
	{
		return $this->parent_id;
	}

	public function setParentId(int $parent_id)
	{
		$this->parent_id = $parent_id;
	}


	public function getAuthor()
	{
		return $this->author;
	}

	public function setAuthor(string $author)
	{
		$this->author = $author;
	}


	public function getComment()
	{
		return $this->comment;
	}

	public function setComment(string $comment)
	{
		$this->comment = $comment;
	}


	public function getCommentDate()
	{
		return $this->comment_date;
	}

	public function setCommentDate($comment_date)
	{
		$this->comment_date = $comment_date;
	}

	public function getModerationStatus()
	{
		return $this->moderation_status;
	}

	public function setModerationStatus(int $moderation_status)
	{
		$this->moderation_status = $moderation_status;
	}


	public function getAlert()
	{
		return $this->alert;
	}

	public function setAlert(int $alert)
	{
		$this->alert = $alert;
	}


}