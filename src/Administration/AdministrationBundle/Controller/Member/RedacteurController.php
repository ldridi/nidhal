<?php

namespace Administration\AdministrationBundle\Controller\Member;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class RedacteurController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $redacteurs = $em->getRepository('ClientBundle:Client')->findAll();
        

        return $this->render('AdministrationBundle:Member:redacteur.html.twig', array('redacteurs'=>$redacteurs));
    }


}
