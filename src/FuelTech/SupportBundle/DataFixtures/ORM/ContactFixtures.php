<?php

namespace FuelTech\SupportBundle\Fixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use FuelTech\SupportBundle\Entity\Contact;

/**
 * Description of ContactFixtures
 *
 * @author cyber02
 */
class ContactFixtures extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $contact1 = new Contact();
        $contact1->setName('Peter');
        $contact1->setTelephone('5551234');
        $contact1->setMobile('');
        $contact1->setEmail('');
        $contact1->setClient($this->getReference('client1'));
        $manager->persist($contact1);
        
        $contact2 = new Contact();
        $contact2->setName('Gerard');
        $contact2->setTelephone('5554321');
        $contact2->setMobile('');
        $contact2->setEmail('');
        $contact2->setClient($this->getReference('client1'));
        $manager->persist($contact2);
        
        $contact3 = new Contact();
        $contact3->setName('Robert');
        $contact3->setTelephone('');
        $contact3->setMobile('0475769912');
        $contact3->setEmail('');
        $contact3->setClient($this->getReference('client2'));
        $manager->persist($contact3);
        
        $contact4 = new Contact();
        $contact4->setName('Bram');
        $contact4->setTelephone('050500123');
        $contact4->setMobile('');
        $contact4->setEmail('');
        $contact4->setClient($this->getReference('client3'));
        $manager->persist($contact4);
        
        $contact5 = new Contact();
        $contact5->setName('Joke');
        $contact5->setTelephone('');
        $contact5->setMobile('0477559988');
        $contact5->setEmail('');
        $contact5->setClient($this->getReference('client3'));
        $manager->persist($contact5);
        
        $contact6 = new Contact();
        $contact6->setName('Kevin');
        $contact6->setTelephone('5218745');
        $contact6->setMobile('');
        $contact6->setEmail('');
        $contact6->setClient($this->getReference('client4'));
        $manager->persist($contact6);
        
        $contact7 = new Contact();
        $contact7->setName('Floris');
        $contact7->setTelephone('6071245');
        $contact7->setMobile('');
        $contact7->setEmail('');
        $contact7->setClient($this->getReference('client5'));
        $manager->persist($contact7);
        
        $contact8 = new Contact();
        $contact8->setName('Stefaan');
        $contact8->setTelephone('5559110');
        $contact8->setMobile('');
        $contact8->setEmail('');
        $contact8->setClient($this->getReference('client5'));
        $manager->persist($contact8);
        
        $manager->flush();
    }
    
    public function getOrder()
    {
        return 2;
    }
}
