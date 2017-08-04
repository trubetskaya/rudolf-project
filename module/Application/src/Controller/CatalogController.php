<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller {

    use Application\Entity\Options\Taxonomy;
    use Application\Entity\Vehicle;
    use Doctrine\ORM\EntityNotFoundException;
    use Lib\Controller\AbstractController;
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
            $em = $this->getEntityManager();
            $exp = $em->getExpressionBuilder();

            $qb = $em->getRepository(Vehicle::class)
                ->createQueryBuilder('v')
                ->where($exp->eq('v.active', true))
                ->orderBy($exp->asc('v.index'));

            $list = [];
            $i = $qb->getQuery()
                ->iterate();

            $i->rewind();
            while ($i->valid()) {
                $current = $i->current();

                /** @var Vehicle $item */
                $item = current($current);
                array_push($list, $item->jsonSerialize('copy'));

                $i->next();
            }

            $view = new ViewModel;
            $view->setVariable('list', $list);

            return $view;
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
    }
}
