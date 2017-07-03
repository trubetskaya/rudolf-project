<?php
/**
 * Created by PhpStorm.
 * Date: 03.01.16
 * Time: 4:49
 */

namespace Dashboard\Repository {

    use Dashboard\Entity\Locale;

    /**
     * Class LocaleRepository
     * @package Dashboard\Repository
     *
     * @method Locale findOneByDefault($default)
     */
    class LocaleRepository extends EntityRepository
    {
        /**
         * Finds all entities in the repository.
         * @return Locale[] The entities.
         */
        public function findAll()
        {
            return parent::findBy([], ['index' => 'ASC']);
        }
    }
}
