<?php

namespace Garnet\CooperativeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class VoyageType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $date = new \DateTime();
        $builder
            ->add('datevoyage', 'datetime', array(
                'label'=> 'Date et heure de voyage',
                'years' => range($date->format('Y'), $date->format('Y')+5)
            ))
            ->add('depart', 'hidden', array(
                'label'=> 'Lieu de depart'
            ))
            ->add('arrive', 'hidden', array(
                'label'=> 'Lieu d\'arrive'
            ))
            ->add('nbrplace', null, array(
                'label'=> 'Nombre de place'
            ))
            ->add('description', 'textarea', array(
                'label'=> 'Description voyage'
            ))
            ->add('frais', null, array(
                'label'=> 'Frais'
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Garnet\CooperativeBundle\Entity\Voyage'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'voyage';
    }
}
