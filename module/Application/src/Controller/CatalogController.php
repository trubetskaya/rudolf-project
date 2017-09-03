<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller {

    use Application\Entity\Vehicle;
    use Doctrine\ORM\EntityNotFoundException;
    use Zend\View\Model\JsonModel;
    use Zend\View\Model\ViewModel;

    /**
     * Class CatalogController
     * @package Application\Controller
     */
    class CatalogController extends AbstractController
    {
        /**
         * Function indexAction
         * @internal Vehicle $item
         * @return ViewModel
         */
        public function indexAction()
        {
            $viewModel = new ViewModel;
            return $viewModel;
        }

        /**
         * Function cardAction
         * @return ViewModel
         * @throws EntityNotFoundException
         */
        public function cardAction()
        {
            $em = $this->getEntityManager();
            $exp = $em->getExpressionBuilder();

            $id = intval($this->params()->fromRoute('id'));
            $query = $em->getRepository(Vehicle::class)->createQueryBuilder('v')
                ->select('v')->where($exp->eq('v.id', $id))
                ->orderBy($exp->asc('v.index'))
                ->setMaxResults(1)
                ->getQuery();

            $item = $query->getSingleResult();
            if (!$item instanceof Vehicle) {
                throw EntityNotFoundException::fromClassNameAndIdentifier(Vehicle::class, [$id]);
            }

            $view = new ViewModel;
            $view->setVariable('item', $item);

            return $view;
        }

        /**
         * Function bidAction
         * @return JsonModel
         */
        public function bidAction()
        {
            $viewModel = new JsonModel;
            return $viewModel;
        }
    }
}
