<?php
/**
 * Created by PhpStorm.
 * Project: MarketGid
 * Date: 29.08.15
 * Time: 11:21
 */
namespace Application\Repository {

    use Doctrine\ORM\Query\Expr\Join;
    use Lib\Entity\Taxonomy\TaxonomyBase;
    use Lib\Repository\EntityRepository;

    /**
     * Class Taxonomy
     * @package Lib
     * @subpackage Repository
     */
    class TaxonomyRepository extends EntityRepository
    {
        /**
         * Function getTerms
         * @return array
         */
        public function getOptions()
        {
            $exp = $this->getEntityManager()->getExpressionBuilder();
            $qb = $this->createQueryBuilder('taxonomy')->select("taxonomy")
                ->join("taxonomy.root", "parent", Join::WITH, $exp->eq("parent.active", true))
                ->where($exp->eq("taxonomy.active", true))
                ->orderBy($exp->asc('taxonomy.index'));

            return $qb->getQuery()
                ->getResult();
        }

        /**
         * Get checkbox mapping values
         * @return array
         */
        public function getCheckboxes() : array
        {
            $exp = $this->getEntityManager()->getExpressionBuilder();
            $qb = $this->createQueryBuilder("options")->select("options")
                ->join("options.root", "optionGroup")->addSelect("optionGroup")
                ->orderBy($exp->asc('optionGroup.index'))
                ->addOrderBy($exp->asc('options.index'));

            $options = [];
            $i = $qb->getQuery()
                ->iterate();


            $i->rewind();
            while ($i->valid()) {
                $current = $i->current();

                /** @var TaxonomyBase $tax */
                $tax = array_shift($current);
                if ($tax->getRoot()) {
                    if (!in_array($tax->getRoot(), $options)) {
                        $tax->getRoot()->setName("_" . $tax->getRootName());
                        $options[] = $tax->getRoot();
                    }
                }

                $options[] = $tax;
                $i->next();
            }

            return $options;
        }
    }
}