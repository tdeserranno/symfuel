<?php

namespace FuelTech\SupportBundle\Fixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use FuelTech\SupportBundle\Entity\Client;

/**
 * Description of ClientFixtures
 *
 * @author cyber02
 */
class ClientFixtures extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $client1 = new Client();
        $client1->setName('A.K. Gistel');
        $client1->setAddress('Nieuwpoortsesteenweg 195B');
        $client1->setPostcode('9470');
        $client1->setCity('Gistel');
        $client1->setTelephone('059519742');
        $client1->setFax('059519743');
        $client1->setEmail('a.k.gistel@skynet.be');
        $client1->setRemark('pomp achteraan gebouw');
        $manager->persist($client1);
        $this->addReference('client1', $client1);
        
        $client2 = new Client();
        $client2->setName('OCTA+');
        $client2->setAddress('Schaarbeeklei 600');
        $client2->setPostcode('1800');
        $client2->setCity('Vilvoorde');
        $client2->setTelephone('022574616');
        $client2->setFax('022552100');
        $client2->setEmail('');
        $client2->setRemark('');
        $manager->persist($client2);
        $this->addReference('client2', $client2);
        
        $client3 = new Client();
        $client3->setName('De Rese Transport');
        $client3->setAddress('Zwanenlaan 4');
        $client3->setPostcode('8400');
        $client3->setCity('Oostende');
        $client3->setTelephone('059265539');
        $client3->setFax('0475266783');
        $client3->setEmail('info@transport-derese.be');
        $client3->setRemark('');
        $manager->persist($client3);
        $this->addReference('client3', $client3);
        
        $client4 = new Client();
        $client4->setName('Wim Bosman Expeditie N.V.');
        $client4->setAddress('Zandvoordestraat 362');
        $client4->setPostcode('8400');
        $client4->setCity('Oostende');
        $client4->setTelephone('059400400');
        $client4->setFax('059565574');
        $client4->setEmail('sales@wimbosman.be');
        $client4->setRemark('');
        $manager->persist($client4);
        $this->addReference('client4', $client4);
        
        $client5 = new Client();
        $client5->setName('ECS European Containers');
        $client5->setAddress('Karveelstraat 3');
        $client5->setPostcode('8380');
        $client5->setCity('Zeebrugge');
        $client5->setTelephone('050502020');
        $client5->setFax('050502029');
        $client5->setEmail('hello@ecs.be');
        $client5->setRemark('');
        $manager->persist($client5);
        $this->addReference('client5', $client5);
        
        
        $manager->flush();
    }
    
    public function getOrder()
    {
        return 1;
    }
}
