<?php

namespace Garnet\CooperativeBundle\Controller;

use Garnet\CooperativeBundle\Form\AnnonceType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Garnet\CooperativeBundle\Entity\Cooperative;
use Garnet\CooperativeBundle\Form\CooperativeType;
use Garnet\CooperativeBundle\Entity\Annonce;

/**
 * Cooperative controller.
 *
 * @Route("")
 */
class CooperativeController extends Controller
{

    /**
     * Lists all Cooperative entities.
     *
     * @Route("/", name="cooperative")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('GarnetCooperativeBundle:Cooperative')->getByDernierConnecte();

        shuffle($entities);

        return array(
            'entities' => array_slice($entities, 0, 4),
        );
    }
    /**
     * Creates a new Cooperative entity.
     *
     * @Route("/", name="cooperative_create")
     * @Method("POST")
     * @Template("GarnetCooperativeBundle:Cooperative:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Cooperative();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('cooperative_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Display form recherche
     *
     * @Route("/recherche", name="cooperative_recherche")
     */
    public function rechercheAction(Request $request)
    {
        return $this->render('GarnetCooperativeBundle:Cooperative:Recherche.html.twig');
    }
    /**
     * Resultat de recherche
     *
     * @Route("/resultat-recherche", name="cooperative_resultat_recherche")
     */
    public function resultatRechrcheAction(Request $request){
        $em = $this->getDoctrine()->getManager();
        $cooperativeRepository = $em->getRepository('GarnetCooperativeBundle:Cooperative');
        $dateVoyage = $request->get('date');
        $place = $request->get('place');
        $depart = $request->get('depart');
        $arrive = $request->get('arrive');
        $frais_minimum = $request->get('frais_minimum');
        $frais_maximum = $request->get('frais_maximum');
        $saveSearch = $request->get('saveSearch');

        $voyages = $cooperativeRepository->rechercheCooperative($dateVoyage, $place, $depart, $arrive, $frais_minimum, $frais_maximum);

        return $this->render('GarnetCooperativeBundle:Cooperative:resultat-recherche.html.twig', array(
            'voyages'   => $voyages
        ));
    }

    /**
     * Creates a form to create a Cooperative entity.
     *
     * @param Cooperative $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Cooperative $entity)
    {
        $form = $this->createForm(new CooperativeType(), $entity, array(
            'action' => $this->generateUrl('cooperative_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Ajouter des trajets
     * @Route("/addtrajet/{id}", name="cooperative_new_trajet")
     */
    public function addTrajet($id){
        $request = $this->get('request');
        $stmtDelete = $this->getDoctrine()->getEntityManager()->getConnection()->prepare("DELETE FROM trajet WHERE ID_COOPERATIVE = $id");
        $stmtDelete->execute();
        $trajetIds = explode('_', $request->get('trajetId'));
        $trajetIds = array_unique($trajetIds);
        $_query = "INSERT INTO trajet VALUES (". $id . ", ". implode("), (" . $id . ", ", $trajetIds) . " )";
        $stmt = $this->getDoctrine()->getEntityManager()->getConnection()->prepare($_query);
        $stmt->execute();

        return $this->redirect($this->generateUrl('cooperative'));
    }

    /**
     * Displays a form to create a new Cooperative entity.
     *
     * @Route("/new", name="cooperative_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Cooperative();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Cooperative entity.
     *
     * @Route("/{id}/cooperative", name="cooperative_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $annonce = new Annonce();
        $form = $this->createForm(new AnnonceType(), $annonce, array(
            'action' => $this->generateUrl('annonce_create', array('id' => $id)),
            'method' => 'POST',
        ));
        $form->add('submit', 'submit', array('label' => 'Publier'));

        $entity = $em->getRepository('GarnetCooperativeBundle:Cooperative')->find($id);
        $trajets = $em->getRepository('GarnetCooperativeBundle:Cooperative')->getTrajetByCooperative($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Cooperative entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'trajets'   => $trajets,
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
            'form'        => $form->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Cooperative entity.
     *
     * @Route("/{id}/edit", name="cooperative_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GarnetCooperativeBundle:Cooperative')->find($id);
        $voyages = $em->getRepository('GarnetCooperativeBundle:Voyage')->getVoyageByCooperative($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Cooperative entity.');
        }


        return array(
            'voyages'   => $voyages,
            'entity'      => $entity,
        );
    }

    /**
    * Creates a form to edit a Cooperative entity.
    *
    * @param Cooperative $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Cooperative $entity)
    {
        $form = $this->createForm(new CooperativeType(), $entity, array(
            'action' => $this->generateUrl('cooperative_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Cooperative entity.
     *
     * @Route("/{id}", name="cooperative_update")
     * @Method("PUT")
     * @Template("GarnetCooperativeBundle:Cooperative:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GarnetCooperativeBundle:Cooperative')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Cooperative entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('cooperative_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Cooperative entity.
     *
     * @Route("delete/{id}", name="cooperative_delete")
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('GarnetCooperativeBundle:Cooperative')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Cooperative entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('cooperative'));
    }

    /**
     * Creates a form to delete a Cooperative entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('cooperative_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
