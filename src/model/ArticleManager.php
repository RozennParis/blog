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
	public function addArticle()
	{

		$req = $this->db->prepare('INSERT INTO articles(title, content, date_creation) VALUES(:title, :content, NOW())');

		$listArticles = $req->execute(array(
								'title'=>$_POST['title'],
								'content'=>$_POST['content']));
					
	}


	/** Function to modify an article by admin
	 *
	 */
	public function modifyArticle()
	{

	}


	/** Function to delete an article by admin
	 *
	 */ 
	public function deleteArticle()
	{
		
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

		$req = $this->db->prepare('SELECT id, title, content, DATE_FORMAT(date_creation, \'%d/%m/%Y\') AS date_creation_fr FROM articles ORDER BY date_creation LIMIT 0, 6');

		$req->execute();
		$articles = $req->fetchAll();


		return $articles;
	}



	/** Function to display the extract of the article on the homepage.
	 *
	 */
	public function getExtract($article)
	{
		$extract = wordwrap($article, 300,"...", false);
	}
}
