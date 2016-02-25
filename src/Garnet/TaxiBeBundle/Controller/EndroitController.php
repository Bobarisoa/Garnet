<?php

namespace Garnet\TaxiBeBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Garnet\TaxiBeBundle\Entity\Endroit;
use Garnet\TaxiBeBundle\Form\EndroitType;

/**
 * Endroit controller.
 *
 * @Route("/taxibe")
 */
class EndroitController extends Controller
{

    /**
     * Lists all Endroit entities.
     *
     * @Route("/", name="taxibe_recherche")
     * @Method("GET")
     * @Template()
     */
    public function rechercheAction(){

        return $this->render("GarnetTaxiBeBundle:Endroit:Recherche.html.twig");
    }
    /**
     * Lists all Endroit entities.
     *
     * @Route("/list-autocomplete", name="endroit_list")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $request = $this->get('request');
        $name = $request->get('nameVille');
        $entities = $em->getRepository('GarnetTaxiBeBundle:Endroit')->listByName($name);

        return $this->render('GarnetCooperativeBundle:Common:autocomplete.html.twig', array(
            'entities' => $entities
        ));
    }
    /**
     * Creates a new Endroit entity.
     *
     * @Route("/", name="endroit_create")
     * @Method("POST")
     * @Template("GarnetTaxiBeBundle:Endroit:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Endroit();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('endroit_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Endroit entity.
     *
     * @param Endroit $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Endroit $entity)
    {
        $form = $this->createForm(new EndroitType(), $entity, array(
            'action' => $this->generateUrl('endroit_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Endroit entity.
     *
     * @Route("/new", name="endroit_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Endroit();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Endroit entity.
     *
     * @Route("/{id}", name="endroit_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GarnetTaxiBeBundle:Endroit')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Endroit entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Endroit entity.
     *
     * @Route("/{id}/edit", name="endroit_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GarnetTaxiBeBundle:Endroit')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Endroit entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Endroit entity.
    *
    * @param Endroit $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Endroit $entity)
    {
        $form = $this->createForm(new EndroitType(), $entity, array(
            'action' => $this->generateUrl('endroit_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Endroit entity.
     *
     * @Route("/{id}", name="endroit_update")
     * @Method("PUT")
     * @Template("GarnetTaxiBeBundle:Endroit:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GarnetTaxiBeBundle:Endroit')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Endroit entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('endroit_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Endroit entity.
     *
     * @Route("/{id}", name="endroit_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('GarnetTaxiBeBundle:Endroit')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Endroit entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('endroit'));
    }

    /**
     * Creates a form to delete a Endroit entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('endroit_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
