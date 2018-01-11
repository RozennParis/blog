<?php

namespace blog\model;

use \PDO;

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
	public function addArticle(Article $article)
	{

		$req = $this->db->prepare('INSERT INTO articles (article_number,title, content, date_creation) VALUES (:article_number, :title, :content, NOW())');

		$addedArticle = $req->execute(array(
							'article_number'=>$article->getArticleNumber(),
							'title'=>$article->getTitle(),
							'content'=>$article->getContent()));
					
	}


	/** Function to modify an article by admin
	 *
	 */
	public function modifyArticle(Article $article)
	{
		$req = $this->db->prepare('UPDATE articles SET article_number = :article_number, title = :title , content =:content WHERE id = :id ' );

		$modifiedArticle = $req->execute(array(
				'id'=>$article->getId(),
				'article_number'=>$article->getArticleNumber(),
				'title'=>$article->getTitle(),
				'content'=>$article->getContent()));	

		return $modifiedArticle;


	}


	/** Function to delete an article by admin
	 *
	 */ 
	public function delArticle($id)
	{
		$req = $this->db->prepare('DELETE FROM articles WHERE id = ?');

		$deleteArticle = $req->execute(array($id));

		return $deleteArticle;
			
	}


	/** Function to display a list of the articles on the Admin homepage.
	 *
	 */
	public function getAdminArticles()
	{
		$articles = [];

		$req = $this->db->query('SELECT id, article_number, title FROM articles ORDER BY date_creation DESC LIMIT 0, 5');
		$req->execute();

		$values = $req->fetchAll(PDO::FETCH_ASSOC);

		foreach ($values as $value)
		{
			$articles[] = new Article($value);
		}
		
		return $articles;
	}


	public function showArticles()
	{

		$req = $this->db->query('SELECT id, article_number, title FROM articles ORDER BY date_creation DESC');

		$req->execute();

		$values = $req->fetchAll(PDO::FETCH_ASSOC);

		foreach ($values as $value)
		{
			$articles[] = new Article($value);
		}

		return $articles;
	}


	/** ------- FrontEnd ------- */

	/** Function to display the choosen article
	 *
	 */
	public function getArticle($id) //exemple à suivre
	{
		$req = $this->db->prepare('SELECT id, article_number, title, content, DATE_FORMAT(date_creation, \'%d/%m/%Y \') AS dateCreation FROM articles WHERE id = ?');

		$req->execute(array($id));
		$article = $req->fetch(PDO::FETCH_ASSOC);

		$article = new Article($article);

		return $article;
		
	}

	/** Function to display the articles on the homepage.
	 *
	 */
	public function getArticles($page = 1) 
	{
		$articlesPerPage = 3;


		$page = (int)($page);
		$begin = ($page - 1) * $articlesPerPage ;
		
		$req = $this->db->query('SELECT id, article_number, title, content, DATE_FORMAT(date_creation, \'%d/%m/%Y\') AS dateCreation FROM articles ORDER BY date_creation DESC LIMIT ' . $begin . ',' . $articlesPerPage);

		$req->execute();

		$values = $req->fetchAll(PDO::FETCH_ASSOC);

		foreach ($values as $value)
		{
			
			$value['content']= $this->getExtract($value['content'], 0, 600, ' ');
			$articles[] = new Article($value);
		}

		return $articles;
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



	/** Function to count how many pages we need
	 *
	 */
	public function getPage()
	{
		$articlesPerPage = 3;

		$req = $this->db->query('SELECT COUNT(*) AS totalArticles FROM articles');

		$result = $req->fetch();
		$numberOfArticles = $result['totalArticles'];

		$numberOfPages = ceil($numberOfArticles / $articlesPerPage) ;

		return $numberOfPages;

	}


	/** Function to display all the articles in navbar
	 *
	 */
	public function getChapters() 
	{

		$req = $this->db->query('SELECT id, article_number, title FROM articles ORDER BY date_creation');

		$req->execute();

		$values = $req->fetchAll(PDO::FETCH_ASSOC);

		foreach ($values as $value)
		{
			$chapters[] = new Article($value);
		}

		return $chapters;
	}

	
}
