<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 03.07.14
 * Time: 23:00
 */
namespace Application\Entity {

    use Doctrine\ORM\Mapping as ORM;
    use Zend\Form\Annotation as Form;

    use Dashboard\Entity\Document;
    use Doctrine\Common\Collections\ArrayCollection;

    use Lib\Entity\ECommerceTrait;
    use Lib\Entity\Taxonomy\TaxonomyInterface;
    use Application\Entity\Options\ {
        Body, Drive, Fuel, Tag, Transmission, Equipment, Taxonomy
    };

    /**
     * Class Vehicle
     * @package Application
     *
     * @ORM\Entity
     * @ORM\Table(name="vehicle")
     * @Form\Name("vehicle-form")
     */
    class Vehicle extends Document
    {
        use ECommerceTrait;

        /**
         * @var Taxonomy
         * @Form\Type("\DoctrineORMModule\Form\Element\EntitySelect")
         * @Form\Flags({"priority": 55})
         * @Form\Options({
         *      "label": "Model",
         *      "target_class": Application\Entity\Options\Taxonomy::class,
         *      "allow_empty": false,
         *
         *      "property": "name",
         *      "optgroup_identifier": "rootName",
         *
         *     "is_method": true,
         *      "find_method": {
         *          "name": "getOptions"
         *      }
         * })
         * @Form\Attributes({
         *      "data-parsley-required": "true",
         *      "data-parsley-required-message": "Model required",
         *      "class": "form-control select2_multiple",
         *      "id": "v-model"
         * })
         *
         * @ORM\ManyToOne(targetEntity=Options\Taxonomy::class, inversedBy="vehicles")
         * @ORM\JoinColumn(name="model", referencedColumnName="id", nullable=false)
         **/
        protected $taxonomy;

        /**
         * @var Body
         * @Form\Type("\DoctrineORMModule\Form\Element\EntitySelect")
         * @Form\Flags({"priority": 44})
         * @Form\Options({
         *      "label" : "Body",
         *      "target_class" : Application\Entity\Options\Body::class,
         *      "property" : "name",
         *      "is_method" : true,
         *      "find_method" : {
         *          "name" : "getOptions"
         *      },
         *      "allow_empty": false
         * })
         * @Form\Attributes({
         *      "data-parsley-required": "true",
         *      "data-parsley-required-message": "Body type required",
         *      "class": "form-control select2_multiple",
         *      "id": "vehicle-body"
         * })
         *
         * @ORM\ManyToOne(targetEntity=Options\Body::class, inversedBy="vehicles")
         * @ORM\JoinColumn(name="body_type", referencedColumnName="id", nullable=false)
         **/
        protected $body;

        /**
         * @var Drive
         * @Form\Type("\DoctrineORMModule\Form\Element\EntitySelect")
         * @Form\Flags({"priority": 44})
         * @Form\Options({
         *      "label"         : "Drive",
         *      "target_class"  : Application\Entity\Options\Drive::class,
         *      "property"      : "name",
         *      "is_method"     : true,
         *      "find_method"   : {
         *          "name"      : "getOptions"
         *      },
         *      "allow_empty"           : false
         * })
         * @Form\Attributes({
         *      "data-parsley-required": "true",
         *      "data-parsley-required-message": "Drive type required",
         *      "class": "form-control select2_multiple",
         *      "id": "vehicle-drive"
         * })
         *
         * @ORM\ManyToOne(targetEntity=Options\Drive::class, inversedBy="vehicles")
         * @ORM\JoinColumn(name="drive_type", referencedColumnName="id", nullable=false)
         **/
        protected $drive;

        /**
         * @var int
         * @Form\Type("Number")
         * @Form\Flags({"priority": 49})
         * @Form\Options({"label": "Registration"})
         * @Form\Attributes({
         *      "id": "registration-date",
         *      "data-parsley-required"          : "true",
         *      "data-parsley-required-message"  : "Registration date value must be digit",
         *      "data-parsley-type"              : "number",
         *
         *      "class"     : "form-control",
         *      "min"       : 1930
         * })
         * @ORM\Column(name="registration_date", type="smallint", nullable=false, options={"default": 0, "comment": "Registration year"})
         */
        protected $registrationDate;

