<?php

namespace FuelTech\SupportBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use FuelTech\SupportBundle\Form\Type\ClientType;

/**
 * Description of ClientController
 *
 * @author cyber02
 */
class ClientController extends Controller
{
    public function listAction()
    {
        //get clients
        $repository = $this->getDoctrine()->getRepository('FuelTechSupportBundle:Client');
        $query = $repository->createQueryBuilder('cl')
                ->getQuery();
        $clients = $query->getResult();

        //render clientlist page
        return $this->render(
                'FuelTechSupportBundle:Client:list.html.twig',
                array(
                    'clients' => $clients,
                ));
    }
    
    public function showDetailAction($id, Request $request)
    {
        //get client object
        $client = $this
                ->getDoctrine()
                ->getRepository('FuelTechSupportBundle:Client')
                ->find($id);
        if (!$client) {
            throw $this->createNotFoundException(
                    'No client found with id = '.$id);
        }
        $contacts = $client->getContacts();
        
        $form = $this->createForm(new ClientType(), $client);
        
        //handle form submission
        $form->handleRequest($request);
        //validate formdata object if form submitted(isValid returns false if form was not submitted)
        if ($form->isValid()) {
            //process form, i.e. persist data
            $em = $this->getDoctrine()->getManager();
            $em->persist($client);
            $em->flush();
            
            //redirect to client list
            return $this->redirect($this->generateUrl('ftsupport_client_list'));
        }
        

        //render client detail page
        return $this->render(
                'FuelTechSupportBundle:Client:detail.html.twig',
                array(
//                    'client' => $client,
                    'form' => $form->createView(),
                    'contacts' => $contacts,
                ));
    }
    
    public function newAction(Request $request)
    {
        //create empty form & object
        $client = new \FuelTech\SupportBundle\Entity\Client();
        $form = $this->createForm(new ClientType(), $client);
        
        //handle form submission
        $form->handleRequest($request);
        
       //validate formdata
        if ($form->isValid()) {
            //create object
            $client = $form->getData();
            
            //persist object
            $em = $this->getDoctrine()->getManager();
            $em->persist($client);
            $em->flush();
            //redirect to client list
            return $this->redirect($this->generateUrl('ftsupport_client_list'));
            //var_dump($client);
        }
        
        //render
        return $this->render('FuelTechSupportBundle:Client:detail.html.twig',
                array(
                    'form' => $form->createView(),
                ));
    }
    public function deleteAction($id)
    {
        //retrieve object
        $em = $this->getDoctrine()->getManager();
        $client = $em->getRepository('FuelTechSupportBundle:Client')->find($id);
        
        if (!$client) {
            throw $this->createNotFoundException('No client found with id '.$id);
        }
        //delete object
        $em->remove($client);
        $em->flush();
        //redirect to client list
        return $this->redirect($this->generateUrl('ftsupport_client_list'));
    }
}
