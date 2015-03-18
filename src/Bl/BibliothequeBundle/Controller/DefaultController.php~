<?php

namespace Bl\BibliothequeBundle\Controller;

use Bl\BibliothequeBundle\Entity\Genre;
use Bl\BibliothequeBundle\Entity\Livre;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
     /**
    * @Route("/", name="_index", defaults={"label"=""})
    * @Route("/filter-by-genre/{label}", name="_filter_by_genre", defaults={"label"=""})
    * @Template()
    */
    public function indexAction($label)
    {
        /* Tableau qui va stocker toutes les données à remplacer dans le template twig */
        $variables = array();

        // Récupération de l'entity manager qui va nous permettre de gérer les entités.
        $entityManager = $this->getDoctrine()->getManager();

        // On recherche dans la table Genre l'enregistrement qui correspond au label reçu
        // par l'url et on stocke l'objet Genre dans une variable
        $selectedGenre = $entityManager
                            ->getRepository("BlBibliothequeBundle:Genre")
                            ->findOneBy(array("label" => $label));

        if ($selectedGenre) {
            // Si le genre passé par l'url existe bien, on passe l'id à notre template
            $variables['selected_genre'] = $selectedGenre->getId();
        } else {
            // Sinon on renvoie 0, aucun genre n'a été sélectionné
            $variables['selected_genre'] = null;
        }

        // Récupération de la liste des livres grâce à notre méthode findByGenre.
        $listeDesLivres = $entityManager
                            ->getRepository("BlBibliothequeBundle:Livre")
                            ->findByGenre($variables['selected_genre']);

        $variables['livres'] = $listeDesLivres;

        // On récupère le nombre total de livres en comptant simplement le resultat de la recheche de tous les livres
        $variables['total_nb_livres'] = $entityManager->getRepository("BlBibliothequeBundle:Livre")->countAll();

        /* On récupère la liste des genres avec le nombre de livres associés pour notre sidebar */
        $variables['genres'] = $entityManager
                                    ->getRepository('BlBibliothequeBundle:Genre')
                                    ->fetchAllWithLivresCount();

        return $this->render('BlBibliothequeBundle:Default:bibliotheque_home.html.twig', $variables);

    }
}
