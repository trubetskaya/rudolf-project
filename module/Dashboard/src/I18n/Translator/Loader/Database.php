<?php
/**
 * Created by PhpStorm.
 * Date: 05.07.17
 * Time: 3:14
 */

namespace Dashboard\I18n\Translator\Loader {

    use Zend\I18n\Translator\Loader\RemoteLoaderInterface;

    /**
     * Class Database
     */
    class Database implements RemoteLoaderInterface
    {

        /**
         * Function load
         * @param string $locale
         * @param string $textDomain
         * @return array
         */
        public function load($locale, $textDomain)
        {
            $messages['and'] = 'i';
            return $messages;
        }
    }
}