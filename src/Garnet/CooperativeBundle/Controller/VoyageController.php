<?php

namespace Garnet\CooperativeBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Garnet\CooperativeBundle\Entity\Voyage;
use Garnet\CooperativeBundle\Form\VoyageType;

/**
 * Voyage controller.
 *
 * @Route("/voyage")
 */
class VoyageController extends Controller
{

    /**
     * Lists all Voyage entities.
     *
     * @Route("/", name="voyage")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('GarnetCooperativeBundle:Voyage')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Voyage entity.
     *
     * @Route("/new/{id}", name="voyage_create")
     * @Template("GarnetCooperativeBundle:Voyage:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Voyage();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);
        $id = $request->get('id');

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity->setIdCooperative($id);
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('cooperative_edit', array('id' => $id)));
        }

        return array(
            'idCoop'    => $id,
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Voyage entity.
     *
     * @param Voyage $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Voyage $entity)
    {
        $form = $this->createForm(new VoyageType(), $entity, array(
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Valider'));

        return $form;
    }

    /**
     * Displays a form to create a new Voyage entity.
     *
     * @Route("/new", name="voyage_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Voyage();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Voyage entity.
     *
     * @Route("/{id}", name="voyage_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GarnetCooperativeBundle:Voyage')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Voyage entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Voyage entity.
     *
     * @Route("/{id}/edit", name="voyage_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GarnetCooperativeBundle:Voyage')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Voyage entity.');
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
    * Creates a form to edit a Voyage entity.
    *
    * @param Voyage $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Voyage $entity)
    {
        $form = $this->createForm(new VoyageType(), $entity, array(
            'action' => $this->generateUrl('voyage_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Voyage entity.
     *
     * @Route("/{id}", name="voyage_update")
     * @Method("PUT")
     * @Template("GarnetCooperativeBundle:Voyage:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GarnetCooperativeBundle:Voyage')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Voyage entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('voyage_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Voyage entity.
     *
     * @Route("/{id}", name="voyage_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('GarnetCooperativeBundle:Voyage')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Voyage entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('voyage'));
    }

    /**
     * Creates a form to delete a Voyage entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('voyage_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
