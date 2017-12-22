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

		$req = $this->db->prepare('INSERT INTO articles(article_number,title, content, date_creation) VALUES(:article_number, :title, :content, NOW())');

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
	public function getArticles() 
	{

		$req = $this->db->query('SELECT id, article_number, title, content, DATE_FORMAT(date_creation, \'%d/%m/%Y\') AS dateCreation FROM articles ORDER BY date_creation DESC');

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



	/** Function to display differents pages on the homepage >>> 6 extracts/articles per page
	 *
	 */
	/*public function Paginate($page = 1)
	{
		$articlesPerPage = 6;

		$req = $this->db->query('SELECT id FROM articles');

       	$totalArticles = $req ->rowCount();
       	$totalPages = ceil($totalArticles/$articlesPerPage);

       	if (isset($page) && !empty($page)) && $page > 0 && $page <=$totalPages) {
			$page = int($page);
			$currentPage = $page;
		}
		else {
			$currentPage = 1;
		}

		$begin = ($currentPage - 1) * $articlesPerPage;
		

	}*/


	/** ------- Pagination ------- */

	public function getArticlesByPage($page = 1)
	{
		$articlesPerPage = 6;
		$begin = 0;

		if ($page > 1) {
			$page = int($page);
			$begin = ($page - 1) * $articlesPerPage ;
		}
		
		$req = $this->db->query('SELECT * , DATE_FORMAT(date_creation, \'%d/%m/%Y\') AS dateCreation FROM articles ORDER BY date_creation DESC ');

		$req->execute();

		$totalArticles = $req->rowCount();
		$numberOfPages = (int)($totalArticles / $articlesPerPage) + 1 ;
		
		$values = $req->fetchAll(PDO::FETCH_ASSOC);


		foreach ($values as $value)
		{
			
			$value['content']= $this->getExtract($value['content'], 0, 600, ' ');
			$articles[] = new Article($value);
		}		

		$paginatedArticles = array_slice($articles, $begin, $articlesPerPage);

		return $paginatedArticles;
		

		
	}

	
}
