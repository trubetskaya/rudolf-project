<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller {

    use Zend\View\Model\ViewModel;

    /**
     * Class CatalogController
     * @package Application\Controller
     */
    class InfoController extends AbstractController
    {
        /**
         * Sale
         * @return ViewModel
         */
        public function saleAction()
        {
            $view = new ViewModel;
            $view->setVariable('section', $this->params()
                ->fromRoute('section'));

            return $view;
        }

        /**
         * Services
         * @return ViewModel
         */
        public function servicesAction()
        {
            $view = new ViewModel;
            $view->setVariable('section', $this->params()
                ->fromRoute('section'));

            return $view;
        }

        /**
         * About company
         * @return ViewModel
         */
        public function companyAction()
        {
            $view = new ViewModel;
            return $view;
        }
    }
}
