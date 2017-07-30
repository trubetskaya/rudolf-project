<?php
/**
 * Created by PhpStorm.
 * Project: MarketGid
 * Date: 29.08.15
 * Time: 11:21
 */
namespace Application\Entity\Options {

    use Doctrine\ORM\Mapping as ORM;
    use Lib\Entity\Taxonomy\TaxonomyBase;

    /**
     * Class Taxonomy
     * @package Dashboard\Entity
     * @ORM\Entity(repositoryClass=Dashboard\Repository\TaxonomyRepository::class)
     */
    class Taxonomy extends TaxonomyBase
    {
    }
}
