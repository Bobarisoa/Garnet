<?php

namespace Garnet\CooperativeBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Garnet\PublicBundle\Entity\Compte;
use Garnet\CooperativeBundle\Form\CompteType;

/**
 * Compte controller.
 *
 * @Route("/compte")
 */
class CompteController extends Controller
{

    /**
     * Lists all Compte entities.
     *
     * @Route("/", name="compte")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('GarnetCooperativeBundle:Compte')->findAll();

        return array(
            'entities' => $entities,
        );
    }


    /**
     * Creates a form to create a Compte entity.
     *
     * @param Compte $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Compte $entity)
    {
        $form = $this->createForm(new CompteType(), $entity, array(
            'action' => $this->generateUrl('compte_register'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Valider'));

        return $form;
    }

    /**
     * Displays a form to create a new Compte entity.
     *
     * @Route("/new", name="compte_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Compte();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Compte entity.
     *
     * @Route("/{id}", name="compte_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GarnetCooperativeBundle:Compte')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Compte entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Compte entity.
     *
     * @Route("/{id}/edit", name="compte_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GarnetCooperativeBundle:Compte')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Compte entity.');
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
    * Creates a form to edit a Compte entity.
    *
    * @param Compte $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Compte $entity)
    {
        $form = $this->createForm(new CompteType(), $entity, array(
            'action' => $this->generateUrl('compte_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Compte entity.
     *
     * @Route("/{id}", name="compte_update")
     * @Method("PUT")
     * @Template("GarnetCooperativeBundle:Compte:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GarnetCooperativeBundle:Compte')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Compte entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('compte_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Compte entity.
     *
     * @Route("/{id}", name="compte_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('GarnetCooperativeBundle:Compte')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Compte entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('compte'));
    }

    /**
     * Creates a form to delete a Compte entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('compte_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
