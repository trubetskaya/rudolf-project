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
     * Class drive
     * @package Application
     *
     * @ORM\Entity(repositoryClass=Application\Repository\TaxonomyRepository::class)
     */
    class Drive extends TaxonomyBase
    {
        use OptionTrait;

        /**
         * @var ArrayCollection
         * @ORM\OneToMany(targetEntity=Application\Entity\Vehicle::class, mappedBy="drive")
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
