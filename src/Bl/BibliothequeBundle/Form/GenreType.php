<?php

namespace Bl\BibliothequeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class GenreType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('label', 'text', array('label' => "Genre de Livre")) 
            ->add('listeDesLivres')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Bl\BibliothequeBundle\Entity\Genre'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'bl_bibliothequebundle_genre';
    }

    private function createEditForm(Genre $entity)
    {
        $form = $this->createForm(new GenreType(), $entity, array(
            'action' => $this->generateUrl('genre_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Mise à jour'));

        return $form;
    }
}
