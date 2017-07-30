<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */
namespace Application\Controller {

    use Dashboard\Entity\Taxonomy;
    use Doctrine\ORM\Query\Expr\Join;
    use Zend\View\Model\ViewModel;
    use Lib\Controller\AbstractController;

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
                ->createQueryBuilder('model')->select(['model', $exp->count('car')])
                ->join('model.root', 'mark', Join::WITH, $exp->andX(
                    $exp->isInstanceOf('mark', Taxonomy::class),
                    $exp->eq('mark.active', true)
                ))->leftJoin('model.documents', 'car');

            $qb->where($exp->andX(
                    $exp->isInstanceOf('model', Taxonomy::class),
                    $exp->isNotNull('model.root')
                ));

            $qb->orderBy($exp->asc('mark.name'))
                ->groupBy('mark.id');

            $q = $qb->getQuery();
//            var_dump($q->getResult());
//            exit;
            $viewModel = new ViewModel;
            $viewModel->setVariable('marks', $q->getResult());

            return $viewModel;
        }
    }
}