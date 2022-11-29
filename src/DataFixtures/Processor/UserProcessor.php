<?php

namespace App\DataFixtures\Processor;

use ApiPlatform\Metadata\Operation;
use Fidry\AliceDataFixtures\ProcessorInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
//use App\Hasher\PasswordHashInterface;
use App\Entity\User;

final class UserProcessor implements ProcessorInterface
{

    private $passwordHasher;

    /**
     * @inheritDoc
     */

    public function __construct(UserPasswordHasherInterface $passwordHasher) {
        $this->passwordHasher = $passwordHasher;
    }

    public function preProcess(string $id, object $object): void
    {
        // TODO: Implement preProcess() method.
        if (false === $object instanceof User) {
            return;
        }

        $object->setPassword($this->passwordHasher->hashPassword($object, $object->getPassword()));
    }

    public function postProcess(string $id, object $object): void
    {
        // TODO: Implement postProcess() method.
    }
}