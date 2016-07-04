<?php

namespace Projet\ProjetBundle\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class RecetteController extends Controller
{

    public function recetteAction()
    {

        return $this->render('ProjetBundle:recette:recette.html.twig');
    }

    public function detailsRecetteAction($recette)
    {
        $em = $this->getDoctrine()->getManager();
        $recette = $em->getRepository('AdministrationBundle:Recette')->find($recette);
        return $this->render('ProjetBundle:recette:details.html.twig',array('recette'=>$recette));
    }

    public function recetteJSONAction()
    {

        $em = $this->getDoctrine()->getEntityManager();
        $recettes = $em->getRepository('AdministrationBundle:Recette')->findAll();
        $ar = array();
        foreach($recettes as $ac){
            $request = $this->getRequest();
            $img = $request->getScheme() . '://' . $request->getHttpHost() . $request->getBasePath().'/uploads/'.$ac->getImage()->getId().'.'.$ac->getImage()->getUrl();
            array_push($ar,array(
                "id" => $ac->getId(),
                'titre'=>$ac->getNomRecette(),
                'image'=>$img,
                'cuisson'=>$ac->getCuissonRecette(),
                'preparation'=>$ac->getPreparationRecette(),
                'prix'=>$ac->getPrix()->getNomPrix(),
                'nationalite'=>$ac->getNationalite()->getId()

                    ));
        }
        return new JsonResponse($ar,200,array('Content-Type'=>'application/json'));

    }

    public function recettePrixJSONAction($prix)
    {

        $em = $this->getDoctrine()->getEntityManager();
        $recettes = $em->getRepository('AdministrationBundle:Recette')->findBy(array('prix'=>$prix));
        $ar = array();
        foreach($recettes as $ac){
            $request = $this->getRequest();
            $img = $request->getScheme() . '://' . $request->getHttpHost() . $request->getBasePath().'/uploads/'.$ac->getImage()->getId().'.'.$ac->getImage()->getUrl();
            array_push($ar,array(
                "id" => $ac->getId(),
                'titre'=>$ac->getNomRecette(),
                'image'=>$img,
                'cuisson'=>$ac->getCuissonRecette(),
                'preparation'=>$ac->getPreparationRecette(),
                'prix'=>$ac->getPrix()->getId(),
                'nationalite'=>$ac->getNationalite()->getId()

            ));
        }
        return new JsonResponse($ar,200,array('Content-Type'=>'application/json'));

    }

    public function prixJSONAction()
    {

        $em = $this->getDoctrine()->getEntityManager();
        $prixs = $em->getRepository('AdministrationBundle:Prix')->findAll();
        $ar = array();
        foreach($prixs as $ac){

            array_push($ar,array(
                "id" => $ac->getId(),
                'prix'=>$ac->getNomPrix()

            ));
        }
        return new JsonResponse($ar,200,array('Content-Type'=>'application/json'));

    }

    public function recetteNationaliteJSONAction($nationalite)
    {

        $em = $this->getDoctrine()->getEntityManager();
        $recettes = $em->getRepository('AdministrationBundle:Recette')->findBy(array('nationalite'=>$nationalite));
        $ar = array();
        foreach($recettes as $ac){
            $request = $this->getRequest();
            $img = $request->getScheme() . '://' . $request->getHttpHost() . $request->getBasePath().'/uploads/'.$ac->getImage()->getId().'.'.$ac->getImage()->getUrl();
            array_push($ar,array(
                "id" => $ac->getId(),
                'titre'=>$ac->getNomRecette(),
                'image'=>$img,
                'cuisson'=>$ac->getCuissonRecette(),
                'preparation'=>$ac->getPreparationRecette(),
                'prix'=>$ac->getPrix()->getId(),
                'nationalite'=>$ac->getNationalite()->getId()

            ));
        }
        return new JsonResponse($ar,200,array('Content-Type'=>'application/json'));

    }

    public function nationaliteJSONAction()
    {

        $em = $this->getDoctrine()->getEntityManager();
        $nationalites= $em->getRepository('AdministrationBundle:Nationalite')->findAll();
        $ar = array();
        foreach($nationalites as $ac){

            array_push($ar,array(
                "id" => $ac->getId(),
                'nationalite'=>$ac->getNomNationalite()

            ));
        }
        return new JsonResponse($ar,200,array('Content-Type'=>'application/json'));

    }
}
