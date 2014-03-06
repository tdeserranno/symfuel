<?php

namespace FuelTech\SupportBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('FuelTechSupportBundle:Default:index.html.twig', array('name' => $name));
    }
}
