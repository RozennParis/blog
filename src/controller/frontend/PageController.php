<?php

namespace blog\controller\frontend;

use \blog\model\ArticleManager;
use \blog\model\Article;

class PageController extends \blog\controller\Controller
{
	
	public function accessToAdmin()
	{
		$articleManager = new ArticleManager();
		$chapters = $articleManager->getChapters();
		
		echo $this->twig->render('connectionView.twig', array(
	    	'chapters'=>$chapters
	    ));
	}


	public function accessToPresentation()
	{
		$articleManager = new ArticleManager();
	 	$chapters = $articleManager->getChapters();
	 	
	    echo $this->twig->render('presentationView.twig', array(
	    	'chapters'=>$chapters
	    ));
	}


	public function accessMention()
	{
		$articleManager = new ArticleManager();
	 	$chapters = $articleManager->getChapters();
	 	
	    echo $this->twig->render('mentionsView.twig', array(
	    	'chapters'=>$chapters
	    ));
	}


	public function accessCredits()
	{
		$articleManager = new ArticleManager();
	 	$chapters = $articleManager->getChapters();
	 	
	    echo $this->twig->render('creditsView.twig', array(
	    	'chapters'=>$chapters
	    ));
	}

	public function access404()
	{
		header("HTTP/1.0 404 Not Found");

		$articleManager = new ArticleManager();
	 	$chapters = $articleManager->getChapters();
	 	
	    echo $this->twig->render('error404View.twig', array(
	    	'chapters'=>$chapters
	    ));
	}
}