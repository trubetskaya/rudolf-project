<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */
namespace Application\Controller {

    use Zend\View\Model\ViewModel;
    use Zend\Mvc\Controller\AbstractActionController;

    /**
     * Class IndexController
     * @package Application\Controller
     */
    class IndexController extends AbstractActionController
    {

        /**
         * Function indexAction
         * @return ViewModel
         */
        public function indexAction()
        {
            return new ViewModel();
        }
    }
}