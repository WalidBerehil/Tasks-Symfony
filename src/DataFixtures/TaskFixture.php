<?php

namespace App\DataFixtures;

use App\Entity\Task;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class TaskFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for($i = 0; $i <= 10; $i++){
            $task = new Task();
            $task->setTitle("Task title : ".$i);
            $task->setDescription("Task description : ".$i);
            $manager->persist($task);
        }

        $manager->flush();
    }
}
