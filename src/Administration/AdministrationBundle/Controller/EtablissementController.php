<?php

namespace Administration\AdministrationBundle\Controller;

use Administration\AdministrationBundle\Entity\Media;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Administration\AdministrationBundle\Entity\Etablissement;
use Administration\AdministrationBundle\Form\EtablissementType;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Etablissement controller.
 *
 */
class EtablissementController extends Controller
{
    /**
     * Lists all Etablissement entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $etablissements = $em->getRepository('AdministrationBundle:Etablissement')->findAll();

        return $this->render('etablissement/index.html.twig', array(
            'etablissements' => $etablissements,
        ));
    }

    /**
     * Creates a new Etablissement entity.
     *
     */
    public function newAction(Request $request)
    {
        $etablissement = new Etablissement();
        $form = $this->createForm('Administration\AdministrationBundle\Form\EtablissementType', $etablissement);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($etablissement);
            $em->flush();

            return $this->redirectToRoute('etablissement_show', array('id' => $etablissement->getId()));
        }

        return $this->render('etablissement/new.html.twig', array(
            'etablissement' => $etablissement,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Etablissement entity.
     *
     */
    public function showAction(Etablissement $etablissement)
    {
        $deleteForm = $this->createDeleteForm($etablissement);

        return $this->render('etablissement/show.html.twig', array(
            'etablissement' => $etablissement,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Etablissement entity.
     *
     */
    public function editAction(Request $request, Etablissement $etablissement)
    {
        $deleteForm = $this->createDeleteForm($etablissement);
        $editForm = $this->createForm('Administration\AdministrationBundle\Form\EtablissementType', $etablissement);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($etablissement);
            $em->flush();

            return $this->redirectToRoute('etablissement_edit', array('id' => $etablissement->getId()));
        }

        return $this->render('etablissement/edit.html.twig', array(
            'etablissement' => $etablissement,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Etablissement entity.
     *
     */
    public function deleteAction(Request $request, Etablissement $etablissement)
    {
        $form = $this->createDeleteForm($etablissement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($etablissement);
            $em->flush();
        }

        return $this->redirectToRoute('etablissement_index');
    }

    /**
     * Creates a form to delete a Etablissement entity.
     *
     * @param Etablissement $etablissement The Etablissement entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Etablissement $etablissement)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('etablissement_delete', array('id' => $etablissement->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
