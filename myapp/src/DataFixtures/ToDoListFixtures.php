<?php

namespace App\DataFixtures;

use App\Entity\ToDoList;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ToDoListFixtures extends Fixture
{
    /**
     * @param ObjectManager $manager
     *
     * @return void
     */
    public function load(ObjectManager $manager)
    {

        for ($item = 0; $item <= 20; $item++) {
            $toDoList = new ToDoList();
            $toDoList->setName('name'.$item);
            $toDoList->setDescription('description'.$item);
            $toDoList->prepareDataCreated(new \DateTime('now + '.$item.' day'));
            $toDoList->prepareDataUpdated(new \DateTime('now + '.$item.' day'));
            $manager->persist($toDoList);
        }
        $manager->flush();
    }

}