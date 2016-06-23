MvlabsEventLogger
=========

MvlabsEventLogger is a ZF2 module that allow to log user events in easy way based on event listener.

Requirements PHPExcel library
-----------------------------
 * PHP version 5.5.0 or higher
 

Installation
------------
#### With composer

1. Add to your `composer.json` :

    $composer require liuggio/excelbundle
    
    ```bash
    $ php composer.phar require mvlabs/mvlabs-eventlogger
    ```
    

2. Now tell composer to download MvlabsEventLogger by running the command:

    ```bash
    $ php composer.phar update
    ```



#### Post installation

1. Enabling it in your `application.config.php`file.

    ```php
    <?php
    return [
        'modules' => [
            // ...
            'MvlabsEventLogger',            
        ],
        // ...
    ];
    ```

Usage
-----
The module registers an EventManager:
  
 ``` php
$eventManager = $serviceLocator->get('MvlabsEventLogger\EventManager\EventManager');
//register event
$this->eventManager->trigger('user.logging', $this, [
    'platform' => 'mvlabs',
    'area' => 'users',
    'action' => 'user loggin',
]);
```
    