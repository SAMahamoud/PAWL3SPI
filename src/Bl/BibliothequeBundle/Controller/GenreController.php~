<?php

namespace Bl\BibliothequeBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Bl\BibliothequeBundle\Entity\Genre;
use Bl\BibliothequeBundle\Form\GenreType;

/**
 * Genre controller.
 *
 * @Route("/genre")
 */
class GenreController extends Controller
{

    /**
     * Lists all Genre entities.
     *
     * @Route("/", name="genre")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('BlBibliothequeBundle:Genre')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Genre entity.
     *
     * @Route("/", name="genre_create")
     * @Method("POST")
     * @Template("BlBibliothequeBundle:Genre:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Genre();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('genre_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Genre entity.
     *
     * @param Genre $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Genre $entity)
    {
        $form = $this->createForm(new GenreType(), $entity, array(
            'action' => $this->generateUrl('genre_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Creer'));

        return $form;
    }

    /**
     * Displays a form to create a new Genre entity.
     *
     * @Route("/new", name="genre_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Genre();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Genre entity.
     *
     * @Route("/{id}", name="genre_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BlBibliothequeBundle:Genre')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Genre entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Genre entity.
     *
     * @Route("/{id}/edit", name="genre_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BlBibliothequeBundle:Genre')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Genre entity.');
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
    * Creates a form to edit a Genre entity.
    *
    * @param Genre $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Genre $entity)
    {
        $form = $this->createForm(new GenreType(), $entity, array(
            'action' => $this->generateUrl('genre_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Mise à jour'));

        return $form;
    }
    /**
     * Edits an existing Genre entity.
     *
     * @Route("/{id}", name="genre_update")
     * @Method("PUT")
     * @Template("BlBibliothequeBundle:Genre:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BlBibliothequeBundle:Genre')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Genre entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('genre_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Genre entity.
     *
     * @Route("/{id}", name="genre_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('BlBibliothequeBundle:Genre')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Genre entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('genre'));
    }

    /**
     * Creates a form to delete a Genre entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('genre_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Supprimer'))
            ->getForm()
        ;
    }
 
/*
    // Création d'un formulaire simple pour supprimer un enregistrement
    $this->createFormBuilder()
    // qui pointe vers la route 'livre_delete' avec en argument l'id de l'objet à supprimer
     ->setAction($this->generateUrl('livre_delete', array('id' => $id)))
     // Le formulaire aura la propriété methode="DELETE"
     ->setMethod('DELETE')
     // Ajouter un bouton de soumission avec pour label 'Delete'
     ->add('submit', 'submit', array('label' => 'Delete'))
     // Finaliser le formulaire (c'est l'objet renvoyé par getForm()->getView() que l'on devra renvoyer au template twig pour affichage)
     ->getForm();
*/

}
