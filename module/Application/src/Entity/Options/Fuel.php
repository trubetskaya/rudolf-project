<?php

/**
 * Created by PhpStorm.
 * Date: 18.07.17
 * Time: 22:13
 */
namespace Application\Entity\Options {

    use Doctrine\Common\Collections\ArrayCollection;
    use Doctrine\ORM\Mapping as ORM;
    use Lib\Entity\Taxonomy\TaxonomyBase;

    /**
     * Class Fuel
     * @package Application
     *
     * @ORM\Entity(repositoryClass=Application\Repository\TaxonomyRepository::class)
     */
    class Fuel extends TaxonomyBase
    {
        use OptionTrait;

        /**
         * @var ArrayCollection
         * @ORM\OneToMany(targetEntity=Application\Entity\Vehicle::class, mappedBy="fuel")
         */
        protected $vehicles;

        /**
         * Taxonomy constructor.
         */
        public function __construct()
        {
            $this->vehicles = new ArrayCollection;
            parent::__construct();
        }
    }
}

