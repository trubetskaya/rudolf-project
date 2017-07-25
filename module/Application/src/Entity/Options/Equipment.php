<?php

/**
 * Created by PhpStorm.
 * Date: 18.07.17
 * Time: 22:13
 */
namespace Application\Entity\Options {

    use Lib\Entity\Taxonomy;
    use Doctrine\Common\Collections\ArrayCollection;
    use Doctrine\ORM\Mapping as ORM;

    /**
     * Class ECommerceOption
     * @package Application
     *
     * @ORM\Entity(repositoryClass="Lib\Repository\TaxonomyRepository")
     */
    class Equipment extends Taxonomy
    {
        use OptionTrait;

        /**
         * @var ArrayCollection
         * @ORM\ManyToMany(targetEntity=Application\Entity\Vehicle::class, mappedBy="options")
         */
        protected $vehicles;
    }
}
