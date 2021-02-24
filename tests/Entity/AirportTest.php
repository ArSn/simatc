<?php

namespace App\Tests\Entity;

use App\Entity\Airport;
use App\Tests\IntegrationTestCase;

class AirportTest extends IntegrationTestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->initialize(Airport::class);

        $airport = new Airport();
        // todo: have these fields autofilled for all entitites
        $airport->setCreatedAt(new \DateTime());
        $airport->setUpdatedAt(new \DateTime());
        $airport->setName('Stuttgart');
        $airport->setCityName('Stuttgart');

        $em = $this->getEntityManager();
        $em->persist($airport);
        $em->flush();
    }

    public function testGetId()
    {
        $airport = new Airport();
        $this->assertNull($airport->getId());
    }

    public function testGetAndSetName()
    {
        $airport = new Airport();
        $this->assertNull($airport->getName());

        $airport->setName('Awesome Airport');
        $this->assertSame('Awesome Airport', $airport->getName());
    }

    public function testLoadAirport()
    {
        // todo: get rid of deprecation notice in this test
        /** @var Airport $airport */
        $airport = $this->getRepository()->findOneBy(['name' => 'Stuttgart']);
        $this->assertIsInt($airport->getId());
        // todo: add assertions for automated timestamps
        $this->assertSame('Stuttgart', $airport->getName());
        $this->assertSame('Stuttgart', $airport->getCityName());
        var_dump($airport);
    }
}
