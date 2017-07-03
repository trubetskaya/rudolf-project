<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonModule for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Dashboard {

    use Zend\Mvc\ModuleRouteListener;
    use Zend\Mvc\MvcEvent;

    /**
     * Dashboard module
     * @package Dashboard
     */
    class Module
    {
        /**
         * On bootstrap
         * @param MvcEvent $e
         */
        public function onBootstrap(MvcEvent $e)
        {
            $eventManager        = $e->getApplication()->getEventManager();
            $moduleRouteListener = new ModuleRouteListener();
            $moduleRouteListener->attach($eventManager);

            $eventManager->attach(MvcEvent::EVENT_ROUTE, function (MvcEvent $e) {

                $rm = $e->getRouteMatch();
                if ($rm->getParam('controller') == 'zfcuser' && $rm->getParam('action') == 'login') {
                    $e->getViewModel()->setTemplate('layout/empty');
                }
            });
        }

        /**
         * Get config
         * @return array
         */
        public function getConfig()
        {
            return include __DIR__ . '/../config/module.config.php';
        }
    }
}
