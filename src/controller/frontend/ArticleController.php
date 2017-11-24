<?php

/* dans ce dossier, >>> toutes les vérifications à propos de l'affichage des articles sur la page listArticlesView ou articleView */

namespace blog\controller\frontend;

use \blog\model\ArticleManager;
use \blog\model\CommentManager;


class ArticleController
{

	public function listArticles()
	{
	    $articleManager = new ArticleManager(); //création de l'objet
	    $articles = $articleManager->getArticles(); // appel de la fonction de cet objet



	    require('src/view/frontend/listArticlesView.php');
	}

	public function article($articleId)
	{
		$articleManager = new ArticleManager();
	    $article = $articleManager->getArticle($_GET['id']);

	    $commentManager = new CommentManager();
	    $comments = $commentManager->getComments($_GET['id']);



	    
	    require('src/view/frontend/articleView.php');
	}


	public function addComments($articleId, $parentId, $author, $comment)
	{
		$commentManager = new CommentManager();
	    $affectedLines = $commentManager->addComment($articleId, $parentId, $author, $comment);

	    if ($affectedLines === false)
	    {
	    	die ('Impossible d\'ajouter le commentaire !');
	    }

	    
	    else
	    {
	    	header('Location: index.php?action=article&id=' . $articleId . '&parentId=' . $parentId);
	    }
	}


	/*public function addAnswers($articleId, $commentId, $author, $answer)
	{
		$answerManager = new AnswerCommentManager();
	    $affectedLines = $answerManager->addAnswer($commentId, $author, $answer);

	    if ($affectedLines === false)
	    {
	    	die ('Impossible d\'ajouter le commentaire !');
	    }

	    else 
	    {
	    	header('Location: index.php?action=article&id=' . $articleId . '&commentId=' . $commentId);
	    }
	}*/

}