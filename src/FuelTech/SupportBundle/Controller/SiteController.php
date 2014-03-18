<?php

namespace FuelTech\SupportBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use FuelTech\SupportBundle\Form\Type\SiteType;
use FuelTech\SupportBundle\Form\Type\NewSiteType;
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
    
    public function detailAction($id, Request $request)
    {
        //retrieve model
        $site = $this->getDoctrine()
                ->getRepository('FuelTechSupportBundle:Site')
                ->find($id);
        if (!$site) {
            throw $this->createNotFoundException('No site found with id = '.$id);
        }
        
        //create form
        $form = $this->createForm(new SiteType(), $site);
        
        //handle form
        $form->handleRequest($request);
        
        //validate form
        if ($form->isValid()) {
            //persist data
            $em = $this->getDoctrine()->getManager();
            $em->persist($site);
            $em->flush();
            
            //redirect to site list
            return $this->redirect($this->generateUrl('ftsupport_site_list'));
        }
        
        //render page
        return $this->render(
                'FuelTechSupportBundle:Site:detail.html.twig',
                array(
                    'form' => $form->createView(),
                ));
    }
    
    public function newAction(Request $request)
    {
        //create empty form & site object
        $site = new Site();
        $form = $this->createForm(new NewSiteType(), $site);
        
        //get clients for select element
//        $repository = $this->getDoctrine()->getRepository('FuelTechSupportBundle:Client');
//        $query = $repository->createQueryBuilder('cl')->getQuery();
//        $clients = $query->getResult();
        
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
        return $this->render(
                'FuelTechSupportBundle:Site:detail.html.twig',
                array(
                    'form' => $form->createView(),
//                    'clients' => $clients,
                    ));
    }
}
