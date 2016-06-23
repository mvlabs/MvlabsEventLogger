<?php

namespace MvlabsEventLogger\Service;

use Doctrine\ORM\EntityManager;
use MvlabsEventLogger\Entity\Repository\UserEventRepository;


class UserEventService
{
    private $entityManager;
    private $userEventRepository;

    public function __construct(
        EntityManager $entityManager,
        UserEventRepository $userEventRepository
    ) {
        $this->entityManager = $entityManager;
        $this->userEventRepository = $userEventRepository;
    }

    /**
     * getLastUserEventByTopic(string $topic)
     *
     * @param string $topic
     */
    public function getLastUserEventByTopic(string $topic)
    {
        return $this->userEventRepository->getLastUserEventByTopic($topic);
    }
}
