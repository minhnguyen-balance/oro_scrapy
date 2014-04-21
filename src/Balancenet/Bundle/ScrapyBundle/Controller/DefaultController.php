<?php

namespace Balancenet\Bundle\ScrapyBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('BalancenetScrapyBundle:Default:index.html.twig');
    }
}
