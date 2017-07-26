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
     * Class ECommerceOption
     * @package Application
     *
     * @ORM\Entity(repositoryClass="Dashboard\Repository\TaxonomyRepository")
     */
    class Body extends Taxonomy
    {
        use OptionTrait;
    }
}
