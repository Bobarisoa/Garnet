<?php
/**
 * Created by PhpStorm.
 * User: Boba
 * Date: 15/02/16
 * Time: 21:49
 */

namespace Garnet\PublicBundle\Controller;

use Garnet\CooperativeBundle\Form\CompteType;
use Garnet\PublicBundle\Entity\Compte;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContext;

class SecurityController extends Controller
{
    public function loginAction()
    {
        // Si le visiteur est déjà identifié, on le redirige vers l'accueil
        if ($this->get('security.context')->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
        return $this->redirect($this->generateUrl('cooperative'));
        }
        $request = $this->getRequest();
        $session = $request->getSession();
        // On vérifie s'il y a des erreurs d'une précédente soumission du formulaire
        if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
        $error = $request->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
        } else {
        $error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
        $session->remove(SecurityContext::AUTHENTICATION_ERROR);
        }
        return $this->render('GarnetPublicBundle:Security:login.html.twig', array(
            'last_username' => $session->get(SecurityContext::LAST_USERNAME),
            'error' => $error,
        ));
    }

    /**
     * Creates a new Compte entity.
     */
    public function createAction(Request $request)
    {
        $entity = new Compte();
        $form  = $this->createForm(new CompteType(), $entity);
        if($request->getMethod() == 'POST'){
            $form->handleRequest($request);
            if ($form->isValid()) {
                $date = new \DateTime("now");
                $em = $this->getDoctrine()->getManager();
                $entity->setDateInscription($date);
                $em->persist($entity);
                $em->flush();

                return $this->redirect($this->generateUrl('cooperative'));
            }
        }

        return $this->render("GarnetCooperativeBundle:Compte:new.html.twig", array(
            'entity' => $entity,
            'form'   => $form->createView(),
        )) ;
    }

} 