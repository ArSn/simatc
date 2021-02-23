<?php

namespace App\Tests\Entity;

use App\Entity\Airport;
use PHPUnit\Framework\TestCase;

class AirportTest extends TestCase
{
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
}
