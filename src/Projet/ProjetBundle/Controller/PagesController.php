<?php

namespace Projet\ProjetBundle\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class PagesController extends Controller
{

    public function applicationAction()
    {
        return $this->render('ProjetBundle:pages:applications.html.twig');
    }


}
