<?php

namespace App\Tests;

use Doctrine\Persistence\ObjectManager;
use Doctrine\Persistence\ObjectRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

abstract class IntegrationTestCase extends KernelTestCase
{
    private ObjectManager $entityManager;
    private ?ObjectRepository $repository = null;
    private string $sutClassName;

    public function setUp(): void
    {
        parent::setUp();
        self::bootKernel();

        $this->entityManager = static::$kernel->getContainer()
            ->get('doctrine')
            ->getManager();
    }

    public function tearDown(): void
    {
        $em = $this->entityManager;

        foreach ($this->getRepository()->findAll() as $object) {
            $em->remove($object);
        }
        $em->flush();
        $em->clear();

        parent::tearDown();
    }

    protected function initialize(string $sutClassName): void
    {
        $this->sutClassName = $sutClassName;
    }

    protected function getEntityManager(): ObjectManager
    {
        return $this->entityManager;
    }

    protected function persist(object $object): void
    {
        $em = $this->getEntityManager();
        $em->persist($object);
        $em->flush();
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
