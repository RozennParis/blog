<?php

namespace blog\model;


class ArticleManager extends Manager
{
	
	protected $db;


	public function __construct()
	{
		$this->db = self::dbConnect();
	}

	/** ------- BackEnd ------- */

	/** Function to add an article/chapter by admin
	 * 
	 */
	public function addArticle($title, $content)
	{

		$req = $this->db->prepare('INSERT INTO articles(title, content, date_creation) VALUES(:title, :content, NOW())');

		$addedArticle = $req->execute(array(
							'title'=>$title,
							'content'=>$content));
					
	}


	/** Function to modify an article by admin
	 *
	 */
	public function modifyArticle($articleId, $title, $content)
	{
		$req = $this->db->prepare('UPDATE articles SET title = :title , content =:content WHERE id = :id ' );

		$modifiedArticle = $req->execute(array(
				'id'=>$articleId,
				'title'=>$title,
				'content'=>$content));	

		return $modifiedArticle;


	}


	/** Function to delete an article by admin
	 *
	 */ 
	public function deleteArticle($articleId)
	{
		$req = $this->db->prepare('DELETE FROM articles WHERE id = :id');

		$deleteArticle = $req->execute(array('id'=>$articleId));
			
	}


	/** Function to display a list of the articles on the Admin homepage.
	 *
	 */
	public function getAdminArticles()
	{

		$req = $this->db->query('SELECT id, title FROM articles ORDER BY date_creation DESC LIMIT 0, 5');

		$req->execute();


		$articles = $req->fetchAll();

		return $articles;
	}


	public function showArticles()
	{

		$req = $this->db->query('SELECT id, title FROM articles ORDER BY date_creation DESC');

		$req->execute();


		$articles = $req->fetchAll();

		return $articles;
	}


	/** ------- FrontEnd ------- */

	/** Function to display the choosen article
	 *
	 */
	public function getArticle($articleId)
	{
		$req = $this->db->prepare('SELECT id, title, content, DATE_FORMAT(date_creation, \'%d/%m/%Y \') AS date_creation_fr FROM articles WHERE id = ?');

		$req->execute(array($articleId));
		$article = $req->fetch();

		return $article;
		
	}

	/** Function to display the articles on the homepage.
	 *
	 */
	public function getArticles()
	{

		$req = $this->db->query('SELECT id, title, content, DATE_FORMAT(date_creation, \'%d/%m/%Y\') AS date_creation_fr FROM articles ORDER BY date_creation LIMIT 0, 6');

		$req->execute();


		$articles = $req->fetchAll();

		foreach ($articles as $article)
		{
	
			$excerpt =$this->getExtract($article['content'], 0, 600, ' ');

			$article['content'] = $excerpt;
			$articleCropped[]=$article;

		}

		return $articleCropped;
	}



	/** Function to display the extract of the article on the homepage.
	 *
	 */
	public function getExtract($content,$start,$lenght,$endStr)
	{

        $str = mb_substr($content, $start, $lenght - strlen($endStr) + 1, 'UTF-8');

		$extract = substr($str, 0, strrpos($str, ' ')) .  $endStr . ' ...';

		return $extract;

	}


}
