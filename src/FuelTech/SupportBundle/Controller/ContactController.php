<?php

namespace FuelTech\SupportBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use FuelTech\SupportBundle\Form\Type\ContactType;

/**
 * Description of ContactController
 *
 * @author cyber02
 */
class ContactController extends Controller
{
    public function listAction()
    {
        //get contacts
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('FuelTechSupportBundle:Contact');
        $query = $repository->createQueryBuilder('con')
                ->getQuery();
        $contacts = $query->getResult();
        
        //render page
        return $this->render('FuelTechSupportBundle:Contact:list.html.twig', array(
            'contacts' => $contacts,
        ));
    }
    
    public function showDetailAction($id, Request $request)
    {
        //get contact object
        $contact = $this
                ->getDoctrine()
                ->getRepository('FuelTechSupportBundle:Contact')
                ->find($id);
        if (!$contact) {
            throw $this->createNotFoundException(
                    'No contact found with id = '.$id);
        }
        
        $form = $this->createForm(new ContactType(), $contact);
        
        //handle form submission
        $form->handleRequest($request);
        //validate formdata object if form submitted(isValid returns false if form was not submitted)
        if ($form->isValid()) {
            //process form, i.e. persist data
            $em = $this->getDoctrine()->getManager();
            $em->persist($contact);
            $em->flush();
            
            //redirect to client detail
            $client_id = $contact->getClient()->getId();
            return $this->redirect($this->generateUrl('ftsupport_client_detail', array('id' => $client_id)));
        }
        
        //render client detail page
        return $this->render(
                'FuelTechSupportBundle:Contact:detail.html.twig',
                array(
                    'form' => $form->createView(),
                ));
    }
}
