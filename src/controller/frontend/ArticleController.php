<?php

/* dans ce dossier, >>> toutes les vérifications à propos de l'affichage des articles sur la page listArticlesView ou articleView */

namespace blog\controller\frontend;

use \blog\model\ArticleManager;


class ArticleController
{

	public function listArticles()
	{
	    $articleManager = new ArticleManager(); //création de l'objet
	    $articles = $articleManager->getArticles(); // appel de la fonction de cet objet
	    

	    require('src/view/frontend/listArticlesView.php');
	}

	/*public function article()
	{
	    $article = getArticle($_GET['id']);
	    $comments = getComments($_GET['id']);

	    require('../../view/frontend/articleView.php');
	}*/
}