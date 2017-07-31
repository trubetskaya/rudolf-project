<?php

/**
 * Created by PhpStorm.
 * Date: 18.07.17
 * Time: 22:13
 */
namespace Application\Entity\Options {

    use Doctrine\ORM\Mapping as ORM;
    use Doctrine\Common\Collections\ArrayCollection;
    use Lib\Entity\Taxonomy\TaxonomyBase;

    /**
     * Class Fuel
     * @package Application
     *
     * @ORM\Entity(repositoryClass="Dashboard\Repository\TaxonomyRepository")
     */
    class Tag extends TaxonomyBase
    {
        use OptionTrait;

        /**
         * @var ArrayCollection
         * @ORM\ManyToMany(targetEntity=Application\Entity\Vehicle::class, mappedBy="tags")
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

