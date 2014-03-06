<?php

namespace FuelTech\SupportBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Description of HomeController
 *
 * @author cyber02
 */
class HomeController extends Controller
{
    public function indexAction()
    {
        //render homepage template
        return $this->render('FuelTechSupportBundle:Home:index.html.twig');
    }
}
