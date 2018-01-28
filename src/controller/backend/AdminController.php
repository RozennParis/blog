<?php

namespace blog\controller\backend;

use \blog\model\ArticleManager;
use \blog\model\CommentManager;
use \blog\model\Article;
use \blog\model\Comments;

class AdminController extends \blog\controller\Controller
{
	public function accessAddition()
	{
		$articleManager = new ArticleManager();
	 	$chapters = $articleManager->getChapters();

		echo $this->twig->render('articleAdditionView.twig', array(
			'chapters'=>$chapters
		));
	}


	public function addArticles(int $article_number, string $title, string $content)
	{
		$data = new Article();
		$data->setArticleNumber($article_number);
		$data->setTitle($title);
		$data->setContent($content);

		

		$articleManager = new ArticleManager(); 
	    $article = $articleManager->addArticle($data);

	    header('Location: index.php?action=adminView');
	}


	public function listAdmin()
	{
	    $articleManager = new ArticleManager();
	    $articles = $articleManager->getAdminArticles();
	    $chapters = $articleManager->getChapters();

	    $commentManager = new CommentManager();
	    $comments = $commentManager->getAdminComments();

	    echo $this->twig->render('adminView.twig', array(
	    	'articles'=>$articles,
	    	'chapters'=>$chapters,
	    	'comments'=>$comments
	    ));
	}


	public function showAllArticles()
	{
		$articleManager = new ArticleManager();
		$articles = $articleManager->showArticles();
		$chapters = $articleManager->getChapters();

		echo $this->twig->render('articlesAdminView.twig', array(
	    	'articles'=>$articles,
	    	'chapters'=>$chapters
	    ));
	}


	public function showArticle(int $articleId)
	{
		$articleManager = new ArticleManager();
	    $article = $articleManager->getArticle($articleId);
	    $chapters = $articleManager->getChapters();

	 
	    echo $this->twig->render('articleModifyView.twig', array(
	    	'article'=>$article,
	    	'chapters'=>$chapters
	    ));

	}


	public function modifArticle(int $id, int $article_number, string $title, string $content)
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


	public function deleteArticle(int $id)
	{
		$articleManager = new ArticleManager();
	    $article = $articleManager->delArticle($id);

	    header('Location: index.php?action=adminArticles');
	}


	public function showAllComments()
	{
		$articleManager = new ArticleManager();
	 	$chapters = $articleManager->getChapters();

		$commentManager = new commentManager();
		$comments = $commentManager->showComments();

		echo $this->twig->render('commentsAdminView.twig', array(
	    	'comments'=>$comments,
	    	'chapters'=>$chapters
	    ));
	}


	public function moderateComments(int $commentId, int $moderation)
	{
		$data = new Comments();
		$data->setId($commentId);
		$data->setModerationStatus($moderation);

		$commentManager = new commentManager();
		$comments = $commentManager->moderateComment($data);


		header ('Location: index.php?action=adminComments');
	}

}