        /**
         * @var float
         * @Form\Type("Number")
         * @Form\Flags({"priority": 48})
         * @Form\Options({"label": "Engine volume"})
         * @Form\Attributes({
         *      "data-parsley-required": "true",
         *      "data-parsley-required-message": "Volume cant be empty",
         *
         *      "data-parsley-numeric": "true",
         *      "data-parsley-numeric-message": "Volume format: 99.99",
         *      "data-bv-numeric-separator": ".",
         *
         *      "id": "engine-volume",
         *      "class": "form-control",
         *      "autocomplete": "Engine volume",
         *      "pattern": "^\d+(\.\d+)?$",
         *      "step": 0.01,
         *      "min": 0.00
         * })
         * @ORM\Column(name="volume", type="decimal", precision=20, scale=2, nullable=false, unique=false, options={"default": 0, "comment": "engine volume"})
         */
        protected $volume;

        /**
         * @var float
         * @Form\Type("Number")
         * @Form\Flags({"priority": 47})
         * @Form\Options({"label": "Mileage", "id": "mileage-range"})
         * @Form\Attributes({
         *      "data-parsley-required"             : "true",
         *      "data-parsley-required-message"     : "Mileage cant be empty",
         *      "data-parsley-type"                 : "number",
         *
         *      "class"     : "form-control",
         *      "id"        : "mileage-range",
         *      "min"       : 0
         * })
         * @ORM\Column(name="mileage", type="integer", nullable=false, unique=false)
         */
        protected $mileage;

        /**
         * @var Fuel
         * @Form\Type("\DoctrineORMModule\Form\Element\EntitySelect")
         * @Form\Flags({"priority": 46})
         * @Form\Options({
         *      "label"         : "Fuel",
         *      "target_class"  : "Application\Entity\Options\Fuel",
         *      "property"      : "name",
         *      "is_method"     : true,
         *      "find_method"   : {
         *          "name"      : "getOptions"
         *      },
         *      "allow_empty"           : false
         * })
         * @Form\Attributes({
         *      "data-parsley-required": "true",
         *      "data-parsley-required-message": "Fuel type required",
         *      "class": "form-control select2_multiple",
         *      "id": "vehicle-fuel"
         * })
         *
         * @ORM\ManyToOne(targetEntity=Options\Fuel::class, inversedBy="vehicles")
         * @ORM\JoinColumn(name="fuel", referencedColumnName="id", nullable=false)
         **/
        protected $fuel;

        /**
         * @var Transmission
         * @Form\Type("\DoctrineORMModule\Form\Element\EntitySelect")
         * @Form\Flags({"priority": 45})
         * @Form\Options({
         *      "label"         : "Transmission",
         *      "target_class"  : "Application\Entity\Options\Transmission",
         *      "property"      : "name",
         *      "is_method"     : true,
         *      "find_method"   : {
         *          "name"      : "getOptions"
         *      },
         *      "allow_empty"           : false
         * })
         * @Form\Attributes({
         *      "data-parsley-required": "true",
         *      "data-parsley-required-message": "Transmission type required",
         *      "class": "form-control select2_multiple",
         *      "id": "vehicle-transmission"
         * })
         *
         * @ORM\ManyToOne(targetEntity=Options\Transmission::class, inversedBy="vehicles")
         * @ORM\JoinColumn(name="transmission", referencedColumnName="id", nullable=false)
         **/
        protected $transmission;

