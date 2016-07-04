<?php

namespace Administration\AdministrationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Administration\AdministrationBundle\Controller\DiskStatus;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $diskStatus = new DiskStatus("/");
        $em = $this->getDoctrine()->getManager();
        $nbrUser = $em->getRepository('ClientBundle:Client')->findNbrUser();
        $nbrArticle = $em->getRepository('AdministrationBundle:Article')->getNb();
        $nbrRecette = $em->getRepository('AdministrationBundle:Recette')->getNb();
        $freeSpace = $diskStatus->freeSpace();
        $totalSpace = $diskStatus->totalSpace();
        $usedSpace=$diskStatus->usedSpace();
        $barWidth = ($diskStatus->usedSpace()/100) * 400;


        return $this->render('AdministrationBundle:Default:index.html.twig', array('free'=>$usedSpace,'total'=>$barWidth,'nbrUser'=>$nbrUser,'nbrArticle'=>$nbrArticle,'nbrRecette'=>$nbrRecette));
    }
}
