<?php

/**
 * Created by PhpStorm.
 * Date: 18.07.17
 * Time: 22:13
 */
namespace Application\Entity\Options {

    use Lib\Entity\Taxonomy;
    use Doctrine\ORM\Mapping as ORM;

    /**
     * Class Transmission
     * @package Application
     *
     * @ORM\Entity(repositoryClass="Lib\Repository\TaxonomyRepository")
     */
    class Transmission extends Taxonomy
    {
    }
}