        /**
         * @var ArrayCollection
         * @Form\Type("\DoctrineORMModule\Form\Element\EntityMultiCheckbox")
         * @Form\Flags({"priority": 44})
         * @Form\Options({
         *      "multiple": true,
         *      "label": "Equipment",
         *      "target_class": "Application\Entity\Options\Equipment",
         *      "property": "name",
         *      "is_method": true,
         *      "find_method": {
         *          "name": "getCheckboxes"
         *      }
         * })
         * @Form\Attributes({
         *     "data-parsley-required": "true",
         *     "data-parsley-required-message": "Options required",
         *     "class": "flat",
         *     "multiple": true,
         * })
         *
         * @ORM\ManyToMany(targetEntity=Options\Equipment::class, cascade={"persist"}, inversedBy="vehicles")
         * @ORM\JoinTable(name="vehicle_options")
         **/
        protected $options;

        /**
         * @var ArrayCollection
         * @Form\Type("\DoctrineORMModule\Form\Element\EntitySelect")
         * @Form\Flags({"priority": 45})
         * @Form\Options({
         *      "label"         : "Tags",
         *      "target_class"  : "Application\Entity\Options\Tag",
         *      "property"      : "name",
         *      "is_method"     : true,
         *      "find_method"   : {
         *          "name"      : "getOptions"
         *      },
         *      "optgroup_identifier"   : "rootName",
         *      "allow_empty"           : false
         * })
         * @Form\Attributes({
         *      "data-parsley-required": "true",
         *      "data-parsley-required-message": "Tags required",
         *      "class": "form-control select2_multiple",
         *      "id": "vehicle-tags"
         * })
         *
         * @ORM\ManyToMany(targetEntity=Options\Tag::class, cascade={"persist", "remove"}, inversedBy="vehicles")
         * @ORM\JoinTable(name="vehicle_tags")
         **/
        protected $tags;

        /**
         * Vehicle constructor.
         */
        public function __construct()
        {
            $this->tags = new ArrayCollection;
            $this->options = new ArrayCollection;

            parent::__construct();
        }

        /**
         * Get taxonomy
         * @return Taxonomy
         */
        public function getTaxonomy() : Taxonomy
        {
            return $this->taxonomy;
        }

        /**
         * Set taxonomy
         * @param Taxonomy $taxonomy
         * @return $this
         */
        public function setTaxonomy(Taxonomy $taxonomy) : self
        {
            $this->taxonomy = $taxonomy;
            $taxonomy->addVehicles($this);

            return $this;
        }

        /**
         * Get transmission
         * @return Transmission
         */
        public function getTransmission() : Transmission
        {
            return $this->transmission;
        }

        /**
         * Set transmission
         * @param Transmission $transmission
         * @return $this
         */
        public function setTransmission(Transmission $transmission) : self
        {
            $this->transmission = $transmission;
            $transmission->addVehicles($this);

            return $this;
        }

        /**
         * Get fuel
         * @return Fuel
         */
        public function getFuel() : Fuel
        {
            return $this->fuel;
        }

        /**
         * Set fuel
         * @param Fuel $fuel
         * @return $this
         */
        public function setFuel(Fuel $fuel) : self
        {
            $this->fuel = $fuel;
            $fuel->addVehicles($this);

            return $this;
        }

        /**
         * Get volume
         * @return float
         */
        public function getVolume() : float
        {
            return $this->volume;
        }

        /**
         * Set volume
         * @param float $volume
         * @return $this
         */
        public function setVolume(float $volume) : self
        {
            $this->volume = $volume;
            return $this;
        }

        /**
         * Get mileage
         * @return float
         */
        public function getMileage() : float
        {
            return $this->mileage;
        }

        /**
         * Set mileage
         * @param float $mileage
         * @return $this
         */
        public function setMileage(float $mileage) : self
        {
            $this->mileage = $mileage;
            return $this;
        }

        /**
         * Get registrationDate
         * @return int
         */
        public function getRegistrationDate() : int
        {
            return $this->registrationDate;
        }

        /**
         * Get registrationDate
         * @param int $registrationDate
         * @return $this
         */
        public function setRegistrationDate(int $registrationDate) : self
        {
            $this->registrationDate = $registrationDate;
            return $this;
        }

