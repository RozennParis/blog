<?php

namespace blog\controller\backend;

use \blog\model\ArticleManager;
use \blog\model\CommentManager;

class AdminController
{
	public function addArticles($title, $content)
	{
		
		$articleManager = new ArticleManager(); //création de l'objet
	    $article = $articleManager->addArticle($title,$content); // appel de la fonction de cet objet

	    header('Location: index.php?action=adminView');
	}


	public function listAdmin()
	{
	    $articleManager = new ArticleManager(); //création de l'objet
	    $articles = $articleManager->getAdminArticles(); // appel de la fonction de cet objet

	    $commentManager = new CommentManager();
	    $comments = $commentManager->getAdminComments();


	    require('src/view/backend/adminView.php');
	}


	public function showAllArticles()
	{
		$articleManager = new ArticleManager();
		$articles = $articleManager->showArticles();

		require ('src/view/backend/articlesAdminView.php');
	}


	public function showArticle($articleId)
	{
		$articleManager = new ArticleManager();
	    $article = $articleManager->getArticle($articleId);

	    require ('src/view/backend/articleModifyView.php');

	}


	public function modifArticle($articleId, $title, $content)
	{
		$articleManager = new ArticleManager();
		$article = $articleManager->modifyArticle($articleId, $title, $content);

		header('Location: index.php?action=adminArticles');
		
	}


	public function showAllComments()
	{
		$commentManager = new commentManager();
		$comments = $commentManager->showComments();

		require ('src/view/backend/commentsAdminView.php');
	}


	public function moderateComments($commentId, $moderation, $alert)
	{
		$commentManager = new commentManager();
		$comments = $commentManager->moderateComment($commentId, $moderation);


		header ('Location: index.php?action=adminComments');
	}

}