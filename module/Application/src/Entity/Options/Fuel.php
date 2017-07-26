<?php

/**
 * Created by PhpStorm.
 * Date: 18.07.17
 * Time: 22:13
 */
namespace Application\Entity\Options {

    use Dashboard\Entity\Taxonomy;
    use Doctrine\ORM\Mapping as ORM;

    /**
     * Class Fuel
     * @package Application
     *
     * @ORM\Entity(repositoryClass="Dashboard\Repository\TaxonomyRepository")
     */
    class Fuel extends Taxonomy
    {
    }
}

