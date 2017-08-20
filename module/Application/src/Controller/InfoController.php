<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller {

    use Lib\Controller\AbstractController;
    use Zend\View\Model\ViewModel;

    /**
     * Class CatalogController
     * @package Application\Controller
     */
    class InfoController extends AbstractController
    {
        /**
         * @internal Vehicle $item
         * @return ViewModel
         */
        public function saleAction()
        {
            $view = new ViewModel;
            return $view;
        }

        /**
         * @internal Vehicle $item
         * @return ViewModel
         */
        public function servicesAction()
        {
            $section = $this->params()->fromRoute('section');
            switch ($section) {
                case 'insurance':
                    break;
                case 'expertise':
                    break;
                case 're-registration':
                    break;
                case 'credit':
                default:
                    break;
            }
            $view = new ViewModel;
            $view->setVariable('section', $section ?: 'credit');
            return $view;
        }

        /**
         * @internal Vehicle $item
         * @return ViewModel
         */
        public function companyAction()
        {
            $view = new ViewModel;
            return $view;
        }
    }
}
