<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 16.08.14
 * Time: 8:04
 */

namespace Dashboard\Service {

    use Dashboard\Entity\ECommerceProduct;
    use Dashboard\Entity\Document;

    use Zend\View\Model\JsonModel;
    use Zend\View\Model\ViewModel;

    /**
     * Class CommerceService
     * @package Commerce\Service
     */
    class CommerceService extends DocumentService
    {
        /**
         * Function edit
         * @param Document|ECommerceProduct $document
         * @return JsonModel|ViewModel
         */
        public function edit(Document $document)
        {
            return parent::edit($document);
        }

    }
}
