<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */
namespace Application\Controller {

    use Application\Entity\Vehicle;
    use Zend\View\Model\ViewModel;
    use Doctrine\ORM\Query\Expr\Join;
    use Lib\Controller\AbstractController;
    use Application\Entity\Options\Taxonomy;

    /**
     * Class IndexController
     * @package Application\Controller
     */
    class IndexController extends AbstractController
    {

        /**
         * Function indexAction
         * @return ViewModel
         */
        public function indexAction()
        {
            $em = $this->getEntityManager();
            $exp = $em->getExpressionBuilder();
            $qb = $em->getRepository(Taxonomy::class)
                ->createQueryBuilder('mod');

            $qb->select('mod')
                ->join('mod.root', 'mark', Join::WITH,
                    $exp->eq('mark.active', true));

            $qb->leftJoin('mod.vehicles', 'car')
                ->addSelect($exp->count('car'));

            $qb->orderBy($exp->asc('mark.name'))
                ->groupBy('mark.id');

            $marks = $qb->getQuery()
                ->getResult();

            $qb = $em->getRepository(Vehicle::class)
                ->createQueryBuilder('v');

            $qb->select('v')->join('v.tags', 't')
                ->where($exp->eq('t.id', 41212));

            $sales = $qb->getQuery()
                ->getResult();

            $viewModel = new ViewModel;
            $viewModel->setVariable('marks', $marks)
                ->setVariable('sales', $sales);

            return $viewModel;
        }
    }
}
