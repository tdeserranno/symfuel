<?php

namespace FuelTech\SupportBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Description of ClientController
 *
 * @author cyber02
 */
class ClientController extends Controller
{
    public function indexAction()
    {
        //render clientlist page
        return $this->render('FuelTechSupportBundle:Client:index.html.twig');
    }
    
    public function showDetailAction($id)
    {
        //render client detail page
        return $this->render(
                'FuelTechSupportBundle:Client:detail.html.twig',
                array(
                    'id' => $id,
                ));
    }
}
