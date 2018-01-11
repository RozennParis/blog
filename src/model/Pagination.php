<?php

namespace blog\model;

use \blog\model\ArticleManager;
use \blog\model\CommentManager;
use \blog\model\Article;
use \blog\model\Comments;


class Pagination
{

	public function __construct(array $articles)
	{
		$this->articles = $articles;
	}



	public function getPage($page);
	{
		$articlesPerPage = 6;

		if ($page > 1){
			$currentPage = int($page);
		} 
		else {
			$currentPage = 1;
		}
		
		$totalArticles = count($articles);
       	$numberOfPages = ceil($totalArticles/$articlesPerPage);

       	$begin = ($currentPage - 1) * $articlesPerPage;

       	$arrayOfArticles = array_slice(array, $begin, $articlesPerPage);

       	for ($i = 1; $i<=$numberOfPages, $i++)
       	{
       		$paginatedArticles[] = $i;
       	}
	}


}

LIMIT ' . $begin . ',' . $articlesPerPage