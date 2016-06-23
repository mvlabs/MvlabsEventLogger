<?php

namespace MvlabsEventLogger;

return [

    'service_manager' => [
        'factories' => [
            'MvlabsEventLogger\Listener\UserEventListener' => Listener\UserEventListenerFactory::class,
            'MvlabsEventLogger\EventManager\EventManager' => EventManager\EventManagerFactory::class,
        ],
    ],
    'doctrine'        => [
        'driver' => [
            __NAMESPACE__ . '_driver' => [
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/' . __NAMESPACE__ . '/Entity')
            ],
            'orm_default'             => [
                'class'   => 'Doctrine\ORM\Mapping\Driver\DriverChain',
                'drivers' => [
                    __NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver'
                ]
            ],
        ],
    ],

];
