<?php

namespace FuelTech\SupportBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Description of SearchClientType
 *
 * @author cyber02
 */
class SearchClientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name')
                ->add('Zoek', 'submit');
    }


    public function getName()
    {
        return 'search_client';
    }
}
