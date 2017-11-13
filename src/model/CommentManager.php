<?php


class CommentManager
{


	/** function to add an article/chapter >>> front
	 * 
	 */
	public function addComment()
	{

	}


	/** Function to make an alert about a comment >>> front
	 * 
	 */
	public function alertComment()
	{

	}


	/** Function to make moderate a comment >>> back
	 * 
	 */
	public function moderateComment()
	{

	}

	/** Function to display comments on the article's page >>> front
	 * 
	 */
	public function getComments($articleId)
	{
		$comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC');

    	$comments->execute(array($postId));

    	return $comments;
	}
	
}