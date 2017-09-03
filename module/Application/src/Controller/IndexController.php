<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */
namespace Application\Controller {

    use Application\Entity\Options\Category;
    use Application\Entity\Options\Tag;
    use Application\Entity\Vehicle;
    use Zend\View\Model\ViewModel;
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

            $sales = $em->getRepository(Tag::class)->findOneByDescription('sales');
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
                if ($item->getTags()->contains($sales)) {
                    array_push($list, $item);
                }

                $catID = $item->getCategory()->getId();
                $markID = $item->getTaxonomy()->getRoot()->getId();
                if (isset($cats[$catID]['stat'][$markID])) {
                    $cats[$catID]['stat'][$markID]['vehicles']++;
                }
            }

            $viewModel = new ViewModel;
            $viewModel->setVariable('categories', $cats)
                ->setVariable('sales', $list);

            return $viewModel;
        }

        public function contactsAction() {
            $viewModel = new ViewModel;

            return $viewModel;
        }
    }
}
