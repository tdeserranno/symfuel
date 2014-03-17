<?php

namespace FuelTech\SupportBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use FuelTech\SupportBundle\Form\Type\SiteType;
use FuelTech\SupportBundle\Entity\Site;

/**
 * Description of SiteController
 *
 * @author cyber02
 */
class SiteController extends Controller
{
    public function listAction()
    {
        //retrieve model
        $repository = $this->getDoctrine()->getRepository('FuelTechSupportBundle:Site');
        $query = $repository->createQueryBuilder('s')->getQuery();
        $sites = $query->getResult();
        
        //render page
        return $this->render('FuelTechSupportBundle:Site:list.html.twig', array('sites' => $sites));
    }
    
    public function newAction(Request $request)
    {
        //create empty form & object
        $site = new Site();
        $form = $this->createForm(new SiteType(), $site);
        
        //handle form submission
        $form->handleRequest($request);
        
        //validate form data
        if ($form->isValid()){
            //retrieve data
            $site = $form->getData();
            
            //persist object
            $em = $this->getDoctrine()->getManager();
            $em->persist($site);
            $em->flush();
            
            //redirect to site list
            return $this->redirect($this->generateUrl('ftsupport_site_list'));
        }
        
        //render form
        return $this->render('FuelTechSupport:Site:list.html.twig', array('form' => $form->createView()));
    }
}
