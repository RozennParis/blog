<?php

namespace blog\controller\frontend;


class PageController extends \blog\controller\Controller
{

	public function accessToPresentation()
	{
		echo $this->twig->render('presentationView.twig', array());
	}
}