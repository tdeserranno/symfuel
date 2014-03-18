<?php

namespace FuelTech\SupportBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Description of SiteType
 *
 * @author cyber02
 */
class NewSiteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('client', 'entity', array('class' => 'FuelTechSupportBundle:Client', 'property' => 'name'))
                ->add('name')
                ->add('address')
                ->add('postcode')
                ->add('city')
                ->add('installdate')
                ->add('remark')
                ->add('opslaan', 'submit');
    }
    
    public function getName()
    {
        return 'new_site';
    }
}
