<?php

namespace FuelTech\SupportBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Description of ContactType
 *
 * @author cyber02
 */
class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('name')
                ->add('telephone')
                ->add('mobile')
                ->add('email')
                ->add('opslaan', 'submit');
    }
    
    public function getName()
    {
        return 'contact';
    }
}