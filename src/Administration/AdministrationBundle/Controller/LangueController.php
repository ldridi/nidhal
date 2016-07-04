<?php

namespace Administration\AdministrationBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Administration\AdministrationBundle\Entity\Langue;
use Administration\AdministrationBundle\Form\LangueType;

/**
 * Langue controller.
 *
 */
class LangueController extends Controller
{
    /**
     * Lists all Langue entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $langues = $em->getRepository('AdministrationBundle:Langue')->findAll();

        return $this->render('langue/index.html.twig', array(
            'langues' => $langues,
        ));
    }

    /**
     * Creates a new Langue entity.
     *
     */
    public function newAction(Request $request)
    {
        $langue = new Langue();
        $form = $this->createForm('Administration\AdministrationBundle\Form\LangueType', $langue);
        $form->handleRequest($request);
        $em = $this->getDoctrine()->getManager();

        $langues = $em->getRepository('AdministrationBundle:Langue')->findAll();
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $langue->setDateLangue(new \DateTime());
            $em->persist($langue);
            $em->flush();

            return $this->redirectToRoute('langue_index');
        }

        return $this->render('langue/new.html.twig', array(
            'langue' => $langue,
            'langues'=>$langues,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Langue entity.
     *
     */
    public function showAction(Langue $langue)
    {
        $deleteForm = $this->createDeleteForm($langue);

        return $this->render('langue/show.html.twig', array(
            'langue' => $langue,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Langue entity.
     *
     */
    public function editAction(Request $request, Langue $langue)
    {
        $deleteForm = $this->createDeleteForm($langue);
        $editForm = $this->createForm('Administration\AdministrationBundle\Form\LangueType', $langue);
        $editForm->handleRequest($request);
        $em = $this->getDoctrine()->getManager();

        $langues = $em->getRepository('AdministrationBundle:Langue')->findAll();
        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($langue);
            $em->flush();

            return $this->redirectToRoute('langue_index');
        }

        return $this->render('langue/edit.html.twig', array(
            'langue' => $langue,
            'langues'=>$langues,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Langue entity.
     *
     */
    public function deleteAction(Request $request, Langue $langue)
    {
        $form = $this->createDeleteForm($langue);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($langue);
            $em->flush();
        }

        return $this->redirectToRoute('langue_index');
    }

    /**
     * Creates a form to delete a Langue entity.
     *
     * @param Langue $langue The Langue entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Langue $langue)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('langue_delete', array('id' => $langue->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
