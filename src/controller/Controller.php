<?php

namespace blog\controller;

use Twig_Environment; 
use Twig_Extension_Debug; 
use Twig_Loader_Filesystem;
use Twig_Extension_Session;

class Controller
{
	protected $twig;

	public function __construct()
	{
		$loader = new Twig_Loader_Filesystem(array('./src/view/templates', './src/view/frontend', './src/view/backend')); 
		$this->twig = new Twig_Environment($loader, array( 'cache' => false, 'debug' => true ));
		$this->twig->addExtension(new Twig_Extension_Debug());
		$this->twig->addGlobal('_session', $_SESSION);
	}
}