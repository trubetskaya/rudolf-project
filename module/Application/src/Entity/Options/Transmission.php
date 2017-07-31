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
     * Class Transmission
     * @package Application
     *
     * @ORM\Entity(repositoryClass="Dashboard\Repository\TaxonomyRepository")
     */
    class Transmission extends TaxonomyBase
    {
        use OptionTrait;

        /**
         * @var ArrayCollection
         * @ORM\OneToMany(targetEntity=Application\Entity\Vehicle::class, mappedBy="transmission")
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
