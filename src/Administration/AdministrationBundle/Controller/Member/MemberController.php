<?php

namespace Administration\AdministrationBundle\Controller\Member;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MemberController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $membres = $em->getRepository('ClientBundle:Client')->findAll();

        return $this->render('AdministrationBundle:Member:gestion.html.twig', array('membres'=>$membres));
    }


}
