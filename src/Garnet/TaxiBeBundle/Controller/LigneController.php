<?php

namespace Garnet\TaxiBeBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Garnet\TaxiBeBundle\Entity\Ligne;
use Garnet\TaxiBeBundle\Form\LigneType;

/**
 * Ligne controller.
 *
 * @Route("/admin/ligne")
 */
class LigneController extends Controller
{

    /**
     * Lists all Ligne entities.
     *
     * @Route("/", name="ligne")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('GarnetTaxiBeBundle:Ligne')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Ligne entity.
     *
     * @Route("/", name="ligne_create")
     * @Method("POST")
     * @Template("GarnetTaxiBeBundle:Ligne:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Ligne();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('ligne_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Ligne entity.
     *
     * @param Ligne $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Ligne $entity)
    {
        $form = $this->createForm(new LigneType(), $entity, array(
            'action' => $this->generateUrl('ligne_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Ligne entity.
     *
     * @Route("/new", name="ligne_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Ligne();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Ligne entity.
     *
     * @Route("/{id}", name="ligne_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GarnetTaxiBeBundle:Ligne')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Ligne entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Ligne entity.
     *
     * @Route("/{id}/edit", name="ligne_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GarnetTaxiBeBundle:Ligne')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Ligne entity.');
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
    * Creates a form to edit a Ligne entity.
    *
    * @param Ligne $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Ligne $entity)
    {
        $form = $this->createForm(new LigneType(), $entity, array(
            'action' => $this->generateUrl('ligne_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Ligne entity.
     *
     * @Route("/{id}", name="ligne_update")
     * @Method("PUT")
     * @Template("GarnetTaxiBeBundle:Ligne:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GarnetTaxiBeBundle:Ligne')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Ligne entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('ligne_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Ligne entity.
     *
     * @Route("/{id}", name="ligne_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('GarnetTaxiBeBundle:Ligne')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Ligne entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('ligne'));
    }

    /**
     * Creates a form to delete a Ligne entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('ligne_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
