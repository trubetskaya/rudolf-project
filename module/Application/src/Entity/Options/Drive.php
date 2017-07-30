<?php

/**
 * Created by PhpStorm.
 * Date: 18.07.17
 * Time: 22:13
 */
namespace Application\Entity\Options {

    use Doctrine\ORM\Mapping as ORM;

    /**
     * Class ECommerceOption
     * @package Application
     *
     * @ORM\Entity(repositoryClass="Dashboard\Repository\TaxonomyRepository")
     */
    class Drive extends Taxonomy
    {
        use OptionTrait;
    }
}
