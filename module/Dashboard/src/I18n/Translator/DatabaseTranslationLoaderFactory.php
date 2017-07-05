<?php
/**
 * Created by PhpStorm.
 * Date: 05.07.17
 * Time: 3:27
 */

namespace Dashboard\I18n\Translator {

    use Interop\Container\ContainerInterface;
    use Zend\ServiceManager\Factory\FactoryInterface;
    use Dashboard\I18n\Translator\Loader\Database;

    /**
     * Class DatabaseTranslationLoaderFactory
     * @package Dashboard\I18n\Translator
     */
    class DatabaseTranslationLoaderFactory implements FactoryInterface
    {
        /**
         * Function __invoke
         * @param ContainerInterface $container
         * @param string $requestedName
         * @param array|null $options
         * @return mixed
         */
        public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
        {
            return new Database($container->get('doctrine.entitymanager.orm_default'));
        }
    }
}
