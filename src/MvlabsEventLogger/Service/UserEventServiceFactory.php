<?php

namespace MvlabsEventLogger\Service;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class UserEventServiceFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        // Dependencies are fetched from Service Manager
        $entityManager = $serviceLocator->get('doctrine.entitymanager.orm_default');
        $userEventRepository = $entityManager->getRepository('MvlabsEventLogger\Entity\UserEvent');


        return new UserEventService(
            $entityManager,
            $userEventRepository
        );
    }
}
