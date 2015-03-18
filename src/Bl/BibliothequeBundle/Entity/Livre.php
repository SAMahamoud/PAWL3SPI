<?php

namespace Bl\BibliothequeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Livre
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Bl\BibliothequeBundle\Entity\LivreRepository")
 */
class Livre
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * Bidirectional 
     *
     * @ORM\ManyToMany(targetEntity="Genre", inversedBy="listeDesLivres")
     * @ORM\JoinTable(name="_assoc_livre_genre",
     *   joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *   inverseJoinColumns={@ORM\JoinColumn(name="livre_id", referencedColumnName="id")}
     * )
     */
    protected $listeDesGenres;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=120)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->listeDesGenres = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set titre
     *
     * @param string $titre
     * @return Livre
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;
    
        return $this;
    }

    /**
     * Get titre
     *
     * @return string 
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Livre
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Add listeDesGenres
     *
     * @param \Bl\BibliothequeBundle\Entity\Genre $listeDesGenres
     * @return Livre
     */
    public function addListeDesGenre(\Bl\BibliothequeBundle\Entity\Genre $listeDesGenres)
    {
        $this->listeDesGenres[] = $listeDesGenres;
    
        return $this;
    }

    /**
     * Remove listeDesGenres
     *
     * @param \Bl\BibliothequeBundle\Entity\Genre $listeDesGenres
     */
    public function removeListeDesGenre(\Bl\BibliothequeBundle\Entity\Genre $listeDesGenres)
    {
        $this->listeDesGenres->removeElement($listeDesGenres);
    }

    /**
     * Get listeDesGenres
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getListeDesGenres()
    {
        return $this->listeDesGenres;
    }
    /**
     * Affichage d'une entité Film avec echo
     * @return string Représentation du film
     */
    public function __toString()
    {
       return $this->titre;
    }
}
