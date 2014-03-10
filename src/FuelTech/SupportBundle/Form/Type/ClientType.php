<?php

namespace FuelTech\SupportBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Description of ClientType
 *
 * @author cyber02
 */
class ClientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('name')
                ->add('address')
                ->add('postcode')
                ->add('city')
                ->add('telephone')
                ->add('fax')
                ->add('email')
                ->add('remark')
                ->add('opslaan', 'submit');
    }
    
    public function getName()
    {
        return 'client';
    }
}
