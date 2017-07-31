<?php
/**
 * Created by PhpStorm.
 * Project: MarketGid
 * Date: 29.08.15
 * Time: 11:21
 */
namespace Application\Entity\Options {

    use Doctrine\ORM\Mapping as ORM;
    use Doctrine\Common\Collections\ArrayCollection;
    use Lib\Entity\Taxonomy\TaxonomyBase;

    /**
     * Class Taxonomy
     * @package Dashboard\Entity
     * @ORM\Entity(repositoryClass=Dashboard\Repository\TaxonomyRepository::class)
     */
    class Taxonomy extends TaxonomyBase
    {
        use OptionTrait;

        /**
         * @var ArrayCollection
         * @ORM\OneToMany(targetEntity=Application\Entity\Vehicle::class, mappedBy="taxonomy")
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
