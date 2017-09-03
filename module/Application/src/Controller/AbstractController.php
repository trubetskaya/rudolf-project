<?php

/**
 * Created by PhpStorm.
 * Date: 03.09.17
 * Time: 4:25
 */

namespace Application\Controller {

    use Zend\Mvc\MvcEvent;
    use Application\Entity\Vehicle;
    use Application\Entity\Options\Taxonomy;
    use Application\Entity\Options\Category;

    /**
     * Class AbstractController
     * @package Application\Controller
     */
    class AbstractController extends \Lib\Controller\AbstractController
    {
        /**
         * Function onDispatch
         * @param MvcEvent $event
         * @return mixed|void
         */
        public function onDispatch(MvcEvent $event)
        {
            parent::onDispatch($event);

            $em = $this->getEntityManager();
            $exp = $em->getExpressionBuilder();
            $qb = $em->getRepository(Taxonomy::class)->createQueryBuilder('mark')
                ->where($exp->andX($exp->eq('mark.active', true), $exp->isNull('mark.root')))
                ->orderBy($exp->asc('mark.name'));

            $marks = [];
            $i = $qb->getQuery()
                ->iterate();

            $i->rewind();
            while ($i->valid()) {
                $current = $i->current();
                $i->next();

                /** @var Taxonomy $item */
                $item = current($current);
                $marks[$item->getId()] = [
                    'name' => $item->getName(),
                    'vehicles' => 0
                ];
            }

            $qb = $em->getRepository(Category::class)->createQueryBuilder('cat')
                ->where($exp->andX($exp->eq('cat.active', true), $exp->isNotNull('cat.root')))
                ->orderBy($exp->asc('cat.index'));

            $cats = [];
            $i = $qb->getQuery()
                ->iterate();

            $i->rewind();
            while ($i->valid()) {
                $current = $i->current();
                $i->next();

                /** @var Category $item */
                $item = current($current);
                $cats[$item->getId()] = [
                    'name' => $item->getName(),
                    'stat' => $marks
                ];
            }

            $qb = $em->getRepository(Vehicle::class)->createQueryBuilder('v')
                ->where($exp->eq('v.active', true))
                ->orderBy($exp->asc('v.index'));

            $list = [];
            $i = $qb->getQuery()
                ->iterate();

            $i->rewind();
            while ($i->valid()) {
                $current = $i->current();
                $i->next();

                /** @var Vehicle $item */
                $item = current($current);
                array_push($list, $item->jsonSerialize('copy'));

                $catID = $item->getCategory()->getId();
                $markID = $item->getTaxonomy()->getRoot()->getId();
                if (isset($cats[$catID]['stat'][$markID])) {
                    $cats[$catID]['stat'][$markID]['vehicles']++;
                }
            }

            $viewModel = $event->getViewModel();
            $viewModel->setVariable('categories', $cats)
                ->setVariable('list', $list);
        }
    }
}
