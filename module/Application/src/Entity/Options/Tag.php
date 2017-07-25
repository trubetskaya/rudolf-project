<?php

/**
 * Created by PhpStorm.
 * Date: 18.07.17
 * Time: 22:13
 */
namespace Application\Entity\Options {

    use Application\Entity\Vehicle;
    use Doctrine\Common\Collections\ArrayCollection;
    use Lib\Entity\Taxonomy;
    use Doctrine\ORM\Mapping as ORM;

    /**
     * Class Fuel
     * @package Application
     *
     * @ORM\Entity(repositoryClass="Lib\Repository\TaxonomyRepository")
     */
    class Tag extends Taxonomy
    {
        use OptionTrait;

        /**
         * @var ArrayCollection
         * @ORM\ManyToMany(targetEntity=Application\Entity\Vehicle::class, mappedBy="tags")
         */
        protected $vehicles;
    }
}

