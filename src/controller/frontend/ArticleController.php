<?php

/* dans ce dossier, >>> toutes les vérifications à propos de l'affichage des articles sur la page listArticlesView ou articleView */

namespace blog\controller\frontend;

use \blog\model\ArticleManager;
use \blog\model\CommentManager;
use \blog\model\Article;
use \blog\model\Comments;



class ArticleController
{

	public function listArticles($page)
	{
	    $articleManager = new ArticleManager(); //création de l'objet
	    
	    $articles = $articleManager->getArticles($page); // appel de la fonction de cet objet
	    $numbers = $articleManager->getPage($articles);
	    

	    require('src/view/frontend/listArticlesView.php');
	}

	public function article($id)
	{
		$articleManager = new ArticleManager();
	    $article = $articleManager->getArticle($id);

	    $commentManager = new CommentManager();
	    $comments = $commentManager->getComments($id);

	    
	    require('src/view/frontend/articleView.php');
	}


	public function addComments($articleId, $parentId, $concernedArticle, $author, $comment)
	{
		$data = new Comments();
		$data->setArticleId($articleId);
		$data->setParentId($parentId);
		$data->setConcernedArticle($concernedArticle);
		$data->setAuthor($author);
		$data->setComment($comment);

		$commentManager = new CommentManager();
	    $affectedLines = $commentManager->addComment($data);

	    if ($affectedLines === false)
	    {
	    	die ('Impossible d\'ajouter le commentaire !');
	    }

	    
	    else
	    {
	    	header('Location: index.php?action=article&id=' . $articleId . '&parentId=' . $parentId);
	    }
	}


	public function alertComments($articleId, $commentId, $alert)
	{
		$data = new Comments();
		$data->setId($commentId);
		$data->setAlert($alert);

		$commentManager = new CommentManager();
		$alertComment = $commentManager->alertComment($data);

		header('Location: index.php?action=article&id=' . $articleId);
	}

	
}