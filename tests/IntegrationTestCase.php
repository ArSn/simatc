<?php

namespace App\Tests;

use Doctrine\Persistence\ObjectManager;
use Doctrine\Persistence\ObjectRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class IntegrationTestCase extends KernelTestCase
{
    private ObjectManager $entityManager;
    private ObjectRepository $repository;
    private string $sutClassName;

    public function setUp(): void
    {
        self::bootKernel();

        $this->entityManager = static::$kernel->getContainer()
            ->get('doctrine')
            ->getManager();
    }

    protected function initialize(string $sutClassName): void
    {
        $this->sutClassName = $sutClassName;
    }

    protected function getEntityManager(): ObjectManager
    {
        return $this->entityManager;
    }

    private function guardAgainstEmptyClassName(): void
    {
        if (empty($this->sutClassName)) {
            throw new \RuntimeException('The SUT class name can not be empty! Call initialize() first.');
        }
    }

    private function loadRepository(): void
    {
        $this->guardAgainstEmptyClassName();
        $this->repository = $this->entityManager->getRepository($this->sutClassName);
    }

    protected function getRepository(): ObjectRepository
    {
        if ($this->repository === null) {
            $this->loadRepository();
        }
        return $this->repository;
    }
}
