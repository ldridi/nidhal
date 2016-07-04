<?php

namespace Administration\AdministrationBundle\Controller\Member;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MemberNouveauController extends Controller
{
    public function nouveauAction()
    {
        return $this->render('AdministrationBundle:Member:nouveau.html.twig');
    }
}
