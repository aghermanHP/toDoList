<?php

namespace App\DataPersister;

use ApiPlatform\Core\DataPersister\ContextAwareDataPersisterInterface;
use App\Entity\ToDoList;
use Doctrine\ORM\EntityManagerInterface;

class ToDoListDataPersister implements ContextAwareDataPersisterInterface
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function supports($data, array $context = []): bool
    {
        return $data instanceof ToDoList;
    }

    public function persist($data, array $context = [])
    {
        if (
            $data instanceof ToDoList &&     (
                ($context['collection_operation_name'] ?? null) === 'post' ||
                ($context['graphql_operation_name'] ?? null) === 'create'
            )
        ) {
            $data->prepareDataCreated(new \DateTime());
            $this->entityManager->persist($data);
            $this->entityManager->flush();
        }
        elseif (
            $data instanceof ToDoList && (
                ($context['item_operation_name'] ?? null) === 'put'
            )
        ) {
            $data->prepareDataUpdated(new \DateTime());
            $this->entityManager->persist($data);
            $this->entityManager->flush();
        }
    }

    public function remove($data, array $context = [])
    {
        $this->entityManager->remove($data);
        $this->entityManager->flush();
    }

    public function resumable(array $context = []): bool
    {
        return true;
    }
}