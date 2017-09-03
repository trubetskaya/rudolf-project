<?php

/**
 * Created by PhpStorm.
 * Date: 03.09.17
 * Time: 4:25
 */

namespace Application\Controller {

    use Zend\Mvc\MvcEvent;
    use Application\Entity\Vehicle;

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

            $view = $event->getViewModel();
            $view->setVariable('list', $list);
        }

    }
}
