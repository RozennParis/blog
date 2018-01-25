<?php

namespace blog\controller\frontend;

use \blog\model\ArticleManager;
use \blog\model\Article;

class PageController extends \blog\controller\Controller
{

	public function accessToPresentation()
	{
		$articleManager = new ArticleManager();
	 	$chapters = $articleManager->getChapters();
	 	
	    echo $this->twig->render('presentationView.twig', array(
	    	'chapters'=>$chapters
	    ));
	}
}