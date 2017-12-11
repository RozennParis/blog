<?php

namespace blog\model;

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
	public function moderateComment($commentId, $moderation)
	{

		$req=$this->db->prepare('UPDATE comments SET moderation_status = :moderation_status WHERE id = :id');

		$moderatedComment = $req->execute(array(
				'id'=>$commentId,
				'moderation_status'=>$moderation));	

		return $moderatedComment;
	}


	/** Function to display a list of the articles on the Admin homepage.
	 *
	 */
	public function getAdminComments()
	{

		$req = $this->db->query('SELECT id, article_id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y\') AS comment_date_fr FROM comments ORDER BY comment_date DESC LIMIT 0, 10');

		$req->execute();

		$comments = $req->fetchAll();

		return $comments;
	}


	/** Function to display all comments on the page to moderate comments
	 * 
	 */
	public function showComments()
	{
		$req = $this->db->query('SELECT id, article_id, author, comment, moderation_status, alert, DATE_FORMAT(comment_date, \'%d/%m/%Y\') AS comment_date_fr FROM comments ORDER BY comment_date DESC');

		$req->execute();

		$comments = $req->fetchAll();

		return $comments;
	
    }

	//------------ FRONTEND ------------
	/** function to add an article/chapter >>> front
	 * 
	 */
	public function addComment( $articleId, $parentId, $author, $comment)
	{
		$req = $this->db->prepare('INSERT INTO comments (author, comment, article_id, parent_id,comment_date) VALUES (:author, :comment, :article_id, :parent_id, NOW())');
	
		$affectedLines = $req->execute(array(

		    'author' => $author,
		    'comment' => $comment,
			'article_id' => $articleId,
			'parent_id'=> $parentId ));

		return $affectedLines;
	}


	/** Function to make an alert about a comment >>> front
	 * 
	 */
	public function alertComment($commentId, $alert)
	{
		$req=$this->db->prepare('UPDATE comments SET alert = :alert WHERE id = :id');

		$alertedComment = $req->execute(array(
				'id'=>$commentId,
				'alert'=>$alert));	

		return $alertedComment;

	}



	/** Function to display comments on the article's page >>> front
	 * 
	 */
	public function getComments($articleId)
	{
		$comments = $this->db->prepare('SELECT id, author, parent_id, comment, moderation_status, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%i\') AS comment_date_fr FROM comments WHERE article_id = ? ORDER BY comment_date');

    	$comments->execute(array($articleId));

    	foreach ($comments as $comment)
    	{
    		if ($comment['moderation_status'] == 2){
    			$comment['comment'] = 'Ce commentaire a été modéré par l\'auteur';
    		}

    		if ($comment['parent_id'] != 0){
    			$arrayComments[$comment['parent_id']]['answer'][] = $comment;
    		}
    		else {
    			$arrayComments[$comment['id']] = $comment;
    		}

    		
    	}
   
    	return $arrayComments;
	
    }

    	
	
}

