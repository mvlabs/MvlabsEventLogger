<?php
namespace MvlabsEventLogger;
use Zend\Mvc\MvcEvent;

class Module
{

    public function onBootstrap (MvcEvent $e)
    {
        $application = $e->getApplication();
        $serviceManager = $application->getServiceManager();

        // attach event logger listener (only if a user is logged)
        $auth = $serviceManager->get('zfcuser_auth_service');
        if ($auth->hasIdentity()) {
            $sharedEventManager = $application->getEventManager()->getSharedManager();
            $sharedEventManager->attachAggregate(
                $serviceManager->get(
                    'MvlabsEventLogger\Listener\UserEventListener'));
        }
    }

    public function getConfig ()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig ()
    {
        return [
            'Zend\Loader\StandardAutoloader' => [
                'namespaces' => [
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__
                ]
            ]
        ];
    }

    public function getServiceConfig ()
    {
        return [
            'invokables' => [

            ],
            'factories' => [
                'MvlabsEventLogger\Service\UserEventService' => 'MvlabsEventLogger\Service\UserEventServiceFactory',
            ]
        ];
    }
}
