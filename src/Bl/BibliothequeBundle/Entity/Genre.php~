<?php

namespace Bl\BibliothequeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Genre
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Bl\BibliothequeBundle\Entity\GenreRepository")
 */
class Genre
{


    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * Bidirectional 
     *
     * @ORM\ManyToMany(targetEntity="Livre", mappedBy="listeDesGenres")
     */
    protected $listeDesLivres;

    /**
     * @ORM\Column(type="string", length=120)
     */
    protected $label;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->listeDesLivres = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set label
     *
     * @param string $label
     * @return Genre
     */
    public function setLabel($label)
    {
        $this->label = $label;
    
        return $this;
    }

    /**
     * Get label
     *
     * @return string 
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * Add listeDesLivres
     *
     * @param \Bl\BibliothequeBundle\Entity\Livre $listeDesLivres
     * @return Genre
     */
    public function addListeDesLivre(\Bl\BibliothequeBundle\Entity\Livre $listeDesLivres)
    {
        $this->listeDesLivres[] = $listeDesLivres;
    
        return $this;
    }

    /**
     * Remove listeDesLivres
     *
     * @param \Bl\BibliothequeBundle\Entity\Livre $listeDesLivres
     */
    public function removeListeDesLivre(\Bl\BibliothequeBundle\Entity\Livre $listeDesLivres)
    {
        $this->listeDesLivres->removeElement($listeDesLivres);
    }

    /**
     * Get listeDesLivres
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getListeDesLivres()
    {
        return $this->listeDesLivres;
    }

   /**
    * Affichage d'une entité Genre avec echo
    * @return string Représentation du genre
    */
    public function __toString()
    {
       return $this->label;
    }
}
