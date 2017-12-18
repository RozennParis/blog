<?php

namespace blog\controller\backend;

use \blog\model\ArticleManager;
use \blog\model\CommentManager;
use \blog\model\Article;
use \blog\model\Comments;

class AdminController
{
	public function addArticles($article_number, $title, $content)
	{
		$data = new Article();
		$data->setArticleNumber($article_number);
		$data->setTitle($title);
		$data->setContent($content);

		$articleManager = new ArticleManager(); //création de l'objet
	    $article = $articleManager->addArticle($data); // appel de la fonction de cet objet

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


	public function modifArticle($id, $article_number, $title, $content)
	{
		$data = new Article();
		$data->setId($id);
		$data->setArticleNumber($article_number);
		$data->setTitle($title);
		$data->setContent($content);

		$articleManager = new ArticleManager();
		$article = $articleManager->modifyArticle($data);

		header('Location: index.php?action=adminArticles');
		
	}


	public function showAllComments()
	{
		$commentManager = new commentManager();
		$comments = $commentManager->showComments();

		require ('src/view/backend/commentsAdminView.php');
	}


	public function moderateComments($commentId, $moderation)
	{
		$data = new Comments();
		$data->setId($commentId);
		$data->setModerationStatus($moderation);

		$commentManager = new commentManager();
		$comments = $commentManager->moderateComment($data);


		header ('Location: index.php?action=adminComments');
	}

}