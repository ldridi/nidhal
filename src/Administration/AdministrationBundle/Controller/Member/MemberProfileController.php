<?php

namespace Administration\AdministrationBundle\Controller\Member;

use Client\ClientBundle\Entity\Client;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MemberProfileController extends Controller
{
    public function profileAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $membreProfile = $em->getRepository('ClientBundle:Client')->findOneBy(array('id'=>$id));

        return $this->render('AdministrationBundle:Member:profile.html.twig', array('membreProfile'=>$membreProfile));
    }

    public function supprimerAction($id)
    {
        
        $em = $this->getDoctrine()->getManager();
        $membres = $em->getRepository('ClientBundle:Client')->findAll();
        $membreProfile = $em->getRepository('ClientBundle:Client')->findOneBy(array('id'=>$id));
        $membreProfile->setEnabled(false);

        $em->flush();


        return $this->redirectToRoute('memberGestion', array('membres' => $membres));
    }
}
