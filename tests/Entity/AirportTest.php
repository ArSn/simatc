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

        $this->getEntityManager()->persist($airport);
        $this->getEntityManager()->flush();
    }

    public function tearDown(): void
    {

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
        $airport = $this->getRepository()->findOneBy(['name' => 'Stuttgart']);
        var_dump($airport);
    }
}
