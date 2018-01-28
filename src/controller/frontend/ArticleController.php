<?php

/*  >>> all verifications about display of articles on listArticlesView or articleView */

namespace blog\controller\frontend;

use \blog\model\ArticleManager;
use \blog\model\CommentManager;
use \blog\model\Article;
use \blog\model\Comments;
use \blog\controller\frontend\PageController;


class ArticleController extends \blog\controller\Controller
{
	/** Method to list the extracts on the homepage 
	 * 
	 */
	public function listArticles(int $page)
	{
	    $articleManager = new ArticleManager();
	    
	    $articles = $articleManager->getArticles($page);
	    $numbers = $articleManager->getPage($articles);
	 	$chapters = $articleManager->getChapters();
	 	
	    echo $this->twig->render('listArticlesView.twig', array(
	    	'articles'=>$articles,
	    	'numbers'=>$numbers,
	    	'chapters'=>$chapters
	    ));
	    

	}

	/** Method to show the article on its page
	 * 
	 */
	public function article(int $id)
	{
		$articleManager = new ArticleManager();
		$article = $articleManager->getArticle($id);

		$commentManager = new CommentManager();
		$comments = $commentManager->getComments($id);
		   
		$chapters = $articleManager->getChapters();
		
		if ($article->getId() === NULL)
		{
			$pageController = new PageController();
	        $data = $pageController->access404();
	        
		}
		else 
		{
			echo $this->twig->render('articleView.twig', array(
			   	'article'=>$article,
			    'comments'=>$comments,
			    'chapters'=>$chapters
			));
		}
		
	}

	/** Method to add a comment on the article's page
	 * 
	 */
	public function addComments(int $articleId, int $parentId, int $concernedArticle, string $author, string $comment)
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

	/** Method to alert about a specific comment (by readers)
	 * 
	 */
	public function alertComments(int $articleId, int $commentId, int $alert)
	{
		$data = new Comments();
		$data->setId($commentId);
		$data->setAlert($alert);

		$commentManager = new CommentManager();
		$alertComment = $commentManager->alertComment($data);

	    header('Location: index.php?action=article&id=' . $articleId);
	 
	}

	
}