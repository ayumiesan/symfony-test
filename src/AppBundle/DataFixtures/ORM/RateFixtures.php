<?php

declare(strict_types=1);

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Rate;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

final class RateFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $rate1 = (new Rate())
            ->setLabel('Taux 1')
            ->setValue(1.17)
        ;
        $manager->persist($rate1);

        $rate2 = (new Rate())
            ->setLabel('Taux 2')
            ->setValue(1.20)
        ;
        $manager->persist($rate2);
        $manager->flush();
    }
}
