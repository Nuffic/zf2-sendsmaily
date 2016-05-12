<?php
namespace ZfSendsmaily;

use Zend\EventManager\EventInterface;
use Zend\ModuleManager\Feature\BootstrapListenerInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class Module implements BootstrapListenerInterface
{
    /**
     * {@inheritDoc}
     */
    public function onBootstrap(EventInterface $event)
    {

//        $config = $event->getTarget()->getServiceManager()->get('Config');
//        $config  = isset($config['sendsmaily']) ? $config['sendsmaily'] : array();

        # code
    }
    
//    public function getConfig()
//    {
//        return include __DIR__ . '/config/module.config.php';
//    }

    public function getServiceConfig() {

        return array(
            'factories' => array(
                'sendsmaily' => function (ServiceLocatorInterface $serviceLocator) {

                    $config = $serviceLocator->get('Config');
                    $config  = isset($config['sendsmaily']) ? $config['sendsmaily'] : array();

                    return new \nuffic\sendsmaily\ApiClient($config);
                }
            ),
        );
    }

}
