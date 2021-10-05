<?php

namespace App\Controller;

use App\Entity\ToDoList;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * @Route("/api")
 */
class ToDoListApiController
{
    /**
     * @Route("/todolists", name="todolists")
     *
     * @return JsonResponse
     */
    public function getToDoList(EntityManagerInterface $em, SerializerInterface $serializer)
    {
        $records = $em->getRepository(ToDoList::class)->findAll();
        $serializedRecords = $serializer->serialize(
            $records,
            'json');
        $response = new JsonResponse();
        $response->setData($serializedRecords);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }
}