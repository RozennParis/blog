<?php

namespace blog\model;
/**
 * Member representative class
 */

class Member
{
	protected $id;
	protected $pseudo;
	protected $password;
	protected $date_inscription;


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

	public function setId($id)
	{
		$this->id = $id;
	}


	public function getPseudo()
	{
		return $this->pseudo;
	}

	public function setPseudo($pseudo)
	{
		$this->pseudo = $pseudo;
	}


	public function getPassword()
	{
		return $this->password;
	}

	public function setPassword($password)
	{
		$this->password = $password;
	}


	public function getDateInscription()
	{
		return $this->date_inscription;
	}

	public function setDateInscription($date_inscription)
	{
		$this->date_inscription = $date_inscription;
	}
}