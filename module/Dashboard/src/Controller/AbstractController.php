<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Dashboard\Controller {

    use Dashboard\Entity\ECommerceProduct;
    use Dashboard\Service\ServiceAbstract;
    use Doctrine\ORM\EntityManager;
    use Doctrine\ORM\EntityNotFoundException;

    use Zend\Mvc\MvcEvent;
    use Zend\Mvc\Controller\AbstractActionController;
    use Zend\View\Model\JsonModel;
    use Zend\View\Model\ViewModel;

    use Dashboard\Entity\Document;
    use Doctrine\ORM\Internal\Hydration\IterableResult;

    /**
     * Class IndexController
     * @package Dashboard\Controller
     */
    class AbstractController extends AbstractActionController
    {
        /**
         * Entity manager
         * @var EntityManager
         */
        protected $em;

        /**
         * service
         * @var ServiceAbstract
         */
        protected $service;

        /**
         * Entity class name
         * @var string
         */
        protected static $entityClass;

        /**
         * Get service
         * @return ServiceAbstract
         */
        public function getService()
        {
            return $this->service;
        }

        /**
         * Execute the request
         * @param  MvcEvent $e
         * @return mixed
         * @throws \Zend\Mvc\Exception\DomainException
         */
        public function onDispatch(MvcEvent $e)
        {
            return parent::onDispatch($e);
        }

        /**
         * Get entity manager
         * @return EntityManager
         */
        public function getEntityManager()
        {
            return $this->em;
        }

        /**
         * Список
         * @return ViewModel
         */
        public function indexAction()
        {
            $viewModel = new ViewModel;
            return $viewModel;
        }

        /**
         * Добавление
         * @return ViewModel
         */
        public function addAction()
        {
            /** @var Document $entity */
            $entity = new static::$entityClass;
            return $this->getService()
                ->edit($entity);
        }

        /**
         * Редактирование
         * @return ViewModel
         * @throws \Doctrine\ORM\EntityNotFoundException
         */
        public function editAction()
        {

            $em = $this->getEntityManager();
            $identifier = $this->params()
                ->fromRoute("id");

            /** @var Document $entity */
            $entity = $em->getRepository(static::$entityClass)
                ->find(intval($identifier));
            if (!$entity instanceof static::$entityClass) {
                throw EntityNotFoundException::fromClassNameAndIdentifier(
                    static::$entityClass, [$identifier]
                );
            }

            return $this->getService()
                ->edit($entity);
        }

        /**
         * Удаление
         * @return JsonModel
         */
        public function removeAction()
        {
            try {
                /** @var EntityManager $em */
                $em = $this->getService()->getEntityManager();
                $identifier = $this->params()
                    ->fromRoute("id");

                /** @var Document $entity */
                $entity = $em->getRepository(static::$entityClass)
                    ->find(intval($identifier));
                if (!$entity instanceof static::$entityClass) {
                    throw EntityNotFoundException::fromClassNameAndIdentifier(
                        static::$entityClass, [$identifier]
                    );
                }

                $em->remove($entity);
                $em->flush();

                return new JsonModel([
                    'status' => 'success',
                    'data' => [
                        'message' => 'Changes applied successful'
                    ]
                ]);

            } catch (\Exception $ex) {

                return new JsonModel([
                    'status' => 'error',
                    'data' => [
                        'message' => $ex->getMessage()
                    ]
                ]);
            }
        }

        /**
         * Выгрузка списка сущностей
         * @return JsonModel
         */
        public function listAction()
        {
            /** @var IterableResult $iterator */
            $iterator = $this->getService()->getEntityManager()
                ->getRepository(static::$entityClass)
                ->createQueryBuilder("i")->select("i")
                ->getQuery()
                ->iterate();

            $data = [];
            $iterator->rewind();
            while ($iterator->valid()) {
                $current = $iterator->current();
                $iterator->next();

                /** @var ECommerceProduct $entity */
                $entity = array_shift($current);
                array_push($data, $entity->jsonSerialize());
            }

            $jsonModel = new JsonModel(['data' => $data]);
            $jsonModel->setVariable('recordsFiltered', count($data))
                ->setVariable('recordsTotal', count($data))
                ->setVariable('draw', 1);

            return $jsonModel;
        }

        /**
         * Сортировка
         * @return JsonModel
         * @throws EntityNotFoundException
         */
        public function sortAction()
        {
            try {
                /** @var \Lib\ORM\EntityManager $em */
                $em = $this->getService()->getEntityManager();
                foreach ($this->params()->fromPost() as $rowID => $index) {
                    $entity = $em->getRepository(static::$entityClass)->find(substr($rowID, 4));
                    if (!$entity instanceof static::$entityClass) {
                        throw new EntityNotFoundException;
                    }


                    /** @var Document $entity */
                    $entity->setIndex($index);
                    $em->persist($entity);
                }

                $em->flush();
                return new JsonModel([
                    'status' => 'success',
                    'data' => [
                        'message' => 'Changes applied successful'
                    ]
                ]);

            } catch (\Exception $ex) {
                return new JsonModel([
                    'status' => 'error',
                    'data' => [
                        'message' => $ex->getMessage()
                    ]
                ]);
            }
        }
    }
}
