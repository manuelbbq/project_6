<?php

namespace App\DataFixtures;

use App\Entity\Rights;
use App\Factory\RightsFactory;
use App\Factory\UserFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        $rights = new Rights();
        $rights->setBeschreibung('admin');
        $rights->setType(0);
        $manager->persist($rights);
        $manager->flush();
        $rights = new Rights();
        $rights->setBeschreibung('User');
        $rights->setType(1);
        $manager->persist($rights);
        $manager->flush();
//        RightsFactory::createMany(2);
        UserFactory::createMany(10, function() {
            return [

                'rights' => RightsFactory::random(),
            ];
        });



        $manager->flush();
    }
}