        /**
         * Add option
         * @param Equipment $option
         * @return $this
         */
        public function addOptions(Equipment $option) : self
        {
            $this->options->add($option);
            $option->addVehicles($this);

            return $this;
        }

        /**
         * Remove option
         * @param Equipment $option
         * @return $this
         */
        public function removeOptions(Equipment $option) : self
        {
            $this->options->removeElement($option);
            $option->removeVehicles($this);

            return $this;
        }

        /**
         * Get options
         * @return ArrayCollection
         */
        public function getOptions()
        {
            return $this->options;
        }

        /**
         * Add option
         * @param Tag $tag
         * @return $this
         */
        public function addTags(Tag $tag) : self
        {
            $this->tags->add($tag);
            $tag->addVehicles($this);

            return $this;
        }

        /**
         * Remove tag
         * @param Tag $tag
         * @return $this
         */
        public function removeTags(Tag $tag) : self
        {
            $this->tags->remove($tag);
            $tag->removeVehicles($this);

            return $this;
        }

        /**
         * Get options
         * @return ArrayCollection
         */
        public function getTags()
        {
            return $this->tags;
        }

        /**
         * Get body
         * @return Body
         */
        public function getBody() : Body
        {
            return $this->body;
        }

        /**
         * Set body
         * @param Body $body
         * @return $this
         */
        public function setBody(Body $body) : self
        {
            $this->body = $body;
            $body->addVehicles($this);

            return $this;
        }

        /**
         * Get drive
         * @return Drive
         */
        public function getDrive() : Drive
        {
            return $this->drive;
        }

        /**
         * Set drive
         * @param Drive $drive
         * @return $this
         */
        public function setDrive(Drive $drive) : self
        {
            $this->drive = $drive;
            $drive->addVehicles($this);

            return $this;
        }

        /**
         * Vehicle name
         * @param string $glue
         * @return string
         */
        public function name(string $glue = " ") : string
        {
            $pieces = [$this->getName()];
            if ($this->getTaxonomy()) {

                /** @var Options\Taxonomy $tax */
                $tax = $this->getTaxonomy();
                array_unshift($pieces, $tax->getName());
                if ($tax->getRoot() instanceof TaxonomyInterface) {
                    array_unshift($pieces, $tax->getRoot()->getName());
                }
            }

            return implode($glue, $pieces);
        }

        /**
         * Get taxonomy
         * @return string
         */
        public function taxonomy() : string
        {
            /** @var Taxonomy $term */
            $term = $this->getTaxonomy();

            $tree = [];
            while (!is_null($term)) {
                array_push($tree, $term->getName());
                $term = $term->getRoot();
            }

            return implode(" ", array_reverse($tree));
        }

        /**
         * Price
         * @param string $glue
         * @return string
         */
        public function price(string $glue = "") : string
        {
            return implode($glue,[
                number_format($this->getAmount(), 2),
                $this->getCurrency()->getHtmlCode()
            ]);
        }

        /**
         * Mileage
         * @return string
         */
        public function mileage() : string
        {
            return number_format($this->getMileage() * 1000, 0);
        }

        /**
         * Function mark
         * @return string
         */
        public function mark() : string
        {
            /** @var Taxonomy $model */
            $model = $this->getTaxonomy();
            if ($model instanceof Taxonomy) {
                return $model->getRootName();
            }

            return "";
        }

        /**
         * Function model
         * @return string
         */
        public function model() : string
        {
            /** @var Taxonomy $model */
            $model = $this->getTaxonomy();
            if ($model instanceof Taxonomy) {
                return $model->getName();
            }

            return "";
        }

        /**
         * Function jsonSerialize
         * @return array
         */
        public function jsonSerialize() : array
        {
            return array_merge_recursive(
                parent::jsonSerialize(),
                [
                    "doc" => [
                        "mileage" => $this->mileage(),
                        "taxonomy" => $this->taxonomy(),
                        "year" => $this->getRegistrationDate(),
                        "price" => $this->price()
                    ]
                ]
            );
        }
    }
}

