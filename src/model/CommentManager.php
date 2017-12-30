<?php

namespace blog\model;

use \PDO;

class CommentManager extends Manager
{

	public function __construct()
	{
		$this->db = self::dbConnect();
	}


	//------------ BACKEND ------------
	/** Function to make moderate a comment 
	 * 
	 */
	public function moderateComment(Comments $comment)
	{

		$req=$this->db->prepare('UPDATE comments SET moderation_status = :moderation_status WHERE id = :id');

		$moderatedComment = $req->execute(array(
				'id'=>$comment->getId(),
				'moderation_status'=>$comment->getModerationStatus()));	

		return $moderatedComment;
	}


	/** Function to display a list of the comments on the Admin homepage.
	 *
	 */
	public function getAdminComments() //exemple à suivre
	{
		$req = $this->db->query('SELECT id, concerned_article, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y\') AS commentDate FROM comments ORDER BY comment_date DESC LIMIT 0, 10');
		
		$req->execute();

		$values = $req->fetchAll(PDO::FETCH_ASSOC);

		foreach ($values as $value)
		{
			$comments[] = new Comments($value); 
		}

		return $comments;
	}



	/** Function to display all comments on the page to moderate comments
	 * 
	 */
	public function showComments()
	{
		$req = $this->db->query('SELECT id, concerned_article, author, comment, moderation_status, alert, DATE_FORMAT(comment_date, \'%d/%m/%Y\') AS commentDate FROM comments ORDER BY comment_date DESC');

		$req->execute();

		$values = $req->fetchAll(PDO::FETCH_ASSOC);

		foreach ($values as $value)
		{
			$comments[] = new Comments($value); 
		}

		return $comments;
	
    }

	//------------ FRONTEND ------------
	/** function to add an article/chapter >>> front
	 * 
	 */
	public function addComment(Comments $comment)
	{
		$req = $this->db->prepare('INSERT INTO comments (author, comment, article_id, concerned_article, parent_id, comment_date) VALUES (:author, :comment, :article_id, :concerned_article, :parent_id, NOW())');
	
		$addedComment = $req->execute(array(

		    'author' => $comment->getAuthor(),
		    'comment' => $comment->getComment(),
			'article_id' => $comment->getArticleId(),
			'concerned_article'=> $comment->getConcernedArticle(),
			'parent_id'=> $comment->getParentId()));

		return $addedComment;
	}


	/** Function to make an alert about a comment >>> front
	 * 
	 */
	public function alertComment(Comments $comment)
	{
		$req=$this->db->prepare('UPDATE comments SET alert = :alert WHERE id = :id');

		$alertedComment = $req->execute(array(
				'id'=>$comment->getId(),
				'alert'=>$comment->getAlert()));	

		return $alertedComment;

	}


	/** Function to display comments on the article's page >>> front
	 * 
	 */    	
	public function getComments($articleId)
	{
		$req = $this->db->prepare('SELECT *, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%i\') AS commentDate FROM comments WHERE article_id = ? ORDER BY comment_date');

    	$req->execute(array($articleId));

    	$comments = $req->fetchAll(PDO::FETCH_ASSOC);


    	foreach ($comments as $comment)
    	{

    		if ($comment['moderation_status'] == 2){
    			$comment['comment'] = 'Ce commentaire a été modéré par l\'auteur';
    		}

    		$com = new Comments($comment);

    		if ($comment['parent_id'] != 0){
    			
    			
    			$arrayComments[$comment['parent_id']][] = $com;
    			    			
    		}
    		else {
    			
    			$arrayComments[$comment['id']][] = $com;
    		}

    		  		
    	}
    	
    	return $arrayComments;

	
    }
}


		