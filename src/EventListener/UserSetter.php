<?php

namespace App\EventListener;

use Doctrine\ORM\Event\LifecycleEventArgs;
use App\Entity\User;
use App\Entity\UserType;

class UserSetter
{
    public function prePersist(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();
        $entityManager = $args->getEntityManager();

        if ($entity instanceof User) {
            $foo = $entityManager->getRepository(UserType::class)->find(1);
            $entity->setUserType($foo);
        }
    }
}