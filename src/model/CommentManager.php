<?php

namespace blog\model;

class CommentManager extends Manager
{

	public function __construct()
	{
		$this->db = self::dbConnect();
	}


	//------------ BACKEND ------------
	/** Function to make moderate a comment >>> back
	 * 
	 */
	public function moderateComment()
	{

	}



	//------------ FRONTEND ------------
	/** function to add an article/chapter >>> front
	 * 
	 */
	public function addComment( $articleId, $author, $comment)
	{
		$req = $this->db->prepare('INSERT INTO comments (author, comment, article_id, comment_date) VALUES (:author, :comment, :article_id, NOW())');
	
		$affectedLines = $req->execute(array(

		    'author' => $author,
		    'comment' => $comment,
			'article_id' => $articleId));

		return $affectedLines;
	}


	/** Function to make an alert about a comment >>> front
	 * 
	 */
	public function alertComment()
	{

	}


	/** Function to display comments on the article's page >>> front
	 * 
	 */
	public function getComments($articleId)
	{
		$comments = $this->db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%i\') AS comment_date_fr FROM comments WHERE 	article_id = ? ORDER BY comment_date DESC');

    	$comments->execute(array($articleId));

    	return $comments;
	}
	
}

