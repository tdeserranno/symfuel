<?php

namespace FuelTech\SupportBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use FuelTech\SupportBundle\Form\Type\ContactType;
use FuelTech\SupportBundle\Entity\Contact;

/**
 * Description of ContactController
 *
 * @author cyber02
 */
class ContactController extends Controller
{
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
    
    public function newAction($clientid, Request $request)
    {
        //create empty object & form
        $contact = new Contact();
        $form = $this->createForm(new ContactType(), $contact);
        
        //handle form submission
        $form->handleRequest($request);
        
        //validate form
        if ($form->isValid()) {
            $contact = $form->getData();
            //set client
            $client = $this->getDoctrine()->getManager()->getRepository('FuelTechSupportBundle:Client')->find($clientid);
            if (!$client) {
                throw $this->createNotFoundException('No client found with id='.$clientid);
            }
            $contact->setClient($client);
            
            //persist data
            $em = $this->getDoctrine()->getManager();
            $em->persist($contact);
            $em->flush();
            
            //redirect to clientdetail
            return $this->redirect($this->generateUrl('ftsupport_client_detail', array(
                'id' => $clientid,
            )));
        }
        //render form
        return $this->render('FuelTechSupportBundle:Contact:detail.html.twig', array(
            'form' => $form->createView(),
        ));
    }
    
    public function deleteAction($id)
    {
        //retrieve object
        $em = $this->getDoctrine()->getManager();
        $contact = $em->getRepository('FuelTechSupportBundle:Contact')->find($id);
        if(!$contact) {
            throw $this->createNotFoundException('No contact found with id '.$id);
        }
        $clientid = $contact->getClient()->getId();
        //remove object
        $em->remove($contact);
        $em->flush();
        
        //redirect
        return $this->redirect($this->generateUrl('ftsupport_client_detail', array('id' => $clientid)));
    }
}
